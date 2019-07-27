<template>
	<div class="modal modal-alert fade" :id="id" data-backdrop="static" tabindex="-1" role="dialog" :aria-labelledby="id" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<app-form :commit="commit" :hide-modal="id" :action="option.url" method="post" :redirect="option.redirect">
				<div class="modal-header">
					<h5 :id="id" class="modal-title">
						{{ title }}
					</h5>
				</div>
				<div class="modal-body">
					<slot/>
					<p v-if="errors" class="text-danger">{{ errors }}</p>
				</div>
				<div class="modal-footer">
						
					<template v-for="(item, key, index) in data">
						<app-input type="hidden" :name="key" :value="item" />
					</template>
						
					<app-button type="submit">{{ option.title }}</app-button>

					<button
						type="button"
						@click="resetLoading"
						class="btn btn-warning"
						data-dismiss="modal"
					>
						{{ cancel }}
					</button>
				</div>
				</app-form>
			</div>
		</div>
	</div>
</template>
<script>
import { mapActions, mapGetters } from 'vuex'

export default {
	props: {
		id: {
			required: true
		},
		title: {
			required: true,
			type: String
		},
		option: {
			required: true,
			type: Object
		},
		data: {
			required: false,
			type: Object
		},
		cancel: {
			required: true,
			type: String
		},
		commit: {
			required: false,
			type: String
		},
		body: {
			required: false,
			type: String,
			default: 'Are you sure you want to delete this package ?'
		}
	},
	computed: {
		...mapGetters({
			loading: 'getLoading',
			errors: 'getError'
		})
	},
	methods: {
		...mapActions({
			clearValidationErrors: 'clearValidationErrors',
			clearMessage: 'clearMessage',
			clearErrors: 'clearErrors'
		}),
		resetLoading(){
			this.clearValidationErrors()
			this.clearMessage()
			this.clearErrors()
		}
	}
}
</script>