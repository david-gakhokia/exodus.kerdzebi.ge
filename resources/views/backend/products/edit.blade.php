@extends('backend.layouts.app')

@section('title', 'პროდუქტის დამატება')

@section('content')
    <script language=Javascript>

       function latitude(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
       function longitude(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }

    </script>

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

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <form action="{{ route('product.update') }}" class="needs-validation" novalidate="" method="POST"  enctype="multipart/form-data" >
                    @csrf
                    <input type="hidden"  name="old_image" value="{{ $products->image }}">
                    <input type="hidden"  name="id" value="{{ $products->id }}">

                    <div class="card-header">
                        <h4>პროდუქციის რედაქტირება </h4>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-4 form-group">
                                <label>დასახელება (ქართული) </label>
                                <input type="text"  name="name_ka" class="form-control"   value="{{ $products->name_ka }}" placeholder="ქართული" required="">
                                <div class="invalid-feedback">
                                უპსს ! დასახელება სავალდებულოა!
                                </div>
                            </div>
                            <div class="col-4 form-group">
                                <label>დასახელება (English) </label>
                                <input type="text"  name="name_en" class="form-control" value="{{ $products->name_en }}" placeholder="English">
                                <div class="invalid-feedback">
                                უპსს ! დასახელება სავალდებულოა!
                                </div>
                            </div>
                            <div class="col-4 form-group">
                                <label>დასახელება (русский) </label>
                                <input type="text"  name="name_ru" class="form-control" value="{{ $products->name_ru }}" placeholder="русский">
                                <div class="invalid-feedback">
                                უპსს ! დასახელება სავალდებულოა!
                                </div>
                            </div>



                            <div class="col-3 form-group">
                                <label for="category_id">კატეგორია</label>
                                <select class="form-control select2" name="category_id" required>
                                    <option value="" disabled>აირჩიეთ კატეგორია</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id === $products->category_id ? 'selected' : '' }}>{{ $category->name_ka }}</option>
                                            @if ($category->children)
                                                @foreach ($category->children as $child)
                                                    <option value="{{ $child->id }}" {{ $child->id === $products->category_id ? 'selected' : '' }}>&nbsp;&nbsp;{{ $child->name_ka }}</option>
                                                @endforeach
                                            @endif
                                        @endforeach
                                </select>
                                <div class="invalid-feedback">
                                უპსს ! კატეგორია სავალდებულოა!
                                </div>
                            </div>
                            <div class="col-3 form-group">
                                <label>ნუმერაცია</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">
                                        <i class="fab fa-autoprefixer"></i>
                                      </div>
                                    </div>
                                  <input type="text" name="numeric" class="form-control phone-number" placeholder="ნუმერაცია"  value="{{ $products->numeric }}">
                                      <div class="invalid-feedback">
                                          უპსს ! ფასი სავალდებულოა!
                                      </div>
                                  </div>
                            </div>
                            <div class="col-3 form-group">
                                <label>სტატუსი</label>
                                <select name="status"   value="{{$products->status }}" class="form-control" required="">
                                    <option value="1">აქტიური</option>
                                    <option value="0">არაქტიური</option>
                                </select>
                                <div class="invalid-feedback">
                                უპსს ! სტატუსი სავალდებულოა!
                                </div>
                            </div>

                            <div class="col-3 form-group">
                                <label>ფასი</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">
                                      <i class="fas fa-money-bill-wave"></i>
                                    </div>
                                  </div>
                                <input type="number" step="0.01" name="price" class="form-control phone-number" placeholder="ფასი"  value="{{ $products->price }}" required="">
                                    <div class="invalid-feedback">
                                        უპსს ! ფასი სავალდებულოა!
                                    </div>
                                </div>
                            </div>

                            <div class="col-4 form-group">
                                <label>სურათი</label>
                                <div class="custom-file">
                                <input type="file" name="image"  id="image"  class="custom-file-input" >
                                <label class="custom-file-label" for="image">ფოტოს ატვირთვა</label>
                                </div>
                            </div>
                            <div class="col-6 form-group">
                                {{-- <label>სურათი</label> --}}
                                <div class="input-group">
                                    @if ($products->image)
                                        <img src="{{ asset($products->image) }}" width="200px" alt="">
                                    @else
                                        <img src="{{ asset('frontend/images/no-image.png') }}" width="200px" alt="">
                                    @endif
                                </div>

                            </div>




                            <div class="col-12 form-group mb-2">
                                <label>აღწერა (ქართულად)</label>
                                <textarea class="form-control" name="description_ka">{{ $products->description_ka }}</textarea>
                                <div class="invalid-feedback">
                                    უპსს ! აღწერა სავალდებულოა!
                                </div>
                            </div>
                            <div class="col-12 form-group mb-2">
                                <label>აღწერა (English)</label>
                                <textarea class="form-control" name="description_en">{{ $products->description_en }}</textarea>
                                <div class="invalid-feedback">
                                    უპსს ! აღწერა სავალდებულოა!
                                </div>
                            </div>
                            <div class="col-12 form-group mb-2">
                                <label>აღწერა (русский)</label>
                                <textarea class="form-control" name="description_ch">{{ $products->description_ru }}</textarea>
                                <div class="invalid-feedback">
                                    უპსს ! აღწერა სავალდებულოა!
                                </div>
                            </div>


                    </div>
                    <div class="card-footer text-right">

                        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> განახლება</button>

                        <a href="{{ url('admin/products') }}" class="btn btn-info"><i class="fas fa-arrow-circle-left"></i> უკან</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
