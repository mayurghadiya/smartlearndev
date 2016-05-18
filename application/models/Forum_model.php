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
        
        public function getforum_topic()
        {
            $this->db->order_by("forum_topic_id","DESC");
            return $this->db->get('forum_topics')->result_array();
        }
        
        public function create_topic($data)
        {
            $this->db->insert("forum_topics",$data);
        }
        
        public function update_topic($data,$id)
        {
            $this->db->update("forum_topics",$data,array("forum_topic_id"=>$id));
        }
        public function forum_topicsdelete($id)
        {
             $this->db->delete("forum_topics",array("forum_topic_id"=>$id));
        }
        public function getforum_question()
        {
            $this->db->get("forum_question")->result_array();
        }
        
        public function create_question($data)
        {
            $this->db->insert("forum_question",$data);
        }
        
        public function getcomments($param)
        {
            $this->db->order_by("forum_comment_id","DESC");
            $this->db->where("forum_topic_id",$param);
            return $this->db->get("forum_comment")->result_array();
        }
        
        public function confirm($id)
        {
            $data['forum_comment_status'] = '1';
            $this->db->where("forum_comment_id",$id);
            $this->db->update("forum_comment",$data);
        }
        
        public function delete_comment($id)
        {
            $this->db->where("forum_comment_id",$id);
            $this->db->delete("forum_comment");
        }
        public function getforumtopic($id)
        {
            
           return $this->db->get_where("forum_topics",array("forum_topic_id"=>$id))->result_array();
        }
	
}
?>