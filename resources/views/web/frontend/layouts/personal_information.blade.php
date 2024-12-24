@extends('web.frontend.app')

@section('title', 'Personal Information')

@push('styles')
@endpush

@section('content')

    <main
        class="md:h-[calc(100vh-91px)] xl:max-w-[1200px] min-h-[calc(100vh-97px)] mx-auto px-5 sm:px-10 md:px-16 lg:px-20 2xl:px-24 pb-10 md:pb-0">
        <section class="flex flex-col md:flex-row gap-4 sm:gap-10 md:gap-12 lg:gap-20 pt-10 md:pt-16 lg:pt-20 font-poppins">
            <!-- profile-card -->
            <div class="">
                <div class="relative w-full flex items-center justify-center">
                    <div class="size-28 md:size-36 lg:size-40 xl:size-48">
                        <img class="upload-img-prev rounded-full h-full w-full object-cover"
                            src="{{ auth()->user()->avatar ? asset(auth()->user()->avatar) : asset('frontend/assets/images/photo-placeholder.png') }}"
                            alt="" />
                    </div>
                    <label for="upload-image"
                        class="shadow-[0px_6px_16px_0px_rgba(20,20,20,0.15)] absolute bottom-3 left-1/2 px-3 py-1 lg:px-6 lg:py-2 transform -translate-x-1/2 translate-y-1/2 bg-white rounded-full cursor-pointer text-xs md:text-sm lg:text-base">
                        <div>
                            <input class="hidden" type="file" name="upload-image" id="upload-image" />
                        </div>
                        <!-- placeholder -->
                        <div class="rounded-full border-none flex items-center gap-2">
                            <span><svg xmlns="http://www.w3.org/2000/svg" class="size-4 sm:size-5" viewBox="0 0 20 20"
                                    fill="none">
                                    <path
                                        d="M1.87494 8.32507L1.87481 8.32508L1.87494 8.32507ZM17.3764 8.27657L17.3763 8.27796L16.943 15.1612C16.8957 15.9095 16.6772 16.5025 16.3032 16.9022C15.9436 17.2866 15.3552 17.5834 14.3665 17.5834H5.63315C4.64416 17.5834 4.05344 17.2864 3.6928 16.9017C3.31837 16.5023 3.10031 15.9104 3.05689 15.1648L3.05667 15.1613L2.62333 8.27796L2.62324 8.27657C2.53473 6.91096 3.62277 5.75008 4.99981 5.75008C5.79587 5.75008 6.51523 5.29549 6.87396 4.60365L6.87406 4.60371L6.87989 4.59197L7.47853 3.38638C7.59483 3.1576 7.83037 2.90705 8.14585 2.7116C8.46225 2.51557 8.79157 2.41675 9.04981 2.41675H10.9581C11.211 2.41675 11.538 2.51478 11.8541 2.71114C12.169 2.90676 12.4047 3.15748 12.5211 3.38639L13.1197 4.59197L13.1196 4.59202L13.1257 4.60365C13.4844 5.29549 14.2038 5.75008 14.9998 5.75008C16.3769 5.75008 17.4649 6.91096 17.3764 8.27657Z"
                                        stroke="#222222" stroke-width="1.5" />
                                    <path
                                        d="M11.25 7.29175H8.75C8.40833 7.29175 8.125 7.00841 8.125 6.66675C8.125 6.32508 8.40833 6.04175 8.75 6.04175H11.25C11.5917 6.04175 11.875 6.32508 11.875 6.66675C11.875 7.00841 11.5917 7.29175 11.25 7.29175Z"
                                        fill="#222222" />
                                    <path
                                        d="M10.0003 15.1084C11.5559 15.1084 12.8169 13.8474 12.8169 12.2918C12.8169 10.7362 11.5559 9.4751 10.0003 9.4751C8.44466 9.4751 7.18359 10.7362 7.18359 12.2918C7.18359 13.8474 8.44466 15.1084 10.0003 15.1084Z"
                                        fill="#222222" />
                                </svg></span>

                            <span class="font-boldFont text-textColor">Add</span>
                        </div>
                    </label>
                </div>
            </div>
            <!-- Update -card -->
            <div class="w-full flex flex-col gap-5">
                <!-- title -->
                <div class="mt-3 md:mt-5">
                    <div>
                        <h3 class="font-boldFont md:text-xl">Your profile</h3>
                        <p class="text-[#6A6A6A] mt-2 md:mt-5 text-sm md:text-base">
                            The information you share will be used across Airbnb to help
                            other guests and Hosts get to know you.
                            <span class="underline text-textColor">Learn more</span>
                        </p>
                    </div>

                    <!-- form -->
                    <form class="mt-4 sm:mt-6 md:mt-8 lg:mt-10" action="{{ route('about.user.store') }}" method="POST">
                        @csrf
                        <h3 class="font-boldFont md:text-xl">About you</h3>

                        <!-- textarea -->
                        <div
                            class="mt-3 px-6 py-5 md:px-8 md:py-8 text-sm md:text-base w-full border border-black/10 lg:px-10 lg:py-8 rounded-2xl">
                            <textarea rows="5" class="placeholder:text-[#6A6A6A] focus:outline-none w-full resize-none"
                                placeholder="Write something fun and punchy." type="text" name="about_you" id="about-you">{{ auth()->user()->about ? auth()->user()->about : '' }}</textarea>
                            @error('about-you')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="update-information-add-intro-btn font-boldFont underline mt-4 cursor-pointer">
                                Add intro
                            </div>
                        </div>

                        <button class="px-6 py-2 md:px-8 md:py-3 font-medium mt-5 bg-[#FF4040] text-white rounded-md">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </section>

        <!-- Modal -->
        <div id="about-you-modal-overlay"
            class="fixed inset-0 bg-black/40 backdrop-blur-sm z-10 hidden opacity-0 transition-opacity duration-500 ease-in-out">
        </div>

        <div class="fixed inset-0 items-center justify-center z-20 hidden opacity-0 transition-opacity duration-500 ease-in-out px-5 md:px-0"
            id="about-you-modal-container">
            <div id="about-you-modal"
                class="md:max-w-[650px] bg-white rounded-2xl shadow-lg p-5 md:p-6 lg:p-7 hidden opacity-0 transition-opacity duration-500 ease-in-out">
                <!-- title -->
                <div class="space-y-3">
                    <h2 class="text-2xl md:text-2xl font-boldFont text-[#222222]">About you</h2>
                    <p class="font-normalFont tracking-wider text-[#6A6A6A] text-sm md:text-base">
                        Tell us a little bit about yourself, so your future hosts or
                        guests can get to know you.
                    </p>
                </div>

                <!-- description form -->
                <form action="{{ route('about.user.store') }}" method="POST" class="mt-4">
                    @csrf
                    <textarea required
                        class="w-full px-4 py-4 font-normalFont tracking-wider text-sm md:text-base sm:px-5 sm:py-5 md:px-6 md:py-6 resize-none rounded-lg sm:rounded-xl border border-black/50 focus:outline-none"
                        rows="5" placeholder="Enter Description" name="about_you" id="about-you-modal-description">{{ auth()->user()->about ? auth()->user()->about : '' }}</textarea>
                    @error('about-you-modal-description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <!-- word count -->
                    <div class="w-full text-end">
                        <p class="text-[#6A6A6A] text-sm">
                            <span class="font-mediumFont">441</span> characters available
                        </p>
                    </div>

                    <div class="w-full flex items-center justify-end">
                        <button
                            class="px-6 py-2 md:px-8 md:py-3 font-medium mt-3 md:mt-5 bg-[#FF4040] text-white rounded-md">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

@endsection

@push('scripts')
    <script>
        document.getElementById('upload-image').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const formData = new FormData();
            formData.append('image', file);

            // Show preview
            const reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector('.upload-img-prev').src = e.target.result;
            };
            reader.readAsDataURL(file);

            // AJAX upload
            fetch('{{ route('image.upload.store') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                if (data.success) {
                    Swal.fire({
                        title: "Uploaded!",
                        text: "Image has been uploaded successfully.",
                        icon: "success"
                    });
                } else if (data.errors) {
                    console.log(data.errors[0]);
                    errorAlert();
                } else {
                    toastr.success(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                errorAlert();
            });
        });
    </script>
@endpush
