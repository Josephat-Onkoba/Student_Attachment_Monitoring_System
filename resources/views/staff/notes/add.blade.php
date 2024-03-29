<!-- resources/views/notes/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container">
        <hr>

        <h2>Add a Note</h2>
        <form action="/staff/notes/add" method="post">
            @csrf
            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" class="form-control" id="subject" name="subject">
            </div>
            <div class="form-group">
                <label for="content">Write your note:</label>
                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Note</button>
            <button type="button" class="btn btn-primary">
                <a href="{{ url('/staff/notes/view') }}" style="color: white; text-decoration: none;">View your notes</a>
            </button>

        </form>
    </div>
</div>
>
@endsection