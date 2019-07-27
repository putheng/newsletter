<template>
	<div class="form-group">
		<label :for="id" class="d-flex justify-content-between">
			<span>{{ label }}</span>
			<span :class="{'text-danger': maxAlert, 'text-muted': !maxAlert}" v-if="max" v-model="textLength">{{ textLength }} of {{ max }} characters used</span>
		</label>
		<textarea 
			class="form-control"
			:id="id"
			rows="3"
			:name="inputName"
			v-bind="$attrs"
			@input="$emit('input', $event.target.value)"
			@keyup="clearValidation"
			v-model="inputValue"
			v-bind:class="{'is-invalid': validation[inputName]}"
			:rows="rows"
		></textarea>
		<div class="invalid-feedback">
            <i class="fa fa-exclamation-circle fa-fw"></i>
            {{ validation[inputName] +'' }}
        </div>
	</div>
</template>

<script>
import { mapGetters } from 'vuex'
import store from '.../../vuex'

export default{
	props: {
		name: {
			required: true,
			type: String
		},
		max: {
			required: false,
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
			textLength: 0,
			id: this.formtedInputName(),
			inputType: this.formtedInputType(),
			inputName: this.formtedInputName(),
			inputValue: this.value,
			maxAlert: false
		}
	},
	methods: {
		clearValidation(){
			this.textLength = this.inputValue.length

			if(this.textLength > this.max){
				this.inputValue = this.inputValue.substring(0, this.max)
				this.maxAlert = true
			}else{
				this.maxAlert = false
			}

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
		}),
		rows(){
			if(this.value){
				return Math.max(4, this.inputValue.split("\n").length)
			}
			return 4
		}
	}
}
</script>