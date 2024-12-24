@extends('web.frontend.app')

@section('title', 'Verify Email')

@push('styles')
@endpush

@section('content')

    <main class="md:h-[calc(100vh-96px)] flex flex-col items-center justify-center mx-5 md:mx-8 2xl:mx-0">
        <!-- Login Form -->
        <section
            class="mx-5 md:px-8 2xl:mx-0 w-full sm:max-w-[500px] sm:min-w-[500px] p-4 md:p-6 rounded-lg md:rounded-l-xl lg:rounded-2xl shadow-[0px_6px_16px_0px_rgba(20,20,20,0.15)]">
            <div>
                <h2 class="font-boldFont text-2xl md:text-3xl py-2 text-center">
                    Forgot Password
                </h2>
            </div>

            <div class="mt-4">
                <form action="" class="space-y-3 md:space-y-5">
                    <div>
                        <input required
                            class="w-full py-4 px-6 rounded-md bg-[#E5E5E5] text-sm font-poppins focus:outline-none text-[#2E2E2E] placeholder:text-[#2E2E2E]"
                            placeholder="Email Address" type="email" name="email" id="email" />
                    </div>
                    <div>
                        <input required
                            class="w-full py-4 px-6 rounded-md bg-[#E5E5E5] text-sm font-poppins focus:outline-none text-[#2E2E2E] placeholder:text-[#2E2E2E]"
                            placeholder="Enter Code " type="text" name="email" id="email" />
                    </div>
                    <div class="relative">
                        <input required
                            class="w-full py-4 px-6 rounded-md passwordInput bg-[#E5E5E5] text-sm font-poppins focus:outline-none text-[#2E2E2E] placeholder:text-[#2E2E2E]"
                            placeholder="Password" type="password" name="password" id="password" />

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

                    <!-- submit -->
                    <div class="w-full">
                        <a href="user-homepage.html"
                            class="font-semibold text-center bg-primary py-2.5 md:py-4 text-white w-full rounded-md font-poppins flex items-center justify-center">
                            Confirm
                        </a>
                    </div>
                </form>
            </div>
        </section>
    </main>

@endsection

@push('scripts')
@endpush
