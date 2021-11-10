@extends('backend.layouts.app')

@section('title', 'კატეგორიის რედაქტირება')

@section('content')

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
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
            <div class="card">
                <div class="card-header">
                  <h4>კატეგორიის რედაქტირება</h4>
                </div>
                <form action="{{ url('admin/category/update/'.$category->id) }}" class="needs-validation" novalidate="" method="POST"  enctype="multipart/form-data" >
                    @csrf
                    <input type="hidden"  name="old_image" value="{{ $category->image }}">

                    <div class="card-body">
                        <div class="form-row">

                            <div class="form-group col-md-4">
                                <label for="parent_id">შეარჩიე კატეგორია</label>
                                <select class="form-control" name="parent_id">
                                    <option value="" >მშობელი კატეგორია</option>
                                    @foreach($categories as $key => $cat)

                                        <option value="{{$cat->id}}"  {{$category->parent_id == $cat->id ? 'selected':''}}>{{$cat->name_ka}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="parent_id">შეარჩიე ფოტო</label>
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" value="{{ $category->image }}">
                                    <label class="custom-file-label" for="customFile">ფოტოს შერჩევა</label>
                                </div>
                            </div>

                            <div class="form-group col-md-4 mb-10">

                                <div class="custom-file">
                                    <img src="{{ asset($category->image) }}" width="20%" alt="">
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
                                    <input type="text" name="name_ka"  value="{{ $category->name_ka }}" class="form-control marker">
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
                                    <input type="text" name="name_en"  value="{{ $category->name_en }}" class="form-control marker">
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
                                    <input type="text" name="name_ru"  value="{{ $category->name_ru }}" class="form-control marker">
                                </div>
                            </div>

                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> განახლება</button>

                            <a href="{{ url('/admin/categories')}}" class="btn btn-icon icon-left btn-secondary"><i class="fas fa-backward"></i> გაუქმება </a>
                        </div>
                    </div>

                    <input type="hidden"  name="category_id" value="{{ $category->id }}">
                    @csrf
                </form>
            </div>
        </div>

    </div>

@endsection
