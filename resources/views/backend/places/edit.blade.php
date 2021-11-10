@extends('backend.layouts.app')

@section('title', 'ობიექტის რედაქტირება')

@section('content')

    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-left">ობიექტის რედაქტირება</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/place/update/'.$places->id) }}" class="needs-validation" novalidate="" method="POST"  enctype="multipart/form-data" >
                        @csrf

                        <div class="form-group">
                            <input type="text" name="name" class="form-control" value="{{ $places->name }}" placeholder="დასახელება">
                        </div>

                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> განახლება</button>

                            <a href="{{ url('/admin/places')}}" class="btn btn-icon icon-left btn-secondary"><i class="fas fa-backward"></i> გაუქმება </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
