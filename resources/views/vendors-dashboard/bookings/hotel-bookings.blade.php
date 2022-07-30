@extends('vendors-dashboard.vendor-index')
@section('contents')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Manage Hotel Bookings</h4>
                        @if(session('success'))
                        <div class="alert alert-success mb-1 mt-1">
                        {{ session('success') }}
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-editable table-nowrap align-middle table-edits">
                                <thead>
                                    <tr>
                                        <th><strong>S No.</strong></th>
                                        <th><strong>Hotel Name</strong></th>
                                        <th><strong>Customer Name</strong></th>
                                        <th><strong>Adult Guests</strong></th>
                                        <th><strong>Child Guests</strong></th>
                                        <th><strong>Extra Bed</strong></th>
                                        <th><strong>Extra Bed Price</strong></th>
                                        <th><strong>From Date</strong></th>
                                        <th><strong>To Date</strong></th>
                                        <th><strong>GST Price</strong></th>
                                        <th><strong>Total Price</strong></th>
                                        <th><strong>Action</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $id=0;
                                    @endphp
                                    @foreach($bookingdata as $data)
                                   
                                    <tr data-id="1">
                                        <td data-field="id" style="width: 80px">{{++$id}}</td>
                                        <td data-field="name">{{$data->hotel_name}}</td>
                                        <td data-field="name">{{$data->username}}</td>
                                        <td data-field="name">{{$data->numberofadults}}</td>
                                        <td data-field="name">{{$data->numberofchildren}}</td>
                                        <td data-field="name">{{$data->extra_bed}}</td>
                                        <td data-field="name">{{$data->extra_bed_price}}</td>
                                        <td data-field="name">{{$data->fromdate}}</td>
                                        <td data-field="name">{{$data->todate}}</td>
                                        <td data-field="name">{{$data->gstprice}}</td>
                                        <td data-field="name">{{$data->totalprice}}</td>
                                        <td style="width: 100px">
                                        <form action="" method="Post">
                                          <a class="btn btn-outline-secondary btn-sm edit" href="{{ Route('moredetails',$data->booking_id) }}">
                                                <!-- <i class="fas fa-pencil-alt"></i> -->
                                                More Details
                                            </a>
                                        @csrf
                                        @method('DELETE')
                                        <!-- <button type="submit" class="btn btn-outline-secondary btn-sm edit"> Delete</button> -->
                                        </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                         
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->
</div>
@endsection