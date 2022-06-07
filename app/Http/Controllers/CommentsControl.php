<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Recenzja;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentsControl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $comment = new Comment();
        return view('komentarzForm',['comment' => $comment, 'post_id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'message' => 'required|min:10|max:255',
        ]);

        if( Auth::user() == null){
            return view('welcome');
        }
        $comment = new Comment;
        $comment->user()->associate($request->user());
        $comment->message = $request->get('message');
        $comment->post_id = $request->get('post_id');
        $review = Recenzja::find($request->get('post_id'));
        if($review->comments()->save($comment))
        {
            return view('kategorie');
        }
        return view('kategorie');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        if(Auth::user()->id != $comment->user->id)
        {
            return back();
        }
        if($comment->delete()){

            return back();
        }
        else return back();
    }
}
