@extends('layouts.app')

@section('content')

<Users has-role-doctor="{{ auth()->user()->hasRole('doctors') }}" has-role-administrator="{{ auth()->user()->hasRole('administrator') }}"
	has-role-super-admin="{{ auth()->user()->hasRole('super admin') }}"></Users>

@endsection