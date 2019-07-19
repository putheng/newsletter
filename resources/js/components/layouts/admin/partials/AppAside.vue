<template>
	<aside class="app-aside app-aside-expand-md app-aside-light">
		<!-- .aside-content -->
		<div class="aside-content">
			<!-- .aside-header -->
			<header class="aside-header d-block d-md-none">
				<!-- .btn-account -->
				<button class="btn-account" type="button" data-toggle="collapse" data-target="#dropdown-aside">
				<span class="user-avatar user-avatar-lg">
				<img src="/images/profile.jpg" alt="">
				</span>
				<span class="account-icon">
				<span class="fa fa-caret-down fa-lg"></span>
				</span>
				<span class="account-summary">
				<span class="account-name">Beni Arisandi</span>
				<span class="account-description">Marketing Manager</span>
				</span>
				</button>
				<!-- /.btn-account -->
				<!-- .dropdown-aside -->
				<div id="dropdown-aside" class="dropdown-aside collapse">
					<!-- dropdown-items -->
					<div class="pb-3">
						<a class="dropdown-item" href="user-profile.html"><span class="dropdown-icon oi oi-person"></span> Profile</a>
						<a class="dropdown-item" href="auth-signin-v1.html"><span class="dropdown-icon oi oi-account-logout"></span> Logout</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Help Center</a>
						<a class="dropdown-item" href="#">Ask Forum</a>
						<a class="dropdown-item" href="#">Keyboard Shortcuts</a>
					</div>
					<!-- /dropdown-items -->
				</div>
				<!-- /.dropdown-aside -->
			</header>
			<!-- /.aside-header -->
			<!-- .aside-menu -->
			<div class="aside-menu overflow-hidden">
				<!-- .stacked-menu -->
				<nav id="stacked-menu" class="stacked-menu">
					<!-- .menu -->
					<ul class="menu">
<li class="menu-item has-child" style="">
	<a href="#" class="menu-link"><span class="menu-icon oi oi-list-rich"></span> <span class="menu-text">Level Menu</span></a> <!-- child menu -->
	<ul class="menu">
		<li class="menu-subhead">Level Menu</li>
		<li class="menu-item">
			<a href="#" class="menu-link" tabindex="-1">Menu item</a>
		</li>
		<li class="menu-item has-child">
			<a href="#" class="menu-link" tabindex="-1">Menu item</a> <!-- grand child menu -->
			<ul class="menu">
				<li class="menu-item">
					<a href="#" class="menu-link" tabindex="-1">Child item</a>
				</li>
				<li class="menu-item">
					<a href="#" class="menu-link" tabindex="-1">Child item</a>
				</li>
				<li class="menu-item has-child">
					<a href="#" class="menu-link" tabindex="-1">Child item</a> <!-- grand child menu -->
					<ul class="menu">
						<li class="menu-item">
							<a href="#" class="menu-link" tabindex="-1">Grand Child item</a>
						</li>
						<li class="menu-item">
							<a href="#" class="menu-link" tabindex="-1">Grand Child item</a>
						</li>
						<li class="menu-item">
							<a href="#" class="menu-link" tabindex="-1">Grand Child item</a>
						</li>
						<li class="menu-item">
							<a href="#" class="menu-link" tabindex="-1">Grand Child item</a>
						</li>
					</ul>
					<!-- /grand child menu -->
				</li>
				<li class="menu-item">
					<a href="#" class="menu-link" tabindex="-1">Child item</a>
				</li>
			</ul>
			<!-- /grand child menu -->
		</li>
		<li class="menu-item">
			<a href="#" class="menu-link" tabindex="-1">Menu item</a>
		</li>
	</ul>
	<!-- /child menu -->
</li>
					</ul>
					<!-- /.menu -->
				</nav>
				<!-- /.stacked-menu -->
			</div>
			<!-- /.aside-menu -->
			<!-- Skin changer -->
			<footer class="aside-footer border-top p-3">
				<button class="btn btn-light btn-block text-primary" data-toggle="skin">Night mode <i class="fas fa-moon ml-1"></i></button>
			</footer>
			<!-- /Skin changer -->
		</div>
		<!-- /.aside-content -->
	</aside>
</template>

<script>
	export default {

	}
</script>