@extends('layouts.app')

@section('content')


	<Hospitals  has-role-doctor="{{ auth()->user()->hasRole('doctors') }}" has-role-administrator="{{ auth()->user()->hasRole('administrator') }}" has-role-super-admin="{{ auth()->user()->hasRole('super admin') }}"></Hospitals>
     


  
</script>

@endsection


