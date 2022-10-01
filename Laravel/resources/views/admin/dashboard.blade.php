@extends('admin.layout.master')
@section('title') Dashboard @endsection
@section('content')
{{-- chỗ này để thay vào chỗ yeild chỗ layout --}}
<div class="row">
    <div class="col-md-12 grid-margin">
      <div class="d-flex justify-content-between flex-wrap">
        <div class="d-flex align-items-end flex-wrap">
          <div class="me-md-3 me-xl-5">


            <p class="mb-md-0">Your analytics dashboard template.</p>
          </div>
          <div class="d-flex">
            <i class="mdi mdi-home text-muted hover-cursor"></i>
            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
            <p class="text-primary mb-0 hover-cursor">Analytics</p>
          </div>
        </div>
        <div class="d-flex justify-content-between align-items-end flex-wrap">
          <button type="button" class="btn btn-light bg-white btn-icon me-3 d-none d-md-block ">
            <i class="mdi mdi-download text-muted"></i>
          </button>
          <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
            <i class="mdi mdi-clock-outline text-muted"></i>
          </button>
          <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
            <i class="mdi mdi-plus text-muted"></i>
          </button>
          <button class="btn btn-primary mt-2 mt-xl-0">Generate report</button>
        </div>
      </div>
    </div>

  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">

        <ul class="nav nav-tabs px-4" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="overview-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Tổng quan</a>
          </li>
        </ul>
        <div class="tab-content py-0 px-0">
          <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
            <div class="d-flex flex-wrap justify-content-xl-between">
                <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                    <i class="mdi mdi-eye me-3 icon-lg text-success"></i>
                    <div class="d-flex flex-column justify-content-around">
                      <small class="mb-1 text-muted">Số lượng sản phẩm</small>
                      <h5 class="me-2 mb-0">{{$product}}</h5>
                    </div>
                  </div>
              <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                <i class="mdi mdi-currency-usd me-3 icon-lg text-danger"></i>
                <div class="d-flex flex-column justify-content-around">
                  <small class="mb-1 text-muted">Doanh thu</small>
                  <h5 class="me-2 mb-0">{{number_format($price)}} VNĐ</h5>
                </div>
              </div>
              <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                <i class="mdi mdi-eye me-3 icon-lg text-success"></i>
                <div class="d-flex flex-column justify-content-around">
                  <small class="mb-1 text-muted">Tổng view sản phẩm</small>
                  <h5 class="me-2 mb-0">{{$view}}</h5>
                </div>
              </div>
              <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                <i class="mdi mdi-download me-3 icon-lg text-warning"></i>
                <div class="d-flex flex-column justify-content-around">
                  <small class="mb-1 text-muted">Liên hệ và đăng kí</small>
                  <h5 class="me-2 mb-0">{{$contact}}</h5>
                </div>
              </div>
              <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                <i class="mdi mdi-flag me-3 icon-lg text-danger"></i>
                <div class="d-flex flex-column justify-content-around">
                  <small class="mb-1 text-muted">Số lượng user</small>
                  <h5 class="me-2 mb-0">{{$user}}</h5>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-content py-0 px-0">
            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
              <div class="d-flex flex-wrap justify-content-xl-between">

                  <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                    <i class="mdi mdi-currency-usd me-3 icon-lg text-danger"></i>
                    <div class="d-flex flex-column justify-content-around">
                      <small class="mb-1 text-muted">Số lượng đơn hàng chưa hoàn thành (Không bao gồm đơn hàng g đã hoàn thành và đã hủy)</small>
                      <h5 class="me-2 mb-0">{{$trans}}</h5>
                    </div>
                  </div>

              </div>
            </div>
        </div>
      </div>


  </div>

</div>


@endsection
