@section('title', 'Attendance')

<div class="container">

<div class="container-fluid">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="color: white">Register Attendance</h1>
                </div>

            </div>
<a href=""> Show My Attendance</a>

            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title" style="color: white">Today's Attendance</h3>
                        </div>
                        <!-- /.card-header -->
                        {{-- @include('messages.alerts') --}}
                        <!-- form start -->
                        @if (!$attendance)
                        <form role="form" method="post" action="/attendance/{{$user->id}}" >
                        @else
                        <form role="form" method="post" action="/attendance/{{$attendance->id}}" >
                            @method('PUT')
                        @endif
                            @csrf
                            <div class="card-body">
                                @if (!$attendance)
                                <div class="row text-center">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="entry_time"  style="color: white">Entry Time</label>
                                            <input
                                            type="text"
                                            class="form-control text-center"
                                            name="entry_time"
                                            id="entry_time"
                                            placeholder="--:--:--"
                                            disabled
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="entry_location"  style="color: white">Entry Location</label>
                                            <input
                                            type="text"
                                            class="form-control text-center"
                                            id="entry_loc"
                                            placeholder="Locaton Loading..."
                                            disabled
                                            />
                                            <input type="text" name="entry_location" name="entry_location"
                                            id="entry_location" hidden>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="entry_ip"  style="color: white">Entry IP Address</label>
                                            <input
                                            type="text"
                                            class="form-control text-center"
                                            id="entry_ip"
                                            name="entry_ip"
                                            placeholder="X.X.X.X"
                                            disabled
                                            />
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="row text-center">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="entry_time"  style="color: white"  >Entry Time</label>
                                            <input
                                            type="text"
                                            value="{{ $attendance->created_at->format('d-m-Y,  H:i:s') }}"
                                            class="form-control text-center"
                                            name="entry_time"
                                            id="entry_time"
                                            placeholder="--:--:--"
                                            disabled
                                            style="background: #333; color:#f4f4f4"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="entry_location"  style="color: white">Entry Location</label>
                                            <input
                                            type="text"
                                            class="form-control text-center"
                                            name="entry_location"
                                            value="{{ $attendance->entry_location }}"
                                            placeholder="..."
                                            disabled
                                            style="background: #333; color:#f4f4f4"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="entry_ip"  style="color: white">Entry IP Address</label>
                                            <input
                                            type="text"
                                            class="form-control text-center"
                                            id="entry_ip"
                                            value="{{ $attendance->entry_ip }}"
                                            name="entry_ip"
                                            placeholder="X.X.X.X"
                                            disabled
                                            style="background: #333; color:#f4f4f4"
                                            />
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if (!$registered_attendance)
                                <div class="row text-center">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exit_time"  style="color: white">Exit Time</label>
                                            <input
                                            type="text"
                                            class="form-control text-center"
                                            name="exit_time"
                                            id="exit_time"
                                            placeholder="--:--:--"
                                            disabled
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exit_location"  style="color: white">Exit Location</label>
                                            <input
                                            type="text"
                                            class="form-control text-center"
                                            id="exit_loc"
                                            @if ($attendance)
                                            placeholder="Loading location..."

                                            @else
                                            placeholder="..."

                                            @endif
                                            disabled
                                            />
                                            <input type="text" name="exit_location"
                                            id="exit_location" hidden>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exit_ip"  style="color: white">Exit IP Address</label>
                                            <input
                                            type="text"
                                            class="form-control text-center"
                                            id="exit_ip"
                                            name="exit_ip"
                                            placeholder="X.X.X.X"
                                            disabled
                                            />
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="row text-center">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exit_time"  style="color: white">Exit Time</label>
                                            <input
                                            type="text"
                                            class="form-control text-center"
                                            name="exit_time"
                                            id="exit_time"
                                            value="{{ $attendance->updated_at->format('d-m-Y,  H:i:s') }}"
                                            placeholder="--:--:--"
                                            disabled
                                            style="background: #333; color:#f4f4f4"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exit_location"  style="color: white">Exit Location</label>
                                            <input
                                            type="text"
                                            class="form-control text-center"
                                            name="exit_location"
                                            value="{{ $attendance->exit_location }}"
                                            placeholder="..."
                                            disabled
                                            style="background: #333; color:#f4f4f4"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exit_ip"  style="color: white">Exit IP Address</label>
                                            <input
                                            type="text"
                                            class="form-control text-center"
                                            id="exit_ip"
                                            name="exit_ip"
                                            value="{{ $attendance->exit_ip }}"
                                            placeholder="X.X.X.X"
                                            disabled
                                            style="background: #333; color:#f4f4f4"
                                            />
                                        </div>
                                    </div>
                                </div>
                                @endif


                            </div>
                            <!-- /.card-body -->
                            @if (!$registered_attendance)
                            <div class="card-footer" >
                                @if (!$attendance)
                                <button type="submit" class="btn btn-primary p-3" style="font-size:1.2rem">
                                    Record Entry
                                </button>
                                @else
                                <button type="submit" class="btn btn-primary pull-right p-3" style="font-size:1.2rem">
                                    Record Exit
                                </button>
                                @endif
                            </div>
                            @endif

                        </form>
                    </div>

                </div>
                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
                <script>


                    $(document).ready(function() {
                        if ("geolocation" in navigator) {
                            console.log("gl available");
                            navigator.geolocation.getCurrentPosition(position => {
                                console.log(position.coords.latitude + "," + position.coords.longitude);

                                $.post("/attendance/get-location",
                                {
                                    lat: position.coords.latitude,
                                    lon: position.coords.longitude,
                                    '_token': $('meta[name=csrf-token]').attr('content'),
                                }
                                , function(data) {
                                    console.log(!'{{ $registered_attendance }}')
                                        $('#entry_loc').val(data);
                                        $('#entry_location').val(data);
                                        if('{{ $attendance }}') {
                                            $('#exit_loc').val(data);
                                            $('#exit_location').val(data);
                                        }
                                });
                            }, function() {
                                $('#address').val('Denied Permission to retreive location');
                            });
                        } else {
                            $('#address').html("Location not available");
                        }
                    });
                    </script>

</div>
</div>

