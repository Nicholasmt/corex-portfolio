@extends('layouts.app')
@section('contents')

@include('layouts.nav')
 <section class="section-show">
   <div class="container">
    <div class="row">
      <div class="col-3 sidebar-bg">
         <div class="d-flex align-items-start">
            <div class="nav flex-column nav-pills text-left" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <button class="nav-link mt-2 active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class=" bi bi-house-door"> </i> Dashboard</button>
              <button class="nav-link mt-2" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class=" bi bi-bookmark-check"> </i> Services</button>
              <button class="nav-link mt-2" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="bi bi-card-image"></i> Portfolios</button>
              <button class="nav-link mt-2" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false"> <i class="bi bi-gear-wide"></i> Settings</button>
              <a href="{{ route('logout')}}" class="nav-link mt-2 ml-3"> <i class="bi bi-box-arrow-right"></i> Logout</a>
            </div>
          </div>
        </div>
          <div class="col-9">
            <div class="tab-content" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <div class="card-body">
                    <h4 class="text-center">Dashboard</h4>
                </div>
              </div>
              <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <div class="card-body">
                    <h4 class="text-center">Manage Services</h4>
                     <div class="table-responsive mt-3">
                        <table class="table table-dark table-hover">
                            <div class="float-end mt-3">
                                <a href="#" class="btn btn-light mb-3"><i class="bi bi-plus"></i></a>
                             </div>
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Title</th>
                                <th scope="col">Descriptions</th>
                                <th scope="col">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                              </tr>
                               
                
                            </tbody>
                          </table>
                    </div>
                </div>
              </div>
              <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                <div class="card-body">
                    <h4 class="text-center">Manage Portfolios</h4>
                    <div class="table-responsive mt-3">
                        <table class="table table-dark table-hover">
                            <div class="float-end mt-3">
                              <a href="#" class="btn btn-light mb-3"><i class="bi bi-plus"></i></a>
                             </div>
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Catgory</th>
                                <th scope="col">Photos</th>
                                <th scope="col">Descriptions</th>
                                <th scope="col">Urls</th>
                                <th scope="col">Clients</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                              </tr>
                           
                              
                            </tbody>
                          </table>
                    </div>
                </div>
              </div>
              <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                <div class="card-body">
                    <h4 class="text-center">Manage Profile</h4>
                </div>
              </div>
            </div>
          </div>
       </div>
     </div>
  </section>
@endsection