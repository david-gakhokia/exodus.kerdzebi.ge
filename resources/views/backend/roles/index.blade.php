@extends('backend.layouts.app')

@section('title', 'მომხმარებლები')

@section('content')

            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">

                        <div class="card-header">
                            <h4 class="text-left">პრივილეგიები</h4>
                            <a href="{{ route('roles.create') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> დამატება</a>
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
                                            <th>პრივილეგია</th>
                                            <th>დათვალიერება</th>
                                            <th>რედაქტირება</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($roles as $key => $role)
                                    <tr class="text-center">
                                        <td>{{ ++$i }}</td>
                                        <td class="badge badge-success" >{{ $role->name }}</td>
                                        <td>
                                            <a href="{{ route('roles.show',$role->id) }}" class="btn btn-icon btn-info">
                                                <i class="far fa-eye"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('roles.edit',$role->id) }}" class="btn btn-icon btn-primary">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                            {!! Form::submit('წაშლა', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
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
