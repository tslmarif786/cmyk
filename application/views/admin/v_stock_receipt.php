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
						Paper Stock Receipt
						<small>Add New</small>
					</h1>
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url('topuser/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
						<li class="active">Paper Stock Receipt</li>
					</ol>
				</section>


                <!-- Main content -->
                <section class="content">

                    <div class="row">
					<?php 
					if($this->session->flashdata('msg')){
						$msg = $this->session->flashdata('msg');
						if($msg['type']=='succ'){ ?>
						<div class="col-md-12">
							<div class="box-body">
								<div class="alert alert-success alert-dismissable">
									<i class="fa fa-check"></i>
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
									<b>Congrats!</b> <?php echo $msg['info'];?>.
								</div>
							</div>
						</div><?php
						}
					}?>
						
						<form name="frmStockRecpt" method="post" id="frmStockRecpt" action="<?php echo base_url('topuser/stock/receiving_process');?>">
						<div class="col-md-6">
							
                            <div class="box box-danger">
                                <div class="box-body"><?php 
									$party_options = '';
									foreach($party_list as $key=>$row){
										$party_options .= '<option value="'.$row['pname'].'">'.$row['pname'].'</option>';
									} ?>
									
									<div class="form-group">
                                        <label>Party / Company: <span>*</span></label>
                                       <select class="form-control" name="pname" id="pname">
											<option value="">---Select---</option>
											<?php echo $party_options;?>
										</select><!-- /.input group -->
										<label style="display:none;">Available Mobile No. <span id="mobile"></span></label>
										<input type="hidden" class="form-control" placeholder="" name="mobile_no" id="mobile_no"/>
                                    </div><!-- /.form group -->
									
									<div class="form-group">
                                        <label>Paper / Board:</label>
                                       <select class="form-control" name="pb_category" id="pb_category">
											<option value="Paper">Paper</option>
											<option value="Board">Board</option>
										</select><!-- /.input group -->
                                    </div><!-- /.form group -->
									
									<div class="form-group">
                                        <label>Paper Type: <span>*</span></label><?php 
										$paper_options = '';
										foreach($paper_types as $key=>$row){
											$paper_options .= '<option value="'.$row['type'].'">'.$row['type'].'</option>';
										} ?>
                                       <select class="form-control" name="pb_type" id="pb_type">
											<option value="">---Select---</option>
											<?php echo $paper_options;?>
										</select><!-- /.input group -->
                                    </div><!-- /.form group -->
									
									<div class="form-group"> 
										<label>Paper Size: <span>*</span></label>
                                        <div class="input-group">	
											<label for="rdo_inch" style="padding-right:30px;">
												<input style="width:50%" type="radio" name="pb_sizein" id="rdo_inch"  value="inch" class="flat-red" checked="checked"/> inch
											</label>
											<label for="rdo_cm">
												<input type="radio" name="pb_sizein" id="rdo_cm" value="cm" class="flat-red"/> centimeter
											</label>
										</div>	
										<input type="text" class="form-control" placeholder="Enter paper size. e.g. 22x30" name="pb_size" id="pb_size"/>
									
                                    </div>
									
									<div class="form-group"> 
										 <label>GSM / Weight <span>*</span></label>
                                        <div class="input-group">	
											<label for="rdo_GSM" style="padding-right:30px;">
												<input style="width:50%" type="radio" name="gsm_wt" id="rdo_GSM"  value="Paper" class="flat-red" checked="checked"/> GSM
											</label>
											<label for="rdo_Weight">
												<input type="radio" name="gsm_wt" id="rdo_Weight" value="Weight" class="flat-red"/> Weight
											</label>
										</div>	
										<input type="text" class="form-control" placeholder="Enter GSM value" name="gsm" id="gsm"/>
										<input style="display:none;" type="text" class="form-control" placeholder="Enter weight in Kg. e.g. 39" name="weight" id="weight"/>
                                    </div>
									                           
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                        </div><!-- /.col (left) -->
						
						
                        <div class="col-md-6">
                            <div class="box box-success">
                                <div class="box-body">
									<div class="form-group">
                                        <label>Qunatity: <span>*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter receipt quantity" name="rqty" id="rqty"/><!-- /.input group -->
                                        <input type="hidden" class="form-control" placeholder="" name="bal_qty" id="bal_qty"/><!-- /.input group -->
                                    </div>
									
									<div class="form-group">
                                        <label>Date : <span>*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input id="added_on" name="added_on" type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">
                                        </div><!-- /.input group -->
                                    </div>
									
									<!-- Particulars -->
                                    <div class="form-group">
                                        <label>Particulars:</label>
                                        <textarea name="particulars" id="particulars" class="form-control" rows="3" placeholder="Enter ..."></textarea><!-- /.input group -->
                                    </div><!-- /.form group -->
									
									<!-- Narration -->
                                    <div class="form-group">
                                        <label>Narration:</label>
                                        <textarea name="narration" id="narration" class="form-control" rows="5" placeholder="Enter ..."></textarea><!-- /.input group -->
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
												
                    </div><!-- /.row -->  

					<div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Responsive Hover Table</h3>
                                    <div class="box-tools">
                                        <div class="input-group">
                                            <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tr>
                                            <th>Sl.No.</th>
                                            <th>Party Name</th>
                                            <th>Paper Type</th>
                                            <th>size</th>
                                            <th>Quantity</th>
                                        </tr>
                                        <tr>
                                            <td>183</td>
                                            <td>John Doe</td>
                                            <td>11-7-2014</td>
                                            <td><span class="label label-success">Approved</span></td>
                                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                        </tr>
                                        <tr>
                                            <td>219</td>
                                            <td>Jane Doe</td>
                                            <td>11-7-2014</td>
                                            <td><span class="label label-warning">Pending</span></td>
                                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                        </tr>
                                        <tr>
                                            <td>657</td>
                                            <td>Bob Doe</td>
                                            <td>11-7-2014</td>
                                            <td><span class="label label-primary">Approved</span></td>
                                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                        </tr>
                                        <tr>
                                            <td>175</td>
                                            <td>Mike Doe</td>
                                            <td>11-7-2014</td>
                                            <td><span class="label label-danger">Denied</span></td>
                                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                        </tr>
                                    </table>
                                </div><!-- /.box-body -->
								<div class="box-footer clearfix">
                                    <ul class="pagination pagination-sm no-margin pull-right">
                                        <li><a href="#">&laquo;</a></li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">&raquo;</a></li>
                                    </ul>
                                </div>
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->
		
		<?php $this->load->view('admin/footer');?>
		
		 <!-- InputMask -->
        <script src="<?php echo res_url();?>admin/js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <script src="<?php echo res_url();?>admin/js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="<?php echo res_url();?>admin/js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
		
		<script src="<?php echo res_url();?>admin/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo res_url();?>admin/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
		<script src="<?php echo res_url();?>admin/js/jquery.validate.js" type="text/javascript"></script>
		<script src="<?php echo res_url();?>admin/js/jquery_validation_rules.js" type="text/javascript"></script>
		
		
	<script type="text/javascript">
		
		//---Data Tables----
		
		$(function(){
			$('#pid').val('');
			//---Populating Party Table
			var stock_receipt_listing = '';
			var party_records = <?php echo json_encode($party_list)?>;
			$.each(party_records, function(index, record){
				stock_receipt_listing += '<tr id="'+index+'" style="cursor:pointer;" class="party-row">';
				stock_receipt_listing += '<td>'+ record.pname +'</td>';
				stock_receipt_listing += '<td>'+ record.email_id +'</td>';
				stock_receipt_listing += '<td>'+ record.mobile_num +'</td>';
				stock_receipt_listing += '</tr>';
			});
			$("#party-listing tbody").html(stock_receipt_listing);
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
		//---End Data Table Code Here
	
		var pb_category = 'Paper';
		var pb_sizein = 'inch';
		$(function(){
			$("#frmStockRecpt").validate({
				ignore  : [],  
				rules   : {
				//--------------Personal Information -----------------------
					pname   	: {required: true},
					pb_type		: {required:true},
					pb_size		: {required:true},
					gsm			: {required:true},
					weight		: {required:true},
					gsm_wt		: {required:true},
					rqty		: {required:true},
					added_on	: {required:true}
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
			
			$("#frmStockRecpt :input").focus(function(){
				if($.trim($(this).val())==''){
					$(this).parent().removeClass('has-error has-success');
				}
			});
			
			$("#frmStockRecpt :input").focusout(function(){
				var element_id = $(this).attr('id');
				var check=$("#frmStockRecpt").validate().element("#"+element_id);
					
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
			
			//-----------Form submit--------
			$('#frmStockRecpt').submit(function() {
			   if($(this).valid()){  
			   }
			});	
			
			
		});
	
	</script>
	
	 <!-- Page script -->
	<script type="text/javascript">
		$(function() { 
			//Datemask dd/mm/yyyy
			$("#added_on").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
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
			
			$('label[for=rdo_GSM]').bind('click', function(){
				$('#rdo_GSM').attr('checked',true);
				$('#rdo_Weight').attr('checked',false);
				$('#gsm').show();
				$('#weight').hide();
			});
			
			$('label[for=rdo_Weight]').bind('click', function(){
				$('#rdo_GSM').attr('checked',false);
				$('#rdo_Weight').attr('checked',true);
				$('#gsm').hide();
				$('#weight').show();
			});
			
			$('label[for=rdo_inch]').bind('click', function(){
				$('#rdo_inch').attr('checked',true);
				$('#rdo_cm').attr('checked',false);
				pb_sizein = 'inch';
			});
			
			$('label[for=rdo_cm]').bind('click', function(){
				$('#rdo_inch').attr('checked',false);
				$('#rdo_cm').attr('checked',true);
				pb_sizein = 'cm';
			});
			
		});
		
		$(function(){
			$('#pb_size').bind('blur', function(){
				var eltval = $(this).val();
				$(this).val(eltval.toLowerCase());
			});
			
			
			$('#gsm').bind('blur', function(){
				gsm_to_wt($('#pb_size').val(), $(this).val());
			});
			$('#weight').bind('blur', function(){
				wt_to_gsm($('#pb_size').val(), $(this).val());
			});
			
			$('#pb_category').bind('change', function(){
				pb_category = $(this).val();
				var pb_options = '<option vlaue="">---Select---</option>';
				$('#pb_type').html(pb_options);
				$.ajax({
					url:'<?php echo base_url('topuser/stock/get_paper_type');?>',
					type:'post',
					data:{category:pb_category},
					success:function(result){
						var pb_records = $.parseJSON(result);
						$.each(pb_records, function(index,row){
							pb_options += '<option value="'+row.type+'">'+row.type+'</option>';
						});
						$('#pb_type').html(pb_options);
					}
				});
			});
			$('#pname').bind('change', function(){
				var element = $(this);
				var party = element.val();
				element.next().hide();
				if(party!=''){
					$.ajax({
						url:'<?php echo base_url('topuser/ajax/get_party_detail');?>',
						type:'post',
						data:{pname:party},
						success:function(result){
							var obj = $.parseJSON(result);
							$('#mobile').html(obj.mobile_num);
							$('#mobile_no').val(obj.mobile_num);
							element.next().show();
						}
					});
				}
			});
			/*
			$('#rqty').bind('change', function(){
				var pname = $('#pname').val();
				var pb_type = $('#pb_type').val();
				var size = $('#pb_size').val();
				var sizein = $('#pb_sizein').val();
				var gsm = $('#gsm').val();
				
				$.ajax({
					url:'<?php echo base_url('topuser/ajax/get_balance_qty');?>',
					type:'post',
					data:{pname:pname, pb_type:pb_type, size:size, sizein:sizein, gsm:gsm},
					success:function(result){
						$('#bal_qty') = result;
					}
				});
			}); */
			
		});
		function gsm_to_wt(size, gsm){
			var val = '';
			var size_arr = size.split('x');
			if(size_arr.length==2){
				var l = parseFloat(size_arr[0]);
				var b = parseFloat(size_arr[1]);
			}
			if(pb_sizein=='inch'){
				val =  (l * b * gsm)/3100;
			}
			else{
				val =  (l * b * gsm)/20000;
			}
			
			if(pb_category=='Paper'){
				$('#weight').val(val.toFixed(1));
			}
			else{
				val = val*144/500;
				$('#weight').val(val.toFixed(1));
			}
		}
		function wt_to_gsm(size, wt){
			var val = '';
			var size_arr = size.split('x');
			if(size_arr.length==2){
				var l = parseFloat(size_arr[0]);
				var b = parseFloat(size_arr[1]);
			}
			if(pb_sizein=='inch'){
				val = (wt * 3100)/(l * b);
			}
			else{
				val = (wt * 20000)/(l * b);
			}
			
			if(pb_category=='Paper'){
				$('#gsm').val(Math.round(val));
			}
			else{
				val = val*500/144;
				$('#gsm').val(Math.round(val));
			}
		}
	</script>