<template>
<div class="card">
	<div class="card-body">
		<h3 class="card-title">Create News</h3>

		<form @submit.prevent="submit" class="col-md-8">
			<app-input name="title" label="Title" v-model="title"/>

			<app-text max="1000" name="description" label="Description" v-model="description"/>

			<div class="form-group">
				<template v-if="show">
					<img class="img-fluid" id="imagePreview">
					<div><a href="#" @click.prevent="removeImage">Change</a></div>
				</template>
				
				<template v-else>
					<label for="tf3" class="form-control-label" >Feature image</label>
					<div class="custom-file">
						<input 
							@change="change"
							type="file"
							class="custom-file-input"
							id="tf3"
							accept="image/*"
							:class="{'is-invalid': validation.image}"
						/>
						<label class="custom-file-label" for="tf3">Choose an image</label>
						<div class="invalid-feedback" v-if="validation.image">
							<i class="fa fa-exclamation-circle fa-fw"></i>
							{{ validation.image[0] }}
						</div>
					</div>
				</template>
			</div>

			<app-button type="submit">Ceate</app-button>
		</form>
	</div>
</div>
</template>

<script>
	import { mapGetters, mapActions } from 'vuex'

	export default {
		data(){
			return {
				show: false,
				error: false,
				errorMessage: '',
				title: '',
				description: '',
				image: '',
			}
		},
		methods: {
			submit(){
				this.$store.commit('setLoading')

				let form = new FormData()
				form.append('title',this.title)
				form.append('description', this.description)
				form.append('image', this.image)

				axios.post('/api/admin/news/create', form).then((response) => {
					this.$store.commit('admin/setNews', response.data.data)

					this.$router.replace('/admin')
				}).catch((error) => {
					
				})
			},
			change(e) {
				let imageFile = e.target.files[0]

				if (!imageFile.type.match('image.*')) {
					this.error = true
					this.errorMessage = 'Please choose a valid image file'
				}else{
					this.show = true
					this.image = e.target.files[0]

				    let reader = new FileReader()

			        reader.onload = function(e) {
			            $('#imagePreview').attr('src', e.target.result)
			        }

			        reader.readAsDataURL(e.target.files[0])
				}
			},
			removeImage(){
				this.show = false
				this.image = null
			}
		},
		computed: {
			...mapGetters({
				validation: 'getValidationErrors'
			})
		}
	}
</script>
