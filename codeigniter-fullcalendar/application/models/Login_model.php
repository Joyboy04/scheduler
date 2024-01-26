<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function validate_user($username, $password) {
        // Query the database to validate user credentials
        $query = $this->db->get_where('users', array('username' => $username, 'password' => md5($password)));

        if ($query->num_rows() == 1) {
            return $query->row_array();
        } else {
            return false;
        }
    }
}
