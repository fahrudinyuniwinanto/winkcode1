 <div class="input-group">
            <input type="hidden" name="vendor" id="vendor" value="<?php echo $vendor; ?>" />
            <input type="text" class="form-control" name="nm_vendor" id="nm_vendor" placeholder="vendor" value="<?php echo $nm_vendor ?>" readonly/>
            <div class="input-group-addon" onclick="lookup('<?=base_url()?>vendor/lookup','vendor');" style="cursor: pointer;">
                <span>Cari</span>
            </div>
        </div>