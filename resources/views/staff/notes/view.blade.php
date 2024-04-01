<!-- resources/views/notes/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <button type="button" class="btn btn-primary mt-4 ml-4">
        <a href="{{ url('/staff/notes/add') }}" style="color: white; text-decoration: none;">Add a note</a>
    </button>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Your Notes</div>

                    <div class="card-body">
                        @if ($notes->count() > 0)
                        <ul class="list-group">
                            @foreach ($notes as $note)
                            <li class="list-group-item">
                                <h5 class="card-title"><b>{{ $note->subject }}</b></h5>
                                <p class="card-text">{{ $note->content }}</p>
                                <p class="card-text"><small class="text-muted">
                                        @if ($note->created_at == $note->updated_at)
                                        Created at: {{ $note->created_at }}
                                        @else
                                        Updated at: {{ $note->updated_at }}
                                        @endif
                                    </small></p>
                                <div class="btn-group" role="group">
                                    <form action="{{ route('notes.destroy', $note->id) }}" method="post">
                                        {{@csrf_field()}}
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger" title="Delete Note">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="btn-group ml-2" role="group">
                                    <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-link text-primary" title="Edit Note">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </div>

                            </li>
                            @endforeach
                        </ul>
                        @else
                        <p class="text-center">No notes found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection