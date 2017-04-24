<?php
$ob=(object)$_GET;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../../../fs-css/printable.css" media="all" type="text/css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" language="javascript">
   function print_doc()
  {
		
  		var printers = jsPrintSetup.getPrintersList().split(',');
		// Suppress print dialog
		jsPrintSetup.setSilentPrint(false);/** Set silent printing */

		var i;
		for(i=0; i<printers.length;i++)
		{//alert(i+": "+printers[i]);
		//alert(printers[i]+"="+'<?php echo $_SESSION["smallprinter"];?>');
			if(printers[i].indexOf('<?php echo $_SESSION["smallprinter"];?>')>-1)
			{	//alert(i+": "+printers[i]);
				jsPrintSetup.setPrinter(printers[i]);
			}
			
		}
		//set number of copies to 2
		jsPrintSetup.setOption('numCopies',1);
		jsPrintSetup.setOption('headerStrCenter','');
		jsPrintSetup.setOption('headerStrRight','');
		jsPrintSetup.setOption('headerStrLeft','');
		jsPrintSetup.setOption('footerStrCenter','');
		jsPrintSetup.setOption('footerStrRight','');
		jsPrintSetup.setOption('footerStrLeft','');
		jsPrintSetup.setOption('marginLeft','0');
		jsPrintSetup.setOption('marginRight','0');
		jsPrintSetup.setOption('marginTop','-2');
		jsPrintSetup.setOption('marginBottom','0');
		// Do Print
		jsPrintSetup.printWindow(window);
		
		//window.close();
		//window.top.hidePopWin(true);
		// Restore print dialog
		//jsPrintSetup.setSilentPrint(false); /** Set silent printing back to false */
 
  }
  
  print_doc();
 </script>
 </head>

<body onload="print_doc();">
<?php
           if(!empty($_SESSION['obj'])){
              $obj=get_object_vars($_SESSION['obj']); 
           }
           ?>
           <table class="table table-bordered" border="1">
             <tr>
               <td colspan="6" align="center"><img src="<?= base_url() ?>/images/logo.jpg" alt="logo" width="400px" height="100px"></td>
             </tr>
             <tr>
               <td>Date</td>
                <td><input type="text" readonly name="date" class="form-control" id="datepicker" value="<?php if(!empty($obj['date'])){ echo $obj['date']; } ?>"></td>
                <td>Ref No:</td>
                <td><input type="text" readonly class="form-control" name="ref_no" value="<?php if(!empty($obj['ref_no'])){ echo $obj['ref_no']; } ?>"></td>
                <td>Vehicle</td>
                <td><input type="text" readonly class="form-control" name="fleet" value="<?php if(!empty($obj['fleet'])){ echo $obj['fleet']; } ?>"></td>
             </tr>
             <tr>
                <td>Billers Name</td>
                <td><input type="text" readonly name="created_by" value="<?php echo $this->session->userdata('first_name')." ".$this->session->userdata('last_name'); ?>" class="form-control" ></td>
                <td>Loading Zone:</td>
                <td><input type="text" readonly class="form-control" name="warehouse" value="<?php if(!empty($obj['warehouse'])){ echo $obj['warehouse']; } ?>"><span><?= form_error('warehouse'); ?></span></td>
                <td>driver:</td>
                <td><input type="text" readonly class="form-control" name="driver" value="<?php if(!empty($obj['driver'])){ echo $obj['driver']; } ?>"><span><?= form_error('driver'); ?></span></td>
             </tr>
             <tr>
                <td>Note:</td>
                <td><textarea class="form-control" readonly name="note" id="note"  cols="20" title="note" ><?php if(!empty($obj['note'])){ echo $obj['note']; } ?></textarea><span><?= form_error('note'); ?></span></td>
             </tr>
           </table>
           <hr>
         <hr>
           <table class="table table-bordered" border="1">
              <thead>
                    <tr>
		      <th>Item</th>
		      <th>Qty</th>
		      <th>Cost</th>
		      <th>Total</th>
		      <th>Sender</th>
		      <th>Sender Contact</th>
		      <th>Recipient</th>
		      <th>Recipient Contact</th>
		      <th>Source</th>
		      <th>Destination</th>
                    </tr>                
              </thead>
               <tbody>
                   <?php
                   $total=0;
		   $qty=0;
                   if(!empty($_SESSION['shpitems'])){
		    $shpitems=$_SESSION['shpitems'];//print_r($shpitems);
		    $i=0;
		    $j=count($shpitems);
		    while($j>0){
		    $qty+=$shpitems[$i]['qty'];
		    $total+=$shpitems[$i]['total_amount'];
		    ?>
                    <tr>
		      <td><?php echo $shpitems[$i]['item_name']; ?></td>
		      <td><?php echo $shpitems[$i]['qty']; ?></td>
		      <td><?php echo $shpitems[$i]['cost']; ?></td>
		      <td><?php echo $shpitems[$i]['total_amount']; ?></td>
		      <td><?php echo $shpitems[$i]['customer']; ?></td>
		      <td><?php echo $shpitems[$i]['phone']; ?></td>
		      <td><?php echo $shpitems[$i]['recipient']; ?></td>
		      <td><?php echo $shpitems[$i]['recipienttel']; ?></td>
		      <td><?php echo $shpitems[$i]['source']; ?></td>
		      <td><?php echo $shpitems[$i]['destination']; ?></td>
                    </tr>  
                    <?php 
                    $j--;
                    $i++;
                    }
                   }
                    ?>
              </tbody>
               <tfoot>
                    <tr>
		      <th>Totals</th>
		      <th><?php echo $qty; ?></th>
		      <th>&nbsp;</th>
		      <th><?php echo $total; ?></th>
		      <th>&nbsp;</th>
		      <th>&nbsp;</th>
		      <th>&nbsp;</th>
		      <th>&nbsp;</th>
		      <th>&nbsp;</th>
		      <th>&nbsp;</th>
                    </tr>                
              </tfoot>             
            </table>
</body>
</html>
