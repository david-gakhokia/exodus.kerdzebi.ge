
@extends('backend.layouts.app')

@section('title', 'Settings')

@section('content')
      <!-- Main Content -->
      <form method="POST"  enctype="multipart/form-data" action="{{url('admin/setting')}}"  class="needs-validation">
        @csrf
      <div class="row mt-sm-4">

        <div class="col-12 col-md-12 col-lg-6">
            {{-- ლოგოს სურათი --}}
            <div class="card author-box">
                <div class="card-body">
                    <div class="author-box-center">
                        <img alt="image" src="@if($setting) {{ asset('/backend/images/settings/'.$setting->logo) }} @endif" width="150">
                        <div class="clearfix"></div>
                        <div class="author-box-name">
                        <p>ლოგო</p>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="author-box-description">
                            <div class="custom-file">
                                <input  @if($setting) value="{{$setting->logo}}" @endif type="file" name="logo"  class="custom-file-input"  >
                                <label class="custom-file-label" for="image">ლოგოს ატვირთვა</label>
                            </div>
                        </div>
                        <div class="w-100 d-sm-none"></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="author-box-center">
                        <img alt="image" src="@if($setting) {{ asset('/backend/images/settings/'.$setting->logo) }} @endif" width="150">
                        <div class="clearfix"></div>
                        <div class="author-box-name">
                        <p>ლოგო</p>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="author-box-description">
                            <div class="custom-file">
                                <input  @if($setting) value="{{$setting->logo}}" @endif type="file" name="logo"  class="custom-file-input"  >
                                <label class="custom-file-label" for="image">ლოგოს ატვირთვა</label>
                            </div>
                        </div>
                        <div class="w-100 d-sm-none"></div>
                    </div>
                </div>
            </div>
            {{-- ლოგოს სურათი --}}

            {{-- უკანა ფონის სურათი --}}
            <div class="card">
                <div class="card-header">
                  <h4>სოციალური ქსელები</h4>
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">@</div>
                                </div>
                                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Facebook URL">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">@</div>
                                </div>
                                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Instagram URL">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">@</div>
                                </div>
                                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Linkedin URL">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="text-right">
                                <button class="btn btn-success"><i class="fas fa-save"></i> შენახვა</button>
                            </div>
                        </div>
                    </form>
                </div>
              </div>
            {{-- უკანა ფონის სურათი --}}
        </div>

        {{-- ძირითადი პარამეტრები --}}

        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
              <div class="card-header">
                <h4>პარამეტრები</h4>
                <div class="text-right">
                    <h4>
                        @if($errors)
                            @foreach($errors->all() as $error)
                            <p class="text-danger">{{$error}}</p>
                            @endforeach
                        @endif

                        @if(Session::has('success'))
                            <p class="text-success">{{session('success')}}</p>
                        @endif
                    </h4>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>ორგანიზაციის სახელი</label>
                  <input @if($setting) value="{{$setting->name}}" @endif type="text" name="name" class="form-control" />
                    <div class="invalid-feedback">
                        შეიყვანეთ ორგანიზაციის სახელი
                    </div>
                </div>
                <div class="form-group">
                    <label>რესტორნის სახელი</label>
                    <input @if($setting) value="{{$setting->title}}" @endif type="text" name="title" class="form-control" />
                    <div class="invalid-feedback">
                        შეიყვანეთ რესტორნის სახელი
                    </div>
                  </div>

                <div class="form-group">
                  <label>ობიექტის არწერა</label>

                  <textarea  @if($setting) value="{{$setting->description}}" @endif name="description" class="form-control summernote-simple">
                    @if($setting) {{$setting->description}} @endif
                </textarea>
                </div>



                <div class="form-group">
                  <label>ელ.ფოსტა</label>
                  <input type="email" class="form-control">
                </div>
                <div class="form-group">
                    <label>ტელეფონი</label>
                    <input type="tel" class="form-control">
                </div>
                <div class="form-group">
                    <label>მისამართი</label>
                    <input type="text" class="form-control">
                </div>
                {{-- <div class="form-group">
                  <label>File</label>
                  <input type="file" class="form-control">
                </div> --}}

                <div class="form-group">
                    <div class="section-title mt-0">სამუშაო საათები</div>
                    <div class="form-group">
                        <div class="input-group">
                            {{-- <div class="input-group-prepend">
                                <span class="input-group-text">10:00</span>
                            </div> --}}
                            <input type="time" class="form-control">
                            <input type="time" class="form-control">
                        </div>
                    </div>
                </div>

              </div>
              <div class="card-footer text-right">
                <button class="btn btn-success mr-1" type="submit"><i class="fas fa-save"></i> შენახვა</button>
                <button class="btn btn-secondary" type="reset"><i class="fas fa-circle-notch"></i> გასუფთავება</button>
              </div>
            </div>
        </div>
        {{-- ძირითადი პარამეტრები --}}


      </div>
    </form>
      <!-- Main Content -->

@endsection
