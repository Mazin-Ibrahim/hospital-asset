@extends('layouts.app')

@section('content')
 
 <div class="bg-gray-200 rounded-lg shadow-md p-6">
 	<div>
 		<h1 class="font-semibold text-2xl text-gray-700">Role</h1>
 	    <span>{{ $role->name }}</span>
 	</div>

 	<div class="mt-8">
 		<h1 class="font-semibold text-2xl text-gray-700">Permissions</h1>
 	    	<form action="{{ route('postGivePermission') }}" method="post">
 	    		@csrf
 	    		<input type="hidden" value="{{ $role->id }}" name="role_id">
 		         @foreach($permissions as $permission)
 	    <div class="flex items-center mt-4">
 	    		<input class="mx-4" type="checkbox" value="{{ $permission->id }}" name="check[]" {{$role->hasPermission($permission->name) ? 'checked' : ''}}><h1>{{ $permission->name }}</h1> 

 	    </div>
 	            @endforeach
 	    		<input type="submit" class="mx-4 mt-4 text-white bg-gray-700 font-medium rounded px-4 py-1" value="Give">
 	    	</form>
 	</div>
 </div>

@endsection