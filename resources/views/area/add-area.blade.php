@extends('index')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Area</h4>
                       
                        <form class="row g-3 needs-validation" action="{{route('area.store')}}" method="post" novalidate>
                        @csrf
                          {{$city}}
                            <div class="col-md-3">
                             <label for="validationCustom04" class="form-label">City</label>
                                <select class="form-select" name="city_id" id="validationCustom04" required>
                                <option selected disabled value="">Select city</option>
                                @foreach($city as $cities)
                                <option value="{{ $cities->id }}">{{ $cities->name }}</option>
                            
                                @endforeach
                                </select>
                                <div class="invalid-feedback">
                                Please select a valid city.
                                </div>  
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">Area</label>
                                <input type="text" class="form-control" name="name" id="validationCustom03" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Arae.
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