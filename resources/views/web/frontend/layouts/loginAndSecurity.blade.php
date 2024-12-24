@extends('web.frontend.app')

@section('title', 'Login And Security')

@push('styles')
@endpush

@section('content')
    <main class="min-h-[calc(100vh-97px)] mx-auto px-5 sm:px-10 md:px-16 lg:px-20 2xl:px-24 xl:max-w-[950px]">
        <!-- title -->
        <div class="pt-10 md:pt-16 lg:pt-20 font-poppins">
            <!-- top title -->
            <div>
                <h3 class="text-[#222222] flex items-center gap-2 font-mediumFont">
                    <span>Account</span>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="13" viewBox="0 0 12 13" fill="none">
                            <path
                                d="M4.45508 10.46L7.71508 7.20004C8.10008 6.81504 8.10008 6.18504 7.71508 5.80004L4.45508 2.54004"
                                stroke="#6A6A6A" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>
                    <span>Login & security</span>
                </h3>
            </div>
            <!-- main title -->
            <h2 class="font-boldFont text-2xl md:text-3xl lg:text-4xl text-[#222222] mt-3">
                Login & security
            </h2>
        </div>

        <!-- Form -->
        <form action="{{ route('loginSecurity.store') }}" method="POST" class="mt-6 md:mt-10 lg:mt-16">
            @csrf
            <!-- form title -->
            <div>
                <h3 class="font-boldFont text-xl md:text-2xl text-textColor pb-5 md:pb-8">Login</h3>
            </div>

            <!-- inputs -->
            <div class="space-y-3 md:space-y-5">
                <!-- title -->
                <div class="flex w-full items-center justify-between">
                    <h4 class="font-boldFont text-textColor md:text-lg">Password</h4>
                    <a href="{{ route('account') }}" class="font-boldFont text-primary cursor-pointer">
                        Cancel
                    </a>
                </div>

                <!-- current password -->
                <div class="font-poppins -tracking-wide">
                    <label for="current-password">
                        <span class="text-[#6A6A6A] text-sm">Current Password</span>
                    </label>
                    <div class="w-full mt-2">
                        <input placeholder="Enter your current password"
                            class="text-[#6A6A6A] text-sm w-full border-primary border focus:outline-none px-4 py-2.5 rounded-md"
                            type="password" name="current_password" id="current-password" required />
                    </div>
                </div>

                <!-- new password -->
                <div class="font-poppins -tracking-wide">
                    <label for="new-password">
                        <span class="text-[#6A6A6A] text-sm">New Password</span>
                    </label>
                    <div class="w-full mt-2">
                        <input placeholder="Enter your new password"
                            class="text-[#6A6A6A] text-sm w-full border-primary border focus:outline-none px-4 py-2.5 rounded-md"
                            type="password" name="new_password" id="new-password" required />
                    </div>
                </div>

                <!-- confirm password -->
                <div class="font-poppins -tracking-wide">
                    <label for="confirm-password">
                        <span class="text-[#6A6A6A] text-sm">Confirm Password</span>
                    </label>
                    <div class="w-full mt-2">
                        <input placeholder="Enter your new password"
                            class="text-[#6A6A6A] text-sm w-full border-primary border focus:outline-none px-4 py-2.5 rounded-md"
                            type="password" name="new_password_confirmation" id="confirm-password" required />
                    </div>
                </div>

                <!-- submit button -->
                <div>
                    <button type="submit" class="px-5 py-2 md:px-8 md:py-3 font-medium bg-[#FF4040] text-white rounded-md">
                        Update Password
                    </button>
                </div>
            </div>
        </form>
    </main>

@endsection

@push('scripts')
@endpush
