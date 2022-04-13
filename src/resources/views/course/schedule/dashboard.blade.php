@extends($layout)
@section('title', 'Schedule List')
<div class="course">
@include("course.header")

<style type="text/css">
	.box{
		padding-top: 5px;
		height: 120px;
		border-radius: 0px;
		box-shadow: 0px 0px 15px 1px #aaaaaa;
	}
	.leftHeader{
	}

	.box-header{
		background-color: #ffffff;
		color: #177BB6;
		font-weight: bold;
		padding: 10px;
		border-bottom: 1px solid #eeeeee;
	}
	.sendArea{
		text-align: center;
		padding: 5px;
	}
	.sendAreaInput:focus{
		outline: none;
	}
	.sendAreaInput{
		width: 90%;
		padding: 10px;
		background-color: #E3E9EA;
		border-width: 0px;
	}


.label{
    font-family: Montserrat;
    font-size: 17px;
    color: white;
}
.input{
    padding: 10px;
    border-radius: 10px;
    border: 1px solid #F97200;
}
.modal-content{
    background-color: black;
}








</style>
<div class="body" style="margin-top: 10px;">
<div class="row">
	<div class="col-md-8">
		<div class="box">
			<div class="leftHeader">
				<div style="font-size: 20px;">{{$scheduleData->name}}</div>
				<div style="font-size: 14px;">
					<b>Start:</b> {{$scheduleData->start_time->format('d M Y H:i a')}}<br/>
					<b>End:</b> {{$scheduleData->end_time->format('d M Y H:i a')}}
				</div>

			</div>
		</div>
		<div class="box" style="height: 450px;padding: 0px">
			@include("course.schedule.schedule_info_body")
		</div>
	</div>
    {{-- <h1 style="color: white">{{$scheduleData}}</h1> --}}
	<div class="col-md-4">
		<div class="box" style="height: 190px;box-shadow: 0px 0px 15px 1px #aaaaaa;">
			@if($scheduleData->isEnd())
				<h1>Class Is End</h1>
			@endif
			@if($scheduleData->isNotStart())
				<h1>Class Is Not Start</h1>
			@endif
			@if($scheduleData->isRunning())
				<h1>Class Is Running</h1>
				@if($scheduleData->metting_link != "")
					<a href="{{$scheduleData->metting_link}}"><button>Go To This Class</button></a>
				@endif
			@endif
		</div>

		<div class="box" style="padding: 0px;height: 370px;box-shadow: 0px 0px 15px 1px #aaaaaa;">
		 	<div class="box-header">Class Conversation</div>
		 	<div style="height: 280px;overflow-y: scroll;padding: 5px;" id="conversationBody">@include("course.schedule.conversation")</div>
		 	<div class="sendArea">
            	<div class="input-group">
              		<input type="text" id="message" autocomplete="off" name="message" placeholder="Type Message ..." class="form-control">
                  <span class="input-group-btn">

                    <button onclick="sendConversation()" type="submit" class="btn btn-success btn-flat">Send</button>
                  </span>
            	</div>
		 	</div>
		</div>
	</div>
</div>

<div class="col-md-12">
    <div >
        <h1 style="color: white"> Recorded Lecture </h1>
        <div class="box">

            <table class="table">
              <thead>
                <tr>

                  <th>Sl</th>
                  <th>Video Topic</th>
                  <th> Play  </th> 
                  <th>Action</th>

                </tr>
              </thead>

              <tbody>
                @foreach($data as $row)
                <tr> 
                  <td> 1 </td>
                  <td> {{$row->topic}}</td>
                   <td> <button> <a href="#"> Play </button> </td> 
              </tr>
              @endforeach

              </tbody>

            </table>

</div>
</div>
</div>
@if (Auth::user()->user_type=="Teacher")
<button  data-toggle="modal" data-target="#myModal"> Upload Lecture </button>
@endif
<div class="col-md-12">
    <div >
 <div class="leftHeader">
            <!-- <h1 style="color: white"> Recorded Video </h1> -->
            dsd sd 
           @foreach($data as $row)
             <video width="600" height="500" controls>
              <source src="{{asset('upload')}}/{{$row['video']}}" type="video/mp4">
            </video> 
            @endforeach 

        </div>

</div>
</div>





<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color: white">Upload Video</h4>
        </div>
        <div class="modal-body">


            <form method="post" action="/insert_video/{{$scheduleData->id}}" enctype="multipart/form-data">
                {{ csrf_field() }}
<div class="row" style="margin-top: 4px">
                <div class="col-md-3 label">Video Topic  :</div>
                <div class="col-md-5 input-box"><input type="text" id="file" class="input" name="topic" placeholder="Video Topic " autocomplete="off"></div>
</div>
<div class="row ">

 <input type="file" name="video"/>
                    <p>
                     @if($errors->has('video'))
                       {{ $errors->first('video') }}
                     @endif
                    </p> 

                     <button type="submit"> Submit </button>
                     </form>

</div>
                
                  





        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  <script>

$('#chooseFile').bind('change', function () {
  var filename = $("#chooseFile").val();
  if (/^\s*$/.test(filename)) {
    $(".file-upload").removeClass('active');
    $("#noFile").text("No file chosen...");
  }
  else {
    $(".file-upload").addClass('active');
    $("#noFile").text(filename.replace("C:\\fakepath\\", ""));
  }
});

  </script>

<script type="text/javascript">
	var updateConversationArea = setInterval(function(){ loadConversationArea(); }, 2000);

	function viewPresent(){
		modal.lg.open("Create Schedule");
    	loader(modal.lg.body);
    	$.get("http://127.0.0.1:8000/teacher/courses/97/schedule/9/present_graph", function(response) {
       		modal.lg.setBody(response);
       		load();
    	});
	}
</script>
