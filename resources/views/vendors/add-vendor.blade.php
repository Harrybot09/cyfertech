@extends('index')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> New Vendor Info/Address</h4>
                        <hr>
                        <form class="row g-3 needs-validation" action="{{route('vendor.store')}}" method="post" enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="col-md-12">
                                <label class="form-label">Select Profile Image</label><br>
                                <input type="file" name="image" class="form-control filestyle" data-buttonname="btn-secondary" id="validationCustom03">
                                <div class="invalid-feedback">
                                    Please select image.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">First Name</label>
                                <input type="text" class="form-control" name="first_name" id="validationCustom03" required>
                                <div class="invalid-feedback">
                                    Please provide a valid First Name.
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="last_name" id="validationCustom03" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Last Name.
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">Hotel Name</label>
                                <input type="text" class="form-control" name="hotel_name" id="validationCustom03" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Hotel Name.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">Hotel Url</label>
                                <input type="text" class="form-control" name="hotel_url" id="validationCustom03" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Hotel Url.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">Phone</label>
                                <input type="text" class="form-control" name="phone" id="validationCustom03" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Mobile Number.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">Telephone</label>
                                <input type="text" class="form-control" name="telephone" id="telephone" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Phone Number.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" id="validationCustom03" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Email.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Email.
                                </div>
                            </div>
                          
                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">Bulding No. /Sco No.</label>
                                <input type="text" class="form-control" name="building_number" id="validationCustom03" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Bulding/Sco/Landmark.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">Street</label>
                                <input type="text" class="form-control" name="street" id="validationCustom03" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Street Name.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">City</label>
                                <input type="text" class="form-control" name="city" id="validationCustom03" required>
                                <div class="invalid-feedback">
                                    Please provide a valid City Name.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">Zip Code</label>
                                <input type="text" class="form-control" name="zip_code" id="validationCustom03" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Zip Code.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">Country</label>
                                <input type="text" class="countries  form-control" name="country" id="countryId"  required>
                                <div class="invalid-feedback">
                                    Please provide a valid Country.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">State</label>
                                <input type="text" class="states form-control" name="state" id="stateId" required>
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