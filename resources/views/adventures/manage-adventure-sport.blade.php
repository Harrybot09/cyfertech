@extends('index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <a href="{{route('adventure.create')}}"> <button type="button" class="btn btn-outline-blue-grey waves-effect waves-light" style=" right:45px; float:right; position:absolute" >Add Adventure</button></a>
                        <h4 class="card-title">Manage Adventure</h4>
                        @if(session('success'))
                        <div class="alert alert-success mb-1 mt-1">
                        {{ session('success') }}
                        </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-editable table-nowrap align-middle table-edits">
                                <thead>
                                   
                                    <tr>
                                        <th>S NO.</th>
                                        <th>Adventure Category</th>
                                        <th>Location</th>
                                        <th>Sport Place Name</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $id=0;
                                    @endphp

                                    @foreach($adventuresports as $data)
                                    <tr data-id="1">
                                        <td data-field="id" style="width: 80px">{{++$id}}</td>
                                        <td data-field="name">{{$data->adventure_name}}</td>
                                        <td data-field="name">{{$data->area_name}}</td>
                                        <td data-field="name">{{$data->place_name}}</td>
                                        <td data-field="name">{{$data->price}}</td>
                                        <td> <img src="{{$data->image}}" id="images" width="100px" height="100px" alt="" class="popupimage"></td>
                                        <td data-field="name">{{$data->description}}</td>
                            
                                        <td style="width: 100px">
                                        <form action="{{route('adventuresport.destroy',$data->id)}}" method="Post">
                                        
                                        <a class="btn btn-outline-secondary btn-sm edit" href="{{route('adventuresport.edit',$data->id)}}">
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
                            {{$adventuresports->links()}}
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
