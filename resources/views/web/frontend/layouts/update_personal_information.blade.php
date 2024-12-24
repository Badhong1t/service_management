@extends('web.frontend.app')

@section('title', 'Update Personal Information')

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
                    <span>Personal info</span>
                </h3>
            </div>
            <!-- main title -->
            <h2 class="font-boldFont text-2xl md:text-3xl lg:text-4xl text-[#222222] mt-3">
                Personal info
            </h2>
        </div>

        <!-- Information Accordion -->
        <section class="mt-3 sm:mt-6 md:mt-10 ">
            <!-- single item -->
            <div class="flex justify-between py-5 border-b border-black/10 name-update-container">
                <div>
                    <h3 class="font-boldFont">Name</h3>
                    <p class="text-[#6A6A6A] font-normalFont tracking-wider mt-1">
                        {{ auth()->user()->first_name ? auth()->user()->first_name : '' }} {{ auth()->user()->last_name ? auth()->user()->last_name : ''  }}
                    </p>
                </div>
                <!-- edit btn -->
                <div>
                    <button class="font-boldFont underline text-textColor name-edit-btn">
                        Edit
                    </button>
                </div>
            </div>

            <!-- accordion body::name -->
            <div class="update-information-accordion-name py-5 hidden">
                <div class="flex justify-between">
                    <div>
                        <h3 class="font-boldFont">Legal name</h3>
                        <p class="text-[#6A6A6A] font-normalFont tracking-wider mt-1">
                            Make sure this matches the name on your government ID.
                        </p>
                    </div>
                    <!-- edit btn -->
                    <div>
                        <button class="font-boldFont underline text-textColor update-information-accordion-cancel-btn">
                            Cancel
                        </button>
                    </div>
                </div>
                <!-- form -->
                <div class="mt-4 md:mt-6">
                    <form action="{{ route('updatePersonalInfo.store') }}" method="POST">
                        @csrf
                        <div class="w-full flex flex-col md:flex-row items-center gap-5">
                            <div class="border border-black rounded-lg md:rounded-xl lg:rounded-2xl w-full p-2 md:p-4">
                                <label for="firstName" class="text-[#6A6A6A]">First Name</label>
                                <div class="mt-1">
                                    <input class="w-full focus:outline-none font-mediumFont text-textColor"
                                        value="{{ auth()->user()->first_name ? auth()->user()->first_name : '' }}" type="text" name="firstName" id="firstName" />
                                </div>
                            </div>
                            <div class="border border-black rounded-lg md:rounded-xl lg:rounded-2xl w-full p-2 md:p-4">
                                <label for="lastName" class="text-[#6A6A6A]">Last Name</label>
                                <div class="mt-1">
                                    <input class="w-full focus:outline-none font-mediumFont text-textColor"
                                        value="{{ auth()->user()->last_name ? auth()->user()->last_name : '' }}" type="text" name="lastName" id="lastName" />
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 md:mt-6">
                            <button class="px-8 py-3 font-boldFont bg-[#FF4040] text-white rounded-md">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- single item -->
            <div class="flex justify-between py-5 border-b border-black/10 email-update-container">
                <div>
                    <h3 class="font-boldFont">Email address</h3>
                    <p class="text-[#6A6A6A] font-normalFont tracking-wider mt-1">
                        {{ auth()->user()->email ? auth()->user()->email : '' }}
                    </p>
                </div>
                <!-- edit btn -->
                <div>
                    <button class="font-boldFont underline text-textColor email-edit-btn">
                        Edit
                    </button>
                </div>
            </div>

            <!-- accordion body::email -->
            <div class="update-information-accordion-email py-5 hidden">
                <div class="flex justify-between">
                    <div>
                        <h3 class="font-boldFont">Email address</h3>
                        <p class="text-[#6A6A6A] font-normalFont tracking-wider mt-1">
                            Use an address you’ll always have access to.
                        </p>
                    </div>
                    <!-- edit btn -->
                    <div>
                        <button class="font-boldFont underline text-textColor email-cancel-btn">
                            Cancel
                        </button>
                    </div>
                </div>
                <!-- form -->
                <div class="mt-4 md:mt-6">
                    <form action="{{ route('updatePersonalInfo.store') }}" method="POST">
                        @csrf
                        <div class="w-full flex items-center gap-5">
                            <div class="border border-black rounded-lg md:rounded-xl lg:rounded-2xl w-full p-2 md:p-4">
                                <label for="firstName" class="text-[#6A6A6A]">Email Address</label>
                                <div class="mt-1">
                                    <input class="w-full focus:outline-none font-mediumFont text-textColor"
                                        value="{{ auth()->user()->email ? auth()->user()->email : '' }}" type="email" name="email" id="email" />
                                </div>
                            </div>
                        </div>

                        <div class="mt-6">
                            <button class="px-8 py-3 font-boldFont bg-[#FF4040] text-white rounded-md">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- single item -->
            <div class="flex justify-between py-5 border-b border-black/10 address-update-container">
                <div>
                    <h3 class="font-boldFont">Address</h3>
                    <p class="text-[#6A6A6A] font-normalFont tracking-wider mt-1">
                        {{ auth()->user()->address ? auth()->user()->address : '' }},
                        {{ auth()->user()->city ? auth()->user()->city : '' }},
                        {{ auth()->user()->state ? auth()->user()->state : '' }},
                        {{ auth()->user()->zipcode ? auth()->user()->zipcode : '' }}
                    </p>
                </div>
                <!-- edit btn -->
                <div>
                    <button class="font-boldFont underline text-textColor address-edit-btn">
                        Edit
                    </button>
                </div>
            </div>

            <!-- accordion body::address -->
            <div class="update-information-accordion-address py-5 hidden">
                <div class="flex justify-between">
                    <div>
                        <h3 class="font-boldFont">Address</h3>
                        <p class="text-[#6A6A6A] font-normalFont tracking-wider mt-1">
                            Use a permanent address where you can receive mail.
                        </p>
                    </div>
                    <!-- edit btn -->
                    <div>
                        <button class="font-boldFont underline text-textColor address-cancel-btn">
                            Cancel
                        </button>
                    </div>
                </div>
                <!-- form -->
                <div class="md:mt-6">
                    <form action="{{ route('updatePersonalInfo.store') }}" method="POST" class=" space-y-3 md:space-y-4 lg:space-y-6">
                        @csrf
                        {{-- <!-- select -->
                        <div class="accordion-body-address w-full !mb-3 md:!mb-6">
                            <select class="text-sm md:text-base">
                                <option value="Country/region" disabled selected>
                                    Country/region
                                </option>
                                <option value="United States" {{ auth()->user()->country == 'United States' ? 'selected' : '' }}>United States</option>
                                <option value="Canada" {{ auth()->user()->country == 'Canada' ? 'selected' : '' }}>Canada</option>
                                <option value="United Kingdom" {{ auth()->user()->country == 'United Kingdom' ? 'selected' : '' }}>United Kingdom</option>
                                <option value="Australia" {{ auth()->user()->country == 'Australia' ? 'selected' : '' }}>Australia</option>
                                <option value="Germany" {{ auth()->user()->country == 'Germany' ? 'selected' : '' }}>Germany</option>
                            </select>
                        </div> --}}

                        <div class="w-full flex items-center gap-5">
                            <div class="border border-black rounded-lg md:rounded-xl lg:rounded-2xl w-full p-2 md:p-4">
                                <label for="streetAddress" class="text-[#6A6A6A]">Street Address</label>
                                <div class="mt-1">
                                    <input class="w-full focus:outline-none font-mediumFont text-textColor"
                                        value="{{ auth()->user()->address ? auth()->user()->address : '' }}" type="text" name="streetAddress"
                                        id="streetAddress" />
                                </div>
                            </div>
                        </div>
                        {{-- <div class="w-full flex items-center gap-5">
                            <div class="border border-black rounded-lg md:rounded-xl lg:rounded-2xl w-full p-2 md:p-4">
                                <label for="streetAddress1" class="text-[#6A6A6A]">Street Address</label>
                                <div class="mt-1">
                                    <input class="w-full focus:outline-none font-mediumFont text-textColor"
                                        value="{{ auth()->user()->address ? auth()->user()->address : '' }}" type="text" name="streetAddress1"
                                        id="streetAddress1" />
                                </div>
                            </div>
                        </div> --}}

                        <div class="w-full flex flex-col md:flex-row items-center gap-3 md:gap-5">
                            <div class="w-full flex items-center gap-5">
                                <div class="border border-black rounded-lg md:rounded-xl lg:rounded-2xl w-full p-2 md:p-4">
                                    <label for="city-update" class="text-[#6A6A6A]">City</label>
                                    <div class="mt-1">
                                        <input class="w-full focus:outline-none font-mediumFont text-textColor"
                                            value="{{ auth()->user()->city ? auth()->user()->city : '' }}" type="text" name="city_update"
                                            id="city-update" />
                                    </div>
                                </div>
                            </div>
                            <div class="w-full flex items-center gap-5">
                                <div class="border border-black rounded-lg md:rounded-xl lg:rounded-2xl w-full p-2 md:p-4">
                                    <label for="state-update" class="text-[#6A6A6A]">State</label>
                                    <div class="mt-1">
                                        <input class="w-full focus:outline-none font-mediumFont text-textColor"
                                            value="{{ auth()->user()->state ? auth()->user()->state : '' }}" type="text" name="state_update" id="state-update" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-full flex items-center gap-5">
                            <div class="border border-black rounded-lg md:rounded-xl lg:rounded-2xl w-full p-2 md:p-4">
                                <label for="zip-update" class="text-[#6A6A6A]">Zip</label>
                                <div class="mt-1">
                                    <input class="w-full focus:outline-none font-mediumFont text-textColor" value="{{ auth()->user()->zipcode ? auth()->user()->zipcode : '' }}"
                                        type="number" name="zip_update" id="zip-update" />
                                </div>
                            </div>
                        </div>

                        <div class="mt-6">
                            <button class="px-8 py-3 font-boldFont bg-[#FF4040] text-white rounded-md">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

@endsection

@push('scripts')
@endpush
