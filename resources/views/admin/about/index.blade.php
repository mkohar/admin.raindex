@extends('layouts.master')

@section('title')
<title>Raindex Creative | About Us</title>
@endsection

@section('css')
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('/vendor/plugins/summernote/summernote-bs4.css') }}">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{ asset('/vendor/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">About Us</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active">About Us</li>
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
                     <h3 class="card-title">About Radain Creative</h3>
                     <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                     </div>
                  </div>
                  <div class="card-body">
                     {{-- Button update us --}}
                     <div>
                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalAbout">Update About Us</button>
                     </div>
                     {{-- About us --}}
                     <div class="mt-4">
                        {!! $aboutUs->about_us !!}
                        <footer class="blockquote-footer">Updated by <strong>{{ $aboutUs->user->name }}</strong></footer>
                     </div>
                     {{-- Vission Mission --}}
                     <div class="row mt-5">
                        <div class="col-md-6">
                           <div class="card">
                              <div class="card-header">
                                 <h3 class="card-title">Vission</h3>
                              </div>
                              <div class="card-body">
                                 {!! $vission->vission !!}
                                 <footer class="blockquote-footer">Updated by <strong>{{ $vission->user->name }}</strong></footer>
                                 <br>
                                 <div class="float-right">
                                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalVission">Update Vission</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="card">
                              <div class="card-header">
                                 <h3 class="card-title">Mission</h3>
                              </div>
                              <div class="card-body">
                                 {!! $mission->mission !!}
                                 <footer class="blockquote-footer">Updated by <strong>{{ $mission->user->name }}</strong></footer>
                                 <br>
                                 <div class="float-right">
                                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalMission">Update Mission</button>
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
<div class="modal fade" id="modalAbout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
   <div class="modal-content modal-lg">
      <form action="{{ route('aboutUs.update', ['id'=>$aboutUs->id]) }}" method="POST">
         @csrf
         @method('put')
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">About Raindex Creative</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <textarea class="textarea form-control" name="aboutUs" placeholder="Place some text here">{!! $aboutUs->about_us !!}</textarea>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-sm btn-primary">Save changes</button>
         </div>
      </form>
   </div>
   </div>
</div>

<!-- Modal Vission -->
<div class="modal fade" id="modalVission" tabindex="-1" role="dialog" aria-labelledby="modalVissionLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
   <div class="modal-content modal-lg">
      <form action="{{ route('vission.update', ['id'=>$vission->id]) }}" method="POST">
         @csrf
         @method('put')
         <div class="modal-header">
            <h5 class="modal-title" id="modalVissionLabel">Vission Raindex Creative</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <textarea class="textarea form-control" name="vission" placeholder="Place some text here">{!! $vission->vission !!}</textarea>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-sm btn-primary">Save changes</button>
         </div>
      </form>
   </div>
   </div>
</div>

<!-- Modal Mission -->
<div class="modal fade" id="modalMission" tabindex="-1" role="dialog" aria-labelledby="modalMissionLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
   <div class="modal-content modal-lg">
      <form action="{{ route('mission.update', ['id'=>$mission->id]) }}" method="POST">
         @csrf
         @method('put')
         <div class="modal-header">
            <h5 class="modal-title" id="modalMissionLabel">Mission Raindex Creative</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <textarea class="textarea form-control" name="mission" placeholder="Place some text here">{!! $mission->mission !!}</textarea>
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
<!-- Summernote -->
<script src="{{ asset('/vendor/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('/vendor/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

<script>
   // Summernote
   $(function () {
      $('.textarea').summernote({
         placeholder: 'About Us',
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
      });

      
      @if (session('success'))
         var message = "{{ session('success') }}";
         const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000
         });
         Toast.fire({
            type: 'success',
            title: message
         })
      @endif
   })
</script>
@endsection