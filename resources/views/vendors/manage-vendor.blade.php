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
                    <a href="{{route('vendor.create')}}"> <button type="button" class="btn btn-outline-blue-grey waves-effect waves-light" style=" right:45px; float:right; position:absolute" >Add Vendor</button></a>
                        <h4 class="card-title">Manage Vendors</h4>
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
                                        <th>Pofile Picture</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Hotel Name</th>
                                        <th>Hotel Url</th>
                                        <th>Mobile</th>
                                        <th>Telephone</th>
                                        <th>Email</th>
                                        <th>Building/Sco No./Landmark</th>
                                        <th>Street</th>
                                        <th>City</th>
                                        <th>Zip Code</th>
                                        <th>Country</th>
                                        <th>State</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                        
                                   @php $id=0; @endphp
                                    @foreach($data as $adata)
                                    <tr data-id="1">
                                        <td style="width: 80px">{{++$id}}</td>
                                        <td><img src="uploads/{{$adata->image}}" class="popupimage" alt="profile pic" width="100px"></td>
                                        <td>{{$adata->first_name}}</td>
                                        <td>{{$adata->last_name}}</td>
                                        <td>{{$adata->hotel_name}}</td>
                                        <td>{{$adata->hotel_url}}</td>
                                        <td>{{$adata->phone}}</td>
                                        <td>{{$adata->telephone}}</td>
                                        <td>{{$adata->email}}</td>
                                        <td>{{$adata->building_number}}</td>
                                        <td>{{$adata->street}}</td>
                                        <td>{{$adata->city}}</td>
                                        <td>{{$adata->zip_code}}</td>
                                        <td>{{$adata->country}}</td>
                                        <td>{{$adata->state}}</td>
                                        <td style="width: 100px">
                                        <form action="{{route('vendor.destroy',$adata->id)}}" method="Post">
                                        <a class="btn btn-outline-secondary btn-sm edit" href="{{route('vendor.edit',$adata->id)}}">
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
                            {{$data->links()}}
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
      <img class="w-80" id="img-popup" src="" alt="">
        
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
