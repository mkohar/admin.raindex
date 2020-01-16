@extends('layouts.master')

@section('title')
<title>Raindex Creative | Portfolio</title>
@endsection

@section('css')
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{ asset('/vendor/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('/vendor/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Portfolio</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active">Portfolio</li>
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
            <div class="col-12">
               <div class="card card-outline card-info">
                  <div class="card-header">
                     <h3 class="card-title">Portfolios</h3>
                     <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                     </div>
                  </div>
                  <div class="card-body">
                     <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#modalNewPortfolio">New Portfolio</button>
                     <table id="table" class="table table-hover">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Title</th>
                              <th>Category</th>
                              <th>Description</th>
                              <th>Visibled</th>
                              <th>Images</th>
                              <th>Act</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($portfolios as $key => $portfolio)
                              <tr>
                                 <td>{{ $key+1 }}</td>
                                 <td>{{ $portfolio->title }}</td>
                                 <td>{{ $portfolio->category }}</td>
                                 <td>{{ $portfolio->description }}</td>
                                 <td>{{ $portfolio->visibled }}</td>
                                 <td>
                                    @foreach ($portfolio->images as $image)
                                    <img src="{{ asset('storage/portfolio/' . $image->file_name) }}" width="50px">
                                    @endforeach
                                 </td>
                                 <td>
                                 <a href="#" class="btn btn-warning btn-xs">Edit</a>
                                 </td>
                              </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- Modal About -->
<div class="modal fade" id="modalNewPortfolio" tabindex="-1" role="dialog" aria-labelledby="modalNewPortfolioLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
   <div class="modal-content modal-lg">
      <form action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="modal-header">
            <h5 class="modal-title" id="modalNewPortfolioLabel">New Portfolio</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div class="form-group">
               <label for="title">Title</label>
               <input type="text" name="title" class="form-control" id="title" placeholder="Project Title">
            </div>
            <div class="form-group">
               <label for="category">Category</label>
               <select name="category" class="custom-select" id="category">
                  <option selected disabled>- Select Category -</option>
                  <option value="Website">Website</option>
                  <option value="Mobile">Mobile</option>
                  <option value="Desktop">Desktop</option>
               </select>
            </div>
            <div class="form-group">
               <label for="description">Description</label>
               <textarea class="form-control" name="description" placeholder="Project Description" id="description"></textarea>
            </div>
            <div class="form-group">
               <label for="images">Images</label>
               <div class="custom-file">
                  <input type="file" name="images[]" class="custom-file-input" id="images" multiple>
                  <label class="custom-file-label" for="images">Choose file</label>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-sm btn-primary">Save changes</button>
         </div>
      </form>
   </div>
   </div>
</div>

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
<!-- SweetAlert2 -->
<script src="{{ asset('/vendor/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('/vendor/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('/vendor/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>

<script>
   $(function () {
      // Data Tabel
      $("#table").DataTable();

      // Alert
      @if (session('success'))
         var message = "{{ session('success') }}";
         const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: 5000
         });
         Toast.fire({
            type: 'success',
            title: message
         })
      @endif

      // File label form infut
      // $('#images').on('change',function(){
      //    var fileName = $(this).val();
      //    if (fileName.length > 1) {
      //       fileName = $(this).val().length + " image selected."
      //    }
      //    $(this).next('.custom-file-label').html(fileName);
      // })
   })
</script>
@endsection