<nav class="navbar navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
        </div>

        <div class="navbar-brand">
            <a href="/home"><img src="{{asset('images/logo/logo.svg')}}" alt="Lucid Logo" style="width: 28px;" class="img-responsive logo"></a> Sekarwangi               
        </div>
        
        <div class="navbar-right">
            <form id="navbar-search" class="navbar-form search-form">
                <input value="" class="form-control" placeholder="Search here..." type="text">
                <button type="button" class="btn btn-default"><i class="icon-magnifier"></i></button>
            </form>                

            <div id="navbar-menu">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="doctor-events.html" class="icon-menu d-none d-sm-block d-md-none d-lg-block"><i class="icon-calendar"></i></a>
                    </li>
                    <li>
                        <a href="app-chat.html" class="icon-menu d-none d-sm-block"><i class="icon-bubbles"></i></a>
                    </li>
                    <li>
                        <a href="app-inbox.html" class="icon-menu d-none d-sm-block"><i class="icon-envelope"></i><span class="notification-dot"></span></a>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                            <i class="icon-bell"></i>
                            <span class="notification-dot"></span>
                        </a>
                        <ul class="dropdown-menu notifications">
                            <li class="header"><strong>You have 4 new Notifications</strong></li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <div class="media-left">
                                            <i class="icon-info text-warning"></i>
                                        </div>
                                        <div class="media-body">
                                            <p class="text">Campaign <strong>Holiday Sale</strong> is nearly reach budget limit.</p>
                                            <span class="timestamp">10:00 AM Today</span>
                                        </div>
                                    </div>
                                </a>
                            </li>                               
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <div class="media-left">
                                            <i class="icon-like text-success"></i>
                                        </div>
                                        <div class="media-body">
                                            <p class="text">Your New Campaign <strong>Holiday Sale</strong> is approved.</p>
                                            <span class="timestamp">11:30 AM Today</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <div class="media-left">
                                            <i class="icon-pie-chart text-info"></i>
                                        </div>
                                        <div class="media-body">
                                            <p class="text">Website visits from Twitter is 27% higher than last week.</p>
                                            <span class="timestamp">04:00 PM Today</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <div class="media-left">
                                            <i class="icon-info text-danger"></i>
                                        </div>
                                        <div class="media-body">
                                            <p class="text">Error on website analytics configurations</p>
                                            <span class="timestamp">Yesterday</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="footer"><a href="javascript:void(0);" class="more">See all notifications</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown"><i class="icon-equalizer"></i></a>
                        <ul class="dropdown-menu user-menu menu-icon">
                            <li class="menu-heading">ACCOUNT SETTINGS</li>
                            <li><a href="javascript:void(0);"><i class="icon-note"></i> <span>Basic</span></a></li>
                            <li><a href="javascript:void(0);"><i class="icon-equalizer"></i> <span>Preferences</span></a></li>
                            <li><a href="javascript:void(0);"><i class="icon-lock"></i> <span>Privacy</span></a></li>
                            <li><a href="javascript:void(0);"><i class="icon-bell"></i> <span>Notifications</span></a></li>
                            <li class="menu-heading">BILLING</li>
                            <li><a href="javascript:void(0);"><i class="icon-credit-card"></i> <span>Payments</span></a></li>
                            <li><a href="javascript:void(0);"><i class="icon-printer"></i> <span>Invoices</span></a></li>                                
                            <li><a href="javascript:void(0);"><i class="icon-refresh"></i> <span>Renewals</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="icon-menu" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="icon-login"></i>
                        </a>
                
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<div id="left-sidebar" class="sidebar">
    <div class="sidebar-scroll">
        <div class="user-account">
            {{-- <img src="../assets/images/user.png" class="rounded-circle user-photo" alt="User Profile Picture"> --}}
            <div class="dropdown">
                <span>Welcome,</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong> {{ Auth::user()->name }}</strong></a>
                <ul class="dropdown-menu dropdown-menu-right account">
                    <li><a href="doctor-profile.html"><i class="icon-user"></i>My Profile</a></li>
                    <li><a href="app-inbox.html"><i class="icon-envelope-open"></i>Messages</a></li>
                    <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                    <li class="divider"></li>
                    <li><a class="icon-menu" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="icon-power"></i> Logout
                        </a>
                
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            <hr>
            <ul class="row list-unstyled">
                <li class="col-4">
                    <small>Exp</small>
                    <h6>14</h6>
                </li>
                <li class="col-4">
                    <small>Awards</small>
                    <h6>13</h6>
                </li>
                <li class="col-4">
                    <small>Clients</small>
                    <h6>213</h6>
                </li>
            </ul>
        </div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#menu">Menu</a></li>                
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#sub_menu"><i class="icon-grid"></i></a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Chat"><i class="icon-book-open"></i></a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#setting"><i class="icon-settings"></i></a></li>                
        </ul>
            
        <!-- Tab panes -->
        <div class="tab-content p-l-0 p-r-0">
            <div class="tab-pane active" id="menu">
                <nav class="sidebar-nav">
                    <ul class="main-menu metismenu">
                        <li class="{{ (request()->is('home')) ? 'active' : '' }}"><a href="/home"><i class="icon-home"></i><span>Dashboard</span></a></li>
                        <li class="{{ (request()->segment(1) == 'informasi') ? 'active' : '' }}"><a href="/informasi/informasi"><i class="icon-note"></i><span>Informasi</span> </a></li>
                        <li class="{{ (request()->segment(1) == 'tentang') ? 'active' : '' }}"><a href="javascript:void(0);" class="has-arrow"><i class="icon-layers"></i><span>Tentang</span> </a>
                            <ul>
                                <li class="{{ (request()->segment(2) == 'sejarah') ? 'active' : '' }}"><a href="{{ (request()->segment(2) == 'sejarah') ? '' : '/tentang/sejarah' }}">Sejarah</a></li>
                                <li class="{{ (request()->segment(2) == 'profil') ? 'active' : '' }}"><a href="{{ (request()->segment(2) == 'profil') ? '' : '/tentang/profil' }}">Profil</a></li>
                                <li class="{{ (request()->segment(2) == 'visi') ? 'active' : '' }}"><a href="{{ (request()->segment(2) == 'visi') ? '' : 'tentang/visi' }}">Visi Misi</a></li>
                                <li class="{{ (request()->segment(2) == 'dokter') ? 'active' : '' }}"><a href="{{ (request()->segment(2) == 'dokter') ? '' : 'tentang/dokter' }}">Dokter</a></li>
                                <li class="{{ (request()->segment(2) == 'denah') ? 'active' : '' }}"><a href="{{ (request()->segment(2) == 'denah') ? '' : 'tentang/denah' }}">Denah Lokasi</a></li>
                                <li class="{{ (request()->segment(2) == 'galeri') ? 'active' : '' }}"><a href="{{ (request()->segment(2) == 'galeri') ? '' : 'tentang/galeri' }}">Galeri</a></li>
                                <li class="{{ (request()->segment(2) == 'ikm') ? 'active' : '' }}"><a href="{{ (request()->segment(2) == 'ikm') ? '' : 'tentang/ikm' }}">Kepuasan Masyarakat</a></li>

                            </ul>
                        </li>
                       
                    </ul>
                </nav>
            </div>
            <div class="tab-pane" id="sub_menu">
                <nav class="sidebar-nav">
                    <ul class="main-menu metismenu">
                        <li>
                            <a href="#uiElements" class="has-arrow"><i class="icon-diamond"></i> <span>UI Elements</span></a>
                            <ul>
                                <li><a href="ui-typography.html">Typography</a></li>
                                <li><a href="ui-tabs.html">Tabs</a></li>
                                <li><a href="ui-buttons.html">Buttons</a></li>
                                <li><a href="ui-bootstrap.html">Bootstrap UI</a></li>
                                <li><a href="ui-icons.html">Icons</a></li>
                                <li><a href="ui-notifications.html">Notifications</a></li>
                                <li><a href="ui-colors.html">Colors</a></li>
                                <li><a href="ui-dialogs.html">Dialogs</a></li>                                    
                                <li><a href="ui-list-group.html">List Group</a></li>
                                <li><a href="ui-media-object.html">Media Object</a></li>
                                <li><a href="ui-modals.html">Modals</a></li>
                                <li><a href="ui-nestable.html">Nestable</a></li>
                                <li><a href="ui-progressbars.html">Progress Bars</a></li>
                                <li><a href="ui-range-sliders.html">Range Sliders</a></li>
                                <li><a href="ui-treeview.html">Treeview</a></li>
                            </ul>
                        </li>                            
                        <li>
                            <a href="#forms" class="has-arrow"><i class="icon-pencil"></i> <span>Forms</span></a>
                            <ul>
                                <li><a href="forms-validation.html">Form Validation</a></li>
                                <li><a href="forms-advanced.html">Advanced Elements</a></li>
                                <li><a href="forms-basic.html">Basic Elements</a></li>
                                <li><a href="forms-wizard.html">Form Wizard</a></li>                                    
                                <li><a href="forms-dragdropupload.html">Drag &amp; Drop Upload</a></li>                                    
                                <li><a href="forms-cropping.html">Image Cropping</a></li>
                                <li><a href="forms-summernote.html">Summernote</a></li>
                                <li><a href="forms-editors.html">CKEditor</a></li>
                                <li><a href="forms-markdown.html">Markdown</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#Tables" class="has-arrow"><i class="icon-tag"></i> <span>Tables</span></a>
                            <ul>
                                <li><a href="table-basic.html">Tables Example<span class="badge badge-info float-right">New</span></a> </li>
                                <li><a href="table-normal.html">Normal Tables</a> </li>
                                <li><a href="table-jquery-datatable.html">Jquery Datatables</a> </li>
                                <li><a href="table-editable.html">Editable Tables</a> </li>
                                <li><a href="table-color.html">Tables Color</a> </li>
                                <li><a href="table-filter.html">Table Filter <span class="badge badge-info float-right">New</span></a> </li>
                                <li><a href="table-dragger.html">Table dragger <span class="badge badge-info float-right">New</span></a> </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#charts" class="has-arrow"><i class="icon-bar-chart"></i> <span>Charts</span></a>
                            <ul>
                                <li><a href="chart-e.html">E Charts</a> </li>
                                <li><a href="chart-morris.html">Morris</a> </li>
                                <li><a href="chart-flot.html">Flot</a> </li>
                                <li><a href="chart-chartjs.html">ChartJS</a> </li>                                    
                                <li><a href="chart-jquery-knob.html">Jquery Knob</a> </li>                                        
                                <li><a href="chart-sparkline.html">Sparkline Chart</a></li>
                                <li><a href="chart-peity.html">Peity</a></li>
                                <li><a href="chart-c3.html">C3 Charts</a></li>
                                <li><a href="chart-gauges.html">Gauges</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#Maps" class="has-arrow"><i class="icon-map"></i> <span>Maps</span></a>
                            <ul>
                                <li><a href="map-google.html">Google Map</a></li>
                                <li><a href="map-yandex.html">Yandex Map</a></li>
                                <li><a href="map-jvectormap.html">jVector Map</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="tab-pane p-l-15 p-r-15" id="Chat">
                <form>
                    <div class="input-group m-b-20">
                        <div class="input-group-prepend">
                            <span class="input-group-text" ><i class="icon-magnifier"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                </form>
                <ul class="right_chat list-unstyled">
                    <li class="online">
                        <a href="javascript:void(0);">
                            <div class="media">
                                <img class="media-object " src="{{asset('images/xs/avatar4.jpg')}}" alt="">
                                <div class="media-body">
                                    <span class="name">Dr. Chris Fox</span>
                                    <span class="message">Dentist</span>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </a>                            
                    </li>
                    <li class="online">
                        <a href="javascript:void(0);">
                            <div class="media">
                                <img class="media-object " src="{{asset('images/xs/avatar5.jpg')}}" alt="">
                                <div class="media-body">
                                    <span class="name">Dr. Joge Lucky</span>
                                    <span class="message">Gynecologist</span>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </a>                            
                    </li>
                    <li class="offline">
                        <a href="javascript:void(0);">
                            <div class="media">
                                <img class="media-object " src="{{asset('images/xs/avatar2.jpg')}}" alt="">
                                <div class="media-body">
                                    <span class="name">Dr. Isabella</span>
                                    <span class="message">CEO, WrapTheme</span>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </a>                            
                    </li>
                    <li class="offline">
                        <a href="javascript:void(0);">
                            <div class="media">
                                <img class="media-object " src="{{asset('images/xs/avatar1.jpg')}}" alt="">
                                <div class="media-body">
                                    <span class="name">Dr. Folisise Chosielie</span>
                                    <span class="message">Physical Therapy</span>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </a>                            
                    </li>
                    <li class="online">
                        <a href="javascript:void(0);">
                            <div class="media">
                                <img class="media-object " src="{{asset('images/xs/avatar3.jpg')}}" alt="">
                                <div class="media-body">
                                    <span class="name">Dr. Alexander</span>
                                    <span class="message">Audiology</span>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </a>                            
                    </li>                        
                </ul>
            </div>
            <div class="tab-pane p-l-15 p-r-15" id="setting">
                <h6>Choose Skin</h6>
                <ul class="choose-skin list-unstyled">
                    <li data-theme="purple">
                        <div class="purple"></div>
                        <span>Purple</span>
                    </li>                   
                    <li data-theme="blue">
                        <div class="blue"></div>
                        <span>Blue</span>
                    </li>
                    <li data-theme="cyan" class="active">
                        <div class="cyan"></div>
                        <span>Cyan</span>
                    </li>
                    <li data-theme="green">
                        <div class="green"></div>
                        <span>Green</span>
                    </li>
                    <li data-theme="orange">
                        <div class="orange"></div>
                        <span>Orange</span>
                    </li>
                    <li data-theme="blush">
                        <div class="blush"></div>
                        <span>Blush</span>
                    </li>
                </ul>
                <hr>
                <h6>General Settings</h6>
                <ul class="setting-list list-unstyled">
                    <li>
                        <label class="fancy-checkbox">
                            <input type="checkbox" name="checkbox">
                            <span>Report Panel Usag</span>
                        </label>
                    </li>
                    <li>
                        <label class="fancy-checkbox">
                            <input type="checkbox" name="checkbox">
                            <span>Email Redirect</span>
                        </label>
                    </li>
                    <li>
                        <label class="fancy-checkbox">
                            <input type="checkbox" name="checkbox" checked>
                            <span>Notifications</span>
                        </label>                      
                    </li>
                    <li>
                        <label class="fancy-checkbox">
                            <input type="checkbox" name="checkbox" checked>
                            <span>Auto Updates</span>
                        </label>
                    </li>
                    <li>
                        <label class="fancy-checkbox">
                            <input type="checkbox" name="checkbox">
                            <span>Offline</span>
                        </label>
                    </li>
                    <li>
                        <label class="fancy-checkbox">
                            <input type="checkbox" name="checkbox" checked>
                            <span>Location Permission</span>
                        </label>
                    </li>
                </ul>
            </div>             
        </div>          
    </div>
</div>
