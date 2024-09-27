@extends('backend.layouts.app')
@section('title', 'Ticket Details')

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
                    <h3 class="mb-0">Ticket Details</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ route('tickets.index') }}">Tickets</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ticket #{{ $ticket->id }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('tickets.index') }}" class="btn btn-secondary mb-3">Back to Tickets</a>
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">{{ $ticket->subject }}</h3>
                        </div>
                        <div class="card-body">
                            <p><strong>Description:</strong> {{ $ticket->description }}</p>
                            <p><strong>Status:</strong> {{ ucfirst($ticket->status) }}</p>
                            <p><strong>Created At:</strong> {{ $ticket->created_at->format('Y-m-d H:i') }}</p>

                            <h5>Responses</h5>
                            <ul>
                                @foreach ($ticket->responses as $response)
                                    <li>{{ $response->response }} - <small>by {{ $response->user->name }} on {{ $response->created_at->format('Y-m-d H:i') }}</small></li>
                                @endforeach
                            </ul>

                            @if (Auth::user()->isAdmin() || Auth::id() === $ticket->user_id)
                                <h5>Add Response</h5>
                                <form action="{{ route('responses.store', $ticket->id) }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <textarea class="form-control" name="response" rows="3" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit Response</button>
                                </form>
                            @endif
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
