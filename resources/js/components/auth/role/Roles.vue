<template>
	<div>
		<button class="bg-gray-700 mx-4  py-1 px-2 h-10 w-32 rounded text-white hover:bg-gray-500" @click="openCreateRole">Create Role</button>
		<CreateRole :showing="createRole" @close="createRole = false"></CreateRole>
		<EditRole :showing="editRole" @close="editRole = false"></EditRole>

		<table class="mt-8">
			<thead>
				<tr>
					<th class="py-4 px-2 border">Name</th>
					<th class="py-4 px-2 border">Display name</th>
					<th class="py-4 px-2 border">Control</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(role,index) in roles">
					<td class="py-4 px-2 border">{{ role.name }}</td>
					<td class="py-4 px-2 border">{{ role.display_name }}</td>
					<td class="py-4 px-2 border">
						<button class="bg-gray-700 text-white px-4 py-1 rounded" @click="openEditRole(index)">Edit</button>
					</td>

					<td class="py-4 px-2 border">
						<a :href="'/give/'+'permission/'+role.id" class="bg-gray-900 text-white px-4 py-2 rounded">Give Permissions</a>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	
</template>


<script type="text/javascript">
	import CreateRole from './CreateRole'
	import EditRole from './EditRole'

	export default{
		components:{
			CreateRole,
			EditRole,
		},

		data(){
			return {

				createRole:false,
				editRole:false,
				roles:[]
			}
		},

		mounted(){

			this.getRoles()
		},

		methods:{

			openCreateRole(){

				this.createRole = !this.createRole
			},

			openEditRole(index){

				this.editRole = !this.editRole
				this.$children[1].form = this.roles[index]
			},


            getRoles(){

            	axios.get('/roles/index').then((res)=>{
            		this.roles = res.data
            		 console.log(this.roles)
            	})
            }

		}
	}
</script>