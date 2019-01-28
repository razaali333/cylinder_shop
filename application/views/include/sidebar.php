 <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url()?>css/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>   <?php 
                $name=$this->session->userdata('name');
              if(isset($name)){echo  ucfirst($name) ; }  ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
           <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span style="font-size: 20px;">Suppliers</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
       <ul class="treeview-menu">
            <li><a href="<?php echo base_url() ?>product/invoice"><i class="fa fa-circle-o"></i> Supplier Invoice</a></li>
            <li><a href="<?php echo base_url() ?>product/all_invoice"><i class="fa fa-circle-o"></i> Supplier All Invoice</a></li>
            <li><a href="<?php echo base_url() ?>vendor/loan_cylinder"><i class="fa fa-circle-o"></i> Empty Loan Cylinder Invoice</a></li>
            <li><a href="<?php echo base_url() ?>vendor/all_emp_cylinder_invoice"><i class="fa fa-circle-o"></i>All Empty Loan Cylinders </a></li>
        </ul>
      </li>
        
         <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span style="font-size: 20px;">Sale Invoice</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
       <ul class="treeview-menu">
            <li><a href="<?php echo base_url() ?>customer/customer_invoice"><i class="fa fa-circle-o"></i> Sale Invoice</a></li>
            <li><a href="<?php echo base_url() ?>customer/all_customer_invoices"><i class="fa fa-circle-o"></i> All Sale Invoice</a></li>
      </ul>
    </li>

       <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span style="font-size: 20px;">Return Cylinder</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

      <ul class="treeview-menu">
            <li><a href="<?php echo base_url() ?>customer/return_cylinder"><i class="fa fa-circle-o"></i> Return Cylinder</a></li>
            <li><a href="<?php echo base_url() ?>customer/all_return_cylinder"><i class="fa fa-circle-o"></i> All Return Cylinder</a></li>
      </ul>
      </li>

       <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span style="font-size: 20px;">Return Payment</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
      <ul class="treeview-menu">
            <li><a href="<?php echo base_url() ?>customer/payment"><i class="fa fa-circle-o"></i> Payment</a></li>
            <li><a href="<?php echo base_url() ?>customer/all_return_payment"><i class="fa fa-circle-o"></i> All Return Payment</a></li>
      </ul>
      </li>

       <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span style="font-size: 20px;">Adding Area</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
       <ul class="treeview-menu">
            <li><a href="<?php echo base_url() ?>product/index"><i class="fa fa-circle-o"></i> Add Cylinders</a></li>
            <li><a href="<?php echo base_url() ?>customer/index"><i class="fa fa-circle-o"></i> Add Customer</a></li>
            <li><a href="<?php echo base_url() ?>vendor/add_vendor"><i class="fa fa-circle-o"></i> Add Vendors</a></li>
            <li><a href="<?php echo base_url() ?>region/index"><i class="fa fa-circle-o"></i> Add Regions</a></li>
            <li><a href="<?php echo base_url() ?>agency/index"><i class="fa fa-circle-o"></i> Add Agency</a></li>
            <li><a href="<?php echo base_url() ?>user/index"><i class="fa fa-circle-o"></i> Add Users</a></li>
            <li><a href="<?php echo base_url() ?>expense/index"><i class="fa fa-circle-o"></i> Expense Accounts</a></li>
      </ul>
      </li>
  
         <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span style="font-size: 20px;">Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url() ?>reports/return_report"><i class="fa fa-circle-o"></i> Daily Return Payment</a></li>
            <li><a href="<?php echo base_url() ?>reports/return_cylinder_report"><i class="fa fa-circle-o"></i> Daily Cylinder Return</a></li>
            <li><a href="<?php echo base_url() ?>reports/daily_sale_report"><i class="fa fa-circle-o"></i> Daily Sale Report</a></li>
            <li><a href="<?php echo base_url() ?>reports/stock_report"><i class="fa fa-circle-o"></i> Stock Report</a></li>
            <li><a href="<?php echo base_url() ?>reports/daily_sale_purchase_report"><i class="fa fa-circle-o"></i>Daily Sale Report</a></li>
            <!-- <li><a href="editors.html"><i class="fa fa-circle-o"></i> Editors</a></li> -->
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>