<?php
	
	class M_Curl extends CI_Model
	{
		
		public function lister()
		{
			$this->db->select('titre as titre, url as site, description as description, img as image, id as id');
			$this->db->from('posts');
			$this->db->where('user_id', $this->session->userdata['id']);
			$this->db->order_by("date", "desc"); 
			$query = $this->db->get();
			return $query->result();
		}

		public function ajouterSite($data)
		{
			$donnes = array('user_id' => $this->session->userdata['id'],
							'titre' => $data['titre'], 
							'url' => $data['site'], 
							'description' => $data['description'], 
							'img' => $data['img']);

			$this->db->insert('posts', $donnes);
		}

		public function delete($data){
			$this->db->delete('posts', array('id' => $data));
		}

		public function see($data)
		{
			$query = $this->db->get_where('posts', array('id' => $data));
			return $query->row();
		}

		public function update($data){

			$donnes = array(
               'id' => $data['id'],
               'titre' => $data['titre'],
               'url' => $data['url'],
               'description' => $data['description'],
               'img' => $data['img']
            );

			$this->db->where('id', $data['id']);
			$this->db->update('posts', $donnes); 

		}
	}