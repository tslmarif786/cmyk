<style>
 .form-group label1{
	float: left;
    text-align: right;
    margin-right: 15px;
	width:20%
	}
</style>

</head>
    <body class="skin-blue">
		<header class="header">
			<!-- header logo: style can be found in header.less -->
			<?php $this->load->view('admin/header');?>
		</header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <?php $this->load->view('admin/sidebar');?>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
					<h1>
						Paper / Board Entry
						<small>Add New</small>
					</h1>
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url('topuser/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
						<li class="active">Paper / Board Entry</li>
					</ol>
				</section>


                <!-- Main content -->
                <section class="content">

                    <div class="row">
						<form name="frmPaperBoard" method="post" id="frmPaperBoard" action="<?php echo base_url('topuser/master/paper_board_entry');?>">
                        <div class="col-md-4">
							
                            <div class="box box-danger">
                                <div class="box-header">
                                    <h3 class="box-title">General Info</h3>
                                </div>
                                <div class="box-body">
									<div class="form-group"> 
										 <label>Category <span>*</span></label>
                                        <div class="input-group">	
											<label for="rdo_Paper" style="padding-right:30px;">
												<input style="width:50%" type="radio" name="category" id="rdo_Paper"  value="Paper" class="flat-red" checked="checked"/> Paper
											</label>
											<label for="rdo_Board">
												<input type="radio" name="category" id="rdo_Board" value="Board" class="flat-red"/> Board
											</label>
											<input type="hidden" name="pid" id="pid" />
										</div>	
                                    </div>
									<div class="form-group">
                                        <label>Type: </label>
                                        <input type="text" class="form-control" placeholder="Enter paper / board type" name="type" id="type"/>
                                    </div>
									
									<div class="form-group">
										<button type="submit" name="btnSubmit" id="btnSubmit" class="btn btn-primary" style="width:100%">Save</button>
									</div>
                           
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                        </div><!-- /.col (left) -->
						
						</form>
						
						<!--Listing-->
						<div class="col-md-8">
							<div class="box box-success">
                                <div class="box-header">
                                    <h3 class="box-title">Paper / Board Listing</h3>
                                </div>
							<div class="box-body table-responsive">
								<table id="paper-board-listing" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th id="type-header">Paper Type</th>
										</tr>
									</thead>
									<tbody></tbody>
								</table>
							</div><!-- /.box-body -->
							</div>
						</div>
						
                    </div><!-- /.row -->    

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->
		
		<?php $this->load->view('admin/footer');?>
		
		 <!-- InputMask -->
        <script src="<?php echo res_url();?>admin/js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <script src="<?php echo res_url();?>admin/js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
		
		 <script src="<?php echo res_url();?>admin/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo res_url();?>admin/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
		<script src="<?php echo res_url();?>admin/js/jquery.validate.js" type="text/javascript"></script>
		<script src="<?php echo res_url();?>admin/js/jquery_validation_rules.js" type="text/javascript"></script>
	
	<script type="text/javascript">
		var paper_listing = '';
		var board_listing = '';
		$(function(){
			$('#pid').val('');
			//---Populating Party Table
			
			var paper_board_records = <?php echo json_encode($paper_board_list)?>;
			$.each(paper_board_records, function(index, record){
				if(record.category=='Paper'){
					paper_listing += '<tr id="'+index+'" style="cursor:pointer;" class="paper-row">';
					paper_listing += '<td>'+ record.type +'</td>';
					paper_listing += '</tr>';
				}
				else{
					board_listing += '<tr id="'+index+'" style="cursor:pointer;" class="board-row">';
					board_listing += '<td>'+ record.type +'</td>';
					board_listing += '</tr>';
				}
			});
			
			$("#paper-board-listing tbody").html(paper_listing);
			$("#paper-board-listing").dataTable();
			
			$("#paper-board-listing_wrapper div.col-xs-6").each(function(){
				$(this).removeClass('col-xs-6').addClass('col-md-6');
			});
			
			$(document).on('click',"#paper-board-listing tbody tr", function(){
				var selectedPaperBoard = paper_board_records[$(this).attr('id')];
				$('#pid').val(selectedPaperBoard.id);
				$('#rdo_'+selectedPaperBoard.category).prop('checked',true);
				$('#type').val(selectedPaperBoard.type);
				
				$('#btnSubmit').text('Edit');	
				
				 $('body,html').animate({
					scrollTop: 100
				}, 700);
				
			});
		});
		
		//---Form Validation
		$(function(){
			$("#frmPaperBoard").validate({
				ignore  : [],  
				rules   : {
				//--------------Personal Information -----------------------
					type	: {required:true}
				},
				messages: {
				//--------------Personal Information -----------------------	
					type: {
						required: "* Please enter paper / board type."
					}
				},
				errorPlacement: function(error, element){	
					//element.attr("value",error.text());
					//element.parent().append(error.html());
					//console.log(element.attr('id'));
					element.parent().addClass('has-error').removeClass('has-success');
					//element.parent().append(error);
				}
			});
			
			$("#frmPaperBoard :input").focus(function(){
				if($.trim($(this).val())==''){
					$(this).parent().removeClass('has-error has-success');
				}
			});
			
			$("#frmPaperBoard :input").focusout(function(){
				var element_id = $(this).attr('id');
				var check=$("#frmPaperBoard").validate().element("#"+element_id);
					
				if(check){
					if($.trim($(this).val())==''){
						$(this).parent().removeClass('has-error has-success');
						return false;
					}
					else{
						$(this).parent().removeClass('has-error').addClass('has-success');
					}
				}
				else{
					$(this).parent().addClass('has-error').removeClass('has-success');
				}
			});
			
			
		});
	
	</script>
	
	 <!-- Page script -->
	<script type="text/javascript">
		$(function() { 
			
			//iCheck for checkbox and radio inputs
			$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
				checkboxClass: 'icheckbox_minimal',
				radioClass: 'iradio_minimal'
			});
			//Red color scheme for iCheck
			$('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
				checkboxClass: 'icheckbox_minimal-red',
				radioClass: 'iradio_minimal-red'
			});
			//Flat red color scheme for iCheck
			$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
				checkboxClass: 'icheckbox_flat-red',
				radioClass: 'iradio_flat-red'
			});
			
			$('label[for=rdo_Paper]').bind('click', function(){
				$('#rdo_Paper').attr('checked',true);
				$('#rdo_Board').attr('checked',false);
				$('#type-header').html('Paper Type');
				
				populate_table(paper_listing);
			});
			
			$('label[for=rdo_Board]').bind('click', function(){
				$('#rdo_Paper').attr('checked',false);
				$('#rdo_Board').attr('checked',true);
				$('#type-header').html('Board Type');
				populate_table(board_listing);
			});
			
		});
		
		function populate_table(table_content){
			$('#pid').val('');
			$('#type').val('');
			$('#btnSubmit').text('Save');
			
			$("#paper-board-listing tbody").html(table_content);
			$("#paper-board-listing").dataTable();
				
			$("#paper-board-listing_wrapper div.col-xs-6").each(function(){
				$(this).removeClass('col-xs-6').addClass('col-md-6');
			});
		}
		
	</script>