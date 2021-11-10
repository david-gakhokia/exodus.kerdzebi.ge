@extends('backend.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon l-bg-purple">
          <i class="fas fa-utensils"></i>
        </div>
        <div class="card-wrap">
          <div class="padding-20">
            <div class="text-right">
              <h6 class="font-light mb-0">
                <i class="ti-arrow-up text-success"></i>
                პროდუქტი
              </h6>
              <h5>{{ $products->count() }}</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon l-bg-green">
          <i class="fas fa-clipboard-check"></i>
        </div>
        <div class="card-wrap">
          <div class="padding-20">
            <div class="text-right">
              <h6 class="font-light mb-0">
                <i class="ti-arrow-up text-success"></i> კატეგორია
              </h6>
              <h5>{{ $categories->count() }}</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon l-bg-cyan">
          <i class="fas fa-user-friends"></i>
        </div>
        <div class="card-wrap">
          <div class="padding-20">
            <div class="text-right">
              <h6 class="font-light mb-0">
                <i class="ti-arrow-up text-success"></i> მომხამარებლები
              </h6>
              <h5>{{ $users->count() }}</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>


        <div class="row">
            <div class="col-md-12 col-lg-8 col-xl-12">
              <div class="card">
                <div class="card-header">
                  <h4>შეკვეთების ცხრილი</h4>
                </div>
                <div class="card-body">
                  <div class="tableBody" id="client-details" tabindex="3" style="height: 400px; overflow: hidden; outline: none;">
                    <div class="table-responsive">
                      <table class="table table-hover dashboard-task-infos">
                        <thead>
                          <tr>
                            <th>მაგიდა #</th>
                            <th>პროდუქტი</th>
                            <th>რეოდენობა</th>
                            <th>ფასი</th>
                            <th>ჯამი</th>
                            <th class="text-center" >მოქმედება</th>
                          </tr>
                        </thead>
                        <tbody>

                          <tr>
                            {{-- <td class="table-img">
                              <img src="assets/img/users/user-8.png" alt="">
                            </td> --}}
                            <td># 12</td>
                            <td>წვენი</td>
                            <td>2</td>
                            <td>10 ₾</td>

                            <td>20 ₾</td>
                            <td class="text-center" >
                                <a class="btn btn-icon btn-success" data-toggle="tooltip" title="დათვალიერება">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a class="btn btn-icon btn-info" data-toggle="tooltip" title="რედაქტირება">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a class="btn btn-icon btn-dark" data-toggle="tooltip" title="დარქივება">
                                    <i class="fas fa-archive"></i>
                                </a>
                                <a class="btn btn-icon btn-danger" data-toggle="tooltip" title="წაშლა">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>

@endsection

