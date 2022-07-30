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
                        <h4 class="card-title">Edit Services</h4>
                       <hr>
					
                        <form class="row g-3 needs-validation" action="{{route('services.update',$services->id)}}" method="post" enctype="multipart/form-data" novalidate>
                        @csrf
                          @method('PUT')

                        <div class="col-md-3">

                         <label for="validationCustom04" class="form-label">Category</label>

                            <select class="form-select categ" name="category_id" id="validationCustom04" required>

                            @foreach($cate as $cat)

                            <option value="{{ $cat->id }}"  @if($services->category_id == $cat->id) { {{'selected'}} } else{} @endif >{{ $cat->name }}</option>

                        

                            @endforeach

                        

            

                            </select>

                            <div class="invalid-feedback">

                            Please select a valid Category.

                            </div>  

                        </div>
						<div class="col-md-3">

                         <label for="validationCustom04" class="form-label">Category</label>

                            <select class="form-select subcateg" name="sub_category_id" id="validationCustom04" required>

                            <option value="{{ $subcat->id }}"  @if($services->sub_category_id == $subcat->id) { {{'selected'}} } else{} @endif >{{ $subcat->name }}</option>

                        


                            </select>

                            <div class="invalid-feedback">

                            Please select a valid Category.

                            </div>  

                        </div>
                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">Enter Services</label>
                                <input type="text" class="form-control " name="name" id="validationCustom03" value="{{$services->name}}">
                                <div class="invalid-feedback">
                                    Please provide a valid category name.
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