<template>
	<div>
		<input
			type="text"
			:value="value"
			@input="$emit('input', $event.target.value)"
			v-bind="$attrs"
		/>
	</div>
</template>

<script>
	export default {
		props: {
			value: {
				type: String,
			}
		},
	}
</script>