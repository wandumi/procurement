<?php

namespace App\Http\Controllers;

use App\Rfq;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addRfqComment(Request $request, Rfq $rfq)
    {
        // dd($request->all());
        // $comment = Rfq::with('comments')->get();

        // dd($comment);
        
        // $this->validate($request, [
        //     'comment' => 'required',
        // ]);

        $comment = new Comment();
        $comment->body = $request->comment;
        $comment->user_id = Auth::id();
        
        
        //save the relationship
        $rfq->comments()->save($comment);

        return redirect()->route('rfqs.index')->withMessage('Comment added...');
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        if($comment->user_id !== auth::id)
            abort('401');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        if($comment->user_id !== auth::id)
            abort('401');
        
          
        $comment->delete();

        return redirect()->route('Rfq.index')->withMessage('Comment Deleted');
    }
}
