<!DOCTYPE html>
<html>
<head> 
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
        @include('admin.sidebar')


    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

            <div class="page-header">
                <div class="container-fluid d-flex justify-content-between align-items-center">
                    <h2 class="h5 no-margin-bottom">Add Apartment</h2>
                    <div class="list-inline-item logout">   <x-app-layout></x-app-layout></div>
                </div>
            </div>

                <div class="div_center">

                    <h1 style="font-size: 30px; font-weight:bold;" >Add Apartment</h1>

                    <form action="{{url('add_room')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="div_deg">
                            <label>Room Title</label>
                            <input type="text" name="title">
                        </div>
                        <div class="div_deg">
                            <label>Description</label>
                            <textarea name="description"></textarea>
                        </div>

                        <div class="div_deg">
                            <label>Price</label>
                            <input type="text" name="price">
                        </div>

                        <div class="div_deg">
                            <label>Room Type</label>
                            <input type="text" name="roomtype">
                        </div>

                        <div class="div_deg">
                            <label>Upload Images</label>
                            <input type="file" name="uploadimages">
                        </div>

                        <div class="div_deg">
                            <input class="btn btn-primary" type="submit" vaue="Add Room">
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

        @include('admin.footer')
        </div>
    </div>
    <!-- JavaScript files-->
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