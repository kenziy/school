@include('header');
@include('nav');
    <div class="main-content usersPage">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Users</h2>
                            <button class="au-btn au-btn-icon au-btn--blue" data-toggle="modal" data-target="#newUser">
                                <i class="zmdi zmdi-plus"></i>add user</button>
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
                                        <th>Gender</th>
                                        <th>Email</th>
                                        <th>Temp Password</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                                <tbody class="userList">
                                </tbody>
                            </table>
                        </div>
                        <!-- END DATA TABLE -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="newUser" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Create New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label>First name</label>
                            <input type="text" name="" class="form-control fname" />
                        </div>
                        <div class="col-md-4">
                            <label>Middle name</label>
                            <input type="text" name="" class="form-control mname" />
                        </div>
                        <div class="col-md-4">
                            <label>Last name</label>
                            <input type="text" name="" class="form-control lname" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Birthday</label>
                            <input type="date" name="" class="form-control birthday" />
                        </div>
                        <div class="col-md-4">
                            <label>Gender</label>
                            <select class="form-control gender">
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Address</label>
                            <input type="text" name="" class="form-control address" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Email</label>
                            <input type="text" name="" class="form-control email" />
                        </div>
                        <div class="col-md-6">
                            <label>Role</label>
                            <select class="form-control roles">
                                <option value="1">Admin</option>
                                <option value="2">Teacher</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn au-btn--blue">Create</button>
                </div>
            </div>
        </div>
    </div>
@include('footer');