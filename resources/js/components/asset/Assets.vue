<template>

	<div>
		<button @click="openAddAsset" class="bg-gray-700 mx-4  py-1 px-2 h-10 w-32 rounded text-white hover:bg-gray-500">Create Asset</button>

		<CreateAsset :showing="openCreateAsset" @close="openCreateAsset = false" @newAsset="addToAsset"></CreateAsset>
		<EditAsset  :showingEditModal="openEditAsset" :assetValue="asset" @close="openEditAsset = false"></EditAsset>

		<Transactions :showing="openStocks" @close="openStocks = false"></Transactions>
		<table class="text-left m-4 " style="border-collapse:collapse">
			<thead>
				<tr>
					<th class= "px-8 py-2 border text-center">Name</th>
					<th class= "px-8 py-2 border text-center">Descrption</th>
					<th class= "px-8 py-2 border text-center">Current Stock</th>
					<th class= "px-8 py-2 border text-center">Danger lavel</th>
					<th class= "px-8 py-2 border text-center">Control</th>
					<th class= "px-8 py-2 border text-center">Stocks</th>
					<th class= "px-8 py-2 border text-center">Transactions</th>
				</tr>

			</thead>
			<tbody>
				<tr class="hover:bg-blue-100" v-for="(asset,index) in assets">
					<td class="px-8 py-1 border text-center">{{ asset.name }}</td>
					<td class="px-8 py-1 border text-center">{{ asset.descr }}</td>
					<td class="px-8 py-1 border text-center">{{ asset.stock }}</td>
					<td class="px-8 py-1 border text-center">{{ asset.danger_level }}</td>
					<td class="px-8 py-1 border">
						<button class="py-1 px-2 w-24 rounded bg-blue-400" @click="openChangeAsset(index)">Edit</button>
						<!-- <button class="py-1 px-2 w-24 rounded bg-red-400">Delete</button> -->
					</td>

					<td class="px-8 py-1 border">
						<button @click="openStock(index)" class="py-1 px-2 w-28 rounded bg-green-400">
							Add&Remove
						</button>
					</td>
					<td class="px-8 py-1 border">
						<a :href="'/show/'+'asset/'+ asset.id" class="py-1 px-2 w-24 rounded bg-yellow-700">View</a >

					</td>
				</tr>
			</tbody>
		</table>
	</div>
</template>

<script type="text/javascript">

import CreateAsset from './CreateAsset'
import EditAsset from './EditAsset'
import Transactions from './transaction/Transactions'
export default{

	components:{
        
        CreateAsset,
        EditAsset,
        Transactions,

	},

	data(){
		return {

			assets : [],
			openCreateAsset:false,
			openEditAsset:false,
			openStocks:false,
			asset:{}
		}
	},

	mounted(){
    
    this.getAssets()
		
	},

	// updated(){
 //      this.getAssets()
	// },

	methods:{
		getAssets(){
			axios.get('/assets').then((res) => {

				this.assets = res.data
				console.log(this.assets)
			})
		},

		openAddAsset(){

			this.openCreateAsset = !this.openCreateAsset
		},

       openChangeAsset(index){

       	this.$children[1].form = this.assets[index]
    
       	this.openEditAsset = !this.openEditAsset
       },

       openStock(index){

       	 this.$children[2].form = this.assets[index]
         this.openStocks = !this.openStocks
       },

       addToAsset(value){
        this.assets.push(value)

        // console.log(value)
       }
	}

}
</script>