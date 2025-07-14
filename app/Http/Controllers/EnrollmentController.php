<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $data = $request->only(['student_id', 'course_id', 'enrolled_at']);
            //return response()->json($data);
            $enrollment = Enrollment::create($data);
    
            return response()->json($enrollment, 201);

        }catch(Exception $e){
            return response()->json(['message'=>$e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enrollment $enrollment)
    {
         try{
            $enrollment->delete();
            return response()->noContent();

        }catch(Exception $e){
            return response()->json(['message'=>$e->getMessage()],500);

        }
    }

}
