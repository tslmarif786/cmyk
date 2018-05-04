	<!-- jQuery 2.0.2 -->
	<script src="<?php echo res_url();?>admin/js/jquery.min.js" type="text/javascript"></script>
	<!-- jQuery UI 1.10.3 -->
	<script src="<?php echo res_url();?>admin/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
	<!-- Bootstrap -->
	<script src="<?php echo res_url();?>admin/js/bootstrap.min.js" type="text/javascript"></script>
	 <!-- AdminLTE App -->
	<script src="<?php echo res_url();?>admin/js/AdminLTE/app.js" type="text/javascript"></script>
	<script type="text/javascript">
	//---Active Menu
		$(function(){ 
			$('.sidebar-menu li').removeClass('active');
		<?php
			if($this->uri->segment(3)){ ?>
				var link_id = '<?php echo $this->uri->segment(3);?>';
				if($('#'+link_id).parents().find('.treeview').length>0){
				$('#'+link_id).parents().eq(0).addClass('active');
				$('#'+link_id).parents().eq(1).addClass('active');
				$('#'+link_id).parent().show();
				//$('#'+link_id).parents().find('.treeview .fa-plus-square-o');
			}<?php
			}
			else { ?>
				var link_id = '<?php echo $this->uri->segment(2);?>';<?php
			}
			?>			
			$('#'+link_id).addClass('active');
			
		});
	</script>
		
          