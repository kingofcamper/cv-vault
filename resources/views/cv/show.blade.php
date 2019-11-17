@extends('layouts.app')
@section('content')
<div class="container" id="app">
	<div class="row">
		<div class="col-md-12">
			<div class="card border-success">
				<div class="card-header">
					<div class="row">
						<div class="col-md-10">
							<h3 class="card-title">Experience</h3>
						</div>
						<div class="col-md-2">
							<button class="btn btn-success float-right" @click="open.experience=true">Ajouter</button>
						</div>
						
					</div>
				</div>
				<div class="card-body">
					<div v-if="open.experience">
						
						<div class="form-group">
							<label for="">Titre</label>
							<input name="titre" type="text" class="form-control" placeholder="le titre" v-model="experience.titre">
						</div>
						<div class="form-group">
							<label for="">Body</label>
							<textarea class="form-control" placeholder="le contenu" v-model="experience.body"></textarea>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Date debut</label>
									<input type="date" class="form-control" placeholder="Debut" v-model="experience.debut">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Date fin</label>
									<input type="date" class="form-control" placeholder="Fin" v-model="experience.fin">
								</div>
							</div>
						</div>
						<button v-if ="edit.experience" class="btn btn-danger btn-block" @click="updateExperience">modifier</button>
						<button v-else class="btn btn-info btn-block" @click="addExperience">Ajouter</button>
					</div>
					<ul class="list-group">
						<li class="list-group-item" v-for="experience in experiences">
							<div class="float-right">
								<button class="btn btn-warning btn-sm" @click="editExperience(experience)">Editer</button>
								<button class="btn btn-danger btn-sm" @click="deleteExperience(experience)">supprimer</button>
							</div>
							<h3 v-text=experience.titre></h3>
							<p v-text=experience.body></p>
							<small v-text=experience.debut></small>
							<small v-text=experience.fin></small>
						</li>
						
					</ul>
				</div>
			</div>
		</div>
	</div>
	
	<div class="card border-success mt-5">
		<div class="card-header">
			<div class="row">
				<div class="col-md-10">
					<h3 class="card-title">Formation</h3>
				</div>
				<div class="col-md-2">
					<button class="btn btn-success float-right" @click="open.formation=true">Ajouter</button>
				</div>
			</div>
		</div>
		<div class="card-body">
			
			<div v-if="open.formation">
				<div class="form-group">
					<label for="">Titre</label>
					<input type="text" class="form-control" placeholder="le titre" v-model="formation.titre">
				</div>
				<div class="form-group">
					<label for="">Body</label>
					<textarea class="form-control" placeholder="le contenu" v-model="formation.body"></textarea>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Date debut</label>
							<input type="date" class="form-control" placeholder="Debut" v-model="formation.debut">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Date fin</label>
							<input type="date" class="form-control" placeholder="Fin" v-model="formation.fin">
						</div>
					</div>
				</div>
				<button v-if ="edit.formation" class="btn btn-danger btn-block" @click="updateFormation">modifier</button>
				<button v-else class="btn btn-info btn-block" @click="addFormation">Ajouter</button>
			</div>
			<ul class="list-group">
				<li class="list-group-item" v-for="formation in formations">
					<div class="float-right">
						<button class="btn btn-warning btn-sm" @click="editFormation(formation)">Editer</button>
						<button class="btn btn-danger btn-sm" @click="deleteFormation(formation)">supprimer</button>
					</div>
					<h3 v-text=formation.titre></h3>
					<p v-text=formation.body></p>
					<small v-text=formation.debut></small>
					<small v-text=formation.fin></small>
				</li>
			</ul>
		</div>
	</div>
	
	<div class="card border-success mt-5">
		<div class="card-header">
			<div class="row">
				<div class="col-md-10">
					<h3 class="card-title">Competence</h3>
				</div>
				<div class="col-md-2">
					<button class="btn btn-success float-right" @click="open.competence=true">Ajouter</button>
				</div>
			</div>
		</div>
		<div class="card-body">
			
			<div v-if="open.competence">
				<div class="form-group">
					<label for="">Titre</label>
					<input type="text" class="form-control" placeholder="le titre" v-model="competence.titre">
				</div>
				<div class="form-group">
					<label for="">Description</label>
					<textarea class="form-control" placeholder="le contenu" v-model="competence.description"></textarea>
				</div>
				<button v-if ="edit.competence" class="btn btn-danger btn-block" @click="updateCompetence">modifier</button>
				<button v-else class="btn btn-info btn-block" @click="addCompetence">Ajouter</button>
			</div>
			<ul class="list-group">
				<li class="list-group-item" v-for="competence in competences">
					<div class="float-right">
						<button class="btn btn-warning btn-sm" @click="editCompetence(competence)">Editer</button>
						<button class="btn btn-danger btn-sm" @click="deleteCompetence(competence)">supprimer</button>
					</div>
					<h3 v-text=competence.titre></h3>
					<p v-text=competence.description></p>
				</li>
			</ul>
		</div>
	</div>
	
	<div class="card border-success  mt-5">
		<div class="card-header">
			<div class="row">
				<div class="col-md-10">
					<h3 class="card-title">Projet</h3>
				</div>
				<div class="col-md-2">
					<button class="btn btn-success float-right" @click="open.projet=true">Ajouter</button>
				</div>
			</div>
		</div>
		<div class="card-body">
			
			<div v-if="open.projet">
				<div class="form-group">
					<label for="">Titre</label>
					<input type="text" class="form-control" placeholder="le titre" v-model="projet.titre">
				</div>
				<div class="form-group">
					<label for="">description</label>
					<textarea class="form-control" placeholder="le contenu" v-model="projet.description"></textarea>
				</div>
				<div class="form-group">
					<label for="">Lien</label>
					<textarea name="lien" placeholder="Lien" class="form-control" v-model="projet.lien"></textarea>
				</div>
				<div class="form-group">
					<label for="">image</label>
					<input type="file" class="form-control" name="photo">
				</div>
				<button v-if ="edit.projet" class="btn btn-danger btn-block" @click="updateProjet">modifier</button>
				<button v-else class="btn btn-info btn-block" @click="addProjet">Ajouter</button>
			</div>
			<ul class="list-group">
				<li class="list-group-item" v-for="projet in projets">
					<div class="float-right">
						<button class="btn btn-warning btn-sm" @click="editProjet(projet)">Editer</button>
						<button class="btn btn-danger btn-sm" @click="deleteProjet(projet)">supprimer</button>
					</div>
					<h3 v-text=projet.titre></h3>
					<p v-text=projet.description></p>
					<small><a :href="projet.lien" v-text="projet.lien"></a></small>
				</li>
			</ul>
		</div>
	</div>
	
</div>
@endsection
@section('javascript')
<script type="text/javascript">
	window.Laravel = {!!json_encode([
		'csrfToken' => csrf_token(),
		'idExperience'  => $id,
		'url'           => url('/')
		]); !!}
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<bilel/>

@endsection