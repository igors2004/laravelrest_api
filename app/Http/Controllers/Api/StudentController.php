<?php

namespace App\Http\Controllers\Api;


use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\StudentController;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        if($students->count() > 0){

            return response()->json([
                'status' => 200,
                'students' => $students
            ], 200);
        }else {

            
            return response()->json([
                'status' => 404,
                'students' => 'No Record Found'
            ], 404);
        }
        
    
    }
    public function show($id): JsonResponse
    {
        $person = Student::find($id);
        return response()->json($person, 200);
    }
    public function update(Request $request, $id)
    {
        $person = Student::find($id);

        $data = $request ->validate([
            'city'=> 'required',
            'country'=> 'required'
        ]);
        $person->update($data);
        return response ()->json($person, 200);

    }
    public function delete($id)
    {  
        $person = Student::find($id);
        $person->delete(); 

    }
    public function create(Request $request)
    {
        $data = $request->validate([

            'name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'street_name' => 'required',
            'city' => 'required',
            'country' => 'required'

        ]);

        $people = Student::create($data);

        return response()->json($people, 201);
    }
}
