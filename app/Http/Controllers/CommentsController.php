<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CommentsController extends Controller
{
	public function postComment(Request $request, AppMailer $mailer)
	{
		$this->validate($request,[
			'comment' => 'required'
		]);

		$comment = Comment::create([
			'issue_id' => $request->input('issue_id'),
			'user_id'  => Auth::user()->id,
			'commnet'  => $request->input('comment');
		]);

		if($comment->issue->user->id !== Auth::user()->id)
		{
			$mailer->sendTicketComments($comment->issue->user, Auth::user(), $comment->issue, $comment);
		}

		return redirect()->back()->with("status","Submitted!");
	}    

}
