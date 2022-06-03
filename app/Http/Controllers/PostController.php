<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStore;
use App\Http\Requests\PostUpdate;
use App\Http\Resources\PostResource;
use App\Repository\PostRepository;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public $post;

    public function __construct(PostRepository $post)
    {
        $this->post = $post;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post.dashboard');
    }

    public function indexAPI(Request $request)
    {
        $students = $this->student->indexAPI($request);
        return response()->json([
            'students' => PostResource::collection($students)
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStore $request)
    {
        try {
            $this->post->storeUser($request);
        }
        catch (Exception $e) {
            return back()->with('error', 'Error creating data');
        }
        return redirect()->route('post.index')->with('success', 'Data has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->post->show($id);
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->post->edit($id);
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdate $request, $id)
    {
        try {
            $this->post->updateUser($id, $request);
        }
        catch (Exception $e) {
            return back()->with('error', 'Error updating data');
        }

        return redirect()->route('post.index')->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->post->destroyUser($id);
        }
        catch (Exception $e) {
            return back()->with('error', 'Error deleting data');
        }
        return redirect()->route('post.index')->with('success', 'Data deleted successfully');
    }
}
