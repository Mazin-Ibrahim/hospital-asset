@extends('layouts.app')

@section('content')
 
 <div class="bg-gray-200 rounded-lg shadow-md p-6">
 	<div>
 		<h1 class="font-semibold text-2xl text-gray-700">User</h1>
 	    <span>{{ $user->name }}</span>
 	</div>

 	<div class="mt-8">
 		<h1 class="font-semibold text-2xl text-gray-700">Roles</h1>
 	    	<form action="{{ route('postGiveRole') }}" method="post">
 	    		@csrf
 	    		<input type="hidden" value="{{ $user->id }}" name="user_id">
 		         @foreach($roles as $role)
 	    <div class="flex items-center mt-4">
 	    		<input class="mx-4" type="checkbox" value="{{ $role->id }}" name="check[]" {{$user->hasRole($role->name) ? 'checked' : ''}}><h1>{{ $role->name }}</h1> 

 	    </div>
 	            @endforeach
 	    		<input type="submit" class="mx-4 mt-4 text-white bg-gray-700 font-medium rounded px-4 py-1" value="Give">
 	    	</form>
 	</div>
 </div>

@endsection