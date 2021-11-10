@extends('frontend.layouts.app')

@section('title', 'Home')

@section('content')

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <a href="{{ url('/menu')}}"><span class="subheading"></span></a>
                    <h2 class="mt-4">{{__('Orders')}}</h2>
                    <p class="breadcrumbs">
                        <span class="mr-2">
                            <a href="{{ url('/menu')}}"><i class="ion-ios-home">
                                </i> {{__('Home')}} <i class="ion-ios-arrow-forward"></i>
                            </a>
                        </span>
                        <span> {{__('Orders')}}</span>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover w-100" id="myTable">
                            <thead>
                                <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">{{ __('Image') }}</th>
                                <th scope="col">{{__('ItemName')}}</th>
                                <th scope="col">{{__('Price')}}</th>

                                <th scope="col" style="width:250px" >{{__('Quantity')}}</th>


                                <th scope="col">{{__('Sum')}}</th>
                                <th scope="col">{{__('Action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sum =0;
                                @endphp
                                @foreach ($orders as $order)

                                    @php
                                        $sum += $order->price * $order->quantity;
                                    @endphp
                                <tr>
                                    <th scope="row">{{ $order->id }}</th>
                                    @if($order->image)
                                        <td><img src="{{ asset($order->image)}}" width="100px" /></td>
                                    @else
                                        <td><img src="{{ asset('frontend/images/no-image.png')}}" width="100px" /></td>
                                    @endif

                                    @if (app()->getLocale() == 'en')
                                        <td >{{ $order->name_en }}</td>
                                    @elseif (app()->getLocale() == 'ka')
                                        <td >{{ $order->name_ka }}</td>
                                    @else
                                        <td >{{ $order->name_ru }}</td>
                                    @endif

                                    <td style="width:150px" class="d-flex flex-row">
                                        <input type="hidden" name="product_id" value="{{$order->id}}">
                                        <div class="input-group flex-nowrap">

                                            <div class="input-group-prepend">
                                                <input  style="width:70px" type="number" class="form-control"  value="{{ $order->price}}" placeholder="{{__('Price')}}" disabled aria-describedby="addon-wrapping">
                                            </div>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="addon-wrapping">₾</span>
                                            </div>
                                        </div>
                                    </td>

                                    <td style="width:250px">
                                        <form action="{{ url('order') }}" method="post" class="d-flex flex-row">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$order->id}}">
                                            <div class="input-group flex-nowrap">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="addon-wrapping"><i class="fa fa-arrows-v" aria-hidden="true"></i></span>
                                                </div>
                                                <div class="input-group-prepend">
                                                <input  style="width:100px" type="number" class="form-control qty " data-id="{{$order->id}}"  value="{{ $order->quantity}}" placeholder="{{__('Quantity')}}" aria-label="number" aria-describedby="addon-wrapping" min="1" max="100">
                                                </div>
                                            </div>
                                        </form>
                                    </td>

                                    <td >
                                       <span class="price-{{$order->id}} price" data-price={{$order->price}}> {{ $order->price*$order->quantity}} </span> ₾
                                    </td>
                                    <td scope="row">
                                        <a href="{{ url('order/destroy/'.$order->id) }}"  class="btn btn-icon btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>

                                @endforeach
                                @if($orders->count() != 0)
                                <tr>
                                    <td colspan="3"></td>
                                    <td >{{__('Total Price')}}: <span id="sum"> {{$sum}}</span>  ₾</td>
                                    <td  colspan="2">{{__('Total Price')}} &nbsp+ 10% = <span id="total"> {{$sum}}</span>  ₾</td>
                                    <td>
                                        <a href="{{ url('order/clearCart') }}"  class="btn btn-icon btn-danger">
                                            <i class="fa fa-close"></i> {{ __('Clear')}}
                                        </a>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    	</div>
    </section>

    <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script>
        $('.qty').on('change',function(){

            var id = $(this).data('id');
                $.ajax({
                    type: "POST",
                    url: "/order/updateQuantity",
                    data: {
                        id,
                        quantity:$(this).val(),
                        _token:"{{csrf_token()}}"
                    },
                    success: function (response) {
                        var price = $('.price-'+id).data('price');
                        $('.price-'+id).text(price*parseInt(response))
                       const elements =  document.querySelectorAll('.price')
                       setTimeout(() => {
                           let sum =0;
                           let percentToGet = 10;

                        //    console.log(elements);
                           for(let item of elements){
                               sum += parseInt(item.innerText)
                            }
                            let percent = (percentToGet / 100) * sum;
                            console.log(percentToGet + "% of " + sum + " is " + percent);

                            let total =sum+percent;

                            console.log(total);
                            $('#sum').text(sum);
                            $('#total').text(total);


                       }, 100);


                    }
                });

            });

    </script>

@endsection

