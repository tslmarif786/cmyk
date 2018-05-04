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
						Party Registration
						<small>Add New</small>
					</h1>
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url('topuser/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
						<li class="active">Party Registration</li>
					</ol>
				</section>


                <!-- Main content -->
                <section class="content">

                    <div class="row">
						<form name="frmParty" method="post" id="frmParty" action="<?php echo base_url('topuser/master/registration_process');?>">
                        <div class="col-md-6">
							
                            <div class="box box-danger">
                                <div class="box-header">
                                    <h3 class="box-title">General Info</h3>
                                </div>
                                <div class="box-body">
									<div class="form-group">
                                        <label>Party / Company Name: <span>*</span></label> 
                                        <input type="text" class="form-control" placeholder="Enter party name" name="pname" id="pname" />
										<input type="hidden" name="pid" id="pid">
                                    </div><!-- /.form group -->
									<div class="form-group">
                                        <label>Contact Person Name: </label>
                                        <input type="text" class="form-control" placeholder="Enter contact person name" name="cpname" id="cpname"/>
                                    </div>
									
									<div class="form-group">
                                        <label>Email Address: <span>*</span></label>
										<div class="input-group">
											<div class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </div>
											<input type="text" class="form-control" placeholder="e.g. test@xyz.com (Login Id)" name="email_id" id="email_id"/>
										</div>
										
                                    </div>
									
                                    <div class="form-group">
                                        <label>Mobile No. <span>*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-mobile"></i>
                                            </div>
                                            <input type="text" class="form-control" data-inputmask='"mask": "9999999999"' data-mask name="mobile_num" id="mobile_num" placeholder="e.g.  9999999999"/>
                                        </div><!-- /.input group -->
                                    </div>
									
									<div class="form-group">
                                        <label>TIN No.</label>
                                        <input type="text" class="form-control" placeholder="Enter TIN No." name="tin_num" id="tin_num"/>
                                    </div>
									
																		
									<!-- radio -->
                                    <div class="form-group"> 
										 <label>Party Type <span>*</span></label>
                                        <div class="input-group">	
											<label for="rdo_S" style="padding-right:30px;">
												<input style="width:50%" type="radio" name="rdo_ptype" id="rdo_S"  value="S" class="flat-red"/> Self
											</label>
											<label for="rdo_O">
												<input type="radio" name="rdo_ptype" id="rdo_O" value="O" class="flat-red"/> Other
											</label>
										</div>	
                                    </div>
									
									<div class="form-group">
                                        <label>Party Limit <span>*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter party limit" name="plimit" id="plimit"/>
                                    </div>
									
									<div class="form-group">
                                        <label>Opening Balance <span>*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter opening balance for a new financial year" name="opening_bal" id="opening_bal"/>
                                    </div>
									
									<div class="form-group">
                                        <label>Bill Opening Balance <span>*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter opening balance for a new bill" name="bill_open_bal" id="bill_open_bal"/>
                                    </div>
                           
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                        </div><!-- /.col (left) -->
						
						
                        <div class="col-md-6">
                            <div class="box box-success">
                                <div class="box-header">
                                    <h3 class="box-title">Office Address Info</h3>
                                </div>
                                <div class="box-body">
                                    <!-- Office Address -->
                                    <div class="form-group">
                                        <label>Office Address:</label>
                                        <input type="text" class="form-control" placeholder="Enter office address" name="oadds" id="oadds"/><!-- /.input group -->
                                    </div><!-- /.form group -->
									
									<!-- Office City -->
                                    <div class="form-group">
                                        <label>Office City:</label>
                                        <input type="text" class="form-control" placeholder="Enter office city" name="ocity" id="ocity"/><!-- /.input group -->
                                    </div><!-- /.form group -->
									
									<!-- Office State -->
									<?php 
									$state_options = '';
									foreach($state_list as $key=>$row){
										$state_options .= '<option value="'.$row['state'].'">'.$row['state'].'</option>';
									} ?>
                                    <div class="form-group">
                                        <label>Office State:</label>
                                        <select class="form-control" name="ostate" id="ostate">
											<option value="">---Select---</option>
											<?php echo $state_options;?>
										</select>
										<!-- /.input group -->
                                    </div><!-- /.form group -->
									
									<!-- Office Pincode -->
                                    <div class="form-group">
                                        <label>Office Pincode:</label>
                                        <input type="text" class="form-control" placeholder="Enter office pincode" data-inputmask='"mask": "999999"' data-mask name="opincode" id="opincode"/><!-- /.input group -->
                                    </div><!-- /.form group -->

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
							
							<div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Factory Address Info <br><label for="chk-fadds" style="font-size:14px;"><input type="checkbox" name="chk-fadds" id="chk-fadds" class="flat-red"/> Select if factory address is same as office address</label></h3>
                                </div>
                                <div class="box-body" style="margin-top: -20px;">
                                    <!-- Factory Address -->
                                    <div class="form-group">
                                        <label>Factory Address:</label>
                                        <input type="text" class="form-control" placeholder="Enter factory address" name="fadds" id="fadds"/><!-- /.input group -->
                                    </div><!-- /.form group -->
									
									<!-- Factory City -->
                                    <div class="form-group">
                                        <label>Factory City:</label>
                                        <input type="text" class="form-control" placeholder="Enter factory city" name="fcity" id="fcity"/><!-- /.input group -->
                                    </div><!-- /.form group -->
									
									<!-- Factory State -->
                                    <div class="form-group">
                                        <label>Factory State:</label>
                                       <select class="form-control" name="fstate" id="fstate">
											<option value="">---Select---</option>
											<?php echo $state_options;?>
										</select><!-- /.input group -->
                                    </div><!-- /.form group -->
									
									<!-- Factory Pincode -->
                                    <div class="form-group">
                                        <label>Factory Pincode:</label>
                                        <input type="text" class="form-control" placeholder="Enter factory pincode" data-inputmask='"mask": "999999"' data-mask name="fpincode" id="fpincode"/><!-- /.input group -->
                                    </div><!-- /.form group -->

                                </div><!-- /.box-body -->
								
                            </div><!-- /.box -->
							
                            
                        </div><!-- /.col (right) -->
						
						<div class="col-md-12">
                        
								<div class="box-body">
									<div class="form-group">
										<button type="submit" class="btn btn-primary" style="width:100%">Submit</button>
									</div>
								</div>
						</div>
						</form>
						
						<!--Listing-->
						<div class="col-md-12">
							<div class="box box-success">
                                <div class="box-header">
                                    <h3 class="box-title">Party Listing</h3>
                                </div>
							<div class="box-body table-responsive">
								<table id="party-listing" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Name</th>
											<th>Email ID</th>
											<th>Mobile</th>
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
		$(function(){
			$('#pid').val('');
			//---Populating Party Table
			var party_listing = '';
			var party_records = <?php echo json_encode($party_list)?>;
			$.each(party_records, function(index, record){
				party_listing += '<tr id="'+index+'" style="cursor:pointer;" class="party-row">';
				party_listing += '<td>'+ record.pname +'</td>';
				party_listing += '<td>'+ record.email_id +'</td>';
				party_listing += '<td>'+ record.mobile_num +'</td>';
				party_listing += '</tr>';
			});
			$("#party-listing tbody").html(party_listing);
			$("#party-listing").dataTable();
			
			$(document).on('click',"#party-listing tbody tr", function(){
				var selectedParty = party_records[$(this).attr('id')];
				$('#pid').val(selectedParty.id);
				$('#pname').val(selectedParty.pname);
				$('#cpname').val(selectedParty.cpname);
				$('#email_id').val(selectedParty.email_id);
				$('#mobile_num').val(selectedParty.mobile_num);
				$('#tin_num').val(selectedParty.tin_num);
				$('[for=rdo_'+selectedParty.ptype+']').trigger('click');
				$('#rdo_'+selectedParty.ptype).attr('checked', true);
				
				$('#plimit').val(selectedParty.plimit);
				$('#opening_bal').val(selectedParty.opening_bal);
				$('#bill_open_bal').val(selectedParty.bill_open_bal);
				
				$('#oadds').val(selectedParty.oadds);
				$('#ocity').val(selectedParty.ocity);
				$('#ostate').val(selectedParty.ostate);
				
				if(selectedParty.opincode>0)
					$('#opincode').val(selectedParty.opincode);
				else
					$('#opincode').val('');
				
				$('#fadds').val(selectedParty.fadds);
				$('#fcity').val(selectedParty.fcity);
				$('#fstate').val(selectedParty.fstate);
				
				if(selectedParty.fpincode>0)
					$('#fpincode').val(selectedParty.fpincode);
				else
					$('#fpincode').val('');
					
				 $('body,html').animate({
					scrollTop: 100
				}, 700);
				
			});
		});
		
		//---Form Validation
		$(function(){
			$("#frmParty").validate({
				ignore  : [],  
				rules   : {
				//--------------Personal Information -----------------------
					pname   	: {required: true},
					//email_id	: {required:true, email:true},
					mobile_num	: {required:true},
					rdo_ptype	: {required:true},
					plimit		: {required:true},
					opening_bal	: {required:true},
				},
				messages: {
				//--------------Personal Information -----------------------	
					pname: {
						required: "* Please enter company name."
					},
					//email_id : {required:"* Please enter email address.", email:"Please enter valid email address."}
				},
				errorPlacement: function(error, element){	
					//element.attr("value",error.text());
					//element.parent().append(error.html());
					//console.log(element.attr('id'));
					element.parent().addClass('has-error').removeClass('has-success');
					//element.parent().append(error);
				}
			});
			
			$("#frmParty :input").focus(function(){
				if($.trim($(this).val())==''){
					$(this).parent().removeClass('has-error has-success');
				}
			});
			
			$("#frmParty :input").focusout(function(){
				var element_id = $(this).attr('id');
				var check=$("#frmParty").validate().element("#"+element_id);
					
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
		$(function() { <?php /*
			//Datemask dd/mm/yyyy
			$("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
			//Datemask2 mm/dd/yyyy
			$("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
			//Money Euro
			$("[data-mask]").inputmask();

			//Date range picker
			$('#reservation').daterangepicker();
			//Date range picker with time picker
			$('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
			//Date range as a button
			$('#daterange-btn').daterangepicker(
				{
					ranges: {
						'Today': [moment(), moment()],
						'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
						'Last 7 Days': [moment().subtract('days', 6), moment()],
						'Last 30 Days': [moment().subtract('days', 29), moment()],
						'This Month': [moment().startOf('month'), moment().endOf('month')],
						'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
					},
					startDate: moment().subtract('days', 29),
					endDate: moment()
				},
				function(start, end) {
					$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
				}
			);

			//Timepicker
			$(".timepicker").timepicker({
				showInputs: false
			});
			*/ ?>
			$("[data-mask]").inputmask();
			
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
			
			$('label[for=rdo_S]').bind('click', function(){
				$('#rdo_S').attr('checked',true);
				$('#rdo_O').attr('checked',false);
			});
			
			$('label[for=rdo_O]').bind('click', function(){
				$('#rdo_S').attr('checked',false);
				$('#rdo_O').attr('checked',true);
			});
			
			$('label[for=chk-fadds]').bind('click', function(){
				if($(this).find('div.checked').length>0){
					$('#fadds').val($('#oadds').val());
					$('#fcity').val($('#ocity').val());
					$('#fstate').val($('#ostate').val());
					$('#fpincode').val($('#opincode').val());
				}
				else{
					$('#fadds').val('');
					$('#fcity').val('');
					$('#fstate').val('');
					$('#fpincode').val('');
				}
			});
		});
	</script>