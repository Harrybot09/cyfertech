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
                        <h4 class="card-title">Add Slide</h4>
                       <hr>
                        <form class="row g-3 needs-validation" action="{{route('savefeatures')}}" method="post" enctype="multipart/form-data">
                        @csrf  
						<div class="col-md-3"> 
						<label for="validationCustom04" class="form-label">category</label>   
						<select class="form-select categ" name="product_id" id="validationCustom04" required>    
						<option selected disabled value="">Select category</option>                  
						@foreach($products as $cat)                        
						<option value="{{ $cat->id }}">{{ $cat->product }}</option>
						@endforeach          
						</select>          
						<div class="invalid-feedback">  
						Please select a valid category.  
						</div>  
						</div>	
					
					   <a href="javascript:void(0);" id="addmorefeat" title="Add field">Add</a>
					   <div class="row" id="addfieldfeat">
                            <div class="col-md-6">
                                <label for="validationCustom03" class="form-label">Add Features	</label>
                                <input type="text" class="form-control" name="feature[]" id="validationCustom03" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Service name.
                                </div>
                            </div>
							
							<div class="col-md-6">
                                <label for="validationCustom03" class="form-label">Add Service</label>
                                <textarea id="elm1" name="description[]"></textarea>
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