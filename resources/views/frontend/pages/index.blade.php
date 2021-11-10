@extends('frontend.layouts.app')

@section('title', 'Home')

@section('content')
<style>
.demo-bg {
    opacity: 0.3;
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100vh;
    object-fit: cover;
}
</style>

<section class="ftco-section bg-light">
    <img class="demo-bg" src="{{ asset('frontend/images/bachground.jpg') }}">
    <div class="container">
        <div class="row mt-3">

            <div class="col-md-6 ftco-animate justify-content-center"  style="float:none;margin:auto;" >
                <div class="blog-entry">
                    <a href="/menu" class="block-20" style="background-image: url('frontend/images/home/home.jpg'); border-radius: 15px;"></a>
                    <div class="text px-4 pt-3 pb-4">
                        <h3 class="heading text-center"><a href="/menu">{{__('Georgian & European Cuisine')}}</a></h3>
                    </div>
                </div>
            </div>

        </div>
    </div>


</section>




@endsection
