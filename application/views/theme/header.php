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
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/AdminLTE.min.css">

  <link rel="stylesheet" href="<?= base_url() ?>assets/css/skins/skin-blue.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datepicker/datepicker3.css">
  
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


