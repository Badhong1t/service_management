@extends('web.frontend.app')

@section('title', 'Business Information')

@push('styles')
@endpush

@section('content')

    <main class="min-h-[calc(100vh-96px)] flex flex-col items-center justify-center font-poppins mx-5 md:mx-8 2xl:mx-0">
        <!-- Login Form -->
        <section
            class="mb-10 sm:max-w-[500px] sm:min-w-[500px] p-4 md:p-6 rounded-2xl shadow-[0px_6px_16px_0px_rgba(20,20,20,0.15)]">
            <div>
                <h2 class="font-boldFont text-2xl md:text-3xl py-2 text-center text-[#222222] lg:w-2/3 mx-auto">
                    Add photos of your Business
                </h2>
            </div>

            <div class="mt-4">
                <form action="{{route('businessPhoto')}}" method="post" enctype="multipart/form-data" class="space-y-3 md:space-y-5">
                    @csrf
                    <!-- form inputs -->
                    <div class="space-y-4">
                        <div class="w-full">
                            <div
                                class="border-2 overflow-hidden border-dashed border-primary px-6 py-8 rounded-lg bg-[#E5E5E5] relative">
                                <input type="file" class="hidden" name="businessPhoto" id="businessPhoto" multiple />
                                <label class="flex flex-col items-center justify-center gap-5 cursor-pointer"
                                    for="businessPhoto">
                                    <div
                                        class="px-8 md:px-10 py-2 md:py-3 flex items-center gap-2 rounded-md bg-white justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                            viewBox="0 0 24 25" fill="none">
                                            <g clip-path="url(#clip0_8414_4231)">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5.83 5.606C5.99591 5.27399 6.25093 4.9947 6.56652 4.79937C6.88212 4.60404 7.24585 4.50038 7.617 4.5H16.381C16.7525 4.50001 17.1166 4.60349 17.4326 4.79884C17.7486 4.99419 18.0039 5.27369 18.17 5.606L21.682 12.631C21.8905 13.047 21.9993 13.5057 22 13.971V19.5C22 20.0304 21.7893 20.5391 21.4142 20.9142C21.0391 21.2893 20.5304 21.5 20 21.5H4C3.46957 21.5 2.96086 21.2893 2.58579 20.9142C2.21071 20.5391 2 20.0304 2 19.5V13.972C2.00019 13.5065 2.10872 13.0473 2.317 12.631L5.83 5.606ZM16.381 6.5H7.618L4.12 13.5H7.5C7.89782 13.5 8.27936 13.658 8.56066 13.9393C8.84196 14.2206 9 14.6022 9 15V16C9 16.1326 9.05268 16.2598 9.14645 16.3536C9.24021 16.4473 9.36739 16.5 9.5 16.5H14.5C14.6326 16.5 14.7598 16.4473 14.8536 16.3536C14.9473 16.2598 15 16.1326 15 16V15C15 14.6022 15.158 14.2206 15.4393 13.9393C15.7206 13.658 16.1022 13.5 16.5 13.5H19.88L16.381 6.5Z"
                                                    fill="#B6B6B6" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_8414_4231">
                                                    <rect width="24" height="24" fill="white"
                                                        transform="translate(0 0.5)" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <p class="text-textColor text-center text-sm md:text-base">
                                        <span class="text-primary">Click here</span> to upload or
                                        drop files here
                                    </p>
                                </label>
                                <div id="prev-business-documents" class="mt-4 flex flex-wrap gap-4">
                                    <!-- File previews will appear here -->
                                </div>
                            </div>
                            <div>
                                <p class="mt-4 text-[#2E2E2E] text-xs md:text-sm text-center">
                                    Please upload your business documents to continue
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- submit -->
                    <div class="w-full">
                        <a href="submit-verification.html"
                            class="font-semibold inline-block text-center bg-[#E0E0E0] py-3 md:py-4 text-textColor w-full rounded-lg font-poppins">Skip</a>
                    </div>
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
