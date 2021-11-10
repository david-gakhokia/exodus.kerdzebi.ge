
@extends('backend.layouts.app')

@section('title', 'პროდუქცია')

@section('content')


<div class="row">
    <div class="col-12">
        @if($message = Session::get('success'))
            <div class="alert alert-info alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <strong>Success!</strong> {{ $message }}
            </div>
        @endif
        {!! Session::forget('success') !!}
        <br />
      <div class="card">
            <div class="card-footer text-left">
                <h4 class="text-left">პროდუქციის Excel-ის შაბლონური ფაილი </h4>
                <a href="{{ route('exportProduct', 'xls') }}"><button class="btn btn-success">XLS</button></a>
                <a href="{{ route('exportProduct', 'xlsx') }}"><button class="btn btn-success">XLSX</button></a>
                <a href="{{ route('exportProduct', 'csv') }}"><button class="btn btn-success">CSV</button></a>
                <a href="{{ asset('backend/products/products_template.xlsx') }}">
                    <button class="btn btn-info"><i class="fas fa-file-excel"></i> ნიმუში</button>
                </a>
            </div>
        </div>
    </div>
</div>



@endsection

