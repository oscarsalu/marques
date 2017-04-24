<?php
$ob=(object)$_GET;
foreach ($payments as $payment){};
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
<table class="table table-bordered" border="1">
<tr>
    <td colspan="2" align="center"><img src="<?= base_url() ?>/images/logo.jpg" alt="logo" width="100px" height="50px"></td>
</tr>
<tr>
    <td>Documentno</td>
    <td><?= $payment->id; ?></td>
</tr>
<tr>
    <td>Date</td>
    <td><?= $payment->paidon; ?></td>
</tr>
<tr>
    <td>RefNo</td>
    <td><?= $payment->refno; ?></td>
</tr>
<tr>
    <td>Amount</td>
    <td><?= $payment->paidby; ?></td>
</tr>
<tr>
    <td>Payment Mode</td>
    <td><?= $payment->paymentmode; ?></td>
</tr>
<tr>
    <td>Bank</td>
    <td><?= $payment->bank; ?></td>
</tr>
<tr>
    <td>Bank Receiptno</td>
    <td><?= $payment->receiptno; ?></td>
</tr>
<tr>
    <td>Paid By</td>
    <td><?= $payment->paidby; ?></td>
</tr>
<tr>
    <td>Created By</td>
    <td><?= $payment->createdby; ?></td>
</tr>
</table>
</body>
</html>
