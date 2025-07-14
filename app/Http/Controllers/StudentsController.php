<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $students = Student::all();
            if ($students->isEmpty()) {
                return response()->json(['message' => 'No se encontraron estudiantes'], 404);
            }
            return response()->json($students, 200);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $data = $request->only(['name', 'email', 'birthdate', 'nationality']);
            $student = Student::create($data);
    
            return response()->json($student, 201);

        }catch(Exception $e){
            return response()->json(['message'=>$e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $student = Student::findOrFail($id);
            return response()->json($student, 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        try{
            $data = $request->only(['name', 'email', 'birthdate', 'nationality']);
            $student->update($data);
            return response()->json($student, 201);      
        }catch(Exception $e){
            return response()->json(['message'=>$e->getMessage()], 500);
        }
 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        try{
            $student->delete();
            return response()->noContent();

        }catch(Exception $e){
            return response()->json(['message'=>$e->getMessage()],500);

        }
    }
}
