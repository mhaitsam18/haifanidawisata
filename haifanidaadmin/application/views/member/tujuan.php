<div class="form-group">
    <label for="tujuan">Pilih Tujuan</label>
    <select class="form-control" id="tujuan" name="tujuan" required>
    	<option>---Pilih---</option>
    	<?php 
    	foreach ($tujuan as $row) {
            $tujuan = $row['tujuan'];
            ?>
            <option value="<?= $tujuan; ?>"><?= $tujuan; ?></option>
            <?php
        }
    	 ?>
    </select>
</div>