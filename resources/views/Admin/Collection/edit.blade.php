@extends('layouts.admin_app')
@section('title', 'Admin | Dashboard')
@section('content_head')
<div class="card">
    
    <div class="card-body">
        <form action="{{ route('admin.collection.update', $collection_edit->id) }}" method="POST">
            @csrf
            @method('put')


<div class="card mb-4">
    <!-- Card header -->
    <div class="card-header">
      <h3 class="mb-0">Edit Collection</h3>
    </div>
    <!-- Card body -->
    <div class="card-body">
      <!-- Form groups used in grid -->
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
          <form action="{{ route('admin.collection.update', $collection_edit->id) }}" method="POST">
            @csrf
            @method('put')

            <div class="form-group">
                <label class="form-control-label" for="date">Date</label>
                <input type="date" style="width: 15%;" class="form-control" id="date" name="date" value="{{ $collection_edit->date }}">
            </div>

            <div class="form-group">
              <label class="form-control-label" for="customer_id">ডিলার এর নাম সিলেক্ট করুন</label>
              <select required data-toggle="select" class="form-control"  id="customer_id" name="shop_id">
                <option></option>
                
                @foreach($shop_data as $row)
                <option {{ ($row->id == $collection_edit->shop_id) ? 'selected' : '' }} value="{{ $row->id }}">{{ $row->shop_name }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
                <label class="form-control-label" for="amount">Amount</label>
                <input type="number" class="form-control" id="amount" name="amount" value="{{ $collection_edit->amount }}">
            </div>

            <div class="form-group">
              <label class="form-control-label" for="amount">Discount</label>
              <input type="number" class="form-control" id="discount" name="discount" value="{{ $collection_edit->discount }}">
            </div>

            <div class="form-group">

                <input type="submit" class="btn btn-primary" value="SUBMIT">
            </div>

          </form>
    </div>
</div>


           

@endsection