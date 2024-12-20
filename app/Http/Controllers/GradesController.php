<?php

namespace App\Http\Controllers;

use App\Models\GradesModel;
use Illuminate\Http\Request;

class GradesController extends Controller
{


    public function getAllStudentsInfo() {

        $allStudentsInfo = GradesModel::all();
        return view('studentInfo', compact('allStudentsInfo'));

    }

    public function addStudentInfo(Request $request) {

        $request->validate([
            'subject' => 'string|required',
            'grade' => 'integer|required|min:1|max:5',
            'professor' => 'string|required'
        ]);

        GradesModel::create([
            'subject' => $request->get('subject'),
            'grade' => $request->get('grade'),
            'professor' => $request->get('professor')
        ]);

        return redirect('/add-student-info');
    }

}
