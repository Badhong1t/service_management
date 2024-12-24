@extends('web.frontend.app')

@section('title', 'Profile Information')

@push('styles')
@endpush

@section('content')

    <main class="h-[calc(100vh-96px)] flex flex-col items-center justify-center font-poppins mx-5 md:mx-8 2xl:mx-0">
        <!-- Login Form -->
        <section
            class="sm:max-w-[500px] sm:min-w-[500px] p-4 md:p-6 rounded-2xl shadow-[0px_6px_16px_0px_rgba(20,20,20,0.15)]">
            <div>
                <h2 class="font-boldFont text-2xl md:text-3xl py-2 text-center text-[#222222]">
                    Personal Information
                </h2>
            </div>

            <div class="mt-4">
                <form class="space-y-3 md:space-y-5" action="{{ route('profileInformation') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- image upload placeholder -->
                    <div class="w-full flex items-center justify-center">
                        <div class="relative">
                            <div class="size-20">
                                <img class="upload-img-prev rounded-full h-full w-full object-cover"
                                    src="{{ asset('frontend/assets/images/photo-placeholder.png') }}" alt="" />
                            </div>
                            <label for="upload-image"
                                class="absolute bottom-0 right-2 bg-primary rounded-full cursor-pointer">
                                <div>
                                    <input class="hidden" type="file" name="upload-image" id="upload-image" />
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path d="M6 12H18" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M12 18V6" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </label>
                        </div>
                    </div>
                    @error('upload-image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div>
                        <h3 class="font-semibold text-xl text-center text-[#222222]">
                            Update Profile Photo
                        </h3>
                    </div>

                    <!-- form inputs -->
                    <div class="space-y-4">
                        <div class="w-full flex flex-col md:flex-row items-center gap-4">
                            <div class="w-full">
                                <input required
                                    class="w-full py-4 px-6 rounded-md bg-[#E5E5E5] text-sm font-poppins focus:outline-none text-[#2E2E2E] placeholder:text-[#2E2E2E]"
                                    placeholder="First Name" type="text" name="firstName" id="firstName" />
                            </div>
                            @error('firstName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="w-full">
                                <input required
                                    class="w-full py-4 px-6 rounded-md bg-[#E5E5E5] text-sm font-poppins focus:outline-none text-[#2E2E2E] placeholder:text-[#2E2E2E]"
                                    placeholder="Last Name" type="text" name="lastName" id="lastName" />
                            </div>
                            @error('lastName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div>
                            <input required
                                class="w-full py-4 px-6 rounded-md bg-[#E5E5E5] text-sm font-poppins focus:outline-none text-[#2E2E2E] placeholder:text-[#2E2E2E]"
                                placeholder="Phone Number" type="number" name="phoneNumber" id="phoneNumber" />
                        </div>
                        @error('phoneNumber')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="relative">
                            <input required
                                class="w-full py-4 px-6 rounded-md passwordInput bg-[#E5E5E5] text-sm font-poppins focus:outline-none text-[#2E2E2E] placeholder:text-[#2E2E2E]"
                                placeholder="Street Address 01" type="text" name="streetAddress" id="streetAddress" />

                            <!-- icons -->
                            <div class="absolute top-1/2 right-3 -translate-x-1/2 -translate-y-1/2 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                    fill="none">
                                    <path
                                        d="M9.91918 18.1535L9.91922 18.1535L9.91257 18.1479C9.56024 17.8529 7.80706 16.3435 6.14891 14.4184C5.3197 13.4558 4.52951 12.4066 3.95011 11.3677C3.36471 10.3181 3.03125 9.34384 3.03125 8.5148C3.03125 4.68595 6.13516 1.58203 9.96402 1.58203C13.7929 1.58203 16.8968 4.68595 16.8968 8.5148C16.8968 9.34385 16.5633 10.3181 15.978 11.3678C15.3986 12.4067 14.6085 13.4561 13.7794 14.419C12.1217 16.3443 10.3693 17.8546 10.016 18.1531L10.0154 18.1536L9.96703 18.1945L9.91918 18.1535ZM9.96487 1.74327L9.96317 1.74327C6.2256 1.7475 3.19676 4.77635 3.19252 8.51392V8.51476C3.19252 9.32784 3.50162 10.1865 3.92724 10.9992C4.35931 11.8242 4.94818 12.6702 5.58814 13.4754C6.86843 15.0862 8.40603 16.5991 9.46314 17.5476L9.96411 17.9971L10.465 17.5475C11.5222 16.5986 13.0597 15.0849 14.3399 13.4739C14.9799 12.6686 15.5687 11.8226 16.0008 10.9978C16.4263 10.1855 16.7355 9.3272 16.7355 8.51476L16.7355 8.51392C16.7313 4.77634 13.7025 1.74754 9.96487 1.74327Z"
                                        stroke="#008080" stroke-width="1.5" />
                                    <path
                                        d="M9.96335 10.8095C8.69565 10.8095 7.66797 9.78184 7.66797 8.51413C7.66797 7.24643 8.69565 6.21875 9.96335 6.21875C11.2311 6.21875 12.2587 7.24643 12.2587 8.51413C12.2587 9.78184 11.2311 10.8095 9.96335 10.8095ZM9.96335 6.24141C8.70818 6.24141 7.69066 7.25893 7.69066 8.5141C7.69066 9.76927 8.70818 10.7868 9.96335 10.7868C11.2185 10.7868 12.236 9.76927 12.236 8.5141C12.236 7.25894 11.2186 6.24141 9.96335 6.24141Z"
                                        stroke="#008080" stroke-width="1.5" />
                                </svg>
                            </div>
                        </div>
                        @error('streetAddress')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="w-full flex flex-col md:flex-row items-center gap-4">
                            <div class="w-full">
                                <input required
                                    class="w-full py-4 px-6 rounded-md bg-[#E5E5E5] text-sm font-poppins focus:outline-none text-[#2E2E2E] placeholder:text-[#2E2E2E]"
                                    placeholder="City" type="text" name="city" id="city" />
                            </div>
                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="w-full">
                                <input required
                                    class="w-full py-4 px-6 rounded-md bg-[#E5E5E5] text-sm font-poppins focus:outline-none text-[#2E2E2E] placeholder:text-[#2E2E2E]"
                                    placeholder="State" type="text" name="state" id="state" />
                            </div>
                            @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="w-full">
                                <input required
                                    class="w-full py-4 px-6 rounded-md bg-[#E5E5E5] text-sm font-poppins focus:outline-none text-[#2E2E2E] placeholder:text-[#2E2E2E]"
                                    placeholder="Zip" type="text" name="zip" id="zip" />
                            </div>
                            @error('zip')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- submit -->
                    <div class="w-full">
                        <button type="submit"
                            class="font-semibold inline-block text-center bg-primary py-3 md:py-4 text-white w-full rounded-lg font-poppins">Next</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

@endsection

@push('scripts')
@endpush
