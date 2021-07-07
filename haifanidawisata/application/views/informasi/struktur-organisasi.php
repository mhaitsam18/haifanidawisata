<!--content body start-->
<div id="content_wrapper"> 
	<!--page title start-->
	<div class="page_title" data-stellar-background-ratio="0" data-stellar-vertical-offset="0" style="background-image:url(<?= base_url('assets/') ?>images/bg/page_title_bg.jpg);">
		<ul>
			<li>Struktur Organisasi</li>
		</ul>
	</div>
	<!--page title end-->
	<div class="clearfix"></div>
	<div class="container">
		<div class="row push-down-100">
			<div class="col-md-12">
				<div class="card mt-3 mb-3">
					<div class="card-header pb-2 border-bottom">
						<div class="row m-0 w-100">
							<div class="col-lg-auto col-sm-12 mb-md-0 mb-1 text-center">
								<button class="btn btn-primary btn-sm p-1" id="zoom-reset"><i class="fa fa-undo"></i></button>
								<button class="btn btn-primary btn-sm p-1" id="zoom-minus"><i class="fa fa-minus"></i></button>
								<span class="px-1" id="zoom-calc">100%</span>
								<button class="btn btn-primary btn-sm p-1" id="zoom-plus"><i class="fa fa-plus"></i></button>
							</div>
						</div>
					</div>
					<div class="card-content">
						<div class="card-body position-relative">
							<div id="struktur_organisasi-chart" style="height: 570px;"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>