	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar"><?php /*
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="<?php echo res_url();?>admin/img/avatar3.png" class="img-circle" alt="User Image" />
			</div>
			<div class="pull-left info">
				<p>Hello, Jane</p>
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>
		<!-- search form -->
		<form action="#" method="get" class="sidebar-form">
			<div class="input-group">
				<input type="text" name="q" class="form-control" placeholder="Search..."/>
				<span class="input-group-btn">
					<button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
				</span>
			</div>
		</form>
		<!-- /.search form --> */?>
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			<li id="dashboard">
				<a href="<?php echo base_url('topuser/dashboard');?>">
					<i class="fa fa-dashboard"></i> <span>Dashboard</span>
				</a>
			</li>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-plus-square-o"></i>
					<span>Master Forms</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li id="party_registration"><a href="<?php echo base_url('topuser/master/party_registration');?>"><i class="fa fa-angle-double-right"></i> Party Registration</a></li>
					<li id="paper_board"><a href="<?php echo base_url('topuser/master/paper_board');?>"><i class="fa fa-angle-double-right"></i> Paper / Board Entry</a></li>
					<li><a href=""<?php echo base_url('topuser/master/size');?>""><i class="fa fa-angle-double-right"></i> Job Size</a></li>
					<li><a href=""<?php echo base_url('topuser/master/charge_entry');?>""><i class="fa fa-angle-double-right"></i> Charge </a></li>
				</ul>
			</li>
			
			<li class="treeview">
				<a href="#">
					<i class="fa fa-plus-square-o"></i>
					<span>Paper / Board Stocks</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li id="party_registration"><a href="<?php echo base_url('topuser/stock/receipt');?>"><i class="fa fa-angle-double-right"></i> Stock Receipt</a></li>
					<li id="paper_board"><a href="<?php echo base_url('topuser/stock/issue');?>"><i class="fa fa-angle-double-right"></i> Stock Issue</a></li>
					<li><a href=""<?php echo base_url('topuser/stock/report');?>""><i class="fa fa-angle-double-right"></i> Stock Report</a></li>
				</ul>
			</li>
			
			<li class="treeview">
				<a href="#">
					<i class="fa fa-plus-square-o"></i>
					<span>SMS</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li id="job_info"><a href="<?php echo base_url('topuser/sms/job_info');?>"><i class="fa fa-angle-double-right"></i> Job Info</a></li>
				</ul>
			</li>
			
			<li>
				<a href="pages/widgets.html">
					<i class="fa fa-th"></i> <span>Widgets</span> <small class="badge pull-right bg-green">new</small>
				</a>
			</li>
		</ul>
	</section>
	<!-- /.sidebar -->
