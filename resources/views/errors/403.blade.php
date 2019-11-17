@extends('layouts.app')


@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-2">
				<center>
					<h2>Cette page est non autoriser</h2>
					<hr>
					<a href="{{url('cvs')}}" class="btn btn-primary ">retour</a>
				</center>
			</div>
		</div>
	</div>

@endsection

