@extends('layouts.app')

@section('title')
{{__('Invoices')}}
@endsection

@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">
            <i class="nav-icon fas fa-file-invoice-dollar"></i>
            {{__('Invoices')}}
          </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">{{__('Home')}}</a></li>
            <li class="breadcrumb-item active">{{__('Groups')}}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content')
<div class="card card-primary card-outline">
    <div class="card-header">
      <h3 class="card-title">{{__('Invoices Table')}}</h3>
      @can('create_group')
      <a href="{{route('admin.groups.create')}}" class="btn btn-primary btn-sm float-right">
        <i class="fa fa-plus"></i> {{__('Create')}} 
      </a>
      @endcan
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <!-- filter -->
      <div id="accordion">
        <div class="card card-info">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="btn btn-primary collapsed" aria-expanded="false">
            <i class="fas fa-filter"></i> {{__('Filters')}}
          </a>
          <div id="collapseOne" class="panel-collapse in collapse">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-3">
                  <div class="form-group">
                     <label for="filter_date">{{__('Date')}}</label>
                     <input type="text" class="form-control" id="filter_date" placeholder="{{__('Date')}}">
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                     <label for="filter_contract">{{__('Contract')}}</label>
                     <select name="filter_contract" id="filter_contract" class="form-control">
                     </select>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                     <label for="filter_created_by">{{__('Created by')}}</label>
                     <select name="filter_created_by" id="filter_created_by" class="form-control user_id">
                     </select>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                     <label for="filter_status">{{__('Status')}}</label>
                     <select name="filter_status" id="filter_status" class="form-control select2">
                        <option value="" selected>{{__('All')}}</option>
                        <option value="1">{{__('Done')}}</option>
                        <option value="0">{{__('Pending')}}</option>
                     </select>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                     <label for="filter_barcode">{{__('Barcode')}}</label>
                     <input type="text" class="form-control" id="filter_barcode" placeholder="{{__('Barcode')}}">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!-- \filter -->
      <div class="row">
         <div class="col-lg-12 table-responsive">
            <table id="groups_table" class="table table-striped table-bordered" width="100%">
               <thead>
                <tr>
                  <th width="10px">
                    <input type="checkbox" class="check_all" name="" id="">
                  </th>
                  <th width="10px">#</th>
                  <th width="10px">{{__('Created By')}}</th>
                  <th width="10px">{{__('Barcode')}}</th>
                  <th width="100px">{{__('Vendor Code')}}</th>
                  <th width="150px">{{__('Vendor Name')}}</th>
                  <th>{{__('Contract')}}</th>
                  <th width="100px">{{__('Subtotal')}}</th>
                  <th width="100px">{{__('Discount')}}</th>
                  <th width="100px">{{__('Total')}}</th>
                  <th width="100px">{{__('Paid')}}</th>
                  <th width="100px">{{__('Due')}}</th>
                  <th width="100px">{{__('Date')}}</th>
                  <th width="10px">{{__('Status')}}</th>
                  <th width="50px">{{__('Action')}}</th>
                </tr>
               </thead>
               <tbody>
                 
               </tbody>
               <tfoot>
                <tr class="btn-primary">
                   <th colspan="15">
                     {{__('Summary')}}
                   </th>
                </tr>
                <tr>
                  <th colspan="2">
                    <b>{{__('Subtotal')}} :</b>
                  </th>
                  <th colspan="13">
                    <span id="summary_subtotal" class="text-primary"></span>
                  </th>
                </tr>
                <tr>
                  <th colspan="2">
                    <b>{{__('Discount')}} :</b>
                  </th>
                  <th colspan="13">
                    <span id="summary_discount"></span>
                  </th>
                </tr>
                <tr>
                 <th colspan="2">
                   <b>{{__('Total')}} :</b>
                 </th>
                 <th colspan="13">
                   <span id="summary_total" class="text-info"></span>
                 </th>
                </tr>
                <tr>
                 <th colspan="2">
                   <b>{{__('Paid')}} :</b>
                 </th>
                 <th colspan="13">
                   <span id="summary_paid" class="text-success"></span>
                 </th>
                </tr>
                <tr>
                 <th colspan="2">
                   <b>{{__('Due')}}  :</b>
                 </th>
                 <th colspan="13">
                   <span id="summary_due" class="text-danger"></span>
                 </th>
                </tr>
              </tfoot>
             </table>
         </div>
      </div>
    </div>
    <!-- /.card-body -->
  </div>

  @include('admin.groups.modals.print_barcode')

@endsection
@section('scripts')
  <script>
    var can_delete=@can('delete_group')true @else false @endcan ;
    var can_view=@can('view_group')true @else false @endcan ;
  </script>
  <script src="{{url('js/select2.js')}}"></script>
  <script src="{{url('js/admin/groups.js')}}"></script>
@endsection