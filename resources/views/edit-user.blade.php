@extends('layout')

@section('title', isset($user) ? 'Update: ' . $user->name : 'Регистрация пользователя')

@section('content')
    <a class="btn btn-secondary" type="button" href="{{ route('users.all') }}">Back to users</a>
    @if(Session::has('user_updated'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('user_updated') }}
        </div>
    @endif
    <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data" class="mt-3">
        @csrf
        <input type="hidden" name="id" value="{{ $user->id }}">
        <div class="row">
            <div class="col">
                <input name="name"
                       value="{{ old('name', isset($user) ? $user->name : null ) }}"
                       type="text" class="form-control" placeholder="Name" aria-label="name">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <input name="surname"
                       value="{{ old('surname', isset($user) ? $user->surname : null) }}"
                       type="text" class="form-control" placeholder="surname" aria-label="surname">
                @error('surname')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <input name="phone_number"
                       value="{{ old('phone_number', isset($user) ? $user->phone_number : null) }}"
                       type="number" class="form-control" placeholder="phone_number" aria-label="phone_number">
                @error('phone_number')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <input name="email"
                       value="{{ old('email', isset($user) ? $user->email : null) }}"
                       type="text" class="form-control" placeholder="Email" aria-label="email">
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <label for="">Monthly subscription</label>
                <select name="monthly_subscription" id="monthly_subscription"> <!--Supplement an id here instead of using 'name'-->
                    <option value="{{ old('monthly_subscription', isset($user) ? $user->monthly_subscription : null) }}" selected>{{ $user->monthly_subscription }}</option>
                    <option value="subscription_1">Subscription 1</option>
                    <option value="subscription_2">Subscription 2</option>
                </select>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <label for="">Discount rate for a year</label>
                <select name="discount_rate_for_a_year" id="discount_rate_for_a_year"> <!--Supplement an id here instead of using 'name'-->
                    <option value="{{ old('discount_rate_for_a_year', isset($user) ? $user->discount_rate_for_a_year : null )}}" selected>{{ $user->discount_rate_for_a_year }}</option>
                    <option value="{{ null }}">No</option>
                    <option value="Discount_1">Discount 1</option>
                    <option value="Discount_2">Discount 2</option>
                </select>
            </div>
        </div>
        <div class="row mt-3">
            <div class="form-group">
                <label for="file">Chose profile image</label>
                <input type="file" name="file" class="form-control" onchange="previewFile(this)">
                <img id="previewImg" alt="profile image" src="{{ asset('images') }}/{{ $user->profileImage }}" style="max-width: 130px;margin-top: 20px">
            </div>
        </div>
        <div class="row mt-5 text-center">
            <div class="col">
                <button type="submit" class="btn btn-success">Сохранить</button>
            </div>
        </div>
    </form>
@endsection
