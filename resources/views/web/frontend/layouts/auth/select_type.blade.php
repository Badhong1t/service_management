@extends('web.frontend.app')

@section('title', 'Select Type')

@push('styles')
@endpush

@section('content')
    <main class="h-[calc(100vh-90px)] flex flex-col items-center justify-center font-poppins mx-5 md:mx-8 2xl:mx-0">
        <!-- Login Form -->
        <section
            class="sm:max-w-[500px] sm:min-w-[500px] p-4 md:p-6 rounded-lg md:rounded-l-xl lg:rounded-2xl shadow-[0px_6px_16px_0px_rgba(20,20,20,0.15)]">
            <div>
                <h2 class="font-boldFont text-2xl md:text-3xl py-2 text-center">
                    I’m here too
                </h2>
            </div>

            <div class="mt-4">
                <form class="space-y-3 md:space-y-5" action="{{ route('selectType') }}" method="POST">
                    @csrf
                    <label for="individual"
                        class="flex items-center gap-3 md:gap-4 bg-[#E5E5E5] rounded-lg border border-black/15 px-3 py-4 md:px-6 md:py-5 cursor-pointer">
                        <div
                            class="size-4 flex-shrink-0 md:size-5 rounded-full border-2 border-teal-600 flex items-center justify-center relative">
                            <input checked type="radio" id="individual" name="options" value="individual"
                                class="peer hidden" />
                            <div
                                class="size-2 md:size-3 rounded-full bg-teal-600 absolute opacity-0 peer-checked:opacity-100 transition-opacity duration-200">
                            </div>
                        </div>
                        <div class="md:space-y-1">
                            <h4 class="font-medium tracking-wide capitalize">Individual</h4>
                            <p class="text-sm text-[#222222B2]">
                                I’m here to find a Professional or Business.
                            </p>
                        </div>
                    </label>
                    <label for="professional"
                        class="flex items-center gap-3 md:gap-4 bg-[#E5E5E5] rounded-lg border border-black/15 px-4 md:px-6 py-5 cursor-pointer flex-shrink-0">
                        <div
                            class="size-4 md:size-5 rounded-full border-2 border-teal-600 flex items-center justify-center relative">
                            <input type="radio" id="professional" name="options" value="professional"
                                class="peer hidden" />
                            <div
                                class="size-2 md:size-3 rounded-full bg-teal-600 absolute opacity-0 peer-checked:opacity-100 transition-opacity duration-200">
                            </div>
                        </div>
                        <div class="md:space-y-1">
                            <h4 class="font-medium tracking-wide capitalize">
                                Professional
                            </h4>
                            <p class="text-sm text-[#222222B2]">(MD, DO, etc)</p>
                        </div>
                    </label>
                    <label for="business"
                        class="flex items-center gap-3 md:gap-4 bg-[#E5E5E5] rounded-lg border border-black/15 cursor-pointer px-3 py-4 md:px-6 md:py-5">
                        <div
                            class="size-4 md:size-5 rounded-full border-2 border-teal-600 flex items-center justify-center relative flex-shrink-0">
                            <input type="radio" id="business" name="options" value="business" class="peer hidden" />
                            <div
                                class="size-2 md:size-3 rounded-full bg-teal-600 absolute opacity-0 peer-checked:opacity-100 transition-opacity duration-200">
                            </div>
                        </div>
                        <div class="md:space-y-1">
                            <h4 class="font-medium tracking-wide capitalize">Business</h4>
                            <p class="text-sm text-[#222222B2]">
                                barber, tax expert, beauty expert, etc
                            </p>
                        </div>
                    </label>
                    <!-- submit -->
                    <div class="w-full">
                        <button type="submit"
                            class="font-semibold inline-block text-center bg-primary py-2.5 md:py-4 text-white w-full rounded-lg font-poppins">Next</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

@endsection

@push('scripts')
@endpush
