
<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
     <?= form_open(uri_string(), 'class="form-horizontal"') ?>
            <div class="box box-success">
        <div class="box-header with-border">
                <h3 class="box-title">Edit facility</h3>

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
        <div class="box-body">
        
          <div class="form-group">
                  <label for="first_name" class="col-sm-2 control-label">Facility id<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                   <input type="text" class="form-control" name="id" value="<?= $facility->id ?> "><span><?= form_error('id'); ?></span>
                  </div>
               </div>
  

            <div class="form-group">
                  <label for="first_name" class="col-sm-2 control-label">Facility Mfl code<span style="color:red">*</span></label>
                  
                  <div class="col-sm-10">
                   <input type="text" class="form-control" name="code" value="<?= $facility->mfl ?>"><span><?= form_error('code'); ?></span>
                  </div>
               </div>
  

          <div class="form-group">
                  <label for="company" class="col-sm-2 control-label">Facility Short name</label>

                  <div class="col-sm-10">
                  <input type="text" class="form-control" name="shortname" value="<?= $facility->shortname ?>">
                  <span><?= form_error('shortname'); ?></span>
                  </div>
          </div>

            <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Facility name<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="fname" value="<?= $facility->name ?>">
                    <span><?= form_error('fname'); ?></span>
                  </div>
               </div>

            <div class="form-group">
                  <label for="phone" class="col-sm-2 control-label">Sub county</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="subcounty" value="<?= $facility->subcounty ?>">
                  </div>
               </div>
                  <div class="form-group">
                  <label for="phone" class="col-sm-2 control-label">County</label>

                  <div class="col-sm-10">
                    <select class="form-control" name="county" >
                      <option><?= $facility->county ?></option>
                      <option>Baringo County</option>
                      <option>Bomet County</option>
                      <option>Bungoma County</option>
                      <option>Busia County</option>
                      <option>Elgeyo Marakwet County</option>
                      <option>Embu County</option>
                      <option>Garissa County</option>
                      <option>Homa Bay County</option>
                      <option>Isiolo County</option>
                      <option>Kajiado County</option>
                      <option>Kakamega County</option>
                      <option>Kericho County</option>
                      <option>Kiambu County</option>
                      <option>Kilifi County</option>
                      <option>Kirinyaga County</option>
                      <option>Kisii County</option>
                      <option>Kisumu County</option>
                      <option>Kitui County</option>
                      <option>Kwale County</option>
                      <option>Laikipia County</option>
                      <option>Lamu County</option>
                      <option>Machakos County</option>
                      <option>Makueni County</option>
                      <option>Mandera County</option>
                      <option>Meru County</option>
                      <option>Migori County</option>
                      <option>Marsabit County</option>
                      <option>Mombasa County</option>
                      <option>Muranga County</option>
                      <option>Nairobi County</option>
                      <option>Nakuru County</option>
                      <option>Nandi County</option>
                      <option>Narok County</option>
                      <option>Nyamira County</option>
                      <option>Nyandarua County</option>
                      <option>Nyeri County</option>
                      <option>Samburu County</option>
                      <option>Siaya County</option>
                      <option>Taita Taveta County</option>
                      <option>Tana River County</option>
                      <option>Tharaka Nithi County</option>
                      <option>Trans Nzoia County</option>
                      <option>Turkana County</option>
                      <option>Uasin Gishu County</option>
                      <option>Vihiga County</option>
                      <option>Wajir County</option>
                      <option>West Pokot County</option>
                    </select>
                  </div>
               </div>
               <?php echo form_hidden('id', $facility->id);?>
             <div class="box-footer">
             <button type="reset" class="btn btn-xs btn-danger pull-left"> cancel </button>
         <?php echo form_submit('submit', 'save changes','class="btn btn-xs btn-success pull-right"');?>
        </div>

    


      
            </div><!-- /.box-body -->
           </div><!--box box-success-->

       <?php echo form_close();?>
          </div>
          </div>
       </section>


