<!DOCTYPE html>
<html>
<head>
    <base href="/public">
    @include('admin.css')
    <style type="text/css">
        label{
            display: inline-block;
            width: 200px;
        }
        .div_deg{
            padding-top:30px;
        }
        .div_center{
            text-align:center;
            padding-top: 40px;
        }
    </style>

</head>
<body>
    <div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
        @include('admin.sidebar')
    <!-- Sidebar Navigation end-->

    <div class="page-content">
        <div class="page-header">
        <div class="container-fluid d-flex justify-content-between align-items-center">
                    <h2 class="h5 no-margin-bottom">Update Apartment</h2>
                    <div class="list-inline-item logout">   <x-app-layout></x-app-layout></div>
                </div>
            <div class="container-fluid">

                <div class="div_center">

                    

                    <form action="{{url('edit_room', $data->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="div_deg">
                            <label>Room Title</label>
                            <input type="text" name="title" value="{{$data->room_title}}">
                        </div>
                        <div class="div_deg">
                            <label>Description</label>
                            <textarea name="description">{{$data->room_description}}</textarea>
                        </div>

                        <div class="div_deg">
                            <label>Price</label>
                            <input type="text" name="price" value="{{$data->room_price}}">
                        </div>

                        <div class="div_deg">
                            <label>Room Type</label>
                            <input type="text" name="roomtype" value="{{$data->roomtype}}" >
                        </div>

                        <div class="div_deg">
                            <label>Current Image</label>
                            <img style="margin:auto;" width="100" src="/room/{{$data->room_image}}">
                        </div>

                        <div class="div_deg">
                            <label>Upload Images</label>
                            <input type="file" name="uploadimages">
                        </div>

                        <div class="div_deg">
                            <input class="btn btn-primary" type="submit" value="Update Room">
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

        @include('admin.footer')
        </div>
    </div>
    <script src="admin/vendor/jquery/jquery.min.js"></script>
    <script src="admin/vendor/popper.js/umd/popper.min.js">     </script>
    <script src="admin/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="admin/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="admin/vendor/chart.js/Chart.min.js"></script>
    <script src="admin/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="admin/js/charts-home.js"></script>
    <script src="admin/js/front.js"></script>
    </body>
</html>