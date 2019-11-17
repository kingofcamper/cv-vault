/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
/** import Vue from 'vue'
import Vuelidate from 'vuelidate'
Vue.use(Vuelidate)
 import { ValidationObserver } from "vee-validate";
import { ValidationProvider, extend } from 'vee-validate';
import * as rules from 'vee-validate/dist/rules';
import fr from 'vee-validate/dist/locale/fr';


// loop over all rules
for (let rule in rules) {
  extend(rule, {
    ...rules[rule], // add the rule
    message: fr.messages[rule] // add its message
  });
}
*/
 
require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

        

Vue.component('bilel', require('./components/bilel.vue').default);
    
        
 
	var app = new Vue({
    el :'#app',
    data:{
    	experiences: [],
        formations: [],
        competences: [],
        projets: [],
        open: {
            experience:false,
            formation:false, 
            competence:false,
            projet:false,
        },
        experience :{
            id: 0,
            cv_id: window.Laravel.idExperience,
            titre: '',
            body: '' ,
            debut: '',
            fin: ''
        },
        formation :{
            id: 0,
            cv_id: window.Laravel.idExperience,
            titre: '',
            body: '' ,
            debut: '',
            fin: ''
        },
        competence :{
            id: 0,
            cv_id: window.Laravel.idExperience,
            titre: '',
            description: '',  
        },
        projet :{
            id: 0,
            cv_id: window.Laravel.idExperience,
            titre: '',
            description: '',
            lien: '',
            image :'',
        },
        edit: {
            experience:false,
            formation:false, 
            competence:false,
            projet:false,
        }
    },


    methods:{
    	getData: function(){
    		axios.get(window.Laravel.url+'/getdata/'+window.Laravel.idExperience)
    		.then(response => {
                console.log(response.data)
    			      this.experiences=response.data.experiences;
                this.formations=response.data.formations;
                this.competences=response.data.competences;
                this.projets=response.data.projets;
    		})
    		.catch(error =>{
    			console.log('error :', error);
    		})
    		},

        addExperience: function(){
        axios.post(window.Laravel.url+'/addexperience',this.experience)
            .then(response => {
                if(response.data.etat){
                    this.open.experience=false;
                    this.experience.id=response.data.id;
                    this.experiences.unshift(this.experience);

                    this.experience={
                        id: 0,
                        cv_id: window.Laravel.idExperience,
                        titre: '',
                        body: '' ,
                        debut: '',
                        fin: ''
                    }
                }
            })
            .catch(error =>{
                console.log('error :', error);
            })
            },
        editExperience: function(experience){
            this.open.experience=true;
            this.edit.experience=true;
            this.experience=experience;
        },
        updateExperience: function(){
            axios.put(window.Laravel.url+'/updateexperience',this.experience)
            .then(response => {
                if(response.data.etat){
                    this.open.experience=false;
                    this.experience={
                        id: 0,
                        cv_id: window.Laravel.idExperience,
                        titre: '',
                        body: '' ,
                        debut: '',
                        fin: ''
                    }
                }
                this.edit=false;
            })
            .catch(error =>{
                console.log('error :', error);
            })
        },
        deleteExperience :function(experience){
            const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: 'Etes vous sure?',
  text: "De supprimer cette experience!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'oui, supprimé!',
  cancelButtonText: 'No, cancel!',
  reverseButtons: true
}).then((result) => {
  if (result.value) {
    axios.delete(window.Laravel.url+'/deleteexperience/'+experience.id)
            .then(response => {
                if(response.data.etat){
        
                    var position=this.experiences.indexOf(experience);
                    this.experiences.splice(position,1);
        
                }
                
            })
            .catch(error =>{
                console.log('error :', error);
            })
    swalWithBootstrapButtons.fire(
      'Supprimé!',
      'Votre experience a étè supprimé.',
      'success'
    )
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelled',
      'Your imaginary file is safe :)',
      'error'
    )
  }
})

             
        },
    	
        addFormation: function(){
        axios.post(window.Laravel.url+'/addformation',this.formation)
            .then(response => {
                if(response.data.etat){
                    this.open.formation=false;
                    this.formation.id=response.data.id;
                    this.formations.unshift(this.formation);

                    this.formation={
                        id: 0,
                        cv_id: window.Laravel.idExperience,
                        titre: '',
                        body: '' ,
                        debut: '',
                        fin: ''
                    }
                }
            })
            .catch(error =>{
                console.log('error :', error);
            })
            },
            editFormation: function(formation){
            this.open.formation=true;
            this.edit.formation=true;
            this.formation=formation;
        },
             updateFormation: function(){
            axios.put(window.Laravel.url+'/updateformation',this.formation)
            .then(response => {
                if(response.data.etat){
                    this.open.formation=false;
                    this.formation={
                        id: 0,
                        cv_id: window.Laravel.Experience,
                        titre: '',
                        body: '' ,
                        debut: '',
                        fin: ''
                    }
                }
                this.edit=false;
            })
            .catch(error =>{
                console.log('error :', error);
            })
        },
        deleteFormation :function(formation){
            const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: 'Etes vous sure?',
  text: "De supprimer cette formation!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'oui, supprimé!',
  cancelButtonText: 'No, cancel!',
  reverseButtons: true
}).then((result) => {
  if (result.value) {
    axios.delete(window.Laravel.url+'/deleteformation/'+formation.id)
            .then(response => {
                if(response.data.etat){
        
                    var position=this.formations.indexOf(formation);
                    this.formations.splice(position,1);
        
                }
                
            })
            .catch(error =>{
                console.log('error :', error);
            })
    swalWithBootstrapButtons.fire(
      'Supprimé!',
      'Votre formation a étè supprimé.',
      'success'
    )
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelled',
      'Your imaginary file is safe :)',
      'error'
    )
  }
})

             
        },
