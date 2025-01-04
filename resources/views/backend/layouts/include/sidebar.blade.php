<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo ">
        <a href="{{ route('admin.dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('assets/frontend/img/logo/logo.png') }}" alt="" style="max-height: 50">
            </span>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>


    <ul class="menu-inner py-1">
        <li class="menu-item @if (Route::is('admin.dashboard')) active @endif">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate">Dashboard</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate">Dashboards</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item active">
                    <a href="dashboards-analytics.html" class="menu-link">
                        <div class="text-truncate">Analytics</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item @if (Route::is('admin.general_setting_page')) active @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div class="text-truncate">Settings</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item @if (Route::is('admin.general_setting_page')) active @endif">
                    <a href="{{ route('admin.general_setting_page', ['stage' => 'site']) }}" class="menu-link">
                        <div class="text-truncate">General Setting</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <div class="text-truncate">Email Configuration</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <div class="text-truncate">Terms & Conditions</div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="#" class="menu-link">
                        <div class="text-truncate">Privacy Policy</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item @if (Route::is('admin.backup.index')) active @endif">
            <a href="{{ route('admin.backup.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-data"></i>
                <div class="text-truncate">Database Backup</div>
            </a>
        </li>
    </ul>
</aside>
