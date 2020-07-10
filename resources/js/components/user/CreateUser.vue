<template>
 
	<div v-if="showing" class="fixed inset-0 w-full h-screen flex items-center justify-center bg-semi-75">
		<div class="w-full max-w-2xl bg-white shadow-lg rounded-lg p-4">
			
			<div class="text-right flex justify-between items-center">
				<h1 class="font-semibold text-2xl text-gray-700">Create New User</h1>
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
					<span class="text-gray-700">Email</span>
					<input type="email" class="form-input bg-gray-100 border-gray-300 focus:border-indigo-400 focus:shadow-none focus:bg-white mt-2 block w-cust" 
					v-model="form.email">
				</label>
			</div>


			<div class="mt-8">
				<label class="block">
					<span class="text-gray-700">Password</span>
					<input type="password" class="form-input bg-gray-100 border-gray-300 focus:border-indigo-400 focus:shadow-none focus:bg-white mt-2 block w-cust"
					v-model="form.password">
				</label>
			</div>

			<div class="mt-8" v-if="hideHospital">
				<label class="block">
					<span class="text-gray-700">Hospital</span>
					<select class="form-input bg-gray-100 border-gray-300 focus:border-indigo-400 focus:shadow-none focus:bg-white mt-2 block w-cust" v-model="form.hospital_id">
						<option  v-for="hospital in hospitals" :value="hospital.id">
							{{ hospital.name }}
						</option>
					</select>
				</label>
			</div> 

			<div class="mt-8">
				<label class="block">
					<button class="bg-gray-700  py-1 px-2 h-10 w-32 rounded text-white hover:bg-gray-500" @click="sendUser()">Save</button>
				</label>
			</div> 
		</div>
	</div>

</template>


<script type="text/javascript">

import swal from 'sweetalert';
export default {

	props: { 
		showing: {
			required: true,
			type: Boolean
		},
		hideHospital: {
			
		}
	},

	data(){
		return{

			form:{
				name:'',
				email:'',
				password:'',
				hospital_id:''

			},
			errors:[],
			hospitals:[]

			
		}
	},

	mounted(){

     this.getHospitals()
	},

	methods:{

		sendUser(){
			axios.post('/users/',this.form).then((res)=>{
				if(res){
					swal({
					  title: "Successfully saved",
					  icon: "success",
					  button: "Ok",
					});

					this.form.name = " "
					this.form.email = " "
					this.form.password = " "
					this.hospital_id = " "

				    this.$emit('newUser',res.data.content)
					 
					this.close()
				}
			}).catch(err => {
				console.log(err)
			});
		},

			getHospitals(){
			axios.get('/hospitals/index').then((res) => {

				this.hospitals = res.data
				
			})
		},

		close() {
			this.$emit('close');
		},
		closeModal(){
			this.close()
		},

	
	}
}
</script>

