<?php

namespace App\Http\Controllers;

use App\Exports\FeedbackExport;
use App\Exports\StudentExport;
use App\Models\Blog;
use App\Models\CertificateRequest;
use App\Models\Course;
use App\Models\EdsReferral;
use App\Models\Extra;
use App\Models\FileUpload;
use App\Models\FormSubmit;
use App\Models\JobPost;
use App\Models\Student;
use App\Models\StudentFeedback;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class HelperController extends Controller
{
    private $courses;

    public function __construct()
    {
        $this->courses = Course::where('status', 1)->whereIn('id', [1, 2, 4, 5, 7, 16])->get();
    }

    public function change_password()
    {
        return view('account.change_pwd');
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'old_password' => 'required|current-password',
            'password' => 'required|min:6',
            'confirm_password' => 'same:password',
        ]);
        User::find(Auth::user()->id)->update(['password' => Hash::make($request->password)]);

        return redirect()->back()->with('success', 'Password updated successfully!');
    }

    public function certificate_requests()
    {
        $certificates = CertificateRequest::latest()->limit(100)->get();

        return view('certificate.index', compact('certificates'));
    }

    public function certificate_request_status_update(Request $request)
    {
        try {
            CertificateRequest::findOrFail(decrypt($request->id))->update([
                'status' => decrypt($request->status),
            ]);
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->back()->with('success', 'Request status updated successfully!');
    }

    public function certificate_request_delete(Request $request)
    {
        try {
            CertificateRequest::findOrFail(decrypt($request->id))->delete();
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->back()->with('success', 'Request deleted successfully!');
    }

    public function print_certificate(Request $request)
    {
        $certificate = CertificateRequest::findOrFail(decrypt($request->id));
        $courses = Course::where('parent_id', $certificate->course_id)->get();
        $qrcode = QrCode::size(75)->generate('https://empiredatasystems.com/certificate-authentication/'.encrypt($certificate->id));
        $pdf = Pdf::loadView('certificate.certificate', compact('certificate', 'courses', 'qrcode'))->setPaper('a4', 'landscape');

        return $pdf->stream('certificate'.'.pdf');
    }

    public function feedbacks()
    {
        $feedbacks = StudentFeedback::latest()->limit(50)->get();

        return view('feedback.index', compact('feedbacks'));
    }

    public function feedback_status_update(Request $request)
    {
        StudentFeedback::findOrFail(decrypt($request->id))->update([
            'status' => decrypt($request->status),
        ]);

        return redirect()->back()->with('success', 'Status updated successfully!');
    }

    public function edit_feedback(Request $request)
    {
        $feedback = StudentFeedback::findOrFail(decrypt($request->id));
        $courses = $this->courses->pluck('name', 'id');
        $statuses = Extra::where('category', 'feedback')->pluck('name', 'id');

        return view('feedback.edit', compact('feedback', 'courses', 'statuses'));
    }

    public function update_feedback(Request $request)
    {
        $inputs = $request->validate([
            'student_name' => 'required',
            'trainer_name' => 'required',
            'course_id' => 'required',
            'location' => 'required',
            'country' => 'required',
            'status' => 'required',
            'feedback' => 'required',
        ]);
        StudentFeedback::findOrFail(decrypt($request->id))->update($inputs);

        return redirect()->route('feedbacks')->with('success', 'Feedback updated successfully!');
    }

    public function export_feedback()
    {
        $inputs = [date('Y-m-d'), date('Y-m-d'), 0];
        $statuses = Extra::where('category', 'feedback')->pluck('name', 'id');
        $feedbacks = collect();

        return view('feedback.export', compact('inputs', 'statuses', 'feedbacks'));
    }

    public function export_feedback_fetch(Request $request)
    {
        $request->validate([
            'from_date' => 'required|date',
            'to_date' => 'required|date',
        ]);
        $inputs = [$request->from_date, $request->to_date, $request->status ?? 0];
        $statuses = Extra::where('category', 'feedback')->pluck('name', 'id');
        $feedbacks = StudentFeedback::whereBetween('feedback_date', [Carbon::parse($request->from_date)->startOfDay(), Carbon::parse($request->to_date)->endOfDay()])->when($request->status > 0, function ($q) use ($request) {
            return $q->where('status', $request->status);
        })->latest()->get();

        return view('feedback.export', compact('inputs', 'statuses', 'feedbacks'));
    }

    public function export_feedback_excel(Request $request)
    {
        return Excel::download(new FeedbackExport($request), 'feedback.xlsx');
    }

    public function students()
    {
        $students = Student::latest()->limit(100)->get();

        return view('student.index', compact('students'));
    }

    public function edit_student(Request $request)
    {
        $student = Student::findOrFail(decrypt($request->id));
        $courses = $this->courses->pluck('name', 'id');
        $statuses = Extra::where('category', 'student')->pluck('name', 'id');
        $references = Extra::where('category', 'reference')->pluck('name', 'id');

        return view('student.edit', compact('student', 'courses', 'statuses', 'references'));
    }

    public function update_student(Request $request)
    {
        $inputs = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'course_id' => 'required',
            'response_date' => 'required|date',
            'referred_by' => 'required',
            'status' => 'required',
            'comments' => 'nullable',
        ]);
        $inputs['updated_by'] = $request->user()->id;
        Student::findOrFail(decrypt($request->id))->update($inputs);

        return redirect()->route('students')->with('success', 'Student updated successfully!');
    }

    public function delete_student(Request $request)
    {
        Student::findOrFail(decrypt($request->id))->delete();

        return redirect()->route('students')->with('success', 'Student deleted successfully!');
    }

    public function export_student()
    {
        $inputs = [date('Y-m-d'), date('Y-m-d'), 0, 0];
        $statuses = Extra::where('category', 'student')->pluck('name', 'id');
        $courses = $this->courses->pluck('name', 'id');
        $students = collect();

        return view('student.export', compact('inputs', 'statuses', 'courses', 'students'));
    }

    public function export_student_fetch(Request $request)
    {
        $request->validate([
            'from_date' => 'required|date',
            'to_date' => 'required|date',
        ]);
        $inputs = [$request->from_date, $request->to_date, $request->course ?? 0, $request->status ?? 0];
        $statuses = Extra::where('category', 'student')->pluck('name', 'id');
        $courses = $this->courses->pluck('name', 'id');
        $students = Student::whereBetween('response_date', [Carbon::parse($request->from_date)->startOfDay(), Carbon::parse($request->to_date)->endOfDay()])->when($request->status > 0, function ($q) use ($request) {
            return $q->where('status', $request->status);
        })->when($request->course > 0, function ($q) use ($request) {
            return $q->where('course_id', $request->course);
        })->latest()->get();

        return view('student.export', compact('inputs', 'statuses', 'courses', 'students'));
    }

    public function export_student_excel(Request $request)
    {
        return Excel::download(new StudentExport($request), 'students.xlsx');
    }

    public function blogs()
    {
        $blogs = Blog::selectRaw('id, title, author, created_by, created_at')->latest()->get();

        return view('blog.index', compact('blogs'));
    }

    public function create_blog()
    {
        return view('blog.create');
    }

    public function save_blog(Request $request)
    {
        $inputs = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'intro' => 'required',
            'content' => 'required',
        ]);
        $inputs['rating'] = 5;
        $inputs['created_by'] = $request->user()->id;
        $inputs['updated_by'] = $request->user()->id;
        Blog::create($inputs);

        return redirect()->route('blogs')->with('success', 'Blog created successfully!');
    }

    public function edit_blog(Request $request)
    {
        $blog = Blog::findOrFail(decrypt($request->id));

        return view('blog.edit', compact('blog'));
    }

    public function update_blog(Request $request)
    {
        $inputs = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'intro' => 'required',
            'content' => 'required',
        ]);
        $inputs['updated_by'] = $request->user()->id;
        Blog::findOrFail(decrypt($request->id))->update($inputs);

        return redirect()->route('blogs')->with('success', 'Blog updated successfully!');
    }

    public function delete_blog(Request $request)
    {
        Blog::findOrFail(decrypt($request->id))->delete();

        return redirect()->route('blogs')->with('success', 'Blog deleted successfully!');
    }

    public function jobs()
    {
        $jobs = JobPost::selectRaw('id, title, location, contact_email, posted_on')->latest()->get();

        return view('job.index', compact('jobs'));
    }

    public function create_job()
    {
        return view('job.create');
    }

    public function save_job(Request $request)
    {
        $inputs = $request->validate([
            'title' => 'required',
            'contact_email' => 'required|email',
            'location' => 'required',
            'posted_on' => 'required|date',
            'description' => 'required',
        ]);
        $inputs['created_by'] = $request->user()->id;
        $inputs['updated_by'] = $request->user()->id;
        JobPost::create($inputs);

        return redirect()->route('jobs')->with('success', 'Job created successfully!');
    }

    public function edit_job(Request $request)
    {
        $job = JobPost::findOrFail(decrypt($request->id));

        return view('job.edit', compact('job'));
    }

    public function update_job(Request $request)
    {
        $inputs = $request->validate([
            'title' => 'required',
            'contact_email' => 'required|email',
            'location' => 'required',
            'posted_on' => 'required|date',
            'description' => 'required',
        ]);
        $inputs['updated_by'] = $request->user()->id;
        JobPost::findOrFail(decrypt($request->id))->update($inputs);

        return redirect()->route('jobs')->with('success', 'Job updated successfully!');
    }

    public function delete_job(Request $request)
    {
        JobPost::findOrFail(decrypt($request->id))->delete();

        return redirect()->route('jobs')->with('success', 'Job deleted successfully!');
    }

    public function eds_referrals()
    {
        $referrals = EdsReferral::latest()->get();

        return view('referral.index', compact('referrals'));
    }

    public function create_eds_referral()
    {
        $courses = $this->courses->pluck('name', 'id');

        return view('referral.create', compact('courses'));
    }

    public function save_eds_referral(Request $request)
    {
        $inputs = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'course_id' => 'required',
            'registration_date' => 'required|date',
            'comments' => 'nullable',
        ]);
        $inputs['created_by'] = $request->user()->id;
        $inputs['updated_by'] = $request->user()->id;
        $inputs['referral_code'] = null;
        EdsReferral::create($inputs);

        return redirect()->route('eds.referrals')->with('success', 'Refferal created successfully!');
    }

    public function edit_eds_referral(Request $request)
    {
        $referral = EdsReferral::findOrFail(decrypt($request->id));
        $courses = $this->courses->pluck('name', 'id');

        return view('referral.edit', compact('referral', 'courses'));
    }

    public function update_eds_referral(Request $request)
    {
        $inputs = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'course_id' => 'required',
            'registration_date' => 'required|date',
            'comments' => 'nullable',
        ]);
        $inputs['updated_by'] = $request->user()->id;
        EdsReferral::findOrFail(decrypt($request->id))->update($inputs);

        return redirect()->route('eds.referrals')->with('success', 'Referral updated successfully!');
    }

    public function delete_eds_referral(Request $request)
    {
        EdsReferral::findOrFail(decrypt($request->id))->delete();

        return redirect()->route('eds.referrals')->with('success', 'Referral deleted successfully!');
    }

    public function form_submits()
    {
        $forms = FormSubmit::latest()->get();

        return view('form.index', compact('forms'));
    }

    public function form_submit_delete(Request $request)
    {
        FormSubmit::findOrFail(decrypt($request->id))->delete();

        return redirect()->route('form.submits')->with('success', 'Request deleted successfully!');
    }

    public function file_uploads()
    {
        $files = FileUpload::latest()->get();

        return view('uploads.index', compact('files'));
    }

    public function file_upload_save(Request $request)
    {
        $request->validate([
            'document' => 'required|mimes:jpg,png,pdf,xlx,xlsx,doc,docx|max:1024', // Validate file type and size
        ]);
        $ext = $request->document->extension();
        $file_original_name = $request->file('document')->getClientOriginalName();
        $fileName = time().'.'.$ext;
        $request->document->move(public_path('storage/uploads'), $fileName);
        FileUpload::create([
            'file_name' => $file_original_name,
            'file_type' => $ext,
            'url' => $fileName,
            'created_by' => $request->user()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }

    public function file_download(Request $request)
    {
        $file = FileUpload::findOrFail(decrypt($request->id));
        $file_path = public_path('/storage/uploads/'.$file->url);

        return response()->download($file_path);
    }

    public function delete_file_upload(Request $request)
    {
        $file = FileUpload::findOrFail(decrypt($request->id));
        $path = public_path('/storage/uploads/'.$file->url);
        if (File::exists($path)) {
            File::delete($path);
            $file->delete();

            return back()->with('success', 'File deleted successfully!');
        } else {
            return back()->with('error', 'File not found!');
        }

        return back()->with('error', 'Something went wrong!');
    }
}
