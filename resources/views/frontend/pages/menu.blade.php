@extends('frontend.layouts.app')

@section('title', 'Home')

@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />


<section class="ftco-section">
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4">
          <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
          </a>

          <div class="col-md-3 text-end ">

          </div>
        </header>
      </div>




    <div class="container">
         @foreach ($categories as $category)
            <div class="row justify-content-center" style="margin-bottom:40px">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    @if (app()->getLocale() == 'en')
                        <h3 class="subheading" >• {{$category->name_en}} • </h3>
                    @elseif (app()->getLocale() == 'ka')
                        <h3 class="subheading" >• {{$category->name_ka}} • </h3>
                    @else
                        <h3 class="subheading" >• {{$category->name_ru}} • </h3>
                    @endif
                </div>
            </div>

            <div class="row justify-content-center" style="margin-bottom:100px">
                @foreach ($category->children as $child)
                <div class="col-md-3 mt-4" style="text-align:center">
                    <div class="heading-menu text-center ftco-animate">
                        @if (app()->getLocale() == 'en')
                            <h3>{{$child->name_en}}</h3>
                        @elseif (app()->getLocale() == 'ka')
                            <h3>{{$child->name_ka}}</h3>
                        @else
                            <h3>{{$child->name_ru}}</h3>
                        @endif
                    </div>
                    <a href="{{'/product/'.$child->id }}">
                        @if($child->image)
                            <img class="menu-img img-fluid" src="{{ asset($child->image) }}" style="border-radius:200px;object-fit:cover;width:200px;"/>
                        @else
                            <img  src="{{ asset('frontend/images/no-image.png') }}" style="border-radius:200px;object-fit:cover;width:200px;" />
                        @endif
                    </a>
                    <div class="col-md-12 text-center ftco-animate fadeInUp ftco-animated">
                        <p>
                            <a href="{{ '/product/'.$child->id }}" style="border-radius: 8px ; margin-top: 15px;" class="btn btn-info py-2 px-3">{{ __('View') }}</a>
                        </p>
                    </div>
                </div>
                @endforeach

            </div>
         @endforeach
    </div>
</section>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
      $("#query").select2({
          placeholder: "ძიება",
          allowClear: true
      });
    </script>

@endsection
