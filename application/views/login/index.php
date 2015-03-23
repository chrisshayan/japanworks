<div id="vnw-log-in" class="container">
<div class="login-wrapper row">
	<div class="login-intro col-md-8">
		<h2>Please sign in to continue...</h2>
		<ul>
			<li><strong>Access to thousands of jobs</strong>
				<span>View over 3,000 new jobs every month and apply online instantly!</span>
			</li>
			<li><strong>Job search while you sleep</strong>
				<span>Create a Job Alert – we'll send you an email with new jobs that fit you as soon as they appear on our site!</span>
			</li>
			<li><strong>Get career advice</strong>
				<span>Visit our Career Center for tips on how to write a great resume or interview successfully!</span>
			</li>
		</ul>
	</div>
	<div class="login-box col-md-4">
		<div class="login-box-border">
			<h2>JobSeekers Sign In Here</h2>
			<form name="signin" action="<?php echo site_url('login');?>" method="post">
				<fieldset>
					<input type="hidden" name="redirectURL" value="">
					<input name="username" type="text" placeholder="Email Address" tabindex="1" autocomplete="off"><?php if($msg!='') echo($msg);?>
					<input name="password" type="password" placeholder="Password" tabindex="2">
					<button class="submit-button" name="login" value="Sign In" type="submit" tabindex="3">Sign In</button>
					<input type="hidden" name="jobidforjobdetail" value="">
					<input type="hidden" name="remember" value="1">
					<input type="hidden" name="hidcode" value="">
					<a href="<?php echo(MAIN_SITE);?>/forget-password">Forgot Password?</a>
				</fieldset>
			</form>
            <!--
			<div class="line-break"></div>
			<p>Or sign in with:</p>
			<div class="social-login">
				<a href="javascript:void(0)" onclick="openWindow('http://www.vietnamworks.com/jobseekers/open_authenticate.php?accountType=facebook')" class="facebook">Facebook</a>
				<a class="linkedin">LinkedIn</a>
				<a href="javascript:void(0)" onclick="openWindow('https://accounts.google.com/o/oauth2/auth?state=%2Fprofile&redirect_uri=http://www.vietnamworks.com/jobseekers/open_authenticate.php?accountType=google&response_type=token&client_id=801322098095-vudl42dlf22aidvb7p100f5jrhls9puq.apps.googleusercontent.com&scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.email+https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.profile')" class="google">Google</a>
			</div> -->
			<div class="line-break"></div>
			<p>Don't have an account yet?</p>
			<a class="register" href="<?php echo site_url('sign-up');?>">Register Now!</a>
		</div>
	</div>
</div>
</div>