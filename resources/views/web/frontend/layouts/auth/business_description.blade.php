@extends('web.frontend.app')

@section('title', 'Business Information')

@push('styles')
@endpush

@section('content')
    <main class="min-h-[calc(100vh-96px)] flex flex-col items-center justify-center font-poppins mx-5 md:mx-8 2xl:mx-0">
        <section
            class="sm:max-w-[500px] sm:min-w-[500px] p-4 md:p-6 rounded-2xl shadow-[0px_6px_16px_0px_rgba(20,20,20,0.15)]">
            <div>
                <h2 class="font-boldFont text-2xl md:text-3xl py-2 text-center text-[#222222] mx-auto">
                    Write Description about your Business
                </h2>
            </div>

            <div class="mt-4">
                <form action="{{route('businessDescription')}}" method="post" class="space-y-3 md:space-y-5">
                    @csrf
                    <!-- form inputs -->
                    <div class="space-y-4">
                        <div class="w-full">
                            <textarea rows="8" placeholder="Description"
                                class="w-full py-4 px-6 rounded-md bg-[#E5E5E5] text-sm font-poppins focus:outline-none text-[#2E2E2E] placeholder:text-[#2E2E2E] resize-none"
                                name="business_description" id="business-description"></textarea>

                            <!-- count -->
                            <div class="flex items-center justify-end">
                                <p class="text-[#6A6A6A] text-sm">0/500</p>
                            </div>
                        </div>
                    </div>

                    <!-- submit -->
                    <div class="w-full">
                        <button type="submit"
                            class="font-semibold inline-block text-center bg-primary py-3 md:py-4 text-white w-full rounded-lg font-poppins">Continue</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

@endsection

@push('scripts')
@endpush
