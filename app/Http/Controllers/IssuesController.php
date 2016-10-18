<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Issue;
use App\User;
use App\Http\Requests;
use App\Category;
use App\Mailers\AppMailer;

class IssuesController extends Controller
{
    public function create()
    {
    	$categories = Category::all();
    	return view('issues.create', compact('categories'));
    }

    public function store(Request $request, AppMailer $mailer)
    {
    	$this->validate($request, [
    		'title' => 'required',
    		'category' => 'required',
    		'priority' => 'required',
    		'message' => 'required'
    	]);

    	$issue = new Issue([
    		'title' => $request->input('title'),
    		'user_id' => Auth::user()->id,
    		'issue_id' => strtoupper(str_random(10)),
    		'category_id' => $request->input('category'),
    		'priority' => $request->input('priority'),
    		'message' => $request->input('message'),
    		'status' => "Open",
    	]);

    	$issue->save();
    	$mailer->sendIssueInformation(Auth::user(), $issue);

    	return redirect()->back()->with("status","Issue has been added");
    }

    public function userIssues()
    {
    	$issues = Issue::where('user_id', Auth::user()->id)->paginate(15);
    	$categories = Category::all();

    	return view('issues.user_issues', compact('issues','categories'));
    }

    public function show($issue_id)
    {	
    	$issue = Issue::where('issue_id', $issue_id)->firstOrFail();

    	$category = $issue->category;
    	return view('issues.show', compact('issue', 'category'));
    }
}
