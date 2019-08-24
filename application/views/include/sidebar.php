  <div class="sidebar" id="sidebar">
        
                
                <!--#sidebar-shortcuts-->

        <ul class="nav nav-list">
           <?php 
                $type=$this->session->userdata('type');?>
          <?php if($type=="Admin"){ ?>
          <li>
            <a href="#" class="dropdown-toggle">
              <i class="icon-text-width"></i>
              <span class="menu-text"> OPD Entry </span>
                            <b class="arrow icon-angle-down"></b>
            </a>
                        <ul class="submenu">
                        <li>
                <a href="<?php echo base_url('login/first_male_opd') ?>">
                  <i class="icon-double-angle-right"></i>
                   First Male OPD Entry
                </a>
              </li>
                 <li>
                <a href="<?php echo base_url('login/second_male_opd') ?>">
                  <i class="icon-double-angle-right"></i>
                   Second Male OPD Entry
                </a>
              </li>
                 <li>
                <a href="<?php echo base_url('login/first_female_opd') ?>">
                  <i class="icon-double-angle-right"></i>
                   First Female OPD Entry
                </a>
              </li>
                 <li>
                <a href="<?php echo base_url('login/second_female_opd') ?>">
                  <i class="icon-double-angle-right"></i>
                   Second Female OPD Entry
                </a>
              </li>
                <li>
                <a href="<?php echo base_url('login/aged_opd') ?>">
                  <i class="icon-double-angle-right"></i>
                   Aged OPD Entry
                </a>
              </li>

               <li>
                <a href="<?php echo base_url('login/staff_opd') ?>">
                  <i class="icon-double-angle-right"></i>
                   Staff OPD Entry
                </a>
              </li>
               <li>
                <a href="<?php echo base_url('login/gyne_opd') ?>">
                  <i class="icon-double-angle-right"></i>
                   Gyne OPD Entry
                </a>
              </li>
            </ul>
          </li>
                    <li>
            <a href="#" class="dropdown-toggle">
              <i class="icon-text-width"></i>
              <span class="menu-text"> Other Entry </span>
                            <b class="arrow icon-angle-down"></b>
              </a>
                        <ul class="submenu">
                        <li>
                <a href="<?php echo base_url('other/ecg') ?>">
                  <i class="icon-double-angle-right"></i>
                   Laboratory Entry
                </a>
              </li>
               
            </ul>
          </li>
          
                    <li>
            <a href="" class="dropdown-toggle">
              <i class="icon-text-width"></i>
              <span class="menu-text"> Users </span>
                            <b class="arrow icon-angle-down"></b>
            </a>
                        <ul class="submenu">
                        <li>
                <a href="<?php echo base_url('user/index') ?>">
                  <i class="icon-double-angle-right"></i>
                  Add User
                </a>
              </li>
             </ul>
           </li>

               <li>
            <a href="#" class="dropdown-toggle">
              <i class="icon-text-width"></i>
              <span class="menu-text"> Category </span>
                            <b class="arrow icon-angle-down"></b>
            </a>
                        <ul class="submenu">
                        <li>
                <a href="<?php echo base_url('product/index') ?>">
                  <i class="icon-double-angle-right"></i>
                  Add Category
                </a>
              </li>
                 <li>
                <a href="<?php echo base_url('product/test') ?>">
                  <i class="icon-double-angle-right"></i>
                  Add Test
                </a>
              </li>
             </ul>
           </li>
          
            <li>
            <a href="#" class="dropdown-toggle">
              <i class="icon-text-width"></i>
              <span class="menu-text"> Departement </span>
                            <b class="arrow icon-angle-down"></b>
            </a>
                        <ul class="submenu">
                        <li>
                <a href="<?php echo base_url('departement/index') ?>">
                  <i class="icon-double-angle-right"></i>
                  Add Departement
                </a>
              </li>
                 <li>
                <a href="<?php echo base_url('depatement/sub_departement') ?>">
                  <i class="icon-double-angle-right"></i>
                  Add Sub Departement
                </a>
              </li>
             </ul>
           </li>

           <li>
            <a href="#" class="dropdown-toggle">
              <i class="icon-text-width"></i>
              <span class="menu-text"> Reports </span>
                            <b class="arrow icon-angle-down"></b>
            </a>
                        <ul class="submenu">
                        <li>
                <a href="<?php echo base_url('report/daily_report') ?>">
                  <i class="icon-double-angle-right"></i>
                  OPD Daily Report
                </a>
              </li>
               <li>
                <a href="<?php echo base_url('report/today_report') ?>">
                  <i class="icon-double-angle-right"></i>
                  OPD Today Report
                </a>
              </li>

                <li>
                <a href="<?php echo base_url('report/monthly_report') ?>">
                  <i class="icon-double-angle-right"></i>
                  OPD Monthly Record
                </a>
              </li>
                 
             </ul>
           </li>

            <?php }
              
                else if($type=="First Male OPD")
                {?>
                    <li class="active open">
            <a href="#" class="dropdown-toggle">
              <i class="icon-text-width"></i>
              <span class="menu-text"> OPD Entry </span>
                            <b class="arrow icon-angle-down"></b>
            </a>
                        <ul class="submenu">
                        <li>
                <a href="<?php echo base_url('login/first_male_opd') ?>">
                  <i class="icon-double-angle-right"></i>
                   First Male OPD Entry
                </a>
              </li>
            </ul>
          </li>
                <?php }
                  else if($type=="Second Male OPD")
                {?>
                    <li class="active open">
            <a href="#" class="dropdown-toggle">
              <i class="icon-text-width"></i>
              <span class="menu-text"> OPD Entry </span>
                            <b class="arrow icon-angle-down"></b>
            </a>
                        <ul class="submenu">
                        <li>
                <a href="<?php echo base_url('login/second_male_opd') ?>">
                  <i class="icon-double-angle-right"></i>
                   Second Male OPD Entry
                </a>
              </li>
            </ul>
          </li>
                <?php }
                      else if($type=="First Female OPD")
                {?>
                    <li class="active open">
            <a href="#" class="dropdown-toggle">
              <i class="icon-text-width"></i>
              <span class="menu-text"> OPD Entry </span>
                            <b class="arrow icon-angle-down"></b>
            </a>
                        <ul class="submenu">
                        <li>
                <a href="<?php echo base_url('login/first_female_opd') ?>">
                  <i class="icon-double-angle-right"></i>
                   First Female OPD Entry
                </a>
              </li>
            </ul>
          </li>
                <?php }

                  else if($type=="Second Female OPD")
                {?>
                    <li class="active open">
            <a href="#" class="dropdown-toggle">
              <i class="icon-text-width"></i>
              <span class="menu-text"> OPD Entry </span>
                            <b class="arrow icon-angle-down"></b>
            </a>
                        <ul class="submenu">
                        <li>
                <a href="<?php echo base_url('login/second_female_opd') ?>">
                  <i class="icon-double-angle-right"></i>
                   Second Female OPD Entry
                </a>
              </li>
            </ul>
          </li>
                <?php }

                    else if($type=="Staff OPD")
                {?>
                    <li class="active open">
            <a href="#" class="dropdown-toggle">
              <i class="icon-text-width"></i>
              <span class="menu-text"> OPD Entry </span>
                            <b class="arrow icon-angle-down"></b>
            </a>
                        <ul class="submenu">
                        <li>
                <a href="<?php echo base_url('login/staff_opd') ?>">
                  <i class="icon-double-angle-right"></i>
                   Staff OPD Entry
                </a>
              </li>
            </ul>
          </li>
                <?php }
                  else if($type=="Aged OPD")
                {?>
                    <li class="active open">
            <a href="#" class="dropdown-toggle">
              <i class="icon-text-width"></i>
              <span class="menu-text"> OPD Entry </span>
                            <b class="arrow icon-angle-down"></b>
            </a>
                        <ul class="submenu">
                        <li>
                <a href="<?php echo base_url('login/aged_opd') ?>">
                  <i class="icon-double-angle-right"></i>
                   Aged OPD Entry
                </a>
              </li>
            </ul>
          </li>
                <?php }
                else if($type=="Gyne OPD")
                {?>
                    <li class="active open">
            <a href="#" class="dropdown-toggle">
              <i class="icon-text-width"></i>
              <span class="menu-text"> OPD Entry </span>
                            <b class="arrow icon-angle-down"></b>
            </a>
                        <ul class="submenu">
                        <li>
                <a href="<?php echo base_url('login/gyne_opd') ?>">
                  <i class="icon-double-angle-right"></i>
                   Gyne OPD Entry
                </a>
              </li>
            </ul>
          </li>
                <?php }
             ?>

        <div class="sidebar-collapse" id="sidebar-collapse">
          <i class="icon-double-angle-left"></i>
        </div>
      </ul>
      </div>