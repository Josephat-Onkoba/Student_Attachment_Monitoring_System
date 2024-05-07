<!-- resources/views/notes/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container">
        <hr>
        <div class="text-right">
            <button type="button" class="btn btn-primary ml-2">
                <a href="{{ url('/staff/notes/view') }}" style="color: white; text-decoration: none;">
                    <i class="fas fa-list"></i> View your notes
                </a>
            </button>
        </div>

        <h2>Add a Note</h2>
        @include('_messages')
        <form action="/staff/notes/add" method="post">
            {{@csrf_field()}}
            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" class="form-control" id="subject" name="subject">
            </div>
            <div class="form-group">
                <label for="content">Write your note:</label>
                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
            </div>
            <div class="text-left">
                <button type="submit" class="btn btn-primary">
                    <a href="{{ url('/staff/notes/view') }}" style="color: white; text-decoration: none;">
                        <i class="fas fa-plus-circle"></i> Add a note
                    </a>
                </button>
            </div>
        </form>
    </div>
</div>
>
@endsection