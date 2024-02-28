<div class="page-content">
        <div class="page-header">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <h2 class="h5 no-margin-bottom">Admin Dashboard</h2>
            <div class="list-inline-item logout">   <x-app-layout></x-app-layout></div>
            </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-3 col-sm-6">
              <a href="{{url('user_chart')}}" style="display: block;">
                  <div class="statistic-block block">
                      <div class="progress-details d-flex align-items-end justify-content-between">
                          <div class="title">
                          <div class="icon"><i class="fa fa-user"></i></div><strong>Users</strong>
                          </div>
                      </div>
                  </div>
              </a>
            </div>
            <div class="col-md-3 col-sm-6">
              <a href="{{url('room_chart')}}" style="display: block;">
                  <div class="statistic-block block">
                      <div class="progress-details d-flex align-items-end justify-content-between">
                          <div class="title">
                          <div class="icon"><i class="fa fa-bed"></i></div><strong>Most Booked</strong>
                          </div>
                      </div>
                  </div>
              </a>
            </div>
            <div class="col-md-3 col-sm-6">
              <a href="your-link-here" style="display: block;">
                  <div class="statistic-block block">
                      <div class="progress-details d-flex align-items-end justify-content-between">
                          <div class="title">
                            <div class="icon"><i class="fa fa-book"></i></div><strong>Bookings</strong>
                          </div>
                      </div>
                  </div>
              </a>
            </div>
        </section>
