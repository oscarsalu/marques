<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title" align="center">List of Moh Facilities</h3>
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
            <table class="table table-bordered">
              <tr>
                <td align="center"></td>
              </tr>
            </table>
            </div>
            
            <div class="box-body">

              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th></th>
                  
                  <th>id</th>
                  <th>shortname</th>
                  <th>Mfl Code</th>
                  <th>Contact Person</th>  
                  <th>Phone</th>           
                </tr>
                </thead>
                <tbody>
                <?php foreach ($response as $facility): ?>
                  <?= form_open('facilities/add') ?>
                <tr>
                    <?=  form_hidden('shortname', $facility['name']) ?>
                    <?=  form_hidden('code', empty($facility['code'])? '': $facility['code']) ?>
                    <?=  form_hidden('person', empty($facility['contactPerson'])? '': $facility['contactPerson']) ?>
                   <td><button class="btn btn-primary" type="submit">Add To EKMS</button></td>
                   <td><input type="text" class="form-control" name="id" value="<?= $facility['id']  ?>" Readonly/></td>
                  
                   <td><?= $facility['name'] ?></td>
                   <td><?php if(!empty($facility['code'])){ echo $facility['code']; } ?></td>
                   <td><?php if(!empty($facility['contactPerson'])){ echo $facility['contactPerson']; } ?></td>
                   <td><?php if(!empty($facility['phoneNumber'])){ echo $facility['phoneNumber']; } ?></td>
                </tr>
                 <?= form_close() ?>
                 <?php endforeach; ?>
                </tbody>
                <tfoot>
          
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
           
          </div>
          <!-- /.box -->
          </div>
          </div>
       </section>
