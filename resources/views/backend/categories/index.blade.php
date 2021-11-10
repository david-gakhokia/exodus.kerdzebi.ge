@extends('backend.layouts.app')

@section('title', 'კატეგორიები')

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
                    <h4>კატეგორიები</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                    @foreach ($categories as $key => $category)
                        <li class="list-group-item" style="background-color:#cae9d9a1">
                        <div class="d-flex justify-content-between" >
                            {{ $category->id }} | {{ $category->name_ka }}
                            @auth
                            <div class="button-group ">
                                <a href="{{ url('admin/category/edit/'.$category->id) }}">
                                    <button type="button" class="btn btn-sm btn-primary mr-1 edit-category"><i class="far fa-edit"></i>
                                    </button>
                                </a>

                                <a href="{{ url('admin/category/destroy/'.$category->id) }}"  class="btn btn-danger btn-sm">
                                    <i class="fas fa-times"></i> წაშლა
                                </a>
                            </div>
                            @endauth
                        </div>

                        @if ($category->children)
                            <ul class="list-group mt-2">
                            @foreach ($category->children  as $childKey => $child)
                                <li class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    {{ $child->id }} | {{ $child->name_ka }}
                                    <img src="{{ asset($child->image) }}" alt="" height="70px">

                                    @auth
                                    <div class="button-group">

                                    <a href="{{ url('admin/category/edit/'.$child->id) }}">
                                        <button type="button" class="btn btn-sm btn-primary mr-1 edit-category"><i class="far fa-edit"></i>
                                        </button>
                                    </a>
                                        <a href="{{ url('admin/category/destroy/'.$child->id) }}"  onclick="return confirm('ნამდვილად წავშალო?')"  class="btn btn-sm btn-danger">
                                            <i class="fas fa-times"></i> წაშლა
                                        </a>
                                    </div>
                                    @endauth
                                </div>
                                </li>

                            @endforeach
                            </ul>
                        @endif
                        </li>

                    @endforeach
                    </ul>
                </div>
            </div>
        </div>


        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                  <h4>ახალი კატეგორია</h4>
                </div>
                <form action="{{  route ('store.category') }}" class="needs-validation" novalidate="" method="POST"  enctype="multipart/form-data" >
                        @csrf
                    <div class="card-body">
                    <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="parent_id">შეარჩიე კატეგორია</label>
                                <select class="form-control" name="parent_id">
                                    <option value="">შეარჩიე კატეგორია</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name_ka }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="parent_id">შეარჩიე ფოტო</label>
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" value="{{ old('image') }}">
                                    <label class="custom-file-label" for="customFile">ფოტოს შერჩევა</label>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label>ქართული</label>
                                <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                    <i class="fas fa-marker"></i>
                                    </div>
                                </div>
                                <input type="text" name="name_ka" class="form-control marker">
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label>English</label>
                                <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                    <i class="fas fa-marker"></i>
                                    </div>
                                </div>
                                <input type="text" name="name_en" class="form-control marker">
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label>русский</label>
                                <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                    <i class="fas fa-marker"></i>
                                    </div>
                                </div>
                                <input type="text" name="name_ru" class="form-control marker">
                                </div>
                            </div>

                    </div>

                    </div>
                    <div class="card-footer">
                    <button class="btn btn-primary">დამატება</button>
                    </div>
                </form>
            </div>
        </div>

    </div>



@endsection
