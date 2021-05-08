<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h2><b>List Sy_menu</b></h2>
                    <?php if ($this->session->userdata('message') != '') {?>
                    <div class="alert alert-success alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                <?=$this->session->userdata('message')?> <a class="alert-link" href="#"></a>
                    </div>
                 <?php }?>
                </div>
                <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-8">
                <?php echo anchor(site_url('sy_menu/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            
            
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('sy_menu/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('sy_menu'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
		<th class="text-center">Label</th>
		<th class="text-center">Redirect</th>
		<th class="text-center">Url</th>
		<th class="text-center">Parent</th>
		<th class="text-center">Icon</th>
		<th class="text-center">Note</th>
		<th class="text-center">Order No</th>
		<th class="text-center">Action</th>
            </tr>
            </thead>
			<tbody><?php
            foreach ($sy_menu_data as $sy_menu)
            { ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $sy_menu->label ?></td>
			<td><?php echo $sy_menu->redirect==0?"No":"Yes" ?></td>
			<td><?php echo $sy_menu->url ?></td>
			<td><label><?php echo $sy_menu->parent==0?"ROOT":$this->Sy_menu_model->get_by_id($sy_menu->parent)->label ?></label></td>
			<td><?php echo '<i class="fa '.$sy_menu->icon.'"></i> '. $sy_menu->icon ?></td>
			<td><?php echo $sy_menu->note ?></td>
			<td><?php echo $sy_menu->order_no ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('sy_menu/read/'.$sy_menu->id_menu),'Read','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('sy_menu/update/'.$sy_menu->id_menu),'Update','class="text-navy"'); 
				echo ' | '; 
				echo anchor(site_url('sy_menu/delete/'.$sy_menu->id_menu),'Delete','class="text-navy" onclick="javascript: return confirm(\'Yakin hapus data?\')"'); 
				?>
			</td>
		</tr>
                
                <?php
            }
            ?>
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('sy_menu/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
        </div>
    </div>
    </div>
    </div>
    </body>
</html>