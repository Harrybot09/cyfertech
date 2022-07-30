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
                    <div class="card-body">
                        <h4 class="card-title">Add Hotel Here</h4>
                        <hr>

             
                        <form class="row g-3 needs-validation" action="{{route('hotel.update',$data->id)}}" method="post" >
                        @csrf
                            @method('PUT')
                            <div class="col-md-12">
                                <label for="city_id" class="form-label">Category</label>
                                <select class="form-select" name="category_id" id="category_id" >
                                    <option selected disabled value="">Select Hotel Type</option>
                                    @foreach($category as $cat)
                                    <option value="{{$cat->id}}" @if($data->category_id == $cat->id){ {{'selected'}} }else{} @endif>{{$cat->name}}</option>
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
                                    <option value="{{$vendor->id}}" @if($data->vendor_id == $vendor->id){ {{'selected'}} }else{} @endif>{{$vendor->first_name}}{{' '}}{{$vendor->last_name}} / {{$vendor->hotel_name}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please select a Vendor.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">Hotel Name</label>
                                <input type="text" class="form-control" name="hotel_name" id="" value="{{$data->hotel_name}}" >
                                <div class="invalid-feedback">
                                    Please provide a valid Hotel Name.
                                </div>
                            </div>
                           
                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">Description</label>
                                <input type="text" class="form-control" name="description" id="" value="{{$data->description}}" >
                                <div class="invalid-feedback">
                                    Please provide a valid Description.
                                </div>
                            </div>
                           
                            <div class="col-md-12">
                                <label for="" class="form-label">Location</label>
                                <input type="text" class="form-control" name="location" id="" value="{{$data->location}}" >
                                <div class="invalid-feedback">
                                    Please provide a valid Location.
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="city_id" class="form-label">City</label>
                                <select class="form-select" name="city_id" id="city_id2" >
                                    <option selected disabled value="">Select city</option>
                                    @foreach($city as $cities)
                                    <option value="{{ $cities->id}}" @if($data->city_id == $cities->id){ {{'selected'}} }else{} @endif>{{$cities->name}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid city.
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="area_id" class="form-label">Area</label>
                                <select class="form-select" name="area_id" id="area_id2" required>
                                    <option selected disabled value="">Select Area</option>
                                    @foreach($area as $areas)
                                    <option value="{{$areas->id}}" @if($data->area_id == $areas->id){ {{'selected'}} }else{} @endif>{{$areas->name}}</option>
                                    @endforeach    
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid Area.
                                </div>
                            </div>
                            <h6>Facilities</h6>
                            @php 
                            $arrfac=explode(',',$data->facilities);
                            @endphp
                            @foreach($tablefacilities as $facility)
                            <div class="col-4">
                                <div class="form-check">
                                        <label class="form-check-label" for="invalidCheck">
                                       {{$facility->fac_name}}
                                        </label>
                                        <input class="form-check-input check " type="checkbox" name="facilities[]" value="{{$facility->id}}" id="" @if(in_array($facility->id,$arrfac)){ {{'checked'}} } else {} @endif >
                                    </div>
                                    <span id="showmsg" class="spanstyle"></span>
                            </div>
                            @endforeach
                            <h6> Room Type </h6>
                            @php 
                            $arrRoom=explode(',',$data->roomtype_id);
                            @endphp
                            @foreach($roomtypes as $roomtype)
                                <div class="col-md-4">
    
                                    <div class="form-check" >
                                   <label class="form-check-label" for="">
                                   {{$roomtype->type}}   
                                    </label>
                                        <!-- <input class="form-check-input chk" type="checkbox" name="roomtype_id[]" id="room" value="{{$roomtype->id}}" @if(in_array($roomtype->id,$arrRoom)){ {{'checked'}} } else {} @endif > -->

                                        <input class="form-check-input chk{{$roomtype->id}} check2" onclick="getdata('{{$roomtype->id}}','{{$roomtype->type}}')"  type="checkbox" name="roomtype_id[]" id="room" value="{{$roomtype->id}}"  @if(in_array($roomtype->id,$arrRoom)){ {{'checked'}} } else {} @endif>
                                    </div> 
                                    <span id="showmsg2" class="spanstyle"></span> 
                                </div>
                                @endforeach
                            
                            <div class="col-md-12 " id="roomprice">
                            <label for="" class="form-label">Price</label>
                            @php 
                            $arrprice=explode(',',$data->price);
                            @endphp
                            @foreach($arrprice as $price2)
                            <div id="roominput" >
                            <input type="text" class="form-control " placeholder="Edit Room Price"  name="price[]" id="price" value="{{$price2}}"><a href="javascript:void(0);" onclick="RemoveElement(id);" class="remove_field">Remove</a><br>
                            </div>
                            @endforeach
                            </div>
                            <div class="col-md-6">
                                <label for="extrabed" class="form-label">Extra Bed</label>
                                <select class="form-select" name="extra_bed" id="extra_bed" required>
                                    <option selected disabled value="">Extra bed ...?</option>
                                    <option value="true" @if($data->extra_bed == "true"){ {{'selected'}} }else{} @endif >Yes</option>
                                    <option value="false"  @if($data->extra_bed == "false"){ {{'selected'}} }else{} @endif>No</option>
                                </select>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="" class="form-label">Enter Price If Extra Bed is Yes</label>
                                <input type="text" class="form-control" name="extra_bed_price" id="extrabedprice" value="{{$data->extra_bed_price}}" placeholder="Enter extra bed price">
                            </div>
                             <h6>Hotel Rating</h6>
                                <div class="col-md-2">
                                 <p>
                                    <input type="radio" id="test1" name="rating" value="1" @if($data->rating == 1 ){ {{'checked'}} }else{} @endif>
                                    <label for="test1">1 Star</label>
                                  </p>
                              </div>   
                               <div class="col-md-2"> 
                                  <p>
                                    <input type="radio" id="test2" name="rating" value="2" @if($data->rating == 2 ){ {{'checked'}} }else{} @endif>
                                    <label for="test2">2 Star</label>
                                  </p>
                                </div> 
                                <div class="col-md-2">   
                                  <p>
                                    <input type="radio" id="test3" name="rating" value="3" @if($data->rating == 3 ){ {{'checked'}} }else{} @endif>
                                    <label for="test3">3 Star</label>
                                  </p>
                                </div> 
                                <div class="col-md-2">  
                                  <p>
                                    <input type="radio" id="test4" name="rating" value="4" @if($data->rating == 4 ){ {{'checked'}} }else{} @endif>
                                    <label for="test4">4 Star</label>
                                  </p>
                                </div> 
                                <div class="col-md-3"
                                  <p>
                                    <input type="radio" id="test5" name="rating" value="5" @if($data->rating == 5 ){ {{'checked'}} }else{} @endif>
                                    <label for="test5">5 Star</label>
                                  </p>
                                </div> 
                                 
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit"  onclick="validatecheckbox();">Update</button>
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
           
            //if(stateID) {
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

//     $(function () {
//         $(".chk").on('change',function () {
//             var checkBox=$('input[name="roomtype_id[]"]:checked').length;
//             if(checkBox > 0){
//             $('#roomprice').append('<div id="roominput" ><input type="text" class="form-control " placeholder="Add '+this.value+' Price"  name="price[]" id="price"><a href="javascript:void(0);" onclick="RemoveElement();" class="remove_field">Remove</a></div>');
//            }
//         else if(checkBox == 0){
//             $("#roomprice").remove('#roominput');
//         }
//         });
//     });
//  function RemoveElement(){
//     $("#roominput").remove();
//  }



function getdata(id,type){
     var checkBox=$('.chk'+id);
        if(checkBox.prop("checked") == true){
              //alert('i am checked');
             $('#roomprice').append('<div id="roominput'+id+'" ><input type="text" class="form-control " placeholder="Add '+type+' Price"  name="price[]" id="price"><a href="javascript:void(0);" onclick="RemoveElement('+id+');" class="remove_field">Remove</a></div>');
        }
        else{
          // alert('i am unchecked');
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





