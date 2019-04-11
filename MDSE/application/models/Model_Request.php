<?php
	class Model_Request extends CI_Model {
		
		public function __construct(){
			parent::__construct();			
			$this->load->database();
		}
	
		public function search_patient($num_secu,$nom,$prenom) {
			
			if($num_secu != ''){
				
				$this->db->from('mdse.patient');
				$this->db->where('patient.secu', $num_secu);
				
			} else {
				
				$this->db->from('mdse.patient');
				$this->db->where('patient.nom',$nom);
				$this->db->where('patient.prenom',$prenom);
				
				/* Pour date et lieu de naissance
				 * 
				 * if(isset($data['date_naiss'])) {
					$this->db->where('patient.date_naiss',$);
				}
				
				if(isset($data['lieu_naiss'])) {
					$this->db->where('patient.lieu_naiss',$);
				}*/			
				
			}
			 
			$query = $this->db->get();
			$query = $query->result_array();
			return $query;
			
		}
		
		public function search_stat($form,$reptype,$type) {
			$result = NULL;			
			switch ($type) {
				case "Pays": // ici
					switch ($form) {
						case "genre":
							$sql = "select genre_patient from mdse.donne_patient where pays = ? order by genre_patient";
							$query = $this->db->query($sql, array($reptype));
							foreach ($query->result_array() as $row){
								$result[] = array('donne'=> $row['genre_patient']);
							}
							return $result;
							break;
						case "age":
							$sql = "select age_patient from mdse.donne_patient where pays = ? order by age_patient";
							$query = $this->db->query($sql, array($reptype));
							foreach ($query->result_array() as $row){
								$result[] = array('donne'=> $row['age_patient']);
							}
							return $result;
							break;
						case "catage":
							$sql = "select cat_age_patient from mdse.donne_patient where pays = ? order by cat_age_patient";
							$query = $this->db->query($sql, array($reptype));
							foreach ($query->result_array() as $row){
								$result[] = array('donne'=> $row['cat_age_patient']);
							}
							return $result;
							break;
						case "taille":
							$sql = "select taille_patient from mdse.donne_patient where pays = ? order by taille_patient ";
							$query = $this->db->query($sql, array($reptype));
							foreach ($query->result_array() as $row){
								$result[] = array('donne'=> $row['taille_patient']);
							}
							return $result;
							break;
						case "masse":
							$sql = "select poid_patient from mdse.donne_patient where pays = ? order by poid_patient";
							$query = $this->db->query($sql, array($reptype));
							foreach ($query->result_array() as $row){
								$result[] = array('donne'=> $row['poid_patient']);
							}
							return $result;
							break;
						default:
							echo "pas ok";
							break;
					}
					break;
				case "Region": // ici
					switch ($form) {
						case "genre":
							$sql = "select genre_patient from mdse.donne_patient where region = ? order by genre_patient";
							$query = $this->db->query($sql, array($reptype));
							foreach ($query->result_array() as $row){
								$result[] = array('donne'=> $row['genre_patient']);
							}
							return $result;
							break;
						case "age":
							$sql = "select age_patient from mdse.donne_patient where region = ? order by age_patient";
							$query = $this->db->query($sql, array($reptype));
							foreach ($query->result_array() as $row){
								$result[] = array('donne'=> $row['age_patient']);
							}
							return $result;
							break;
						case "catage":
							$sql = "select cat_age_patient from mdse.donne_patient where region = ? order by cat_age_patient";
							$query = $this->db->query($sql, array($reptype));
							foreach ($query->result_array() as $row){
								$result[] = array('donne'=> $row['cat_age_patient']);
							}
							return $result;
							break;
						case "taille":
							$sql = "select taille_patient from mdse.donne_patient where region = ? order by taille_patient";
							$query = $this->db->query($sql, array($reptype));
							foreach ($query->result_array() as $row){
								$result[] = array('donne'=> $row['taille_patient']);
							}
							return $result;
							break;
						case "masse":
							$sql = "select poid_patient from mdse.donne_patient where region = ? order by poid_patient";
							$query = $this->db->query($sql, array($reptype));
							foreach ($query->result_array() as $row){
								$result[] = array('donne'=> $row['poid_patient']);
							}
							return $result;
							break;
						default:
							echo "pas ok";
							break;
					}
					break;
				case "Ville": // ici
					switch ($form) {
						case "genre":
							$sql = "select genre_patient from mdse.donne_patient where ville = ? order by genre_patient";
							$query = $this->db->query($sql, array($reptype));
							foreach ($query->result_array() as $row){
								$result[] = array('donne'=> $row['genre_patient']);
							}
							return $result;
							break;
						case "age":
							$sql = "select age_patient from mdse.donne_patient where ville = ? order by age_patient";
							$query = $this->db->query($sql, array($reptype));
							foreach ($query->result_array() as $row){
								$result[] = array('donne'=> $row['age_patient']);
							}
							return $result;
							break;
						case "catage":
							$sql = "select cat_age_patient from mdse.donne_patient where ville = ? order by cat_age_patient";
							$query = $this->db->query($sql, array($reptype));
							foreach ($query->result_array() as $row){
								$result[] = array('donne'=> $row['cat_age_patient']);
							}
							return $result;
							break;
						case "taille":
							$sql = "select taille_patient from mdse.donne_patient where ville = ? order by taille_patient";
							$query = $this->db->query($sql, array($reptype));
							foreach ($query->result_array() as $row){
								$result[] = array('donne'=> $row['taille_patient']);
							}
							return $result;
							break;
						case "masse":
							$sql = "select poid_patient from mdse.donne_patient where ville = ? order by poid_patient";
							$query = $this->db->query($sql, array($reptype));
							foreach ($query->result_array() as $row){
								$result[] = array('donne'=> $row['poid_patient']);
							}
							return $result;
							break;
						default:
							echo "pas ok";
							break;
					}
					break;
				case "Hopital": // ici
					switch ($form) {
						case "genre":
							$sql = "select genre_patient from mdse.donne_patient where hopital = ? order by genre_patient";
							$query = $this->db->query($sql, array($reptype));
							foreach ($query->result_array() as $row){
								$result[] = array('donne'=> $row['genre_patient']);
							}
							return $result;
							break;
						case "age":
							$sql = "select age_patient from mdse.donne_patient where hopital = ? order by age_patient";
							$query = $this->db->query($sql, array($reptype));
							foreach ($query->result_array() as $row){
								$result[] = array('donne'=> $row['age_patient']);
							}
							return $result;
							break;
						case "catage":
							$sql = "select cat_age_patient from mdse.donne_patient where hopital = ? order by cat_age_patient";
							$query = $this->db->query($sql, array($reptype));
							foreach ($query->result_array() as $row){
								$result[] = array('donne'=> $row['cat_age_patient']);
							}
							return $result;
							break;
						case "taille":
							$sql = "select taille_patient from mdse.donne_patient where hopital = ? order by taille_patient";
							$query = $this->db->query($sql, array($reptype));
							foreach ($query->result_array() as $row){
								$result[] = array('donne'=> $row['taille_patient']);
							}
							return $result;
							break;
						case "masse":
							$sql = "select poid_patient from mdse.donne_patient where hopital = ? order by poid_patient";
							$query = $this->db->query($sql, array($reptype));
							foreach ($query->result_array() as $row){
								$result[] = array('donne'=> $row['poid_patient']);
							}
							return $result;
							break;
						default:
							echo "pas ok";
							break;
					}
					break;
				case "Medecin": // ici
					switch ($form) {
						case "genre":
							$sql = "select genre_patient from mdse.donne_patient where docteur = ? order by genre_patient";
							$query = $this->db->query($sql, array($reptype));
							foreach ($query->result_array() as $row){
								$result[] = array('donne'=> $row['genre_patient']);
							}
							return $result;
							break;
						case "age":
							$sql = "select age_patient from mdse.donne_patient where docteur = ? order by age_patient";
							$query = $this->db->query($sql, array($reptype));
							foreach ($query->result_array() as $row){
								$result[] = array('donne'=> $row['age_patient']);
							}
							return $result;
							break;
						case "catage":
							$sql = "select cat_age_patient from mdse.donne_patient where docteur = ? order by cat_age_patient";
							$query = $this->db->query($sql, array($reptype));
							foreach ($query->result_array() as $row){
								$result[] = array('donne'=> $row['cat_age_patient']);
							}
							return $result;
							break;
						case "taille":
							$sql = "select taille_patient from mdse.donne_patient where docteur = ? order by taille_patient";
							$query = $this->db->query($sql, array($reptype));
							foreach ($query->result_array() as $row){
								$result[] = array('donne'=> $row['taille_patient']);
							}
							return $result;
							break;
						case "masse":
							$sql = "select poid_patient from mdse.donne_patient where docteur = ? order by poid_patient";
							$query = $this->db->query($sql, array($reptype));
							foreach ($query->result_array() as $row){
								$result[] = array('donne'=> $row['poid_patient']);
							}
							return $result;
							break;
						default:
							echo "pas ok";
							break;
					}
					break;
				default: // ici
					echo "pas ok";
					break;
			}
		}
	}
?>
