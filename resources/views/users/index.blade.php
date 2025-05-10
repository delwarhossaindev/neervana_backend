@extends('layouts.app')

@section('subtitle', 'Users')
@section('content_header_title', 'User Management')
@section('content_header_subtitle', '')

@section('content_body')
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('users.create') }}" class="btn btn-primary">Add New User</a>
    </div>

    <div class="card">
        <div class="card-header">
           List of all users
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="users-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@stop

@push('js')
    <script>
        $(function() {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('users.index') }}',
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>
@endpush
