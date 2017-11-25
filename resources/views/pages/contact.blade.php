@extends('main')

@section('title', '| Contact')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>Contact</h2>
            <hr>
            <form action="{{ url('contact') }}" method="POST">
               {{ csrf_field() }}

                <div class="form-group">
                    <label name="name">Name:</label>
                    <input id="name" name="name" class="form-control">
                </div>       

                <div class="form-group">
                    <label name="email">Email:</label>
                    <input id="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label name="subject">Subject:</label>
                    <input id="subject" name="subject" class="form-control">
                </div>
                <div class="form-group">
                    <label name="message">Message:</label>
                    <textarea id="message" name="message" class="form-control">Type your message ...
                    </textarea>
                </div>
                <input type="submit" value="Click to Submit" class="btn btn-lg btn-success btn-block">
            </form>
        </div>
    </div>
@endsection