  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('cms/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Ertuğrul Özdoğan</p>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="{{action('Cms\DashboardController@index')}}"><i class="fa fa-home fa-lg"></i> <span>Anasayfa</span></a></li>
        <li><a href="#"><i class="fa fa-newspaper-o fa-lg"></i> <span>Haberler</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-cog fa-lg"></i> <span>Yönetim</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Ayarlar</a></li>
            <li><a href="{{ action('Cms\Admin\UserController@index') }}">Editörler</a></li>
            <li><a href="{{ action('Cms\Admin\CategoryController@index') }}">Kategoriler</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
