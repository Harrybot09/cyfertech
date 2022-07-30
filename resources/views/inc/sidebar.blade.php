      <!-- ========== Left Sidebar Start ========== -->
      <div class="vertical-menu">

          <div data-simplebar class="h-100">

              <!--- Sidemenu -->
              <div id="sidebar-menu">
                  <!-- Left Menu Start -->
                  <ul class="metismenu list-unstyled" id="side-menu">
                      <li class="menu-title">Main</li>


                      <li>
                          <!-- <a href="{{url('/home')}}" class="waves-effect"> -->
                          <a href="{{url('dashboard')}}" class="waves-effect">
                              <span class="badge rounded-pill bg-primary float-end"></span>
                              <i class="mdi mdi-view-dashboard"></i>
                              <span> Dashboard </span>
                          </a>
                      </li>
                      <li>
                          <a href="javascript: void(0);" class="has-arrow waves-effect">
                              <i class="fas fa-list-alt"></i>
                              <span>App Content</span>
                          </a>
                          <ul class="sub-menu" aria-expanded="true">
                              <!--li>
                                  <a href="javascript: void(0);" class="has-arrow waves-effect">
                                      <i class="fas fa-city"></i>
                                      <span>City</span>
                                  </a>
                                  <ul class="sub-menu" aria-expanded="true">
                                      <li><a href="{{route('city.create')}}">Add City</a></li>
                                      <li><a href="{{route('city.index')}}">Manage city</a> </li>
                                  </ul>
                              </li>
                              <li>
                                  <a href="javascript: void(0);" class="has-arrow waves-effect">
                                      <i class="typcn typcn-location"></i>
                                      <span>Area</span>
                                  </a>
                                  <ul class="sub-menu" aria-expanded="true">
                                      <li><a href="{{route('area.create')}}">Add Area</a></li>
                                      <li><a href="{{route('area.index')}}">Manage Area</a> </li>
                                  </ul>
                              </li-->
                              <li>
                                  <a href="javascript: void(0);" class="has-arrow waves-effect">
                                      <i class="ion-ios-keypad"></i>
                                      <span>Category</span>
                                  </a>
                                  <ul class="sub-menu" aria-expanded="true">
                                      <li><a href="{{route('category.create')}}">Add Category</a></li>
                                      <li><a href="{{route('category.index')}}">Manage Category</a></li>
                                  </ul>
                              </li>                              <li>                                  <a href="javascript: void(0);" class="has-arrow waves-effect">                                      <i class="ion-ios-keypad"></i>                                      <span>Sub Category</span>                                  </a>                                  <ul class="sub-menu" aria-expanded="true">                                      <li><a href="{{route('subcategory.create')}}">Add Sub Category</a></li>                                      <li><a href="{{route('subcategory.index')}}">Manage Sub Category</a></li>                                  </ul>                              </li>	
							  
							  <li>
							  <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="ion-ios-keypad"></i><span>Services</span></a>
							  <ul class="sub-menu" aria-expanded="true">
							  <li><a href="{{route('services.create')}}">Add Services</a></li>
							  <li><a href="{{route('services.index')}}">Manage Services</a></li>
                                 </ul>
								 </li>
                              <!--li>
                                  <a href="javascript: void(0);" class="has-arrow waves-effect">
                                      <i class="mbri-devices"></i>
                                      <span>Facilities</span>
                                  </a>
                                  <ul class="sub-menu" aria-expanded="true">
                                      <li><a href="{{route('facility.create')}}">Add Facility</a></li>
                                      <li><a href="{{route('facility.index')}}">Manage Facility</a></li>
                                  </ul>
                              </li>
                              <li>
                                  <a href="javascript: void(0);" class="has-arrow waves-effect">
                                      <i class="ti-layout"></i>
                                      <!-- <i class="fas fa-archway"></i> ->
                                      <span>Rooms</span>
                                  </a>
                                  <ul class="sub-menu" aria-expanded="true">
                                      <li><a href="{{route('room.create')}}">Add Room</a></li>
                                      <li><a href="{{route('room.index')}}">Manage Room</a></li>
                                  </ul>
                              </li>
                              
                              <li>
                                  <a href="javascript: void(0);" class="has-arrow waves-effect">
                                      <i class=" fas fa-building"></i>
                                      <span>Hotels</span>
                                  </a>
                                  <ul class="sub-menu" aria-expanded="true">    
                                      <!-- <li><a href="{{ route('hoteltype.create')}}">Add Hotel Type</a></li>
                                      <li><a href="{{ route('hoteltype.index')}}">Manage Hotel Type</a></li> ->
                                      <li><a href="{{ route('hotel.create')}}">Add Hotel</a></li>
                                      <li><a href="{{ route('hotel.index')}}">Manage Hotel</a></li>
                                   
                                  </ul>
                              </li->
                              <li>
                                  <a href="javascript: void(0);" class="has-arrow waves-effect">
                                      <i class="ti-layers-alt"></i>
                                      <!-- <i class="ion ion-md-albums"></i> ->
                                      <span>Slides</span>
                                  </a>
                                  <ul class="sub-menu" aria-expanded="true">
                                      <li><a href="{{ route('slide.create')}}">Add Slides</a></li>
                                      <li><a href="{{ route('slide.index')}}">Manage Slides</a></li>
                                   
                                  </ul>
                              </li>

                              <!--li>
                              <a href="javascript: void(0);" class="has-arrow waves-effect">
                                      <i class=" fas fa-skiing"></i>
                                      <span>Adventure</span>
                                  </a>
                                  <ul class="sub-menu" aria-expanded="true">
                                  <li><a href="{{route('adventure.create')}}">Add Adventure</a></li>
                                      <li><a href="{{route('adventure.index')}}">Manage Adventure</a></li>
                                      <li><a href="{{route('adventuresport.create')}}">Add Adventure Sports</a></li>
                                      <li><a href="{{route('adventuresport.index')}}">Manage Adventure Sports</a></li>
                                   
                                  </ul>
                              </li>
                              <li>
                              <a href="javascript: void(0);" class="has-arrow waves-effect">
                                      <i class=" fas fa-image"></i>
                                      <span>Adventure Slides</span>
                                  </a>
                                  <ul class="sub-menu" aria-expanded="true">
                                    <li><a href="{{route('adventureslide.create')}}">Add Adventure Slides</a></li>
                                    <li><a href="{{route('adventureslide.index')}}">Manage Adventure Slides</a></li>
                                      
                                  </ul>
                              </li>
                             
                              <li>
                                  <a href="javascript: void(0);" class="has-arrow waves-effect">
                                      <i class="dripicons-view-list-large"></i>
                                      <!-- <i class="fas fa-bookmark"></i> ->
                                      <span>Bookings</span>
                                  </a>
                                  <ul class="sub-menu" aria-expanded="true">
                                      <!-- <li><a href="javascript: void(0);">Edit booking</a></li> ->
                                      <li><a href="{{route('booking.index')}}">Hotel Bookings</a></li>
                                      <li><a href="{{url('adventurebookings')}}">Adventure Bookings</a></li>
                                  </ul>
                              </li-->
                              <li>
                                  <a href="javascript: void(0);" class="has-arrow waves-effect">
                                      <i class="ion ion-md-person-add"></i>
                                      <span>Users</span>
                                  </a>
                                  <ul class="sub-menu" aria-expanded="true">
                                      <!-- <li><a href="javascript: void(0);"> User</a></li> -->
                                      <li><a href="{{route('showusers')}}">Manage User</a></li>
                                  </ul>
                              </li>
							  <!--li>
                                  <a href="javascript: void(0);" class="has-arrow waves-effect">
                                      <i class="ion ion-md-person-add"></i>
                                      <span>RatesPerUser</span>
                                  </a>
                                  <ul class="sub-menu" aria-expanded="true">
                                      <li><a href="{{route('ratesperuser.create')}}">Add RatesPerUser</a></li>
									    <li><a href="{{route('showusers')}}">Manage RatesPerUser</a></li>
                                  </ul>
                              </li-->
							  <li>  <a href="javascript: void(0);" class="has-arrow waves-effect"> 
							  <i class="ion-ios-keypad"></i> <span>Products</span></a>
							  <ul class="sub-menu" aria-expanded="true">
							  <li><a href="{{route('serviceproduct')}}">Add Products</a></li>							  
							  <li><a href="{{route('images.create')}}">Add Services Images</a></li>					  
							  <li><a href="{{route('features')}}">Add Features</a></li>
							
							</ul>       
							  </li>
                              <!--li>
                                  <a href="javascript: void(0);" class="has-arrow waves-effect">
                                      <i class="fas fa-bookmark"></i>
                                      <span>Wishlists</span>
                                  </a>
                                  <ul class="sub-menu" aria-expanded="true">
                                      <li><a href="javascript: void(0);">Add Wishlist</a></li>
                                      <li><a href="javascript: void(0);">Manage Wishlist</a></li>
                                  </ul>
                                
                              </li>
                              <li>
                                  <a href="javascript: void(0);" class="has-arrow waves-effect">
                                      <i class="far fa-address-card"></i>
                                      <span>Vendors</span>
                                  </a>
                                  <ul class="sub-menu" aria-expanded="true">
                                      <li><a href="{{route('vendor.create')}}">Add Vendor</a></li>
                                      <li><a href="{{route('vendor.index')}}">Manage Vendors</a></li>
                                  </ul>
                                
                              </li-->
                          </ul>
                      </li>
                  </ul>
              </div>
              <!-- Sidebar -->
          </div>
      </div>
      <!-- Left Sidebar End -->