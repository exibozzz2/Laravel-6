<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddStudentRequest;
use App\Models\GradesModel;
use App\Repositories\GradesRepository;
use Illuminate\Http\Request;

class GradesController extends Controller
{

    private $connectRepository;

    public function __construct()
    {
        $this->connectRepository = new GradesRepository();
    }


    public function getAllStudentsInfo() {

        $allStudentsInfo = GradesModel::all();
        return view('studentInfo', compact('allStudentsInfo'));

    }

    public function addStudentInfo(AddStudentRequest $request) {

        $this->connectRepository->createStudentGrade($request);

        return redirect()->route('student.all');
    }

}
