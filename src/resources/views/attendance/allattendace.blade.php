@extends($layout)
@section('title', 'Attendance')
<style type="text/css">

.circle-tile {
    margin-bottom: 15px;
    text-align: center;
}
.circle-tile-heading {
    border: 3px solid rgba(255, 255, 255, 0.3);
    border-radius: 100%;
    color: #FFFFFF;
    height: 80px;
    margin: 0 auto -40px;
    position: relative;
    transition: all 0.3s ease-in-out 0s;
    width: 80px;
}
.circle-tile-heading .fa {
    line-height: 80px;
}
.circle-tile-content {
    padding-top: 50px;
}
.circle-tile-number {
    font-size: 26px;
    font-weight: 700;
    line-height: 1;
    padding: 5px 0 15px;
}
.circle-tile-description {
    text-transform: uppercase;
}
.circle-tile-footer {
    background-color: rgba(0, 0, 0, 0.1);
    color: rgba(255, 255, 255, 0.5);
    display: block;
    padding: 5px;
    transition: all 0.3s ease-in-out 0s;
}
.circle-tile-footer:hover {
    background-color: rgba(0, 0, 0, 0.2);
    color: rgba(255, 255, 255, 0.5);
    text-decoration: none;
}
.circle-tile-heading.dark-blue:hover {
    background-color: #2E4154;
}
.circle-tile-heading.green:hover {
    background-color: #138F77;
}
.circle-tile-heading.orange:hover {
    background-color: #DA8C10;
}
.circle-tile-heading.blue:hover {
    background-color: #2473A6;
}
.circle-tile-heading.red:hover {
    background-color: #CF4435;
}
.circle-tile-heading.purple:hover {
    background-color: #7F3D9B;
}
.tile-img {
    text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.9);
}

.dark-blue {
    background-color: #34495E;
}
.green {
    background-color: #16A085;
}
.blue {
    background-color: #2980B9;
}
.orange {
    background-color: #F39C12;
}
.red {
    background-color: #E74C3C;
}
.purple {
    background-color: #8E44AD;
}
.dark-gray {
    background-color: #7F8C8D;
}
.gray {
    background-color: #95A5A6;
}
.light-gray {
    background-color: #BDC3C7;
}
.yellow {
    background-color: #F1C40F;
}
.text-dark-blue {
    color: #34495E;
}
.text-green {
    color: #16A085;
}
.text-blue {
    color: #2980B9;
}
.text-orange {
    color: #F39C12;
}
.text-red {
    color: #E74C3C;
}
.text-purple {
    color: #8E44AD;
}
.text-faded {
    color: rgba(255, 255, 255, 0.7);
}


</style>
<div class='container'>
<div class="row-sm-3" style='margin-left:55px;'>

    <div class="container-fluid">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark" style="color:white;">List Attendance</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 mx-auto">
                        <div class="card">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg mx-auto">
                        <div class="card card-primary">
                            <div class="card-header">
                                <div class="card-title text-center">
                                    
                                    {{-- @if ($filter)
                                        of a range
                                    @endif --}}
                                </div>

                            </div>
                            <div class="card-body">
                                {{-- @if ($attendances->count()) --}}
                                <table class="table table-bordered table-hover" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Entry Time</th>
                                            <th>Entry Location</th>
                                            <th>Exit Time</th>
                                            <th>Exit Location</th>
                                        </tr>
                                    </thead>

                                </table>
                                {{-- @else --}}
                                <div class="alert alert-info text-center" style="width:50%; margin: 0 auto">
                                    <h4>No Records Available</h4>
                                </div>
                                {{-- @endif --}}

                            </div>
                        </div>
                        <!-- general form elements -->

                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                responsive:true,
                autoWidth: false,
            });
            $('#date_range').daterangepicker({
                "maxDate": new Date(),
                "locale": {
                    "format": "DD-MM-YYYY",
                }
            })
        });
    </script>
    </div>






</div>
</div>




<style type="text/css">
.container{
    width:100%;

}
.container .table-bordered{
    background: white;
    width:80%;
    margin-left: 65px;
    margin-top:25px;


}
.container .table-bordered thead{
    background: #c9dff1;
    border-style: solid;
    border-color: pink;

}
.container .table-bordered .thead .tr {
    color: pink;
    border-style: solid;
    border-color: black;
}

.container .table-bordered tbody{
    background: #c9dff1;
    border-style: solid;
    border-color: pink;
}

</style>
