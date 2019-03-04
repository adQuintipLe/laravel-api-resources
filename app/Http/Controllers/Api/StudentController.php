<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entities\Student;
use App\Http\Resources\Student as StudentResources;

class StudentController extends Controller
{
    public function store(Request $request)
    {
        $student = new Student();

        $student->firstName = $request->input('fName');
        $student->lastName = $request->input('lName');
        $student->companyName = $request->input('cName');
        $student->department = $request->input('department');
        $student->occupation = $request->input('occupation');

        $student->save();

        return new StudentResources($student);  
    }


    public function show()
    {
        $student = Student::all();

        return StudentResources::collection($student);  //retrieve all data
    }


    public function showById($id)
    {
        $student = Student::find($id);

        if($student){
            return new StudentResources($student);
        }else{
            return response()->json(['Error' => 'There is no data available on this id : '.$id], 404);
        }
    }


    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        if($student){

            $student->firstName = $request->input('fName');
            $student->lastName = $request->input('lName');
            $student->companyName = $request->input('cName');
            $student->department = $request->input('department');
            $student->occupation = $request->input('occupation');

            $student->save();

            return new StudentResources($student);
        }else{
            return response()->json(['Error' => 'There is no id available to be updatec on id : '.$id],404);
        }
    }


    public function delete($id)
    {
        $student = Student::find($id);

        if($student){

            $student->delete();

            return new StudentResources($student);
        }else{
            return response()->json(['Error' => 'There is no id available to be delete on id : '.$id],404);
        }
    }
}
