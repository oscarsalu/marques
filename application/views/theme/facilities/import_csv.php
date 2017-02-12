
<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
    
            <div class="box box-success">
        <div class="box-header with-border">
                <h3 class="box-title">Upload facilities from a csv file</h3>

                <div class="box-tools pull-right">
                  <div class="btn-group">
                
                  <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"  title="Facilities">facility options
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?= site_url('facilities/index')?>"><i class="fa fa-list"></i>All facilities</a></li>
                     <li><a href="<?= site_url('facilities/create_facility'); ?>"><i class="fa fa-plus"></i>create a facility</a></li>
                    <li><a href="<?= site_url('facilities/import_csv'); ?>"><i class="fa fa-file-excel-o"></i>Import facilities via csv</a></li>
                   <li><a href="<?= site_url('facilities/get_MOH_facilities') ?>"><i class="fa fa-download"></i>import facilities from MOH DHIS</a></li>
                  </ul>
                </div>
       
          </div>
        </div><!-- /.box-header -->
        <?php if(($this->session->userdata('message'))): ?>
          <div class="box-body">
           <div class="alert alert-danger"><?= $this->session->userdata('message'); ?></div>
           </div>
         <?php endif; ?>
        <div class="box-body">
       
          <form action="<?php echo site_url();?>/facilities/uploadFacilityData" method="post" enctype="multipart/form-data" > 
            <table class="table table-bordered">
              <tr>
              <td><input type="file" class="form-control" name="userfile" id="userfile"  align="center"/></td>
              <td> <div class="col-lg-offset-3 col-lg-9">
                    <button type="submit" name="submit" class="btn btn-success  ajax" title="Post Api Request">
            <i class="fa fa-upload fa-refresh"></i>  Upload csv</button>
                </div></td>
          
              </tr>
            </table>
            </form>


            </div>
            </div>
       </div>
       </div>
       </section>