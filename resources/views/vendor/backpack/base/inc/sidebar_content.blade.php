<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
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
        <li><a href="{{ route('pengaduan.index') }}"><i class='fa fa-link'></i> <span>{{ trans('Pengaduan') }}</span></a></li>
        <li><a href="{{ route('penanganan.index') }}"><i class='fa fa-link'></i> <span>{{ trans('Penanganan') }}</span></a></li>
        <li><a href="{{ route('pengajuan.index') }}"><i class='fa fa-link'></i> <span>{{ trans('Pengajuan') }}</span></a></li>

    </ul>
</li>

<li class="treeview">
    <a href="#"><i class='fa fa-link'></i> <span>{{ trans('Member') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li><a href="{{ route('member.index') }}"><i class='fa fa-link'></i> <span>{{ trans('Member') }}</span></a></li>
        
    </ul>
</li>