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



        <div class="col-12 col-md-6 col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4>მაგიდები</h4>
                </div>

                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>

                            <th>ნომერი</th>
                            <th>სექცია</th>
                            <th>სტატუსი</th>
                            <th>QR კოდი</th>
                            <th>მოქმ.</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($tables as $index => $item)
                          <tr class="text-center">

                            <td>#{{ $item->name }}</td>
                            <td>{{ $item->place ? $item->place->name : 'ცარიელი' }}</td>
                            <td> <a href="{{ url('/admin/table/'.$item->id) }}" ><i class="fas fa-qrcode fa-2x"></i> QR </a></td>

                            <td>
                                  @if($item->status == 1)
                                  <div class="badge badge-success badge-shadow">
                                    <i class="far fa-eye"></i>
                                    აქტიური
                                  </div>
                                    @else
                                  <div class="badge badge-danger badge-shadow">
                                    <i class="far fa-eye-slash"></i>
                                    არა აქრიური
                                  </div>
                                  @endif
                            </td>
                            <td>
                                <a href="{{ url('admin/table/edit/'.$item->id) }}" class="btn btn-icon btn-primary">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="{{ url('admin/table/destroy/'.$item->id) }}"   onclick="return confirm('ნამდვილად წაიშალოს?')" class="btn btn-icon btn-danger">
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


        <div class="col-12 col-md-6 col-lg-4">
            <div class="card">
                <div class="card-header">
                <h4>ახალი მაგიდა</h4>
                </div>
                <div class="card-body">
                    @auth
                        <form action="{{  route ('store.table') }}" class="needs-validation" novalidate="" method="POST"  enctype="multipart/form-data" >
                        @csrf

                        <div class="form-group">
                            <input type="number" name="name" class="form-control" value="{{ old('name') }}" placeholder="მაგიდის ნომერი" required>
                        </div>
                        <div class="form-group">
                            <select class="form-control select2" name="place_id">
                                <option value="">სექციის შერჩევა</option>

                                @foreach ($places as $place)
                                    <option value="{{ $place->id }}">{{ $place->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label>სტატუსი</label>
                            <select name="status" class="form-control" required="">
                                <option value="1">აქტიური</option>
                                <option value="0">არა ქტიური</option>
                            </select>
                            <div class="invalid-feedback">
                            უპსს ! სტატუსი სავალდებულოა!
                            </div>
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

