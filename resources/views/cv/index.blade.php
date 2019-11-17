@extends('layouts.app')



@section('content')


<div class="container">
	<div class="row">
		<div class="col-md-12">

			
			<h1>La liste de mon cv</h1>
			<div class="float-right">
				<a href="{{url('cvs/create')}}" class="btn btn-success">Nouveau CV</a>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				@foreach($cvs as $cv)
				<div class="col-md-3 col-sm-4">
					<div class="img-thumbnail">
						<center>
						<img src="{{asset('storage/'.$cv->photo)}} " alt="" class="img-responsive" width="229px" height="150px">
						<div class="caption">
							<h3>{{$cv->titre}}</h3>	
							<hr>
							<a href="{{url('cvs/'.$cv->id)}} " class="btn btn-primary" role="button">Show</a>
							@can('update',$cv)
							<a href=" {{url('cvs/'.$cv->id.'/edit')}}" class="btn btn-warning" role="button">Editer</a>
							@endcan
							<form style="display:inline;" action="{{url('cvs/'.$cv->id)}}" method="post">
								{{csrf_field()}}
								{{method_field('DELETE')}}
								@can('delete',$cv)
								<button class="btn btn-danger" type="submit">Supprimer</button>
								@endcan
							</form>
							
						</div>
					</center>
					</div>
				</div>
				@endforeach
			</div>
			
		
@endsection