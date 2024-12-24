@extends('web.backend.app')

@section('title', 'CMS Page')

@push('style')
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.0/dist/sweetalert2.min.css" rel="stylesheet">
@endpush

@section('content')

    <section class="content-wrapper">

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">Update Maximize Community</h3>
            </div>

            <div class="card-body">
                <form method="post" action="{{ route('admin.maximize_community.update') }}">
                    @csrf

                    <div>
                        <div class="form-group">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                id="title" value="{{ old('title', $data->title ?? '') }}">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div class="form-group">
                            <label for="sub_title" class="form-label">Sub Title</label>
                            <input type="text" class="form-control @error('sub_title') is-invalid @enderror" name="sub_title"
                                id="sub_title" value="{{ old('sub_title', $data->sub_title ?? '') }}">
                            @error('sub_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div class="form-group">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content">
                            {{ old('content', $data->content ?? '') }}</textarea>
                            @error('content')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>

                </form>

            </div>

        </div>

    </section>


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
