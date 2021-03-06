@include('header');
@include('nav');
	<div class="main-content listSchoolYear">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">School Year</h2>
                            <button class="au-btn au-btn-icon au-btn--blue" data-toggle="modal" data-target="#addSY">
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
                                        <th>S.Y</th>
                                        <th>Students</th>
                                        <th>Online Enrollment</th>
                                        <th>Link</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="schoolyearList">
                                </tbody>
                            </table>
                        </div>
                        <!-- END DATA TABLE -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addSY" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Create School Year</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>S.Y</label>
                        <input type="text" name="" class="form-control title" />
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control description" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input online_enrollment" value="1" checked="true" id="customCheck1">
                          <label class="custom-control-label" for="customCheck1">Open Online Enrollment</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn au-btn--blue submit">Create</button>
                </div>
            </div>
        </div>
    </div>
@include('footer');