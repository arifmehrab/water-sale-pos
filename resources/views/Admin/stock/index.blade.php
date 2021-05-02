@extends('layouts.admin_app')
@section('title', 'Admin | Dashboard')
@section('content_head')
<div class="card">
    <div class="card-header">
        Add Stock
    </div>
    @if(Auth::user()->name == 'Imon')
    <div class="card-body">
        <form action="{{ route('admin.stock.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-control-label" for="shop_adress">Stock Date</label>
                <input type="date" style="width: 15%;" class="form-control" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label class="form-control-label" for="customer_id">Product code</label>
                <select required data-toggle="select" class="form-control"  id="product_id" name="product_id">
                <option></option>   
                @foreach($products as $row)
                <option value="{{ $row->id }}">{{ $row->product_name }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
                <label class="form-control-label" for="shop_adress">Product Quantity</label>
                <input type="number" class="form-control" id="shop_adress" name="product_quantity" required>
            </div>
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="SUBMIT">
            </div>

          </form>
    </div>
  @endif
</div>
<!-- Table -->
<div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header">
          <h3 class="mb-0">Action buttons</h3>
        </div>
        <div class="table-responsive py-4">
          <table class="table table-flush" id="datatable-buttons">
            <thead class="thead-light">
              <tr>
                <th>Date</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach($stocks as $row)
              <tr>
                <td>{{ $row->date }}</td>
                <td>{{ $row->product->product_name }}</td>
                <td>{{ $row->quantity }}</td>
                <td>
                @if(Auth::user()->name == 'Imon')
                  <a title="Edit" class="btn btn-success btn-sm" href="{{ route('admin.stock.edit',$row->id) }}">
                      <i class="fa fa-edit"></i>
                  </a>
                @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>
@endsection

