@extends('web.frontend.app')

@section('title', 'Community Inbox')

@push('styles')
    <style>
        /* Existing styles with modifications */
        #filePreviewContainer {
            display: none;
            /* Hidden by default */
            width: 100%;
            overflow-x: auto;
            gap: 10px;
            padding: 5px 10px;
            margin-bottom: 10px;
            /* Space between preview and message box */
        }

        #filePreviewContainer.has-files {
            display: flex;
        }

        .file-preview-container {
            gap: 10px;
            overflow-x: auto;
            padding: 5px 0;
            scrollbar-width: thin;
            scrollbar-color: rgba(0, 0, 0, 0.2) transparent;
        }

        .file-preview-container::-webkit-scrollbar {
            height: 6px;
        }

        .file-preview-container::-webkit-scrollbar-thumb {
            background-color: rgba(0, 0, 0, 0.2);
            border-radius: 3px;
        }

        .file-preview-item {
            position: relative;
            width: 60px;
            height: 60px;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            flex-shrink: 0;
        }

        .file-preview-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .file-remove-btn {
            position: absolute;
            top: 2px;
            right: 2px;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 12px;
            line-height: 1;
            padding: 0;
            z-index: 10;
        }

        .file-name {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            font-size: 10px;
            text-align: center;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            padding: 2px;
        }

        /* Responsive adjustments */
        @media (max-width: 640px) {
            #filePreviewContainer {
                padding: 5px;
            }

            .file-preview-item {
                width: 50px;
                height: 50px;
            }
        }
    </style>
@endpush

