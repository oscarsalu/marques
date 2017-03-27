
<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
       <form class="form-horizontal" method="post" action="<?= site_url('stock/create_stock_item') ?>">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-truck"></i>Add stock_item</h3>

          <div class="box-tools pull-right">
                  <div class="btn-group">
                
                  <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"  title="vtypes">  stock_items
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?= site_url('stock/stock_items'); ?>"><i class="fa fa-truck"></i>stock_item</a></li>
                     <li class="divider"></li>
                    <li><a href="<?= site_url('stock/create_stock_item'); ?>"><i class="fa fa-plus"></i>Create stock_items</a></li>
                   
                  </ul>
                </div>
                 <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"  title="vtypes">stock
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?= site_url('stock/stocks'); ?>"><i class="fa fa-car"></i>stocks</a></li>
                     <li class="divider"></li>
                    <li><a href="<?= site_url('stock/create_stock'); ?>"><i class="fa fa-plus"></i>Create a stock</a></li>
                   
                  </ul>
                </div>
                    <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"  title="vtypes">Drivers
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?= site_url('stock/drivers'); ?>"><i class="fa fa-user"></i>Drivers</a></li>
                     <li class="divider"></li>
                    <li><a href="<?= site_url('stock/create_driver'); ?>"><i class="fa fa-plus"></i>Add a Driver</a></li>
                   
                  </ul>
                </div>
          </div>
        </div>
        <div class="box-body">

   
     <?php if(isset($message)){ ?>
        <div class="alert alert-success"><?= $message ?></div>
     <?php } ?>



						<table  class="table table-bordered table-striped" id="example1">
						   <thead>
							<tr>
								<th>id</th>
								<th>stock item Name</th>
                <th>Brand</th>
                <th>Price</th>
                <th>Remarks</th>
                <th>Actions</th>
             
							</tr>
							</thead>
							<tbody>
							<?php foreach ($stock_items as $stock_item):?>
								<tr>
						            <td><?= $stock_item->id ?></td>
						            <td><?= $stock_item->item_name ?></td>
                        <td><?= $stock_item->brand ?></td>
                        <td><?= $stock_item->price ?></td>
                        <td><?= $stock_item->description ?></td>
                        
						            <td><a href="<?= site_url('stock/edit_stock_item/'.$stock_item->id); ?>" data-toggle="tooltip"  title="edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                        <a href="<?= site_url('stock/delete_stock_item/'.$stock_item->id); ?>" data-toggle="tooltip"  title="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>           
									</td>
								</tr>
							<?php endforeach;?>
							</tbody>
          </table>


        </div>
        <!-- /.box-body -->
        <div class="box-footer">
 
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

        

