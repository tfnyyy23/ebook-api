<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $author = Author::all();
        return $author;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = author::create([
            "name" => $request->name,
            "date_of_birth" => $request->date_of_birth,
            "place_of_birth" => $request->place_of_birth,
            "gender" => $request->gender,
            "email" => $request->email,
            "no_hp" => $request->no_hp
        ]);

        return response()->json([
            'success' => 201,
            'messages' => 'data has been successfully',
            'data' => $table
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $author = author::find($id);
        if ($author) {
            return response()->json([
                'status' => 200,
                'data' => $author
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'messages' => 'id ' . $id . ' could not be found'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $author = author::find($id);
        if ($author) {
            $author->name = $request->name ? $request->name : $author->name;
            $author->date_of_birth = $request->date_of_birth ? $request->date_of_birth : $author->date_of_birth;
            $author->place_of_birth = $request->place_of_birth ? $request->place_of_birth : $author->place_of_birth;
            $author->gender = $request->gender ? $request->gender : $author->gender;
            $author->email = $request->email ? $request->email : $author->email;
            $author->no_hp = $request->no_hp ? $request->no_hp : $author->no_hp;
            $author->save();
            return response()->json([
                'status' => 200,
                'data' => $author
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'messages' => 'id ' . $id . ' could not be found'
            ],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = author::where('id',$id)->first();
        if ($author) {
            $author->delete();
            return response()->json([
                'status' => 200,
                'data' => $author,
                'messages' => 'data deleted successfully'
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'messages' => 'id ' . $id . ' could not be found'
            ],404);
        }
    }
}
