@extends('backend.layouts.app')

@section('title', 'მომხმარებლის დათვალიერება')

@section('content')


<div class="row mt-sm-4">

    <div class="col-12 col-md-12 col-lg-4">

      <div class="card">
        <div class="card-header">
          <h4>როლის დათვალიერება</h4>
        </div>
        <div class="card-body">
          <div class="py-4">
            <p class="clearfix">
              <span class="float-left">
                პრივილეგის სახელი
              </span>
              <span class="float-right text-muted">
                <p class="badge badge-success"> {{ $role->name }}</p>
              </span>
            </p>

            <p class="clearfix">
              <span class="float-left">
                როლების ჩამონათვალი
              </span>
              <span class="float-right text-muted">


            @if(!empty($rolePermissions))
                @foreach($rolePermissions as $v)
                    <p class="badge badge-light">{{ $v->title }}</p>
                    <br>
                @endforeach
            @endif
              </span>
            </p>
          </div>
        </div>
        <div class="card-footer text-right">
            <a class="btn btn-primary" href="{{ url('admin/roles') }}"><i class="fas fa-arrow-circle-left"></i> უკან</a>
        </div>
      </div>
    </div>
</div>



@endsection

