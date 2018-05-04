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
						Parties
						<small>Listing</small>
					</h1>
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url('topuser/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
						<li class="active">Party Listing</li>
					</ol>
				</section>


                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-md-8">
                            <!-- small box -->
							<div class="box">
                                <div class="box-body table-responsive">
                                    <table id="party-listing" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center;">Select</th>
                                                <th>Party Name</th>
                                                <th>Mobile No.</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!-- ./col -->
						
						<div class="col-md-4">
                            <!-- small box -->                        
							<div class="box">
                                <div class="box-header">
                                    <h3 class="box-title"><button id="send_sms" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Send SMS</button> <button id="reset_table" class="btn btn-default"><i class="glyphicon glyphicon-refresh"></i> Refresh</button></h3> <div id="status" style="float:right; padding: 10px 10px 0 0;"></div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tbody>
										<tr>
                                            <th>Party Name</th>
                                            <th>Mobile</th>
                                        </tr>
                                    </tbody></table>
                                </div><!-- /.box-body -->
							</div><!-- ./col -->
						</div>
					</div><!-- /.row -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->
		
		<?php $this->load->view('admin/footer');?>
		<!-- DATA TABES SCRIPT -->
        <script src="<?php echo res_url();?>admin/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo res_url();?>admin/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
		 <!-- AdminLTE App -->
        <script src="<?php echo res_url();?>admin/js/AdminLTE/app.js" type="text/javascript"></script>
	
	<script type="text/javascript">
	$(function(){
		var btnSMS = '<button id="send_sms" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Send SMS</button>';
		var btnReset = '<button id="reset_table" class="btn btn-default"><i class="glyphicon glyphicon-refresh"></i> Send SMS</button>'
		
		var party_listing = '';
			var party_records = <?php echo json_encode($party_list)?>;
			$.each(party_records, function(index, record){
				party_listing += '<tr style="cursor:pointer;" class="party-row">';
				party_listing += '<td style="text-align:center;"><input type="checkbox" name="chk-all" id="'+index+'" /></td>';
				party_listing += '<td>'+ record.pname +'</td>';
				party_listing += '<td>'+ record.mobile_num +'</td>';
				party_listing += '</tr>';
			});
			$("#party-listing tbody").html(party_listing);
			$("#party-listing").dataTable();
			
			setTimeout(function(){
				$('#party-listing_info').parent().addClass('col-md-4').removeClass('col-xs-6');
				$('.paging_bootstrap').parent().addClass('col-md-8').removeClass('col-xs-6');
				$('#party-listing_length').parent().addClass('col-md-4').removeClass('col-xs-6');
				$('#party-listing_filter').parent().addClass('col-md-8').removeClass('col-xs-6');
			},100);
		
			$(document).on('click', '[name=chk-all]', function(index){
				var chk_id = $(this).attr('id');
				if($(this).is(':checked')){
					var tbl_row = '<tr id="tbl_'+chk_id+'"><td>'+party_records[chk_id].pname+'</td><td>'+party_records[chk_id].mobile_num+'</td></tr>';
					$('.table-hover tbody').append(tbl_row);
				}
				else{
					if($('#tbl_'+chk_id).length>0){
						$('#tbl_'+chk_id).remove();
					}
				}
			});
			
			$('#send_sms').bind('click', function(){
				var mobile_nums = '';
				$('[id^=tbl_]').each(function(index){
					if(mobile_nums == '')
						mobile_nums = $(this).children(':last').text();
					else
						mobile_nums += ',' + $(this).children(':last').text();
				});
				if(mobile_nums == ''){
					alert("Please select party whom to send sms.");
				}
				else{
					if(confirm('Do you want to send SMS to selected parties? If yes press OK.')){
						var process_img = '<img src="<?php echo res_url();?>admin/img/process.gif">';
						var succ_img = '<img src="<?php echo res_url();?>admin/img/tick.png">';
						var fail_img = '<img src="<?php echo res_url();?>admin/img/cross.png">';
						
						$('#status').html(process_img);
						$.ajax({
							url:'<?php echo base_url('topuser/sms/job_info_process');?>',
							type:'post',
							data:{mobile:mobile_nums},
							success:function(responseData){
								var smsResponse = $.parseJSON(responseData);
								if(smsResponse.responseCode=='3001'){
									$('#status').html(succ_img);
								}
								else{
									$('#status').html(fail_img);
									console.log(smsResponse.response);
								}
							}
						});
					}
				}
				
			});
			
			$('#reset_table').bind('click', function(){
				location.href="<?php echo base_url('topuser/sms/job_info');?>"
				//$('#status').html('');
				//$('.table-hover tbody').html('<tr><th>Party Name</th><th>Mobile</th></tr>');
				
				//$("#party-listing tbody").html(party_listing);
				//$("#party-listing").dataTable();
				//setTimeout(function(){$('ul.pagination li:nth-child(2)').trigger('click')},500);
				//console.log($('ul.pagination li:nth-child(2)'));
			});
			
			
			
	});
	</script>