@extends('main')

@section('title', ' | Edit Post')

@section('stylesheet')
    {!! Html::style('css/select2.min.css') !!}
    <!-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    Html::script('js/tinymce/jquery.tinymce.min.js')-->
    {!! Html::script('js/tinymce/tinymce.min.js') !!}

    <script>
        tinymce.init({ 
            selector:'textarea', 
            plugins: 'link code',
            menubar: false,
        });
    </script>

@endsection


@section('content')
	<div class="row">
		{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => true]) !!}
		<div class="col-md-8">
			{{ Form::label('title', 'Title:') }}
			{{ Form::text('title', null, ['class' => 'form-control input-lg', 'required', 'maxlength'=>'255']) }}

			{{ Form::label('slug', 'Url:', ['class'=>'margin-top']) }}
			{{ Form::text('slug', null, ['class' => 'form-control input-lg', 'required', 'minlength'=>'5', 'maxlength'=>'255']) }}

			{{ Form::label('category_id', 'Category:', ['class'=>'margin-top']) }}
			{{ Form::select('category_id', $categories, null, ['class'=>'form-control']) }}

            {{ Form::label('tags', 'Tags:', ['class' => 'margin-top']) }}
 			{{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}

 			{{ Form::label('featured_image', 'Change Image: ', ['class' => 'margin-top']) }}
 			{{ Form::file('featured_image') }}

			{{ Form::label('body', 'Body', ['class' => 'margin-top'])}}
			{{ Form::textarea('body', null, ['class' => 'form-control', 'required']) }}
		</div>
		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>Created At:</dt>
					<dd> {{ date('M j, Y h:i A', strtotime($post->created_at)) }} </dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Updated At:</dt>
					<dd> {{ date('M j, Y h:i A', strtotime($post->updated_at))}} </dd>
				</dl> 
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
					</div>
					<div class="col-sm-6">
						{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
					</div>
				</div>
			</div>
		</div>
		{!! Form::close() !!}
	</div>

@endsection

@section('script')
    {!! Html::script('js/select2.min.js') !!}

    <script type="text/javascript">
        $(document).ready(function() {
        $('.select2-multi').select2();
        });
    </script>

@endsection