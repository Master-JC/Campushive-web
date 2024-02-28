<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
        .table_deg{
            border:2px solid white;
            margin:auto;
            width:80%;
            text-align: center;
            margin-top:40px;
        }
        .th_deg{
            background-color:#ff8fab;
            padding:15px;
            color:white;
        }
        tr{
            border:3px solid;
        }
        td{
            padding:10px;
        }
        h2{
            text-align: center;
            font-size: 50px;
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
                    <h2 class="h5 no-margin-bottom">Aparment Rooms</h2>
                    <div class="list-inline-item logout">   <x-app-layout></x-app-layout></div>
                </div>
            </div>

                <table class="table_deg" >
                    <tr>
                        <th class="th_deg" >Room Title</th>
                        <th class="th_deg" >Description</th>
                        <th class="th_deg" >Price</th>
                        <th class="th_deg" >Room Type</th>
                        <th class="th_deg">Images</th>
                        <th class="th_deg">Delete</th>
                        <th class="th_deg">Update</th>
                    </tr>

                    @foreach($data as $data)

                    <tr>
                        <td>{{$data->room_title}}</td>
                        <td>{!! Str::limit($data->room_description, 150) !!}</td>
                        <td>{{$data->room_price}} ₱</td>
                        <td>{{$data->roomtype}}</td>
                        <td>
                            <img width="100" src="room/{{$data->room_image}}" alt="">
                        </td>
                        <td>
                            <a onclick="return confirm('Are you sure you want to delete this')" class="btn btn-danger" href="{{url('room_delete', $data->id)}}">Delete</a>
                        </td>
                        <td>
                            <a class="btn btn-warning" href="{{url('room_update', $data->id)}}">Update</a>
                        </td>
                    </tr>

                    @endforeach

                </table>

            </div>
        </div>
    </div>

        @include('admin.footer')
        </div>
    </div>
    </body>
</html>