<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delete extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->database();
    $this->load->model('guestbook_model');
  } 
  //index function
  function index()  {
    $data['comment_list'] = $this->guestbook_model->get_comment_list();
        $this->load->view('guestbook', $data);
  }

  function delete_comment($id) {
    //delete employee record
    $this->db->where('id', $id);
    $this->db->delete('guestbook');
    redirect('delete/index');
  }
}
