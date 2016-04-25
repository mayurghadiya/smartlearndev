<?php
class Photo_gallery extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
        
        public function addmedia($tablename,$data)
        {
           $this->db->insert($tablename,$data);
           
            
        }
        
        public function getgallery($id)
        {
           return $this->db->get_where("photo_gallery",array("gallery_id"=>$id))->result();
        }
        
        public function getphotogallery()
        {
            
            return  $this->db->get('photo_gallery')->result();
        }
        
        public function updatemedia($data,$id)
        {
            $this->db->where("gallery_id",$id);
            $this->db->update("photo_gallery",$data);
            
        }
        
        public function addbanner($data)
        {
            $this->db->insert("banner_slider",$data);
        }
        public function get_banner()
        {
            return $this->db->get("banner_slider")->result();
        }
        public function getbanner($id = '')
        {
            $this->db->where("banner_id",$id);
            return $this->db->get("banner_slider")->result();
            
            
        }
        public function updatebanner($update,$id)
        {
            $this->db->where("banner_id",$id);
            $this->db->update("banner_slider",$update);
        }
		

	
}
?>