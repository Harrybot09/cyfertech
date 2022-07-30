@extends('index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Manage Users</h4>
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>                                        <th>View Subscription</th>
                                        <th>Action</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $id=0;																				@endphp
                                   
                                    @foreach($register as $user)
                                    <tr data-id="1">
                                        <td data-field="id" style="width: 80px">{{++$id}}</td>
                                        <td data-field="name">{{$user->name}}</td>
                                        <td data-field="email">{{$user->email}}</td>
                                        <td data-field="phone">{{$user->phone}}</td>                                        <td data-field="subscription"><a class="btn btn-outline-secondary btn-sm edit" href="{{route('subscriptions',$user->id)}}">                                                <!-- <i class="fas fa-pencil-alt"></i> -->                                               Subscriptions                                            </a></td>
                                        <td data-field="action">
                                        <form action="{{route('Destroy',$user->id)}}" method="Post">
                                        @csrf										
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-secondary btn-sm edit"> <i class="fas fa-trash-alt"></i></button>
                                        </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                  
                                </tbody>
                            </table>
                            {{$register->links()}}
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
            
        </div> <!-- end row -->


    </div> <!-- container-fluid -->
</div>
@endsection