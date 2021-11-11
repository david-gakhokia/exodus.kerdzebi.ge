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
                <form action="{{  route('store.product') }}" class="needs-validation" novalidate="" method="post"  enctype="multipart/form-data" >
                    @csrf
                    <div class="card-header">
                        <h4>პროდუქციის დამატება </h4>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-4 form-group">
                                <label>დასახელება (ქართული) </label>
                                <input type="text"  name="name_ka" class="form-control" placeholder="ქართული" required="">
                                <div class="invalid-feedback">
                                უპსს ! დასახელება სავალდებულოა!
                                </div>
                            </div>
                            <div class="col-4 form-group">
                                <label>დასახელება (English) </label>
                                <input type="text"  name="name_en" class="form-control" placeholder="English">
                                <div class="invalid-feedback">
                                უპსს ! დასახელება სავალდებულოა!
                                </div>
                            </div>
                            <div class="col-4 form-group">
                                <label>დასახელება (русский) </label>
                                <input type="text"  name="name_ru" class="form-control" placeholder="русский">
                                <div class="invalid-feedback">
                                უპსს ! დასახელება სავალდებულოა!
                                </div>
                            </div>

                            <div class="col-3 form-group">
                                <label>სურათი</label>
                                <div class="custom-file">
                                <input type="file" name="image"  id="image"  class="custom-file-input" >
                                <label class="custom-file-label" for="image">ფოტოს ატვირთვა</label>
                                </div>
                            </div>

                            <div class="col-3 form-group">
                                <label for="category_id">კატეგორია</label>
                                <select class="form-control select2" name="category_id" required>
                                    <option value="" disabled >აირჩიეთ კატეგორია</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id === old('category_id') ? 'selected' : '' }}>{{ $category->name_ka }}</option>
                                        @if ($category->children)
                                            @foreach ($category->children as $child)
                                                <option value="{{ $child->id }}" {{ $child->id === old('category_id') ? 'selected' : '' }}>&nbsp;&nbsp;{{ $child->name_ka }}</option>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                უპსს ! კატეგორია სავალდებულოა!
                                </div>
                            </div>
                            <div class="col-2 form-group">
                                <label>ნუმერაცია</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">
                                        <i class="fab fa-autoprefixer"></i>
                                      </div>
                                    </div>
                                  <input type="text" name="numeric" class="form-control phone-number" placeholder="ნუმერაცია" >
                                      <div class="invalid-feedback">
                                          უპსს ! ფასი სავალდებულოა!
                                      </div>
                                  </div>
                            </div>
                            <div class="col-2 form-group">
                                <label>სტატუსი</label>
                                <select name="status" class="form-control" required="">
                                    <option value="1">აქტიური</option>
                                    <option value="0">არაქტიური</option>
                                </select>
                                <div class="invalid-feedback">
                                უპსს ! სტატუსი სავალდებულოა!
                                </div>
                            </div>

                            <div class="col-2 form-group">
                                <label>ფასი</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">
                                      <i class="fas fa-money-bill-wave"></i>
                                    </div>
                                  </div>
                                <input type="number" step="0.01" name="price" class="form-control phone-number" placeholder="ფასი" required="">
                                    <div class="invalid-feedback">
                                        უპსს ! ფასი სავალდებულოა!
                                    </div>
                                </div>
                            </div>


                            <div class="col-12 form-group mb-2">
                                <label>აღწერა (ქართულად)</label>
                                <textarea class="form-control" name="description_ka"></textarea>
                                <div class="invalid-feedback">
                                    უპსს ! აღწერა სავალდებულოა!
                                </div>
                            </div>
                            <div class="col-12 form-group mb-2">
                                <label>აღწერა (English)</label>
                                <textarea class="form-control" name="description_en"></textarea>
                                <div class="invalid-feedback">
                                    უპსს ! აღწერა სავალდებულოა!
                                </div>
                            </div>
                            <div class="col-12 form-group mb-2">
                                <label>აღწერა (русский)</label>
                                <textarea class="form-control" name="description_ru"></textarea>
                                <div class="invalid-feedback">
                                    უპსს ! აღწერა სავალდებულოა!
                                </div>
                            </div>


                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8">
                            </polyline>
                            </svg>
                            დამატება
                        </button>
                        <a href="{{ url('admin/products') }}" class="btn btn-info"><i class="fas fa-arrow-circle-left"></i> უკან</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
