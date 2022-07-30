  <!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Dashboard | Admin | CyferTech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-token" content="content">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- C3 Chart css -->
    <link href="{{ url('public/assets/libs/c3/c3.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Bootstrap Css -->
    <link href="{{ url('public/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="{{ url('public/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{ url('public/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css">
   
</head>

<body data-sidebar="dark">

<div id="layout-wrapper">

@include('inc/header')
@include('inc/sidebar')
<div class="main-content">
@yield('content')
@include('inc/footer')
 </div>
</div>


    <!-- JAVASCRIPT -->
    <script src="{{ url('public/assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{ url('public/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ url('public/assets/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{ url('public/assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{ url('public/assets/libs/node-waves/waves.min.js')}}"></script>


    <!-- Peity chart-->
    <script src="{{ url('public/assets/libs/peity/jquery.peity.min.js')}}"></script>

    <!--C3 Chart-->
    <script src="{{ url('public/assets/libs/d3/d3.min.js')}}"></script>
    <script src="{{ url('public/assets/libs/c3/c3.min.js')}}"></script>

    <script src="{{ url('public/assets/libs/jquery-knob/jquery.knob.min.js')}}"></script>

    <script src="{{ url('public/assets/js/pages/dashboard.init.js')}}"></script>

    <script src="{{ url('public/assets/js/app.js')}}"></script>
   
    <script src="{{ url('public/assets/js/pages/form-validation.init.js')}}"></script>
    <!--tinymce js-->
    <script src="{{ url('public/assets/libs/tinymce/tinymce.min.js')}}"></script>

    <!-- init js -->
    <script src="{{ url('public/assets/js/pages/form-editor.init.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    
<script>

		$(document).ready(function(){
			
		/*********************************Category code starts here*******************************************/	
		$(".subcatshow").hide();
			$(".categ").change(function () {
				var category = this.value;
				
				$.ajax({
				url: "{{url('getsubcategory')}}",
				type: "post",
				data: {
					
					'cat':category,
				},
				success: function (response) {
			     if(response== ''){
					 $(".subcatshow").hide();
				
				    }
				else {
					$(".subcatshow").show();
					var datax = JSON.parse(response);
					$('.subcateg').empty();

							 $('.subcateg').append(' <option selected disabled value="">Select Sub category</option>');

                        for(var i=0; i<datax.length ; i++) {
                              $('.subcateg').append('<option value="'+ datax[i].id +'">' + datax[i].name+'</option>');

                        }
                    
				}
				   
				},
				error: function(jqXHR, textStatus, errorThrown) {
				
			}
			});
			});
			
//*******************//service subcategory show start
					$(".sersubcatshow").hide();
			$(".sercateg").change(function () {
				var category = this.value;
				
				$.ajax({
				url: "{{url('getservice')}}/"+category,
				type: "get",
				success: function (response) {
			     if(response== ''){
					 $(".sersubcatshow").hide();
				
				    }
				else {
					
						$(".sersubcatshow").show();
					$('.sersubcateg').empty();
                        $('.sersubcateg').append(' <option selected disabled value="">Select Sub category</option>');
							$('.sersubcateg').append(response);
					
                    
				}
				   
				},
				error: function(jqXHR, textStatus, errorThrown) {
				
			}
			});
			});

//*******************//service subcategory show end			
			
			 $(".subsubcatshow").hide();
			$(".subcateg").change(function () {
				var category = this.value;
				console.log(category);
				$.ajax({
				url: "{{url('getsubcategory')}}",
				type: "post",
				data: {
					'_token': "{{ csrf_token() }}",
					'cat':category,
				},					
					
				success: function (responsex) {
			     if(JSON.parse(responsex).length== 0){
					 $(".subsubcatshow").hide();
				
				    }
				else {
					$(".subsubcatshow").show();
					var datax = JSON.parse(responsex);
					$('.subsubcateg').empty();

                        $('.subsubcateg').append(' <option selected disabled value="">Select Sub category</option>');

                        for(var i=0; i<datax.length ; i++) {
                              $('.subsubcateg').append('<option value="'+ datax[i].id +'">' + datax[i].name+'</option>');

                        }
				}
				   
				},
				error: function(jqXHR, textStatus, errorThrown) {
				
			}
			});
			});	
			
			 var path =  $(location).attr('pathname');
			
			if(path == '/cyfertech/serviceproduct'){
				 $(".servicecat").hide();
			$(".subsubcateg").change(function () {
				var category = this.value;
				console.log(category);
				$.ajax({
				url: "{{url('getsubcategory')}}",
				type: "post",
				data: {
					'_token': "{{ csrf_token() }}",
					'cat':category,
				},					
					
				success: function (responsex) {
			     if(JSON.parse(responsex).length== 0){
					 $(".servicecat").hide();
				
				    }
				else {
					$(".servicecat").show();
					var datax = JSON.parse(responsex);
					$('.servicecatg').empty();

                        $('.servicecatg').append(' <option selected disabled value="">Select Sub category</option>');

                        for(var i=0; i<datax.length ; i++) {
                              $('.servicecatg').append('<option value="'+ datax[i].id +'">' + datax[i].name+'</option>');

                        }
				}
				   
				},
				error: function(jqXHR, textStatus, errorThrown) {
				
			}
			});
			});	
				
			}
			
			
		/********************************Category code end here*************************************************/	
			
			$(".serve").change(function () {
				var category = this.value;
				console.log(category);
				$.ajax({
				url: "{{url('servicesubcat')}}",
				type: "post",
				data: {
					'_token': "{{ csrf_token() }}",
					'cat':category,
				},					
					
				success: function (response) {
			     if(response != ''){
					var data = JSON.parse(response);
					$('.servecat').empty();

                        $('.servecat').append(' <option selected disabled value="">Select Service category</option>');

                        for(var i=0; i<data.length ; i++) {
                              $('.servecat').append('<option value="'+ data[i].id +'">' + data[i].name+'</option>');

                        }
				    }
				   
				},
				error: function(jqXHR, textStatus, errorThrown) {
				
			}
			});
			});
			
			
			$("#addmore").on("click", function(){
				$("#addfield").append('<div class="col-md-9"><label for="validationCustom03" class="form-label">Add Service</label><input type="text" class="form-control" name="name[]" id="validationCustom03" required><div class="invalid-feedback"> Please provide a valid Service name.</div><button type="button" class="deleteButton " title="Add field">Remove</button></div>');
			});
			
			$("#addfield").on("click",".deleteButton", function(){
			   $("#addfield div").last().remove();
		       });
		
		
			
			$("#addmoresubcat").on("click", function(){
				$("#addfieldsubcat").append('<div class="col-md-9"><label for="validationCustom03" class="form-label">Add Service Sub Category</label><input type="text" class="form-control" name="name[]" id="validationCustom03" required><div class="invalid-feedback"> Please provide a valid Service name.</div><button type="button" class="deleteButtonsubcat " title="Add field">Remove</button></div>');
				});
		
			$("#addfieldsubcat").on("click",".deleteButtonsubcat", function(){
			   $("#addfieldsubcat div").last().remove();
				});
				
				
				
			$("#addmoreproduct").on("click", function(){
				$("#addfieldproduct").append('<div class="row" id="appended"><div class="col-md-4"><label for="validationCustom03" class="form-label">Add SKU ID</label>  <input type="text" class="form-control" name="sku_id[]" id="validationCustom03" required><div class="invalid-feedback"> Please provide a valid Service name.</div> </div> <div class="col-md-4"> <label for="validationCustom03" class="form-label">Add Price</label><input type="text" class="form-control" name="price[]" id="validationCustom03" required> <div class="invalid-feedback">  Please provide a valid Service name. </div>  </div><div class="col-md-4"> <label for="validationCustom03" class="form-label">Number Of Users</label> <input type="text" class="form-control" name="no_of_user[]" id="validationCustom03" required><div class="invalid-feedback">  Please provide a valid Service name.  </div>  </div><button type="button" class="deleteButtonproduct" title="Add field">Remove</button></div></div>');
				});	
			
			$("#addfieldproduct").on("click",".deleteButtonproduct", function(){
			   $("#appended").last().remove();
				});				
				
				
			$("#addmoreserv").on("click", function(){
				$("#addfieldserv").append('<div class="col-md-9"><label for="validationCustom03" class="form-label">Add Service</label><input type="text" class="form-control" name="name[]" id="validationCustom03" required><div class="invalid-feedback"> Please provide a valid Service name.</div><button type="button" class="deleteButton " title="Add field">Remove</button></div>');
			});
			
			$("#addfieldserv").on("click",".deleteButton", function(){
			   $("#addfieldserv div").last().remove();
		       });	
				
			
			$("#addmorefeat").on("click", function(){
				$("#addfieldfeat").append(' <div class="col-md-6">                                <label for="validationCustom03" class="form-label">Add Features	</label>                                <input type="text" class="form-control" name="name[]" id="validationCustom03" required>                                <div class="invalid-feedback">                                    Please provide a valid Service name.                                </div>                           </div>								<div class="col-md-6">                                <label for="validationCustom03" class="form-label">Add Service</label>                                <textarea id="elm1" name="description[]"></textarea>                                <div class="invalid-feedback">                                    Please provide a valid Service name.                                </div>                     </div><button type="button" class="deleteButton " title="Add field">Remove</button></div>');
			});
			
			$("#addfieldfeat").on("click",".deleteButton", function(){
			   $("#addfieldserv div").last().remove();
		       });	
				
		});

</script>
</body>

</html>