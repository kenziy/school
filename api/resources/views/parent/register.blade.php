@include('header')
<div class="register">
	<div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <h1>Register</h1>
                            </a>
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
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full email" type="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full password" type="password" name="email" placeholder="Password">
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20 register_submit" type="button">Register!</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('footer')