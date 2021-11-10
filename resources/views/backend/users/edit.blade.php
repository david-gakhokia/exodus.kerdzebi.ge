@extends('backend.layouts.app')

@section('title', 'მომხმარებლის რედაქტირება')

@section('content')


<div class="row mt-sm-4">
    <div class="col-12 col-md-12 col-lg-6">
        <div class="card">
            <div class="padding-20">
                <div class="tab-content tab-bordered" id="myTab3Content">

                    {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
                        <div class="card-header">
                        <h4>პროფილის რედაქტირება</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-4 col-12">
                                    <label>სახელი</label>
                                    {{-- <input type="text" class="form-control" value="{{ $user->name }}"> --}}
                                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                    <div class="invalid-feedback">
                                        შეიყვანეთ სრული სახელი
                                    </div>
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label>ელ.ფოსტა</label>
                                    {{-- <input type="text"  class="form-control" value="{{ $user->email }}" disabled > --}}
                                    {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                                    <div class="invalid-feedback">
                                        შეიყვანეთ სრული სახელი
                                    </div>
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label>პრივილეგია</label>
                                    {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
                                    <div class="invalid-feedback">
                                        შეიყვანეთ სრული სახელი
                                    </div>
                                </div>


                                {{-- <div class="form-group col-md-4 col-12">
                                    <label>პრივილეგია</label>
                                    <div class="form-group">
                                        <select class="form-control">
                                            <option>Option 1</option>
                                            <option>Option 2</option>
                                            <option>Option 3</option>
                                        </select>
                                    </div>
                                    <div class="invalid-feedback">
                                        შეავსეთ ველი
                                    </div>
                                </div> --}}
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                <label>პაროლი</label>
                                {{-- <input type="password"  name="password" class="form-control"> --}}
                                {!! Form::password('password', array('placeholder' => 'პაროლი','class' => 'form-control')) !!}
                                <div class="invalid-feedback">
                                    შეიყვანეთ პაროლი
                                </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                <label>გაიმეორეთ პაროლი</label>
                                {{-- <input type="tel" class="form-control" value="{{ $user->password }}"> --}}
                                {{-- <input  class="form-control" id="password"  type="password" name="password" required autocomplete="new-password"   value="{{ $user->password }}"> --}}
                                {!! Form::password('confirm-password', array('placeholder' => 'გაიმეორეთ პაროლი','class' => 'form-control')) !!}
                            </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-success"><i class="fas fa-save"></i> შენახვა</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-12 col-lg-6">

      <div class="card">
        <div class="card-header">
          <h4>პერსონალური ინფორმაცია</h4>
        </div>
        <div class="card-body">
          <div class="py-4">
            <p class="clearfix">
              <span class="float-left">
                სახელი
              </span>
              <span class="float-right text-muted">
                {{ $user->name }}
              </span>
            </p>
            <p class="clearfix">
              <span class="float-left">
                ელ.ფოსტა
              </span>
              <span class="float-right text-muted">
                {{ $user->email }}
              </span>
            </p>
            <p class="clearfix">
              <span class="float-left">
                პოზიცია
              </span>
              <span class="float-right text-muted">
                @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                        <label class="badge badge-light">{{ $v }}</label>
                    @endforeach
                @endif
              </span>
            </p>
          </div>
        </div>
        <div class="card-footer text-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"><i class="fas fa-arrow-circle-left"></i> უკან</a>
        </div>
      </div>
    </div>
</div>


@endsection

