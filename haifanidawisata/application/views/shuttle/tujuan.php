<div class="form-group">
    <label for="exampleFormControlSelect2">Pilih Tujuan</label>
    <select class="form-control" id="exampleFormControlSelect2" name="tujuan" required>
    	<option>---Pilih---</option>
    	<?php 
    	foreach ($tujuan as $row) {
            $tujuan = $row['tujuan'];
            ?>
            <option value="<?php echo "$tujuan"; ?>"><?php echo "$tujuan"; ?></option>
            <?php
        }
    	 ?>
    </select>
</div>