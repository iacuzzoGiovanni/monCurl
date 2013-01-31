<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Curl extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in')){
			redirect('member/index');
		}
	}
	
	public function index()
	{
		$this->load->helper('form');
		$this->load->model('M_Curl');
		
		//info et chargement de la vue pour le layout
		$dataList['posts'] = $this->M_Curl->lister();
		$dataLayout['titre'] = 'Link Manager';
		$dataLayout['pageCourante'] = 'accueil';
		$dataLayout['vue'] = $this->load->view('lister', $dataList, TRUE);

		//chargement et infos page layout
		
		$this->load->view('layout', $dataLayout);
	}

	public function choix(){
		$this->load->helper('form');
		
		if($_SERVER['REQUEST_METHOD'] == 'POST'){

			$data = $this->input->post('text');
			$curl = curl_init();

			curl_setopt($curl, CURLOPT_HEADER, 0);
			curl_setopt($curl, CURLOPT_URL, $data);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);

			$pageContent = curl_exec($curl);
			
			if($pageContent){				

				//Récuperation du html
				$dom = new DOMDocument();
				@$dom->loadHTML($pageContent);
				$titre = $dom->getElementsByTagName("title");
				$descriptions = $dom->getElementsByTagName("meta");
				$images = $dom->getElementsByTagName("img");


				curl_close($curl);

				//recuperation du site
				if(preg_match('#^(http|https):\/\/#i', $data)){
					$leSite = $data;
				}else{
					$leSite = 'http://'.$data;
				}
				

				//récuperation du title
				$leTitre = $titre->item(0);
				if(empty($leTitre)){
					$leTitre = 'Aucun titre';
				}else{
					$leTitre = $titre->item(0)->nodeValue;
				}


				//recuperation de la description
				foreach ($descriptions as $description ) {
					if(strtolower($description->getAttribute("name")) == "description"){
						$laDescription = $description->getAttribute("content");
					}
				}

				if(!isset($laDescription)){
					$laDescription = 'Pas de description disponible !';
				}

				//recuperation des ou de l'image
				for ($i=0; $i < $images->length ; $i++){ 
				 	$mesImgs = $images->item($i);
				 	$img[$i] = $mesImgs->getAttribute("src");
				 	$img[$i] = $this->rel2abs($leSite, $img[$i]);
				 	if(!@fopen($img[$i], 'r')){
				 		$img[$i] = base_url().'web/img/noImg.png';
				 	}
				}

				if(empty($img)){
					$img = base_url().'web/img/noImg.png';
				}

				//ajout des donnée dans la variable contenant les info


				$donnees['titre'] = $leTitre;
				$donnees['site'] = $leSite;
				$donnees['description'] = $laDescription;
				$donnees['img'] = $img;
				
				$dataLayout['titre'] = 'Choisis ton image';
				$dataLayout['pageCourante'] = 'choix';
				$dataLayout['vue'] = $this->load->view('choix', $donnees, TRUE);
				$this->load->view('layout', $dataLayout);
			}
		} 
	}

	public function send(){
		
		$this->load->model('M_Curl');

		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			
			$datas['titre'] = $this->input->post('titre');
			$datas['site'] = $this->input->post('site');
			$datas['description'] = $this->input->post('description');
			$datas['img'] = $this->input->post('imgChoice');
			$this->M_Curl->ajouterSite($datas);
		}
		redirect('curl');
	}

	public function supprimer(){

		$this->load->model('M_Curl');

		$supp = $this->input->post('id');
		
		$this->M_Curl->delete($supp);

		if(!$this->input->is_ajax_request()){
		
			redirect('curl');			
		
		}

	}

	public function modifier(){

		$this->load->helper('form');
		$this->load->model('M_Curl');

    	if($_SERVER['REQUEST_METHOD'] == 'POST'){

    		$data['post'] = $this->M_Curl->see($this->input->post('id'));

    	}

		$dataLayout['titre'] = 'Modifier le post';
		$dataLayout['pageCourante'] = 'modifier';
		$dataLayout['vue'] = $this->load->view('modifier', $data, TRUE);
		$this->load->view('layout', $dataLayout);		
	}

	public function maj(){

		$this->load->model('M_Curl');
    		
    	$data['titre'] = $this->input->post('titre');
    	$data['url'] = $this->input->post('url');
    	$data['description'] = $this->input->post('description');
    	$data['img'] = $this->input->post('img');
    	$data['id'] = $this->input->post('id');

    	$this->M_Curl->update($data);
    	redirect('curl');

	}

	function rel2abs ($pageURL, $link){
    
	    if ( strstr($link, 'http://') !== false ){
	    	return $link;
	    }
	       	   
	    if ( $pageURL[strlen($pageURL) - 1] !== '/' ){
	    	$pageURL .= '/';
	    }

	    /*if ( $link[0] == '/' ){
	    	$link = substr($link, 1);
	    }*/
	        
	    return $pageURL.$link;
	}

	public function disconnect(){
		$this->session->unset_userdata('logged_in');
		redirect('member/index');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */