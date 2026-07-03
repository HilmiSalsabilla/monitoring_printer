<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Auth_Controller
 *
 * Base controller for any page that requires the user to be logged in.
 * Any controller that should NOT be publicly accessible must extend this
 * class instead of CI_Controller.
 *
 * It checks for a valid session (set in Login::proses_login()) and, if
 * missing, redirects the visitor to the login page before any controller
 * method runs.
 */
class Auth_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		// 'nik' is set into session data on successful login (see Login::proses_login)
		if (!$this->session->userdata('nik')) {
			$this->session->set_flashdata('error', 'Silakan login terlebih dahulu.');
			redirect('login', 'refresh');
			// Stop further execution in this request. redirect() already calls
			// exit() in CI3, but return here for clarity / testability.
			return;
		}
	}
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */
