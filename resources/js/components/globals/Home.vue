<template>
	<div>
		<app-input v-model="name"/>

		{{ name }}
	</div>
</template>

<script>
	import { mapActions } from 'vuex'

	export default {
		data(){
			return {
				name: '',
			}
		},
		methods: {
			
		},
		mounted(){
			this.name = 'heng!'
		}
	}
</script>