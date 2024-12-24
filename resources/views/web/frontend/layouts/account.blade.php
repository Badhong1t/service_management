@extends('web.frontend.app')

@section('title', 'Account')

@push('styles')
@endpush

@section('content')

    <main class="h-[calc(100vh-97px)] container mx-auto px-6 md:px-8 lg:px-12 2xl:px-24">
        <!-- title -->
        <div class="pt-10 md:pt-16 lg:pt-20 font-poppins">
            <h2 class="font-boldFont text-2xl md:text-3xl lg:text-4xl text-[#222222]">
                Account
            </h2>
            <p class="mt-2 md:mt-4 text-[#6A6A6A]">
                <span
                    class="font-boldFont text-[#222222]">{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</span>,
                {{ auth()->user()->email }} ·
                <a href="{{ route('profile') }}" class="underline text-sm md:text-base text-[#222]">Go to profile</a>
            </p>
        </div>

        <!-- cards -->
        <div class="flex flex-col md:flex-row items-center gap-6 md:gap-10 mt-6 md:mt-10 w-full">
            <a href="{{ route('updatePersonalInformation') }}"
                class="hover:shadow-[0px_6px_16px_0px_rgba(20,20,20,0.15)] flex-1 p-4 md:p-6 rounded-xl duration-300 transition border border-black/10 w-full">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"
                        fill="none">
                        <path
                            d="M29 5.00001C29.5054 4.99858 29.9927 5.18859 30.3637 5.5318C30.7348 5.87502 30.9621 6.34599 31 6.85001V25C31.0014 25.5054 30.8114 25.9927 30.4682 26.3637C30.125 26.7348 29.654 26.9621 29.15 27H3.00001C2.49457 27.0014 2.00734 26.8114 1.63629 26.4682C1.26525 26.125 1.03791 25.654 1.00001 25.15V7.00001C0.998585 6.49457 1.18859 6.00734 1.5318 5.63629C1.87502 5.26525 2.34599 5.03791 2.85001 5.00001H3.00001H29ZM29 7.00001H3.00001V25H29V7.00001ZM26 19V21H18V19H26ZM10 11C10.5443 10.9986 11.0787 11.1453 11.5459 11.4243C12.0132 11.7034 12.3958 12.1043 12.6527 12.5841C12.9095 13.064 13.031 13.6046 13.0041 14.1482C12.9773 14.6918 12.803 15.2179 12.5 15.67C13.2601 16.1088 13.8913 16.74 14.3301 17.5001C14.7689 18.2602 15 19.1223 15 20H13C13.0003 19.3794 12.8082 18.7739 12.45 18.267C12.0918 17.7602 11.5852 17.3769 11 17.17V14C11.0159 13.7348 10.9258 13.4741 10.7495 13.2753C10.5733 13.0765 10.3252 12.9559 10.06 12.94C9.79479 12.9241 9.53412 13.0142 9.33533 13.1905C9.13654 13.3668 9.01592 13.6148 9.00001 13.88V17.17C8.41485 17.3769 7.90827 17.7602 7.55006 18.267C7.19186 18.7739 6.99968 19.3794 7.00001 20H5.00001C5.00003 19.1223 5.23107 18.2602 5.66991 17.5001C6.10875 16.74 6.73993 16.1088 7.50001 15.67C7.19703 15.2179 7.02277 14.6918 6.99587 14.1482C6.96898 13.6046 7.09048 13.064 7.34735 12.5841C7.60422 12.1043 7.98679 11.7034 8.45407 11.4243C8.92135 11.1453 9.45575 10.9986 10 11ZM26 15V17H18V15H26ZM26 11V13H18V11H26Z"
                            fill="#222222" />
                    </svg>
                </div>

                <div class="mt-4 md:mt-6">
                    <h3 class="font-poppins font-semibold pb-2 md:pb-4">
                        Personal info
                    </h3>
                    <p class="text-[#2E2E2E] xl:w-1/2">
                        Provide personal details and how we can reach you
                    </p>
                </div>
            </a>
            <a href="{{ route('loginAndSecurity') }}"
                class="hover:shadow-[0px_6px_16px_0px_rgba(20,20,20,0.15)] flex-1 p-4 md:p-6 rounded-xl duration-300 transition border border-black/10 w-full">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"
                        fill="none">
                        <path
                            d="M16 0.799805L16.56 1.1698C20.4 3.7298 24.2 4.9998 28 4.9998H29V17.4998C29 25.5698 23.21 30.9998 16 30.9998C8.79 30.9998 3 25.5698 3 17.4998V4.9998H4C7.8 4.9998 11.6 3.7298 15.45 1.1698L16 0.799805ZM15 3.7998C12.0698 5.581 8.76678 6.65919 5.35 6.9498L5 6.9698V17.4998C5 24.0598 9.35 28.4998 15 28.9598V3.7998ZM17 3.7998V28.9598C22.65 28.4898 27 24.0598 27 17.4998V6.9698L26.65 6.9498C23.2332 6.65919 19.9302 5.581 17 3.7998Z"
                            fill="#222222" />
                    </svg>
                </div>

                <div class="mt-4 md:mt-6">
                    <h3 class="font-poppins font-semibold pb-2 md:pb-4">
                        Login & security
                    </h3>
                    <p class="text-[#2E2E2E] xl:w-1/2">
                        Update your password and secure your account
                    </p>
                </div>
            </a>
        </div>
    </main>

@endsection

@push('scripts')
@endpush
