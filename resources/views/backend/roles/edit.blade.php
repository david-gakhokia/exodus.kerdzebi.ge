@extends('backend.layouts.app')

@section('title', 'პრივილეგიის რედაქტირება')

@section('content')


<div class="row mt-sm-4">
    <div class="col-12 col-md-12 col-lg-4">
        <div class="card">
            <div class="padding-20">
                <div class="tab-content tab-bordered" id="myTab3Content">

                    {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
                        <div class="card-header">
                        <h4>პრივილეგიის რედაქტირება</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <p>პრივილეგიის სახელი</p>
                                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                    <div class="invalid-feedback">
                                        შეიყვანეთ სრული სახელი
                                    </div>
                                </div>

                                <div class="form-group col-md-12 col-12">
                                    <p>პრივილეგიები</p>

                                    @foreach($permission as $value)
                                        <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                        {{ $value->title }}</label>
                                    <br/>
                                    @endforeach
                                    <div class="invalid-feedback">
                                        შეიყვანეთ სრული სახელი
                                    </div>
                                </div>

                            </div>

                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-success"><i class="fas fa-save"></i> განახლება</button>
                            <a href="{{ url('admin/roles') }}" class="btn btn-info"><i class="fas fa-arrow-circle-left"></i> უკან</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

</div>


@endsection

