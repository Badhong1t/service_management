@extends('web.frontend.app')

@section('title', 'Profile')

@push('styles')
@endpush

@section('content')

    <main
        class="md:h-[calc(100vh-91px)] xl:max-w-[1200px] min-h-[calc(100vh-97px)] mx-auto px-5 sm:px-10 md:px-16 lg:px-20 2xl:px-24 pb-10 md:pb-0">
        <section class="flex flex-col md:flex-row gap-8 sm:gap-10 md:gap-12 lg:gap-20 pt-10 md:pt-16 lg:pt-20 font-poppins">
            <!-- profile-card -->
            <div
                class="lg:w-2/5 rounded-2xl flex flex-col gap-5 items-center justify-center p-4 md:p-5 lg:p-7 shadow-[0px_6px_16px_0px_rgba(20,20,20,0.15)] md:flex-shrink-0">
                <div class="size-16 sm:size-20 md:size-28 lg:size-32">
                    <img class="h-full w-full object-cover" src="{{ auth()->user()->avatar ? asset(auth()->user()->avatar) : asset('frontend/assets/images/photo-placeholder.png')}}"
                        alt="" />
                </div>

                <div class="space-y-2">
                    <h3 class="font-boldFont md:text-xl">{{ auth()->user()->first_name.' '.auth()->user()->last_name }}</h3>
                    <p class="font-mediumFont text-sm md:text-base text-[#2E2E2E] text-center">{{ auth()->user()->user_type }}</p>
                </div>
            </div>
            <!-- Update -card -->
            <div class="lg:w-3/5 border-t border-black/10 flex flex-col gap-5">
                <!-- title -->
                <div class="mt-5">
                    <h3 class="font-boldFont md:text-xl">
                        It's time to update your profile
                    </h3>
                    <p class="text-[#6A6A6A] text-sm md:text-base mt-2 md:mt-5">
                        Your Connect profile is an important part of every reservation.
                        Create yours to help other Hosts and guests get to know you.
                    </p>

                    <button type="submit"
                        class="px-6 py-2.5 text-sm sm:text-base md:px-8 md:py-3 mt-4 md:mt-8 font-medium bg-[#FF4040] text-white rounded-md">
                        <a href="{{ route('personalInformation') }}">Update Profile</a>
                    </button>
                </div>
            </div>
        </section>
    </main>

@endsection

@push('scripts')
@endpush
