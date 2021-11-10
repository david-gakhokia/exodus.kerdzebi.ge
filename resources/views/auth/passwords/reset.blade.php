@extends('auth.layouts.app')

@section('title', 'ახალი პაროლის გაგზავნა')

@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h4>პაროლის განახლება</h4>
    </div>
    <div class="card-body">
      <p class="text-muted">შეიყვანეთ ახალი პაროლი</p>
      <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-group">
          <label for="email">ელ.ფოსტა</label>
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="password">ახალი პაროლი</label>
          <input id="password" type="password" class="form-control pwstrength @error('password') is-invalid @enderror" data-indicator="pwindicator"
            name="password" tabindex="2" required autocomplete="new-password">
            {{-- <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"> --}}

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

          <div id="pwindicator" class="pwindicator">
            <div class="bar"></div>
            <div class="label"></div>
          </div>
        </div>
        <div class="form-group">
          <label for="password-confirm">პაროლის დადასტურება</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" tabindex="2" required autocomplete="new-password">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-success btn-lg btn-block" tabindex="4">
            განახლება
          </button>
        </div>
      </form>
    </div>
  </div>


@endsection

