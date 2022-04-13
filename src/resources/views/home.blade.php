<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.4.2/css/all.css'>
		<!-- JQuery Lib -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <!-- Bootstrap Lib -->
	<link href="https://fonts.googleapis.com/css?family=Exo 2" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">	<link rel="stylesheet" href="http://coderoj.com/style/lib/font-awesome/css/font-awesome.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
	{{-- <script type="text/javascript" src="http://coderoj.com/style/lib/editarea_0_8_2/edit_area/edit_area_full.js"></script> --}}
	<link href="https://fonts.googleapis.com/css?family=Exo 2" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,800" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="css/home.css">
	<script type="text/javascript" src="js/home/home.js"></script>
<style type="text/css">

	.background-img{

		background-image:url('img/site/backblur.png');
		width: 100%;
  		height: 100vh;
		background-size: 100% 100%;

	}
.overlay-color{
    width: 100%;
    height: 100vh;
    background: #000;
    opacity: 0.85;
    position: absolute;
}
.row{
justify-content: space-between
}
.loginArea{
    border:1px solid black;
    height: inherit;
    width: inherit;
    background: #000;
    border-radius: 25px;
    padding: 10px;

}



}
</style>
<script type="text/javascript">
	var _token = "{{ csrf_token() }}";
</script>
</head>

<body>
	<div class="background-img">
    <div class=" overlay-color"> </div>


 <div class="row">
	
 <div class=" col-md-6" style=" text-align: center; margin-top:80px;">
		<div class="homeLeft text-center">
			<div class="homeTextArea">
				<span class="doubleTxtOrange welcomeTxt" >E-learning System </span>
			

			</div>
			<img style="width: 45%" src="{{asset('img/site/yclogo.png')}}">
		</div>
	</div>

	 <div class="col-md-5 p-3">
		<div class="loginArea">
			<div class="inputArea" id="loginArea">
				@include("home.login")
			</div>
		</div>
	</div> 

</div>
<!--

	


</div> -->

</div>
</body>
</html>
