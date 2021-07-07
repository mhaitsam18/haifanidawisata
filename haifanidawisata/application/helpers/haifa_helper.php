<?php 

function is_logged_in($url = '')
{
	$ci = get_instance();
	if (!$ci->session->userdata('email')) {
		if ($url == '') {
			$ci->session->set_flashdata('message', 'You are not logged in, please login first!');
			redirect('auth');
		} else{
			$ci->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">You are not logged in, please login first!</div>');
			redirect('auth/login?url='.$url);
		}
	}
}
function check_access($role_id, $menu_id)
{
	$ci = get_instance();

	$ci->db->where('role_id', $role_id);
	$ci->db->where('menu_id', $menu_id);
	$result = $ci->db->get('user_access_menu');

	if ($result->num_rows() > 0) {
		return "checked='checked'";
	}
}

function cek_kelengkapan($id_jamaah, $id_kelengkapan)
{
	$ci = get_instance();

	$ci->db->where('id_jamaah', $id_jamaah);
	$ci->db->where('id_kelengkapan', $id_kelengkapan);
	$result = $ci->db->get('kelengkapan_jamaah');

	if ($result->num_rows() > 0) {
		return "checked='checked'";
	}
}

function cek_kelengkapan2($id_jamaah, $id_kelengkapan)
{
	$ci = get_instance();

	$ci->db->where('id_jamaah', $id_jamaah);
	$ci->db->where('id_kelengkapan', $id_kelengkapan);
	$result = $ci->db->get('kelengkapan_jamaah');

	if ($result->num_rows() > 0) {
		return 1;
	} else{
		return 0;
	}
}

function cek_kelengkapan_jamaah($id_jamaah, $id_kelengkapan)
{
	$ci = get_instance();

	$ci->db->where('id_jamaah', $id_jamaah);
	$ci->db->where('id_kelengkapan', $id_kelengkapan);
	$result = $ci->db->get('kelengkapan_jamaah');

	if ($result->num_rows() > 0) {
		return "fas fa-check text-success";
	} else{
		return "fas fa-times text-danger";
	}
}

function get_rowid_cart($id)
{
	$ci = get_instance();
	
	$rowid = '';
	foreach ($ci->cart->contents() as $item) {
		if ($item['id']==$id) {
			$rowid = $item['rowid'];
			break;
		}
	}
	return $rowid;
}

function acak($panjang){
	$karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
	$string = '';
	for ($i = 0; $i < $panjang; $i++) {
		$pos = rand(0, strlen($karakter)-1);
		$string .= $karakter[$pos];
	}
	return $string;
}

function base_url2($value='')
{
    return 'http://localhost/haifanidaadmin/'.$value;
}

function base_url3($value='')
{
    return 'http://localhost/haifanidaagen/'.$value;
}
