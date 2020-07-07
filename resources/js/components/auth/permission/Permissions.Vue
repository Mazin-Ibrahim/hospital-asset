<template>
	<div>
		<button class="bg-gray-700 mx-4  py-1 px-2 h-10 w-32 rounded text-white hover:bg-gray-500" @click="openCreatePermission">Create Perm</button>
		<CreatePermission :showing="createPermission" @close="createPermission = false"></CreatePermission>
		<EditPermission :showing="editPermission" @close="editPermission = false"></EditPermission>

		<table class="mt-8">
			<thead>
				<tr>
					<th class="py-4 px-2 border">Name</th>
					<th class="py-4 px-2 border">Display name</th>
					<th class="py-4 px-2 border">Control</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(permission,index) in permissions">
					<td class="py-4 px-2 border">{{ permission.name }}</td>
					<td class="py-4 px-2 border">{{ permission.display_name }}</td>
					<td class="py-4 px-2 border">
						<button class="bg-gray-700 text-white px-4 py-1 font-semibold" @click="openEditPermission(index)">Edit</button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	
</template>


<script type="text/javascript">
	import CreatePermission from './CreatePermission'
	import EditPermission from './EditPermission'


	export default{
		components:{
			CreatePermission,
			EditPermission
			
		},

		data(){
			return {

				createPermission:false,
				editPermission:false,
				permissions:[]
			}
		},

		mounted(){

			this.allPermission()
		},

		methods:{

			openCreatePermission(){

				this.createPermission = !this.createPermission
			},

			openEditPermission(index){

				this.editPermission = !this.editPermission
				this.$children[1].form = this.permissions[index]
			},


            allPermission(){

            	axios.get('/permissions/index').then((res)=>{
            		this.permissions = res.data
            	})
            }

		}
	}
</script>