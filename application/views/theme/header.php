<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BPS | Portal</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css
">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/AdminLTE.min.css">

  <link rel="stylesheet" href="<?= base_url() ?>assets/css/skins/skin-blue.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datepicker/datepicker3.css">
  
<!-- jQuery 2.2.3 -->
<script src="<?= base_url() ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>

<!-- Bootstrap 3.3.6 -->
<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/app.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url() ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>assets/plugins/fastclick/fastclick.js"></script>
<!-- datatables --> 
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script>
<script type="text/javascript" src ="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src ="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
<script type="text/javascript" src ="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/dist/js/demo.js"></script>
<!-- page script -->

<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

<script type="text/javascript" language="javascript" src="<?= base_url() ?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" language="javascript" src="<?= base_url() ?>assets/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
</head>
<style type="text/css">

  .dataTables_filter {
   width: 100%;
   float: right;
   text-align: right;
}
.table-bordered,.table-bordered>tbody>tr>td,.table-bordered>thead>tr>th{
  border: 1px solid #3c8dbc;
}
.loader {
  position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background: url('page-loader.gif') 50% 50% no-repeat rgb(249,249,249);
}
.form-control{
  border: 1px solid #3c8dbc;
}
</style>


