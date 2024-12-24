@php
    $setting = \App\Models\SystemSetting::first();
@endphp
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="" class="app-brand-link">
            @if ($setting && $setting->logo)
                <img src="{{ asset($setting->logo) }}" style="height: 95px;width: 176px;" alt="Logo">
            @else
                <img src="{{ asset('path/to/default/logo.png') }}" style="height: 95px;width: 176px;" alt="Default Logo">
            @endif
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    {{-- <div class="menu-inner-shadow"></div> --}}
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Dashboard</span></li>
    

    <ul class="menu-inner py-1">

        <li class="menu-item {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('admin.dashboard') }}">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        {{-- ..................................................... --}}

        <li class="menu-header small text-uppercase"><span class="menu-header-text">Verification</span></li>
        <!-- CMS -->
        <li class="menu-item {{ Request::routeIs('admin.user.business.*')|| Request::routeIs('admin.user.professional.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="Layouts">Verification</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{Request::routeIs('admin.user.business.*') ? 'active' : ''}}">
                    <a class="menu-link" href="{{route('admin.user.business.index')}}">Business</a>
                </li>
                <li class="menu-item {{Request::routeIs('admin.user.professional.*')?'active':''}}">
                    <a class="menu-link" href="{{route('admin.user.professional.index')}}">Professional</a>
                </li>
            </ul>
        </li>



        <li class="menu-header small text-uppercase"><span class="menu-header-text">CMS</span></li>
        <!-- CMS -->
        <li class="menu-item {{ Request::routeIs('admin.connect_community.*') || Request::routeIs('admin.hero_banner_content.*') || Request::routeIs('admin.maximize_community.*') || Request::routeIs('admin.community_cloase.*') || Request::routeIs('admin.looking_for.*') || Request::routeIs('admin.featured.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="Layouts">CMS</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{Request::routeIs('admin.connect_community.index') ? 'active' : ''}}">
                    <a class="menu-link" href="{{route('admin.connect_community.index')}}">Connect Community</a>
                </li>
                <li class="menu-item {{Request::routeIs('admin.hero_banner_content.index') ? 'active' : ''}}">
                    <a class="menu-link" href="{{route('admin.hero_banner_content.index')}}">Hero Banner Content</a>
                </li>
                <li class="menu-item {{Request::routeIs('admin.maximize_community.index') ? 'active' : ''}}">
                    <a class="menu-link" href="{{route('admin.maximize_community.index')}}">Maximize Community</a>
                </li>
                <li class="menu-item {{Request::routeIs('admin.community_cloase.index') ? 'active' : ''}}">
                    <a class="menu-link" href="{{route('admin.community_cloase.index')}}">Community Cloase</a>
                </li>
                <li class="menu-item {{Request::routeIs('admin.looking_for.index') ? 'active' : ''}}">
                    <a class="menu-link" href="{{route('admin.looking_for.index')}}">Looking For</a>
                </li>
                <li class="menu-item {{Request::routeIs('admin.featured.index') ? 'active' : ''}}">
                    <a class="menu-link" href="{{route('admin.featured.index')}}">Featured</a>
                </li>
            </ul>
        </li>



        <!-- FAQ-->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">FAQ</span></li>

        <li class="menu-item {{Request::routeIs('admin.faq.index') ? 'active' : ''}}">
            <a href="{{route('admin.faq.index')}}" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-badge-check'></i>
                <div data-i18n="Layouts">FAQ</div>
            </a>
        </li>

        <!-- User-->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">User</span></li>

        <li class="menu-item {{Request::routeIs('admin.user') ? 'active' : ''}}">
            <a href="{{route('admin.user')}}" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-user'></i>
                <div data-i18n="Layouts">User</div>
            </a>
        </li>

        {{-- ..................................................... --}}



        <!-- Settings -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Settings</span></li>
        <!-- Layouts -->
        <li
            class="menu-item {{ Request::routeIs('system.setting') || Request::routeIs('system.mail.index') || Request::routeIs('stripe.index') || Request::routeIs('admin.dynamic_page.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="Layouts">Settings</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ Request::routeIs('system.setting') ? 'active' : '' }}"><a class="menu-link"
                        href="{{ route('system.setting') }}">System Settings</a></li>

                <li class="menu-item {{ Request::routeIs('system.mail.index') ? 'active' : '' }}"><a class="menu-link"
                        href="{{ route('system.mail.index') }}">Mail Setting</a></li>

                <li class="menu-item {{ Request::routeIs('admin.socalmedia.setting') ? 'active' : '' }}"><a
                        class="menu-link" href="{{route('admin.socalmedia.setting')}}">Social Media</a></li>

                <li class="menu-item {{ Request::routeIs('admin.dynamic_page.index') ? 'active' : '' }}"><a
                    class="menu-link" href="{{route('admin.dynamic_page.index')}}">Dynamic Page</a></li>

                {{-- <li class="menu-item {{ Request::routeIs('admin.dynamic_page.*') ? 'active' : '' }}"><a
                        class="menu-link" href="{{ route('admin.dynamic_page.index') }}">Add Dynamic Page</a></li> --}}

                {{-- <li class="menu-item {{ Request::routeIs('stripe.index') ? 'active' : '' }}"><a class="menu-link"
                        href="{{ route('stripe.index') }}">Stripe</a></li>
                <li class="menu-item"><a class="menu-link" href="">Paypal</a></li> --}}
            </ul>
        </li>

        {{-- ..................................................... --}}

        {{-- prifile seatting --}}
        <li class="menu-item {{ Request::routeIs('profilesetting') ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('profilesetting') }}">
                <i class="menu-icon tf-icons bx bxs-user-account"></i>
                <div data-i18n="Support">Profile Setting</div>
            </a>
        </li>


    </ul>
</aside>
