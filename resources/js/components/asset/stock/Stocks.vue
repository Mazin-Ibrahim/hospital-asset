<template>
 
	<div v-if="showing" class="fixed inset-0 w-full h-screen flex items-center justify-center bg-semi-75">
		<div class="w-full max-w-2xl bg-white shadow-lg rounded-lg p-4">
			
			<div class="text-right flex justify-between items-center">
				<h1 class="font-semibold text-2xl text-gray-700">Stocks</h1>
				<button class="text-2xl" @click="closeModal">X</button>
			</div>
			
			<div class="mt-8">
				<label class="block">
					<span class="text-gray-700">Asset Name</span>
					  <div  class="form-input bg-gray-100 border-gray-300 focus:border-indigo-400 focus:shadow-none focus:bg-white mt-2 block w-cust h-16">{{ form.name }}</div>
				</label>
			</div>

			<div class="mt-8">
				<label class="block">
					<span class="text-gray-700">Quantity</span>
					<input type="number" class="form-input bg-gray-100 border-gray-300 focus:border-indigo-400 focus:shadow-none focus:bg-white mt-2 block w-cust" v-model="transaction.quantity">
				</label>
			</div>  

			<div class="mt-8">
				<label class="block">
					<span class="text-gray-700">Operation</span>
					 <select class="form-input bg-gray-100 border-gray-300 focus:border-indigo-400 focus:shadow-none focus:bg-white mt-2 block w-cust " v-model="transaction.operation">
					 	<option class="py-2 px-4 h-24" :value="1">ADD</option>
					 	<option class="py-2 px-4 h-24" :value="2">REMOVE</option>
					 </select>
				</label>
			</div> 

			<div class="mt-8">
				<label class="block">
					<span class="text-gray-700">Date</span>
					<input type="date" class="form-input bg-gray-100 border-gray-300 focus:border-indigo-400 focus:shadow-none focus:bg-white mt-2 block w-cust" v-model="transaction.date">
				</label>
			</div> 



			<div class="mt-8">
				<label class="block">
					<button class="bg-gray-700  py-1 px-2 h-10 w-32 rounded text-white hover:bg-gray-500" @click="sendStock()">Save</button>
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
		}
	},

	data(){
		return{

			transaction:{
				operation:'',
				date:'',
				quantity:0


			},
			errors:[],

			
		}
	},

	methods:{

		sendStock(){
			console.log(this.transaction)
			axios.post(`/transactions/${this.form.id}`,this.transaction).then((res)=>{
				if(res){
					swal({
					  title: "Successfully saved",
					  icon: "success",
					  button: "Ok",
					});
              

				    // this.$emit('newUser',res.data.content)
					 
					this.close()
				}

				// if(res.data.state == 600){
				// 	swal({
				// 	  title: "There are no asset",
				// 	  icon: "error",
				// 	  button: "Ok",
				// 	});
              

				    // this.$emit('newUser',res.data.content)
					 
				// 	this.close()
				// }
			}).catch(err => {
				console.log(err)
			});
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

