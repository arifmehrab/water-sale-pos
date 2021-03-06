@extends('layouts.admin_app')
@section('title', 'Admin | Dashboard')
@section('content_head')

<div class="card">
    <div class="card-header">
        <h2>Shop Lists</h2>
    </div>

<!-- Table -->
<div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header">
          <h3 class="mb-0">All Shop Lists</h3>
        </div>
        <div class="table-responsive py-4">
          <table class="table table-flush" id="datatable-buttons">
            <thead class="thead-light">
              <tr>
                <th>Shop No</th>
                <th>Shop Name</th>
                <th>Shop Number</th>
                <th>Total Amount</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
             @foreach($shops as $row)
             @php
               $total_amount      = App\Models\invoicedetail::where('shop_id', $row->id)->where('status', 1)->sum('selling_price');
               $total_coll_amount = App\Models\collection::where('shop_id', $row->id)->sum('amount');
               $rest_amount       = $total_amount - $total_coll_amount;
             @endphp
              <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->shop_name }}</td>
                <td>{{ $row->mobile_number }}</td>
                <td>{{ $rest_amount }} Tk.</td>
                <td>
                    <a title="View" class="btn btn-primary btn-sm" href="{{ route('admin.shop.view', $row->id) }}">
                        <i class="fas fa-eye"></i>
                    </a>
                </td>
              </tr>
             @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
 </div>
</div>
@endsection