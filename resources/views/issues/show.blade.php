@extends('layouts.app')

@section('title', $issue->title)

@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
                <div class="panel-heading">
                    #{{ $issue->issue_id }} - {{ $issue->title }}
                </div>

                <div class="panel-body">
                    @include('includes.flash')

                    <div class="ticket-info">
                    	<p>{{ $issue->message }}</p>
                    	<p>Category: {{ $category->name }}</p>
                    	<p>
                    		@if($issue->status ==='Open')
                    			Status: <span class="label label-success">{{ $issue->status }}</span>
                    		@else
                    			Status: <span class="label label-danger">{{ $issue->status }}</span>
                    		@endif
                    	</p>
                    	 <p>Created on: {{ $issue->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            <div>
		</div>
	</div>
@endsection