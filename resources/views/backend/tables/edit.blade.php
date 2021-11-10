@extends('backend.layouts.app')

@section('title', 'მაგიდები')

@section('content')
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-2 " role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>მაგიდის რედაქტირება</h4>
                </div>
                <div class="card-body">
                    @auth
                        <form action="{{ url('admin/table/update/'.$tables->id) }}" class="needs-validation" novalidate="" method="POST"  enctype="multipart/form-data" >
                        {{-- <form action="{{ url('admin/place/update/'.$places->id) }}" class="needs-validation" novalidate="" method="POST"  enctype="multipart/form-data" > --}}

                            @csrf
                            <div class="form-group">
                                <input type="number" name="name" class="form-control" value="{{ $tables->name }}" placeholder="მაგიდის ნომერი" required>

                                        @error ('brand_name')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                            </div>

                            <div class="form-group">
                                <label for="place_id">მდებარეობა</label>
                                <select class="form-control select2" name="place_id">
                                    @foreach ($places as $place)
                                        <option value="{{ $place->id }}" {{ $place->id === $tables->place_id ? 'selected' : '' }} > {{ $place->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>სტატუსი</label>
                                <select name="status" class="form-control" required="">
                                    <option value="1">აქტიური</option>
                                    <option value="0">არა ქტიური</option>
                                </select>
                                <div class="invalid-feedback">
                                უპსს ! სტატუსი სავალდებულოა!
                                </div>
                            </div>

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> განახლება</button>

                                <a href="{{ url('/admin/tables')}}" class="btn btn-icon icon-left btn-secondary"><i class="fas fa-backward"></i> გაუქმება </a>
                            </div>
                        </form>
                    @endauth
                </div>
            </div>
        </div>


    </div>

@endsection

