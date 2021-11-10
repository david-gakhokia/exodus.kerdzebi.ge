@extends('auth.layouts.app')

@section('title', 'ავტორიზაცია')

@section('content')
            <div class="card card-primary">
              <div class="card-header">
                <h4>ავტორიზაცია</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                    @csrf
                  <div class="form-group">
                    <label for="email">ელ.ფოსტა</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" tabindex="1" required autocomplete="email" autofocus>
                    <div class="invalid-feedback">
                        შეიყვანეთ ელ.ფოსტა
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">პაროლი</label>
                    </div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2" required autocomplete="current-password">

                    <div class="invalid-feedback">
                      შეიყვანეთ პაროლი!
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input"  id="remember" tabindex="3"  {{ old('remember') ? 'checked' : '' }}>
                      <label class="custom-control-label" for="remember-me">დამახსოვრება</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      შესვლა
                    </button>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('დაგავიწყდა პაროლი?') }}
                        </a>
                    @endif
                  </div>
                </form>
              </div>
            </div>
@endsection
