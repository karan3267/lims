@extends('layouts.app')

@section('title')
{{__('Create product')}}
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
            <h1 class="m-0 text-dark">
              <i class="nav-icon fas fa-cubes"></i>   
              {{__('Products')}}
            </h1>
          </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">{{__('Home')}}</a></li>
            <li class="breadcrumb-item "><a href="{{route('admin.inventory.products.index')}}">{{__('Products')}}</a></li>
            <li class="breadcrumb-item active">{{__('Create product')}}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content')

    


<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">{{__('Create product')}}</h3>
    </div>
    <form method="POST" action="{{route('admin.inventory.products.store')}}">
        <!-- /.card-header -->
        <div class="card-body">
            @csrf
            @include('admin.inventory.products._form')
        </div>
        <div>
            <table class="table">
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
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="inventory-entries">
                    <tr>
                        <td><input type="text" name="inventory[0][receipt_no]" class="form-control" required></td>
                        <td><input type="text" name="inventory[0][chemical_name]" class="form-control" required></td>
                        <td><input type="text" name="inventory[0][supplier_name]" class="form-control" required></td>
                        <td><input type="text" name="inventory[0][lot_no]" class="form-control" required></td>
                        <td><input type="date" name="inventory[0][expiration_date]" class="form-control" required></td>
                        <td><input type="date" name="inventory[0][received_on]" class="form-control" required></td>
                        <td><input type="text" name="inventory[0][units]" class="form-control" required></td>
                        <td><input type="number" step="0.01" name="inventory[0][amount_received]" class="form-control" required></td>
                        <td><input type="number" step="0.01" name="inventory[0][amount_accepted]" class="form-control" required></td>
                        <td><input type="text" name="inventory[0][received_by]" class="form-control" required></td>
                        <td><input type="text" name="inventory[0][storage_location]" class="form-control" required></td>
                        <td><button type="button" class="btn btn-danger remove-inventory">Remove</button></td>
                    </tr>
                </tbody>
            </table>

            <button type="button" class="btn btn-primary" id="add-inventory">Add Inventory</button>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">
              <i class="fa fa-check"></i> {{__('Save')}}
            </button>
        </div>
    </form>

</div>
@endsection
@section('scripts')
  <script src="{{url('js/admin/products.js')}}"></script>
  <script>
    $(document).ready(function() {
        let inventoryCount = 1;

        $('#add-inventory').click(function() {
            inventoryCount++;
            const newInventory = `
                <tr>
                    <td><input type="text" name="inventory[${inventoryCount}][receipt_no]" class="form-control"></td>
                    <td><input type="text" name="inventory[${inventoryCount}][chemical_name]" class="form-control"></td>
                    <td><input type="text" name="inventory[${inventoryCount}][supplier_name]" class="form-control"></td>
                    <td><input type="text" name="inventory[${inventoryCount}][chemical_name]" class="form-control"></td>
                    <td><input type="text" name="inventory[${inventoryCount}][lot_no]" class="form-control"></td>
                    <td><input type="text" name="inventory[${inventoryCount}][expiration_date]" class="form-control"></td>
                    <td><input type="text" name="inventory[${inventoryCount}][received_on]" class="form-control"></td>
                    <td><input type="text" name="inventory[${inventoryCount}][units]" class="form-control"></td>
                    <td><input type="text" name="inventory[${inventoryCount}][amount_received]" class="form-control"></td>
                    <td><input type="text" name="inventory[${inventoryCount}][amount_accepted]" class="form-control"></td>
                    <td><input type="text" name="inventory[${inventoryCount}][received_by]" class="form-control"></td>
                    <td><input type="text" name="inventory[${inventoryCount}][storage_location]" class="form-control"></td>
                    <td><button type="button" class="btn btn-danger remove-inventory">Remove</button></td>
                </tr>
            `;
            $('#inventory-entries').append(newInventory);
        });

        $(document).on('click', '.remove-inventory', function() {
            $(this).closest('tr').remove();
        });
    });
</script>
@endsection