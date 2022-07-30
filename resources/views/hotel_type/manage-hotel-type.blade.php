@extends('index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                    <a href="{{route('hoteltype.create')}}"> <button type="button" class="btn btn-outline-blue-grey waves-effect waves-light" style=" right:45px; float:right; position:absolute" >Add Hotel Type</button></a>
                        <h4 class="card-title">Manage Hotel Type</h4>
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
                                        <th>Hotel Type</th>
                                        <th>Action</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $id=0;
                                    @endphp
                                    @foreach($fetch as $data)
                                    <tr data-id="1">
                                        <td data-field="id" style="width: 80px">{{++$id}}</td>
                                        <td data-field="name">{{$data->type}}</td>
                                        <td style="width: 100px">
                                        <form action="{{ route('hoteltype.destroy',$data->id) }}" method="Post">
                                        
                                        <a class="btn btn-outline-secondary btn-sm edit" href="{{ route('hoteltype.edit',$data->id) }}">
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
                            {{$fetch->links()}}
                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->


    </div> <!-- container-fluid -->
</div>
@endsection