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
	public function index()
	{
		$this->load->helper('form');
		$this->load->model('M_Curl');
		$this->lister();
	}

	public function lister(){
		
		if( $_SERVER['REQUEST_METHOD'] == 'POST' ){

			$this->getTheInfo($_POST['text']);
			redirect(base_url());

		}elseif( $_SERVER['REQUEST_METHOD'] == 'GET' ){

			//info et chargement de la vue pour le layout
			$dataList['posts'] = $this->M_Curl->lister();
			$dataLayout['titre'] = 'Le mur';
			$dataLayout['vue'] = $this->load->view('curl', $dataList, TRUE);

			//chargement et infos page layout
			
			$this->load->view('layout', $dataLayout);
		}
	}

	public function getTheInfo($data){
		
		if(substr($data, 0, 7) == 'http://' | substr($data, 0, 3) == 'www'){

			$curl = curl_init();

			curl_setopt($curl, CURLOPT_HEADER, 0);
			curl_setopt($curl, CURLOPT_URL, $data);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			
			$pageContent = curl_exec($curl);

			//Récuperation du html
			$dom = new DomDocument();
			@$dom->loadHTML($pageContent);
			$titre = $dom->getElementsByTagName("title");
			$descriptions = $dom->getElementsByTagName("meta");
			$images = $dom->getElementsByTagName("img");
			
			curl_close($curl);

			//recuperation du site
			$leSite = $data;

			//récuperation du title
			$leTitre = $titre->item(0)->nodeValue;


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
			/*preg_match_all('#<img[^\']*?src=\"([^\']*?)\"[^\']*?>#i', $pageContent, $imgs);
			foreach ($imgs as $img) {
				$image = $img[0];
			}*/



			//ajout des donnée dans la variable contenant les info
			$donnees['titre'] = $leTitre;
			$donnees['site'] = $leSite;
			$donnees['description'] = $laDescription;
			$donnees['img'] = $image;

			//lancement de la fonction d'ajout

			$this->M_Curl->ajouterSite($donnees);
		}else{

			$donnees['titre'] = 'auteur';
			$donnees['site'] = date("Y-m-d H:i:s");
			$donnees['description'] = $data;
			$donnees['img'] = 'http://localhost:8888/monCurl/web/img/auteur.png';

			$this->M_Curl->ajouterSite($donnees);
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */