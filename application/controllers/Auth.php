 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if($this->form_validation->run() == false) {
			$data['judul'] = 'Halaman Login';
			$this->load->view('auth/header', $data);
			$this->load->view('auth/login');
			$this->load->view('auth/footer');
		} else {
			$username = $this->input->post('username');
        	$password = md5 ($this->input->post('password'));

        	$admin = $this->db->get_where('admin', ['username' => $username])->row_array();

			if($admin) {
				if($password == $admin['password']) {
					$password = $this->input->post('password');
					$data = [
                        'username' => $admin['username']
					];
				$this->session->set_userdata($data);
				redirect('dashboard');
				} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible text-center " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    Password salah!
                  </div>');
				redirect('auth');
				}
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible text-center " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    Pengguna tidak ditemukan!
                  </div>');
				redirect('auth');
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('username');

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible text-center " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    Anda telah Logout
                  </div>');

		redirect('auth');
	}
}