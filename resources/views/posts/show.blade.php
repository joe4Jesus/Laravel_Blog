@extends('main')

@section('title', ' | View Post')

@section('content')
	<div class="row">
		<div class="col-md-8">
			<img src="{{ asset('images/' . $post->image) }}" height="400px" width="800px" alt="post image">
			<h1> {{ $post->title }} </h1>

			<p class="lead">
				{!! $post->body !!}
			</p>


		<div class="tags">
			@foreach($post->tags as $tag)
				<span class="label label-default">{{ $tag->name }}</span>
			@endforeach
		</div>

		<div id="backend-comments" style="margin-top: 50px;">
			<h3>Comments <small>{{ $post->comments()->count() }} total</small></h3>

			<table class="table">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Comment</th>
						<th width="100px"></th>
					</tr>
				</thead>

				<tbody>
					@foreach ($post->comments as $comment)
					<tr>
						<td>{{ $comment->name }}</td>
						<td>{{ $comment->email }}</td>
						<td>{{ $comment->comment }}</td>
						<td>
							<a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary">Edit</a>
							{{ Form::open(['route'=>['comments.destroy', $comment->id], 'method' => 'DELETE']) }}
								{{ Form::submit('Delete', ['class'=>'btn btn-xs btn-danger']) }}
							{{ Form::close() }}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>

		</div>


		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<label>Url:</label>
					<p><a href="{{ url('blog/'.$post->slug) }}">{{ url('blog/'.$post->slug) }}</a></p>
				</dl>

				<dl class="dl-horizontal">
					<label>Category:</label>
					<p>{{ $post->category->name }}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>Created At:</label>
					<p> {{ date('M j, Y h:i A', strtotime($post->created_at)) }} </p>
				</dl>
				<dl class="dl-horizontal">
					<label>Updated At:</label>
					<p> {{ date('M j, Y h:i A', strtotime($post->updated_at))}} </p>
				</dl>
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
					</div>
					<div class="col-sm-6">
						{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!} 

						{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block'])}}

						{!! Form::close() !!}
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						{{ Html::linkRoute('posts.index', 'View All Post', [], ['class'=>'btn btn-default btn-block btn-h1-spacing'])}}
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection

