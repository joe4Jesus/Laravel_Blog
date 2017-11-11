@extends('main')

@section('title', '| Contact')

@section('content')

<div class="contact">
    <h2>Contact</h2>
    <hr>
    <form>
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
</div>
@endsection