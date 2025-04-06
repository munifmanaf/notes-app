@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>My Notes</h1>
    <div>
        <a href="/notes/create" class="btn btn-primary">Create Note</a>
        <form action="/logout" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-outline-danger">Logout</button>
        </form>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table id="notesTable" class="table table-striped">
    <thead>
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if(!empty($notes))
        @foreach($notes as $note)
        <tr>
            <td>{{ $note->title }}</td>
            <td>{{ Str::limit($note->content, 50) }}</td>
            <td>{{ $note->created_at->format('Y-m-d H:i') }}</td>
            <td>
                <a href="/notes/edit/{{ $note->id }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="/notes/delete/{{ $note->id }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>
            </td>
        </tr>
        @endif
    </tbody>
</table>

<script>

</script>
@endsection