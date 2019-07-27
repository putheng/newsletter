<template>
<header class="app-header app-header-dark">
	<!-- .top-bar -->
	<div class="top-bar">
		<!-- .top-bar-brand -->
		<div class="top-bar-brand">
			<a href="/" target="_blank">
			<img src="/images/brand-inverse.png" alt="" style="height: 32px;width: auto;">
			</a>
		</div>
		<!-- /.top-bar-brand -->
		<!-- .top-bar-list -->
		<div class="top-bar-list">
			<!-- .top-bar-item -->
			<div class="top-bar-item px-2 d-md-none d-lg-none d-xl-none">
				<!-- toggle menu -->
				<button class="hamburger hamburger-squeeze" type="button" data-toggle="aside" aria-label="toggle menu">
				<span class="hamburger-box">
				<span class="hamburger-inner"></span>
				</span>
				</button>
				<!-- /toggle menu -->
			</div>
			<!-- /.top-bar-item -->
			<!-- <top-search-bar /> -->
			<!-- .top-bar-item -->
			<div class="top-bar-item top-bar-item-right px-0 d-none d-sm-flex">
				<!-- .btn-account -->
				<div class="dropdown">
					<button class="btn-account d-none d-md-flex" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<span class="user-avatar user-avatar-md">
					<img src="/images/profile.jpg" alt="">
					</span>
					<span class="account-summary pr-lg-4 d-none d-lg-block">
					<span class="account-name">{{ user.name }}</span>
					<span class="account-description">{{ user.role }}</span>
					</span>
					</button>
					<div class="dropdown-arrow dropdown-arrow-left"></div>
					<!-- .dropdown-menu -->
					<div class="dropdown-menu">
						<h6 class="dropdown-header d-none d-md-block d-lg-none">
							{{ user.name }}
						</h6>
						<a @click.prevent="signout" class="dropdown-item">
							<span class="dropdown-icon oi oi-account-logout"></span> Logout
							<form id="logout-form" action="/logout" method="POST" style="display: none;">
								<input type="hidden" :value="token" name="_token">
					    	</form>
						</a>
					</div>
					<!-- /.dropdown-menu -->
				</div>
				<!-- /.btn-account -->
			</div>
			<!-- /.top-bar-item -->
		</div>
		<!-- /.top-bar-list -->
	</div>
	<!-- /.top-bar -->
</header>
</template>

<script>
	import { mapGetters, mapActions } from 'vuex'

	export default {
		data(){
			return {
				token : document.head.querySelector('meta[name="csrf-token"]').content
			}
		},
		methods: {
			...mapActions({
				fetch: 'admin/fetchUser'
			}),
			signout(){
				document.getElementById("logout-form").submit()
			}
		},
		computed: {
			...mapGetters({
				user: 'admin/getUser'
			})
		},
		mounted(){
			this.fetch()
		}
	}
</script>