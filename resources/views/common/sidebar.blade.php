<aside class="main-sidebar ">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!--<div class="user-panel">
        <div class="pull-left image">
          <img src="bower_components/Adminllte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>-->
     
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <!-- <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li> -->
        <li class="treeview">
          <a href="{!!url('admin/dashboard')!!}">
            <i class="fa fa-files-o"></i>
            <span>Dashboard</span>
          </a>
        
        </li>
        <li>
          <a href="{!!url('admin/create-coupon')!!}">
            <i class="fa fa-th"></i> <span>Create Coupon</span>
            
          </a>
        </li>
        @if(auth()->user()->user_type == 1) 
        <li>
          <a href="{!!url('admin/create-shopkeeper')!!}">
            <i class="fa fa-th"></i> <span>Add Store Admin</span>
            
          </a>
        </li>
        @endif
        <li>
          <a href="{!!url('admin/manage-banner')!!}">
            <i class="fa fa-th"></i> <span>Manage Banners</span>
            
          </a>
        </li>

        
        
        
        
       
        
        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>