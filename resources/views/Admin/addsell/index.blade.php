@extends('layouts.admin_app')
@section('title', 'Admin | Dashboard')
@section('content_head')
<div class="card">
   <div class="card-body">
      <div class="form-group">
         <form name="add_name" id="add_name" method="POST" action="{{ route('admin.sell.store') }}">
            @csrf
            <input type="hidden" name="invoice_id" value="{{ $invoiceData }}">
            <div class="form-group">
               <label class="form-control-label" for="date">Date</label>
               <input type="date" style="width: 15%;" class="form-control" id="date" name="date" required>
            </div>

           <div class="form-group">
             <label class="form-control-label" for="customer_id">Shop Select</label>
             <select required data-toggle="select" class="form-control"  id="customer_id" name="shop_id" required>
               <option></option>

               @foreach($shop_data as $row)
               <option value="{{ $row->id }}">{{ $row->shop_name }}</option>
               @endforeach
             </select>
           </div>

            <div class="table-responsive">
               <table class="table table-bordered" id="dynamic_field">
                  <tr>
                     <td>
                        <input  required type="number" name="product_id[]" placeholder="Product Id" class="form-control product_id" />
                     </td>
                     <td>
                        <input required type="number" name="quantity[]
                        " placeholder="Product Quantity" class="form-control product_quantity" />
                     </td>
                     <td>
                        <input required type="number" name="price[]
                        " placeholder="Price" class="form-control product_price" />
                     </td>
                     <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                  </tr>
               </table>
               <input type="submit" id="submit" class="btn btn-info" value="Submit" />
            </div>
         </form>
      </div>
   </div>
</div>
<!-- Table -->
<div class="row">
   <div class="col">
     <div class="card">
       <!-- Card header -->
       <div class="card-header">
         <h3 class="mb-0">Products Lists</h3>
       </div>
       <div class="table-responsive py-4">
         <table class="table table-flush" id="datatable-buttons">
           <thead class="thead-light">
             <tr>
               <th>Page No</th>
               <th>Product Name</th>
             </tr>
           </thead>
           <tbody>
            @foreach($products as $row)
             <tr>
               <td>{{ $row->id }}</td>
               <td>{{ $row->product_name }}</td>
             </tr>
            @endforeach
           </tbody>
         </table>
       </div>
     </div>
   </div>
</div>
@endsection
@push('js')
    <script type="text/javascript">
    $(document).ready(function(){
        var i=1;
   $('#add').click(function(){
   i++;
   $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="product_id[]" placeholder="প্রোডাক্ট আইডি" class="form-control name_list" /></td><td><input type="number" name="quantity[]" placeholder="প্রোডাক্ট সংখ্যা" class="form-control name_list" /></td><td><input type="number" name="price[]" placeholder="প্রোডাক্ট দাম" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
   });
   $(document).on('click', '.btn_remove', function(){
   var button_id = $(this).attr("id");
   $('#row'+button_id+'').remove();
   });
   });
   </script>
@endpush

