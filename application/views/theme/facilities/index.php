
<!-- Main content -->
    <section class="content">
    <?= form_open('facilities/delete_many'); ?>
      <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
             <div class="box-header with-border">
              <h3 class="box-title" align="center">List of  Facilities</h3>
                                    
                   <div class="box-tools pull-right">
                  <div class="btn-group">
                
                  <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"  title="Facilities">facility options
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?= site_url('facilities/index'); ?>"><i class="fa fa-list"></i>All facilities</a></li>
                     <li><a href="<?= site_url('facilities/create_facility'); ?>"><i class="fa fa-plus"></i>create a facility</a></li>
                    <li><a href="<?= site_url('facilities/import_csv'); ?>"><i class="fa fa-file-excel-o"></i>Import facilities via csv</a></li>
                   <li><a href="<?= site_url('facilities/get_MOH_facilities') ?>"><i class="fa fa-download"></i>import facilities from MOH DHIS</a></li>
                  </ul>
                </div>
       
          </div>
            </div>

    
            <div class="box-body">
              <table id="facilities" class="table table-bordered table-hover">
                <thead>
                <tr> 
                  <th><input type="checkbox" onclick="selectAll();" id="select_all" ></th>                 
                  <th>id</th>
                  <th>Mfl code</th>
                  <th>Name</th> 
                  <th></th>           
                </tr>
                </thead>
                <tbody>
               
                
                    <?php foreach ($facilities as $facility): ?>
                  <tr>
                  <td><input type="checkbox" name="values[]" value="<?= $facility->id ?>"></td>
                   <td><?= $facility->id ?></td>
                   <td><?= $facility->mfl ?></td>
                   <td><?= $facility->name ?></td>
                   <td>
                     <a href="<?= site_url("facilities/edit_facility/".$facility->id); ?>" data-toggle="tooltip"  title="edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                      <a href="<?= site_url("facilities/delete_facility/".$facility->id); ?>" data-toggle="tooltip"  title="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                   </td>
                   </tr>
                 <?php endforeach; ?>
               
                </tbody>
                <tfoot>
                   
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
               <button type="submit" class="btn btn-danger">Bulk Delete</button>
            </div>
          </div>
          <!-- /.box -->
          </div>
          </div>
          </form>
       </section>