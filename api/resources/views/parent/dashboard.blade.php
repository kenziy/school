@include('header');
@include('pnav');
    <div class="main-content parentPage">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">My Students</h2>
                            <button class="au-btn au-btn-icon au-btn--blue" data-toggle="modal" data-target="#addkids">
                                <i class="zmdi zmdi-plus"></i>add Student</button>
                        </div>
                    </div>
                </div>
                <div class="row m-t-25">
                    <div class="col-md-12">
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>School Year</th>
                                        <th>Year level</th>
                                        <th>Performance</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="myStudentList">
                                </tbody>
                            </table>
                        </div>
                        <!-- END DATA TABLE -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addkids" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Add Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="" class="form-control fname" />
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>Middle Name</label>
                                <input type="text" name="" class="form-control mname" />
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="" class="form-control lname" />
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Gender</label>
                                <select class="form-control gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                         </div>
                         <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Birthday</label>
                                <input type="date" name="" class="form-control birthday" />
                            </div>
                         </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn au-btn--blue addStudent">Create</button>
                </div>
            </div>
        </div>
    </div>

@include('footer');