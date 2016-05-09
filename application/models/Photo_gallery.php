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
        /**
        * get single banner
        * @return mixed
        */
        public function getbanner($id = '')
        {
            $this->db->where("banner_id",$id);
            return $this->db->get("banner_slider")->result();
            
            
        }
        
        /**
        * banner update
        * @return mixed
        */
        public function updatebanner($update,$id)
        {
            $this->db->where("banner_id",$id);
            $this->db->update("banner_slider",$update);
        }
        /**
        * get all setting
        * @return mixed
        */
        function general_setting()
        {
            $this->db->order_by("slider_id",'DESC');
            $this->db->limit(1);
            return $this->db->get("slide_setting")->result();
                    
        }
        
        /**
        * Update Slider Option
        * @return mixed
        */
        function update_general($data)
        {
            $this->db->order_by("slider_id",'DESC');
             $this->db->limit(1);
            $slide = $this->db->get("slide_setting")->result();
            
            if(!empty($slide))
            {
                
              return $this->db->update("slide_setting",$data,array("slider_id"=>$slide[0]->slider_id)); 
            }
            else{
               return $this->db->insert("slide_setting",$data);
            }
        }
		

	
}
?>