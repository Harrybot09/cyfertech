@extends('index')
@section('content')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Subcriptions</h4>
                        @if(session('success'))
                        <div class="alert alert-success mb-4 mt-4">
                        {{ session('success') }}
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-editable table-nowrap align-middle table-edits">
                                <thead>
                                    <tr>
                                        <th><strong>S No.</strong></th>
                                        <!--<th><strong>Product</strong></th>
                                        <th><strong>Category</strong></th>-->
                                        <th><strong>Name</strong></th>
                                        <th><strong>Sku Code</strong></th>
                                        <th><strong>Price</strong></th>
                                        <th><strong>No Of Users</strong></th>
                                        <th><strong>Image</strong></th>
                                        <!--<th><strong>Description</strong></th>
                                        <th><strong>Action</strong></th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $id=0;
									
                                    @endphp
                             @foreach($subscription as $subscriptions)
                                   
                                    <tr data-id="1">
                                        <td data-field="id" style="width: 80px">{{++$id}}</td>
                                       <!-- <td data-field="name">{{$subscriptions->product}}</td>
                                        <td data-field="name">{{$subscriptions->cat_name}}</td>-->
                                        <td data-field="name">{{$subscriptions->name}}</td>
                                        <td data-field="name">{{$subscriptions->sku_code}}</td>
                                        <td data-field="name">{{$subscriptions->price}}</td>
                                        <td data-field="name">{{$subscriptions->no_of_users}}</td>
                                        <td data-field="name"><img src="{{$subscriptions->image}}" width="100px" height="150" /></td>
                                        <!--<td data-field="name">{!!$subscriptions->description!!}</td>
                                        <td style="width: 100px">
                                        <form action="" method="Post">
                 
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-secondary btn-sm edit"> Delete</button>
                                        </form>
                                        </td>-->
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