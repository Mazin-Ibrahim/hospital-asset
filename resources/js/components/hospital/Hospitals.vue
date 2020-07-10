<template>

	<div>
		<button v-if="hasRoleAdministrator || hasRoleSuperAdmin" @click="openAddHospital" class="bg-gray-700 mx-4 py-2 px-4 rounded text-white hover:bg-gray-500">Create Hospital</button>

		<CreateHospital :showing="openCreateHospital" @close="openCreateHospital = false" @newHospitail="addToHospitail"></CreateHospital>
		<EditHospital  :showingEditModal="openEditHospital" @close="openEditHospital = false" @editEvent="reciveEventEdit"></EditHospital>
		<table class="text-left m-4" style="border-collapse:collapse">
			<thead>
				<tr>
					<th class="py-4 px-6 bg-gray-200 font-sans font-medium uppercase text-sm text-grey border-b border-200">Name</th>
	 				<th class="py-4 px-6 bg-gray-200 font-sans font-medium uppercase text-sm text-grey border-b border-200">Location</th>
					<th class="py-4 px-6 bg-gray-200 font-sans font-medium uppercase text-sm text-grey border-b border-200">Control</th>
				</tr>
			</thead>
			<tbody>
				<tr class="hover:bg-blue-100" v-for="(hospital,index) in hospitals">
					<td class="py-4 px-6 border-b border-gray-100 text-center">{{ hospital.name }}</td>
					<td class="py-4 px-6 border-b border-gray-100 text-center">{{ hospital.location }}</td>
					<td class="py-4 px-6 border-b border-gray-100 text-center">
						<button class="py-1 px-2 w-24 rounded bg-blue-400" @click="openChangeHospital(index)">Edit</button>
					
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</template>

<script type="text/javascript">

import CreateHospital from './CreateHospital'
import EditHospital from './EditHospital'
export default{

	components:{
        
        CreateHospital,
        EditHospital

	},
	props:['hasRoleAdministrator','hasRoleDoctor','hasRoleSuperAdmin'],

	data(){
		return {

			hospitals : [],
			openCreateHospital:false,
			openEditHospital:false,
			
		}
	},

	mounted(){
    
    this.getHospitals()
    
    	
	},



	methods:{
		getHospitals(){
			axios.get('/hospitals/index').then((res) => {

				this.hospitals = res.data
				
			})
		},

		openAddHospital(){

			this.openCreateHospital = !this.openCreateHospital
		},

       openChangeHospital(index){

       	this.$children[1].form = this.hospitals[index]
    
       	this.openEditHospital = !this.openEditHospital
       },


       addToHospitail(value){
        this.hospitals.push(value)
       },

       reciveEventEdit(value){
       	  this.hospitals.push(value)
       	  // console.log(value.name)
       },
       
     
	}

}
</script>