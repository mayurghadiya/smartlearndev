<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*	
 *	@author 	: Searchnative India
 *	date		: 02 Nov, 2015
 *	Smart School system
 *	http://searchnative.in
 *	hello@searchnative.in
 */

class Install extends CI_Controller
{
    
    
    /***default functin, redirects to login page if no admin logged in yet***/
    public function index()
    {
        $this->load->view('backend/install');
    }
    
    
    
}
