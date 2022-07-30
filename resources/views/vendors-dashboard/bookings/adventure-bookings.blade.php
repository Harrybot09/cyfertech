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
                                        <th><strong>Customer Name</strong></th>
                                        <th><strong>Adventure Category</strong></th>
                                        <th><strong>Adventure Place Name</strong></th>
                                        <th><strong>Adult Guests</strong></th>
                                        <th><strong>Child Guests</strong></th>
                                        <th><strong>Price</strong></th>
                                        <th><strong>Sub Total Price</strong></th>
                                        <th><strong>Gst Price</strong></th>
                                        <th><strong>Total Price</strong></th>
                                        <th><strong>From Date</strong></th>
                                        <th><strong>To Date</strong></th>
                                        <!-- <th><strong>Action</strong></th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $id=0;
                                    @endphp
                                    @foreach($adventurebookdata as $data)
                                   
                                    <tr data-id="1">
                                        <td data-field="id" style="width: 80px">{{++$id}}</td>
                                        <td data-field="name">{{$data->username}}</td>
                                        <td data-field="name">{{$data->adventurecat}}</td>
                                        <td data-field="name">{{$data->place_name}}</td>
                                        <td data-field="name">{{$data->numberofadult}}</td>
                                        <td data-field="name">{{$data->numberofchild}}</td>
                                        <td data-field="name">{{$data->price}}</td>
                                        <td data-field="name">{{$data->gstprice}}</td>
                                        <td data-field="name">{{$data->subtotalprice}}</td>
                                        <td data-field="name">{{$data->totalprice}}</td>
                                        <td data-field="name">{{$data->fromdate}}</td>
                                        <td data-field="name">{{$data->todate}}</td>
                                        
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