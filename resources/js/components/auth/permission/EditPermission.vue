<template>
	 <div v-if="showing" class="fixed inset-0 w-full h-screen flex items-center justify-center bg-semi-75">
		<div class="w-full max-w-2xl bg-white shadow-lg rounded-lg p-4">
			
			<div class="text-right flex justify-between items-center">
				<h1 class="font-semibold text-2xl text-gray-700">Edit data</h1>
				<button class="text-2xl" @click="closeModal">X</button>
			</div>
			
			<div class="mt-8">
				<label class="block">
					<span class="text-gray-700">Name</span>
					<input type="text" class="form-input bg-gray-100 border-gray-300 focus:border-indigo-400 focus:shadow-none focus:bg-white mt-2 block w-cust" v-model="form.name">
				</label>
			</div> 

			<div class="mt-8">
				<label class="block">
					<span class="text-gray-700">Display name</span>
					<input type="text" class="form-input bg-gray-100 border-gray-300 focus:border-indigo-400 focus:shadow-none focus:bg-white mt-2 block w-cust" v-model="form.display_name">
				</label>
			</div>

			


			<div class="mt-8">
				<label class="block">
					<button class="bg-gray-700  py-1 px-2 h-10 w-32 rounded text-white hover:bg-gray-500" @click="editRole()">Edit</button>
				</label>
			</div> 
		</div>
	</div>
</template>

<script type="text/javascript">
   
    import swal from 'sweetalert';
	export default{
         
         props:['showing'],

         data(){

         	return{
         		form:{
         		}
         	}
         },

         methods:{

         	closeModal(){

             this.close()
         	},

         	close(){

         		this.$emit('close')
         	},

         	editRole(){

         		axios.post(`/permissions/update/${this.form.id}`,this.form).then((res) => {
                  if(res){

                  	swal({
					  title: "Successfully Edited",
					  icon: "success",
					  button: "Ok",
					});

					this.close()
                  }
         		})
         	}
         }

	}
</script>