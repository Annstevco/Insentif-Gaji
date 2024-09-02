<li class="sidebar-item {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
  <a class="sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false">
    <span>
      <i class="ti ti-layout-dashboard"></i>
    </span>
    <span class="hide-menu">Dashboard</span>
  </a>
</li>
<li class="sidebar-item {{ in_array(Route::currentRouteName(), ['riwayat', 'admin-page']) ? 'active' : '' }}">
  <a class="sidebar-link" href="{{ Auth::user() && preg_match('/^101\d{2}\d{2}\d{4}[1-9]$/', Auth::user()->nip) ? route('admin-page') : route('my.riwayat', ['nip' => Auth::user()->nip]) }}" aria-expanded="false">
    <span>
      <i class="ti ti-aperture"></i>
    </span>
    <span class="hide-menu">
      {{ Auth::user() && preg_match('/^101\d{2}\d{2}\d{4}[1-9]$/', Auth::user()->nip) ? 'Admin Riwayat' : 'My Riwayat' }}
    </span>
  </a>
</li>
<li class="sidebar-item">
  <a class="sidebar-link" href="{{ route('logout') }}" aria-expanded="false">
    <span>
      <i class="ti ti-login"></i>
    </span>
    <span class="hide-menu">Log Out</span>
  </a>
</li>