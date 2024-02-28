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
        <div class="page-content">
        <div class="container-fluid d-flex justify-content-between align-items-center">
                    <h2 class="h5 no-margin-bottom">Add Apartment</h2>
                    <div class="list-inline-item logout">   <x-app-layout></x-app-layout></div>
                </div>
            <div class="page-header">
                <div class="container-fluid">
                    <center>
                        <h1 style ="font-size: 30px; font-weight:bold;" >Mail to send to {{$data->name}}</h1>
                        <form action="{{url('verification', $data->id)}}" method="POST">
                        @csrf
                        <div class="div_deg">
                            <label>Greetings</label>
                            <input type="text" name="greeting" value="Good Day,  {{$data->name}}">
                        </div>
                        <div class="div_deg">
                            <label>Mail Body</label>
                            <textarea name="body">Hello {{$data->name}}, We are happy to announce that your reservation in CAMPUSHIVE is confirmed!, Your Booking number is {{$data->id}}. Your Check-in date is {{$data->start_date}} and Check-out date is {{$data->end_date}}.   Total Ammount: ₱ {{$data->room->room_price}}.00 </textarea>
                        </div>
                        <div class="div_deg">
                            <label>End Line</label>
                            <input type="text" name="endline" value="Thank you for choosing CAMPUSHIVE.. Have a great day! -Admin">
                        </div>
                        <div class="div_deg">
                            <input class="btn btn-primary" type="submit" value="Send Email">
                        </div>
                    </form>
                    </center>
                </div>
            </div>
        </div>
        @include('admin.footer')
        </div>
    </div>
    <!-- JavaScript files-->
    <script src="admin/vendor/jquery/jquery.min.js"></script>
    <script src="admin/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="admin/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="admin/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="admin/vendor/chart.js/Chart.min.js"></script>
    <script src="admin/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="admin/js/charts-home.js"></script>
    <script src="admin/js/front.js"></script>
    </body>
</html>