@extends('frontend.layouts.app')

@section('title', 'Product')

@section('content')


<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <a href="{{ url('/home') }}">	<span class="subheading"></span></a>

                <h2 class="mb-4"></h2>
                @if($errors->any())
                <div class="alert alert-success" role="alert">
                    <h4>{{$errors->first()}} 👨‍🍳</h4>
                </div>
                @endif
                <p class="breadcrumbs"><span class="mr-2">
                    <a href="{{ url('/home')}}"><i class="ion-ios-home"></i> მთავარი <i class="ion-ios-arrow-forward"></i></a></span>
                        {{-- <span><a href="{{ url('/')}}">მთავარი</a> <i class="ion-ios-arrow-forward"></i></span> --}}
                        <span> </span>
                </p>

            </div>

        </div>

        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-6 col-sm-12 col-lg-4" style="margin-bottom:30px">
                    <div class="d-flex flex-row justify-content-between align-items-center ftco-animate">
                        <div class="one-half d-flex">
                            @if($product->image)
                                <img class="menu-img img-fluid" src="{{ asset($product->image) }}" style="width:20%;border-radius:8px" />
                            @else
                                <img style="width:20%;border-radius:8px" src="{{ asset('frontend/images/no-image.png') }}" />
                            @endif
                            <h5 class="bp-font pl-2 text-dark">{{$product->name}}</h5>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="one-forth text-right" >
                                <h5><b>{{$product->price}} ₾</b></h5>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>



@endsection
