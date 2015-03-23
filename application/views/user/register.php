<div class="main-wrapper ">
    <div id="resumePost" class="container">
        <div class="box box-lg">
            <div class="alert alert-danger" id="err_top" style="display: none"><strong class="sprite_icon errorIcon"> Sorry, there are errors with the information you provided. Please scroll down to check for errors.</strong></div>
            <h1 class="page-title" title="Sign up Job seeker Account"><span>Sign Up</span></h1>
            <!-- Begin Content-->
            <form name="frm" id="frmSignUp" action="http://www.vietnamworks.com/sign-up" method="post" class="form-horizontal" novalidate="novalidate">
                <fieldset class="push-top">
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12  control-label">Name</label>
                        <div class="col-md-4 col-xs-12">
                            <input type="text" class="form-control" name="txtFirstname" id="txtFirstname" value="" placeholder="FirstName" tabindex="1">
                        </div>
                        <br class="visible-xs push-top-15">
                        <div class="col-md-4 col-xs-12">
                            <input type="text" class="form-control" name="txtLastname" id="txtLastname" value="" placeholder="LastName" tabindex="2">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3  control-label" for="resumeTitle">Your Login Email</label>
                        <div class="col-md-8">
                            <input type="email" class="form-control" name="txtEmail" id="txtEmail" value="" tabindex="3">
                            <input type="hidden" name="chkEmail" value="0">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3  control-label" for="resumeTitle">Password</label>
                        <div class="col-md-8">
                            <input type="password" class="form-control" name="txtPassword" id="txtPassword" maxlength="255" value="" tabindex="4">
                            <span id="err_txtPassword" class="error-message" style="display:none">Invalid Password.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-8">
                            <div class="checkbox">
                                <label>
                                    <input name="chkIsNewLetter" type="checkbox" value="1" checked="checked" tabindex="5">
                                    I would like to receive weekly and monthly newsletters from VietnamWorks
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- Buttons-->
                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-8">
                            <button type="submit" name="Submit" value="I agree" class="btn btn-primary" tabindex="16">
                                <span>Sign Up</span></button>
                            <span class="processing" style="display: none; height:30px;"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-8">
                            <span>By clicking on "Sign Up", I have read and accept
                                <strong><a href="http://www.vietnamworks.com/privacy-policy" title="Privacy Policy">Privacy &amp; Policy</a></strong>
                                and
                                <strong><a href="http://www.vietnamworks.com/terms-of-use" title="Terms of Use">Terms of Use</a></strong>
                            </span>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>