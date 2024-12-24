@extends('web.frontend.app')

@section('title', 'Community Join')

@push('styles')
@endpush

@section('content')

    <main class="h-[calc(100vh-97px)] flex flex-col items-center justify-center">
        <!-- Login Form -->
        <section class="sm:min-w-[500px] p-6 rounded-2xl">
            <div>
                <h2 class="font-boldFont text-2xl sm:text-3xl lg:text-4xl text-center text-[#222222]">
                    Join the community to start the <br />
                    conversation
                </h2>
            </div>

            <!-- bg -->
            <div class="mt-10 flex items-center flex-col gap-6 md:gap-10 justify-center">
                <div>
                    <img src="https://i.imghippo.com/files/KqD4957BuM.png" alt="" />
                </div>

                <a href="{{ route('communityInbox') }}"
                    class="px-6 py-2 md:px-8 md:py-3 font-medium block bg-[#FF4040] text-white rounded-md">Join Now</a>
            </div>
        </section>
    </main>

@endsection

@push('scripts')
@endpush
