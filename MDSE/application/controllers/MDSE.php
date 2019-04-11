<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MDSE extends CI_Controller {
	
		public function index(){
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->helper('html');
			$this->load->library('form_validation');
			$this->load->helper('form');
			$data['nom_vue'] = "v_accueil";
			$this->load->vars($data);
			$this->load->view('v_accueil');
		}
		
		public function menu_vue(){ // appelle de la vue de menu via la template 
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->helper('html');
			$this->load->library('form_validation');
			$this->load->helper('form');
			$data['nom_vue'] = "v_menu";
			$this->load->vars($data);
			$this->load->view('templates');
		}
		
		public function menu_statistique_vue(){ // appelle de la vue de choix de recherche statistique via la template 
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->helper('html');
			$this->load->library('form_validation');
			$this->load->helper('form');
			$data['nom_vue'] = "v_menu_statistique";
			$this->load->vars($data);
			$this->load->view('templates');
		}
		
		public function vue_formulaire_patient(){ // appelle de la vue avec le formulaire du patient via la template 
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->helper('html');
			$this->load->library('form_validation');
			$this->load->helper('form');
			$data['nom_vue'] = "v_formulaire_patient";
			$this->load->vars($data);
			$this->load->view('templates');
		}
		
		public function vue_help(){ // appelle de la vue avec le formulaire du patient via la template 
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->helper('html');
			$this->load->library('form_validation');
			$this->load->helper('form');
			$data['nom_vue'] = "v_help";
			$this->load->vars($data);
			$this->load->view('templates');
		}
		
		public function recherche_patient(){
			extract($_POST); 
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->helper('html');
			$this->load->library('form_validation');
			$this->load->helper('form');
			$this->load->model('Model_Request');
			
			$data['patientlist'] = $this->Model_Request->search_patient($num_secu,$nom,$prenom);
			if($data['patientlist']==NULL){
				$data['nom_vue'] = "v_formulaire_patient";
				$data['message'] = "There is no result for this request";
				$this->load->vars($data);
				$this->load->view('templates');
			}else{
				$data['nom_vue'] = "v_resultat_recherche_patient";
				$this->load->vars($data);
				$this->load->view('templates');
			}
		}
		
		
		public function search_stat() {
			if ($this->form_validation->run() == FALSE) {
				$data['title'] = 'Stats';
				$data['content'] = 'View_search_stat';
				$this->load->vars($data);
				$this->load->view('template');			
			} else {
				$this->load->model('Model_Request');
				$data['title'] = 'Requete';
				$data['content'] = 'View_search';
				//$data['result'] = $_POST['requete'];				
				$this->load->vars($data);
				$this->load->view('templates');					
			}
		}
				
		public function lancer_recherche_stat() {
			extract($_POST); 
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->helper('html');
			$this->load->library('form_validation');
			$this->load->helper('form');
			if($formsend=="Start country searching"){
				$data['nom_vue'] = "v_formulaire_stat";
				$data['type'] = "Pays";
				$this->load->vars($data);
				$this->load->view('templates');
			}
			if($formsend=="Start region searching"){
				$data['nom_vue'] = "v_formulaire_stat";
				$data['type'] = "Region";
				$this->load->vars($data);
				$this->load->view('templates');
			}
			if($formsend=="Start city searching"){
				$data['nom_vue'] = "v_formulaire_stat";
				$data['type'] = "Ville";
				$this->load->vars($data);
				$this->load->view('templates');
			}
			if($formsend=="Start hospital searching"){
				$data['nom_vue'] = "v_formulaire_stat";
				$data['type'] = "Hopital";
				$this->load->vars($data);
				$this->load->view('templates');
			}
			if($formsend=="Start doctor searching"){
				$data['nom_vue'] = "v_formulaire_stat";
				$data['type'] = "Medecin";
				$this->load->vars($data);
				$this->load->view('templates');
			}
			
		}
		
		public function recherche_statistique(){
			extract($_POST);
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->helper('html');
			$this->load->library('form_validation');
			$this->load->helper('form');
			$this->load->model('Model_Request');
			$data['data'] = $this->Model_Request->search_stat($form,$reptype,$type);
			if($data['data']==NULL){
				$data['nom_vue'] = "v_formulaire_stat";
				$data['message'] = "There is no result for this request";
				$data['type'] = $type;
				$this->load->vars($data);
				$this->load->view('templates');
			}else{
				$data['optionaffichage'] = $optionaffichage;
				$data['nom_vue'] = "v_affichage_data";
				$data['nom_type'] = $form;
				$data['nom_lieux'] = $reptype;
				$this->load->vars($data);
				$this->load->view('templates');
			}
		}
    
        public function dicom_viewer($fichier,$nb) {
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->helper('html');
			$this->load->library('form_validation');
			$this->load->helper('form');	
            $data["file"]=base_url()."dicom/$fichier/";
            $data["fin"]=$nb;
            $data['nom_vue']='v_dicom_viewer';
            $this->load->view('templates',$data);
		}
       /* public function test() {
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->helper('html');
			$this->load->library('form_validation');
			$this->load->helper('form');	
            $data["message"]="";
            $data["file"]=base_url()."dicom/test2/series-000005/";
            $data["fin"]=22;
            //$data['url'] = 'https://ivmartel.github.io/dwv-jqmobile/demo/stable/index.html';
            $data['nom_vue']='a';
            $data["file"]=base_url()."dicom/test2/series-000006/";
            $data["fin"]=22;
            $data['nom_vue']='v_hover';
            $this->load->view('templates',$data);
		}
*/
	
}

?>
