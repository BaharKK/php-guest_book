<?php  
defined('BASEPATH') OR exit('No direct script access allowed');


class Guestbook extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('guestbook_model','Guestbook_model');
  }
  function index() {
    $data = array();
    $data["spam"] = false;
    $data["posted"] = false;
    $data["entries"] = $this->Guestbook_model->view();
    $this->load->view("guestbook.php", $data);
  }

  function create(){
    if($this->input->post("submit")) {
      if($this->input->post('human') == "") { 
        $data = array (
          "name" => $this->input->post("name"),
          "email" => $this->input->post("email"),
          "comment" => $this->input->post("comment")
        );
        if( $this->Guestbook_model->insert( $data ) ) {
          $data["posted"] = true;
        } 
      }
      else {
        $data['spam'] = true;
        redirect('/');
      }
    }
    redirect('/');
  }

  function delete($id){
    $this->Guestbook_model->did_delete($id);
    redirect('/');
  } 
}


