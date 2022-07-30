@extends('index')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit city </h4>
                        
                        <form class="row g-3 needs-validation" action="{{route('room.update',$room->id)}}" method="post" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">City</label>
                                <input type="text" class="form-control" name="type" id="validationCustom03" value="{{$room->type}}">
                                <div class="invalid-feedback">
                                    Please provide a valid city.
                                </div>
                            </div>
                           
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Submit form</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection