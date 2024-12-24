@extends('web.frontend.app')

@section('title', 'Login')

@push('styles')
@endpush

@section('content')
    <main class="md:h-[calc(100vh-96px)] flex flex-col items-center justify-center mx-5 md:mx-8 2xl:mx-0">
        <!-- Login Form -->
        <section
            class="mx-5 md:px-8 2xl:mx-0 w-full sm:max-w-[500px] sm:min-w-[500px] p-4 md:p-6 rounded-lg md:rounded-l-xl lg:rounded-2xl shadow-[0px_6px_16px_0px_rgba(20,20,20,0.15)]">
            <div>
                <h2 class="font-boldFont text-2xl md:text-3xl py-2 text-center">Welcome</h2>
            </div>

            <div class="mt-4">
                <form action="{{ route('login') }}" method="POST" class="space-y-3 md:space-y-5">
                    @csrf
                    <div>
                        <input
                            class="w-full py-4 px-6 rounded-md bg-[#E5E5E5] text-sm font-poppins focus:outline-none text-[#2E2E2E] placeholder:text-[#2E2E2E]"
                            placeholder="Email Address" type="email" name="email" id="email" />
                    </div>
                    @error('email')
                        <p class="error-msg--auth--page" style="color: red">{{ $message }}</p>
                    @enderror
                    <div class="relative">
                        <input
                            class="w-full py-4 px-6 rounded-md passwordInput bg-[#E5E5E5] text-sm font-poppins focus:outline-none text-[#2E2E2E] placeholder:text-[#2E2E2E]"
                            placeholder="Password" type="password" name="password" id="password" />
                        @error('password')
                            <p class="error-msg--auth--page" style="color: red">{{ $message }}</p>
                        @enderror
                        <!-- icons -->
                        <div class="absolute top-1/2 right-3 -translate-x-1/2 -translate-y-1/2 cursor-pointer hidePass">
                            <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                                stroke-linecap="round" stroke-linejoin="round" height="20" width="20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.88 9.88a3 3 0 1 0 4.24 4.24"></path>
                                <path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68">
                                </path>
                                <path d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"></path>
                                <line x1="2" x2="22" y1="2" y2="22"></line>
                            </svg>
                        </div>
                        <div
                            class="absolute top-1/2 right-3 -translate-x-1/2 -translate-y-1/2 size-5 cursor-pointer showPass hidden">
                            <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                                stroke-linecap="round" stroke-linejoin="round" height="20" width="20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </div>
                    </div>

                    <!-- forgot password -->
                    <div class="w-full">
                        <a href="{{ route('forgotPassword') }}"
                            class="text-center font-poppins font-semibold text-sm underline w-full mx-auto block">Forgot
                            password?</a>
                    </div>

                    <!-- submit -->
                    <div class="w-full">
                        <button
                            class="font-semibold text-center bg-primary py-2.5 md:py-4 text-white w-full rounded-md font-poppins">
                            Log In
                        </button>
                    </div>

                    <div>
                        <p class="font-poppins text-sm text-[#2E2E2E]">
                            By signing up, you agree to our
                            <a href="#" class="underline">Privacy Policy</a>,
                            <a href="#" class="underline">Cookie Policy</a>, and
                            <a href="#" class="underline">Member Agreement.</a>
                        </p>
                    </div>
                </form>
            </div>
        </section>

        <section
            class="mt-4 md:mt-6 w-full font-poppins p-4 md:p-6 rounded-lg md:rounded-l-xl lg:rounded-2xl shadow-[0px_6px_16px_0px_rgba(20,20,20,0.15)] sm:max-w-[500px] sm:min-w-[500px]">
            <div class="w-full text-center text-sm md:text-base">
                <p>
                    New here?
                    <a href="{{ route('signUp') }}" class="font-semibold underline">Join Connect</a>
                    now.
                </p>
            </div>
        </section>
    </main>
@endsection

@push('scripts')
@endpush
