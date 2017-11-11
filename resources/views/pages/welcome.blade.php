@extends('main')

@section('title', '| Homepage')

@section('content')

<div class="row">
    <div class="col-md-12 well">
        <h2>Feature Post Title</h2>
        <p>Some text for the feature text goes here</p>
        <a class="btn btn-primary" href="#">Read More....</a>
    </div>
</div>
<div class="row">
    <div class="col-md-9">
        @foreach ($posts as $post)
        <div class="post well">
            <h2>{{ $post->title }}</h2>
            <p>{{substr($post->body, 0, 200)}}{{strlen($post->body) > 200 ? "...." : "" }}</p>
            <p>{{ date('M j, Y', strtotime($post->created_at)) }}</p>
            <a class="btn btn-primary" href="{{ route('blog.single', $post->slug) }}">Read More.....</a>
        </div>
        @endforeach
    </div>
    <div class="col-md-3 well">
        <h2>Sidebar Content</h2>
        <p>Some content for the sidebar goes here</p>
    </div>
</div>
@endsection