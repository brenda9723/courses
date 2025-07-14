<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $courses = Course::all();
            if($courses->isEmpty()){
                return response()->json(['message'=> 'Ningun curso encontrado'], 404);
            }
            return response()->json($courses, 200);

        }catch(Exception $e){
            return response()->json(['message'=>$e->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            // 'title',
            // 'description',
            // 'start_date',
            // 'end_date',
            $data = $request->only(['title', 'description','start_date', 'end_date']);
            $course = Course::create($data);

            return response()->json($course, 201);

        }catch(Exception $e){
            return response()->json(['message'=>$e->getMessage()], 500);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $course = Course::findOrFail($id);
            return response()->json($course, 200);
        }catch(ModelNotFoundException $e){
            return response()->json(['message'=>$e->getMessage()], 404);

        }catch(Exception $e){
            return response()->json(['message'=>$e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        try{
            $data = $request->only(['title', 'description','start_date', 'end_date']);
            $course->update($data);
            return response()->json($course, 201);
        }catch(Exception $e){
            return response()->json(['message'=>$e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        try{
            $course->delete();
            return response()->noContent();

        }catch(Exception $e){
            return response()->json(['message'=>$e->getMessage()],500);

        }
    }
}
