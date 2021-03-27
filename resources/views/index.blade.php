@extends('layout')

@section('title', 'Users')

@section('content')
    <a class="btn btn-primary"role="button" href="{{ route('user.store') }}">Create user</a>

    <table class="table table-sm">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">profileImage</th>
            <th scope="col">name</th>
            <th scope="col">surname</th>
            <th scope="col">phone_number</th>
            <th scope="col">email</th>
            <th scope="col">monthly_subscription</th>
            <th scope="col">discount_rate_for_a_year</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>
                    <a href="{{ route('user.show', $user) }}"><img src="{{ asset('images') }}/{{ $user->profileImage }}" style="max-width: 60px;"></a>
                </td>
                <td>
                    <a href="{{ route('user.show', $user) }}">{{ $user->name }}</a>
                </td>
                <td>
                    <a href="{{ route('user.show', $user) }}">{{ $user->surname }}</a>
                </td>
                <td>
                    <a href="{{ route('user.show', $user) }}">{{ $user->phone_number }}</a>
                </td>
                <td>
                    <a href="{{ route('user.show', $user) }}">{{ $user->email }}</a>
                </td>
                <td>
                    <a href="{{ route('user.show', $user) }}">{{ $user->monthly_subscription }}</a>
                </td>
                <td>
                    <a href="{{ route('user.show', $user) }}">{{ $user->discount_rate_for_a_year }}</a>
                </td>
                <td>
                    <a type="button" class="btn btn-danger  " href="/delete-user/{{$user->id}}">Delete</a>
                    <a type="button" class="btn btn-info" href="/edit-user/{{$user->id}}">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection