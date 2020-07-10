<template>

	<div>
		<button v-if="hasRoleSuperAdmin || hasRoleAdministrator" @click="openAddUser" class="bg-gray-700 mx-4  py-1 px-2 h-10 w-32 rounded text-white hover:bg-gray-500">Create User</button>


		<CreateUser v-if="hasRoleAdministrator || hasRoleSuperAdmin" :hideHospital="hasRoleSuperAdmin" :showing="openCreateUser" @close="openCreateUser = false" @newUser="addToUsers"></CreateUser>


		<EditUser v-if="hasRoleAdministrator || hasRoleSuperAdmin" :hideHospital="hasRoleSuperAdmin"  :showingEditModal="openEditUser" @close="openEditUser = false" @editEvent="reciveEventEdit"></EditUser>


		<table class="text-left m-4" style="border-collapse:collapse">
			<thead>
				<tr>
					<th class="py-4 px-6 bg-gray-200 font-sans font-medium uppercase text-sm text-grey border-b border-200">Name</th>
	 				<th class="py-4 px-6 bg-gray-200 font-sans font-medium uppercase text-sm text-grey border-b border-200">Email</th>
					<th class="py-4 px-6 bg-gray-200 font-sans font-medium uppercase text-sm text-grey border-b border-200">Control</th>
				</tr>
			</thead>
			<tbody>
				<tr class="hover:bg-blue-100" v-for="(user,index) in users">
					<td class="py-4 px-6 border-b border-gray-100 text-center">{{ user.name }}</td>
					<td class="py-4 px-6 border-b border-gray-100 text-center">{{ user.email }}</td>
					<td class="py-4 px-6 border-b border-gray-100 text-center">
						<button v-if="hasRoleSuperAdmin || hasRoleAdministrator" class="py-1 px-2 w-24 rounded bg-blue-400" @click="openChangeUser(index)">Edit</button>
						<button class="py-1 px-2 w-24 rounded bg-red-400">Delete</button>
					</td>
					<td class="py-4 px-6 border-b border-gray-100 text-center">
                     <a v-if="hasRoleAdministrator || hasRoleSuperAdmin" :href="'/give/'+'role/'+user.id" class="bg-gray-900 text-white px-4 py-2 rounded">Give Role</a>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</template>

<script type="text/javascript">

import CreateUser from './CreateUser'
import EditUser from './EditUser'
export default{

	components:{
        
        CreateUser,
        EditUser

	},
	props:['hasRoleAdministrator','hasRoleDoctor','hasRoleSuperAdmin'],

	data(){
		return {

			users : [],
			openCreateUser:false,
			openEditUser:false,
			roles:[],
		}
	},

	mounted(){
    
    this.getAssets()
    
    	
	},



	methods:{
		getAssets(){
			axios.get('/users').then((res) => {

				this.users = res.data
				
			})
		},

		openAddUser(){

			this.openCreateUser = !this.openCreateUser
		},

       openChangeUser(index){

       	this.$children[1].form = this.users[index]
    
       	this.openEditUser = !this.openEditUser
       },


       addToUsers(value){
        this.users.push(value)
       },

       reciveEventEdit(value){
       	  this.users.push(value)
       	  // console.log(value.name)
       },
       
       //  checkRoleDoctors(){

       // 	axios.get('/hasRoleDoctor').then((res)=>{

       //      this.hasRoleDoctor = res.data
       // 	});
       // },

       // checkRoleAdministrator(){

       // 	axios.get('/hasRoleAdministrator').then((res)=>{

       //      this.hasRoleAdministrator = res.data
       //      console.log(this.hasRoleAdministrator)
       // 	});
       // }
	}

}
</script>