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
               
            </div>
            
            
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('sy_menu/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" id="q" value="<?php echo @$_GET['q']; ?>">
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-success" onclick="lookup('<?php echo base_url()?>sy_menu/lookup')" >Search</button>
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
		<th class="text-center">Created By</th>
		<th class="text-center">Created At</th>
		<th class="text-center">Updated By</th>
		<th class="text-center">Updated At</th></tr>
            </thead>
			<tbody><?php
            foreach ($sy_menu_data as $sy_menu)
            {
                ?>
                <tr style="cursor: pointer">
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $sy_menu->label ?></td>
			<td><?php echo $sy_menu->redirect ?></td>
			<td><?php echo $sy_menu->url ?></td>
			<td><?php echo $sy_menu->parent ?></td>
			<td><?php echo $sy_menu->icon ?></td>
			<td><?php echo $sy_menu->note ?></td>
			<td><?php echo $sy_menu->order_no ?></td>
			<td><?php echo $sy_menu->created_by ?></td>
			<td><?php echo $sy_menu->created_at ?></td>
			<td><?php echo $sy_menu->updated_by ?></td>
			<td><?php echo $sy_menu->updated_at ?></td>
		</tr>
                
                <?php
            }
            ?>
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
        </div>
        </div>
    </div>
    </div>
    </div>
    </body>
</html>