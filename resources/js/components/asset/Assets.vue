<template>

	<div>
		<button @click="openAddAsset" class="bg-gray-700 mx-4  py-1 px-2 h-10 w-32 rounded text-white hover:bg-gray-500">Create Asset</button>

		<CreateAsset :showing="openCreateAsset" @close="openCreateAsset = false" @newAsset="addToAsset"></CreateAsset>
		<EditAsset  :showingEditModal="openEditAsset" :assetValue="asset" @close="openEditAsset = false"></EditAsset>

		<Stocks :showing="openStocks" @close="openStocks = false"></Stocks>
		<table class="text-left m-4 " style="border-collapse:collapse">
			<thead>
				<tr>
					<th class="py-4 px-6 bg-gray-200 font-sans font-medium uppercase text-sm text-grey border-b border-200">Name</th>
					<th class="py-4 px-6 bg-gray-200 font-sans font-medium uppercase text-sm text-grey border-b border-200">Descrption</th>
					<th class="py-4 px-6 bg-gray-200 font-sans font-medium uppercase text-sm text-grey border-b border-200">Current Stock</th>
					<th class="py-4 px-6 bg-gray-200 font-sans font-medium uppercase text-sm text-grey border-b border-200">Danger lavel</th>
					<th class="py-4 px-6 bg-gray-200 font-sans font-medium uppercase text-sm text-grey border-b border-200 text-center">Control</th>
					<th class="py-4 px-6 bg-gray-200 font-sans font-medium uppercase text-sm text-grey border-b border-200 text-center">Stocks</th>
				</tr>

			</thead>
			<tbody>
				<tr class="hover:bg-blue-100" v-for="(asset,index) in assets">
					<td class="py-4 px-6 border-b border-gray-100 text-center">{{ asset.name }}</td>
					<td class="py-4 px-6 border-b border-gray-100 text-center">{{ asset.descr }}</td>
					<td class="py-4 px-6 border-b border-gray-100 text-center">{{ asset.stock }}</td>
					<td class="py-4 px-6 border-b border-gray-100 text-center">{{ asset.danger_level }}</td>
					<td class="py-4 px-6 border-b border-gray-100 text-center flex items-center my-4">
						<button class="py-1 px-2 w-24 rounded bg-blue-400 mr-2" @click="openChangeAsset(index)">Edit</button>
						<button class="py-1 px-2 w-24 rounded bg-red-400">Delete</button>
					</td>

					<td class="py-4 px-6 border-b border-gray-100 text-center my-8">
						<button @click="openStock(index)" class="py-1 px-2 w-28 rounded bg-green-400">
							Add&Remove
						</button>
					</td>
					<td class="py-4 px-6 border-b border-gray-100 text-center">
						<a :href="'/trace/'+'asset/'+ asset.id" class="py-1 px-2 w-24 rounded bg-yellow-400">View</a >

					</td>
				</tr>
			</tbody>
		</table>
	</div>
</template>

<script type="text/javascript">

import CreateAsset from './CreateAsset'
import EditAsset from './EditAsset'
import Stocks from './stock/Stocks'
export default{

	components:{
        
        CreateAsset,
        EditAsset,
        Stocks,

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