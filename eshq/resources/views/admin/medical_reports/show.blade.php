@extends('layouts.app')

@section('title')
{{__('Print medical report')}}
@endsection

@section('css')
  <link rel="stylesheet" href="{{url('css/print.css')}}">
@endsection

@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fa fa-flag"></i>
                    {{__('Lab reports')}}
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">{{__('Home')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.medical_reports.index')}}">{{__('Lab reports')}}</a></li>
                    <li class="breadcrumb-item active">{{__('Print lab report')}}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')

@can('view_medical_report')
<div class="row mb-3">
    <div class="col-lg-12">
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#patient_modal">
            <i class="fas fa-user-injured"></i> {{__('Vendor info')}}
        </button>
        <a @if(isset($previous)) href="{{route('admin.medical_reports.show',$previous['id'])}}" @endif class="btn btn-info @if(!isset($previous)) disabled @endif">
            <i class="fa fa-backward mr-2"></i> 
            {{__('Previous')}}
        </a>
        <a @if(isset($next)) href="{{route('admin.medical_reports.show',$next['id'])}}" @endif class="btn btn-success @if(!isset($next)) disabled @endif">
            {{__('Next')}}
            <i class="fa fa-forward ml-2"></i> 
        </a>
    </div>
</div>
@endcan

<form method="POST" action="{{route('admin.medical_reports.pdf',$group['id'])}}" id="print_form">
    @csrf
    <!-- patient code -->
    <input type="hidden" id="patient_code" @if(isset($group['patient'])) value="{{$group['patient']['code']}}" @endif>
    
    @if($group['uploaded_report'])
    <div class="row mb-3">
        <div class="col-lg-12">
            <a href="{{$group['report_pdf']}}" class="btn btn-danger float-right" target="_blank">
                <i class="fa fa-file-pdf"></i>
                {{__('Print uploaded report')}}
            </a>
        </div>
    </div>
    @else 
    <div class="row mb-3">
        <div class="col-lg-6">
            <h6 class="text-info">
                {{__('Select tests and cultures to be printed in the report')}}
            </h6>
        </div>
        <div class="col-lg-6">
          
            <button type="submit" class="btn btn-primary float-right d-inline">
                <i class="fa fa-print"></i>
                {{__('Print')}}
            </button>

           
            <button type="button" class="btn btn-danger deselect_all float-right d-inline mr-2">
                <i class="fa fa-times-circle"></i>
                {{__('Deselect all')}}
            </button>

            <button type="button" class="btn btn-success select_all float-right d-inline mr-2">
                <i class="fas fa-check-square"></i>
                {{__('Select all')}}
            </button>

        </div>
    </div>
    @endif

    <div class="row">
        <!-- Tests -->
        <div class="col-lg-12">
            <div class="card card-primary">
                <div class="card-header">

                    <div class="row">
                        <div class="col-lg-10">
                            <h3 class="card-title">{{__('Tests')}}</h3>
                        </div>
                       
                    </div>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="accordion">
                        <div class="row">
                            <div class="col-lg-12 table-responsive">
                                <table width="100%">
                                    <tbody id="analysis_titles_sort">
                                        @if(!count($group['all_tests']))
                                        <tr class="nosort">
                                            <td class="text-center">
                                                {{__('No data available')}}
                                            </td>
                                        </tr>
                                        @endif
                                        @foreach($group['all_tests'] as $test)
                                        <tr>
                                            <td>
                                                <div class="card card-primary card-outline collapsed-card" id="card_{{$test['id']}}">
        
                                                    <div class="card-header">
                                                        <h4 class="card-title">
                                                            @if(!$group['uploaded_report'])
                                                            <input type="checkbox" class="analyses_select" id="test_{{$test['id']}}" name="tests[]" value="{{$test['id']}}">
                                                            @endif
                                                            @if($test['done']) 
                                                                <i class="fa fa-check text-success"></i>
                                                            @endif
                                                            <label for="test_{{$test['id']}}">@if(isset($test['test'])) {{$test['test']["name"]}} @endif</label>
                                                        </h4>
                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                                            </button>
                                                        </div>
                                                    </div>
        
                                                    <div class="card-body p-0">
                                                        <table class="table table-striped table-bordered table-sm">
                                                            <thead>
                                                                <tr class="analysis_head">
                                                                    <th width="30%">{{__('Test')}}</th>
                                                                    <th width="10%" class="text-center">{{__('Result')}}</th>
                                                                    <th width="20%" class="text-center">{{__('Unit')}}</th>
                                                                    <th width="30%" class="text-center">{{__('Normal Range')}}</th>
                                                                    <th width="10%" class="text-center">{{__('Status')}}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($test["results"] as $result)
                                                                    @if(isset($result['component']))
                                                                        <!-- Title -->
                                                                        @if($result['component']['title'])
                                                                            <tr>
                                                                                <td colspan="5" class="title">
                                                                                    <b>{{$result['component']['name']}}</b>
                                                                                </td>
                                                                            </tr>
                                                                        @else
                                                                        <tr>
                                                                            <td>{{$result["component"]["name"]}}</td>
                                                                            <td class="text-center">{{$result["result"]}}</td>
                                                                            <td class="text-center">{{$result["component"]["unit"]}}</td>
                                                                            <td class="text-center">
                                                                                {!! $result["component"]["reference_range"] !!}
                                                                            </td>
                                                                            <td class="text-center">
                                                                               {{$result["status"]}}
                                                                            </td>
                                                                        </tr>
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                                @if(isset($test['comment']))
                                                                <tr>
                                                                    <td colspan="5">
                                                                        <table width="100%">
                                                                            <tbody>
                                                                                <tr class="comment">
                                                                                    <th width="90px">{{__('Comment')}} :</th>
                                                                                    <td>
                                                                                        {!! str_replace("\n", '<br />',  $test['comment']) !!}
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>                                                                        
                                                                    </td>
                                                                </tr>
                                                                @endif
                                                            </tbody>
        
                                                        </table>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
        
                                    </tbody>
        
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- \Tests -->

        <!-- Cultures -->
        <div class="col-lg-12">
            <div class="card card-primary">
                <div class="card-header">

                    <div class="row">
                        <div class="col-lg-10">
                            <h3 class="card-title">{{__('Cultures')}}</h3>
                        </div>
                    </div>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="accordion">
                        <div class="row">
                            <div class="col-lg-12 table-responsive">
                                @if(!count($group['all_cultures']))
                                    <p class="text-center">
                                        {{__('No data available')}}
                                    </p>
                                @endif
                                @foreach($group['all_cultures'] as $culture)
                                <div class="card card-primary card-outline collapsed-card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            @if(!$group['uploaded_report'])
                                            <input type="checkbox" class="analyses_select" id="culture_{{$culture['id']}}" name="cultures[]" value="{{$culture['id']}}">
                                            @endif
                                            @if($culture['done']) 
                                                <i class="fa fa-check text-success"></i>
                                            @endif
                                            <label for="culture_{{$culture['id']}}">
                                                {{$culture['culture']['name']}}
                                            </label>
                                        </div>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <!-- culture options -->
                                        <table  width="100%">
                                            <tbody>
                                                @foreach($culture['culture_options'] as $culture_option)
                                                    @if(isset($culture_option['value'])&&isset($culture_option['culture_option']))
                                                        <tr>
                                                            <th class="no-border nowrap" width="10px" nowrap="nowrap">
                                                                <span class="option_title">{{$culture_option['culture_option']['value']}} :</span>
                                                            </th>
                                                            <td class="no-border">
                                                                {{$culture_option['value']}}
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <!-- /culture options -->

                                        <!-- sensitivity -->
                                        <table class="table table-bordered" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>{{__('Name')}}</th>
                                                    <th>{{__('Sensitivity')}}</th>
                                                    <th>{{__('Commercial name')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($culture['high_antibiotics'] as $antibiotic)
                                                    <tr>
                                                        <td width="200px" nowrap="nowrap" align="left">
                                                            {{$antibiotic['antibiotic']['name']}}
                                                        </td>
                                                        <td width="120px" nowrap="nowrap" align="center">
                                                            {{$antibiotic['sensitivity']}}
                                                        </td>
                                                        <td>
                                                            {{$antibiotic['antibiotic']['commercial_name']}}
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                @foreach($culture['moderate_antibiotics'] as $antibiotic)
                                                    <tr>
                                                        <td width="200px" nowrap="nowrap" align="left">
                                                            {{$antibiotic['antibiotic']['name']}}
                                                        </td>
                                                        <td width="120px" nowrap="nowrap" align="center">
                                                            {{$antibiotic['sensitivity']}}
                                                        </td>
                                                        <td>
                                                            {{$antibiotic['antibiotic']['commercial_name']}}
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                @foreach($culture['resident_antibiotics'] as $antibiotic)
                                                <tr>
                                                    <td width="200px" nowrap="nowrap" align="left">
                                                        {{$antibiotic['antibiotic']['name']}}
                                                    </td>
                                                    <td width="120px" nowrap="nowrap" align="center">
                                                        {{$antibiotic['sensitivity']}}
                                                    </td>
                                                    <td>
                                                        {{$antibiotic['antibiotic']['commercial_name']}}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <!-- Comment -->
                                        @if(isset($culture['comment']))
                                        <table width="100%"  class="comment">
                                            <tbody>
                                                <tr>
                                                    <td width="100px" nowrap="nowrap"><b>{{__('Comment')}}</b> :</td>
                                                    <td>{{$culture['comment']}}</td>
                                                </tr>
                                            </tbody>
                                        </table>     
                                        @endif
                                        <!-- /comment -->
                                    </div>
                                </div>
                                @endforeach                               
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- \Cultures -->
    </div>

    @if($group['uploaded_report'])
        <div class="row mb-3">
            <div class="col-lg-12">
                <a href="{{$group['report_pdf']}}" class="btn btn-danger float-right" target="_blank">
                    <i class="fa fa-file-pdf"></i>
                    {{__('Print uploaded report')}}
                </a>
            </div>
        </div>
    @else 
    <div class="row mb-3">
        <div class="col-lg-6">
            <h6 class="text-info">
                {{__('Select tests and cultures to be printed in the report')}}
            </h6>
        </div>
        <div class="col-lg-6">
          
            <button type="submit" class="btn btn-primary float-right d-inline">
                <i class="fa fa-print"></i>
                {{__('Print')}}
            </button>

           
            <button type="button" class="btn btn-danger deselect_all float-right d-inline mr-2">
                <i class="fa fa-times-circle"></i>
                {{__('Deselect all')}}
            </button>

            <button type="button" class="btn btn-success select_all float-right d-inline mr-2">
                <i class="fas fa-check-square"></i>
                {{__('Select all')}}
            </button>

        </div>
    </div>
    @endif
</form>

@can('view_medical_report')
<div class="row mb-3">
    <div class="col-lg-12">
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#patient_modal">
            <i class="fas fa-user-injured"></i> {{__('Vendor info')}}
        </button>
        <a @if(isset($previous)) href="{{route('admin.medical_reports.show',$previous['id'])}}" @endif class="btn btn-info @if(!isset($previous)) disabled @endif">
            <i class="fa fa-backward mr-2"></i> 
            {{__('Previous')}}
        </a>
        <a @if(isset($next)) href="{{route('admin.medical_reports.show',$next['id'])}}" @endif class="btn btn-success @if(!isset($next)) disabled @endif">
            {{__('Next')}}
            <i class="fa fa-forward ml-2"></i> 
        </a>
    </div>
</div>
@endcan 

@include('admin.medical_reports._patient_modal')

@endsection
@section('scripts')
    <script src="{{url('plugins/ekko-lightbox/ekko-lightbox.js')}}"></script>
    <script src="{{url('js/admin/medical_reports.js')}}"></script>
@endsection