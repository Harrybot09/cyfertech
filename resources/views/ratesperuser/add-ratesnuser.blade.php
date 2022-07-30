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
                        <h4 class="card-title">Add Products</h4>
						<div id="addfieldproduct"><a href="javascript:void(0);" id="addmoreproduct" title="Add field">Add</a>
                       <hr>
							
                        <form class="row g-3 needs-validation" action="{{route('servicesubcategory.store')}}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
						
                            <div class="col-md-3">

                             <label for="validationCustom04" class="form-label">category</label>

                                <select class="form-select categ" name="category_id" id="validationCustom04" required>

                                <option selected disabled value="">Select category</option>

                                @foreach($category as $cat)

                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>

                            

                                @endforeach

                                </select>

                                <div class="invalid-feedback">

                                Please select a valid category.

                                </div>  

                            </div>
							  <div class="col-md-3 subcatshow">

                             <label for="validationCustom04" class="form-label">Sub category</label>

                                <select class="form-select subcateg" name="sub_category_id" id="validationCustom04" required>

                                <option selected disabled value="">Select Sub category</option>


                                </select>

                                <div class="invalid-feedback">

                                Please select a valid category.

                                </div>  

                            </div>
							 <div class="col-md-3 subsubcatshow">

                             <label for="validationCustom04" class="form-label">Services</label>

                                <select class="form-select subsubcateg" name="sub_category_id" id="validationCustom04" required>

                                <option selected disabled value="">Select Services</option>


                                </select>

                                <div class="invalid-feedback">

                                Please select a valid category.

                                </div>  

                            </div>
							
							
							
							 <div class="col-md-3 servicecat">

                             <label for="validationCustom04" class="form-label">Services Category</label>

                                <select class="form-select servicecatg" name="sub_category_id" id="validationCustom04" required>

                                <option selected disabled value="">Select Services Category</option>


                                </select>

                                <div class="invalid-feedback">

                                Please select a valid Services Category.

                                </div>  

                            </div>
							
							
							
							 <div class="col-md-3 servicesubcat">

                             <label for="validationCustom04" class="form-label">Services Sub Category</label>

                                <select class="form-select servicesubcatg" name="sub_category_id" id="validationCustom04" required>

                                <option selected disabled value="">Select Services Category</option>


                                </select>

                                <div class="invalid-feedback">

                                Please select a valid Services Category.

                                </div>  

                            </div>
							
                            <div class="col-md-6">
                                <label for="validationCustom03" class="form-label">Add Name</label>
                                <input type="text" class="form-control" name="name[]" id="validationCustom03" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Service name.
                                </div>
                            </div>
							 <div class="col-md-6">
                                <label for="validationCustom03" class="form-label">Add SKU ID</label>
                                <input type="text" class="form-control" name="name[]" id="validationCustom03" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Service name.
                                </div>
                            </div>
							 <div class="col-md-6">
                                <label for="validationCustom03" class="form-label">Add Price</label>
                                <input type="text" class="form-control" name="name[]" id="validationCustom03" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Service name.
                                </div>
                            </div>
							
							<div class="col-md-6">
                                <label for="validationCustom03" class="form-label">Number Of Users</label>
                                <input type="text" class="form-control" name="name[]" id="validationCustom03" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Service name.
                                </div>
                            </div>
							<div class="col-md-6">

                                <label class="form-label">Select Image</label><br>

                                <input type="file" name="image" class="filestyle" data-buttonname="btn-secondary">

                            </div>
							 <div class="col-md-12">

                                <label class="form-label">Write Description</label><br>

                                <textarea id="elm1" name="description"></textarea>

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

