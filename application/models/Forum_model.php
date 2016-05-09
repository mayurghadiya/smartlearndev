<?php
class Forum_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

		
        public function getforum()
        {
            return $this->db->get('forum')->result_array();
            
        }
        
        
        public function create($data)
        {
            $this->db->insert("forum",$data);
        }
        public function update($data,$id)
        {
            $this->db->update("forum",$data,array("forum_id"=>$id));
        }
        public function delete($id)
        {
            $this->db->delete("forum",array("forum_id"=>$id));
        }
        
	
}
?>