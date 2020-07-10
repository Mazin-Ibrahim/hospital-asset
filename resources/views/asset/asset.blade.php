@extends('layouts.app')

@section('content')


	<Assets has-role-doctor="{{ auth()->user()->hasRole('doctors') }}" has-role-administrator="{{ auth()->user()->hasRole('administrator') }}"
		has-role-super-admin="{{ auth()->user()->hasRole('super admin') }}"></Assets>
     


  
</script>

@endsection


