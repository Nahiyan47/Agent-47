<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct()
	{
		parent::__construct();
        $this->load->database();
		

	}

    /**
    * method to send messages
    * @access public
    * @return array
    */

	public function insert(){

		$data=array();
    	$data['message'] = $this->input->post('messege');
 
     	$query=$this->db->insert('chatbox',$data);
     	return $query;
	}


    /**
    * method to load all messages without loading page 
    * @access public
    * @return string
    */

	public function load(){

		$result=$this->db->query("SELECT * from chatbox order by chat_id");
		$data=$result->result();
		$output = '';
		foreach ($data as $value) {
       		echo '<li class="list-group-item">'.$value->message.'</li>';
        }

}


}