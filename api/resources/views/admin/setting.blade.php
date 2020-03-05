@include('header');
@include('nav2');
    <div class="main-content sysSetting">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Settings</h2>
                        </div>
                    </div>
                </div>
                <div class="row m-t-25">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h3>Online Enrollment</h3>
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">
                                      <input type="checkbox" aria-label="Open Online Enrollment" class="online_endrolment" value="1">
                                    </div>
                                  </div>
                                  <input type="text" class="form-control online_link" aria-label="Open Online Enrollment" value="" disabled="true">
                                </div>
                              <div class="enStat">
                                  <span class="text-danger">Disabled</span>
                              </div>
                            </div>
                        </div>
                        <!-- END DATA TABLE -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('footer');