<template>
	<div class="card">
		
	</div>

</template>

<script>

import { required,minLength, maxLength, between } from 'vuelidate/lib/validators'

export default{
	name: 'FormValidation',
	data(){
		return{
		titre: '',
		description: '',
		body: '',
		}
	},
	validations:{
		title: {
			required,
			maxLength: maxLength(20)
		},
		description: {
			required,
			maxLength: maxLength(255)
		},
		body: {
			required,
			maxLength: maxLength(255)
		},
	}
}

</script>


<style scoped>
</style>