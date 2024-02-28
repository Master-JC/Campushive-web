<!DOCTYPE html>
<html>
<head> 
    @include('admin.css')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
</head>
<body>
<div class="d-flex align-items-stretch">
    @include('admin.sidebar')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <h2 class="h5 no-margin-bottom">Most Booked Rooms</h2>
                <div class="list-inline-item log Apartmentout">   <x-app-layout></x-app-layout></div>
            </div>
            <canvas id="chart"></canvas>
            <script>
                var ctx = document.getElementById('chart').getContext('2d');
                var roomChart = new Chart(ctx, {
                    type: 'bar', 
                    data: { 
                        labels: {!! json_encode($labels) !!},
                        datasets: {!! json_encode($datasets) !!}
                    } 
                });
            </script>
        </div>
    </div>    
    @include('admin.footer')
</div>  
</body>
</html>
