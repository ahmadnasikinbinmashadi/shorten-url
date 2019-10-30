@extends('backend::layouts.master')

@section('title', 'Unauthorized')

@section('content')
    <div class="error-page">
        <h2 class="headline text-red">403</h2>

	    <div class="error-content">
	        <h3><i class="fa fa-warning text-yellow"></i>Sorry, you are forbidden from accessing this page.</h3>
	    </div>
    </div>
@endsection