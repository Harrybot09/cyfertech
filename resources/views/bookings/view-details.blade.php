           
@extends('index')
@section('content')

           <div class="page-content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                      

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card card-body">
                                                    <div class="p-2">
                                                        <h3 class="card-title font-size-20">Booking summary</h3>
                                                    </div>
                                                    <div class="">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <td class="text-center"><strong>Serial No.</strong></td>
                                                                    <td class="text-center"><strong>Room Type</strong></td>
                                                                    <td class="text-center"><strong>Room Count</strong></td>
                                                                    <td class="text-center"><strong>Room Price</strong></td>
                                                                    <td class="text-center"><strong>Total Days</strong>
                                                                    <!-- <td class="text-center"><strong>Payment Status</strong> -->    
                                                                    </td>
                                                            
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @php
                                                                        $s=0;
                                                                    @endphp
                                                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                                                @foreach($moredetails as $more)
                                                                <tr>
                                                                    <td class="text-center">{{++$s}}</td>
                                                                    <td class="text-center">{{$more->roomtype}}</td>
                                                                    <td class="text-center">{{$more->roomcount}}</td>
                                                                    <td class="text-center">{{$more->price}}</td>
                                                                    <td class="text-center">{{$more->totaldays}}</td>
                                                                </tr>
                                                                @endforeach
                                                                @foreach($paydetails as $paid)
                                                                <tr>
                                                                    <td class="text-center"><strong>Payment Status</strong>

                                                                    <td class="text-center">@if($paid->payment_status == 'captured'){{'Paid Successfully'}} @endif</td>
                                                                </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                        <div class="d-print-none">
                                                            <div class="float-end">
                                                            <!--     <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a> -->
                                                                <a href="{{route('booking.index')}}" class="btn btn-primary waves-effect waves-light">Back</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div> <!-- end row -->

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                @endsection