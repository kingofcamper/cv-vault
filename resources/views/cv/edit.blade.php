@extends('layouts.app')



@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				
				<form action="{{url('cvs/'.$cv->id)}}" method="post" enctype="multipart/form-data">
					<input type="hidden" name="_method" value="PUT">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="">Titre</label>
						<input type="text" name="titre" class="form-control @if($errors->get('titre')) is-invalid @endif" value="{{$cv->titre}}">
						@if($errors->get('titre'))
							@foreach($errors->get('titre') as $message)
								<li>{{$message}}</li>
							@endforeach
						@endif
					</div>
					<div class="form-group">
						<label for="">Presentation</label>
						<textarea name="presentation" class="form-control @if($errors->get('presentation')) is-invalid @endif">{{$cv->presentation}}</textarea>
						@if($errors->get('presentation'))
							@foreach($errors->get('presentation') as $message)
								<li>{{$message}}</li>
							@endforeach
						@endif
					</div>
					<div class="form-group">
						<label for="">image</label>
						<input type="file" class="form-control" name="photo">
					</div>
					<div class="form-group">
						<input type="submit" class="form-control btn btn-danger" value="Modifier">
					</div>
				</form>

			</div>
		</div>
	</div>

@endsection