@extends('index')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> Edit Vendor Info/Address</h4>
                        <hr>
                        <form class="row g-3 needs-validation" action="{{route('vendor.update',$vendors->id)}}" method="post" enctype="multipart/form-data" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="col-md-12">
                                <label class="form-label">Select Profile Image</label><br>
                                <img src="/uploads/{{$vendors->image}}" width="150px" style="margin-bottom:10px" alt="">
                                <input type="file" name="image" class="form-control filestyle" data-buttonname="btn-secondary" id="validationCustom03">
                                <div class="invalid-feedback">
                                    Please select image.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">First Name</label>
                                <input type="text" class="form-control" name="first_name" id="validationCustom03" value="{{$vendors->first_name}}" required>
                                <div class="invalid-feedback">
                                    Please provide a valid First Name.
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="last_name" id="validationCustom03" value="{{$vendors->last_name}}" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Last Name.
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">Hotel Name</label>
                                <input type="text" class="form-control" name="hotel_name" id="validationCustom03" value="{{$vendors->hotel_name}}" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Hotel Name.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">Hotel Url</label>
                                <input type="text" class="form-control" name="hotel_url" id="validationCustom03" value="{{$vendors->hotel_url}}" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Hotel Url.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">Phone</label>
                                <input type="text" class="form-control" name="phone" id="validationCustom03" value="{{$vendors->phone}}" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Phone.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">Telephone</label>
                                <input type="text" class="form-control" name="telephone" id="telephone" value="{{$vendors->telephone}}" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Phone.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" id="validationCustom03" value="{{$vendors->email}}" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Email.
                                </div>
                            </div>
                          
                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">Bulding No./Sco No./Landmark</label>
                                <input type="text" class="form-control" name="building_number" id="validationCustom03" value="{{$vendors->building_number}}" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Bulding/Sco/Landmark.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">Street</label>
                                <input type="text" class="form-control" name="street" id="validationCustom03" value="{{$vendors->street}}" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Street Name.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">City</label>
                                <input type="text" class="form-control" name="city" id="validationCustom03" value="{{$vendors->city}}" required>
                                <div class="invalid-feedback">
                                    Please provide a valid City Name.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">Zip Code</label>
                                <input type="text" class="form-control" name="zip_code" id="validationCustom03" value="{{$vendors->zip_code}}" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Zip Code.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">Country</label>
                                <input type="text" class="form-control" name="country" id="validationCustom03" value="{{$vendors->country}}" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Country.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">State</label>
                                <input type="text" class="form-control" name="state" id="validationCustom03" value="{{$vendors->state}}" required>
                                <div class="invalid-feedback">
                                    Please provide a valid State.
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