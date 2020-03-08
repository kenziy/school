@include('header');
@include('pnav');
    <div class="main-content parentEnroll">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Open for enrollment</h2>
                            <button class="au-btn au-btn-icon au-btn--blue" data-toggle="modal" data-target="#addRoom">
                                <i class="zmdi zmdi-plus"></i>add item</button>
                        </div>
                    </div>
                </div>
                <div class="row m-t-25">
                    <div class="col-md-12">
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>School Year</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="availableSy">
                                </tbody>
                            </table>
                        </div>
                        <!-- END DATA TABLE -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="enrolStudent" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Select Student</label>
                        <select class="myStudent form-control"></select>
                    </div>
                    <div class="form-group">
                        <label>Select Level</label>
                        <select class="ylevel level_id form-control"></select>
                    </div>
                    <div class="form-group">
                        <label>Tuition pay</label>
                        <input type="text" class="form-control tuition" disabled="true">
                    </div>
                    <div class="form-group">
                        <label>Payment Method</label>
                        <div class="form-check">
                            <label for="paymentMethod" class="form-check-label">
                                <input type="radio" id="paymentMethod" value="1" class="form-check-input payment_method"> Over the Counter
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="sy_id">
                    <button type="button" class="btn au-btn--blue enrollstudent">Enroll</button>
                </div>
            </div>
        </div>
    </div>
@include('footer');