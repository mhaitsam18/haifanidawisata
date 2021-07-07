<?php 
$config['base_url'] = 'http://localhost/pempek_resto/';
$config['total_rows'] = 80;
$config['per_page'] = 3;
$config['num_links'] = 2;

//styling
$config['full_tag_open'] = '<nav aria-label="pagination"><ul class="pagination justify-content-center">';
$config['full_tag_close'] = '</nav></ul>';

$config['first_link'] = 'First';
$config['first_tag_open'] = '<li class="page-item">';
$config['first_tag_close'] = '</li>';

$config['last_link'] = 'Last';
$config['last_tag_open'] = '<li class="page-item">';
$config['last_tag_close'] = '</li>';

if ($config['total_rows']>18) {
  $config['next_link'] = '&raquo';
} else{
  $config['next_link'] = 'Next';
}
$config['next_tag_open'] = '
						<li class="page-item">';
$config['next_tag_close'] = '</li>';

if ($config['total_rows']>18) {
  $config['prev_link'] = '&laquo';
} else{
  $config['prev_link'] = 'Next';
}
$config['prev_tag_open'] = '<li class="page-item">';
$config['prev_tag_close'] = '</li>';

$config['cur_tag_open'] = '<li class="page-item active" aria-current="page"><span class="page-link">';
$config['cur_tag_close'] = '</span></li>';

$config['num_tag_open'] = '<li class="page-item">';
$config['num_tag_close'] = '</li>';

$config['attributes'] = array('class' => 'page-link');
 ?>