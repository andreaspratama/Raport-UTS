<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
      <img src="{{url('../../foto/yski.png')}}" width="40px" alt="">
      <div class="sidebar-brand-text mx-3">YSKI</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    @if (auth()->user()->role === 'admin')
      <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard.admin')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
    @endif

    @if (auth()->user()->role === 'guru')
      <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard.guru')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
    @endif

    <!-- Nav Item - Pages Collapse Menu -->
    @if(auth()->user()->role === 'admin')
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-folder"></i>
        <span>Data Master</span>
      </a>
      <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Custom Components:</h6>
          <a class="collapse-item" href="{{route('sekolah.index')}}">Data Sekolah</a>
          <a class="collapse-item" href="/siswa">Data Siswa</a>
          <a class="collapse-item" href="/guru">Data Guru</a>
          <a class="collapse-item" href="{{route('thnakademik.index')}}">Tahun Akademik</a>
          <a class="collapse-item" href="{{route('mapel.index')}}">Mata Pelajaran</a>
          <a class="collapse-item" href="{{route('project.index')}}">Project</a>
          <a class="collapse-item" href="{{route('seni.index')}}">Seni</a>
          <a class="collapse-item" href="{{route('hadir.index')}}">Kehadiran</a>
          <a class="collapse-item" href="/jadwalmapel">Jadwal Pelajaran</a>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('info.index')}}">
        <i class="fas fa-newspaper"></i>
        <span>Info</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/user">
        <i class="fas fa-user"></i>
        <span>User</span></a>
    </li>
    @endif

    @if (auth()->user()->role === 'guru')
      <li class="nav-item">
        <a class="nav-link" href="/guru/jadwal">
          <i class="fas fa-book-reader"></i>
          <span>Jadwal</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/guru/nilai">
          <i class="fas fa-book-reader"></i>
          <span>Nilai</span></a>
      </li>
    @endif

    {{-- @if(auth()->user()->role == 'siswa')
    <li class="nav-item">
      <a class="nav-link" href="/nilai">
        <i class="fas fa-book-reader"></i>
        <span>Nilai</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/jadwal">
        <i class="fas fa-book-reader"></i>
        <span>Jadwal</span></a>
    </li>
    @endif --}}

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
  <!-- End of Sidebar -->