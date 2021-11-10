@extends('backend.layouts.app')

@section('title', 'მომხმარებლები')

@section('content')

            <div class="row">
              <div class="col-12">
                <div class="card">

                  <div class="card-header">
                    <h4 class="text-left">მომხმარებლები</h4>
                    <a href="{{ url ('admin/users/create') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> დამატება</a>
                  </div>
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-2 " role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                  <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                        <thead>
                          <tr class="text-center" >
                            <th>#</th>
                            <th>სახელი</th>
                            <th>ელ.ფოსტა</th>
                            <th>პრივილეგია</th>
                            <th>მოქმ.</th>
                          </tr>
                        </thead>
                        <tbody>
                          {{-- @foreach ($users as $index => $item) --}}
                          @foreach ($data as $key => $user)
                          <tr class="text-center">
                            <td>{{ ++$i }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if(!empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $v)
                                    <label class="badge badge-success">{{ $v }}</label>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('users.show',$user->id) }}" class="btn btn-icon btn-info">
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('users.edit',$user->id) }}" class="btn btn-icon btn-primary">
                                    <i class="far fa-edit"></i>
                                </a>
                                {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                                {{-- <a href="{{ url('admin/user/destroy/'.$item->id) }}" onclick="return confirm('ნამდვილად წავშალო?')" class="btn btn-icon btn-danger">
                                    <i class="fas fa-times"></i>
                                </a> --}}
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
