@extends('web.frontend.app')

@section('title', 'Home')

@push('styles')
@endpush

@section('content')
    <main>
        <!-- banner section -->
        <section
            class="h-[calc(100vh-74px)] md:min-h-[calc(100vh-90px)] md:max-h-[calc(100vh-90px)] bg-cover bg-no-repeat bg-center overflow-x-hidden"
            style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.50), rgba(0, 0, 0, 0.5)), url({{ asset('homebg.jpg') }});">
            <div
                class="h-[calc(100vh-74px)] container mx-auto w-full font-boldFont md:h-[calc(100vh-90px)] flex items-center justify-start text-white px-6 sm:px-10 lg:px-16 xl:px-24">
                <div class="space-y-3 lg:space-y-6">
                    <h1 class="text-3xl sm:text-4xl md:text-5xl 2xl:text-6xl tracking-[-0.64px]">
                        {{ $heroStatic->title ?? 'Discover Black and Latino professionals and businesses in your community' }}
                    </h1>
                    <h3 class="text-lg sm:text-xl md:text-2xl tracking-[-0.24px] mt-5">
                        {{ $heroStatic->sub_title ?? 'Explore the possibilities nearby' }}
                    </h3>
                </div>
            </div>
        </section>



        <!-- about section -->
        <section class="px-5 md:px-8 2xl:px-24 w-full container mx-auto py-8 md:py-12 lg:py-16 xl:py-20 2xl:py-24">
            <!-- title section -->
            <div class="w-full flex flex-col md:flex-row gap-6 lg:gap-8 justify-between">
                <!-- title -->
                <div class="space-y-4 md:space-y-6 lg:space-y-7 flex-1">
                    <div class="text-2xl md:text-3xl lg:text-4xl md:space-y-2 font-boldFont">
                        <h2>{{ $maximizeStatic->title ?? 'Maximize Your Community' }}</h2>
                        <h2>{{ $maximizeStatic->sub_title ?? 'Connections with Ease' }}</h2>
                    </div>
                    <a href="{{ route('login') }}"
                        class="px-5 py-2 md:px-8 md:py-3 inline-block rounded-lg border tracking-wide border-primary bg-primary font-boldFont text-white">
                        Connect with Community
                    </a>
                </div>

                <!-- description -->
                <div class="flex-1 font-normalFont tracking-wider">
                    <p>
                        {!! $maximizeStatic->content ??
                            "Cloase is where communities unite to welcome newcomers, share
                                                                    recommendations, and stay updated on local news. It's a place
                                                                    where neighbors support local businesses and receive important
                                                                    updates from public agencies. From borrowing tools to selling
                                                                    furniture, Cloase helps you make the most of everything in your
                                                                    neighborhood. Welcome to your community!" !!}
                    </p>
                </div>
            </div>

            <!-- information section -->
            <div
                class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 lg:gap-10 my-8 md:my-12 lg:my-16 xl:my-24 2xl:my-28">

                @if ($dynamicContents->count() == 0)

                    <!-- item-1 -->
                    <div>
                        <div class="w-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-16 sm:size-20 md:size-24 2xl:size-28"
                                viewBox="0 0 116 101" fill="none">
                                <g clip-path="url(#clip0_8272_10)">
                                    <path
                                        d="M52.615 39.1953C52.615 67.8413 29.234 90.4003 0.5 90.4003V65.3073C14.765 65.3073 25.069 54.3193 25.069 39.2103L52.615 39.1953ZM90.065 39.1953C90.065 54.3053 100.551 65.3073 114.823 65.3073V90.4153C86.089 90.4153 62.708 67.8413 62.708 39.2103L90.065 39.1953Z"
                                        fill="#F8BF2C" />
                                    <path
                                        d="M27.166 28.8708L70.383 15.0278M43.484 79.7987L86.694 65.9558M67.924 2.46875L20.72 18.1337L47.403 98.5307L94.606 82.8647L67.924 2.46875Z"
                                        stroke="#008080" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M68.045 84.1223C68.665 84.1223 69.2595 83.876 69.6979 83.4376C70.1363 82.9993 70.3825 82.4047 70.3825 81.7848C70.3825 81.1648 70.1363 80.5703 69.6979 80.1319C69.2595 79.6935 68.665 79.4473 68.045 79.4473C67.4251 79.4473 66.8305 79.6935 66.3922 80.1319C65.9538 80.5703 65.7075 81.1648 65.7075 81.7848C65.7075 82.4047 65.9538 82.9993 66.3922 83.4376C66.8305 83.876 67.4251 84.1223 68.045 84.1223Z"
                                        fill="#008080" />
                                    <path
                                        d="M45.363 57.1446C47.1373 56.9705 48.9284 57.1694 50.6213 57.7286C52.3142 58.2878 53.8714 59.1949 55.193 60.3916C57.9895 49.5525 61.3236 38.8593 65.183 28.3516"
                                        stroke="#008080" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_8272_10">
                                        <rect width="115" height="100" fill="white" transform="translate(0.5 0.5)" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                        <!-- info -->
                        <div class="mt-4 md:mt-6 lg:mt-8 text-center space-y-3 md:space-y-4">
                            <h3 class="font-boldFont text-xl md:text-2xl">Essential</h3>
                            <p class="font-normalFont tracking-wider">
                                Get real-time updates and insights from trusted professionals,
                                and local businesses on Close
                            </p>
                        </div>
                    </div>

                    <!-- item-2 -->
                    <div>
                        <div class="w-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-16 sm:size-20 md:size-24 2xl:size-28"
                                viewBox="0 0 100 105" fill="none">
                                <g clip-path="url(#clip0_8272_47)">
                                    <path
                                        d="M49.535 105C76.8924 105 99.07 96.6829 99.07 86.4237C99.07 76.1644 76.8924 67.8477 49.535 67.8477C22.1776 67.8477 0 76.1644 0 86.4237C0 96.6829 22.1776 105 49.535 105Z"
                                        fill="#F8BF2C" />
                                    <mask id="mask0_8272_47" style="mask-type: luminance" maskUnits="userSpaceOnUse" x="17"
                                        y="0" width="68" height="95">
                                        <path d="M17.38 0H84.38V95H17.38V0Z" fill="white" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M51.9 84.802C55.653 80.179 59.405 75.18 62.9 70.001C67.48 63.211 71.261 56.631 73.965 50.496C76.905 43.822 78.457 37.916 78.457 33.039C78.457 17.534 65.922 5 50.417 5C34.915 5 22.38 17.534 22.38 33.039C22.38 37.915 23.932 43.823 26.872 50.496C29.576 56.632 33.356 63.211 37.937 70.001C41.432 75.181 45.184 80.179 48.937 84.802C49.445 85.43 49.94 86.032 50.419 86.609C50.898 86.033 51.392 85.429 51.902 84.802H51.9ZM50.418 47.058C58.153 47.058 64.438 40.774 64.438 33.038C64.438 25.303 58.153 19.019 50.418 19.019C42.682 19.019 36.398 25.303 36.398 33.039C36.398 40.774 42.682 47.058 50.418 47.058Z"
                                            fill="black" />
                                    </mask>
                                    <g mask="url(#mask0_8272_47)">
                                        <path
                                            d="M50.418 86.609L46.571 89.803L50.418 94.437L54.265 89.803L50.418 86.609ZM58.755 67.204C55.352 72.248 51.689 77.129 48.018 81.652L55.783 87.953C59.616 83.23 63.458 78.113 67.045 72.797L58.755 67.204ZM69.389 48.48C66.839 54.269 63.222 60.583 58.755 67.204L67.045 72.797C71.74 65.839 75.685 58.995 78.541 52.512L69.389 48.48ZM73.458 33.039C73.458 36.944 72.189 42.127 69.389 48.48L78.541 52.512C81.623 45.518 83.458 38.887 83.458 33.039H73.458ZM50.417 10C63.161 10 73.458 20.296 73.458 33.039H83.458C83.458 14.773 68.683 0 50.417 0V10ZM27.38 33.039C27.38 20.296 37.674 10 50.417 10V0C32.152 0 17.379 14.773 17.379 33.039H27.38ZM31.448 48.48C28.648 42.127 27.38 36.944 27.38 33.039H17.379C17.379 38.887 19.215 45.519 22.297 52.512L31.448 48.48ZM42.08 67.204C37.613 60.584 33.996 54.269 31.446 48.48L22.296 52.512C25.152 58.995 29.096 65.839 33.791 72.797L42.08 67.204ZM52.817 81.652C49.146 77.129 45.483 72.248 42.08 67.204L33.791 72.797C37.378 78.113 41.219 83.23 45.052 87.953L52.817 81.652ZM54.264 83.415C53.797 82.853 53.314 82.265 52.817 81.652L45.052 87.953C45.572 88.595 46.08 89.212 46.571 89.803L54.264 83.415ZM48.017 81.652C47.52 82.265 47.037 82.853 46.57 83.415L54.265 89.803C54.755 89.212 55.262 88.595 55.783 87.953L48.017 81.652ZM59.437 33.039C59.437 38.013 55.391 42.059 50.417 42.059V52.059C60.914 52.059 69.437 43.536 69.437 33.039H59.437ZM50.417 24.019C55.391 24.019 59.437 28.065 59.437 33.039H69.437C69.437 22.542 60.914 14.019 50.417 14.019V24.019ZM41.397 33.039C41.397 28.065 45.443 24.019 50.417 24.019V14.019C39.92 14.019 31.397 22.542 31.397 33.039H41.397ZM50.417 42.059C45.443 42.059 41.397 38.013 41.397 33.039H31.397C31.397 43.536 39.92 52.059 50.417 52.059V42.059Z"
                                            fill="#008080" />
                                    </g>
                                </g>
                                <defs>
                                    <clipPath id="clip0_8272_47">
                                        <rect width="100" height="105" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                        <!-- info -->
                        <div class="mt-4 md:mt-6 lg:mt-8 text-center space-y-3 md:space-y-4">
                            <h3 class="font-boldFont text-xl md:text-2xl">Local</h3>
                            <p class="font-normalFont tracking-wider">
                                The easiest way to connect instantly with local professionals,
                                businesses, community on closer
                            </p>
                        </div>
                    </div>

                    <!-- item-3 -->
                    <div class="md:col-span-2 lg:col-span-1 w-1/2 mx-auto">
                        <div class="">
                            <div class="w-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-16 sm:size-20 md:size-24 2xl:size-28"
                                    viewBox="0 0 120 101" fill="none">
                                    <g clip-path="url(#clip0_8272_55)">
                                        <path
                                            d="M31.142 40.0957C31.142 47.6712 34.1514 54.9365 39.5081 60.2931C44.8648 65.6498 52.13 68.6592 59.7055 68.6592C67.281 68.6592 74.5463 65.6498 79.903 60.2931C85.2597 54.9365 88.269 47.6712 88.269 40.0957H119.403C119.495 47.9944 118.018 55.8327 115.059 63.1568C112.1 70.4808 107.717 77.1448 102.164 82.7628C96.6114 88.3809 89.9989 92.8412 82.7099 95.8855C75.4209 98.9298 67.6002 100.497 59.701 100.498C51.8018 100.498 43.9812 98.93 36.6922 95.8858C29.4031 92.8415 22.7906 88.3812 17.2378 82.7631C11.6849 77.145 7.30202 70.4809 4.34308 63.1568C1.38414 55.8328 -0.092053 47.9944 2.88174e-05 40.0957H31.142Z"
                                            fill="#FFC107" fill-opacity="0.2" />
                                        <path
                                            d="M99.76 40.7192C99.2339 40.9398 98.6516 40.9888 98.096 40.8591L97.283 40.5252L90.872 36.5951V73.0421C90.8699 73.7614 90.5827 74.4506 90.0735 74.9585C89.5642 75.4665 88.8743 75.7519 88.155 75.7522H31.598C31.2421 75.7522 30.8897 75.6821 30.5609 75.5459C30.2321 75.4097 29.9334 75.2101 29.6817 74.9584C29.4301 74.7068 29.2305 74.408 29.0943 74.0792C28.9581 73.7504 28.888 73.398 28.888 73.0421V36.5722L22.438 40.5252C22.1344 40.7114 21.7971 40.836 21.4454 40.8918C21.0936 40.9475 20.7343 40.9334 20.388 40.8502C20.041 40.7695 19.7138 40.6199 19.4257 40.4103C19.1376 40.2007 18.8946 39.9354 18.711 39.6301L14.643 32.9671C14.2667 32.3554 14.1488 31.6192 14.3151 30.9205C14.4814 30.2218 14.9184 29.6178 15.53 29.2411L30.76 19.9341L44.313 11.6041L58.461 2.93915C58.8875 2.68001 59.377 2.54297 59.876 2.54297C60.3751 2.54297 60.8645 2.68001 61.291 2.93915L104.198 29.2401C104.501 29.426 104.765 29.6698 104.975 29.9576C105.184 30.2455 105.334 30.5717 105.417 30.9177C105.501 31.2637 105.515 31.6227 105.459 31.9742C105.403 32.3257 105.279 32.6628 105.093 32.9661L101.025 39.6292C100.728 40.1162 100.285 40.4972 99.759 40.7182L99.76 40.7192Z"
                                            stroke="#008080" stroke-width="5" stroke-linejoin="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_8272_55">
                                            <rect width="120" height="100" fill="white"
                                                transform="translate(0 0.5)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <!-- info -->
                            <div class="mt-4 md:mt-6 lg:mt-8 text-center space-y-3 md:space-y-4">
                                <h3 class="font-boldFont text-xl md:text-2xl">Trusted</h3>
                                <p class="font-normalFont tracking-wider">
                                    A trusted space where all members and businesses are verified.
                                </p>
                            </div>
                        </div>
                    </div>
                @else
                    @foreach ($dynamicContents as $dynamicContent)
                        <div>
                            <div class="w-full flex items-center justify-center">
                                {!! $dynamicContent->image
                                    ? '<img src="' . $dynamicContent->image . '" width="115" height="100" alt="Image">'
                                    : '<svg xmlns="http://www.w3.org/2000/svg" class="size-16 sm:size-20 md:size-24 2xl:size-28"
                                                                                            viewBox="0 0 116 101" fill="none">
                                                                                            <g clip-path="url(#clip0_8272_10)">
                                                                                                <path
                                                                                                    d="M52.615 39.1953C52.615 67.8413 29.234 90.4003 0.5 90.4003V65.3073C14.765 65.3073 25.069 54.3193 25.069 39.2103L52.615 39.1953ZM90.065 39.1953C90.065 54.3053 100.551 65.3073 114.823 65.3073V90.4153C86.089 90.4153 62.708 67.8413 62.708 39.2103L90.065 39.1953Z"
                                                                                                    fill="#F8BF2C" />
                                                                                                <path
                                                                                                    d="M27.166 28.8708L70.383 15.0278M43.484 79.7987L86.694 65.9558M67.924 2.46875L20.72 18.1337L47.403 98.5307L94.606 82.8647L67.924 2.46875Z"
                                                                                                    stroke="#008080" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" />
                                                                                                <path
                                                                                                    d="M68.045 84.1223C68.665 84.1223 69.2595 83.876 69.6979 83.4376C70.1363 82.9993 70.3825 82.4047 70.3825 81.7848C70.3825 81.1648 70.1363 80.5703 69.6979 80.1319C69.2595 79.6935 68.665 79.4473 68.045 79.4473C67.4251 79.4473 66.8305 79.6935 66.3922 80.1319C65.9538 80.5703 65.7075 81.1648 65.7075 81.7848C65.7075 82.4047 65.9538 82.9993 66.3922 83.4376C66.8305 83.876 67.4251 84.1223 68.045 84.1223Z"
                                                                                                    fill="#008080" />
                                                                                                <path
                                                                                                    d="M45.363 57.1446C47.1373 56.9705 48.9284 57.1694 50.6213 57.7286C52.3142 58.2878 53.8714 59.1949 55.193 60.3916C57.9895 49.5525 61.3236 38.8593 65.183 28.3516"
                                                                                                    stroke="#008080" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" />
                                                                                            </g>
                                                                                            <defs>
                                                                                                <clipPath id="clip0_8272_10">
                                                                                                    <rect width="115" height="100" fill="white" transform="translate(0.5 0.5)" />
                                                                                                </clipPath>
                                                                                            </defs>
                                                                                        </svg>' !!}
                            </div>
                            <!-- info -->
                            <div class="mt-4 md:mt-6 lg:mt-8 text-center space-y-3 md:space-y-4">
                                <h3 class="font-boldFont text-xl md:text-2xl">{{ $dynamicContent->title ?? 'Essential' }}
                                </h3>
                                <p class="font-normalFont tracking-wider">
                                    {!! $dynamicContent->content ??
                                        'Get real-time updates and insights from trusted professionals,
                                                                                                and local businesses on Close' !!}
                                </p>
                            </div>
                        </div>
                    @endforeach

                @endif


            </div>

            <!-- community Promotion -->
            <div class="w-full flex flex-col items-center justify-center gap-5 md:gap-8">
                <h3 class="font-boldFont text-xl sm:text-2xl md:text-3xl text-center">
                    {{ $communityStatic->title ?? 'Instantly Connect with Your Community on Cloase' }}
                </h3>
                <a href="{{ route('login') }}"
                    class="px-5 py-2 md:px-8 md:py-3 rounded-lg border tracking-wide border-primary bg-primary font-boldFont text-white">
                    Connect with Community
                </a>
            </div>
        </section>
    </main>

@endsection

@push('scripts')
@endpush
