@extends('layouts.app')

@section('title', 'My Issues')

@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-issue"> My Reported Issues</i>
				</div>

				<div class="panel-body">
					@if($issues->isEmpty())
						<p>No reported issues yet!</p>
					@else
						<table class="table">
							<thead>
								<tr>
									<th>Title</th>
									<th>Category</th>
									<th>Status</th>
									<th>Last Updated</th>
								</tr>
							</thead>
							<tbody>
								@foreach($issues as $issue)
									<tr>
										<td>
											<a href="{{ url('issues/'.$issue->issue_id) }}">
												{{ $issue->title }}
											</a>
										</td>

										<td>
											@foreach($categories as $category)
												@if($category->id === $issue->category_id)
													{{ $category->name }}
												@endif
											@endforeach
										</td>

										<td>
											@if ($issue->status === 'Open')
												<span class="label label-success">{{ $issue->status}}</span>
											@else
												<span class="label label-danger">{{ $issue->status}}</span>
											@endif
										</td>

										<td>{{ $issue->updated_at }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						{{ $issues->render() }}
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection