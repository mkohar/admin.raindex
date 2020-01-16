@extends('layouts.master')

@section('title')
<title>Raindex Creative | Dashboard</title>
@endsection

@section('css')

@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            </div>
         </div>
      </div>
   </div>
   <!-- /.content-header -->

   <!-- Main content -->
   <div class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
               <div class="info-box">
                  <span class="info-box-icon bg-info"><i class="far fa-newspaper"></i></span>
                  <div class="info-box-content">
                     <span class="info-box-text">Buletin</span>
                  <span class="info-box-number">-</span>
                  </div>
               </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
               <div class="info-box">
                  <span class="info-box-icon bg-success"><i class="fas fa-bullhorn"></i></span>
                  <div class="info-box-content">
                     <span class="info-box-text">Berita</span>
                     <span class="info-box-number">-</span>
                  </div>
               </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
               <div class="info-box">
                  <span class="info-box-icon bg-warning"><i class="fas fa-users"></i></span>
                  <div class="info-box-content">
                     <span class="info-box-text">Pelanggan</span>
                     <span class="info-box-number">-</span>
                  </div>
               </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
               <div class="info-box">
                  <span class="info-box-icon bg-danger"><i class="far fa-share-square"></i></span>
                  <div class="info-box-content">
                     <span class="info-box-text">Dibagikan</span>
                     <span class="info-box-number">-</span>
                  </div>
               </div>
            </div>
         </div>
         <!-- /.row -->
         <div class="row">
            {{-- right dashboard --}}
            <div class="col-md-8 col-12">
               {{-- total visitor chart --}}
               <div class="card card-outline card-info">
                  <div class="card-header">
                     <h3 class="card-title">Grafik pengunjung</h3>
                     <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                        {{-- <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button> --}}
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="chart">
                        <canvas id="totalVisitorChart" style="height:250px; min-height:250px"></canvas>
                     </div>
                  </div>
               </div>
               {{-- top 5 bulletins --}}
               <div class="card card-outline card-info">
                  <div class="card-header">
                     <h3 class="card-title">5 bulletin terpopuler</h3>
                     <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                        {{-- <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button> --}}
                     </div>
                  </div>
                  <div class="card-body">
                     <table class="table">
                        <thead>
                           <tr class="text-center">
                              <th>#</th>
                              <th>Judul buletin</th>
                              <th>Dilihat</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            {{-- left dashboard --}}
            <div class="col-md-4 col-12">
               {{-- total visitor chart --}}
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">Pelanggan baru</h3>
                     <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                        {{-- <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button> --}}
                     </div>
                  </div>
                  <div class="card-body">
                     <p>umar@gmail.com</p>
                     <p>maman@gmail.com</p>
                     <p>siti1002@gmail.com</p>
                     <p>jubaidah.ajh@gmail.com</p>
                  </div>
               </div>
            </div>
         </div>
         <!-- /.row -->
      </div>
   </div>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('js')
<!-- jQuery -->
<script src="{{ asset('/vendor/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/vendor/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('/vendor/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/vendor/dist/js/adminlte.min.js') }}"></script>
<!-- page script -->
<script src="{{ asset('/vendor/plugins/chart.js/Chart.min.js') }}"></script>

{{-- Data chart visit --}}
<script>

   var ctx = document.getElementById('totalVisitorChart').getContext('2d');
   var stackedLine = new Chart(ctx, {
      type: 'line',
      data: {
         labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
         datasets: [{
            label: 'Jumlah Pengunjung',
            data: [121, 130, 125, 200, 300, 262],
            fill: false,
            borderColor: 'rgba(11, 156, 49, 1)',
            borderWidth: 2,
            pointRadius: 3,
            // lineTension: 0, // kekakuan tekukan
         }]
      },
      options: {
         scales: {
            yAxes: [{
                  ticks: {
                     beginAtZero: true
                  }
            }]
         }
      }
   });
</script>
@endsection