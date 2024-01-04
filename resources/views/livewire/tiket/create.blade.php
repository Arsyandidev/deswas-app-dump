<div>
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <aside
        class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
        id="sidenav-main">
        <x-sidebar></x-sidebar>
    </aside>
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <x-admin-nav></x-admin-nav>
        <!-- End Navbar -->
        <div class="container-fluid py-1">
            <div class="row">
                <form wire:submit.prevent="store">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="d-flex align-items-center">
                                    <p class="mb-0">Buat Pertanyaan </p>
                                    <button type="submit" class="btn btn-primary btn-sm ms-auto">Submit</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Kategori</label>
                                            <select class="form-control" wire:model="kategori">
                                                <option>Pilih kategori</option>
                                                @foreach ($category as $c)
                                                    <option value="{{ $c->id }}">{{ $c->name }}
                                                        ({{ $c->deskripsi }})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Judul</label>
                                            <input wire:model="judul"
                                                class="form-control @error('judul') is-invalid @enderror" type="text"
                                                placeholder="Masukan judul pertanyaan">
                                            @error('judul')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Deskripsi</label>
                                            <div class="deskripsi form-control @error('deskripsi') is-invalid @enderror"
                                                rows="3" placeholder="Deskripsikan pertanyaan disini"
                                                wire:model.lazy="deskripsi" wire:key="deskripsi" x-data
                                                x-ref="deskripsi" x-init="tinymce.init({
                                                    selector: '.deskripsi',
                                                    plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
                                                    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                                                    tinycomments_mode: 'embedded',
                                                    tinycomments_author: 'Helpdesk Pengawasan',
                                                    relative_urls: false,
                                                    remove_script_host: false,
                                                    setup: function(editor) {
                                                        editor.on('blur', function(e) {
                                                            @this.set('deskripsi', editor.getContent());
                                                        });
                                                    },
                                                    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
                                                })"></div>
                                            @error('deskripsi')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Gambar</label>
                                            <input wire:model="gambar" accept="image/png, image/jpeg"
                                                class="form-control @error('gambar') is-invalid @enderror"
                                                type="file">
                                            @error('gambar')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">File</label>
                                            <input wire:model="file" accept=".doc,.docx,.pdf,.xlsx"
                                                class="form-control @error('file') is-invalid @enderror" type="file">
                                            @error('file')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    @if ($gambar)
                                        <div class="container">
                                            <label for="example-text-input" class="form-control-label">Review
                                                gambar: </label> <br>
                                            <img class="img-thumbnail w-50" src="{{ $gambar->temporaryUrl() }}"
                                                alt=""> <br>
                                            <label for="example-text-input" class="form-control-label">Tipe:
                                                {{ $gambar->getMimeType() }}</label>
                                        </div>
                                    @endif

                                </div>
                                <hr class="horizontal dark">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>
