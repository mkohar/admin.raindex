@extends('layouts.master')

@section('title')
<title>Raindex Creative | {{ $project->title }}</title>
@endsection

@section('css')
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{ asset('/vendor/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('/vendor/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('/vendor/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('/vendor/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Project</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item"><a href="#">Project</a></li>
               <li class="breadcrumb-item active">{{ $project->title }}</li>
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
                     <h3 class="card-title">Project <strong>{{ $project->title }}</strong></h3>
                     <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-4">
                           <h3 class="text-primary"><i class="fas fa-paint-brush"></i> {{ $project->title }}</h3>
                           <p class="text-muted">{{ $project->detail }}</p>
                           <p class="text-sm mt-4">Client
                              <b class="d-block">{{ $project->client->name }}</b>
                           </p>
                           <p class="text-sm mt-2">Team
                              @foreach ($project->users as $user)
                                 <b class="d-block">{{ $user->name }}</b>
                              @endforeach
                              <discussioan-userlist></discussioan-userlist>
                           </p>
                           <p class="text-sm mt-4">Notes
                              <b class="d-block">
                                 Website yang sudah ada : <a href="http://prod.tdm.co.id/">prod.tdm.co.id</a>
                              </b>
                              <b class="d-block">
                                 perencanaan fitur ada <a href="#">disini</a>.
                              </b>
                           </p>
                        </div>
                        <div class="col-md-8">
                           <div class="row">
                              <div class="col-md-4 col-sm-6">
                                 <div class="info-box bg-light">
                                    <div class="info-box-content">
                                       <span class="info-box-text text-center text-muted">Estimated budget</span>
                                       <span class="info-box-number text-center text-muted mb-0">Rp10.000.000,00</span>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-4 col-sm-6">
                                 <div class="info-box bg-light">
                                    <div class="info-box-content">
                                       <span class="info-box-text text-center text-muted">Satus</span>
                                       <span class="info-box-number text-center text-muted mb-0">Plan</span>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-4 col-sm-6">
                                 <div class="info-box bg-light">
                                    <div class="info-box-content">
                                       <span class="info-box-text text-center text-muted">Deadline</span>
                                       <span class="info-box-number text-center text-muted mb-0">17 Agustus 2020</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-12">
                                 <h4>Discussion</h4>
                                 <div class="card">
                                    <div class="card-body">
                                       @php
                                          $urlGet = route('project.single.discussion', ['id'=>$project->id ]);
                                          $urlPost = route('project.single.discussion.post', ['id'=>$project->id ]);
                                       @endphp
                                       <discussioan-box :url="{{ json_encode($urlGet) }}"></discussioan-box>
                                       <discussioan-form :url="{{ json_encode($urlPost) }}"></discussioan-form>

                                       {{-- <example-component></example-component> --}}

                                       {{-- <discussioan-userlist>

                                       </discussioan-userlist> --}}

                                       {{-- ============================== --}}
                                       
                                       
                                       
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- Modal About -->
<div class="modal fade" id="modalNewProject" tabindex="-1" role="dialog" aria-labelledby="modalNewProjectLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
   <div class="modal-content modal-lg">
      <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="modal-header">
            <h5 class="modal-title" id="modalNewProjectLabel">New Project</h5>
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
               <label for="client">Client</label>
               <div class="row">
                  <div class="col-md-8">
                     <select name="client_id" class="custom-select" id="client">
                        <option selected disabled>- Select Category -</option>
                        @foreach (ClientHelp::get_clients() as $client)
                           <option value="{{ $client->id }}">{{ $client->name }}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="col-md-4">
                     <button class="btn btn-sm btn-primary btn-block">New Client</button>
                  </div>
               </div>
               
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
               <label for="description">Team</label>
               <select name="user_id[]" class="custom-select" id="client" multiple>
                  @foreach (UserHelp::get_users() as $user)
                     <option value="{{ $user->id }}">{{ $user->name }}</option>
                  @endforeach
               </select>
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
<!-- SweetAlert2 -->
<script src="{{ asset('/vendor/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- DataTables -->
{{-- <script src="{{ asset('/vendor/plugins/datatables/jquery.dataTables.js') }}"></script> --}}
{{-- <script src="{{ asset('/vendor/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script> --}}
<!-- Select2 -->
{{-- <script src="{{ asset('/vendor/plugins/select2/js/select2.full.min.js') }}"></script> --}}

<script>
   // Select2
   // $('.select2').select2()
   // $(function () {
      

      // Data Tabel
      // $("#table").DataTable();

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
   // })
</script>
@endsection