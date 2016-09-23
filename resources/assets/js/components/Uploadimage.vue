<template>
	<div>
		<img :src="src" >
		<input type="hidden" name="images[]" :value="image.id">
		<button type="button" class="button expanded alert" @click="deleteImage">Delete</button>
	</div>
</template>


<script>
	export default {
		props: {
			image: Object,
		},
		data: function() {
			return {
				src: '',
			}
		},
		methods: {
			deleteImage: function()
			{
				var image = this.image;
				this.$http.delete('/image/delete', {body: image}).then(res => {
					this.$dispatch('deletedImage', image);	
				});

			}
		},
		ready: function() {
			var image = this.image;
			this.src = image.base_url + '/w_254/'+ image.public_id;
			console.log(this.src);
		}
	}
</script>