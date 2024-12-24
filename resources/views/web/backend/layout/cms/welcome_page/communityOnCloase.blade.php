@extends('web.backend.app')

@section('title', 'CMS Page')

@push('style')
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.0/dist/sweetalert2.min.css" rel="stylesheet">
@endpush

@section('content')

    <section class="content-wrapper">

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">Update Community On Cloase</h3>
            </div>

            <div class="card-body">
                <form method="post" action="{{ route('admin.community_cloase.update') }}">
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
