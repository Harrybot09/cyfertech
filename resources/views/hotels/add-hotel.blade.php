@extends('index')
@section('content')
<style>
    .spanstyle{
        color: red;
        font-size: 12px;
}
</style>
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
                        <h4 class="card-title">Add Hotel Here</h4>
                       
                        <hr>
                        <form class="row g-3 needs-validation" action="{{route('hotel.store')}}" method="post" novalidate>
                            @csrf
                            <div class="col-md-12">
                                <label for="city_id" class="form-label">Categories</label>
                                <select class="form-select" name="category_id" id="category_id" required>
                                    <option selected disabled value="">Select Category</option>
                                    @foreach($category as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid city.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="vendor" class="form-label">Vendors</label>
                                <select class="form-select" name="vendor_id" id="vendor_id" required>
                                    <option selected disabled value="">Select Vendor Name</option>
                                    @foreach($vendors as $vendor)
                                    <option value="{{$vendor->id}}">{{$vendor->first_name}}{{' '}}{{$vendor->last_name}} / {{$vendor->hotel_name}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please select a Vendor.
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
                                <label for="validationCustom03" class="form-label">Description</label>
                                <input type="text" class="form-control" name="description" id="validationCustom03" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Description.
                                </div>
                            </div>
                           
                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">Location</label>
                                <input type="text" class="form-control" name="location" id="validationCustom03" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Location.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="city_id" class="form-label">City</label>
                                <select class="form-select" name="city_id" id="city_id2" required>
                                    <option selected disabled value="">Select city</option>
                                    @foreach($citydata as $cities)
                                    <option value="{{$cities->id}}">{{$cities->name}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid city.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="area_id" class="form-label">Area</label>
                                <select class="form-select" name="area_id" id="area_id2" required>
                                    <option selected disabled value="">Select Area</option>

                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid Area.
                                </div>
                            </div>
                           
                            <h6>Facilities</h6>
                            @foreach($facility as $fac)
                            <div class="col-4">
                                <div class="form-check">
                                        <label class="form-check-label" for="invalidCheck">
                                       {{$fac->fac_name}}
                                        </label>
                                        <input class="form-check-input check " type="checkbox" name="facilities[]" value="{{$fac->id}}" id="" >
                                    </div>
                                   
                                   <span id="showmsg" class="spanstyle"></span>
                             
                            </div>
                            @endforeach
                            <h6> Room Type </h6>
                            @foreach($roomdata11 as $rdata)
                                <div class="col-md-4">
    
                                    <div class="form-check" >
                                   <label class="form-check-label" for="">
                                   {{$rdata->type}}   
                                    </label>
                                        <input class="form-check-input chk{{$rdata->id}} check2" onclick="getdata('{{$rdata->id}}','{{$rdata->type}}')"  type="checkbox" name="roomtype_id[]" id="room" value="{{$rdata->id}}" >
                                    </div>  
                              
                                   <span id="showmsg2" class="spanstyle"></span>
                           
                                </div>
                                @endforeach
                            
                            <div class="col-md-12 " id="roomprice">

                            </div>
                    
                            <div class="col-md-6">
                                <label for="extrabed" class="form-label">Extra Bed</label>
                                <select class="form-select" name="extra_bed" id="extra_bed" required>
                                    <option selected disabled value="">Extra bed ...?</option>
                                    <option value="true">Yes</option>
                                    <option value="false">No</option>
                                   
                                </select>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="" class="form-label">Enter Price If Extra Bed is Yes</label>
                                <input type="text" class="form-control" name="extra_bed_price" id="extrabedprice" placeholder="Enter extra bed price">
                            </div>
                              <h6>Add Hotel Rating</h6>
                              <div class="col-md-2">
                                 <p>
                                    <input type="radio" id="test1" name="rating" value="1">
                                    <label for="test1">1 Star</label>
                                  </p>
                              </div>   
                               <div class="col-md-2"> 
                                  <p>
                                    <input type="radio" id="test2" name="rating" value="2">
                                    <label for="test2">2 Star</label>
                                  </p>
                                </div> 
                                <div class="col-md-2">   
                                  <p>
                                    <input type="radio" id="test3" name="rating" value="3">
                                    <label for="test3">3 Star</label>
                                  </p>
                                </div> 
                                <div class="col-md-2">  
                                  <p>
                                    <input type="radio" id="test4" name="rating" value="4">
                                    <label for="test4">4 Star</label>
                                  </p>
                                </div> 
                                <div class="col-md-3"
                                  <p>
                                    <input type="radio" id="test5" name="rating" value="5">
                                    <label for="test5">5 Star</label>
                                  </p>
                                </div> 
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit" onclick="validatecheckbox();">Submit form</button>
                            </div>
                            <div class="col-12">
                            
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#city_id2').on('change', function() {
            var stateID = $(this).val();
                $.ajax({
                    url: '/myform/ajax/'+stateID,
                    type: "GET",
                    dataType: "json",
                    
                    success:function(data) {
                        $('#area_id2').empty();
                        $('#area_id2').append('<option value="">Select Area</option>');
                        for(var i=0; i<data.length ; i++) {
                              $('#area_id2').append('<option value="'+ data[i].id +'">' + data[i].name+'</option>');
                        }
                    }
                });
        });
    });

    function getdata(id,type){
     var checkBox=$('.chk'+id);
        if(checkBox.prop("checked") == true){
              //alert('i am checked');
             $('#roomprice').append('<div id="roominput'+id+'" ><input type="text" class="form-control " placeholder="Add '+type+' Price"  name="price[]" id="price" ><a href="javascript:void(0);" onclick="RemoveElement('+id+');" class="remove_field">Remove</button></div>');
        }
        else{
          // alert('i am unchecked');-             
             RemoveElement(id);
         }
        }
    
    function RemoveElement(id){
            $("#roominput"+id).remove();
     }  


     function validatecheckbox(){
         var checked=$('.check').prop('checked');
         var checked2=$('.check2').prop('checked');
            if(checked == false){
                $('#showmsg').html('Please select facilities');
              
            }
            if(checked2==false){
                $('#showmsg2').html('Please select room type');
                
            }
     }
</script>





