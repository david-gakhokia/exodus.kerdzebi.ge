@extends('backend.layouts.app')

@section('title', 'პროდუქცია')

@section('content')

            <div class="row">
              <div class="col-12">
                <div class="card">

                  <div class="card-header">
                    <h4 class="text-left">პროდუქცია</h4>
                    <a href="{{ url ('admin/product/create') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> დამატება</a>
                  </div>
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

                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>დასახელება (Ka)</th>
                            <th>დასახელება (En)</th>
                            <th>დასახელება (Ru)</th>
                            <th>სურათი</th>
                            <th>კატეგორია</th>
                            <th>ფასი</th>
                            <th>სტატუსი</th>
                            <th>მოქმ.</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($products as $index => $item)
                          <tr class="text-center">
                            <td>
                             {{$index+1}}
                            </td>

                            <td>{{ $item->name_ka }}</td>
                            <td>{{ $item->name_en }}</td>
                            <td>{{ $item->name_ru }}</td>
                            <td>
                                @if($item->image)
                                    <img class="menu-img img-fluid" src="{{ asset($item->image) }}" style="width:100px;border-radius:8px" />
                                @else
                                    <img style="width:100px;border-radius:8px" src="{{ asset('frontend/images/no-image.png') }}" />
                                @endif
                            </td>
                            <td>{{ $item->category ? $item->category->name_ka : 'Uncategorized' }}</td>
                            <td>{{ $item->price }} ₾</td>
                            <td>
                                  @if($item->status == 1)
                                  <div class="badge badge-success badge-shadow">
                                    <i class="far fa-eye"></i>
                                    ჩვენება
                                  </div>
                                    @else
                                  <div class="badge badge-danger badge-shadow">
                                    <i class="far fa-eye-slash"></i>
                                    დამალვა
                                  </div>
                                  @endif
                            </td>
                            <td>
                                <a href="{{ url('admin/product/edit/'.$item->id) }}" class="btn btn-icon btn-primary">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="{{ url('admin/product/destroy/'.$item->id) }}"   onclick="return confirm('ნამდვილად წავშალო?')" class="btn btn-icon btn-danger">
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
            </div>

@endsection
