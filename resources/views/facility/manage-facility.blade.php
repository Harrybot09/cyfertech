@extends('index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <a href="{{route('facility.create')}}"> <button type="button" class="btn btn-outline-blue-grey waves-effect waves-light" style=" right:45px; float:right; position:absolute" >Add Facility</button></a>
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
                                        <th>S NO.</th>
                                        <th>Facility</th>
                                        <th>Icon</th>
                                        <th>Action</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $id=0;
                                    @endphp
                                    @foreach($facility as $fac)
                                    <tr data-id="1">
                                        <td data-field="id" style="width: 80px">{{++$id}}</td>
                                        <td data-field="name">{{$fac->fac_name}}</td>
                                        <td data-field="name"><img src="uploads/{{$fac->icon}}" class="popupimage" width="100px" alt=""></td>

                                        <td style="width: 100px">
                                        <form action="{{ route('facility.destroy',$fac->id) }}" method="Post">
                                        
                                        <a class="btn btn-outline-secondary btn-sm edit" href="{{ route('facility.edit',$fac->id) }}">
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
                            {{$facility->links()}}
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