@section('content')

    <main class="min-h-[calc(100vh-97px)] max-h-[calc(100vh-97px)] w-full flex !overflow-hidden">
        <!-- sidebar -->
        <section class="w-[350px] bg-white border-r border-black/10 h-[calc(100vh-90px)] p-6 hidden lg:block">
            <div class="pl-20 space-y-5">
                <h3 class="font-boldFont text-xl text-[#222222]">Messages</h3>
                <h5 class="font-boldFont bg-[#ECECEC] px-4 py-2 rounded-2xl cursor-pointer">
                    # Community
                </h5>
            </div>
        </section>

        <!-- main content -->
        <section class="lg:w-[calc(100%-300px)] h-[calc(100vh-90px)] overflow-y-auto px-5 md:px-8 lg:px-0">
            <!-- title -->
            <div class="mt-8 lg:mt-60 text-textColor lg:px-8 space-y-3 md:space-y-5">
                <h4
                    class="text-2xl md:text-3xl lg:text-4xl 2xl:text-5xl p-4 font-boldFont rounded-full bg-[#ECECEC] size-12 sm:size-14 lg:size-16 xl:size-20 flex items-center justify-center">
                    #
                </h4>
                <h5 class="text-xl md:text-2xl lg:text-3xl font-boldFont text">
                    Welcome to #community!
                </h5>
            </div>

            <div class="w-full md:px-8 my-5 md:my-8 lg:my-1 space-y-4 md:space-y-5 lg:space-y-6">
                @foreach ($data as $date => $communities)
                    <!-- Date -->
                    <div class="w-full flex items-center gap-5 my-5 lg:px-8">
                        <div class="w-full bg-[#00000014] h-[1px]"></div>
                        <span
                            class="text-xs md:text-sm text-[#6A6A6A] font-mediumFont text-nowrap">{{ $date ?? '' }}</span>
                        <div class="w-full bg-[#00000014] h-[1px]"></div>
                    </div>

                    <!-- All Messages for this Date -->
                    @foreach ($communities as $community)
                        <div class="flex items-center gap-4">
                            <!-- Image -->
                            <div class="size-14 flex-shrink-0">
                                <img class="w-full h-full object-cover rounded-full"
                                    src="{{ $community->user->avatar ?? 'https://i.imghippo.com/files/YQAp8698dPY.png' }}"
                                    alt="{{ $community->user->last_name ?? '' }}" />
                            </div>

                            <!-- Info -->
                            <div class="space-y-1">
                                <!-- Name -->
                                <div class="flex items-center gap-3">
                                    <h4 class="font-boldFont cursor-pointer">{{ $community->user->last_name ?? '' }}</h4>
                                    <p class="text-xs font-normalFont tracking-wider text-[#6A6A6A]">
                                        {{ $community->created_at->format('h:i A') ?? '' }}
                                    </p>
                                </div>

                                <!-- Message -->
                                <div>
                                    <p class="text-sm md:text-base">
                                        {{ $community->message ?? '' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>


            <!-- Message Input -->
            <div class="lg:mx-8 my-2 2xl:my-10">
                <!-- File preview container - NOW AT THE TOP -->
                <div id="filePreviewContainer"
                    class="bg-[#ECECEC] py-2 rounded-md file-preview-container mb-2 px-2 overflow-x-auto"></div>
                <div class="bg-[#ECECEC] py-2 rounded-t-md rounded-b-md">
                    <form id="messageForm" class="px-4 flex flex-col" action="{{ route('community.message.store') }}"
                        method="POST">
                        @csrf
                        <div class="flex items-center gap-2">
                            <!-- Upload input -->
                            <label for="fileUploadInbox" class="size-12 flex items-center justify-center">
                                <input class="hidden" type="file" name="fileUploadInbox" id="fileUploadInbox" multiple
                                    accept="image/*,application/pdf,.doc,.docx,.txt" />
                                <div class="bg-white p-2 rounded-full cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none">
                                        <path d="M5 10H15" stroke="#222222" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M10 15V5" stroke="#222222" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </label>

                            <!-- Text input -->
                            <div class="w-full flex h-full items-center justify-center">
                                <textarea placeholder="Message. #general"
                                    class="font-mediumFont resize-none bg-transparent focus:outline-none w-full text-[#2E2E2E]" name="messageInput"
                                    id="messageInput" oninput="autoResize(this)" rows="1"></textarea>
                            </div>

                            <!-- Submit button -->
                            <div>
                                <button class="size-10 flex items-center justify-center bg-white rounded-full"
                                    type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none">
                                        <path
                                            d="M6.16641 5.2668L13.2414 2.90846C16.4164 1.85013 18.1414 3.58346 17.0914 6.75846L14.7331 13.8335C13.1497 18.5918 10.5497 18.5918 8.96641 13.8335L8.26641 11.7335L6.16641 11.0335C1.40807 9.45013 1.40807 6.85846 6.16641 5.2668Z"
                                            stroke="#222222" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M8.4248 11.375L11.4081 8.3833" stroke="#222222" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

@endsection

@push('scripts')
    {{-- <script>
        // Auto-resize textarea function
        function autoResize(textarea) {
            textarea.style.height = 'auto';
            textarea.style.height = textarea.scrollHeight + 'px';
        }

        // File upload preview and management
        const fileInput = document.getElementById('fileUploadInbox');
        const filePreviewContainer = document.getElementById(
            'filePreviewContainer'
        );
        const messageForm = document.getElementById('messageForm');

        // Unique identifier for files
        let fileCounter = 0;

        // Store files to manage removal
        let uploadedFiles = new DataTransfer();

        // Function to update preview container visibility
        function updateFilePreviewVisibility() {
            if (uploadedFiles.files.length > 0) {
                filePreviewContainer.classList.add('has-files');
                filePreviewContainer.style.display = 'flex';
            } else {
                filePreviewContainer.classList.remove('has-files');
                filePreviewContainer.style.display = 'none';
            }
        }

        fileInput.addEventListener('change', function(event) {
            // Reset preview container
            filePreviewContainer.innerHTML = '';

            // Reset uploadedFiles
            uploadedFiles = new DataTransfer();

            // Process each selected file
            Array.from(this.files).forEach((file) => {
                // Add file to uploadedFiles
                uploadedFiles.items.add(file);

                // Create a unique ID for this file
                const fileId = `file-${fileCounter++}`;

                // Create file preview container
                const fileItem = document.createElement('div');
                fileItem.className = 'file-preview-item';
                fileItem.id = fileId;

                // Create remove button
                const removeBtn = document.createElement('button');
                removeBtn.innerHTML = '×';
                removeBtn.className = 'file-remove-btn';
                removeBtn.addEventListener('click', () => {
                    // Remove the file preview
                    fileItem.remove();

                    // Remove this specific file from uploadedFiles
                    for (let i = 0; i < uploadedFiles.files.length; i++) {
                        if (
                            uploadedFiles.files[i].name === file.name &&
                            uploadedFiles.files[i].size === file.size
                        ) {
                            uploadedFiles.items.remove(i);
                            break;
                        }
                    }

                    // Update file input
                    fileInput.files = uploadedFiles.files;

                    // Update preview container visibility
                    updateFilePreviewVisibility();
                });

                // Handle different file types
                if (file.type.startsWith('image/')) {
                    // For image files, create an image preview
                    const img = document.createElement('img');
                    img.file = file;
                    fileItem.appendChild(img);
                    fileItem.appendChild(removeBtn);

                    // Read the image file
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        img.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                } else {
                    // For non-image files, show file name
                    const fileNameEl = document.createElement('div');
                    fileNameEl.textContent = file.name;
                    fileNameEl.className = 'file-name';
                    fileItem.appendChild(fileNameEl);
                    fileItem.appendChild(removeBtn);
                }

                // Add to preview container
                filePreviewContainer.appendChild(fileItem);
            });

            // Update preview container visibility
            updateFilePreviewVisibility();
        });

        // Optional: Form submission handling
        messageForm.addEventListener('submit', function(event) {
            event.preventDefault();

            // Collect uploaded files
            const files = uploadedFiles.files;
            const message = document.getElementById('messageInput').value;

            // Here you would typically send the files and message to your server
            console.log('Files:', files);
            console.log('Message:', message);

            // Clear input and previews after submission
            fileInput.value = '';
            filePreviewContainer.innerHTML = '';
            document.getElementById('messageInput').value = '';
            uploadedFiles = new DataTransfer();

            // Update preview container visibility
            updateFilePreviewVisibility();
        });
    </script> --}}
@endpush
