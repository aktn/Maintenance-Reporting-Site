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

                    <div class="comments">
                        @foreach($comments as $comment)
                            <div class="panel panel-@if($issue->user->id === $comment->user_id) {{ "default" }}
                                                    @else{{ "success" }}
                                                    @endif">
                                <div class="panel panel-heading">
                                    {{ $comment->user->name }}
                                    <span class="pull-right">{{ $comment->created_at->format('Y-m-d') }}</span>
                                </div>

                                <div class="panel panel-body">
                                    {{ $comment->comment }}
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="comment-form">
                        <form action="{{ url('comment') }}" class="form" method="POST">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('comment') ? 'has-error' : ''}}">
                                <textarea id="comment" class="form-control" rows="8" name="comment"></textarea>

                                @if($errors->has('comment'))
                                    <span>
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                                @endif
                            </div> 
                            <input type="hidden" name="issue_id" value="{{ $issue->id }}">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            <div>
		</div>
	</div>
@endsection