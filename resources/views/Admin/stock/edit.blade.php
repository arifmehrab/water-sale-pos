@extends('layouts.admin_app')
@section('title', 'Admin | Dashboard')
@section('content_head')


<div class="card">
    <div class="card-header">
        SHOP COST
    </div>
    <div class="card-body">
        <form action="{{  route('admin.stock.update', $data->id) }}" method="POST">
            @csrf
            @method('put')

            <div class="form-group">
                <label class="form-control-label" for="quantity">Product_id({{ $data->product_id }})</label>
            </div>

            <div class="form-group">
                <label class="form-control-label" for="quantity">Amount</label>
                <input type="text" class="form-control" id="quantity" name="quantity" value="{{ $data->quantity }}">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="SUBMIT">
            </div>

          </form>
    </div>
</div>

@endsection