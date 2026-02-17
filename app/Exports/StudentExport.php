<?php

namespace App\Exports;

use App\Models\Student;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;

class StudentExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        $request = $this->request;
        $students = Student::whereBetween('response_date', [Carbon::parse($request->from_date)->startOfDay(), Carbon::parse($request->to_date)->endOfDay()])->when($request->status > 0, function ($q) use ($request) {
            return $q->where('status', $request->status);
        })->when($request->course > 0, function ($q) use ($request) {
            return $q->where('course_id', $request->course);
        })->latest()->get();

        return $students->map(function ($student, $key) {
            return [
                'SLNo' => $key + 1,
                'name' => $student->name,
                'email' => $student->email,
                'phone' => $student->phone,
                'response_date' => $student->response_date,
                'course' => $student->course->name,
                'status' => $student->statuss->name,
                'refer' => $student->reference->name,
                'comment' => $student->comments,
            ];
        });
    }
}
