@extends('backend.layouts.app')
@section('title', 'Ticket Management')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Tickets</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tickets</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Ticket List</h3>
                            @if (!Auth::user()->isAdmin())
                                <a href="{{ route('tickets.create') }}" class="btn btn-primary float-end">Create Ticket</a>
                            @endif
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Subject</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        @if (Auth::user()->isAdmin())
                                            <th>Actions</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tickets as $ticket)
                                        <tr class="align-middle">
                                            <td>{{ $loop->iteration }}</td>
                                            <td><a href="{{ route('tickets.show', $ticket->id) }}">{{ $ticket->subject }}</a></td>
                                            <td>{{ Str::limit($ticket->description, 50) }}</td>
                                            <td>{{ ucfirst($ticket->status) }}</td>
                                            <td>{{ $ticket->created_at->format('Y-m-d H:i') }}</td>
                                            @if (Auth::user()->isAdmin())
                                                <td>
                                                    @if ($ticket->status == 'open')
                                                        <form action="{{ route('tickets.close', $ticket->id) }}" method="POST" style="display: inline-block;">
                                                            @csrf
                                                            @method('PATCH') <!-- Change POST to PATCH -->
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to close this ticket?');">Close</button>
                                                        </form>
                                                    @endif

                                                    @if ($ticket->status == 'closed')
                                                        <form action="{{ route('tickets.reopen', $ticket->id) }}" method="POST" style="display: inline-block;">
                                                            @csrf
                                                            @method('PATCH') <!-- Change POST to PATCH -->
                                                            <button type="submit" class="btn btn-info btn-sm text-white" onclick="return confirm('Are you sure you want to reopen this ticket?');">Reopen</button>
                                                        </form>
                                                    @endif

                                                    <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-warning btn-sm" onclick="return confirm('Are you sure you want to delete this ticket?');">Delete</button>
                                                    </form>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('styles')
    <style>

    </style>
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
           
        });
    </script>
@endpush
