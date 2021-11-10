@extends('backend.layouts.app')

@section('title', 'მომხმარებლის დათვალიერება')

@section('content')


<div class="row mt-sm-4">

    <div class="col-12 col-md-12 col-lg-6">

      <div class="card">
        <div class="card-header">
          <h4>პერსონალური ინფორმაცია</h4>
        </div>
        <div class="card-body">
          <div class="py-4">
            <p class="clearfix">
              <span class="float-left">
                სახელი
              </span>
              <span class="float-right text-muted">
                {{ $user->name }}
              </span>
            </p>
            <p class="clearfix">
              <span class="float-left">
                ელ.ფოსტა
              </span>
              <span class="float-right text-muted">
                {{ $user->email }}
              </span>
            </p>
            <p class="clearfix">
              <span class="float-left">
                პოზიცია
              </span>
              <span class="float-right text-muted">
                @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                        <label class="badge badge-light">{{ $v }}</label>
                    @endforeach
                @endif
              </span>
            </p>
          </div>
        </div>
        <div class="card-footer text-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"><i class="fas fa-arrow-circle-left"></i> უკან</a>
        </div>
      </div>
    </div>
</div>



@endsection

