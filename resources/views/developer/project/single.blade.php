@extends('layouts.master')

@section('title')
<title>Raindex Creative | {{ $project->title }}</title>
@endsection

@section('css')
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{ asset('/vendor/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('/vendor/plugins/summernote/summernote-bs4.css') }}">

<style>
.widget{
   cursor:pointer;
   -webkit-touch-callout: none;
   -webkit-user-select: none;
   -khtml-user-select: none;
   -moz-user-select: none;
   -ms-user-select: none;
   user-select: none;
}
</style>
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
                           <p class="text-sm mt-4">Client <button  class="btn btn-link"><i class="far fa-edit"></i></button>
                              <b class="d-block">{{ $project->client->name }}</b>
                           </p>
                           <p class="text-sm mt-2">Team <button  class="btn btn-link"><i class="far fa-edit"></i></button>
                              @foreach ($project->users as $user)
                                 <b class="d-block">{{ $user->name }}</b>
                              @endforeach
                           </p>
                           <p class="text-sm mt-4">Notes <button  class="btn btn-link"><i class="far fa-edit"></i></button>
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
                              <div class="col-md-4 col-sm-6" onclick="btnBudgetClick()"> 
                                 <div class="info-box bg-light widget">
                                    <div class="info-box-content">
                                       <span class="info-box-text text-center text-muted">Estimated budget</span>
                                       <span class="info-box-number text-center text-muted mb-0">
                                          {{ $project->budget ? number_format($project->budget) : '-' }}
                                       </span>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-4 col-sm-6" onclick="btnStatusClick()"> 
                                 <div class="info-box bg-light widget">
                                    <div class="info-box-content">
                                       <span class="info-box-text text-center text-muted">Satus</span>
                                       <span class="info-box-number text-center text-muted mb-0">
                                          {{ $status != null ? $status->name : '-' }}
                                       </span>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-4 col-sm-6" onclick="btnDeadlineClick()">
                                 <div class="info-box bg-light widget">
                                    <div class="info-box-content">
                                       <span class="info-box-text text-center text-muted">Deadline</span>
                                       <span class="info-box-number text-center text-muted mb-0">
                                          {{ $project->deadline ? $project->deadline : '-' }}
                                       </span>
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
                                          // $urlGetUsers = route('project.single.users', ['id'=>$project->id ]);
                                       @endphp
                                       <discussioan-box :url="{{ json_encode($urlGet) }}"></discussioan-box>
                                       <discussioan-form :url="{{ json_encode($urlPost) }}"></discussioan-form>
                                       <discussioan-userlist></discussioan-userlist>                                    
                                       <textarea class="teaxarea" name="" id="" cols="30" rows="10"></textarea>
                                       
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

<!-- Modal Budget -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalBudget">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <form action="{{ route('project.update.budget', ['id'=>$project->id]) }}">
            <div class="modal-header">
               <h5 class="modal-title">Estimated budget</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="input-group">
                  {{-- <label for="exampleInputPassword1">Password</label> --}}
                  <div class="input-group-prepend">
                     <div class="input-group-text">Rp</div>
                   </div>
                  <input type="text" name="budget" class="form-control" value="{{ $project->budget }}">
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
            </div>
         </form>
      </div>
   </div>
 </div>

<!-- Modal Status -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalStatus">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <form action="{{ route('project.update.status', ['id'=>$project->id]) }}">
            <div class="modal-header">
               <h5 class="modal-title">Project Status</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="form-group">
                  <select class="custom-select mr-sm-2" name="status_id">
                     <option disabled>Choose...</option>
                     @foreach ($statuses as $item)
                        <option value="{{ $item->id }}" {{ $status->id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>    
                     @endforeach
                  </select>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
            </div>
         </form>
      </div>
   </div>
 </div>

<!-- Modal Deadline -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalDeadline">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <form action="{{ route('project.update.deadline', ['id'=>$project->id]) }}">
            <div class="modal-header">
               <h5 class="modal-title">Project Deadline</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="form-group">
                  <input type="date" name="deadline" class="form-control" value="{{ $project->deadline }}">
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
            </div>
         </form>
      </div>
   </div>
 </div>

@endsection

@section('js')
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<!-- SweetAlert2 -->
<script src="{{ asset('/vendor/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('/vendor/plugins/summernote/summernote-bs4.min.js') }}"></script>

<script>
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

   function btnBudgetClick() { 
      $('#modalBudget').modal('show')
   } 
   function btnStatusClick() { 
      $('#modalStatus').modal('show')
   } 
   function btnDeadlineClick() { 
      $('#modalDeadline').modal('show')
   } 

   $(function () {
      // Summernote
      $('.teaxarea').summernote({
         placeholder: 'Ketik buletin disini...',
         tabsize: 2,
         height: 300,
         toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            // ['insert', ['link', 'picture', 'hr']],
            ['insert', ['link', 'hr']],
            ['view', ['fullscreen', 'codeview']],
            ['help', ['help']]
         ],
      })
   })
</script>
@endsection