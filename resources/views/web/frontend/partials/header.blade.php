@if (!auth()->user())
    <header class="container mx-auto px-5 md:px-8 2xl:px-0">
        <nav class="py-4 md:py-5 w-full flex items-center justify-between">
            <!-- logo -->
            <div>
                <a href="{{ route('index') }}" class="flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-10 md:size-12 lg:size-14" viewBox="0 0 51 48"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M25.394 16.3611L32.2544 12.4005C33.6571 11.5903 34.1425 9.77961 33.3316 8.37627C32.5218 6.97328 30.7114 6.48818 29.3084 7.2984L22.8436 11.0309L4.41683 0.392493C3.01315 -0.41772 1.20247 0.0673744 0.392597 1.47071C-0.41796 2.8737 0.0671392 4.68438 1.47082 5.4946L20.2922 16.3614L22.8426 17.8339L25.394 16.3614V16.3611ZM22.8436 2.19319C24.4702 2.19319 25.7893 3.51259 25.7893 5.13955C25.7893 6.76651 24.4702 8.08487 22.8436 8.08487C21.217 8.08487 19.8979 6.76617 19.8979 5.13955C19.8979 3.51293 21.2163 2.19319 22.8436 2.19319Z"
                            fill="#FF4040" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M37.8602 28.1984C37.0469 29.6072 35.2462 30.0892 33.837 29.2759C32.4279 28.4626 31.9455 26.6616 32.7588 25.2527C33.5718 23.8435 35.3739 23.3612 36.7827 24.1745C38.1919 24.9878 38.6742 26.7896 37.8602 28.1987M24.3157 23.3237V31.2445C24.3157 32.865 25.642 34.1902 27.2614 34.1902C28.8808 34.1902 30.2071 32.865 30.2071 31.2445V23.7799L48.6338 13.1412C50.0375 12.331 50.5219 10.5203 49.7121 9.11694C48.9015 7.7136 47.0908 7.22885 45.6878 8.03906L26.8665 18.9052L24.3151 20.378V23.3234L24.3157 23.3237Z"
                            fill="#F8BF2C" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.82562 28.1995C7.01231 26.7903 7.49466 24.9885 8.90384 24.1742C10.3127 23.3612 12.1148 23.8439 12.9277 25.2535C13.741 26.6616 13.2587 28.4633 11.8495 29.2767C10.4407 30.09 8.63859 29.6073 7.82562 28.1991M18.8194 18.9056L11.9589 14.945C10.5563 14.1351 8.74558 14.6202 7.93571 16.0232C7.12585 17.4266 7.61094 19.2369 9.01394 20.0468L15.4788 23.7796V45.0567C15.4788 46.6771 16.804 48.0024 18.4244 48.0024C20.0449 48.0024 21.3701 46.6771 21.3701 45.0567V20.3781L18.8187 18.9052L18.8194 18.9056Z"
                            fill="#008080" />
                    </svg>
                    <p class="font-boldFont">Connect</p>
                </a>
            </div>
            @if (!Route::is('login') && !Route::is('signUp') && !Route::is('signUpWithCode') && !Route::is('verifyEmail') && !Route::is('forgotPassword') && !Route::is('selectType') && !Route::is('professionalPersonalInfo') && !Route::is('profileInformation') && !Route::is('personalInformation') && !Route::is('businessInformation') && !Route::is('businessPhoto') && !Route::is('businessDescription') && !Route::is('operatingHours') && !Route::is('submitVerification'))

            <!-- Auth Buttons -->
            <div class="flex items-center gap-6">
                <a href="{{ route('login') }}"
                    class="font-boldFont px-6 md:px-8 py-2 md:py-3 rounded-lg border border-[#E6EBEF] md:w-32 flex items-center justify-center">
                    Log In
                </a>
                <a href="{{ route('signUp') }}"
                    class="font-boldFont px-8 py-3 rounded-lg border border-[#E6EBEF] bg-primary text-white w-32 md:flex items-center justify-center hidden">
                    Sign Up
                </a>
            </div>
            
            @endif
        </nav>
    </header>
@else
    <header class="container mx-auto">
        <nav class="py-4 md:py-5 w-full flex items-center justify-between px-5 md:px-8 2xl:px-0">
            <!-- logo -->
            <div>
                <a href="{{ route('userHomePage') }}" class="flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-10 md:size-12 lg:size-14" viewBox="0 0 51 48"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M25.394 16.3611L32.2544 12.4005C33.6571 11.5903 34.1425 9.77961 33.3316 8.37627C32.5218 6.97328 30.7114 6.48818 29.3084 7.2984L22.8436 11.0309L4.41683 0.392493C3.01315 -0.41772 1.20247 0.0673744 0.392597 1.47071C-0.41796 2.8737 0.0671392 4.68438 1.47082 5.4946L20.2922 16.3614L22.8426 17.8339L25.394 16.3614V16.3611ZM22.8436 2.19319C24.4702 2.19319 25.7893 3.51259 25.7893 5.13955C25.7893 6.76651 24.4702 8.08487 22.8436 8.08487C21.217 8.08487 19.8979 6.76617 19.8979 5.13955C19.8979 3.51293 21.2163 2.19319 22.8436 2.19319Z"
                            fill="#FF4040" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M37.8602 28.1984C37.0469 29.6072 35.2462 30.0892 33.837 29.2759C32.4279 28.4626 31.9455 26.6616 32.7588 25.2527C33.5718 23.8435 35.3739 23.3612 36.7827 24.1745C38.1919 24.9878 38.6742 26.7896 37.8602 28.1987M24.3157 23.3237V31.2445C24.3157 32.865 25.642 34.1902 27.2614 34.1902C28.8808 34.1902 30.2071 32.865 30.2071 31.2445V23.7799L48.6338 13.1412C50.0375 12.331 50.5219 10.5203 49.7121 9.11694C48.9015 7.7136 47.0908 7.22885 45.6878 8.03906L26.8665 18.9052L24.3151 20.378V23.3234L24.3157 23.3237Z"
                            fill="#F8BF2C" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.82562 28.1995C7.01231 26.7903 7.49466 24.9885 8.90384 24.1742C10.3127 23.3612 12.1148 23.8439 12.9277 25.2535C13.741 26.6616 13.2587 28.4633 11.8495 29.2767C10.4407 30.09 8.63859 29.6073 7.82562 28.1991M18.8194 18.9056L11.9589 14.945C10.5563 14.1351 8.74558 14.6202 7.93571 16.0232C7.12585 17.4266 7.61094 19.2369 9.01394 20.0468L15.4788 23.7796V45.0567C15.4788 46.6771 16.804 48.0024 18.4244 48.0024C20.0449 48.0024 21.3701 46.6771 21.3701 45.0567V20.3781L18.8187 18.9052L18.8194 18.9056Z"
                            fill="#008080" />
                    </svg>
                    <p class="font-boldFont">Connect</p>
                </a>
            </div>

            <!-- Auth Buttons -->
            <div class="md:flex items-center gap-6 hidden">
                <a href="{{ route('communityJoin') }}"
                    class="font-boldFont text-[#141414] w-32 flex items-center justify-center">
                    Inbox
                </a>

                <!-- dropdown -->
                <button
                    class="px-8 py-3 border border-[#E6EBEF] text-[#222222] rounded-lg font-mediumFont navbar-dropdown-btn relative">
                    <div class="flex items-center gap-2">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="none">
                                <path
                                    d="M6.79199 5.62435C6.79199 3.85523 8.23121 2.41602 10.0003 2.41602C11.769 2.41602 13.2079 3.85444 13.2087 5.6229C13.2011 7.35868 11.8508 8.75681 10.129 8.82431C10.0423 8.81582 9.95671 8.81672 9.87889 8.82285C8.11768 8.73861 6.79199 7.34126 6.79199 5.62435Z"
                                    stroke="#222222" stroke-width="1.5" />
                                <path
                                    d="M6.18422 16.5354L6.18217 16.534C5.28374 15.9351 4.88281 15.1957 4.88281 14.4831C4.88281 13.7699 5.28435 13.0225 6.19006 12.4157C7.21325 11.7391 8.59388 11.3789 10.0099 11.3789C11.4269 11.3789 12.8029 11.7395 13.8168 12.4154C14.7097 13.0107 15.1092 13.7496 15.1161 14.4694C15.115 15.1901 14.7132 15.9291 13.814 16.5359C12.7961 17.2191 11.4169 17.5831 9.99948 17.5831C8.58173 17.5831 7.20222 17.2189 6.18422 16.5354Z"
                                    stroke="#222222" stroke-width="1.5" />
                            </svg>
                        </div>
                        <div>
                            <p>Hi, {{ Auth::user()->last_name ?? '' }}</p>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"
                                fill="none">
                                <path
                                    d="M9.96004 4.47461L6.70004 7.73461C6.31504 8.11961 5.68504 8.11961 5.30004 7.73461L2.04004 4.47461"
                                    stroke="#222222" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>

                    <!-- dropdown -->
                    <div
                        class="absolute w-full navbar-dropdown left-0 bg-white rounded-md px-8 py-2 shadow-[0px_6px_16px_0px_rgba(20,20,20,0.15)] translate-y-7 opacity-0 -z-10 transition-all duration-500 mt-5">
                        <div>
                            <a href="{{ route('account') }}" class="py-4 border-b border-[#14141414] block">Account</a>
                            <a class="py-4 block" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                
                                <span>Logout</span>
                                <!-- Logout Form -->
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>

                            </a>
                        </div>
                    </div>
                </button>
            </div>

            <div class="md:hidden">
                <div id="menu-hamburger"
                    class="bg-primary p-2 size-10 flex items-center justify-center rounded-md md:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                        x="0" y="0" viewBox="0 0 20 20" style="enable-background: new 0 0 512 512" xml:space="preserve"
                        class="">
                        <g>
                            <path fill="#ffffff" fill-rule="evenodd"
                                d="M3 5a1 1 0 0 1 1-1h12a1 1 0 1 1 0 2H4a1 1 0 0 1-1-1zm0 5a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H4a1 1 0 0 1-1-1zm0 5a1 1 0 0 1 1-1h12a1 1 0 0 1 0 2H4a1 1 0 0 1-1-1z"
                                clip-rule="evenodd" opacity="1" data-original="#ffffff" class=""></path>
                        </g>
                    </svg>
                </div>
                <div id="menu-close"
                    class="bg-primary p-2 hidden size-10 items-center justify-center rounded-md md:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                        x="0" y="0" viewBox="0 0 24 24" style="enable-background: new 0 0 512 512" xml:space="preserve"
                        class="">
                        <g>
                            <path
                                d="M14.121 12 18 8.117A1.5 1.5 0 0 0 15.883 6L12 9.879 8.11 5.988A1.5 1.5 0 1 0 5.988 8.11L9.879 12 6 15.882A1.5 1.5 0 1 0 8.118 18L12 14.121 15.878 18A1.5 1.5 0 0 0 18 15.878Z"
                                fill="#ffffff" opacity="1" data-original="#ffffff"></path>
                        </g>
                    </svg>
                </div>
            </div>

            <!-- sidebar -->
            <div id="sidebar"
                class="fixed left-0 top-0 z-20 h-full w-60 -translate-x-full transform overflow-y-scroll bg-white transition-transform duration-500 md:w-64">
                <!-- logo -->
                <div class="flex w-full items-center pb-2 pl-10 pt-12 font-roboto font-bold text-primary md:text-xl">
                    <a href="{{ route('userHomePage') }}" class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-10 md:size-12 lg:size-14"
                            viewBox="0 0 51 48" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M25.394 16.3611L32.2544 12.4005C33.6571 11.5903 34.1425 9.77961 33.3316 8.37627C32.5218 6.97328 30.7114 6.48818 29.3084 7.2984L22.8436 11.0309L4.41683 0.392493C3.01315 -0.41772 1.20247 0.0673744 0.392597 1.47071C-0.41796 2.8737 0.0671392 4.68438 1.47082 5.4946L20.2922 16.3614L22.8426 17.8339L25.394 16.3614V16.3611ZM22.8436 2.19319C24.4702 2.19319 25.7893 3.51259 25.7893 5.13955C25.7893 6.76651 24.4702 8.08487 22.8436 8.08487C21.217 8.08487 19.8979 6.76617 19.8979 5.13955C19.8979 3.51293 21.2163 2.19319 22.8436 2.19319Z"
                                fill="#FF4040" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M37.8602 28.1984C37.0469 29.6072 35.2462 30.0892 33.837 29.2759C32.4279 28.4626 31.9455 26.6616 32.7588 25.2527C33.5718 23.8435 35.3739 23.3612 36.7827 24.1745C38.1919 24.9878 38.6742 26.7896 37.8602 28.1987M24.3157 23.3237V31.2445C24.3157 32.865 25.642 34.1902 27.2614 34.1902C28.8808 34.1902 30.2071 32.865 30.2071 31.2445V23.7799L48.6338 13.1412C50.0375 12.331 50.5219 10.5203 49.7121 9.11694C48.9015 7.7136 47.0908 7.22885 45.6878 8.03906L26.8665 18.9052L24.3151 20.378V23.3234L24.3157 23.3237Z"
                                fill="#F8BF2C" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.82562 28.1995C7.01231 26.7903 7.49466 24.9885 8.90384 24.1742C10.3127 23.3612 12.1148 23.8439 12.9277 25.2535C13.741 26.6616 13.2587 28.4633 11.8495 29.2767C10.4407 30.09 8.63859 29.6073 7.82562 28.1991M18.8194 18.9056L11.9589 14.945C10.5563 14.1351 8.74558 14.6202 7.93571 16.0232C7.12585 17.4266 7.61094 19.2369 9.01394 20.0468L15.4788 23.7796V45.0567C15.4788 46.6771 16.804 48.0024 18.4244 48.0024C20.0449 48.0024 21.3701 46.6771 21.3701 45.0567V20.3781L18.8187 18.9052L18.8194 18.9056Z"
                                fill="#008080" />
                        </svg>
                        <p class="font-boldFont">Connect</p>
                    </a>
                </div>

                <!-- Profile info -->
                <div class="pt-4 px-4">
                    <button
                        class="px-5 py-2 text-sm text-[#222222] border-b border-black/20 font-mediumFont navbar-dropdown-btn relative w-full">
                        <div class="flex items-center gap-2">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 20 20" fill="none">
                                    <path
                                        d="M6.79199 5.62435C6.79199 3.85523 8.23121 2.41602 10.0003 2.41602C11.769 2.41602 13.2079 3.85444 13.2087 5.6229C13.2011 7.35868 11.8508 8.75681 10.129 8.82431C10.0423 8.81582 9.95671 8.81672 9.87889 8.82285C8.11768 8.73861 6.79199 7.34126 6.79199 5.62435Z"
                                        stroke="#222222" stroke-width="1.5" />
                                    <path
                                        d="M6.18422 16.5354L6.18217 16.534C5.28374 15.9351 4.88281 15.1957 4.88281 14.4831C4.88281 13.7699 5.28435 13.0225 6.19006 12.4157C7.21325 11.7391 8.59388 11.3789 10.0099 11.3789C11.4269 11.3789 12.8029 11.7395 13.8168 12.4154C14.7097 13.0107 15.1092 13.7496 15.1161 14.4694C15.115 15.1901 14.7132 15.9291 13.814 16.5359C12.7961 17.2191 11.4169 17.5831 9.99948 17.5831C8.58173 17.5831 7.20222 17.2189 6.18422 16.5354Z"
                                        stroke="#222222" stroke-width="1.5" />
                                </svg>
                            </div>
                            <div>
                                <p>Hi, {{ Auth::user()->last_name ?? '' }}</p>
                            </div>
                        </div>
                    </button>
                </div>
                <!-- NavLinks ::start -->
                <div class="py-4 pl-10 font-inter text-sm">
                    <div class="flex flex-col justify-center gap-4 font-boldFont">
                        <a href="{{ route('communityInbox') }}">Inbox</a>
                        <a href="{{ route('account') }}">Account</a>
                        <a class="py-4 block" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                
                            <span>Logout</span>
                            <!-- Logout Form -->
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>

                        </a>
                    </div>
                </div>
                <!-- NavLinks ::end -->
            </div>
        </nav>
    </header>
@endif
