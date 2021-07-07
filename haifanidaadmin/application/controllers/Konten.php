<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */

class Konten extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
		$this->load->library('form_validation');
		$this->load->model('Konten_model');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['title'] = "Beranda";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['dashboard'] = $this->db->get('dashboard')->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('konten/index', $data);
		$this->load->view('templates/footer');
	}

	public function pengumuman()
	{
		$data['title'] = "Pengumuman";
		$data['pengumuman'] = $this->db->get('pengumuman')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('judul', 'Title', 'trim|required');
		$this->form_validation->set_rules('isi', 'Content', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('konten/pengumuman', $data);
			$this->load->view('templates/footer');
		} else{
			$upload_image = $_FILES['thumbnail']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
				$config['upload_path'] = './assets/img/pengumuman';
				$config['max_size']     = '2048';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('thumbnail')) {
					$new_image = $this->upload->data('file_name');
					$this->db->insert('pengumuman', [
						'judul' => $this->input->post('judul'),
						'isi' => $this->input->post('isi'),
						'penulis' => $data['user']['name'],
						'waktu_post' => date("Y-m-d H:i:s"),
						'terakhir_diubah' => date("Y-m-d H:i:s"),
						'thumbnail' => $new_image
					]);
					$this->session->set_flashdata('flash', 'Berhasil ditambahkan');
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
						New Announcement Added!
						</div>');
				} else{
					$this->session->set_flashdata('flash_error', 'Gagal diunggah');
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
				}
			} else{
				$this->session->set_flashdata('flash_gagal', 'Thumbnail pengumuman Wajib diupload');
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					Thumbnail pengumuman Wajib diupload!
					</div>');
			}
			redirect('Konten/pengumuman');
		}
	}

	public function updatePengumuman()
	{
		$this->form_validation->set_rules('judul', 'Title', 'trim|required');
		$this->form_validation->set_rules('isi', 'Content', 'trim|required');
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$pengumuman = $this->db->get_where('pengumuman', ['id' => $this->input->post('id')])->row_array();
		if ($data['user']['name'] != $this->input->post('penulis')) {
			$this->session->set_flashdata('flash_gagal', 'Anda tidak memiliki hak untuk menyunting pengumuman ini! karena Anda bukan penulisnya.');
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Anda tidak memiliki hak untuk menyunting pengumuman ini! karena Anda bukan penulisnya.
			</div>');
			redirect('Konten/pengumuman');
		} elseif ($this->form_validation->run() == false) {
			redirect('Konten/pengumuman');
		} else{
			$upload_image = $_FILES['thumbnail']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
				$config['upload_path'] = './assets/img/pengumuman';
				$config['max_size']     = '2048';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('thumbnail')) {
					$old_image = $pengumuman['thumbnail'];
					if ($old_image !='default.jpg') {
						unlink(FCPATH.'assets/img/pengumuman/'.$old_image);
					} 
					$new_image = $this->upload->data('file_name');
					$this->db->set('thumbnail', $new_image);
				} else{
					$this->session->set_flashdata('flash_error', 'Gagal diunggah');
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
					redirect('Konten/pengumuman');
				}
			}
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('pengumuman', [
				'judul' => $this->input->post('judul'),
				'isi' => $this->input->post('isi'),
				'terakhir_diubah' => date("Y-m-d H:i:s"),
			]);
			$this->session->set_flashdata('flash', 'Berhasil diubah');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Announcement Updated!
				</div>');
			redirect('Konten/pengumuman');
		}
	}

	public function deletePengumuman($id)
	{
		$this->db->delete('pengumuman', ['id' => $id]);
		$this->session->set_flashdata('flash', 'Berhasil dihapus');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Announcement Deleted!
			</div>');
		redirect('Konten/pengumuman');
	}

	public function Berita()
	{
		$data['title'] = "Berita";
		$data['berita'] = $this->db->get('berita')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('judul', 'Title', 'trim|required');
		$this->form_validation->set_rules('isi', 'Content', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('konten/berita', $data);
			$this->load->view('templates/footer');
		} else{
			$upload_image = $_FILES['thumbnail']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
				$config['upload_path'] = './assets/img/berita';
				$config['max_size']     = '2048';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('thumbnail')) {
					$new_image = $this->upload->data('file_name');
					$this->db->insert('berita', [
						'judul' => $this->input->post('judul'),
						'isi' => $this->input->post('isi'),
						'penulis' => $data['user']['name'],
						'waktu_post' => date("Y-m-d H:i:s"),
						'terakhir_diubah' => date("Y-m-d H:i:s"),
						'thumbnail' => $new_image
					]);
					$this->session->set_flashdata('flash', 'Berhasil ditambahkan');
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
						New News Added!
						</div>');
				} else{
					$this->session->set_flashdata('flash_error', 'Gagal diunggah');
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
				}
			} else{
				$this->session->set_flashdata('flash_gagal', 'Thumbnail berita Wajib diupload');
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					Thumbnail Berita Wajib diupload!
					</div>');
			}
			redirect('Konten/berita');
		}
	}

	public function updateBerita()
	{
		$this->form_validation->set_rules('judul', 'Title', 'trim|required');
		$this->form_validation->set_rules('isi', 'Content', 'trim|required');
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$berita = $this->db->get_where('berita', ['id' => $this->input->post('id')])->row_array();
		if ($data['user']['name'] != $this->input->post('penulis')) {
			$this->session->set_flashdata('flash_gagal', 'Anda tidak memiliki hak untuk menyunting berita ini! karena Anda bukan penulisnya.');
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Anda tidak memiliki hak untuk menyunting berita ini! karena Anda bukan penulisnya.
			</div>');
			redirect('Konten/berita');
		} elseif ($this->form_validation->run() == false) {
			redirect('Konten/berita');
		} else{
			$upload_image = $_FILES['thumbnail']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
				$config['upload_path'] = './assets/img/berita';
				$config['max_size']     = '2048';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('thumbnail')) {
					$old_image = $berita['thumbnail'];
					if ($old_image !='default.jpg') {
						unlink(FCPATH.'assets/img/berita/'.$old_image);
					} 
					$new_image = $this->upload->data('file_name');
					$this->db->set('thumbnail', $new_image);
				} else{
					$this->session->set_flashdata('flash_error', 'Gagal diunggah');
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
					redirect('Konten/berita');
				}
			}
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('berita', [
				'judul' => $this->input->post('judul'),
				'isi' => $this->input->post('isi'),
				'terakhir_diubah' => date("Y-m-d H:i:s"),
			]);
			$this->session->set_flashdata('flash', 'Berhasil diubah');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				News Updated!
				</div>');
			redirect('Konten/berita');
		}
	}

	public function deleteBerita($id)
	{
		$this->db->delete('berita', ['id' => $id]);
		$this->session->set_flashdata('flash', 'Berhasil dihapus');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			News Deleted!
			</div>');
		redirect('Konten/berita');
	}

	public function blog()
	{
		$data['title'] = "Blog";
		$data['blog'] = $this->db->get('blog')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('judul', 'Title', 'trim|required');
		$this->form_validation->set_rules('isi', 'Content', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('konten/blog', $data);
			$this->load->view('templates/footer');
		} else{
			$upload_image = $_FILES['thumbnail']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
				$config['upload_path'] = './assets/img/blog';
				$config['max_size']     = '2048';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('thumbnail')) {
					$new_image = $this->upload->data('file_name');
					$this->db->insert('blog', [
						'judul' => $this->input->post('judul'),
						'isi' => $this->input->post('isi'),
						'penulis' => $data['user']['name'],
						'waktu_post' => date("Y-m-d H:i:s"),
						'terakhir_diubah' => date("Y-m-d H:i:s"),
						'thumbnail' => $new_image
					]);
					$this->session->set_flashdata('flash', 'Berhasil ditambahkan');
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
						New Blogs Added!
						</div>');
				} else{
					$this->session->set_flashdata('flash_error', 'Gagal diunggah');
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
				}
			} else{
				$this->session->set_flashdata('flash_gagal', 'Thumbnail blog Wajib diupload');
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					Thumbnail Blog Wajib diupload!
					</div>');
			}
			redirect('Konten/blog');
		}
	}

	public function updateBlog()
	{
		$this->form_validation->set_rules('judul', 'Title', 'trim|required');
		$this->form_validation->set_rules('isi', 'Content', 'trim|required');
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$blog = $this->db->get_where('blog', ['id' => $this->input->post('id')])->row_array();
		if ($data['user']['name'] != $this->input->post('penulis')) {
			$this->session->set_flashdata('flash_gagal', 'Anda tidak memiliki hak untuk menyunting blog ini! karena Anda bukan penulisnya.');
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Anda tidak memiliki hak untuk menyunting blog ini! karena Anda bukan penulisnya.
			</div>');
			redirect('Konten/blog');
		} elseif ($this->form_validation->run() == false) {
			redirect('Konten/blog');
		} else{
			$upload_image = $_FILES['thumbnail']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
				$config['upload_path'] = './assets/img/blog';
				$config['max_size']     = '2048';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('thumbnail')) {
					$old_image = $blog['thumbnail'];
					if ($old_image !='default.jpg') {
						unlink(FCPATH.'assets/img/blog/'.$old_image);
					} 
					$new_image = $this->upload->data('file_name');
					$this->db->set('thumbnail', $new_image);
				} else{
					$this->session->set_flashdata('flash_error', 'Gagal diunggah');
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
					redirect('Konten/blog');
				}
			}
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('blog', [
				'judul' => $this->input->post('judul'),
				'isi' => $this->input->post('isi'),
				'terakhir_diubah' => date("Y-m-d H:i:s"),
			]);
			$this->session->set_flashdata('flash', 'Berhasil diubah');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Blogs Updated!
				</div>');
			redirect('Konten/blog');
		}
	}

	public function deleteBlog($id)
	{
		$this->db->delete('blog', ['id' => $id]);
		$this->session->set_flashdata('flash', 'Berhasil dihapus');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Blogs Deleted!
			</div>');
		redirect('Konten/blog');
	}

	public function peraturan()
	{
		$data['title'] = "Peraturan";
		$data['peraturan'] = $this->db->get('peraturan')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('judul', 'Title', 'trim|required');
		$this->form_validation->set_rules('isi', 'Content', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('konten/peraturan', $data);
			$this->load->view('templates/footer');
		} else{
			$upload_image = $_FILES['thumbnail']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
				$config['upload_path'] = './assets/img/peraturan';
				$config['max_size']     = '2048';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('thumbnail')) {
					$new_image = $this->upload->data('file_name');
					$this->db->insert('peraturan', [
						'judul' => $this->input->post('judul'),
						'isi' => $this->input->post('isi'),
						'penulis' => $data['user']['name'],
						'waktu_post' => date("Y-m-d H:i:s"),
						'terakhir_diubah' => date("Y-m-d H:i:s"),
						'thumbnail' => $new_image
					]);
					$this->session->set_flashdata('flash', 'Berhasil ditambahkan');
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
						New Rules Added!
						</div>');
				} else{
					$this->session->set_flashdata('flash_error', 'Gagal diunggah');
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
				}
			} else{
				$this->session->set_flashdata('flash_gagal', 'Thumbnail peraturan Wajib diupload');
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					Thumbnail Peraturan Wajib diupload!
					</div>');
			}
			redirect('Konten/peraturan');
		}
	}

	public function updatePeraturan()
	{
		$this->form_validation->set_rules('judul', 'Title', 'trim|required');
		$this->form_validation->set_rules('isi', 'Content', 'trim|required');
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$peraturan = $this->db->get_where('peraturan', ['id' => $this->input->post('id')])->row_array();
		if ($data['user']['name'] != $this->input->post('penulis')) {
			$this->session->set_flashdata('flash_gagal', 'Anda tidak memiliki hak untuk menyunting peraturan ini! karena Anda bukan penulisnya.');
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Anda tidak memiliki hak untuk menyunting peraturan ini! karena Anda bukan penulisnya.
			</div>');
			redirect('Konten/peraturan');
		} elseif ($this->form_validation->run() == false) {
			redirect('Konten/peraturan');
		} else{
			$upload_image = $_FILES['thumbnail']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
				$config['upload_path'] = './assets/img/peraturan';
				$config['max_size']     = '2048';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('thumbnail')) {
					$old_image = $peraturan['thumbnail'];
					if ($old_image !='default.jpg') {
						unlink(FCPATH.'assets/img/peraturan/'.$old_image);
					} 
					$new_image = $this->upload->data('file_name');
					$this->db->set('thumbnail', $new_image);
				} else{
					$this->session->set_flashdata('flash_error', 'Gagal diunggah');
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
					redirect('Konten/peraturan');
				}
			}
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('peraturan', [
				'judul' => $this->input->post('judul'),
				'isi' => $this->input->post('isi'),
				'terakhir_diubah' => date("Y-m-d H:i:s"),
			]);
			$this->session->set_flashdata('flash', 'Berhasil diubah');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Rules Updated!
				</div>');
			redirect('Konten/peraturan');
		}
	}

	public function deletePeraturan($id)
	{
		$this->db->delete('peraturan', ['id' => $id]);
		$this->session->set_flashdata('flash', 'Berhasil dihapus');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Rules Deleted!
			</div>');
		redirect('Konten/peraturan');
	}

	public function haifa()
	{
		$data['title'] = "Profil Haifa";
		$this->db->order_by('id', 'DESC');
		$data['haifa'] = $this->db->get('haifa')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		$this->form_validation->set_rules('nomor_sk', 'SK Number', 'trim|required');
		$this->form_validation->set_rules('tanggal_sk', 'SK Date', 'trim|required');
		$this->form_validation->set_rules('nama_direktur', 'Director Name', 'trim|required');
		$this->form_validation->set_rules('alamat_kantor', 'Office Address', 'trim|required');
		$this->form_validation->set_rules('akreditasi', 'Accreditation', 'trim|required');
		$this->form_validation->set_rules('tanggal_akreditasi', 'Accreditation Date', 'trim|required');
		$this->form_validation->set_rules('lembaga_akreditasi', 'Accreditation Agency', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('konten/haifa', $data);
			$this->load->view('templates/footer');
		} else{
			$this->db->insert('haifa', [
				'status' => $this->input->post('status'),
				'nomor_sk' => $this->input->post('nomor_sk'),
				'tanggal_sk' => $this->input->post('tanggal_sk'),
				'nama_direktur' => $this->input->post('nama_direktur'),
				'alamat_kantor' => $this->input->post('alamat_kantor'),
				'akreditasi' => $this->input->post('akreditasi'),
				'tanggal_akreditasi' => $this->input->post('tanggal_akreditasi'),
				'lembaga_akreditasi' => $this->input->post('lembaga_akreditasi')
			]);
			$this->session->set_flashdata('flash', 'Berhasil ditambahkan');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				New Haifa Profile Added!
				</div>');
		
			redirect('Konten/haifa');
		}
	}

	public function updateHaifa()
	{
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		$this->form_validation->set_rules('nomor_sk', 'SK Number', 'trim|required');
		$this->form_validation->set_rules('tanggal_sk', 'SK Date', 'trim|required');
		$this->form_validation->set_rules('nama_direktur', 'Director Name', 'trim|required');
		$this->form_validation->set_rules('alamat_kantor', 'Office Address', 'trim|required');
		$this->form_validation->set_rules('akreditasi', 'Accreditation', 'trim|required');
		$this->form_validation->set_rules('tanggal_akreditasi', 'Accreditation Date', 'trim|required');
		$this->form_validation->set_rules('lembaga_akreditasi', 'Accreditation Agency', 'trim|required');
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		if ($this->form_validation->run() == false) {
			redirect('Konten/haifa');
		} else{
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('haifa', [
				'status' => $this->input->post('status'),
				'nomor_sk' => $this->input->post('nomor_sk'),
				'tanggal_sk' => $this->input->post('tanggal_sk'),
				'nama_direktur' => $this->input->post('nama_direktur'),
				'alamat_kantor' => $this->input->post('alamat_kantor'),
				'akreditasi' => $this->input->post('akreditasi'),
				'tanggal_akreditasi' => $this->input->post('tanggal_akreditasi'),
				'lembaga_akreditasi' => $this->input->post('lembaga_akreditasi')
			]);
			$this->session->set_flashdata('flash', 'Berhasil diubah');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Haifa Profile Updated!
				</div>');
			redirect('Konten/haifa');
		}
	}

	public function deleteHaifa($id)
	{
		$this->db->delete('haifa', ['id' => $id]);
		$this->session->set_flashdata('flash', 'Berhasil dihapus');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Haifa Profile Deleted!
			</div>');
		redirect('Konten/haifa');
	}

	public function kontak()
	{
		$data['title'] = "Kontak Person";
		$data['kontak'] = $this->db->get('kontak')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('nama_lengkap', 'Full Name', 'trim|required');
		$this->form_validation->set_rules('jabatan', 'Position', 'trim|required');
		$this->form_validation->set_rules('cabang', 'Branch office', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('no_hp', 'Phone Number', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('konten/kontak', $data);
			$this->load->view('templates/footer');
		} else{
			$this->db->insert('kontak', [
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'jabatan' => $this->input->post('jabatan'),
				'cabang' => $this->input->post('cabang'),
				'email' => $this->input->post('email'),
				'no_hp' => $this->input->post('no_hp')
			]);
			$this->session->set_flashdata('flash', 'Berhasil ditambahkan');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				New Contact Person Added!
				</div>');
		
			redirect('Konten/kontak');
		}
	}

	public function updateKontak()
	{
		$this->form_validation->set_rules('nama_lengkap', 'Full Name', 'trim|required');
		$this->form_validation->set_rules('jabatan', 'Position', 'trim|required');
		$this->form_validation->set_rules('cabang', 'Branch office', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('no_hp', 'Phone Number', 'trim|required');
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		if ($this->form_validation->run() == false) {
			redirect('Konten/kontak');
		} else{
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('kontak', [
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'jabatan' => $this->input->post('jabatan'),
				'cabang' => $this->input->post('cabang'),
				'email' => $this->input->post('email'),
				'no_hp' => $this->input->post('no_hp')
			]);
			$this->session->set_flashdata('flash', 'Berhasil diubah');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Contact Person Updated!
				</div>');
			redirect('Konten/kontak');
		}
	}

	public function deleteKontak($id)
	{
		$this->db->delete('kontak', ['id' => $id]);
		$this->session->set_flashdata('flash', 'Berhasil dihapus');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Contact Person Deleted!
			</div>');
		redirect('Konten/kontak');
	}

	public function strukturOrganisasi()
	{
		$data['title'] = "Struktur Organisasi";
		$data['struktur'] = $this->db->get('struktur')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('nama', 'Full Name', 'trim|required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
		$this->form_validation->set_rules('atasan', 'Atasan', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('konten/struktur-organisasi', $data);
			$this->load->view('templates/footer');
		} else{
			$upload_image = $_FILES['foto']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
				$config['upload_path'] = './assets/img/struktur-organisasi';
				$config['max_size']     = '2048';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('foto')) {
					$new_image = $this->upload->data('file_name');
					$this->db->insert('struktur', [
						'nama' => $this->input->post('nama'),
						'jabatan' => $this->input->post('jabatan'),
						'parent_id' => $this->input->post('atasan'),
						'foto' => $new_image
					]);
					$this->session->set_flashdata('flash', 'Berhasil ditambahkan');
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
						New Organization Structure Added!
						</div>');
				} else{
					$this->session->set_flashdata('flash_error', 'Gagal diunggah');
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
				}
			} else{
				$this->session->set_flashdata('flash_gagal', 'Foto Wajib diupload');
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					Foto Wajib diupload!
					</div>');
			}
			redirect('Konten/strukturOrganisasi');
		}
	}

	public function updateStruktur()
	{
		$this->form_validation->set_rules('nama', 'Full Name', 'trim|required');
		$this->form_validation->set_rules('jabatan', 'Position', 'trim|required');
		$this->form_validation->set_rules('atasan', 'Atasan', 'trim|required');
		$struktur = $this->db->get_where('struktur', ['id' => $this->input->post('id')])->row_array();
		if ($this->form_validation->run() == false) {
			redirect('Konten/strukturOrganisasi');
		} else{
			$upload_image = $_FILES['foto']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png|svg';
				$config['upload_path'] = './assets/img/struktur-organisasi';
				$config['max_size']     = '2048';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('foto')) {
					$old_image = $struktur['foto'];
					if ($old_image !='default.jpg') {
						unlink(FCPATH.'assets/img/struktur-organisasi/'.$old_image);
					} 
					$new_image = $this->upload->data('file_name');
					$this->db->set('foto', $new_image);
				} else{
					$this->session->set_flashdata('flash_error', 'Gagal diunggah');
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
					redirect('Konten/strukturOrganisasi');
				}
			}
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('struktur', [
				'nama' => $this->input->post('nama'),
				'jabatan' => $this->input->post('jabatan'),
				'parent_id' => $this->input->post('atasan'),
				]);
			$this->session->set_flashdata('flash', 'Berhasil diubah');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Structure Updated!
				</div>');
			redirect('Konten/strukturOrganisasi');
		}
	}

	public function deleteStruktur($id)
	{
		$this->db->delete('struktur', ['id' => $id]);
		$this->session->set_flashdata('flash', 'Berhasil dihapus');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Structure Deleted!
			</div>');
		redirect('Konten/strukturOrganisasi');
	}

	

	public function getUpdatePengumuman(){
		echo json_encode($this->Konten_model->getPengumumanById($this->input->post('id')));
	}
	public function getUpdateBerita(){
		echo json_encode($this->Konten_model->getBeritaById($this->input->post('id')));
	}
	public function getUpdatePeraturan(){
		echo json_encode($this->Konten_model->getPeraturanById($this->input->post('id')));
	}
	public function getUpdateStruktur($id = null){
		echo json_encode($this->Konten_model->getStrukturById($id));
	}
	public function getUpdateHaifa(){
		echo json_encode($this->Konten_model->getHaifaById($this->input->post('id')));
	}
	public function getUpdateKontak(){
		echo json_encode($this->Konten_model->getKontakById($this->input->post('id')));
	}
	public function getUpdateBlog(){
		echo json_encode($this->Konten_model->getBlogById($this->input->post('id')));
	}
	
	
}