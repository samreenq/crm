<div class="left side-menu">

	<!-- LOGO -->
	<div class="topbar-left">
		<div  class="">
			<!--<a href="index.html" class="logo text-center">Fonik</a>-->
			<a href="{{route('admin.homepage')}}" class="bounceIn animated"><img src="{{URL::asset('assets/images/banner_white_background.png')}}" height="80" alt="logo" style="position: relative;
				left: 40px;" ></a>
		</div>
	</div>

	<div class="sidebar-inner slimscrollleft">
		<div id="sidebar-menu">
			<ul>

				<li class="menu-title">Main</li>
					
				<li>
					<a href="{{route('admin.homepage')}}" class="waves-effect"><i class="dripicons-device-desktop"></i><span> Dashboard </span></a>
				</li>
				<li>
					<a href="{{route('admin.manage-users')}}" class="waves-effect"><i class="dripicons-user"></i><span> Manage Users </span></a>
				</li>
				
				
				<li class="menu-title">Ingredents</li>
				
				<li class="has_sub {{ Request::is('/') ? 'nav-active' : null }}">
					<a href="javascript:void(0);" class="waves-effect"><i class="dripicons-suitcase"></i><span> Ingredents <span class="float-right"><i class="mdi mdi-chevron-right"></i></span> </span></a>
					<ul class="list-unstyled">
						<li><a href="{{route('admin.view-ingredents')}}">View Ingredents</a></li>
						<li><a href="{{route('admin.manage-ingredents')}}">Manage Ingredents</a></li>
						
					</ul>
				</li>

				<li class="menu-title">Recipes</li>
				<li class="has_sub">
					<a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-food-fork-drink"></i><span> Recipes <span class="float-right"><i class="mdi mdi-chevron-right"></i></span> </span></a>
					<ul class="list-unstyled">
						<li><a href="{{route('admin.create-recipe')}}">Create Recipe</a></li>
						<li><a href="{{route('admin-manage-all-recipe')}}">Manage Recipes</a></li>
						{{-- <li><a href="">View All Recipes</a></li> --}}
						<li><a href="{{route('admin.recipe-nutrients')}}">Recipe Nutrients</a></li>
						<li><a href="{{route('admin.recipe.category')}}">Recipe Categories</a></li>
					
						
						
						
					</ul>
				</li>

				<li class="menu-title">Settings</li>
				<li class="has_sub">
					<a href="javascript:void(0);" class="waves-effect"><i class="fa fa-medkit"></i><span> Hospitals <span class="float-right"><i class="mdi mdi-chevron-right"></i></span> </span></a>
					<ul class="list-unstyled">
						<li><a href="{{route('admin.create-hospital')}}">Add Hospital</a></li>
						<li><a href="{{route('admin.manage-hospitals')}}">Manage Hospitals</a></li>
						{{-- <li><a href="{{route('admin-settings.requested-hospitals')}}">Requested Hospitals</a></li> --}}
						{{-- <li><a href="">View All Recipes</a></li> --}}
						{{-- <li><a href="{{route('admin.recipe-nutrients')}}">View Doctors</a></li> --}}
						
					
						
						
						
					</ul>
				</li>



				

				<li class="menu-title">Approvals</li>
				<li class="has_sub">
					<a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-key"></i><span> Approvals <span class=" approval_badge badge badge-pill badge-success float-center" style="margin:0px 5px"></span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span> </span></a>
					<ul class="list-unstyled">
						<li><a href="{{route('admin-requested-manage-all-recipe')}}" >Recipes <span class=" recipe_approval_badge badge badge-pill badge-success float-center" style="margin:0px 5px"></span></a></li>
						<li><a href="{{route('admin-settings.requested-hospitals')}}" >Hospitals <span class=" hospital_approval_badge badge badge-pill badge-success float-center" style="margin:0px 5px"></span></a></li>
																
					</ul>
				</li>

				

				

				

				

			



			

				

				

				

			</ul>
		</div>
		<div class="clearfix"></div>
	</div> <!-- end sidebarinner -->
</div>