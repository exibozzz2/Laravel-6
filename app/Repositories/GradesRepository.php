<?php

namespace App\Repositories;
use App\Http\Requests\AddStudentRequest;
use App\Models\ContactsModel;
use App\Models\GradesModel;


class GradesRepository
{

    private $gradesModel;

    public function __construct()
    {
        $this->gradesModel = new GradesModel();
    }


    public function createStudentGrade(AddStudentRequest $request)
    {
        $this->gradesModel->create([
            'subject' => $request->get('subject'),
            'grade' => $request->get('grade'),
            'professor' => $request->get('professor')
        ]);
    }


}
?>
