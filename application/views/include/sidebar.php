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
       
        <li>
          <a href="<?php echo base_url() ?>product/invoice">
      <i class="fa fa-money"></i> &nbsp;<span style="font-size: 20px;"> Supplier Invoice</span>
          </a>
        </li>
          <li>
          <a href="<?php echo base_url() ?>product/all_invoice">
      <i class="fa fa-money"></i> &nbsp;<span style="font-size: 20px;"> Supplier All Invoice</span>
          </a>
        </li>
      
        <li>
          <a href="<?php echo base_url() ?>customer/customer_invoice">
      <i class="fa fa-money"></i> &nbsp;<span style="font-size: 20px;"> Sale Invoice</span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url() ?>customer/all_customer_invoices">
      <i class="fa fa-money"></i> &nbsp;<span style="font-size: 20px;">All Sale Invoice</span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url() ?>customer/return_cylinder">
      <i class="fa fa-money"></i> &nbsp;<span style="font-size: 20px;">Return Cylinder</span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url() ?>customer/all_return_cylinder">
      <i class="fa fa-money"></i> &nbsp;<span style="font-size: 20px;">All Return Cylinder</span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url() ?>customer/payment">
      <i class="fa fa-money"></i> &nbsp;<span style="font-size: 20px;"> Payment</span>
          </a>
        </li>

         <li>
          <a href="<?php echo base_url() ?>customer/all_return_payment">
      <i class="fa fa-money"></i> &nbsp;<span style="font-size: 20px;">All Return Payment</span>
          </a>
        </li>


        <li>
          <a href="<?php echo base_url() ?>">
      <i class="fa fa-money"></i> &nbsp;<span style="font-size: 20px;">Register</span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url() ?>product/index">
      <i class="fa fa-fire"></i> &nbsp;<span style="font-size: 20px;"> Add Cylinders</span>
          </a>
        </li>

         <li>
          <a href="<?php echo base_url() ?>customer/index">
      <i class="fa fa-users"></i>&nbsp;<span style="font-size: 20px;"> Add Customer</span>
          </a>
        </li>

         <li>
          <a href="widgets.html">
      <i class="fa fa-user-plus"></i>&nbsp;<span style="font-size: 20px;"> Add Vendors</span>
          </a>
        </li>

         <li>
          <a href="<?php echo base_url() ?>region/index">
      <i class="fa fa-globe"></i>&nbsp;<span style="font-size: 20px;"> Add Regions</span>
          </a>
        </li>

         <li>
          <a href="<?php echo base_url() ?>agency/index">
      <i class="fa fa-briefcase"></i>&nbsp;<span style="font-size: 20px;"> Add agency</span>
          </a>
        </li>

         <li>
          <a href="<?php echo base_url() ?>user/index">
       <i class="fa fa-user"></i>&nbsp;<span style="font-size: 20px;"> Add Users</span>
          </a>
        </li>

         <li>
          <a href="<?php echo base_url() ?>expense/index">
       <i class="fa fa-warning"></i>&nbsp;<span style="font-size: 20px;"> Expense Accounts</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>