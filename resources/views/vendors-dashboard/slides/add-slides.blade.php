@extends('vendors-dashboard.vendor-index')
@section('contents')
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
                        <h4 class="card-title">Add Slide</h4>
                       <hr>
                        <form class="row g-3 needs-validation" action="{{route('slide.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-3">
                         <label for="validationCustom04" class="form-label">Add Hotel</label>
                            <select class="form-select" name="hotel_id" id="validationCustom04" required>
                            <option selected disabled value="">Select Hotel</option>
                            @foreach($hotels as $hotel)
                            <option value="{{ $hotel->id }}">{{ $hotel->hotel_name }}</option>
                        
                            @endforeach
                            </select>
                            <div class="invalid-feedback">
                            Please select a valid hotel.
                            </div>  
                        </div>
                        <div class="col-md-12">
                                <label class="form-label">Add Image</label><br>
                                <input type="file" name="image[]" class="filestyle" data-buttonname="btn-secondary" multiple>
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