@extends('main')

@section('title', "| All Tags")

@section('stylesheet')
    {!! Html::style('css/select2.min.css') !!}
@endsection

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h1>Tags</h1>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($tags as $tag)
					<tr>
						<th>{{ $tag->id }}</th>
						<td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td> 
					</tr>
					@endforeach
			</table>
		</div> <!-- end of col-md-8 -->

		<div class="col-md-3">
			<div class="well">
				{!! Form::open(['route' => 'tags.store', 'method'=> 'POST']) !!}
				<h2>New Tag</h2>
				{{ Form::label('name', 'Name:') }}
				{{ Form::text('name', null, ['class' => 'form-control']) }}

				{{ Form::submit('Create New Tag', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}
			</div>
		</div>
	</div>

@endsection

@section('script')
	{!! Html::script('js/select2.min.js') !!}
@endsection