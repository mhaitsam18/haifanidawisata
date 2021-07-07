<!--content body start-->
<div id="content_wrapper"> 
	<!--page title start-->
	<div class="page_title" data-stellar-background-ratio="0" data-stellar-vertical-offset="0" style="background-image:url(<?= base_url('assets/') ?>images/bg/page_title_bg.jpg);">
		<ul>
			<li><a href="javascript:;">Authentication</a></li>
		</ul>
	</div>
	<!--page title end-->
	<div class="clearfix"></div>
	<!-- 404 error page bg start -->
	<div class="full_width travelite_error_bg">
		<div class="container">
			<div class="row">
				<div class="main_center_error_wrap"> 
					<div class="travelite_error_heading">
						<h3><?= $this->session->flashdata('message') ?></h3>
						<p>^_^</p>
					</div>
					<div class="error_next_prev_links">
						<a href="<?= base_url() ?>" class="home_page">home</a>
						<a href="javascript:history.back()" class="prev_page">Previous Page</a>
					</div>
					<div class="serach_here">or<h5>search here</h5></div>
					<form>
						<div class="bottom_searching_part">
							<input type="text" class="search_page" name="search">
							<button class="btn_search" type="submit"> <i class="fa fa-search"></i> </button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- 404 error page bg end -->
	<!-- counter section End -->
</div>
<!--content body end--> 