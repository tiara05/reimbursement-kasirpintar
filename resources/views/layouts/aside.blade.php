 <!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
             
              <span class="app-brand-text demo menu-text fw-bolder ms-2">Reimbursement</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">

            <!-- Layouts -->
            @if(Auth::check())
              @php
                  $userRole = Auth::user()->role;
              @endphp

              @if($userRole === 'direktur')
                  <li class="menu-item">
                    <a href="{{ route('dashboard') }}" class="menu-link">
                      <i class="menu-icon tf-icons bx bx-home-circle"></i>
                      <div data-i18n="Analytics">Dashboard</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="{{ route('direktur.datakaryawan') }}" class="menu-link">
                      <i class="menu-icon tf-icons bx bx-dock-top"></i>
                      <div data-i18n="Analytics">Data Karyawan</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="{{ route('reimbursement') }}" class="menu-link">
                      <i class="menu-icon tf-icons bx bx-dock-top"></i>
                      <div data-i18n="Analytics">Reimbursement</div>
                    </a>
                  </li>
              @elseif($userRole === 'staff')
                  <li class="menu-item">
                    <a href="{{ route('dashboard') }}" class="menu-link">
                      <i class="menu-icon tf-icons bx bx-home-circle"></i>
                      <div data-i18n="Analytics">Dashboard</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="{{ route('reimbursement') }}" class="menu-link">
                      <i class="menu-icon tf-icons bx bx-file"></i>
                      <div data-i18n="Analytics">Reimbursement</div>
                    </a>
                  </li>
              @elseif($userRole === 'finance')
                  <li class="menu-item">
                    <a href="{{ route('dashboard') }}" class="menu-link">
                      <i class="menu-icon tf-icons bx bx-home-circle"></i>
                      <div data-i18n="Analytics">Dashboard</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="{{ route('reimbursement') }}" class="menu-link">
                      <i class="menu-icon tf-icons bx bx-file"></i>
                      <div data-i18n="Analytics">Reimbursement</div>
                    </a>
                  </li>
              @endif
            @else
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @endif
            
            
          </ul>
        </aside>
        <!-- / Menu -->