<style type="text/css">
	.loginArea {
    	margin-top: 130px;
	}
</style>





<div id="loginResponse">
<h1 class="doubleTxtWhite loginHeading" style="font-size: 32px; font-family:Montserrat"> Login Your Account </h1>


<div class="username">
<div class="loginInputLabel">Login Id</div>
<input class="inputBox" type="text" id="login_id" name="login_id" placeholder="Enter Login Id">
</div>

<div class="password">
<div class="loginInputLabel">Password</div>
<input class="inputBox" type="password" name="password" id="password" placeholder="Enter Password">
</div>

<div class="pull-right"  style="margin-bottom: 0px;">
	<a id="myLink" href="javascript:MyFunction();"><i class="fa fa-home" aria-hidden="true"></i><b>
 Forgot Password?</b></a>
</div>
<div class="loginbutton" style="text-align:center;">
<button class="loginBtn btnOrange" id="loginBtn" onclick="login()">Login Class Room</button>
</div>
</div>
<!-- <center>Not registred? <a id="loadRegistrationBtn" href="javascript:loadLoginArea('registration');"><u><b>Create an account</b></u></a></center> -->

