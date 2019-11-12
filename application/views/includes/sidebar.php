<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Mr. Super Admin</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU OPTIONS</li>
        <li><a href="<?php echo site_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> <span>ড্যাশবোর্ড</span></a></li>

           <!-- Branch Menu Start -->
           <li class="treeview">
              <a href="">
                <i class="fa fa-tree"></i> <span>ব্রাঞ্চ ব্যবস্থাপনা </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('new-branch-entry'); ?>"><i class="fa fa-circle"></i>নতুন ব্রাঞ্চ যোগ করুন</a></li>
                <li><a href="<?php echo site_url('all-branch-list'); ?>"><i class="fa fa-circle"></i>সকল ব্রাঞ্চের তালিকা দেখুন</a></li>
              </ul>
          </li>

          <!-- Branch Menu End -->

           <!-- Representative Menu Start -->
           <li class="treeview">
              <a href="">
                <i class="fa fa-user"></i> <span>প্রতিনিধি ব্যবস্থাপনা</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('new-representative-entry'); ?>"><i class="fa fa-circle"></i>নতুন প্রতিনিধি যোগ করুন</a></li>
                <li><a href="<?php echo site_url('all-representative-list'); ?>"><i class="fa fa-circle"></i>সকল প্রতিনিধির তালিকা দেখুন</a></li>
              </ul>
           </li>

          <!-- Representative Menu End -->
           <!-- Pharmacy Menu Start -->
           <li class="treeview">
              <a href="">
                <i class="fa fa-medkit"></i> <span>ফার্মেসি ব্যবস্থাপনা</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('new-pharmacy-entry'); ?>"><i class="fa fa-circle"></i>নতুন ফার্মেসি যোগ করুন</a></li>
                <li><a href="<?php echo site_url('all-pharmacy-list'); ?>"><i class="fa fa-circle"></i>সকল ফার্মেসির তালিকা দেখুন</a></li>
                <li><a href="<?php echo site_url('all-pharmacy-list-by-representative'); ?>"><i class="fa fa-circle"></i>প্রতিনিধি ফার্মেসির তালিকা দেখুন</a></li>
              </ul>
           </li>

          <!-- Pharmacy Menu End -->

          <!-- Stock Menu Start -->
          <!-- <li class="treeview">
              <a href="">
              <i class="fa fa-table"></i><span>স্টক ব্যবস্থাপনা</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('new-stock-entry'); ?>"><i class="fa fa-circle"></i>নতুন স্টক যোগ করুন</a></li>
                <li><a href="<?php echo site_url('all-stock-list'); ?>"><i class="fa fa-circle"></i>সকল স্টকের তালিকা দেখুন</a></li>
              </ul>
            </li> -->
          <!-- Stock Menu END -->
          
          <!-- Product Menu Start -->
          <li class="treeview">
              <a href="">
                <i class="fa fa-cube"></i> <span>পণ্য ব্যবস্থাপনা</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('new-product-entry'); ?>"><i class="fa fa-circle"></i>নতুন পণ্য যোগ করুন</a></li>
                <!-- <li><a href="<?php echo site_url('new-product-code-entry'); ?>"><i class="fa fa-circle"></i>পণ্যের কোড যোগ করুন</a></li> -->
                <li><a href="<?php echo site_url('all-product-list'); ?>"><i class="fa fa-circle"></i>সকল পণ্যের তালিকা দেখুন</a></li>
              </ul>
          </li>

          <!-- Product Menu End -->

          

          

           <!-- Invoice Menu Start -->
           <li class="treeview">
              <a href="">
                <i class="fa fa-sticky-note-o"></i> <span>ইনভয়েস ব্যবস্থাপনা</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('generate-new-invoice'); ?>"><i class="fa fa-circle"></i>নতুন ইনভয়েস তৈরী করুন</a></li>
                <li><a href="<?php echo site_url('list-of-all-invoice'); ?>"><i class="fa fa-circle"></i>সকল ইনভয়েসের তালিকা দেখুন</a></li>
              </ul>
           </li>

          <!-- Invoice Menu End -->

           <!-- Summary Menu Start -->
           <li class="treeview">
              <a href="">
                <i class="fa fa-area-chart"></i> <span>সামারী ব্যবস্থাপনা</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('summary'); ?>"><i class="fa fa-circle"></i>ডাইনামিক সামারী দেখুন</a></li>
                <!-- <li><a href="<?php echo site_url('all-pharmacy-list'); ?>"><i class="fa fa-circle"></i>১০ দিনের সামারী দেখুন</a></li>
                <li><a href="<?php echo site_url('all-pharmacy-list'); ?>"><i class="fa fa-circle"></i>৩০ দিনের সামারী দেখুন</a></li> -->
              </ul>
           </li>

           <!-- Settings Menu Start -->
           <li class="treeview">
              <a href="">
                <i class="fa fa-cog"></i> <span>সেটিংস</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('add-new-admin'); ?>"><i class="fa fa-circle"></i>নতুন এডমিন এড করুন</a></li>
                 <li><a href="<?php echo site_url('database-backup'); ?>"><i class="fa fa-circle"></i>ডাটাবেজ ব্যাকআপ নিন </a></li>
                <!-- <li><a href="<?php echo site_url('all-pharmacy-list'); ?>"><i class="fa fa-circle"></i>৩০ দিনের সামারী দেখুন</a></li> -->
              </ul>
           </li>
           <!-- <strong style="color:white;font-weight;bold">Load time <?php echo $this->benchmark->elapsed_time(); ?></strong> -->
           

          <!-- Summary Menu End -->
          <!-- <li class="treeview">
            <a href="#">
              <i class="fa fa-share"></i> <span>Multilevel</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-circle"></i> Level One</a></li>
              <li class="treeview">
                <a href="#"><i class="fa fa-circle"></i> Level One
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="#"><i class="fa fa-circle"></i> Level Two</a></li>
                  <li class="treeview">
                    <a href="#"><i class="fa fa-circle"></i> Level Two
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="#"><i class="fa fa-circle"></i> Level Three</a></li>
                      <li><a href="#"><i class="fa fa-circle"></i> Level Three</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li><a href="#"><i class="fa fa-circle"></i> Level One</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-folder"></i> <span>Examples</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="pages/examples/invoice.html"><i class="fa fa-circle"></i> Invoice</a></li>
              <li><a href="pages/examples/profile.html"><i class="fa fa-circle"></i> Profile</a></li>
              <li><a href="pages/examples/login.html"><i class="fa fa-circle"></i> Login</a></li>
              <li><a href="pages/examples/register.html"><i class="fa fa-circle"></i> Register</a></li>
              <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle"></i> Lockscreen</a></li>
              <li><a href="pages/examples/404.html"><i class="fa fa-circle"></i> 404 Error</a></li>
              <li><a href="pages/examples/500.html"><i class="fa fa-circle"></i> 500 Error</a></li>
              <li><a href="pages/examples/blank.html"><i class="fa fa-circle"></i> Blank Page</a></li>
              <li><a href="pages/examples/pace.html"><i class="fa fa-circle"></i> Pace Page</a></li>
            </ul>
          </li> -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
