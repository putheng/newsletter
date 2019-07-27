<template>
	<div class="form-group" :class="{'d-none':inputType == 'hidden' }">
		<label v-if="label" :for="id" class="col-form-label">{{ label }}</label>
		<input
			:name="inputName"
			:type="inputType"
			v-bind="$attrs"
			:id="id"
			class="form-control"
			v-model="inputValue"
			@input="$emit('input', $event.target.value)"
			@keyup="clearValidation"
			:value="value"
			v-bind:class="{'is-invalid': validation[inputName]}"
		>
		<div class="invalid-feedback" v-if="validation[inputName]">
            <i class="fa fa-exclamation-circle fa-fw"></i>
            {{ validation[inputName] +'' }}
        </div>
	</div>
</template>

<script>
import { mapGetters } from 'vuex'
import store from '.../../vuex'

export default {
	props: {
		name: {
			required: true,
			type: String
		},
		type: {
			required: false,
			type: String,
			default: 'text'
		},
		label: {
			required: false,
			type: String
		},
		value: {
			required: false,
			default: ''
		}
	},
	data(){
		return {
			id: this.formtedInputName(),
			inputType: this.formtedInputType(),
			inputName: this.formtedInputName(),
			inputValue: this.value
		}
	},
	methods: {
		clearValidation(){
			this.$store.dispatch('clearValidateFor', this.inputName)
		},
		formtedInputType(){
			return this.type == 'email' ? 'text' : this.type
		},
		formtedInputName(){
			return this.name.replace(/\s+/g, '_').toLowerCase()
		}
	},
	computed: {
		...mapGetters({
			validation: 'getValidationErrors'
		})
	}
}
</script>