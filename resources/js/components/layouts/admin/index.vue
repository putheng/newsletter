<template>
<div>
	<admin-header/>

	<!-- .app-aside -->
	<admin-aside />
	<!-- /.app-aside -->
	<!-- .app-main -->
	<main class="app-main">
		<!-- .wrapper -->
		<div class="wrapper">
			<div class="page">
				<div class="page-inner">
					<router-view></router-view>
				</div>
			</div>
		</div>
		<!-- footer.html -->
		<!-- /.wrapper -->
	</main>
</div>
</template>

<script>

	export default {

	}
</script>