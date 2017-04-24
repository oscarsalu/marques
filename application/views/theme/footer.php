</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
     Created by Alois
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">ALGOMINE TECH LTD</a>.</strong> All rights reserved.
  </footer>

<script>
  $(function () {
   
    $('#example1').DataTable({
      dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
      "processing":true,
      "searching": true,
     
    });
   

      $('#datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
        $('#altdatepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    
    $('.date_input').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
        
  });
</script>
<script >
  $('#select_all').click(function(event) {
  if(this.checked) {
      // Iterate each checkbox
      $(':checkbox').each(function() {
          this.checked = true;
      });
  }
  else {
    $(':checkbox').each(function() {
          this.checked = false;
      });
  }


});
</script>
<script language="javascript" type="text/javascript">
	
	var newwindow;
	function poptastic(url,h,w)
	{ 
		var ht=600;
		var wd=900;
		newwindow=window.open(url,'name','height='+ht+',width='+wd+',scrollbars=yes,left=250,top=80');
		if (window.focus) {newwindow.focus()}
	}
      </script>
</body>

</html>
