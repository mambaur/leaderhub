@extends('admin.layouts.main', ['title' => 'Tambah Download Center', 'menu' => 'download-centers', 'submenu' => 'download-center-create'])

@section('content')
    <div class="content-wrapper">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-lg-10 col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tambah Download Center</h4>
                        <form class="forms-sample" method="post" action="{{ route('download_center_store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Judul</label>
                                <input type="text" class="form-control h-100 @error('name') is-invalid @enderror"
                                    id="name" value="{{ old('name') }}" name="name" placeholder="Judul..."
                                    required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="url">Link File Download</label>
                                <input type="text" class="form-control h-100 @error('url') is-invalid @enderror"
                                    id="url" value="{{ old('url') }}" name="url"
                                    placeholder="https://example.com" required>

                                {{-- <div id="upload-container">
                                    <button id="browseFile" type="button" class="btn btn-outline-secondary">Choose
                                        file</button>
                                </div>

                                <div class="progress mt-3" style="height: 25px; display:none">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                        style="width: 75%; height: 100%">75%</div>
                                </div>

                                <div class="mt-2">
                                    <a href="" class="file-result"></a>
                                </div> --}}

                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="image">Icon</label>
                                <input type="file" class="form-control h-100 @error('image') is-invalid @enderror"
                                    name="image" id="image">

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="url">Deskripsi</label>
                                <textarea name="description" id="description" class="form-control h-100 @error('description') is-invalid @enderror"
                                    rows="5" placeholder="Deskripsi...">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <a href="{{ url()->previous() }}" class="btn btn-light">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- 
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js"></script>
    <script>
        let browseFile = $('#browseFile');
        let resumable = new Resumable({
            target: '/upload-image-large',
            query: {
                _token: '{{ csrf_token() }}'
            },
            headers: {
                'Accept': 'application/json'
            },
            testChunks: false,
            throttleProgressCallbacks: 1,
        });

        resumable.assignBrowse(browseFile[0]);

        resumable.on('fileAdded', function(file) {
            showProgress();
            console.log('upload')
            resumable.upload()
        });

        resumable.on('fileProgress', function(file) {
            updateProgress(Math.floor(file.progress() * 100));
        });

        resumable.on('fileSuccess', function(file, response) {
            response = JSON.parse(response)
            console.log(response);
            resumable.removeFile(file);
            setTimeout(function() {
                $('.progress').hide();
                $('.file-result').html(response.filename)
                $('.file-result').attr('href', response.path)
                $('#url').val(response.storage_path)
            }, 1500);

        });

        resumable.on('fileError', function(file, response) {
            alert('Upload file gagal, silahkan coba kembali.')
        });


        let progress = $('.progress');

        function showProgress() {
            progress.find('.progress-bar').css('width', '0%');
            progress.find('.progress-bar').html('0%');
            progress.find('.progress-bar').removeClass('bg-success');
            progress.show();
        }

        function updateProgress(value) {
            progress.find('.progress-bar').css('width', `${value}%`)
            progress.find('.progress-bar').html(`${value}%`)
        }

        function hideProgress() {
            progress.hide();
        }
    </script>
@endsection --}}
