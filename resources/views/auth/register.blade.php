@extends('auth.layouts.app')

@section('title', 'რეგისტრაცია')


@section('content')


<div class="card card-primary">
    <div class="card-header">
      <h4>რეგისტრაცია შეზღუდულია!</h4>
    </div>
    <div class="card-body">
        <div class="alert alert-light alert-has-icon">
            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
            <div class="alert-body">
              <p> სამწუხაროდ რეგისტრაცია შეუძლებელია! </p>
            </div>
        </div>
        <a class="btn btn-link" href="{{ route('login') }}">
            {{ __('ავტორიზაცია') }}
        </a>
    </div>
  </div>

@endsection



