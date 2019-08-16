<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Registered Contestants</title>
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
    <!-- Content Header (Page header) -->
    <section class="content container-fluid">
      <!-- all contestants table -->
      <div>
        <form action="{{route('admin.registered')}}" method="post">
        @csrf
            <div class="row">
                <div class="col-md-9">
                        <div class="form-group">
                            <input type="text" name="search_registered" class="form-control" placeholder="Search by: Paystack ref, Firstname, WhastApp no, State">
                        </div>
                    </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-primary">Search</button>
                    </div>
                </div>
            </div>
        </form>
      </div>


      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
          @if(count($getByPaystackReference)=="0")
          <table class="table no-margin">
              <thead>
                <tr>
                <th>S/N</th>
                  <th>Couple1 & Couple2 </th>
                  <th>Month</th>
                  <th>State</th>
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
              <?php $sn = 1; ?>
			  @foreach($getAllRegisteredContestants as $getUser)
                <tr>
                  <td>{{$sn++}}</td>
                  <td><b>{{ucfirst($getUser->first_name_one)}} {{ucfirst($getUser->last_name_one)}}, {{ucfirst($getUser->first_name_two)}} {{ucfirst($getUser->last_name_two)}}</b></td>
                  <td>{{ucfirst($getUser->anniversary_month)}}</td>
                  <td>{{ucfirst($getUser->state_of_res)}}</td>
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
			{{$getAllRegisteredContestants->render()}}
            @else
            <table class="table no-margin">
              <thead>
                <tr>
                <th>S/N</th>
                  <th>Couple1 & Couple2 </th>
                  <th>Month</th>
                  <th>State</th>
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
                <?php $sn = 1; ?>
			  @foreach($getByPaystackReference as $getUser)
                <tr>
                <td>{{$sn++}}</td>
                  <td><b>{{ucfirst($getUser->first_name_one)}} {{ucfirst($getUser->last_name_one)}}, {{ucfirst($getUser->first_name_two)}} {{ucfirst($getUser->last_name_two)}}</b></td>
                  <td>{{ucfirst($getUser->anniversary_month)}}</td>
                  <td>{{ucfirst($getUser->state_of_res)}}</td>
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
			{{$getByPaystackReference->render()}}
            @endif
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