
@extends('backend.layouts.app')

@section('title', 'პროდუქციის იმპორტი')

@section('content')


<div class="row">
    <div class="col-12">
      <div class="card">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-2 " role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif


            @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show mb-2 " role="alert">
                <p>ეს ველი სავალდებულოა:</p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="card-footer text-left">
                <h4 class="text-left">პროდუქციის იმპორტი Excel -დან</h4>
                <form style="border: 0px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ route('importProduct') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input  class="btn btn-primary" type="file"  required name="import_file" />
                    <button class="btn btn-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8">
                        </polyline>
                        </svg>
                        იმპორტი
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

