@extends('vendors-dashboard.vendor-index')
@section('contents')
<style>
    .spanstyle{
        color: red;
        font-size: 12px;
    }
</style>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                @if ($errors->any())
                    <div class="alert alert-danger">
                     <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                             @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                             @endforeach
                        </ul>
                    </div>
                @endif
                    <div class="card-body">
                        <h4 class="card-title">Add Adventure Sport</h4>
                        <hr>
                        {{$session_email}}
                        <form class="row g-3 needs-validation" action="{{route('sportsadventure.store')}}" method="post" novalidate>
                            @csrf

                            <input type="hidden" name="added_by" id="added_by" value=" {{$session_email}}">
                            <div class="col-md-12">
                                <label for="city_id" class="form-label">Adventures</label>
                                <select class="form-select" name="adventure_id" id="adventure_id" required>
                                    <option selected disabled value="">Select Adventure</option>
                                    @foreach($adventure as $adventures)
                                    <option value="{{$adventures->id}}">{{$adventures->name}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid city.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="vendor" class="form-label">Area</label>
                                <select class="form-select" name="area_id" id="area_id" required>
                                    <option selected disabled value="">Select Area </option>
                                    @foreach($area as $areas)
                                    <option value="{{$areas->id}}">{{$areas->name}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please select a Vendor.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">Sport Place Name</label>
                                <input type="text" class="form-control" name="place_name" id="validationCustom03" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Sport Name.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">Price</label>
                                <input type="text" class="form-control" name="price" id="price" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Price.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">Description</label>
                                <input type="text" class="form-control" name="description" id="validationCustom03" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Description.
                                </div>
                            </div>
                                 <div class="col-12">
                                <button class="btn btn-primary" type="submit" >Submit form</button>
                            </div>
                            <div class="col-12">
                            
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
