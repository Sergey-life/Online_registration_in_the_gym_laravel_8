@extends('layout')

@section('title', 'User: ' . $user->name)

@section('content')
    <a class="btn btn-secondary" type="button" href="{{ route('users.all') }}">Back to users</a>
    <div class="card mt-3" style="width: 18rem;">
        <img src="{{ asset('images') }}/{{ $user->profileImage }}" style="max-width: 300px;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">ID: {{ $user->id }}</li>
            <li class="list-group-item">Name: {{ $user->name }}</li>
            <li class="list-group-item">surname: {{ $user->surname }}</li>
            <li class="list-group-item">phone_number: {{ $user->phone_number }}</li>
            <li class="list-group-item">Email: {{ $user->email }}</li>
            <li class="list-group-item">Monthly Subscription: {{ $user->monthly_subscription }}</li>
            <li class="list-group-item">Discount rate for a year: {{ $user->discount_rate_for_a_year }}</li>
            <li class="list-group-item">Created: {{ $user->created_at->format('d/m/y H:i:s') }}</li>
            <li class="list-group-item">Updated: {{ $user->updated_at->format('d/m/y H:i:s') }}</li>
        </ul>
    </div>
        <a type="button" class="btn btn-danger" href="/delete-user/{{$user->id}}">Delete</a>
        <a type="button" class="btn btn-warning" href="/edit-user/{{$user->id}}">Edit</a>
@endsection