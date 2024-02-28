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

                <div class="container-fluid d-flex justify-content-between align-items-center">
            <h2 class="h5 no-margin-bottom">Costumer Messages</h2>
            <div class="list-inline-item logout">   <x-app-layout></x-app-layout></div>
          </div>
                <table class="table_deg" >
                    <tr>
                        <th class="th_deg" >Name</th>
                        <th class="th_deg" >Email</th>
                        <th class="th_deg" >Phone</th>
                        <th class="th_deg" >Message</th>
                        <th class="th_deg" >Send Email</th>
                    </tr>
                    @foreach($data as $data)
                    <tr>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->phone}}</td>
                        <td>{{$data->message}}</td>
                        <td>
                          <a class="btn btn-success" href="{{url('send_mail', $data->id)}}">Send Email</a>
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