addCompetence: function(){
        axios.post(window.Laravel.url+'/addcompetence',this.competence)
            .then(response => {
                if(response.data.etat){
                    this.open.competence=false;
                    this.competence.id=response.data.id;
                    this.competences.unshift(this.competence);

                    this.competence={
                        id: 0,
                        cv_id: window.Laravel.idExperience,
                        titre: '',
                        description: '' 
                    }
                }
            })
            .catch(error =>{
                console.log('error :', error);
            })
            },
            editCompetence: function(competence){
            this.open.competence=true;
            this.edit.competence=true;
            this.competence=competence;
        },
             updateCompetence: function(){
            axios.put(window.Laravel.url+'/updatecompetence',this.competence)
            .then(response => {
                if(response.data.etat){
                    this.open.competence=false;
                    this.competence={
                        id: 0,
                        cv_id: window.Laravel.idExperience,
                        titre: '',
                        body: '' ,
                        debut: '',
                        fin: ''
                    }
                }
                this.edit=false;
            })
            .catch(error =>{
                console.log('error :', error);
            })
        },
        deleteCompetence :function(competence){
            const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: 'Etes vous sure?',
  text: "De supprimer cette competence!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'oui, supprimé!',
  cancelButtonText: 'No, cancel!',
  reverseButtons: true
}).then((result) => {
  if (result.value) {
    axios.delete(window.Laravel.url+'/deletecompetence/'+competence.id)
            .then(response => {
                if(response.data.etat){
        
                    var position=this.competences.indexOf(competence);
                    this.competences.splice(position,1);
        
                }
                
            })
            .catch(error =>{
                console.log('error :', error);
            })
    swalWithBootstrapButtons.fire(
      'Supprimé!',
      'Votre competence a étè supprimé.',
      'success'
    )
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelled',
      'Your imaginary file is safe :)',
      'error'
    )
  }
})

             
        },
addProjet: function(){
        axios.post(window.Laravel.url+'/addprojet',this.projet)
            .then(response => {
                if(response.data.etat){
                    this.open.projet=false;
                    this.projet.id=response.data.id;
                    this.projets.unshift(this.projet);

                    this.projet={
                        id: 0,
                        cv_id: window.Laravel.idExperience,
                        titre: '',
                        description : '' ,
                        lien: '',
                        image: ''
                    }
                }
            })
            .catch(error =>{
                console.log('error :', error);
            })
            },
            editProjet: function(projet){
            this.open.projet=true;
            this.edit.projet=true;
            this.projet=projet;
        },
             updateProjet: function(){
            axios.put(window.Laravel.url+'/updateprojet',this.projet)
            .then(response => {
                if(response.data.etat){
                    this.open.projet=false;
                    this.projet={
                        id: 0,
                        cv_id: window.Laravel.idExperience,
                        titre: '',
                        body: '' ,
                        debut: '',
                        fin: ''
                    }
                }
                this.edit=false;
            })
            .catch(error =>{
                console.log('error :', error);
            })
        },
        deleteProjet :function(projet){
            const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: 'Etes vous sure?',
  text: "De supprimer cette projet!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'oui, supprimé!',
  cancelButtonText: 'No, cancel!',
  reverseButtons: true
}).then((result) => {
  if (result.value) {
    axios.delete(window.Laravel.url+'/deleteprojet/'+projet.id)
            .then(response => {
                if(response.data.etat){
        
                    var position=this.projets.indexOf(projet);
                    this.projets.splice(position,1);
        
                }
                
            })
            .catch(error =>{
                console.log('error :', error);
            })
    swalWithBootstrapButtons.fire(
      'Supprimé!',
      'Votre projet a étè supprimé.',
      'success'
    )
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelled',
      'Your imaginary file is safe :)',
      'error'
    )
  }
})

             
        }
    },

    mounted:function(){
  		this.getData();
    }
});


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

