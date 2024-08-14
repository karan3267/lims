@extends('layouts.app')

@section('title')
  {{__('Create Sample')}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{url('plugins/summernote/summernote-bs4.css')}}">
@endsection

@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">
            <i class="fa fa-vial"></i>
            {{__('Samples')}}
          </h1>
        </div><div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">{{__('Home')}}</a></li>
            <li class="breadcrumb-item "><a href="{{route('admin.samples.index')}}">{{__('Samples')}}</a></li>
            <li class="breadcrumb-item active">{{__('Create Sample')}}</li>
          </ol>
        </div></div></div></div>
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">{{__('Create')}}</h3>
    </div>
    <form method="POST" action="{{route('admin.samples.store')}}" id="sample_form">
        <div class="card-body">
            @csrf
            @include('admin.sample._form')
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i> {{__('Save')}}</button>
        </div>
    </form>

</div>
@endsection

@section('scripts')
  <script src="{{url('js/admin/samples.js')}}"></script>
  <script src="{{ asset('js/jq2.min.js') }}"></script>

@endsection
