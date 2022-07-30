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
                        <h4 class="card-title">Add Services</h4>
                       <hr>
							
                        <form class="row g-3 needs-validation" action="{{route('services.store')}}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
						
                            <div class="col-md-3">

                             <label for="validationCustom04" class="form-label">category</label>

                               <select class="form-select sercateg" name="category_id" id="validationCustom04" >

                                <option selected disabled value="">Select category</option>

                                @foreach($category as $cat)

                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>

                            

                                @endforeach

                                </select>
							

                            </div>
							
							  <div class="col-md-3 sersubcatshow">

                             <label for="validationCustom04" class="form-label">Sub category</label>

                                <select class="form-select sersubcateg" name="sub_category_id" id="validationCustom04" required>

                                <option selected disabled value="">Select Sub category</option>


                                </select>

                                <div class="invalid-feedback">

                                Please select a valid category.

                                </div>  

                            </div>
							
							<div id="addfieldserv"><a href="javascript:void(0);" id="addmoreserv" title="Add field">Add</a>
                            <div class="col-md-9">
                                <label for="validationCustom03" class="form-label">Add Service</label>
                                <input type="text" class="form-control" name="name[]" id="validationCustom03" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Service name.
                                </div>
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

