@include('header')
<script type="text/javascript">
    var sy_code = '{{ $token }}';
</script>
<div class="enrollment">
	<div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <h1>Online Enrollment Form</h1>
                            </a>
                            <div>Batch <strong class="batchTitle"></strong></div>
                        </div>
                        <div class="alert alert-danger error" role="alert" style="display: none;">
                            Something went wrong
                        </div>
                        <div class="enrollment-form">
                            <form action="" method="post">
                            	<div class="form-group">
                                    <label>First Name</label>
                                    <input class="au-input au-input--full fname" type="text" name="fname" placeholder="Juan">
                                </div>
                                <div class="form-group">
                                    <label>Middle Name</label>
                                    <input class="au-input au-input--full mnane" type="text" name="mnane" placeholder="Tagro">
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input class="au-input au-input--full lname" type="text" name="lname" placeholder="Dela Cruz">
                                </div>
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select class="form-control gender">
                                    	<option>Male</option>
                                    	<option>Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Year level</label>
                                    <select class="form-control ylevel"></select>
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full email" type="email" name="email" placeholder="Email">
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20 enroll" type="button">Enroll Now!</button>
                                <div class="social-login-content">
                                    <div class="social-button">
                                        <button class="au-btn au-btn--block au-btn--blue m-b-20">Already have an account</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('footer')