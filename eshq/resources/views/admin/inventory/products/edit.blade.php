@extends('layouts.app')

@section('title')
{{__('Edit product')}}
@endsection

@section('css')
  <link rel="stylesheet" href="{{ url('plugins/summernote/summernote-bs4.css') }}">
@endsection

@section('breadcrumb')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">
          <i class="nav-icon fas fa-cubes"></i>
          {{ __('Products') }}
        </h1>
      </div><div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">{{ __('Home') }}</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.inventory.products.index') }}">{{ __('Products') }}</a></li>
          <li class="breadcrumb-item active">{{ __('Edit product') }}</li>
        </ol>
      </div></div></div></div>
@endsection

@section('content')
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">{{ __('Edit product') }}</h3>
  </div>
  <form method="POST" action="{{ route('admin.inventory.products.update', $product['id']) }}">
    @csrf
    @method('PUT')
    <div class="card-body">
      @include('admin.inventory.products._form')

      @if (isset($product->inventoryProducts) && count($product->inventoryProducts) > 0)
        <h4>{{ __('Existing Inventory Entries') }}</h4>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Receipt No</th>
              <th>Chemical Name</th>
              <th>Supplier Name</th>
              <th>Lot No</th>
              <th>Expiration Date</th>
              <th>Received On</th>
              <th>Units</th>
              <th>Amount Received</th>
              <th>Amount Accepted</th>
              <th>Received By</th>
              <th>Storage Location</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($product->inventoryProducts as $inventoryItem)
              <tr>
                  
                <td><input type="text" name="inventory[0][receipt_no]" class="form-control" required value="{{ $inventoryItem->receipt_no }}"></td>
                <td><input type="text" name="inventory[0][chemical_name]" class="form-control" required value="{{ $inventoryItem->chemical_name }}"></td>
                <td><input type="text" name="inventory[0][supplier_name]" class="form-control" required value="{{ $inventoryItem->supplier_name }}"></td>
                <td><input type="text" name="inventory[0][lot_no]" class="form-control" required value="{{ $inventoryItem->lot_no }}"></td>
                <td><input type="date" name="inventory[0][expiration_date]" class="form-control" required value="{{ $inventoryItem->expiration_date }}"></td>
                <td><input type="date" name="inventory[0][received_on]" class="form-control" required value="{{ $inventoryItem->received_on }}"></td>
                <td><input type="text" name="inventory[0][units]" class="form-control" required value="{{ $inventoryItem->units }}"></td>
                <td><input type="number" step="0.01" name="inventory[0][amount_received]" class="form-control" required value="{{ $inventoryItem->amount_received }}"></td>
                <td><input type="number" step="0.01" name="inventory[0][amount_accepted]" class="form-control" required value="{{ $inventoryItem->amount_accepted }}"></td>
                <td><input type="text" name="inventory[0][received_by]" class="form-control" required value="{{ $inventoryItem->received_by }}"></td>
                <td><input type="text" name="inventory[0][storage_location]" class="form-control" value="{{ $inventoryItem->storage_location }}"></td>  
              
              </tr>
            @endforeach
          </tbody>
        </table>
      @endif
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">
        <i class="fa fa-check"></i> {{ __('Save') }}
      </button>
    </div>
  </form>
</div>
@endsection

@section('scripts')
  <script src="{{ url('js/admin/products.js') }}"></script>
@endsection
