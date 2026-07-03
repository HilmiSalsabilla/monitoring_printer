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

	/**
	 * Call this at the top of a controller's __construct() (to guard the
	 * whole controller) or at the top of an individual method (to guard
	 * just that action) to restrict access to Admin-level accounts only.
	 *
	 * This is the server-side enforcement of the same rule the views
	 * already use for hiding buttons/menus (session 'level' == 'Admin').
	 * The view-level checks are cosmetic; this is what actually stops a
	 * non-Admin from reaching the action via a direct request.
	 */
	protected function require_admin()
	{
		if ($this->session->userdata('level') !== 'Admin') {
			$this->session->set_flashdata('error', 'Anda tidak memiliki akses ke halaman tersebut.');
			redirect('dashboard', 'refresh');
			return;
		}
	}
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */
