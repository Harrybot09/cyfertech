@extends('index')
@section('content')
@php 
use \App\Models\roomtype ;
use \App\Models\facilities ;
@endphp
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <a href="{{route('hotel.create')}}"> <button type="button" class="btn btn-outline-blue-grey waves-effect waves-light" style=" right:45px; float:right; position:absolute" >Add Hotel</button></a>
                        <h4 class="card-title">Manage Area And Cities</h4>
                        @if(session('success'))
                        <div class="alert alert-success mb-1 mt-1">
                        {{ session('success') }}
                        </div>
                        @endif

                        
                        <div class="table-responsive">
                            <table class="table table-editable table-nowrap align-middle table-edits">
                                <thead>
                                    <tr>
                                        <th>S No.</th>
                                        <th>Category</th>
                                        <th>Hotel Name</th>
                                        <th>Vendor Name</th>
                                        <th>Slides</th>
                                        <th>Facilities</th>
                                        <th>Description</th>
                                        <th>Rating</th>
                                        <th>Price</th>
                                        <th>Extra Bed</th>
                                        <th>Extra Bed Price</th>
                                        <th>Location</th>
                                        <th>City</th>
                                        <th>Area</th>
                                        <th>Roomtype</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $id=0;

                                  
                                    @endphp
                                    @foreach($hotelsdata as $adata)
                                    @php   $imgs = json_decode($adata->slideimage); @endphp
                                    <tr data-id="1">
                                        <td style="width: 80px">{{++$id}}</td>
                                        <td>{{$adata->catname}}</td>
                                        <td>{{$adata->hotel_name}}</td>
                                        <td>{{$adata->fname}}{{' '}} {{$adata->lname}}</td>
                                        <td>
                                        <img src="{{$imgs}}" class="popupimage" width="100px">
                                        <td>
                                        @php 
                                        $fac=explode(',',$adata->facilities);
                                        $fac1 = facilities::whereIn('id',$fac)->get() ;              
                                        @endphp    
                                        @foreach($fac1 as $fac2)
                                        {{$fac2->fac_name .','}}
                                        @endforeach
                                        </td>
                                        <td>{{$adata->description}}</td>
                                        <td>{{$adata->rating}}</td>
                                        <td>{{$adata->price}}</td>
                                        <td>{{$adata->extra_bed}}</td>
                                        <td>{{$adata->extra_bed_price}}</td>
                                        <td>{{$adata->location}}</td>
                                        <td>{{$adata->cityname}}</td>
                                        <td>{{$adata->areaname}}</td>
                                        <td>
                                        @php 
                                        $rooms=explode(',',$adata->roomtype_id);
                                        $roomtypes = roomtype::whereIn('id',$rooms)->get() ;              
                                        @endphp
                                        @foreach($roomtypes as $roomtype)
                                            {{$roomtype->type.','}}
                                        @endforeach
                                        <td style="width: 100px">
                                        <form action="{{route('hotel.destroy',$adata->hotelid)}}" method="Post">
                                        <a class="btn btn-outline-secondary btn-sm edit" href="{{route('hotel.edit',$adata->hotelid)}}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-secondary btn-sm edit"> <i class="fas fa-trash-alt"></i></button>
                                        </form>
                                        </td>
                                    </tr>
                                 @endforeach
                                </tbody>
                            </table>
                            {{$hotelsdata->links()}}
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->
</div>
 <!-- The Modal -->
 <div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      <img class="w-100" id="img-popup" src="" alt="">
        
      </div>
    </div>
  </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    $( document ).ready(function() {
    $('.popupimage').click(function(){
        var src=$(this).attr('src');
        $('.modal').modal('show');
        $('#img-popup').attr('src',src);

       
    });
    });
</script>