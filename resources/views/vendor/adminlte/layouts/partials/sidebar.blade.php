<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p style="overflow: hidden;text-overflow: ellipsis;max-width: 160px;" data-toggle="tooltip" title="{{ Auth::user()->name }}">{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
            
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>{{ trans('Perusahaan') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('perusahaan.index') }}">{{ trans('Data Perusahaan') }}</a></li>
                    <li><a href="{{ route('area.index') }}">{{ trans('Data Area') }}</a></li>
                    <li><a href="{{ route('lokasi.index') }}">{{ trans('Data Lokasi') }}</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>{{ trans('Pengaduan') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('laporan.index') }}"><i class='fa fa-link'></i> <span>{{ trans('Pengaduan') }}</span></a></li>
                    <li><a href="{{ route('penanganan.index') }}"><i class='fa fa-link'></i> <span>{{ trans('Penanganan') }}</span></a></li>
                    <li><a href="{{ route('pengajuan.index') }}"><i class='fa fa-link'></i> <span>{{ trans('Pengajuan') }}</span></a></li>

                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>{{ trans('Member') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('member.index') }}"><i class='fa fa-link'></i> <span>{{ trans('Member') }}</span></a></li>
                    <li><a href="{{ route('penanganan.index') }}"><i class='fa fa-link'></i> <span>{{ trans('Penanganan') }}</span></a></li>
                    <li><a href="{{ route('pengajuan.index') }}"><i class='fa fa-link'></i> <span>{{ trans('Pengajuan') }}</span></a></li>

                </ul>
            </li>

            
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.multilevel') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                    <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
