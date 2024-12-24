@extends('web.frontend.app')

@section('title', 'User Homepage')

@push('styles')
@endpush

@section('content')


    <main>
        <!-- banner section -->
        <section
            class="min-h-[calc(100vh-72px)] sm:min-h-[calc(100vh-90px)] sm:max-h-[calc(100vh-90px)] bg-cover bg-no-repeat bg-center h-full flex items-center justify-center"
            style="background-image: linear-gradient(0deg, rgba(0,0,0,0.50), rgba(0,0,0,0.5)), url('{{ asset('homebg.jpg') }}');">
            <!-- mobile -->
            <div class="bg-[#004040] rounded-xl p-6 md:hidden mx-5 text-white sm:hidden">
                <div class="space-y-3">
                    <h1 class="text-3xl sm:text-4xl font-bold tracking-tight">
                        Welcome back, {{ Auth::user()->last_name ?? '' }}
                    </h1>
                    <h3 class="text-base">
                        {{ $lookingFor->title ?? 'Looking for a Doctor, Lawyer, or other professional?' }}
                    </h3>
                </div>

                <!-- Mobile Search Form -->
                {{-- <form class="mt-6 space-y-4">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input type="text" placeholder="Search"
                            class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white text-gray-900 placeholder-gray-500 focus:ring-2 focus:outline-none" />
                    </div>

                    <div class="hero-banner-select-sm">
                        <select name="user_type" class="text-sm md:text-base">
                            <option value="All Categories" disabled selected>
                                All Categories
                            </option>
                            <option value="professional">Professional</option>
                            <option value="business">Business</option>
                        </select>
                    </div>

                    <button class="px-6 w-full lg:px-8 py-2 lg:py-3 font-medium bg-[#FF4040] text-white rounded-md">
                        Search
                    </button>
                </form> --}}
                <form method="GET" action="{{ route('userHomePage') }}"
                    class="bg-white font-poppins text-[#2E2E2E] w-full rounded-xl px-6 py-2 mt-8 flex items-center gap-4">

                    <div class="flex-1">
                        <label for="hero-search" class="flex items-center">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                    fill="none">
                                    <path
                                        d="M8.75 15C12.2018 15 15 12.2018 15 8.75C15 5.29822 12.2018 2.5 8.75 2.5C5.29822 2.5 2.5 5.29822 2.5 8.75C2.5 12.2018 5.29822 15 8.75 15Z"
                                        stroke="#6A6A6A" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M17.4997 17.4997L13.333 13.333" stroke="#6A6A6A" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <input type="text" name="search" placeholder="Search"
                                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white text-gray-900 placeholder-gray-500 focus:ring-2 focus:outline-none"
                                value="{{ request('search') ?? '' }}" />
                        </label>
                    </div>

                    <div>
                        <select name="user_type" class="text-sm md:text-base">
                            <option value=""
                                {{ request()->has('user_type') && request('user_type') === '' ? 'selected' : '' }}>
                                All Categories
                            </option>
                            <option value="professional" {{ request('user_type') == 'professional' ? 'selected' : '' }}>
                                Professional
                            </option>
                            <option value="business" {{ request('user_type') == 'business' ? 'selected' : '' }}>
                                Business
                            </option>
                        </select>
                    </div>

                    <button type="submit" class="px-6 lg:px-8 py-2 lg:py-3 font-medium bg-[#FF4040] text-white rounded-md">
                        Search
                    </button>
                </form>
            </div>
            <!-- medium device -->
            <div
                class="container mx-auto w-full font-boldFont h-[calc(100vh-72px)] md:h-[calc(100vh-90px)] sm:flex items-center justify-start text-white sm:px-8 md:px-12 2xl:px-24 hidden">
                <div class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 893 506" fill="none"
                        class="hidden sm:block sm:h-[350px] sm:w-[580px] md:h-[400px] md:w-[700px] lg:h-[510px] lg:w-[895px]">
                        <path
                            d="M0 80.2496C0 34.4417 38.3903 -2.01214 84.1369 0.356626L679.139 31.166C709.392 32.7325 736.165 51.2529 748.302 79.0093L886.007 393.95C909.117 446.804 870.392 506 812.708 506H80C35.8172 506 0 470.183 0 426V80.2496Z"
                            fill="#004040" />
                    </svg>

                    <!-- contents -->
                    <div
                        class="absolute inset-0 sm:pl-8 sm:mr-16 md:pl-10 md:mr-20 2xl:pl-14 2xl:mr-32 flex flex-col justify-center">
                        <div class="space-y-6">
                            <h1 class="flex flex-col gap-4 sm:text-4xl lg:text-5xl xl:text-6xl tracking-[-0.64px]">
                                Welcome back, {{ Auth::user()->last_name ?? '' }}
                            </h1>
                            <h3 class="text-base lg:text-xl tracking-[-0.24px]">
                                {{ $lookingFor->title ?? 'Looking for a Doctor, Lawyer, or other professional?' }}
                            </h3>
                        </div>

                        <!-- filter -->
                        {{-- <form
                            class="bg-white font-poppins text-[#2E2E2E] w-full rounded-xl px-6 py-2 mt-8 flex items-center gap-4">
                            <div class="flex-1">
                                <label for="hero-search" class="flex items-center">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none">
                                            <path
                                                d="M8.75 15C12.2018 15 15 12.2018 15 8.75C15 5.29822 12.2018 2.5 8.75 2.5C5.29822 2.5 2.5 5.29822 2.5 8.75C2.5 12.2018 5.29822 15 8.75 15Z"
                                                stroke="#6A6A6A" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M17.4997 17.4997L13.333 13.333" stroke="#6A6A6A" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <input placeholder="Search" type="text"
                                        class="text-[#222222] font-mediumFont focus:outline-none text w-full rounded-md px-4"
                                        name="hero-search" id="hero-search" />
                                </label>
                            </div>

                            <!-- select -->
                            <div class="hero-banner-select">
                                <select class="text-sm md:text-base">
                                    <option value="All Categories" disabled selected>
                                        All Categories
                                    </option>
                                    <option value="Professional">Professional</option>
                                    <option value="Business">Business</option>
                                </select>
                            </div>

                            <button class="px-6 lg:px-8 py-2 lg:py-3 font-medium bg-[#FF4040] text-white rounded-md">
                                Search
                            </button>
                        </form> --}}
                        <form method="GET" action="{{ route('userHomePage') }}"
                            class="bg-white font-poppins text-[#2E2E2E] w-full rounded-xl px-6 py-2 mt-8 flex items-center gap-4">

                            <div class="flex-1">
                                <label for="hero-search" class="flex items-center">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none">
                                            <path
                                                d="M8.75 15C12.2018 15 15 12.2018 15 8.75C15 5.29822 12.2018 2.5 8.75 2.5C5.29822 2.5 2.5 5.29822 2.5 8.75C2.5 12.2018 5.29822 15 8.75 15Z"
                                                stroke="#6A6A6A" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M17.4997 17.4997L13.333 13.333" stroke="#6A6A6A" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <input type="text" name="search" placeholder="Search"
                                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white text-gray-900 placeholder-gray-500 focus:ring-2 focus:outline-none"
                                        value="{{ request('search') ?? '' }}" />
                                </label>
                            </div>

                            <div>
                                <select name="user_type" class="text-sm md:text-base">
                                    <option value=""
                                        {{ request()->has('user_type') && request('user_type') === '' ? 'selected' : '' }}>
                                        All Categories
                                    </option>
                                    <option value="professional"
                                        {{ request('user_type') == 'professional' ? 'selected' : '' }}>
                                        Professional
                                    </option>
                                    <option value="business" {{ request('user_type') == 'business' ? 'selected' : '' }}>
                                        Business
                                    </option>
                                </select>
                            </div>

                            <button type="submit"
                                class="px-6 lg:px-8 py-2 lg:py-3 font-medium bg-[#FF4040] text-white rounded-md">
                                Search
                            </button>
                        </form>



                    </div>
                </div>
            </div>
        </section>

        <!-- Professional section -->
        <div class="my-10 md:my-16 lg:my-20 xl:my-24 2xl:my-28 container mx-auto px-5 md:px-8 lg:px-10 2xl:px-24">
            <!-- title -->
            <h2 class="text-2xl md:text-3xl font-boldFont text-[#222222]">
                {{ $featured->title ?? 'Featured Black Businesses, Doctors & Professionals' }}
            </h2>

            <!-- cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-6 md:mt-8 lg:mt-10">
                @forelse ($users as $user)
                    <div
                        class="p-4 md:p-5 lg:p-6 rounded-xl border border-black/10 cursor-pointer hover:border-primary transition duration-300 group">
                        <!-- image -->
                        <div class="h-[200px] md:h-[350px] lg:h-[450px] overflow-hidden rounded-lg">
                            <img class="h-full w-full object-cover rounded-lg group-hover:scale-110 transition duration-300"
                                src="{{ $user->avatar ? asset($user->avatar) : 'https://i.postimg.cc/0QnW4sKz/1.png' }}"
                                alt="" />
                        </div>

                        <!-- title -->
                        <div class="mt-5 flex items-center justify-between gap-4">
                            <div class="flex items-center gap-4">
                                <div class="size-10 rounded-full border border-black/20 flex-shrink-0">
                                    <img class="h-full w-full object-cover rounded-full"
                                        src="{{ asset($user->businessAddress->image) }}" alt="Business Image" />
                                </div>
                                <div>
                                    <h2 class="font-boldFont text-[#222222]">
                                        {{ $user->businessAddress->business_name ?? 'River Mountain Eye Care' }}
                                    </h2>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 text-[#222222]">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none">
                                        <path
                                            d="M6.86922 6.1166L1.55255 6.88744L1.45838 6.9066C1.31583 6.94445 1.18588 7.01944 1.08179 7.12394C0.977707 7.22843 0.903219 7.35868 0.865934 7.50137C0.82865 7.64407 0.829905 7.79411 0.869572 7.93616C0.909239 8.07822 0.985896 8.2072 1.09172 8.30994L4.94338 12.0591L4.03505 17.3549L4.02422 17.4466C4.01549 17.594 4.0461 17.7411 4.11292 17.8729C4.17974 18.0046 4.28037 18.1162 4.4045 18.1962C4.52862 18.2762 4.67179 18.3218 4.81934 18.3284C4.96689 18.3349 5.11352 18.3021 5.24422 18.2333L9.99922 15.7333L14.7434 18.2333L14.8267 18.2716C14.9643 18.3258 15.1138 18.3424 15.2598 18.3197C15.4059 18.2971 15.5434 18.236 15.658 18.1427C15.7727 18.0494 15.8605 17.9272 15.9124 17.7888C15.9643 17.6504 15.9785 17.5006 15.9534 17.3549L15.0442 12.0591L18.8975 8.3091L18.9625 8.23827C19.0554 8.12391 19.1163 7.98698 19.139 7.84143C19.1617 7.69588 19.1454 7.54692 19.0918 7.40971C19.0382 7.27251 18.9492 7.15196 18.8338 7.06036C18.7184 6.96876 18.5808 6.90938 18.435 6.88827L13.1184 6.1166L10.7417 1.29994C10.6729 1.16038 10.5665 1.04286 10.4344 0.960689C10.3023 0.878514 10.1498 0.834961 9.99422 0.834961C9.83864 0.834961 9.68616 0.878514 9.55406 0.960689C9.42195 1.04286 9.31549 1.16038 9.24672 1.29994L6.86922 6.1166Z"
                                            fill="url(#paint0_linear_8505_815)" />
                                        <defs>
                                            <linearGradient id="paint0_linear_8505_815" x1="9.9939" y1="0.834961"
                                                x2="9.9939" y2="18.3296" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#FEEF70" />
                                                <stop offset="1" stop-color="#E99515" />
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                                <p class="font-boldFont">{{ $user->comments->avg('rating') ?? 'No Ratings' }}</p>
                            </div>
                        </div>

                        <!-- description -->
                        <div class="mt-3">
                            <p class="font-normalFont tracking-wider text-[#6A6A6A] text-sm md:text-base">
                                {!! $user->businessAddress->business_about !!}
                            </p>
                        </div>

                        <!-- Read More -->
                        <div class="mt-4 flex items-center gap-2">
                            <a href="{{ route('detailsPage', $user->id) }}"
                                class="font-boldFont border-b border-black text-sm md:text-base">Read
                                More
                            </a>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21"
                                    viewBox="0 0 20 21" fill="none">
                                    <path
                                        d="M7.4248 17.1004L12.8581 11.6671C13.4998 11.0254 13.4998 9.97539 12.8581 9.33372L7.4248 3.90039"
                                        stroke="#222222" stroke-width="1.5" stroke-miterlimit="10"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    {{-- <div
                        class="p-4 md:p-5 lg:p-6 rounded-xl border border-black/10 cursor-pointer hover:border-primary transition duration-300 group">
                        <!-- image -->
                        <div class="h-[200px] md:h-[350px] lg:h-[450px] overflow-hidden rounded-lg">
                            <img class="h-full w-full object-cover rounded-lg group-hover:scale-110 transition duration-300"
                                src="{{ $user->avatar ? asset($user->avatar) : 'https://i.postimg.cc/0QnW4sKz/1.png' }}"
                                alt="" />
                        </div>

                        <!-- title -->
                        <div class="mt-5 flex items-center justify-between gap-4">
                            <div class="flex items-center gap-4">
                                <div class="size-10 rounded-full border border-black/20 flex-shrink-0">
                                    <img class="h-full w-full object-cover rounded-full"
                                        src="{{ asset($user->businessAddress->image ?? '') }}" alt="Business Image" />
                                </div>
                                <div>
                                    <h2 class="font-boldFont text-[#222222]">
                                        {{ $user->first_name . ' ' . $user->last_name }}
                                    </h2>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 text-[#222222]">
                                <p class="font-boldFont">{{ $user->user_type }}</p>
                            </div>
                        </div>

                        <!-- description -->
                        <div class="mt-3">
                            <p class="font-normalFont tracking-wider text-[#6A6A6A] text-sm md:text-base">
                                {!! $user->businessAddress->business_about ?? 'No description available.' !!}
                            </p>
                        </div>
                    </div> --}}

                @empty
                    <!-- card:1 -->
                    <div
                        class="p-4 md:p-5 lg:p-6 rounded-xl border border-black/10 cursor-pointer hover:border-primary transition duration-300 group">
                        <!-- image -->
                        <div class="h-[200px] md:h-[350px] lg:h-[450px] overflow-hidden rounded-lg">
                            <img class="h-full w-full object-cover rounded-lg group-hover:scale-110 transition duration-300"
                                src="https://i.postimg.cc/0QnW4sKz/1.png" alt="" />
                        </div>

                        <!-- title -->
                        <div class="mt-5 flex items-center justify-between gap-4">
                            <div class="flex items-center gap-4">
                                <div class="size-10 rounded-full border border-black/20 flex-shrink-0">
                                    <img class="h-full w-full object-cover rounded-full"
                                        src="https://i.postimg.cc/ZqkMBjh5/5.png" alt="" />
                                </div>
                                <div>
                                    <h2 class="font-boldFont text-[#222222]">
                                        River Mountain Eye Care
                                    </h2>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 text-[#222222]">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none">
                                        <path
                                            d="M6.86922 6.1166L1.55255 6.88744L1.45838 6.9066C1.31583 6.94445 1.18588 7.01944 1.08179 7.12394C0.977707 7.22843 0.903219 7.35868 0.865934 7.50137C0.82865 7.64407 0.829905 7.79411 0.869572 7.93616C0.909239 8.07822 0.985896 8.2072 1.09172 8.30994L4.94338 12.0591L4.03505 17.3549L4.02422 17.4466C4.01549 17.594 4.0461 17.7411 4.11292 17.8729C4.17974 18.0046 4.28037 18.1162 4.4045 18.1962C4.52862 18.2762 4.67179 18.3218 4.81934 18.3284C4.96689 18.3349 5.11352 18.3021 5.24422 18.2333L9.99922 15.7333L14.7434 18.2333L14.8267 18.2716C14.9643 18.3258 15.1138 18.3424 15.2598 18.3197C15.4059 18.2971 15.5434 18.236 15.658 18.1427C15.7727 18.0494 15.8605 17.9272 15.9124 17.7888C15.9643 17.6504 15.9785 17.5006 15.9534 17.3549L15.0442 12.0591L18.8975 8.3091L18.9625 8.23827C19.0554 8.12391 19.1163 7.98698 19.139 7.84143C19.1617 7.69588 19.1454 7.54692 19.0918 7.40971C19.0382 7.27251 18.9492 7.15196 18.8338 7.06036C18.7184 6.96876 18.5808 6.90938 18.435 6.88827L13.1184 6.1166L10.7417 1.29994C10.6729 1.16038 10.5665 1.04286 10.4344 0.960689C10.3023 0.878514 10.1498 0.834961 9.99422 0.834961C9.83864 0.834961 9.68616 0.878514 9.55406 0.960689C9.42195 1.04286 9.31549 1.16038 9.24672 1.29994L6.86922 6.1166Z"
                                            fill="url(#paint0_linear_8505_815)" />
                                        <defs>
                                            <linearGradient id="paint0_linear_8505_815" x1="9.9939" y1="0.834961"
                                                x2="9.9939" y2="18.3296" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#FEEF70" />
                                                <stop offset="1" stop-color="#E99515" />
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                                <p class="font-boldFont">5.0</p>
                            </div>
                        </div>

                        <!-- description -->
                        <div class="mt-3">
                            <p class="font-normalFont tracking-wider text-[#6A6A6A] text-sm md:text-base">
                                Nyka Consulting is a full service business consulting firm. We
                                specialize in QuickBooks set up for small , medium for profit
                                businesses and grant consulting for not-for profits and
                                religious organizations.
                            </p>
                        </div>

                        <!-- Read More -->
                        {{-- <div class="mt-4 flex items-center gap-2">
                         <a href="{{ route('detailsPage') }}"
                             class="font-boldFont border-b border-black text-sm md:text-base">Read
                             More
                         </a>
                         <div>
                             <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21"
                                 viewBox="0 0 20 21" fill="none">
                                 <path
                                     d="M7.4248 17.1004L12.8581 11.6671C13.4998 11.0254 13.4998 9.97539 12.8581 9.33372L7.4248 3.90039"
                                     stroke="#222222" stroke-width="1.5" stroke-miterlimit="10"
                                     stroke-linecap="round" stroke-linejoin="round" />
                             </svg>
                         </div>
                     </div> --}}
                    </div>

                    <!-- card:2 -->
                    <div
                        class="p-4 md:p-5 lg:p-6 rounded-xl border border-black/10 cursor-pointer hover:border-primary transition duration-300 group">
                        <!-- image -->
                        <div class="h-[200px] md:h-[350px] lg:h-[450px] overflow-hidden rounded-lg">
                            <img class="h-full w-full object-cover rounded-lg group-hover:scale-110 transition duration-300"
                                src="https://i.postimg.cc/0QnW4sKz/1.png" alt="" />
                        </div>

                        <!-- title -->
                        <div class="mt-5 flex items-center justify-between gap-4">
                            <div class="flex items-center gap-4">
                                <div class="size-10 rounded-full border border-black/20 flex-shrink-0">
                                    <img class="h-full w-full object-cover rounded-full"
                                        src="https://i.postimg.cc/ZqkMBjh5/5.png" alt="" />
                                </div>
                                <div>
                                    <h2 class="font-boldFont text-[#222222]">
                                        River Mountain Eye Care
                                    </h2>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 text-[#222222]">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none">
                                        <path
                                            d="M6.86922 6.1166L1.55255 6.88744L1.45838 6.9066C1.31583 6.94445 1.18588 7.01944 1.08179 7.12394C0.977707 7.22843 0.903219 7.35868 0.865934 7.50137C0.82865 7.64407 0.829905 7.79411 0.869572 7.93616C0.909239 8.07822 0.985896 8.2072 1.09172 8.30994L4.94338 12.0591L4.03505 17.3549L4.02422 17.4466C4.01549 17.594 4.0461 17.7411 4.11292 17.8729C4.17974 18.0046 4.28037 18.1162 4.4045 18.1962C4.52862 18.2762 4.67179 18.3218 4.81934 18.3284C4.96689 18.3349 5.11352 18.3021 5.24422 18.2333L9.99922 15.7333L14.7434 18.2333L14.8267 18.2716C14.9643 18.3258 15.1138 18.3424 15.2598 18.3197C15.4059 18.2971 15.5434 18.236 15.658 18.1427C15.7727 18.0494 15.8605 17.9272 15.9124 17.7888C15.9643 17.6504 15.9785 17.5006 15.9534 17.3549L15.0442 12.0591L18.8975 8.3091L18.9625 8.23827C19.0554 8.12391 19.1163 7.98698 19.139 7.84143C19.1617 7.69588 19.1454 7.54692 19.0918 7.40971C19.0382 7.27251 18.9492 7.15196 18.8338 7.06036C18.7184 6.96876 18.5808 6.90938 18.435 6.88827L13.1184 6.1166L10.7417 1.29994C10.6729 1.16038 10.5665 1.04286 10.4344 0.960689C10.3023 0.878514 10.1498 0.834961 9.99422 0.834961C9.83864 0.834961 9.68616 0.878514 9.55406 0.960689C9.42195 1.04286 9.31549 1.16038 9.24672 1.29994L6.86922 6.1166Z"
                                            fill="url(#paint0_linear_8505_815)" />
                                        <defs>
                                            <linearGradient id="paint0_linear_8505_815" x1="9.9939" y1="0.834961"
                                                x2="9.9939" y2="18.3296" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#FEEF70" />
                                                <stop offset="1" stop-color="#E99515" />
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                                <p class="font-boldFont">5.0</p>
                            </div>
                        </div>

                        <!-- description -->
                        <div class="mt-3">
                            <p class="font-normalFont tracking-wider text-[#6A6A6A] text-sm md:text-base">
                                Nyka Consulting is a full service business consulting firm. We
                                specialize in QuickBooks set up for small , medium for profit
                                businesses and grant consulting for not-for profits and
                                religious organizations.
                            </p>
                        </div>

                        <!-- Read More -->
                        {{-- <div class="mt-4 flex items-center gap-2">
                         <a href="{{ route('detailsPage') }}"
                             class="font-boldFont border-b border-black text-sm md:text-base">Read
                             More
                         </a>
                         <div>
                             <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21"
                                 viewBox="0 0 20 21" fill="none">
                                 <path
                                     d="M7.4248 17.1004L12.8581 11.6671C13.4998 11.0254 13.4998 9.97539 12.8581 9.33372L7.4248 3.90039"
                                     stroke="#222222" stroke-width="1.5" stroke-miterlimit="10"
                                     stroke-linecap="round" stroke-linejoin="round" />
                             </svg>
                         </div>
                     </div> --}}
                    </div>

                    <!-- card:3 -->
                    <div
                        class="p-4 md:p-5 lg:p-6 rounded-xl border border-black/10 cursor-pointer hover:border-primary transition duration-300 group">
                        <!-- image -->
                        <div class="h-[200px] md:h-[350px] lg:h-[450px] overflow-hidden rounded-lg">
                            <img class="h-full w-full object-cover rounded-lg group-hover:scale-110 transition duration-300"
                                src="https://i.postimg.cc/0QnW4sKz/1.png" alt="" />
                        </div>

                        <!-- title -->
                        <div class="mt-5 flex items-center justify-between gap-4">
                            <div class="flex items-center gap-4">
                                <div class="size-10 rounded-full border border-black/20 flex-shrink-0">
                                    <img class="h-full w-full object-cover rounded-full"
                                        src="https://i.postimg.cc/ZqkMBjh5/5.png" alt="" />
                                </div>
                                <div>
                                    <h2 class="font-boldFont text-[#222222]">
                                        River Mountain Eye Care
                                    </h2>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 text-[#222222]">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none">
                                        <path
                                            d="M6.86922 6.1166L1.55255 6.88744L1.45838 6.9066C1.31583 6.94445 1.18588 7.01944 1.08179 7.12394C0.977707 7.22843 0.903219 7.35868 0.865934 7.50137C0.82865 7.64407 0.829905 7.79411 0.869572 7.93616C0.909239 8.07822 0.985896 8.2072 1.09172 8.30994L4.94338 12.0591L4.03505 17.3549L4.02422 17.4466C4.01549 17.594 4.0461 17.7411 4.11292 17.8729C4.17974 18.0046 4.28037 18.1162 4.4045 18.1962C4.52862 18.2762 4.67179 18.3218 4.81934 18.3284C4.96689 18.3349 5.11352 18.3021 5.24422 18.2333L9.99922 15.7333L14.7434 18.2333L14.8267 18.2716C14.9643 18.3258 15.1138 18.3424 15.2598 18.3197C15.4059 18.2971 15.5434 18.236 15.658 18.1427C15.7727 18.0494 15.8605 17.9272 15.9124 17.7888C15.9643 17.6504 15.9785 17.5006 15.9534 17.3549L15.0442 12.0591L18.8975 8.3091L18.9625 8.23827C19.0554 8.12391 19.1163 7.98698 19.139 7.84143C19.1617 7.69588 19.1454 7.54692 19.0918 7.40971C19.0382 7.27251 18.9492 7.15196 18.8338 7.06036C18.7184 6.96876 18.5808 6.90938 18.435 6.88827L13.1184 6.1166L10.7417 1.29994C10.6729 1.16038 10.5665 1.04286 10.4344 0.960689C10.3023 0.878514 10.1498 0.834961 9.99422 0.834961C9.83864 0.834961 9.68616 0.878514 9.55406 0.960689C9.42195 1.04286 9.31549 1.16038 9.24672 1.29994L6.86922 6.1166Z"
                                            fill="url(#paint0_linear_8505_815)" />
                                        <defs>
                                            <linearGradient id="paint0_linear_8505_815" x1="9.9939" y1="0.834961"
                                                x2="9.9939" y2="18.3296" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#FEEF70" />
                                                <stop offset="1" stop-color="#E99515" />
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                                <p class="font-boldFont">5.0</p>
                            </div>
                        </div>

                        <!-- description -->
                        <div class="mt-3">
                            <p class="font-normalFont tracking-wider text-[#6A6A6A] text-sm md:text-base">
                                Nyka Consulting is a full service business consulting firm. We
                                specialize in QuickBooks set up for small , medium for profit
                                businesses and grant consulting for not-for profits and
                                religious organizations.
                            </p>
                        </div>

                        <!-- Read More -->
                        {{-- <div class="mt-4 flex items-center gap-2">
                         <a href="{{ route('detailsPage') }}"
                             class="font-boldFont border-b border-black text-sm md:text-base">Read
                             More
                         </a>
                         <div>
                             <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21"
                                 viewBox="0 0 20 21" fill="none">
                                 <path
                                     d="M7.4248 17.1004L12.8581 11.6671C13.4998 11.0254 13.4998 9.97539 12.8581 9.33372L7.4248 3.90039"
                                     stroke="#222222" stroke-width="1.5" stroke-miterlimit="10"
                                     stroke-linecap="round" stroke-linejoin="round" />
                             </svg>
                         </div>
                     </div> --}}
                    </div>
                    <!-- card:4 -->
                    <div
                        class="p-4 md:p-5 lg:p-6 rounded-xl border border-black/10 cursor-pointer hover:border-primary transition duration-300 group">
                        <!-- image -->
                        <div class="h-[200px] md:h-[350px] lg:h-[450px] overflow-hidden rounded-lg">
                            <img class="h-full w-full object-cover rounded-lg group-hover:scale-110 transition duration-300"
                                src="https://i.postimg.cc/0QnW4sKz/1.png" alt="" />
                        </div>

                        <!-- title -->
                        <div class="mt-5 flex items-center justify-between gap-4">
                            <div class="flex items-center gap-4">
                                <div class="size-10 rounded-full border border-black/20 flex-shrink-0">
                                    <img class="h-full w-full object-cover rounded-full"
                                        src="https://i.postimg.cc/ZqkMBjh5/5.png" alt="" />
                                </div>
                                <div>
                                    <h2 class="font-boldFont text-[#222222]">
                                        River Mountain Eye Care
                                    </h2>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 text-[#222222]">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none">
                                        <path
                                            d="M6.86922 6.1166L1.55255 6.88744L1.45838 6.9066C1.31583 6.94445 1.18588 7.01944 1.08179 7.12394C0.977707 7.22843 0.903219 7.35868 0.865934 7.50137C0.82865 7.64407 0.829905 7.79411 0.869572 7.93616C0.909239 8.07822 0.985896 8.2072 1.09172 8.30994L4.94338 12.0591L4.03505 17.3549L4.02422 17.4466C4.01549 17.594 4.0461 17.7411 4.11292 17.8729C4.17974 18.0046 4.28037 18.1162 4.4045 18.1962C4.52862 18.2762 4.67179 18.3218 4.81934 18.3284C4.96689 18.3349 5.11352 18.3021 5.24422 18.2333L9.99922 15.7333L14.7434 18.2333L14.8267 18.2716C14.9643 18.3258 15.1138 18.3424 15.2598 18.3197C15.4059 18.2971 15.5434 18.236 15.658 18.1427C15.7727 18.0494 15.8605 17.9272 15.9124 17.7888C15.9643 17.6504 15.9785 17.5006 15.9534 17.3549L15.0442 12.0591L18.8975 8.3091L18.9625 8.23827C19.0554 8.12391 19.1163 7.98698 19.139 7.84143C19.1617 7.69588 19.1454 7.54692 19.0918 7.40971C19.0382 7.27251 18.9492 7.15196 18.8338 7.06036C18.7184 6.96876 18.5808 6.90938 18.435 6.88827L13.1184 6.1166L10.7417 1.29994C10.6729 1.16038 10.5665 1.04286 10.4344 0.960689C10.3023 0.878514 10.1498 0.834961 9.99422 0.834961C9.83864 0.834961 9.68616 0.878514 9.55406 0.960689C9.42195 1.04286 9.31549 1.16038 9.24672 1.29994L6.86922 6.1166Z"
                                            fill="url(#paint0_linear_8505_815)" />
                                        <defs>
                                            <linearGradient id="paint0_linear_8505_815" x1="9.9939" y1="0.834961"
                                                x2="9.9939" y2="18.3296" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#FEEF70" />
                                                <stop offset="1" stop-color="#E99515" />
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                                <p class="font-boldFont">5.0</p>
                            </div>
                        </div>

                        <!-- description -->
                        <div class="mt-3">
                            <p class="font-normalFont tracking-wider text-[#6A6A6A] text-sm md:text-base">
                                Nyka Consulting is a full service business consulting firm. We
                                specialize in QuickBooks set up for small , medium for profit
                                businesses and grant consulting for not-for profits and
                                religious organizations.
                            </p>
                        </div>

                        <!-- Read More -->
                        {{-- <div class="mt-4 flex items-center gap-2">
                         <a href="{{ route('detailsPage') }}"
                             class="font-boldFont border-b border-black text-sm md:text-base">Read
                             More
                         </a>
                         <div>
                             <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21"
                                 viewBox="0 0 20 21" fill="none">
                                 <path
                                     d="M7.4248 17.1004L12.8581 11.6671C13.4998 11.0254 13.4998 9.97539 12.8581 9.33372L7.4248 3.90039"
                                     stroke="#222222" stroke-width="1.5" stroke-miterlimit="10"
                                     stroke-linecap="round" stroke-linejoin="round" />
                             </svg>
                         </div>
                     </div> --}}
                    </div>

                    <!-- card:5 -->
                    <div
                        class="p-4 md:p-5 lg:p-6 rounded-xl border border-black/10 cursor-pointer hover:border-primary transition duration-300 group">
                        <!-- image -->
                        <div class="h-[200px] md:h-[350px] lg:h-[450px] overflow-hidden rounded-lg">
                            <img class="h-full w-full object-cover rounded-lg group-hover:scale-110 transition duration-300"
                                src="https://i.postimg.cc/0QnW4sKz/1.png" alt="" />
                        </div>

                        <!-- title -->
                        <div class="mt-5 flex items-center justify-between gap-4">
                            <div class="flex items-center gap-4">
                                <div class="size-10 rounded-full border border-black/20 flex-shrink-0">
                                    <img class="h-full w-full object-cover rounded-full"
                                        src="https://i.postimg.cc/ZqkMBjh5/5.png" alt="" />
                                </div>
                                <div>
                                    <h2 class="font-boldFont text-[#222222]">
                                        River Mountain Eye Care
                                    </h2>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 text-[#222222]">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none">
                                        <path
                                            d="M6.86922 6.1166L1.55255 6.88744L1.45838 6.9066C1.31583 6.94445 1.18588 7.01944 1.08179 7.12394C0.977707 7.22843 0.903219 7.35868 0.865934 7.50137C0.82865 7.64407 0.829905 7.79411 0.869572 7.93616C0.909239 8.07822 0.985896 8.2072 1.09172 8.30994L4.94338 12.0591L4.03505 17.3549L4.02422 17.4466C4.01549 17.594 4.0461 17.7411 4.11292 17.8729C4.17974 18.0046 4.28037 18.1162 4.4045 18.1962C4.52862 18.2762 4.67179 18.3218 4.81934 18.3284C4.96689 18.3349 5.11352 18.3021 5.24422 18.2333L9.99922 15.7333L14.7434 18.2333L14.8267 18.2716C14.9643 18.3258 15.1138 18.3424 15.2598 18.3197C15.4059 18.2971 15.5434 18.236 15.658 18.1427C15.7727 18.0494 15.8605 17.9272 15.9124 17.7888C15.9643 17.6504 15.9785 17.5006 15.9534 17.3549L15.0442 12.0591L18.8975 8.3091L18.9625 8.23827C19.0554 8.12391 19.1163 7.98698 19.139 7.84143C19.1617 7.69588 19.1454 7.54692 19.0918 7.40971C19.0382 7.27251 18.9492 7.15196 18.8338 7.06036C18.7184 6.96876 18.5808 6.90938 18.435 6.88827L13.1184 6.1166L10.7417 1.29994C10.6729 1.16038 10.5665 1.04286 10.4344 0.960689C10.3023 0.878514 10.1498 0.834961 9.99422 0.834961C9.83864 0.834961 9.68616 0.878514 9.55406 0.960689C9.42195 1.04286 9.31549 1.16038 9.24672 1.29994L6.86922 6.1166Z"
                                            fill="url(#paint0_linear_8505_815)" />
                                        <defs>
                                            <linearGradient id="paint0_linear_8505_815" x1="9.9939" y1="0.834961"
                                                x2="9.9939" y2="18.3296" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#FEEF70" />
                                                <stop offset="1" stop-color="#E99515" />
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                                <p class="font-boldFont">5.0</p>
                            </div>
                        </div>

                        <!-- description -->
                        <div class="mt-3">
                            <p class="font-normalFont tracking-wider text-[#6A6A6A] text-sm md:text-base">
                                Nyka Consulting is a full service business consulting firm. We
                                specialize in QuickBooks set up for small , medium for profit
                                businesses and grant consulting for not-for profits and
                                religious organizations.
                            </p>
                        </div>

                        <!-- Read More -->
                        {{-- <div class="mt-4 flex items-center gap-2">
                         <a href="{{ route('detailsPage') }}"
                             class="font-boldFont border-b border-black text-sm md:text-base">Read
                             More
                         </a>
                         <div>
                             <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21"
                                 viewBox="0 0 20 21" fill="none">
                                 <path
                                     d="M7.4248 17.1004L12.8581 11.6671C13.4998 11.0254 13.4998 9.97539 12.8581 9.33372L7.4248 3.90039"
                                     stroke="#222222" stroke-width="1.5" stroke-miterlimit="10"
                                     stroke-linecap="round" stroke-linejoin="round" />
                             </svg>
                         </div>
                     </div> --}}
                    </div>

                    <!-- card:6 -->
                    <div
                        class="p-4 md:p-5 lg:p-6 rounded-xl border border-black/10 cursor-pointer hover:border-primary transition duration-300 group">
                        <!-- image -->
                        <div class="h-[200px] md:h-[350px] lg:h-[450px] overflow-hidden rounded-lg">
                            <img class="h-full w-full object-cover rounded-lg group-hover:scale-110 transition duration-300"
                                src="https://i.postimg.cc/0QnW4sKz/1.png" alt="" />
                        </div>

                        <!-- title -->
                        <div class="mt-5 flex items-center justify-between gap-4">
                            <div class="flex items-center gap-4">
                                <div class="size-10 rounded-full border border-black/20 flex-shrink-0">
                                    <img class="h-full w-full object-cover rounded-full"
                                        src="https://i.postimg.cc/ZqkMBjh5/5.png" alt="" />
                                </div>
                                <div>
                                    <h2 class="font-boldFont text-[#222222]">
                                        River Mountain Eye Care
                                    </h2>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 text-[#222222]">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none">
                                        <path
                                            d="M6.86922 6.1166L1.55255 6.88744L1.45838 6.9066C1.31583 6.94445 1.18588 7.01944 1.08179 7.12394C0.977707 7.22843 0.903219 7.35868 0.865934 7.50137C0.82865 7.64407 0.829905 7.79411 0.869572 7.93616C0.909239 8.07822 0.985896 8.2072 1.09172 8.30994L4.94338 12.0591L4.03505 17.3549L4.02422 17.4466C4.01549 17.594 4.0461 17.7411 4.11292 17.8729C4.17974 18.0046 4.28037 18.1162 4.4045 18.1962C4.52862 18.2762 4.67179 18.3218 4.81934 18.3284C4.96689 18.3349 5.11352 18.3021 5.24422 18.2333L9.99922 15.7333L14.7434 18.2333L14.8267 18.2716C14.9643 18.3258 15.1138 18.3424 15.2598 18.3197C15.4059 18.2971 15.5434 18.236 15.658 18.1427C15.7727 18.0494 15.8605 17.9272 15.9124 17.7888C15.9643 17.6504 15.9785 17.5006 15.9534 17.3549L15.0442 12.0591L18.8975 8.3091L18.9625 8.23827C19.0554 8.12391 19.1163 7.98698 19.139 7.84143C19.1617 7.69588 19.1454 7.54692 19.0918 7.40971C19.0382 7.27251 18.9492 7.15196 18.8338 7.06036C18.7184 6.96876 18.5808 6.90938 18.435 6.88827L13.1184 6.1166L10.7417 1.29994C10.6729 1.16038 10.5665 1.04286 10.4344 0.960689C10.3023 0.878514 10.1498 0.834961 9.99422 0.834961C9.83864 0.834961 9.68616 0.878514 9.55406 0.960689C9.42195 1.04286 9.31549 1.16038 9.24672 1.29994L6.86922 6.1166Z"
                                            fill="url(#paint0_linear_8505_815)" />
                                        <defs>
                                            <linearGradient id="paint0_linear_8505_815" x1="9.9939" y1="0.834961"
                                                x2="9.9939" y2="18.3296" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#FEEF70" />
                                                <stop offset="1" stop-color="#E99515" />
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                                <p class="font-boldFont">5.0</p>
                            </div>
                        </div>

                        <!-- description -->
                        <div class="mt-3">
                            <p class="font-normalFont tracking-wider text-[#6A6A6A] text-sm md:text-base">
                                Nyka Consulting is a full service business consulting firm. We
                                specialize in QuickBooks set up for small , medium for profit
                                businesses and grant consulting for not-for profits and
                                religious organizations.
                            </p>
                        </div>

                        <!-- Read More -->
                        {{-- <div class="mt-4 flex items-center gap-2">
                         <a href="{{ route('detailsPage') }}"
                             class="font-boldFont border-b border-black text-sm md:text-base">Read
                             More
                         </a>
                         <div>
                             <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21"
                                 viewBox="0 0 20 21" fill="none">
                                 <path
                                     d="M7.4248 17.1004L12.8581 11.6671C13.4998 11.0254 13.4998 9.97539 12.8581 9.33372L7.4248 3.90039"
                                     stroke="#222222" stroke-width="1.5" stroke-miterlimit="10"
                                     stroke-linecap="round" stroke-linejoin="round" />
                             </svg>
                         </div>
                     </div> --}}
                    </div>
                    <!-- card:7 -->
                    <div
                        class="p-4 md:p-5 lg:p-6 rounded-xl border border-black/10 cursor-pointer hover:border-primary transition duration-300 group">
                        <!-- image -->
                        <div class="h-[200px] md:h-[350px] lg:h-[450px] overflow-hidden rounded-lg">
                            <img class="h-full w-full object-cover rounded-lg group-hover:scale-110 transition duration-300"
                                src="https://i.postimg.cc/0QnW4sKz/1.png" alt="" />
                        </div>

                        <!-- title -->
                        <div class="mt-5 flex items-center justify-between gap-4">
                            <div class="flex items-center gap-4">
                                <div class="size-10 rounded-full border border-black/20 flex-shrink-0">
                                    <img class="h-full w-full object-cover rounded-full"
                                        src="https://i.postimg.cc/ZqkMBjh5/5.png" alt="" />
                                </div>
                                <div>
                                    <h2 class="font-boldFont text-[#222222]">
                                        River Mountain Eye Care
                                    </h2>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 text-[#222222]">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none">
                                        <path
                                            d="M6.86922 6.1166L1.55255 6.88744L1.45838 6.9066C1.31583 6.94445 1.18588 7.01944 1.08179 7.12394C0.977707 7.22843 0.903219 7.35868 0.865934 7.50137C0.82865 7.64407 0.829905 7.79411 0.869572 7.93616C0.909239 8.07822 0.985896 8.2072 1.09172 8.30994L4.94338 12.0591L4.03505 17.3549L4.02422 17.4466C4.01549 17.594 4.0461 17.7411 4.11292 17.8729C4.17974 18.0046 4.28037 18.1162 4.4045 18.1962C4.52862 18.2762 4.67179 18.3218 4.81934 18.3284C4.96689 18.3349 5.11352 18.3021 5.24422 18.2333L9.99922 15.7333L14.7434 18.2333L14.8267 18.2716C14.9643 18.3258 15.1138 18.3424 15.2598 18.3197C15.4059 18.2971 15.5434 18.236 15.658 18.1427C15.7727 18.0494 15.8605 17.9272 15.9124 17.7888C15.9643 17.6504 15.9785 17.5006 15.9534 17.3549L15.0442 12.0591L18.8975 8.3091L18.9625 8.23827C19.0554 8.12391 19.1163 7.98698 19.139 7.84143C19.1617 7.69588 19.1454 7.54692 19.0918 7.40971C19.0382 7.27251 18.9492 7.15196 18.8338 7.06036C18.7184 6.96876 18.5808 6.90938 18.435 6.88827L13.1184 6.1166L10.7417 1.29994C10.6729 1.16038 10.5665 1.04286 10.4344 0.960689C10.3023 0.878514 10.1498 0.834961 9.99422 0.834961C9.83864 0.834961 9.68616 0.878514 9.55406 0.960689C9.42195 1.04286 9.31549 1.16038 9.24672 1.29994L6.86922 6.1166Z"
                                            fill="url(#paint0_linear_8505_815)" />
                                        <defs>
                                            <linearGradient id="paint0_linear_8505_815" x1="9.9939" y1="0.834961"
                                                x2="9.9939" y2="18.3296" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#FEEF70" />
                                                <stop offset="1" stop-color="#E99515" />
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                                <p class="font-boldFont">5.0</p>
                            </div>
                        </div>

                        <!-- description -->
                        <div class="mt-3">
                            <p class="font-normalFont tracking-wider text-[#6A6A6A] text-sm md:text-base">
                                Nyka Consulting is a full service business consulting firm. We
                                specialize in QuickBooks set up for small , medium for profit
                                businesses and grant consulting for not-for profits and
                                religious organizations.
                            </p>
                        </div>

                        <!-- Read More -->
                        {{-- <div class="mt-4 flex items-center gap-2">
                         <a href="{{ route('detailsPage') }}"
                             class="font-boldFont border-b border-black text-sm md:text-base">Read
                             More
                         </a>
                         <div>
                             <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21"
                                 viewBox="0 0 20 21" fill="none">
                                 <path
                                     d="M7.4248 17.1004L12.8581 11.6671C13.4998 11.0254 13.4998 9.97539 12.8581 9.33372L7.4248 3.90039"
                                     stroke="#222222" stroke-width="1.5" stroke-miterlimit="10"
                                     stroke-linecap="round" stroke-linejoin="round" />
                             </svg>
                         </div>
                     </div> --}}
                    </div>

                    <!-- card:8 -->
                    <div
                        class="p-4 md:p-5 lg:p-6 rounded-xl border border-black/10 cursor-pointer hover:border-primary transition duration-300 group">
                        <!-- image -->
                        <div class="h-[200px] md:h-[350px] lg:h-[450px] overflow-hidden rounded-lg">
                            <img class="h-full w-full object-cover rounded-lg group-hover:scale-110 transition duration-300"
                                src="https://i.postimg.cc/0QnW4sKz/1.png" alt="" />
                        </div>

                        <!-- title -->
                        <div class="mt-5 flex items-center justify-between gap-4">
                            <div class="flex items-center gap-4">
                                <div class="size-10 rounded-full border border-black/20 flex-shrink-0">
                                    <img class="h-full w-full object-cover rounded-full"
                                        src="https://i.postimg.cc/ZqkMBjh5/5.png" alt="" />
                                </div>
                                <div>
                                    <h2 class="font-boldFont text-[#222222]">
                                        River Mountain Eye Care
                                    </h2>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 text-[#222222]">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none">
                                        <path
                                            d="M6.86922 6.1166L1.55255 6.88744L1.45838 6.9066C1.31583 6.94445 1.18588 7.01944 1.08179 7.12394C0.977707 7.22843 0.903219 7.35868 0.865934 7.50137C0.82865 7.64407 0.829905 7.79411 0.869572 7.93616C0.909239 8.07822 0.985896 8.2072 1.09172 8.30994L4.94338 12.0591L4.03505 17.3549L4.02422 17.4466C4.01549 17.594 4.0461 17.7411 4.11292 17.8729C4.17974 18.0046 4.28037 18.1162 4.4045 18.1962C4.52862 18.2762 4.67179 18.3218 4.81934 18.3284C4.96689 18.3349 5.11352 18.3021 5.24422 18.2333L9.99922 15.7333L14.7434 18.2333L14.8267 18.2716C14.9643 18.3258 15.1138 18.3424 15.2598 18.3197C15.4059 18.2971 15.5434 18.236 15.658 18.1427C15.7727 18.0494 15.8605 17.9272 15.9124 17.7888C15.9643 17.6504 15.9785 17.5006 15.9534 17.3549L15.0442 12.0591L18.8975 8.3091L18.9625 8.23827C19.0554 8.12391 19.1163 7.98698 19.139 7.84143C19.1617 7.69588 19.1454 7.54692 19.0918 7.40971C19.0382 7.27251 18.9492 7.15196 18.8338 7.06036C18.7184 6.96876 18.5808 6.90938 18.435 6.88827L13.1184 6.1166L10.7417 1.29994C10.6729 1.16038 10.5665 1.04286 10.4344 0.960689C10.3023 0.878514 10.1498 0.834961 9.99422 0.834961C9.83864 0.834961 9.68616 0.878514 9.55406 0.960689C9.42195 1.04286 9.31549 1.16038 9.24672 1.29994L6.86922 6.1166Z"
                                            fill="url(#paint0_linear_8505_815)" />
                                        <defs>
                                            <linearGradient id="paint0_linear_8505_815" x1="9.9939" y1="0.834961"
                                                x2="9.9939" y2="18.3296" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#FEEF70" />
                                                <stop offset="1" stop-color="#E99515" />
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                                <p class="font-boldFont">5.0</p>
                            </div>
                        </div>

                        <!-- description -->
                        <div class="mt-3">
                            <p class="font-normalFont tracking-wider text-[#6A6A6A] text-sm md:text-base">
                                Nyka Consulting is a full service business consulting firm. We
                                specialize in QuickBooks set up for small , medium for profit
                                businesses and grant consulting for not-for profits and
                                religious organizations.
                            </p>
                        </div>

                        <!-- Read More -->
                        {{-- <div class="mt-4 flex items-center gap-2">
                         <a href="{{ route('detailsPage') }}"
                             class="font-boldFont border-b border-black text-sm md:text-base">Read
                             More
                         </a>
                         <div>
                             <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21"
                                 viewBox="0 0 20 21" fill="none">
                                 <path
                                     d="M7.4248 17.1004L12.8581 11.6671C13.4998 11.0254 13.4998 9.97539 12.8581 9.33372L7.4248 3.90039"
                                     stroke="#222222" stroke-width="1.5" stroke-miterlimit="10"
                                     stroke-linecap="round" stroke-linejoin="round" />
                             </svg>
                         </div>
                     </div> --}}
                    </div>

                    <!-- card:9 -->
                    <div
                        class="p-4 md:p-5 lg:p-6 rounded-xl border border-black/10 cursor-pointer hover:border-primary transition duration-300 group">
                        <!-- image -->
                        <div class="h-[200px] md:h-[350px] lg:h-[450px] overflow-hidden rounded-lg">
                            <img class="h-full w-full object-cover rounded-lg group-hover:scale-110 transition duration-300"
                                src="https://i.postimg.cc/0QnW4sKz/1.png" alt="" />
                        </div>

                        <!-- title -->
                        <div class="mt-5 flex items-center justify-between gap-4">
                            <div class="flex items-center gap-4">
                                <div class="size-10 rounded-full border border-black/20 flex-shrink-0">
                                    <img class="h-full w-full object-cover rounded-full"
                                        src="https://i.postimg.cc/ZqkMBjh5/5.png" alt="" />
                                </div>
                                <div>
                                    <h2 class="font-boldFont text-[#222222]">
                                        River Mountain Eye Care
                                    </h2>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 text-[#222222]">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none">
                                        <path
                                            d="M6.86922 6.1166L1.55255 6.88744L1.45838 6.9066C1.31583 6.94445 1.18588 7.01944 1.08179 7.12394C0.977707 7.22843 0.903219 7.35868 0.865934 7.50137C0.82865 7.64407 0.829905 7.79411 0.869572 7.93616C0.909239 8.07822 0.985896 8.2072 1.09172 8.30994L4.94338 12.0591L4.03505 17.3549L4.02422 17.4466C4.01549 17.594 4.0461 17.7411 4.11292 17.8729C4.17974 18.0046 4.28037 18.1162 4.4045 18.1962C4.52862 18.2762 4.67179 18.3218 4.81934 18.3284C4.96689 18.3349 5.11352 18.3021 5.24422 18.2333L9.99922 15.7333L14.7434 18.2333L14.8267 18.2716C14.9643 18.3258 15.1138 18.3424 15.2598 18.3197C15.4059 18.2971 15.5434 18.236 15.658 18.1427C15.7727 18.0494 15.8605 17.9272 15.9124 17.7888C15.9643 17.6504 15.9785 17.5006 15.9534 17.3549L15.0442 12.0591L18.8975 8.3091L18.9625 8.23827C19.0554 8.12391 19.1163 7.98698 19.139 7.84143C19.1617 7.69588 19.1454 7.54692 19.0918 7.40971C19.0382 7.27251 18.9492 7.15196 18.8338 7.06036C18.7184 6.96876 18.5808 6.90938 18.435 6.88827L13.1184 6.1166L10.7417 1.29994C10.6729 1.16038 10.5665 1.04286 10.4344 0.960689C10.3023 0.878514 10.1498 0.834961 9.99422 0.834961C9.83864 0.834961 9.68616 0.878514 9.55406 0.960689C9.42195 1.04286 9.31549 1.16038 9.24672 1.29994L6.86922 6.1166Z"
                                            fill="url(#paint0_linear_8505_815)" />
                                        <defs>
                                            <linearGradient id="paint0_linear_8505_815" x1="9.9939" y1="0.834961"
                                                x2="9.9939" y2="18.3296" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#FEEF70" />
                                                <stop offset="1" stop-color="#E99515" />
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                                <p class="font-boldFont">5.0</p>
                            </div>
                        </div>

                        <!-- description -->
                        <div class="mt-3">
                            <p class="font-normalFont tracking-wider text-[#6A6A6A] text-sm md:text-base">
                                Nyka Consulting is a full service business consulting firm. We
                                specialize in QuickBooks set up for small , medium for profit
                                businesses and grant consulting for not-for profits and
                                religious organizations.
                            </p>
                        </div>

                        <!-- Read More -->
                        {{-- <div class="mt-4 flex items-center gap-2">
                         <a href="{{ route('detailsPage') }}"
                             class="font-boldFont border-b border-black text-sm md:text-base">Read
                             More
                         </a>
                         <div>
                             <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21"
                                 viewBox="0 0 20 21" fill="none">
                                 <path
                                     d="M7.4248 17.1004L12.8581 11.6671C13.4998 11.0254 13.4998 9.97539 12.8581 9.33372L7.4248 3.90039"
                                     stroke="#222222" stroke-width="1.5" stroke-miterlimit="10"
                                     stroke-linecap="round" stroke-linejoin="round" />
                             </svg>
                         </div>
                     </div> --}}
                    </div>
                @endforelse

                {{-- <!-- Pagination -->
                <div class="mt-6">
                    {{ $users->links() }}
                </div> --}}

            </div>
        </div>
    </main>

@endsection

@push('scripts')
@endpush
