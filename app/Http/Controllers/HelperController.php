<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\CertificateRequest;
use App\Models\Course;
use App\Models\Extra;
use App\Models\FileUpload;
use App\Models\FormSubmit;
use App\Models\Student;
use App\Models\StudentFeedback;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class HelperController extends Controller
{
    private $courses;
    function __construct()
    {
        $this->courses = Course::where("status", 1)->whereIn('id', [1, 2, 4, 5, 7, 16])->get();
    }

    function change_password()
    {
        return view("account.change_pwd");
    }

    function update_password(Request $request)
    {
        $request->validate([
            "old_password" => "required|current-password",
            "password" => "required|min:6",
            "confirm_password" => "same:password",
        ]);
        User::find(Auth::user()->id)->update(['password' => Hash::make($request->password)]);
        return redirect()->back()->with("success", "Password updated successfully!");
    }

    function certificate_requests()
    {
        $certificates = CertificateRequest::latest()->limit(100)->get();
        return view("certificate.index", compact('certificates'));
    }

    function certificate_request_status_update(Request $request)
    {
        try {
            CertificateRequest::findOrFail(decrypt($request->id))->update([
                "status" => decrypt($request->status)
            ]);
        } catch (Exception $e) {
            return redirect()->back()->with("error", $e->getMessage());
        }
        return redirect()->back()->with("success", "Request status updated successfully!");
    }

    function certificate_request_delete(Request $request)
    {
        try {
            CertificateRequest::findOrFail(decrypt($request->id))->delete();
        } catch (Exception $e) {
            return redirect()->back()->with("error", $e->getMessage());
        }
        return redirect()->back()->with("success", "Request deleted successfully!");
    }

    function print_certificate(Request $request)
    {
        $certificate = CertificateRequest::findOrFail(decrypt($request->id));
        $courses = Course::where("parent_id", $certificate->course_id)->get();
        $qrcode = QrCode::size(75)->generate('https://empiredatasystems.com/certificate-authentication/' . encrypt($certificate->id));
        $pdf = Pdf::loadView('certificate.certificate', compact('certificate', 'courses', 'qrcode'))->setPaper('a4', 'landscape');
        return $pdf->stream('certificate' . '.pdf');
    }

    function feedbacks()
    {
        $feedbacks = StudentFeedback::latest()->limit(50)->get();
        return view("feedback.index", compact('feedbacks'));
    }

    function feedback_status_update(Request $request)
    {
        StudentFeedback::findOrFail(decrypt($request->id))->update([
            "status" => decrypt($request->status)
        ]);
        return redirect()->back()->with("success", "Status updated successfully!");
    }

    function edit_feedback(Request $request)
    {
        $feedback = StudentFeedback::findOrFail(decrypt($request->id));
        $courses = $this->courses->pluck("name", "id");
        $statuses = Extra::where("category", "feedback")->pluck("name", "id");
        return view("feedback.edit", compact('feedback', 'courses', 'statuses'));
    }

    function update_feedback(Request $request)
    {
        $inputs = $request->validate([
            "student_name" => "required",
            "trainer_name" => "required",
            "course_id" => "required",
            "location" => "required",
            "country" => "required",
            "status" => "required",
            "feedback" => "required",
        ]);
        StudentFeedback::findOrFail(decrypt($request->id))->update($inputs);
        return redirect()->route("feedbacks")->with("success", "Feedback updated successfully!");
    }

    function students()
    {
        $students = Student::latest()->limit(100)->get();
        return view("student.index", compact('students'));
    }

    function edit_student(Request $request)
    {
        $student = Student::findOrFail(decrypt($request->id));
        $courses = $this->courses->pluck("name", "id");
        $statuses = Extra::where("category", "student")->pluck("name", "id");
        $references = Extra::where("category", "reference")->pluck("name", "id");
        return view("student.edit", compact('student', 'courses', 'statuses', 'references'));
    }

    function update_student(Request $request)
    {
        $inputs = $request->validate([
            "name" => "required",
            "email" => "required|email",
            "phone" => "required",
            "course_id" => "required",
            "response_date" => "required|date",
            "referred_by" => "required",
            "status" => "required",
            "comments" => "nullable",
        ]);
        $inputs['updated_by'] = $request->user()->id;
        Student::findOrFail(decrypt($request->id))->update($inputs);
        return redirect()->route("students")->with("success", "Student updated successfully!");
    }

    function delete_student(Request $request)
    {
        Student::findOrFail(decrypt($request->id))->delete();
        return redirect()->route('students')->with("success", "Student deleted successfully!");
    }

    function blogs()
    {
        $blogs = Blog::selectRaw("id, title, author, created_by, created_at")->latest()->get();
        return view("blog.index", compact('blogs'));
    }

    function create_blog()
    {
        return view("blog.create");
    }

    function save_blog(Request $request)
    {
        $inputs = $request->validate([
            "title" => "required",
            "author" => "required",
            "intro" => "required",
            "content" => "required",
        ]);
        $inputs["rating"] = 5;
        $inputs["created_by"] = $request->user()->id;
        $inputs["updated_by"] = $request->user()->id;
        Blog::create($inputs);
        return redirect()->back()->with("success", "Blog created successfully!");
    }

    function edit_blog(Request $request)
    {
        $blog = Blog::findOrFail(decrypt($request->id));
        return view("blog.edit", compact('blog'));
    }

    function update_blog(Request $request)
    {
        $inputs = $request->validate([
            "title" => "required",
            "author" => "required",
            "intro" => "required",
            "content" => "required",
        ]);
        $inputs["updated_by"] = $request->user()->id;
        Blog::findOrFail(decrypt($request->id))->update($inputs);
        return redirect()->route('blogs')->with("success", "Blog updated successfully!");
    }

    function delete_blog(Request $request)
    {
        Blog::findOrFail(decrypt($request->id))->delete();
        return redirect()->route('blogs')->with("success", "Blog deleted successfully!");
    }

    function form_submits()
    {
        $forms = FormSubmit::latest()->get();
        return view("form.index", compact('forms'));
    }

    function form_submit_delete(Request $request)
    {
        FormSubmit::findOrFail(decrypt($request->id))->delete();
        return redirect()->route('form.submits')->with("success", "Request deleted successfully!");
    }

    function file_uploads()
    {
        $files = FileUpload::latest()->get();
        return view("uploads.index", compact('files'));
    }

    function file_upload_save(Request $request)
    {
        $request->validate([
            'document' => 'required|mimes:jpg,png,pdf,xlx,xlsx,doc,docx|max:1024', // Validate file type and size
        ]);
        $ext = $request->document->extension();
        $file_original_name = $request->file('document')->getClientOriginalName();
        $fileName = time() . '.' . $ext;
        $request->document->move(public_path('storage/uploads'), $fileName);
        FileUpload::create([
            "file_name" => $file_original_name,
            "file_type" => $ext,
            "url" => $fileName,
            "created_by" => $request->user()->id,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
    }

    function file_download(Request $request)
    {
        $file = FileUpload::findOrFail(decrypt($request->id));
        $file_path = public_path('/storage/uploads/' . $file->url);
        return response()->download($file_path);
    }

    function delete_file_upload(Request $request)
    {
        $file = FileUpload::findOrFail(decrypt($request->id));
        $path = public_path('/storage/uploads/' . $file->url);
        if (File::exists($path)):
            File::delete($path);
            $file->delete();
            return back()->with('success', 'File deleted successfully!');
        else:
            return back()->with('error', 'File not found!');
        endif;
        return back()->with('error', 'Something went wrong!');
    }
}
