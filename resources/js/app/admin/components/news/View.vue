<template>
<div class="card">
	<div class="card-body">
		<h3 class="card-title">News</h3>
		<table class="table">
			<thead>
				<th>#</th>
				<th>Title</th>
				<th>Image</th>
				<th>Created</th>
				<th></th>
			</thead>
			<tbody>
				<template  v-if="news.length">
					<tr v-for="(item, key) in news" :key="key">
						<td>{{ item.id }}</td>
						<td>
							<a :href="'/news/'+ item.slug" target="_blank">{{ item.title }}</a>
						</td>
						<td>
							<img :src="item.image" width="100">
						</td>
						<td>{{ item.created_at }}</td>
						<td>
							<a href="#" class="btn btn-sm btn-icon btn-secondary"
								data-toggle="modal"
							:data-target="'#'+ convertToID(item.id)">
							<i class="far fa-trash-alt"></i>
							<span class="sr-only">Remove</span>
						</a>
						<app-modal 
							commit="admin/setNews"
							:data="{id:item.id}"
							:option="{ title: 'Delete', url: '/api/admin/news/delete'}"
							cancel="Close" :id="convertToID(item.id)" title="Delete news ?" >
							<h6>{{ item.title }}</h6>
						</app-modal>
						</td>
					</tr>
				</template>
				<template v-else>
					<tr>
						<td colspan="3">
							<p class="text-center">
								No news
								<router-link :to="{name:'admin-create'}">Create</router-link>
							</p>
						</td>
					</tr>
				</template>
			</tbody>
		</table>
	</div>
</div>
</template>

<script>
	import { mapGetters, mapActions } from 'vuex'

	export default {
		methods: {
			...mapActions({
				fetch: 'admin/fetchNews'
			}),
			convertToID(text){
			    return 'ab'+ text + 'ab'
			}
		},
		computed: {
			...mapGetters({
				news: 'admin/getNews'
			})
		},
		mounted(){
			this.fetch()
		}
	}
</script>
