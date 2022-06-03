<?php

namespace App\Interface;

interface StudentInterface
{
    public function getAllStudent();

    public function indexAPI();

    public function createStudent();

    public function storeStudent($request);

    public function getStudentById($id);

    public function editStudent($id);

    public function updateStudent($id, $request);

    public function deleteStudent($id);



}
