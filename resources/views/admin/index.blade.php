<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Home</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 @include('layouts.header')
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
@include('layouts.topnav')
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

<!-- sidebar: style can be found in sidebar.less -->
@include('layouts.sidenav')
<!-- /.sidebar -->
</aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$getTotalContestantsMonth}}</h3>

              <p>Total Contestants [{{date("F")}}]</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-people"></i>
            </div>
            <a href="all_contestants.html" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$getPaidContestants}}</h3>
			  <!-- <sup style="font-size: 20px">%</sup> -->
              <p>Paid Contestants [{{date("Y")}}]</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-people"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$getContestantsNotPaid}}</h3>

              <p>Unpaid Contestants [{{date("Y")}}]</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-people"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$getContestantsByYear}}</h3>

              <p>Total Registered Contestants [{{date("Y")}}]</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="registered_contestants.html" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Total Registered Contestants</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin">
              <thead>
                <tr>
				<th>S/N</th>
                  <th>Couple1 & Couple2 </th>
                  <th>Month</th>
                  <th>Whatsapp Number</th>
                  <th>Phone Number</th>
                  <th>Image</th>
				  <th>Reference</th>
				  <th>Receipt</th>
                  <th>Payment Status</th>
				  <th>View Profile</th>
                </tr>
              </thead>
              <tbody>
			  <?php $sn = 1;?>
			  @foreach($getAllRegisteredContestants as $getUser)
                <tr>
				<td>{{$sn++}}</td>
                  <td><b>{{ucfirst($getUser->first_name_one)}} {{ucfirst($getUser->last_name_one)}}, {{ucfirst($getUser->first_name_two)}} {{ucfirst($getUser->last_name_two)}}</b></td>
                  <td>{{ucfirst($getUser->anniversary_month)}}</td>
                  <td>{{ucfirst($getUser->whatsApp_no)}}</td>
                  <td>{{ucfirst($getUser->phone_no)}}</td>
                  <td><a href="{{('/user_image/'.$getUser->couple_picture)}}" target="_blank">
				  <img src="{{asset('user_image/'.$getUser->couple_picture)}}" height='30' width='30' style="border-radius: 50%;"></a></td>
				 @if(is_null($getUser->reference))
				  <td>No Ref Found</td>
				  @else
				  <td>{{ucfirst($getUser->reference)}}</td>
				  @endif
				  @if(is_null($getUser->receipt))
				  <td>No Receipt Found</td>
				  @else
				  <td>{{ucfirst($getUser->receipt)}}</td>
				  @endif
				  @if($getUser->status=='0')
				  <td><button class="btn btn-danger badge" type="button">Pending</button></td>
				  @else
				  <td><button class="btn btn-success badge" type="button">Confirmed</button></td>
				  @endif
				  <td><a href="{{('/admin/'.$getUser->id.'/couple')}}">Couple Profile</a></td>
                </tr>
				@endforeach
              </tbody>
            </table>
			<p><a href="{{route('admin.all-contestants')}}">View all</a></p>
          </div>
          <!-- /.table-responsive -->
          <!-- /.row -->
          <!-- Main row -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="#">Camet Empire</a>.</strong> All rights reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
@include('layouts.footer')
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>