@extends('layouts.app')

@section('subtitle', 'Edit User')
@section('content_header_title', 'User Management')
@section('content_header_subtitle', 'Edit User')

@section('content_body')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password <small>(Leave blank to keep current)</small></label>
                    <input type="password" name="password" class="form-control">
                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@stop
