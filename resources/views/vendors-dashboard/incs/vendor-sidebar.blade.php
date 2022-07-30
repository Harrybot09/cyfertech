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
                          <a href="{{url('vendor-dashboard')}}" class="waves-effect">
                              <span class="badge rounded-pill bg-primary float-end"></span>
                              <i class="mdi mdi-view-dashboard"></i>
                              <span> Dashboard </span>
                          </a>
                      </li>
                      <li>
                          <a href="javascript: void(0);" class="has-arrow waves-effect">
                              <i class="fas fa-list-alt"></i>
                              <span>Vendors Components</span>
                          </a>
                          <ul class="sub-menu" aria-expanded="true">
                              <li>
                                  <a href="javascript: void(0);" class="has-arrow waves-effect">
                                      <i class="fas fa-city"></i>
                                      <span>Hotels</span>
                                  </a>
                                  <ul class="sub-menu" aria-expanded="true">
                                      <li><a href="{{route('addhotel')}}">Add Hotel</a></li>
                                      <li><a href="{{route('viewhotel')}}">Manage Hotel</a> </li>
                                  </ul>
                              </li>
                              <li>
                                  <a href="javascript: void(0);" class="has-arrow waves-effect">
                                      <i class="ti-layers-alt"></i>
                                      <span>Hotel Slides</span>
                                  </a>
                                  <ul class="sub-menu" aria-expanded="true">
                                      <li><a href="{{route('slides.create')}}">Add Slides</a></li>
                                      <li><a href="{{route('slides.index')}}">Manage Slides</a> </li>
                                  </ul>
                              </li>
                              <li>
                                  <a href="javascript: void(0);" class="has-arrow waves-effect">
                                      <i class="fas fa-skiing"></i>
                                      <span>Adventures</span>
                                  </a>
                                  <ul class="sub-menu" aria-expanded="true">
                                      <li><a href="{{route('sportsadventure.create')}}">Add Adventure Sports</a></li>
                                      <li><a href="{{route('sportsadventure.index')}}">Manage Adventure Sports</a> </li>
                                  </ul>
                              </li>
                              <li>
                                  <a href="javascript: void(0);" class="has-arrow waves-effect">
                                      <i class="ti-layers-alt"></i>
                                      <span>Adventure Slides</span>
                                  </a>  
                                  <ul class="sub-menu" aria-expanded="true">
                                      <li><a href="{{route('slideadventure.create')}}">Add Slides</a></li>
                                      <li><a href="{{route('slideadventure.index')}}">Manage Slides</a> </li>
                                  </ul>
                              </li>
                               <li>
                                  <a href="javascript: void(0);" class="has-arrow waves-effect">
                                      <i class="dripicons-view-list-large"></i>
                                      <!-- <i class="fas fa-bookmark"></i> -->
                                      <span>Bookings</span>
                                  </a>
                                  <ul class="sub-menu" aria-expanded="true">
                                      <!-- <li><a href="javascript: void(0);">Edit booking</a></li> -->
                                      <li><a href="{{route('hbookings')}}">Hotel Bookings</a></li>
                                      <li><a href="{{route('vendoradventurebookings')}}">Adventure Bookings</a></li>
                                    
                                  </ul>
                              </li>
                          </ul>
                      </li>
                  </ul>
              </div>
              <!-- Sidebar -->
          </div>
      </div>
      <!-- Left Sidebar End -->