<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ url('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ Auth::user()->roles }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ url('assets/dist/img/user2-160x160.jpg') }}"
                    class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">NAVIGATION</li>
                @can('administrator')
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Home
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('kelas') }}" class="nav-link {{ Route::is('kelas') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Data Kelas
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('mapel') }}" class="nav-link {{ Route::is('mapel') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Data Mata Pelajaran
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('guru') }}" class="nav-link {{ Route::is('guru') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Data Guru
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('siswa') }}" class="nav-link {{ Route::is('siswa') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Data Siswa
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('absensiSiswa2') }}" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Absensi Siswa
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('user') }}" class="nav-link {{ Route::is('user') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Sistem User
                            </p>
                        </a>
                    </li>
                @endcan
                @can('guru')
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Home
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('biodataGuru', $id) }}" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Data Diri Guru
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('absensiSiswa2') }}" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Absensi Siswa
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('penilaian') }}" class="nav-link">
                            <i class="nav-icon fas fa-star"></i>
                            <p>
                                Penilaian
                            </p>
                        </a>
                    </li>
                @endcan
                @can('siswa')
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Home
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('biodataSiswa', $id) }}" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Data Diri Siswa
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('absensiSiswa') }}" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Absensi Siswa
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('nilaiSiswa') }}" class="nav-link">
                            <i class="nav-icon fas fa-star"></i>
                            <p>
                                Nilai
                            </p>
                        </a>
                    </li>
                @endcan
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
