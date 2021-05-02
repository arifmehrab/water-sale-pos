@extends('layouts.admin_app')
@section('title', 'Admin | Dashboard')
@section('content_head')
<div class="header-body">
    <div class="row align-items-center py-4">
      <div class="col-lg-6 col-7">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
          <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Imagine Walls</li>
          </ol>
        </nav>
      </div>
    </div>


    <div class="row">
      <div class="col-md-4">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Today Sell Quantity</h5>
                  <span class="h2 font-weight-bold mb-0">{{ $today_sell_unit }} Roll.</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                    <i class="fas fa-hand-holding-usd"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Today Sell</h5>
                  <span class="h2 font-weight-bold mb-0 ">{{ $today_sell }} Tk.</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                    <i class="fas fa-shopping-cart"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Today Collection</h5>
                  <span class="h2 font-weight-bold mb-0">{{ $today_collection }} TK.</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                    <i class="fas fa-hand-holding-usd"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Today Shop Cost</h5>
                  <span class="h2 font-weight-bold mb-0">{{ $today_shopcost }}TK.</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                    <i class="fas fa-hand-holding-usd"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
   
      </div>
      <div class="col-md-4">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Mercantile Bank Limited</h5>
                    <span class="h2 font-weight-bold mb-0">{{ $Mercantile_total }} TK.</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                      <i class="fas fa-university"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">NRB Bank Ltd</h5>
                    <span class="h2 font-weight-bold mb-0">{{ $NRB_total }} TK.</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                      <i class="fas fa-university"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Market Due</h5>
                    <span class="h2 font-weight-bold mb-0">{{ $market_due }} TK.</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                      <i class="fas fa-university"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


      </div>
      <div class="col-md-4">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Total Product Unit</h5>
                  <span class="h2 font-weight-bold mb-0">{{ $stock }} Roll.</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                    <i class="fas fa-coins"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="card-balan" style="background-color: #cc7130;color: white;
          font-weight: bold;text-align: center;border-radius: 100%;width: 250px;
          height: 235px;margin: 0 auto;border: 6px solid;">
            <!-- Card body -->
            <div class="card-balance" style="padding: 78px 0px 0px 0px;">
              
                  <h5 style="color: white;font-weight: bold;font-size: 17px;">Closing Balance</h5>
              
                  <span style="font-size: 20px;">{{ $total_cash }} TK.</span>
                
            </div>
          </div>



      </div>
    </div>

    <!-- Users stats -->

    
    <br><br><hr>
@endsection
