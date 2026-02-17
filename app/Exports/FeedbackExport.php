<?php

namespace App\Exports;

use App\Models\StudentFeedback;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;

class FeedbackExport implements FromCollection
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
        $feedbacks = StudentFeedback::whereBetween('feedback_date', [Carbon::parse($request->from_date)->startOfDay(), Carbon::parse($request->to_date)->endOfDay()])->when($request->status > 0, function ($q) use ($request) {
            return $q->where('status', $request->status);
        })->latest()->get();

        return $feedbacks->map(function ($feedback, $key) {
            return [
                'SLNo' => $key + 1,
                'student' => $feedback->student_name,
                'trainer' => $feedback->trainer_name,
                'course' => $feedback->course->name,
                'status' => $feedback->statuss->name,
                'date' => $feedback->feedback_date->format('Y-m-d'),
                'location' => $feedback->location,
                'country' => $feedback->country,
                'feedback' => $feedback->feedback,
            ];
        });
    }
}
