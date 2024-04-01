<!-- resources/views/notes/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="content-wrapper">
<div class="container">
    <h2>Edit Note</h2>
    @include('_messages')
    <form action="{{ route('notes.update', $note->id) }}" method="post">
    {{@csrf_field()}}
        @method('PUT')
        <div class="form-group">
            <label for="subject">Subject:</label>
            <input type="text" class="form-control" id="subject" name="subject" value="{{ $note->subject }}">
        </div>
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea class="form-control" id="content" name="content" rows="3">{{ $note->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Note</button>
    </form>
</div>
</div>
@endsection
