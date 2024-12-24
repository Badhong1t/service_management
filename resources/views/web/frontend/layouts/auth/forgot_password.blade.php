@extends('web.frontend.app')

@section('title', 'Forgot Password')

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

                    <!-- submit -->
                    <div class="w-full">
                        <a href="verify-email.html"
                            class="font-semibold text-center bg-primary py-2.5 md:py-4 text-white w-full rounded-md font-poppins flex items-center justify-center ">
                            <button>Confirm</button>
                        </a>
                    </div>
                </form>
            </div>
        </section>
    </main>

@endsection

@push('scripts')
@endpush
