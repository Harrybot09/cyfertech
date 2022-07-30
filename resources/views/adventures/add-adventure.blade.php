@extends('index')
@section('content')
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
                        <h4 class="card-title">Add Adventure</h4>
                       <hr>
                        <form class="row g-3 needs-validation" action="{{route('adventure.store')}}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                         <h6>Select Locations</h6>
                            @foreach($areas as $area)
                            <div class="col-3">
                                <div class="form-check">
                                        <label class="form-check-label" for="invalidCheck">
                                       {{$area->name}}
                                        </label>
                                        <input class="form-check-input check " type="checkbox" name="area_id[]" value="{{$area->id}}" id="" >
                                    </div>
                                   
                                   <span id="showmsg" class="spanstyle"></span>
                             
                            </div>
                            @endforeach
                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">Enter Adventure Name</label>
                                <input type="text" class="form-control" name="name" id="validationCustom03" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Adventure name.
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Select Adventure Image</label><br>
                                <input type="file" name="image" class="filestyle" data-buttonname="btn-secondary">
                            </div>
                       
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection