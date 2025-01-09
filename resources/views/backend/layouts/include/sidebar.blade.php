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
        <li class="menu-item  @if (Route::is('admin.category.index') || Route::is('admin.category.create')) active open @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-category-alt"></i>
                <div class="text-truncate">Categories</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item  @if (Route::is('admin.category.index')) active @endif">
                    <a href="{{ route('admin.category.index') }}" class="menu-link">
                        <div class="text-truncate">Category List</div>
                    </a>
                </li>
                <li class="menu-item  @if (Route::is('admin.category.create')) active @endif">
                    <a href="{{ route('admin.category.create') }}" class="menu-link">
                        <div class="text-truncate">Add New Category</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item  @if (Route::is('admin.subcategory.index') || Route::is('admin.subcategory.create')) active open @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-category"></i>
                <div class="text-truncate">Subcategories</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item  @if (Route::is('admin.subcategory.index')) active @endif">
                    <a href="{{ route('admin.subcategory.index') }}" class="menu-link">
                        <div class="text-truncate">Subcategory List</div>
                    </a>
                </li>
                <li class="menu-item  @if (Route::is('admin.subcategory.create')) active @endif">
                    <a href="{{ route('admin.subcategory.create') }}" class="menu-link">
                        <div class="text-truncate">Add New Subcategory</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item  @if (Route::is('admin.brand.index') || Route::is('admin.brand.create')) active open @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-category-alt"></i>
                <div class="text-truncate">Brands</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item  @if (Route::is('admin.brand.index')) active @endif">
                    <a href="{{ route('admin.brand.index') }}" class="menu-link">
                        <div class="text-truncate">Brand List</div>
                    </a>
                </li>
                <li class="menu-item  @if (Route::is('admin.brand.create')) active @endif">
                    <a href="{{ route('admin.brand.create') }}" class="menu-link">
                        <div class="text-truncate">Add New Brand</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item @if (Route::is('admin.user.index') || Route::is('admin.user.show')) active @endif">
            <a href="{{ route('admin.user.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div class="text-truncate">Users</div>
            </a>
        </li>
        <li class="menu-item  @if (Route::is('admin.faq.index') || Route::is('admin.faq.create')) active open @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-comment-dots"></i>
                <div class="text-truncate">Faqs</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item  @if (Route::is('admin.faq.index')) active @endif">
                    <a href="{{ route('admin.faq.index') }}" class="menu-link">
                        <div class="text-truncate">FAQ List</div>
                    </a>
                </li>
                <li class="menu-item  @if (Route::is('admin.faq.create')) active @endif">
                    <a href="{{ route('admin.faq.create') }}" class="menu-link">
                        <div class="text-truncate">Add New FAQ</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item @if (Route::is('admin.general_setting_page') ||
                Route::is('admin.email_configuration_page') ||
                Route::is('admin.privacyPolicyPage') ||
                Route::is('admin.termsConditionPage')) active open @endif">
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
                <li class="menu-item  @if (Route::is('admin.email_configuration_page')) active @endif">
                    <a href="{{ route('admin.email_configuration_page') }}" class="menu-link">
                        <div class="text-truncate">Email Configuration</div>
                    </a>
                </li>
                <li class="menu-item  @if (Route::is('admin.termsConditionPage')) active @endif">
                    <a href="{{ route('admin.termsConditionPage') }}" class="menu-link">
                        <div class="text-truncate">Terms & Conditions</div>
                    </a>
                </li>
                <li class="menu-item  @if (Route::is('admin.privacyPolicyPage')) active @endif">
                    <a href="{{ route('admin.privacyPolicyPage') }}" class="menu-link">
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
