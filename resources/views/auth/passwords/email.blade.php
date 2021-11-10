@extends('auth.layouts.app')

@section('title', 'ახალი პაროლის გაგზავნა')

@section('content')


    <div class="card card-primary">
        <div class="card-header">
            <h4>ახალი პაროლის გაგზავნა</h4>
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                   <p style="color: white">{{ session('status') }}</p>
                </div>
            @endif
            <p class="text-center text-muted">ჩვენ გამოგიგზავნით ბმულს თქვენი პაროლის აღსადგენად</p>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group">
                    <label for="email">ელ.ფოსტა</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        გაგზავნა
                    </button>
                    <a class="btn btn-link" href="{{ route('login') }}">
                        {{ __('ავტორიზაცია') }}
                    </a>
                </div>
            </form>
        </div>
    </div>


@endsection



