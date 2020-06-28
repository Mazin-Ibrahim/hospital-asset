@extends('layouts.app')

@section('content')
 
 <div class="flex items-center justify-between">
 	<div>
 	 <h1 class="text-lg font-bold text-gray-800">Asset Name</h1>
 	<span class="my-2 mx-16 text-sm font-semibold">{{ $transaction->asset->name }}</span>
 	</div>
 	<div>
 		<span class="font-semibold text-sm">In Stack {{ $transaction->asset->stock }}</span>
 		<a class="py-1 px-4 rounded bg-gray-300 font-semibold" href="{{ route('assets.create') }}" class="mx-8">Back</a>
 	</div>
 </div>

 <div class="mt-16">
 	<h1 class="text-2xl font-bold text-gray-800">Transactions</h1>
 </div>

 <div class=" p-4 mt-4">
    <table>
    	<thead>
    		<tr>
    			<th class="px-8 py-2 border">By any user</th>
    			<th class="px-8 py-2 border">Quantity</th>
    			<th class="px-8 py-2 border">Operation Type</th>
    			<th class="px-8 py-2 border">Date</th>
    		</tr>

    		
    			@foreach($transactions as $tran)
    			 <tr>
    			  <td class="px-8 py-2 border">{{ $tran->user->name }}</td>
    			  <td class="px-8 py-2 border">{{ $tran->quantity }}</td>
    			  <td class="px-8 py-2 border">{{ $tran->operation() }}</td>
    			  <td class="px-8 py-2 border">{{ $tran->date }}</td>
    			  </tr>
    			@endforeach
    		
    	</thead>
    </table>
 </div>

@endsection