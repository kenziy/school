@include('header');
@include('nav2');
<script type="text/javascript">
    var student_id = '{{ $student_id }}';
</script>
    <div class="main-content schoolYearPage studentProfile">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="overview-wrap">
                            <h2 class="title-1 student-name"></h2>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="overview-wrap">
                            <h2 class="title-1">Payment History</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('images/student/default.jpg') }}">
                            <div class="card-body">
                                <div class="card-title">
                                    <div class="form-group">
                                        <label>Gender: </label>
                                        <strong class="gender"></strong>
                                    </div>
                                    <div class="form-group">
                                        <label>Birthday: </label>
                                        <strong class="dob"></strong>
                                    </div>
                                    <div class="form-group">
                                        <label>Guardian: </label>
                                        <strong class="guardian"></strong>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="form-group">
                                    <label>Level: </label>
                                    <strong class="level"></strong>
                                </div>
                                <div class="form-group">
                                    <label>Tuition: </label>
                                    <strong class="text-danger tuition"></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-data4">
                                    <thead>
                                        <tr>
                                            <th>Method</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="allpayment"></tbody>
                                </table>
                                <div class="text-right">
                                    <label>Tuition: </label>
                                    <strong class="text-danger tuition"></strong>
                                </div>
                                <div class="text-right">
                                    <label>Total Paid: </label>
                                    <strong class="text-success totalPaid"></strong>
                                </div>
                                <hr>
                                <div class="text-right">
                                    <strong>Unpaid: </strong>
                                    <strong class="text-info remaining"></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addRoom" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Create Room</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Room name</label>
                        <input type="text" name="" class="form-control title" />
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control description" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn au-btn--blue submit">Create</button>
                </div>
            </div>
        </div>
    </div>
@include('footer');