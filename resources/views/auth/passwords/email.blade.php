@extends('auth.layouts.app')

@section('title', 'პაროლის განულება')

@section('content')


    <div class="card card-primary">
        <div class="card-header">
            <h4>პაროლის განულება</h4>
        </div>
        <div class="card-body">
            <p class="text-center text-muted">ჩვენ გამოგიგზავნით ბმულს თქვენი პაროლის აღსადგენად</p>
            <form method="POST">
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



