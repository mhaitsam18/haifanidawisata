<!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Dashboard"></div>
        <?= $this->session->flashdata('message'); ?>
        <div class="row">
        	<div class="col-lg-8">
        		<form action="<?= base_url('DataMaster/dashboard') ?>" method="post">
                    <input type="hidden" name="id" id="id" value="<?= $dashboard['id'] ?>">
        			<div class="form-group row">
        				<label for="header" class="col-sm-2 col-form-label">Header</label>
        				<div class="col-sm-10">
        					<input type="text" class="form-control" id="header" name="header" value="<?= $dashboard['header'] ?>">
        					<?= form_error('header','<small class="text-danger pl-3">','</small>') ?>
        				</div>
        			</div>
                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" name="title" value="<?= $dashboard['title'] ?>">
                            <?= form_error('title','<small class="text-danger pl-3">','</small>') ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="content" class="col-sm-2 col-form-label">Content</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="content" name="content" rows="3"><?= $dashboard['content'] ?></textarea>
                            <?= form_error('content','<small class="text-danger pl-3">','</small>') ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="footer" class="col-sm-2 col-form-label">Footer</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="footer" name="footer" value="<?= $dashboard['footer'] ?>">
                            <?= form_error('footer','<small class="text-danger pl-3">','</small>') ?>
                        </div>
                    </div>
        			<div class="form-group row">
                        <label for="icon" class="col-sm-2 col-form-label">Icon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="icon" name="icon" value="<?= $dashboard['icon'] ?>">
                            <?= form_error('icon','<small class="text-danger pl-3">','</small>') ?>
                        </div>
                    </div>
                    <div class="form-group row">
        				<div class="col-sm">
        					<button type="submit" class="btn btn-primary float-right">Save</button>
        				</div>
        			</div>
        			
        		</form>
        	</div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>