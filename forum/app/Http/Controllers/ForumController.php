<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post as Post;
use App\PostThread as PostThread;
use App\PostReply as PostReply;

class ForumController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function show() {
        $threads=PostThread::orderBy('id', 'desc')->get();
        foreach($threads as $thread){
            $thread->replies=PostReply::where('thread_id', $thread->id)->get();
        }
        $data=array(
        	'threads'=>$threads
        );
        return view('forum', $data);
    }
    
    public function npost(Request $request) {
        $postData = array(
    	'user_id'=>Auth::user()->id,
         'thread_id'=>$request->input('thread'),
    	'replyee_id'=>$request->input('replyee'),
    	'post_content'=>$request->input('content'),
        );
        Post::create($postData);
        return redirect('/forum');
    }
}
