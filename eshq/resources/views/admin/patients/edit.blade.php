@extends('layouts.app')

@section('title')
{{__('Edit Vendor')}}
@endsection

@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">
            <i class="nav-icon fas fa-user-injured"></i>
            {{__('Vendors')}}
          </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">{{__('Home')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.patients.index')}}">{{__('Vendors')}}</a></li>
            <li class="breadcrumb-item active">{{__('Edit vendor')}}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">{{__('Edit vendor')}}</h3>
    </div>
    <!-- /.card-header -->
    <form method="POST" action="{{route('admin.patients.update',$patient->id)}}" id="patient_form" enctype="multipart/form-data">
        <!-- /.card-header -->
        <div class="card-body">
            @csrf
            @method('put')
            @include('admin.patients._form')
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
        </div>
    </form>
    <!-- /.card-body -->
  </div>

@endsection
@section('scripts')
  <script src="{{url('js/admin/patients.js')}}"></script>
  @cannot('bulk_action_patient')
  <script>
    $(document).ready(function(){
      table.on('init',function(){
        $(document).find('#bulk_action_section').remove();
      });
    });
  </script>
  @endcan
@endsection