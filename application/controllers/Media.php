<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* 	
 * 	@author 	: Searchnative India
 * 	date		: 02 Nov, 2015
 *  Smart School system
 * 	http://searchnative.in
 * 	hello@searchnative.in
 */

class Media extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'index.php?login', 'refresh');
       
        /* cache control */
        $this->output->set_header("HTTP/1.0 200 OK");
        $this->output->set_header("HTTP/1.1 200 OK");
        $this->output->set_header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        $this->load->helper('notification');
        $this->load->helper('date_format');
        $this->load->model('photo_gallery');
        
    }
    /*     * *default functin, redirects to login page if no admin logged in yet	
      Auth : Brij  Dhami
      /******** */
    
    public function index()
    {
         if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'index.php?login', 'refresh');
         
        $page_data['title'] = 'Photo Gallery';
        $page_data['page_name'] = 'photo_gallery';
        $this->load->view('backend/index', $page_data);
    }
    
    public function photogallery($param = '' , $param2 = '')
    {
        if($param=='create')
        {
            if($this->input->post())
            {
              // retrieve the number of images uploaded;
              $number_of_files = sizeof($_FILES['galleryimg']['tmp_name']);
              // considering that do_upload() accepts single files, we will have to do a small hack so that we can upload multiple files. For this we will have to keep the data of uploaded files in a variable, and redo the $_FILE.
              $files = $_FILES['galleryimg'];
              $errors = array();

              // first make sure that there is no error in uploading the files
              for($i=0;$i<$number_of_files;$i++)
              {
                if($_FILES['galleryimg']['error'][$i] != 0) $errors[$i][] = 'Couldn\'t upload file '.$_FILES['galleryimg']['name'][$i];
              }
              if(sizeof($errors)==0)
              {
                // now, taking into account that there can be more than one file, for each file we will have to do the upload
                // we first load the upload library
                $this->load->library('upload');
                if(!is_dir(FCPATH . 'uploads/photogallery'))
                {
                    $path = FCPATH . 'uploads/photogallery';
                    mkdir($path,0777);
                }
                // next we pass the upload path for the images
                $config['upload_path'] = FCPATH . 'uploads/photogallery';
                // also, we make sure we allow only certain type of images
                $config['allowed_types'] = 'gif|jpg|png';
                for ($i = 0; $i < $number_of_files; $i++) {
                  $_FILES['galleryimg']['name'] = $files['name'][$i];
                  $_FILES['galleryimg']['type'] = $files['type'][$i];
                  $_FILES['galleryimg']['tmp_name'] = $files['tmp_name'][$i];
                  $_FILES['galleryimg']['error'] = $files['error'][$i];
                  $_FILES['galleryimg']['size'] = $files['size'][$i];

                  $file_ext = explode(".",$_FILES['galleryimg']['name']);
                  $ext_file = strtolower(end($file_ext));
                  $config['file_name'] = $i.date('dmYhis').'.'.$ext_file;

                  //now we initialize the upload library
                  $this->upload->initialize($config);
                  // we retrieve the number of files that were uploaded
                  if ($this->upload->do_upload('galleryimg'))
                  {
                    $data['uploads'][$i] = $this->upload->data();
                  }
                  else
                  {
                    $data['upload_errors'][$i] = $this->upload->display_errors();
                  }
                }
              }
              else
              {
                  $error = "Invalid Images";
                $this->session->set_flashdata('flash_message',$error);
                redirect(base_url().'index.php?media/photogallery');

              }

              $upload_files =  $data['uploads'];
              for($u=0;$u<count($upload_files);$u++)
              {
              $uploaded_file[] =   $upload_files[$u]['file_name'];    

              }

              if(!empty($uploaded_file))
              {
              $gallery = implode(",",$uploaded_file);
              }else{
              $gallery = '';    
              }

              $title = $this->input->post("title");
              $description = $this->input->post("description");
              $gallery_img = $gallery;
              $insert = array("gallery_title"=>$title,
                              "gallery_desc"=>$description,
                              "gallery_img"=>$gallery_img);

               $this->photo_gallery->addmedia("photo_gallery",$insert);

                  $success = "Gallery Added Successfully";
                $this->session->set_flashdata('flash_message',$success);
                redirect(base_url().'index.php?media/photogallery');




            }
        }
        
        if($param=='do_update')
        { 
            $gal_data = $this->photo_gallery->getgallery($param2);
              if($this->input->post())
            {
              // retrieve the number of images uploaded;
             if(!empty($_FILES['galleryimg2']['name'][0]))
              {
                 
                 
              $number_of_files = sizeof($_FILES['galleryimg2']['tmp_name']);
              // considering that do_upload() accepts single files, we will have to do a small hack so that we can upload multiple files. For this we will have to keep the data of uploaded files in a variable, and redo the $_FILE.
              $files = $_FILES['galleryimg2'];
              $errors = array();

              // first make sure that there is no error in uploading the files
              for($i=0;$i<$number_of_files;$i++)
              {
                if($_FILES['galleryimg2']['error'][$i] != 0) $errors[$i][] = 'Couldn\'t upload file '.$_FILES['galleryimg']['name'][$i];
              }
              if(sizeof($errors)==0)
              {
                // now, taking into account that there can be more than one file, for each file we will have to do the upload
                // we first load the upload library
                $this->load->library('upload');
                if(!is_dir(FCPATH . 'uploads/photogallery'))
                {
                    $path = FCPATH . 'uploads/photogallery';
                    mkdir($path,0777);
                }
                // next we pass the upload path for the images
                $config['upload_path'] = FCPATH . 'uploads/photogallery';
                // also, we make sure we allow only certain type of images
                $config['allowed_types'] = 'gif|jpg|png';
                for ($i = 0; $i < $number_of_files; $i++) {
                  $_FILES['galleryimg2']['name'] = $files['name'][$i];
                  $_FILES['galleryimg2']['type'] = $files['type'][$i];
                  $_FILES['galleryimg2']['tmp_name'] = $files['tmp_name'][$i];
                  $_FILES['galleryimg2']['error'] = $files['error'][$i];
                  $_FILES['galleryimg2']['size'] = $files['size'][$i];

                  $file_ext = explode(".",$_FILES['galleryimg2']['name']);
                  $ext_file = strtolower(end($file_ext));
                  $config['file_name'] = $i.date('dmYhis').'.'.$ext_file;

                  //now we initialize the upload library
                  $this->upload->initialize($config);
                  // we retrieve the number of files that were uploaded
                  if ($this->upload->do_upload('galleryimg2'))
                  {
                    $data['uploads'][$i] = $this->upload->data();
                  }
                  else
                  {
                    $data['upload_errors'][$i] = $this->upload->display_errors();
                  }
                }
              }
              else
              {
                  $error = "Invalid Images";
                $this->session->set_flashdata('flash_message',$error);
                redirect(base_url().'index.php?media/photogallery');

              }

              $upload_files =  $data['uploads'];
              for($u=0;$u<count($upload_files);$u++)
              {
              $uploaded_file[] =   $upload_files[$u]['file_name'];    

              }

              if(!empty($uploaded_file))
              {
                  $new_gallery = implode(",",$uploaded_file);
              }
                $old_gal = $gal_data[0]->gallery_img;
                
                if(!empty($old_gal)){
                $all_img = $new_gallery.','.$old_gal;
                }
                else{
                     $all_img = $new_gallery;
                }
              
               }
               else{
                     $all_img  = $gal_data[0]->gallery_img;
               }

              $title = $this->input->post("title");
              $description = $this->input->post("description");
              $gallery_img = $all_img;
              $update = array("gallery_title"=>$title,
                              "gallery_desc"=>$description,
                              "gallery_img"=>$gallery_img);

               $this->photo_gallery->updatemedia($update,$param2);

                  $success = "Gallery Updated Successfully";
                $this->session->set_flashdata('flash_message',$success);
                redirect(base_url().'index.php?media/photogallery');

                


            }
        }
        if($param=="delete")
        {
            $this->db->where("gallery_id",$param2);
            $this->db->delete("photo_gallery");
                              $success = "Gallery deleted Successfully";
                $this->session->set_flashdata('flash_message',$success);
                redirect(base_url().'index.php?media/photogallery');
        }
        
       $page_data['gallery'] =  $this->photo_gallery->getphotogallery();
        $page_data['title'] = 'Photo Gallery';
        $page_data['page_name'] = 'photo_gallery';
        $this->load->view('backend/index', $page_data);
    }
    
    function removeimg()
    {
        
        $item = $_POST['image'];
        $id =  $_POST['id'];
        $get_gallery = $this->photo_gallery->getgallery($id);
            $str =    $get_gallery[0]->gallery_img;
       
          $parts = explode(',', $str);

            while(($i = array_search($item, $parts)) !== false) {
                unset($parts[$i]);
            }

           $new_img =  implode(',', $parts);
           $data = array("gallery_img"=>$new_img);
       $this->photo_gallery->updatemedia($data,$id);
       echo $item;
       
        
    }

}
