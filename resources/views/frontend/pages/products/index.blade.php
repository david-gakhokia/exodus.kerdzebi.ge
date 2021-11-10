@extends('frontend.layouts.app')

@section('title', 'Product')

@section('content')


<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-7 text-center heading-section ftco-animate">
                @if (app()->getLocale() == 'en')
                    <span class="subheading mb-2">{{ $category->name }}</span>
                @elseif (app()->getLocale() == 'ka')
                    <span class="subheading mb-2">{{ $category->name_ka }}</span>
                @else
                    <span class="subheading mb-2">{{ $category->name_ru }}</span>
                @endif
                <p class="breadcrumbs"><span class="mr-2">
                    <a href="{{ url('/menu')}}"><i class="ion-ios-home"></i> {{ __('Home') }} <i class="ion-ios-arrow-forward"></i></a></span>
                    @if (app()->getLocale() == 'en')
                        <span> {{ $category->name_en }} </span>
                    @elseif (app()->getLocale() == 'ka')
                        <span> {{ $category->name_ka }} </span>
                    @else
                        <span> {{ $category->name_ru}} </span>
                    @endif
                </p>

                <h3><a href="{{ url('/orders/?language=en')}}" style="color:#07a619" > {{ __('Orders') }} <i class="ion-ios-cart"></i> </a></span></h3>

                @if($errors->any())
                <div class="alert alert-success" role="alert">
                    <h4>{{$errors->first()}} 👨‍🍳</h4>
                </div>
                @endif
            </div>
        </div>

        <div class="row">
            @foreach ($products as $product)
            <div class="col-md-6 col-lg-6 menu-wrap">
                <div class="menus d-flex ftco-animate">
                    @if($product->image)

                        <div class="list-inline gallery" >
                            <img class="menu-img img img-rounded zoom" src="{{ asset($product->image) }}" width="100px">
                        </div>
                    @else
                        <div class="list-inline gallery" >
                            <img class="img-rounded zoom" src="/frontend/images/no-image.png" width="100px">
                        </div>
                    @endif
                    <div class="text">
                        <div class="d-flex">
                            <div class="one-half">

                                @if (app()->getLocale() == 'en')
                                    <h3>{{$product->name_en}}</h3>
                                @elseif (app()->getLocale() == 'ka')
                                    <h3>{{$product->name_ka}}</h3>
                                @else
                                    <h3>{{$product->name_ru}}</h3>
                                @endif

                            </div>

                            <div  class="float-md-right">
                                <h5 style="font-size: 20px; color:#AC5050" ;  ><b> {{ $product->price }} ₾ </b></h5>
                                <form action="{{ url('order') }}" method="post" class="d-flex flex-row">
                                    @csrf
                                    <div class="input-group flex-nowrap">
                                        <div class="input-group-prepend">
                                            <input  style="width:100px" class="form-control" type="number" name="quantity"  value="1" min="1" max="100"  placeholder="{{__('Quantity')}}" aria-label="number" aria-describedby="addon-wrapping">
                                            <input type="hidden"  name="product_id" value="{{ $product->id }}">
                                            <button type="submit" class="btn btn-info btn-lg"><i class="fa fa-cart-plus"></i>  </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                            @if (app()->getLocale() == 'en')
                                <p>{{ $product->description_en }}</p>
                            @elseif (app()->getLocale() == 'ka')
                                <p>{{ $product->description_ka }}</p>
                            @else
                                <p>{{ $product->description_ch }}</p>
                            @endif

                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

@endsection
