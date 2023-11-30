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
                                                <label for="exampleFormControlSelect1">Example select</label>
                                                <select class="form-control" wire:model="category_id">
                                                    <option>Pilih kategori</option>
                                                    @foreach ($category_id as $c)
                                                        <option value="{{ $c->id }}">{{ $c->name }}
                                                            ({{ $c->desc }})
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Judul</label>
                                                <input wire:model="title"
                                                    class="form-control @error('title') is-invalid @enderror"
                                                    type="text" placeholder="Masukan judul pertanyaan">
                                                @error('title')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Deskripsi</label>
                                                <textarea wire:model="desc" class="form-control @error('desc') is-invalid @enderror" rows="3"
                                                    placeholder="Deskripsikan pertanyaan disini"></textarea>
                                                @error('desc')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <hr class="horizontal dark">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
