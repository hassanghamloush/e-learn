@extends($layout)
@section('title', 'Course List')
<style type="text/css">

		.course-list{

		}

		.course-list .header{
			font-weight: bold;
			font-size: 16px;
			border-bottom: 1px solid black;
			padding: 10px 5px 10px 5px;
			height: 55px;
			margin-left:0px;
			position: -webkit-sticky;position: sticky;
  			top: 0;
  			background-color:  #17161B;
  			z-index: 999;
		}


		.course-list-body{
			padding: 15px 5px 15px 5px;
		}

		.course-list a{
			text-decoration: none;
		}
		.course-list .active {
			color: #F97200;
		}

		.course-list .normal{
			font-size: 13px;
			color: white;
		}
		.course-list .normal {
			color: white;
		}
button {
    background-color: #F97200;
    color:white ;
    padding: 8px;
    border: none;
    cursor: pointer;
    border-radius: 3px;
    font-size: 14px;
}

 button:hover {
    opacity: 0.8;
    color:white;
}

 button:disabled {
    opacity: 0.8;
    color: #ffffff;
}

button:focus {
    outline: none;
}

.course-list .input {
    padding: 12px;
    width: 100%;
    border-radius: 5px;
    font-size: 14px;
    border: 1px solid black;
    margin-bottom: 5px;

}
.course-list .inputLabel{
    font-weight: bold;
    padding-top: 12px;
    padding-bottom: 5px;
    text-align: right;
}

.course-list .input:focus {
    outline: none;
}
.course-list .card{
	padding: 2px;
	height: 205px;
	border: 1px solid black;

	margin-bottom: 25px;
	background-color: rgba(38, 36, 36, 0.9);
	overflow: hidden;

}

.course-list .card img{
	height: 75px;
	width: 100%;
}
.course-list .card-body{
	height: 85px;
	padding: 3px;
    color: white;
}
</style>
	<div class="course-list">
		<div class="header">
			<div class="row">
				<div class="col-md-12">
					<div class="pull-left" style="margin-top: 7px;">
					@if(Auth::user()->user_type=="Teacher")
						<a href="/{{$userType}}/courses"><span class="{{!(isset(request()->request_courses)|isset(request()->archive_course))?'active':'normal'}}"><i class="fa fa-play"></i> Current</span></a> | <a href="/{{$userType}}/courses?archive_course=1"><span class="{{isset(request()->archive_course)?'active':'normal'}}"><i class="fa fa-clock-o"></i> Archive</span></a> | <a href="/{{$userType}}/courses?request_courses=1"><span class="{{isset(request()->request_courses)?'active':'normal'}}"><i class="fa fa-clock-o"></i> Requset</span></a>
					@endif
					@if(Auth::user()->user_type=="Student")
						<a href="/{{$userType}}/courses"><span class="{{!(isset(request()->request_courses)|isset(request()->archive_course))?'active':'normal'}}"><i class="fa fa-play"></i> Current</span></a> | <a href="/{{$userType}}/courses?archive_course=1"><span class="{{isset(request()->archive_course)?'active':'normal'}}"><i class="fa fa-clock-o"></i> Archive</span></a>
					@endif
					</div>
					@if($userType  == 'teacher')
					<div class="pull-right">
						<button class="" onclick="loadCreateCourse()"><i class="fa fa-plus"></i> Create Course</button>
					</div>
					@endif
					@if($userType  == 'student')
					<div class="pull-right">

						<button class=""  onclick="loadJoinCourse()"><i class="fa fa-plus"></i> Join Course</button>
					</div>
					@endif
				</div>
			</div>
		</div>



		<div class="course-list-body">
			<div class="row">
			@foreach($courseList as $key => $data)
               <div class="col-md-3 col-sm-4">
               		<div class="card">
               			<div class="card-header">
               				<img src="{{asset($data->cover)}}">
               				<div style="margin-top: -65px;padding-left: 5px;color: #ffffff">


               					<font size="5px;"><b>{{$data->subject}}</b></font><br/>
               					<div style="margin-top: -5px;">{{$data->code}}</div>
               				</div>
               			</div>
               			<div class="card-body" style="margin-top: 20px;">
               				<center>
               					@if($data->isTeacher())
               						@if($data->isAdmin())
               							<span class="label label-success"><i class="fas fa-user-shield"></i> Admin</span>
               						@elseif($data->isModerator())
               							<span class="label label-info"><i class="fas fa-user-cog"></i> Moderator</span>
               						@endif
               					@endif
               				</center>
               				Subject: {{$data->name(16)}}<br/>
               			</div>

               			<div class="card-footer">
               				<a href="{{url($userType.'/courses/'.$data->id)}}" page-title='{{$data->name}}' title="View"><button style="width: 100%; background-color: rgba(38, 36, 36, 0.9); color: white"><b>View</b></button></a>
               			</div>
               		</div>
               </div>

            @endforeach
            </div>

		</div>
	</div>
