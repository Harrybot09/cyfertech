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
                        <h4 class="card-title">Edit Category</h4>
                       <hr>
                        <form class="row g-3 needs-validation" action="{{route('category.update',$category->id)}}" method="post" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('PUT')
                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">Enter Category</label>
                                <input type="text" class="form-control" name="name" id="validationCustom03" value="{{$category->name}}">
                                <div class="invalid-feedback">
                                    Please provide a valid category name.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Write Description</label><br>
                                <textarea id="elm1" name="description" value="">{{$category->description}}</textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Select Image</label><br>
                                <input type="file" name="image" class="filestyle" data-buttonname="btn-secondary">
                                <img src="/uploads/{{$category->image}}" width="100px" alt="" style="margin:10px 0px ;">
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