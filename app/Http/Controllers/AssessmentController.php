<?php

namespace App\Http\Controllers;

use App\Assessment;
use App\Schedule;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AssessmentController extends Controller
{
    //
    function __construct (Assessment $assessment) {
        return $this->item = $assessment;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'task_upload_id' => 'required',
            'score' => 'required',
        ]);

        $assessment = $this->item->where('task_upload_id', $request->task_upload_id)->first();

        if ($assessment) {
            $assessment->update([
                'score' => $request->score,
            ]);
        } else {
            $assessment = Assessment::create([
                'task_upload_id' => $request->task_upload_id,
                'score' => $request->score,
            ]);
        }

        return redirect()->route('teacher.task.show', ['task' => $assessment->task_upload->task->id]);
    }
}
