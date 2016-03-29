<?php
class Upload_services extends CI_Model
 {
function __construct()
{
				
parent::__construct();
				
		 
}
 function upload_sampledata_csv()
 {
		   
			$fp = fopen($_FILES['import_csv']['tmp_name'],'r') or die("can't open file");
					  while($csv_line = fgetcsv($fp,1024)) 
					  {
					for ($i = 1, $j = count($csv_line); $i < $j; $i++) 
					  {
					   $insert_csv = array();
					   $insert_csv['name'] = $csv_line[0];
					   $insert_csv['father_name'] = $csv_line[1];
					   $insert_csv['mother_name'] = $csv_line[2];
					   $insert_csv['birthday'] = $csv_line[3];
					   $insert_csv['sex'] = $csv_line[4];
					   $insert_csv['blood_group'] = $csv_line[5];
					   $insert_csv['address'] = $csv_line[6];
					   $insert_csv['phone'] = $csv_line[7];
					   $insert_csv['email'] = $csv_line[8];
					   $insert_csv['password'] = $csv_line[9];
					   $insert_csv['roll'] = $csv_line[10];
					  
					  }
	 
					  $data = array(
					   'name' => $insert_csv['name'] ,
					   'father_name' => $insert_csv['father_name'],
					   'mother_name' => $insert_csv['mother_name'],
					   'birthday' => $insert_csv['birthday'] ,
					   'sex' => $insert_csv['sex'],
					   'blood_group' => $insert_csv['blood_group'],
					   'address' => $insert_csv['address'] ,
					   'phone' => $insert_csv['phone'] ,
					   'email' => $insert_csv['email'],
					   'password' => md5($insert_csv['password']),
					   'roll' => $insert_csv['roll'],
					   'class_id' => $insert_csv['class_id']);
				$data['crane_features']=$this->db->insert('student', $data);
				     }
                   fclose($fp) or die("can't close file");
	       $data['success']="success";
	       return $data;
	
	          }
function get_car_features_info()
		   {
		      $get_cardetails=$this->db->query("select * from student");
			   return $get_cardetails;
		   
		   }
}