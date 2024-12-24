@extends('web.backend.app')

@section('title', 'Create Dynamic Page')

@push('style')
    <style>
        .ck-editor__editable_inline {
            min-height: 150px;
        }
    </style>
@endpush

@section('content')

    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create Dynamic Page</h4>
                        <div class="card mb-4">
                            <div class="card-body">
                                <form action="{{ route('admin.dynamic_page.store') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="page_title" class="form-label">Page Title</label>
                                        <input type="text"
                                            class="form-control @error('page_title') is-invalid @enderror"
                                            name="page_title" placeholder="Enter page title here" id="page_title"
                                            value="{{ old('page_title') }}">
                                        @error('page_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="page_content" class="form-label">Page Content</label>
                                        <textarea class="form-control @error('page_content') is-invalid @enderror" name="page_content"
                                            id="content">{{ old('page_content') }}</textarea>
                                        @error('page_content')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-2">
                                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /Account -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.0/classic/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            ClassicEditor
                .create(document.querySelector('#content'), {
                    height: '500px'
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endpush
