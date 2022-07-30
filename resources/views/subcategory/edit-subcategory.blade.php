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
                        <h4 class="card-title">Edit Sub Category</h4>
                       <hr>
					   
                        <form class="row g-3 needs-validation" action="{{route('subcategory.update',$subcategory->id)}}" method="post" enctype="multipart/form-data" novalidate>
                        @csrf
                          @method('PUT')

                        <div class="col-md-3">

                         <label for="validationCustom04" class="form-label">Category</label>

                            <select class="form-select" name="category_id" id="validationCustom04" required>

                            @foreach($cate as $cat)

                            <option value="{{ $cat->id }}"  @if($subcategory->category_id == $cat->id) { {{'selected'}} } else{} @endif >{{ $cat->name }}</option>

                        

                            @endforeach

                        

            

                            </select>

                            <div class="invalid-feedback">

                            Please select a valid Category.

                            </div>  

                        </div>
                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">Enter Sub Category</label>
                                <input type="text" class="form-control" name="name" id="validationCustom03" value="{{$subcategory->name}}">
                                <div class="invalid-feedback">
                                    Please provide a valid category name.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Write Description</label><br>
                                <textarea id="elm1" name="description" value="">{{$subcategory->description}}</textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Select Image</label><br>
                                <input type="file" name="image" class="filestyle" data-buttonname="btn-secondary">
                                <img src="/uploads/{{$subcategory->image}}" width="100px" alt="" style="margin:10px 0px ;">
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