@include('header');
@include('nav2');
    <div class="main-content schoolYearPage">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <div>
                                <h2 class="title-1 schoolYearTitle">Teacher</h2>
                                <div class="scholYeardescription"></div>
                            </div>
                            <button class="au-btn au-btn-icon au-btn--blue addTeacher">
                                <i class="zmdi zmdi-plus"></i>set Teacher</button>
                        </div>
                    </div>
                </div>
                <div class="row m-t-25">
                    <div class="col-md-12">
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>Teacher's name</th>
                                        <th>Subjects</th>
                                        <th>Rooms</th>
                                        <th>Students</th>
                                    </tr>
                                </thead>
                                <tbody class="allTeachers">
                                </tbody>
                            </table>
                        </div>
                        <!-- END DATA TABLE -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="schoolYearAddTeacher" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Add teacher</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-top-campaign">
                            <tbody class="listAllTeacher">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="setTeacherToSchoolYear" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showTeachersName"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Set subject</strong>
                                </div>
                                <div class="card-body">
                                    <div class="subjectList">
                                        <div class="form-check">
                                            <div class="checkbox tCheckBox">                                         
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Set class room</strong>
                                </div>
                                <div class="card-body">
                                    <div class="subjectList">
                                        <div class="form-check">
                                            <div class="checkbox rCheckBox">                                         
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn au-btn--blue setToTeacher">SET</a>
                </div>
            </div>
        </div>
    </div>
@include('footer');