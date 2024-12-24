@extends('web.frontend.app')

@section('title', 'Business Information')

@push('styles')
@endpush

@section('content')

    <main
        class="min-h-[calc(100vh-96px)] flex flex-col items-center justify-center font-poppins mx-5 md:mx-8 2xl:mx-0 mb-10">
        <!-- Login Form -->
        <section
            class="sm:max-w-[500px] sm:min-w-[500px] p-4 md:p-6 rounded-2xl shadow-[0px_6px_16px_0px_rgba(20,20,20,0.15)]">
            <div>
                <h2 class="font-boldFont text-2xl md:text-3xl py-2 text-center text-[#222222]">
                    Personal Information
                </h2>
            </div>

            <div class="mt-4">
                <form action="{{ route('submitVerification') }}" class="space-y-3 md:space-y-5" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <!-- image upload placeholder -->
                    <div class="w-full flex items-center justify-center">
                        <div class="relative">
                            <div class="size-20">
                                <img class="upload-img-prev rounded-full h-full w-full object-cover"
                                    src="{{ asset('frontend/assets/images/photo-placeholder.png') }}" alt="" />
                            </div>
                        </div>
                    </div>

                    <!-- form inputs -->
                    <div class="space-y-4">
                        <div class="w-full flex flex-col md:flex-row items-center gap-4">
                            <div class="w-full">
                                <input
                                    class="w-full py-4 px-6 rounded-md bg-[#E5E5E5] text-sm font-poppins focus:outline-none text-[#2E2E2E] placeholder:text-[#2E2E2E]"
                                    placeholder="First Name" type="text" name="firstName" id="firstName"
                                    value="{{ old('firstName') }}" />
                                @error('firstName')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="w-full">
                                <input
                                    class="w-full py-4 px-6 rounded-md bg-[#E5E5E5] text-sm font-poppins focus:outline-none text-[#2E2E2E] placeholder:text-[#2E2E2E]"
                                    placeholder="Last Name" type="text" name="lastName" id="lastName"
                                    value="{{ old('lastName') }}" />
                                @error('lastName')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div>
                            <input
                                class="w-full py-4 px-6 rounded-md bg-[#E5E5E5] text-sm font-poppins focus:outline-none text-[#2E2E2E] placeholder:text-[#2E2E2E]"
                                placeholder="Phone Number" type="number" name="phoneNumber" id="phoneNumber"
                                value="{{ old('phoneNumber') }}" />
                        </div>
                        @error('streetAddress')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="relative">
                            <input
                                class="w-full py-4 px-6 rounded-md passwordInput bg-[#E5E5E5] text-sm font-poppins focus:outline-none text-[#2E2E2E] placeholder:text-[#2E2E2E]"
                                placeholder="Street Address 01" type="text" name="streetAddress" id="streetAddress"
                                value="{{ old('streetAddress') }}" />

                            @error('streetAddress')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

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
                        <div class="w-full flex flex-col md:flex-row items-center gap-4">
                            <div class="w-full">
                                <input
                                    class="w-full py-4 px-6 rounded-md bg-[#E5E5E5] text-sm font-poppins focus:outline-none text-[#2E2E2E] placeholder:text-[#2E2E2E]"
                                    placeholder="City" type="text" name="city" id="city"
                                    value="{{ old('city') }}" />
                                @error('city')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="w-full">
                                <input
                                    class="w-full py-4 px-6 rounded-md bg-[#E5E5E5] text-sm font-poppins focus:outline-none text-[#2E2E2E] placeholder:text-[#2E2E2E]"
                                    placeholder="State" type="text" name="state" id="state"
                                    value="{{ old('state') }}" />
                                @error('state')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="w-full">
                                <input
                                    class="w-full py-4 px-6 rounded-md bg-[#E5E5E5] text-sm font-poppins focus:outline-none text-[#2E2E2E] placeholder:text-[#2E2E2E]"
                                    placeholder="Zip" type="text" name="zip" id="zip"
                                    value="{{ old('zip') }}" />
                                @error('zip')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="business-specialty-select w-full">
                            <select class="text-sm md:text-base" name="category">
                                <option value="" disabled>
                                    All Categories
                                </option>
                                <option value="Grocery Store">Grocery Store</option>
                                <option value="Business">Business</option>
                            </select>
                            @error('category')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <input value="www.something.com"
                                class="w-full py-4 px-6 rounded-md bg-[#E5E5E5] text-sm font-poppins focus:outline-none text-[#2E2E2E] placeholder:text-[#2E2E2E]"
                                placeholder="Business Website URL" type="text" name="businessUrl" id="businessUrl"
                                value="{{ old('businessUrl') }}" />
                        </div>
                        @error('businessUrl')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="w-full">
                            <input value="4509 Nuzum Court"
                                class="w-full py-4 px-6 rounded-md bg-[#E5E5E5] text-sm font-poppins focus:outline-none text-[#2E2E2E] placeholder:text-[#2E2E2E]"
                                placeholder="Business(Street Address)" type="text" name="businessNameStreetAddress"
                                id="businessNameStreetAddress" value="{{ old('businessNameStreetAddress') }}" />
                        </div>
                        @error('businessNameStreetAddress')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="w-full">
                            <div class="space-y-4">
                                <div
                                    class="border-2 overflow-hidden border-dashed border-primary px-6 py-5 rounded-lg bg-[#E5E5E5]">
                                    <label class="flex items-center pl-5 sm:pl-12 lg:pl-20 gap-5 cursor-pointer"
                                        for="businessDoc">
                                        <div class="p-3 flex items-center gap-2 rounded-md bg-white justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 20 20" fill="none">
                                                <path
                                                    d="M14.6747 9.39199H17.0163V13.692C17.0163 14.9587 16.5811 15.8721 15.9419 16.4724C15.2938 17.0811 14.3652 17.4337 13.2747 17.4337H6.72467C5.63414 17.4337 4.7056 17.0811 4.05748 16.4724C3.41827 15.8721 2.98301 14.9587 2.98301 13.692V6.30866C2.98301 5.04194 3.41827 4.12857 4.05748 3.52823C4.7056 2.91951 5.63414 2.56699 6.72467 2.56699H10.1913V4.90866C10.1913 7.38072 12.2026 9.39199 14.6747 9.39199Z"
                                                    stroke="#2E2E2E" stroke-width="1.8" />
                                                <path
                                                    d="M14.5303 6.8421L14.5303 6.84207H14.5251C13.5296 6.84207 12.7334 6.04451 12.7334 5.11707V2.20873C12.7334 2.20181 12.7344 2.19902 12.7344 2.19893L12.7344 2.19891C12.7345 2.19867 12.7346 2.19842 12.7351 2.19773C12.7365 2.1958 12.7424 2.1894 12.755 2.18443C12.7676 2.17948 12.7795 2.17893 12.7876 2.18042C12.7932 2.18142 12.8013 2.18376 12.8132 2.19562C13.6451 3.02751 14.8938 4.28762 15.9872 5.39101C16.5139 5.92252 17.0046 6.41767 17.3953 6.81106L17.3965 6.81229C17.3994 6.81522 17.4012 6.81738 17.4021 6.81862L17.4025 6.8193C17.4023 6.82082 17.4018 6.82351 17.4001 6.82723C17.3969 6.8346 17.3917 6.84044 17.3866 6.84389C17.3843 6.84546 17.3816 6.84685 17.378 6.84794C17.3746 6.849 17.3684 6.8504 17.3584 6.8504C16.4158 6.8504 15.3188 6.85039 14.5303 6.8421ZM17.3584 7.3504C17.8334 7.3504 18.0834 6.79207 17.7501 6.45873C17.3602 6.06621 16.8702 5.57168 16.3439 5.04055C15.25 3.93668 13.9994 2.67476 13.1667 1.84207C12.8251 1.5004 12.2334 1.73373 12.2334 2.20873V5.11707C12.2334 6.33373 13.2667 7.34207 14.5251 7.34207C15.3167 7.3504 16.4166 7.3504 17.3582 7.3504H17.3584Z"
                                                    fill="#2E2E2E" stroke="#2E2E2E" />
                                            </svg>
                                        </div>
                                        <p id="fileName" class="text-textColor text-center text-sm md:text-base">
                                            Submitted Example 1. PDF
                                        </p>
                                    </label>
                                    <input type="file" id="businessDoc" class="hidden" onchange="showFileName()"
                                        name="businessDoc" />
                                </div>
                                @error('businessDoc')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div
                                    class="border-2 overflow-hidden border-dashed border-primary px-6 py-5 rounded-lg bg-[#E5E5E5]">
                                    <label class="flex items-center pl-5 sm:pl-12 lg:pl-20 gap-5 cursor-pointer"
                                        for="businessDoc1">
                                        <div class="p-3 flex items-center gap-2 rounded-md bg-white justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 20 20" fill="none">
                                                <path
                                                    d="M18.0664 14.133L15.4581 8.04137C14.5748 5.9747 12.9498 5.89137 11.8581 7.85803L10.2831 10.6997C9.48311 12.1414 7.99144 12.2664 6.95811 10.9747L6.77478 10.7414C5.69978 9.39137 4.18311 9.55803 3.40811 11.0997L1.97478 13.9747C0.966442 15.9747 2.42478 18.333 4.65811 18.333H15.2914C17.4581 18.333 18.9164 16.1247 18.0664 14.133Z"
                                                    stroke="#2E2E2E" stroke-width="1.8" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M5.80859 6.66699C7.18931 6.66699 8.30859 5.5477 8.30859 4.16699C8.30859 2.78628 7.18931 1.66699 5.80859 1.66699C4.42788 1.66699 3.30859 2.78628 3.30859 4.16699C3.30859 5.5477 4.42788 6.66699 5.80859 6.66699Z"
                                                    stroke="#2E2E2E" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <p id="fileName1" class="text-textColor text-center text-sm md:text-base">
                                            Submitted Example 1. PDF
                                        </p>
                                    </label>
                                    <input type="file" id="businessDoc1" class="hidden" onchange="showFileName1()"
                                        name="businessDoc1" />
                                </div>
                                @error('businessDoc1')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <p class="mt-4 text-[#2E2E2E] text-xs md:text-sm">
                                    Once <span class="font-poppins font-bold">submitted</span>,
                                    our team will
                                    <span class="font-poppins font-bold">verify your profile</span>. You’ll receive a
                                    <span class="font-poppins font-bold">notification upon verification.</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- submit -->
                    <div class="w-full">
                        <button type="submit"
                            class="font-semibold inline-block text-center bg-primary py-3 md:py-4 text-white w-full rounded-lg font-poppins">Submit</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

@endsection

@push('scripts')
    <script>
        function showFileName() {
            const input = document.getElementById('businessDoc');
            const fileNameDisplay = document.getElementById('fileName');
            if (input.files.length > 0) {
                const file = input.files[0];
                fileNameDisplay.textContent = `${file.name}`;
            }
        }

        function showFileName1() {
            const input = document.getElementById('businessDoc1');
            const fileNameDisplay = document.getElementById('fileName1');
            if (input.files.length > 0) {
                const file = input.files[0];
                fileNameDisplay.textContent = `${file.name}`;
            }
        }
    </script>
@endpush
