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
