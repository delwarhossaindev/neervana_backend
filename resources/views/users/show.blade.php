@extends('layouts.app')

@section('subtitle', 'User Details')
@section('content_header_title', 'User Management')
@section('content_header_subtitle', 'View User')

@section('content_body')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">User Information</h3>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $user->id }}</p>
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Email Verified At:</strong> {{ $user->email_verified_at ?? 'Not Verified' }}</p>
            <p><strong>Created At:</strong> {{ $user->created_at }}</p>
            <p><strong>Updated At:</strong> {{ $user->updated_at }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
@stop
