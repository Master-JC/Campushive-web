<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    @include('home.css')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        /* Styles from original CSS */
        label{
            display:inline-block;
            width:200px;
        }
        input{
            width:100%;
        }
        .center-content {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh; /* Set the height of the container to the full viewport height */
}

/* Adjust the padding of the room info and booking form to ensure they are centered horizontally */
.room-info,
.booking-form {
    padding: 20px;
    margin: auto; /* This will center the content horizontally */
    max-width: 400px; /* Set a maximum width for better readability on larger screens */
}
        

        /* Additional styles for form */
        .booking-form {
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .booking-form h1 {
            font-size: 28px;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        .booking-form label {
            font-weight: bold;
            color: #333;
        }

        .booking-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        .booking-form input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .booking-form input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .booking-form input:focus {
            outline: none;
            border-color: #007bff;
        }

        .booking-form .form-group {
            margin-bottom: 20px;
        }

        .booking-form .form-group:last-child {
            margin-bottom: 0;
        }

        .booking-form .btn-block {
            width: 100%;
        }

        .room-info {
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .room-info img {
            max-width: 100%;
            border-radius: 10px;
        }

        .room-info h2 {
            margin-top: 20px;
            font-size: 24px;
            color: #333;
        }

        .room-info p {
            margin-bottom: 20px;
            color: #666;
        }
    </style>
</head>
<body class="main-layout">
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#"/></div>
    </div>
    <header>
        @include('home.header')
    </header>
    <div class="our_room">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Our Room</h2>
                        <p>Lorem Ipsum available, but the majority have suffered</p>
                    </div>
                </div>
            </div>
            <div class="row center-content">
                <div class="col-md-6 col-lg-4">
                    <div class="room-info">
                        <div class="room_img">
                            <img src="/room/{{$room->room_image}}" alt="Room Image"/>
                        </div>
                        <h2>{{$room->room_title}}</h2>
                        <p>{{$room->room_description}}</p>
                        <p>{{$room->roomtype}}</p>
                        <p>Piso {{$room->room_price}}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="booking-form">
                        <h1>Book Room</h1>
                        @if(session()->has('message'))
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{session()->get('message')}}
                            </div>
                        @endif
                        @if($errors)
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">{{$error}}</div>
                            @endforeach
                        @endif
                        <form action="{{url('add_booking',$room->id)}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" @if(Auth::id()) value="{{Auth::user()->name}}" @endif required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" @if(Auth::id()) value="{{Auth::user()->email}}" @endif required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="number" class="form-control" id="phone" name="phone" @if(Auth::id()) value="{{Auth::user()->phone}}" @endif required>
                            </div>
                            <div class="form-group">
                                <label for="startDate">Start Date</label>
                                <input type="date" class="form-control" id="startDate" name="startDate" required>
                            </div>
                            <div class="form-group">
                                <label for="endDate">End Date</label>
                                <input type="date" class="form-control" id="endDate" name="endDate" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-block" value="Book Room">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('home.footer')

    <script type="text/javascript">
        $(function(){
            var dtToday = new Date();
            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if (month < 10) {
                month = '0' + month.toString();
            }
            if (day < 0) {
                day = '0' + day.toString();
            }
            var maxDate = year + '-' + month + '_' + day;
            $('#startDate').attr('min', maxDate);
            $('#endDate').attr('min', maxDate);
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
