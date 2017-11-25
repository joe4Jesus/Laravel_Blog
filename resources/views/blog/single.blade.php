@extends('main')

@section('title', "| $post->title")

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<img src="{{ asset('images/' . $post->image) }}" height="400px" width="800px" alt="post image">
			<h1>{{ $post->title }}</h1>
			<p>{!! $post->body !!}</p>
			<hr>
			<p>Created In: {{ $post->category->name }}</p>
			
			<div class="tags">
				@foreach($post->tags as $tag)
					<span class="label label-default">{{ $tag->name }}</span>
				@endforeach
			</div>

		</div>

		<div class='row'>
			<div class='col-md-8 col-md-offset-2'>
				<h3 class="comment-heading"><span class="glyphicon glyphicon-comment"></span>  {{ $post->comments()->count() }}  Comments:</h3>
				@foreach ($post->comments as $comment) 
				<div class="comment">
					<div class="author-info">
						<img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) }}" class="author-image">
						<div class="author-name">
							<h4>{{ $comment->name }}</h4>
							<p>{{ date('M j, Y h:i A', strtotime($comment->created_at)) }}</p>
						</div>
					</div>

					<div class="comment-content">
						{{ $comment->comment }}
					</div>
				</div>

				@endforeach
		</div>



		<div id="comments" class="row">
			<div class="col-md-8 col-md-offset-2">
				{{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}

					{{ Form::label('name', 'Name:') }}
					{{ Form::text('name', null, ['class' => 'form-control']) }}

					{{ Form::label('email', 'Email:') }}
					{{ Form::text('email', null, ['class' => 'form-control']) }}

			<div class="row">
				<div class="col-md-12">
					{{ Form::label('comment', 'Your Comment:') }}
					{{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}

					{{ Form::submit('Comment', ['class' => 'form-control btn btn-success btn-block margin-top']) }}
				</div>
			</div>

				{{ Form::close() }}
			</div>
		</div>

	</div>

@endsection