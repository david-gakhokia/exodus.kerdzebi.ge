@extends('backend.layouts.app')

@section('title', 'მაგიდები')

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



        <div class="col-12 col-md-8 col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4>ადგილები</h4>
                </div>

                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>სახელლწოდება</th>
                            <th>რედაქტირება</th>
                            <th>წაშლა</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($places as $index => $place)
                          <tr class="text-left">

                            <td>{{$index+1}}</td>
                            <td>{{ $place->name }}</td>
                            <td>
                                <a href="{{ url('admin/place/edit/'.$place->id) }}" class="btn btn-icon btn-primary">
                                    <i class="far fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <a href="{{ url('admin/place/destroy/'.$place->id) }}"   onclick="return confirm('ნამდვილად წაიშალოს?')" class="btn btn-icon btn-danger">
                                    <i class="fas fa-times"></i>
                                </a>
                            </td>

                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
            </div>
        </div>


        <div class="col-12 col-md-4 col-lg-4">
            <div class="card">
                <div class="card-header">
                <h4>ახალი ობიექტი</h4>
                </div>
                <div class="card-body">
                    @auth
                        <form action="{{  route ('store.place') }}" class="needs-validation" novalidate="" method="POST"  enctype="multipart/form-data" >
                        @csrf

                        <div class="form-group">
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="ობიექტის სახელი" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">დამატება</button>
                        </div>

                        </form>
                    @endauth
                </div>
            </div>
        </div>


    </div>

@endsection

