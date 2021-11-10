@extends('backend.layouts.app')

@section('title', 'მომხმარებლის დამატება')

@section('content')


<div class="row mt-sm-4">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="padding-20">
                <div class="tab-content tab-bordered" id="myTab3Content">
                    {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
                        <div class="card-header">
                        <h4>პროფილის რედაქტირება</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-4 col-12">
                                    <label>სახელი</label>
                                        {!! Form::text('name', null, array('placeholder' => 'სახელი','class' => 'form-control')) !!}
                                    <div class="invalid-feedback">
                                        შეიყვანეთ სრული სახელი
                                    </div>
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label>ელ.ფოსტა</label>
                                        {!! Form::text('email', null, array('placeholder' => 'ელ.ფოსტა','class' => 'form-control')) !!}
                                    <div class="invalid-feedback">
                                        შეიყვანეთ ელ.ფოსტა
                                    </div>
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label>პრივილეგია</label>
                                    {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                                    <div class="invalid-feedback">
                                        შეიყვანეთ პრივილეგია
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>პაროლი</label>
                                    {!! Form::password('password', array('placeholder' => 'პაროლი','class' => 'form-control')) !!}
                                    <div class="invalid-feedback">
                                        შეიყვანეთ პაროლი
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                <label>გაიმეორეთ პაროლი</label>
                                {!! Form::password('confirm-password', array('placeholder' => 'გაიმეორეთ პაროლი','class' => 'form-control')) !!}
                            </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-success"><i class="fas fa-save"></i> შენახვა</button>
                            <a href="{{ url('admin/users') }}" class="btn btn-info"><i class="fas fa-arrow-circle-left"></i> უკან</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

</div>


@endsection

