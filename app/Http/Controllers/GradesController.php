<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddStudentRequest;
use App\Models\GradesModel;
use Illuminate\Http\Request;

class GradesController extends Controller
{


    public function getAllStudentsInfo() {

        $allStudentsInfo = GradesModel::all();
        return view('studentInfo', compact('allStudentsInfo'));

    }

    public function addStudentInfo(AddStudentRequest $request) {

        GradesModel::create([
            'subject' => $request->get('subject'),
            'grade' => $request->get('grade'),
            'professor' => $request->get('professor')
        ]);

        return redirect()->route('all.students.info');
    }

}
