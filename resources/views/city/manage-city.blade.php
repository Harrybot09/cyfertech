@extends('index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                       <a href="{{route('city.create')}}"> <button type="button" class="btn btn-outline-blue-grey waves-effect waves-light" style=" right:45px; float:right; position:absolute" >Add city</button></a>

                        <h4 class="card-title">Manage Cities</h4>
                        @if(session('success'))
                        <div class="alert alert-success mb-1 mt-1">
                        {{ session('success') }}
                    </div>
                    @endif
                        <div class="table-responsive">
                            <table class="table table-editable table-nowrap align-middle table-edits">
                                <thead>
                                    <!-- <tr>
                                        <td style="width: 100px">
                                            <a class="btn btn-sm ">
                                                <input class="btn btn-secondary btn-sm waves-effect" href="{{route('city.create')}}" type="button" value="Add City">
                                            </a>
                                        </td>
                                    </tr> -->
                                    <tr>
                                        <th>ID</th>
                                        <th>City Name</th>
                                        <th>Action</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cities as $city)
                                    <tr data-id="1">
                                        <td data-field="id" style="width: 80px">{{$city->id}}</td>
                                        <td data-field="name">{{$city->name}}</td>
                                        <td style="width: 100px">
                                        <form action="{{ route('city.destroy',$city->id) }}" method="Post">
                                        
                                        <a class="btn btn-outline-secondary btn-sm edit" href="{{ route('city.edit',$city->id) }}">
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
                            {{$cities->links()}}
                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->


    </div> <!-- container-fluid -->
</div>
@endsection