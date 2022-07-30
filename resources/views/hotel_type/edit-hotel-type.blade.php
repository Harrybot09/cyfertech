@extends('index')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Hotel Type :</h4>
                        <hr>
                        <form class="row g-3 needs-validation" action="{{route('hoteltype.update',$getdata->id)}}" method="post" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">Hotel Type Edit</label>
                                <input type="text" class="form-control" name="type" id="validationCustom03" value="{{$getdata->type}}">
                                <div class="invalid-feedback">
                                    Please provide a valid Hotel Type.
                                </div>
                            </div>
                           
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection