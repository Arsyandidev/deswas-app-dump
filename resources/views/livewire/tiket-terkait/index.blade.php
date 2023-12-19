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

        @foreach ($terkait as $t)
            <div class="container-fluid py-1">
                <div class="row">
                    <form wire:submit="store({{ $t->id }})">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header pb-0">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0">Buat Pertanyaan </p>
                                        <button class="btn btn-primary btn-sm ms-auto">Submit</button>
                                    </div>
                                    <a class="btn btn-outline-primary" data-bs-toggle="collapse" href="#collapseExample"
                                        role="button" aria-expanded="false" aria-controls="collapseExample">
                                        Pertanyaan sebelumnya
                                    </a>
                                    <div class="collapse" id="collapseExample">
                                        <div class="card card-body">
                                            <div class="card-testi p-3" data-toggle="collapse"
                                                data-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                <div class="d-flex flex-row align-items-center">
                                                    <img src="{{ asset('assets/img/team-4.jpg') }}" width="50"
                                                        class="rounded-circle">
                                                    <div class="d-flex flex-column ml-2">
                                                        <p class="h6 py-2 mx-3 m-0">{{ $t->judul }}</p>
                                                        <p class=" mx-3 m-0 p-0">{{ $t->deskripsi }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @foreach ($chat as $c)
                                                <div class="card p-3" data-toggle="collapse" data-target="#collapseOne"
                                                    aria-expanded="true" aria-controls="collapseOne">
                                                    <div class="container">
                                                        <div class="d-flex flex-row align-items-center">
                                                            <img src="{{ asset('assets/img/team-4.jpg') }}"
                                                                width="50" class="rounded-circle">
                                                            <div class="d-flex flex-column ml-2">
                                                                <span class="font-weight-bold mx-3">Jawaban</span>
                                                                <p class="py-2 mx-3">{{ $c->chat }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Kategori</label>
                                                    <select class="form-control" wire:model="kategori" disabled>
                                                        <option value="{{ $t->kategori }}" selected>
                                                            {{ $t->get_kategori->name }}
                                                            ({{ $t->get_kategori->deskripsi }})
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input"
                                                        class="form-control-label">Judul</label>
                                                    <input wire:model="judul"
                                                        class="form-control @error('judul') is-invalid @enderror"
                                                        type="text" placeholder="Masukan judul pertanyaan">
                                                    @error('judul')
                                                        <div class="alert alert-danger mt-2">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">Deskripsi</label>
                                                    <textarea wire:model="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3"
                                                        placeholder="Deskripsikan pertanyaan disini"></textarea>
                                                    @error('deskripsi')
                                                        <div class="alert alert-danger mt-2">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input"
                                                        class="form-control-label">Gambar</label>
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
                                                    <label for="example-text-input"
                                                        class="form-control-label">File</label>
                                                    <input wire:model="file" accept=".doc,.docx"
                                                        class="form-control @error('file') is-invalid @enderror"
                                                        type="file">
                                                    @error('file')
                                                        <div class="alert alert-danger mt-2">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            {{-- @if ($gambar)
                                        <div class="container">
                                            <label for="example-text-input" class="form-control-label">Review
                                                gambar: </label> <br>
                                            <img class="img-thumbnail w-50" src="{{ $gambar->temporaryUrl() }}"
                                                alt=""> <br>
                                            <label for="example-text-input" class="form-control-label">Tipe:
                                                {{ $gambar->getMimeType() }}</label>
                                        </div>
                                    @endif --}}

                                        </div>
                                        <hr class="horizontal dark">
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        @endforeach
    </main>
</div>
