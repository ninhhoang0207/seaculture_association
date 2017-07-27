<div class="col-md-3 left_col">
	<div class="left_col scroll-view">
		<div class="navbar nav_title" style="border: 0;">
			<a href="" class="site_title"><i class="fa fa-paw"></i> <span>HỆ THỐNG</span></a>
		</div>

		<div class="clearfix"></div>

		<!-- menu profile quick info -->
		<div class="profile clearfix">
			<div class="profile_pic">
				<img src="{{asset('images/user.png')}}" alt="..." class="img img-circle profile_img">
			</div>
			<div class="profile_info">
				<span>@lang('general.hello'),</span>
				<h2>{{ Auth::user()->name }}</h2>
			</div>
		</div>
		<!-- /menu profile quick info -->

		<br />

		<!-- sidebar menu -->
		<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
			<div class="menu_section">
				<h3></h3>
				<ul class="nav side-menu">
					<li><a><i class="fa fa-newspaper-o"></i>@lang('sidebar/general.news') <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="{{ route('news.list') }}">@lang('sidebar/general.list')</a></li>
							<li><a href="{{ route('news.add') }}">@lang('sidebar/general.add')</a></li>
						</ul>
					</li>
					<li><a><i class="fa fa-list-ul"></i>@lang('sidebar/general.category') <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="{{ route('category.list') }}">@lang('sidebar/general.list')</a></li>
							<li><a href="{{ route('category.add') }}">@lang('sidebar/general.add')</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<!-- /sidebar menu -->

			<!-- /menu footer buttons -->
			<div class="sidebar-footer hidden-small">
				<a data-toggle="tooltip" data-placement="top" title="Settings">
					<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
				</a>
				<a data-toggle="tooltip" data-placement="top" title="FullScreen">
					<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
				</a>
				<a data-toggle="tooltip" data-placement="top" title="Lock">
					<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
				</a>
				<a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
					<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
				</a>
			</div>
			<!-- /menu footer buttons -->
		</div>
	</div>
</div>