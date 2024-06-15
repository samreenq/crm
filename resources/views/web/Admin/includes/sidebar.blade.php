<div class="left side-menu">

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="">
            <!--<a href="index.html" class="logo text-center">Fonik</a>-->
            <a href="{{ route('admin.homepage') }}" class="bounceIn animated"><img
                    src="{{ URL::asset('custom/assets/images/logo.png') }}" height="80" alt="logo"
                    style="position: relative;
				width:90%;left:-10px"></a>
        </div>
    </div>

    <div class="sidebar-inner slimscrollleft">
        <div id="sidebar-menu">
            <ul>
                <li class="menu-title">Main</li>
                <li>
                    <a href="{{ route('admin.users') }}" class="waves-effect"><i class="fa fa-user-o"></i><span> Users
                        </span></a>
                </li>

                <li>
                    <a href="{{ route('admin.organization') }}" class="waves-effect"><i class="fa fa-building"></i><span> Organization
                        </span></a>
                </li>

                <li>
                    <a href="{{ route('admin.contacts') }}" class="waves-effect"><i class="fa fa-phone"></i><span> Contacts
                        </span></a>
                </li>
                <li>
                    <a href="{{ route('admin.leads') }}" class="waves-effect"><i class="fa fa-crosshairs"></i><span> Leads</span></a>
                </li>


              {{--   <li>
                    <a href="{{ route('admin.companies') }}" class="waves-effect"><i class="fa fa-user-o"></i><span> Companies
                        </span></a>
                </li>
                <li>
                    <a href="{{ route('admin.invoices') }}" class="waves-effect"><i class="dripicons-device-desktop"></i><span> Invoices
                        </span></a>
                </li>
                <li >
                    <a href="{{ route('admin.view.meetings') }}" class="waves-effect"><i class="dripicons-blog"></i><span> Meetings <span class="badge badge-pill badge-danger float-right" id="meetingCountByAdmin"></span> </span></a>

                </li> --}}
            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
