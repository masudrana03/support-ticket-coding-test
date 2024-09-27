@extends('backend.layouts.app')
@section('title', 'Create Ticket')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Create Ticket</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ route('tickets.index') }}">Tickets</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid"> <!--begin::Row-->
        <div class="row g-4"> <!--begin::Col-->
            <div class="col-md-12"> <!--begin::Form-->
                <div class="card card-primary card-outline mb-4"> <!--begin::Header-->
                    <div class="card-header">
                        <div class="card-title">Ticket Form</div>
                    </div> <!--end::Header-->
                    <form action="{{ route('tickets.store') }}" method="POST"> <!--begin::Body-->
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control" name="subject" id="subject" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description" rows="4" required></textarea>
                            </div>
                        </div> <!--end::Body-->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Create Ticket</button>
                        </div> <!--end::Footer-->
                    </form> <!--end::Form-->
                </div> <!--end::Quick Example-->
            </div> <!--end::Col-->
        </div> <!--end::Row-->
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
