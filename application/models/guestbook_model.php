<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guestbook_model extends CI_Model {
  function __construct() {
    parent::__construct();
    $this->load->database(); 
  }
  function view(){
    $sql = "SELECT * FROM guestbook ORDER BY id DESC";
    $query = $this->db->query( $sql);
    return $query->result_array();
  }

  function insert($data = array()) {
    $posted_on= date("y/m/d h:i:s");
    $data["name"] = $this->db->escape_str($data["name"]);
    $data["email"] = $this->db->escape_str($data["email"]);
    $data["comment"] = $this->db->escape_str($data["comment"]);
    $data["posted_on"] = $this->db->escape_str($posted_on);
    $sql = " INSERT INTO guestbook (id, name, email, comment, posted_on) VALUES ('null', '". $data["name"] ."', '". $data["email"] ."', '". $data["comment"] ."', '". $posted_on ."')";
    return $this->db->query($sql);
  }

  function did_delete($id){
    $this->db->where('id', $id);
    $this->db->delete('guestbook');
  }
}