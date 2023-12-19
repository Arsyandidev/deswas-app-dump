@push('css')
    <style>
        .tracking-detail {
            padding: 3rem 0
        }

        #tracking {
            margin-bottom: 1rem
        }

        [class*=tracking-status-] p {
            margin: 0;
            font-size: 1.1rem;
            color: #fff;
            text-transform: uppercase;
            text-align: center
        }

        [class*=tracking-status-] {
            padding: 1.6rem 0
        }

        .tracking-status-intransit {
            background-color: #65aee0
        }

        .tracking-status-outfordelivery {
            background-color: #f5a551
        }

        .tracking-status-deliveryoffice {
            background-color: #f7dc6f
        }

        .tracking-status-delivered {
            background-color: #4cbb87
        }

        .tracking-status-attemptfail {
            background-color: #b789c7
        }

        .tracking-status-error,
        .tracking-status-exception {
            background-color: #d26759
        }

        .tracking-status-expired {
            background-color: #616e7d
        }

        .tracking-status-pending {
            background-color: #ccc
        }

        .tracking-status-inforeceived {
            background-color: #214977
        }

        /* .tracking-list {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            border: 1px solid #e5e5e5
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        } */

        .tracking-item {
            border-left: 1px solid #e5e5e5;
            position: relative;
            padding: 2rem 1.5rem .5rem 2.5rem;
            font-size: .9rem;
            margin-left: 3rem;
            min-height: 5rem
        }

        .tracking-item:last-child {
            padding-bottom: 4rem
        }

        .tracking-item .tracking-date {
            margin-bottom: .5rem
        }

        .tracking-item .tracking-date span {
            color: #888;
            font-size: 85%;
            padding-left: .4rem
        }

        .tracking-item .tracking-content {
            padding: .5rem .8rem;
            background-color: #f4f4f4;
            border-radius: .5rem
        }

        .tracking-item .tracking-content span {
            display: block;
            color: #888;
            font-size: 85%
        }

        .tracking-item .tracking-icon {
            line-height: 2.6rem;
            position: absolute;
            left: -1.3rem;
            width: 2.6rem;
            height: 2.6rem;
            text-align: center;
            border-radius: 50%;
            font-size: 1.1rem;
            background-color: #fff;
            color: #fff
        }

        .tracking-item .tracking-icon.status-sponsored {
            background-color: #f68
        }

        .tracking-item .tracking-icon.status-delivered {
            background-color: #4cbb87
        }

        .tracking-item .tracking-icon.status-outfordelivery {
            background-color: #f5a551
        }

        .tracking-item .tracking-icon.status-deliveryoffice {
            background-color: #f7dc6f
        }

        .tracking-item .tracking-icon.status-attemptfail {
            background-color: #b789c7
        }

        .tracking-item .tracking-icon.status-exception {
            background-color: #d26759
        }

        .tracking-item .tracking-icon.status-inforeceived {
            background-color: #214977
        }

        .tracking-item .tracking-icon.status-intransit {
            color: #e5e5e5;
            border: 1px solid #e5e5e5;
            font-size: .6rem
        }

        @media(min-width:992px) {
            .tracking-item {
                margin-left: 10rem
            }

            .tracking-item .tracking-date {
                position: absolute;
                left: -10rem;
                width: 7.5rem;
                text-align: right
            }

            .tracking-item .tracking-date span {
                display: block
            }

            .tracking-item .tracking-content {
                padding: 0;
                background-color: transparent
            }
        }
    </style>
@endpush
<div>
    <div class="position-absolute w-100 min-height-300 top-0"
        style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'); background-position-y: 50%;">
        <span class="mask bg-primary opacity-6"></span>
    </div>
    <main class="main-content position-relative border-radius-lg ">
        <x-navbar></x-navbar>

        <div class="card shadow-lg mx-4 card-profile-bottom">
            <div class="card-body p-3">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="/assets/img/team-1.jpg" alt="profile_image"
                                class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{ Auth::user()->name }}
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($ticket as $t)
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <hr class="horizontal dark">
                                <p class="text-uppercase text-sm">Detil Tiket</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <p class="h3 text-center">{{ $t->judul }}
                                                @if ($t->setuju != 1)
                                                    <button class="btn btn-sm btn-primary mx-3" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal">Ubah</button>
                                                @endif
                                            </p>
                                            <!-- Modal Ubah Judul -->
                                            <div class="modal" id="exampleModal" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modal
                                                                title
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form wire:submit="ubahJudulForm({{ $t->id }})">
                                                            <div class="modal-body">
                                                                <input wire:model="ubahJudul" class="form-control"
                                                                    type="text">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn bg-gradient-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button class="btn bg-gradient-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="lead mx-3">{{ $t->deskripsi }}</p>
                                            <div class="row mt-5">
                                                @foreach ($file as $f)
                                                    <div class="col-sm-12">
                                                        @if ($f->image)
                                                            <a class=" mx-5 btn  btn-outline-primary"
                                                                href="{{ asset('storage/' . $f->image) }}"
                                                                target="_blank">
                                                                <span class="btn-inner--icon"><i
                                                                        class="ni ni-album-2"></i></span>
                                                                <span class="mx-1">{{ $f->image }}</span>
                                                            </a>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-12">
                                                        @if ($f->file)
                                                            <a class=" mx-5 btn  btn-outline-danger"
                                                                href="{{ asset('storage/' . $f->file) }}"
                                                                target="_blank">
                                                                <span class="btn-inner--icon"><i
                                                                        class="ni ni-album-2"></i></span>
                                                                <span class="mx-1">{{ $f->file }}</span>
                                                            </a>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="horizontal dark">
                                <p class="text-uppercase text-sm">Jawaban</p>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            @if (!empty($t->resiko))
                                                @foreach ($chat as $c)
                                                    @if ($c->chat == null)
                                                        <form wire:submit.prevent="chat({{ $t->id }})">
                                                            <textarea class="form-control" wire:model="getChat"></textarea>
                                                            <button class="btn btn-primary my-3 btn-lg w-100"
                                                                type="submit">Kirim</button>
                                                        </form>
                                                    @endif

                                                    @if ($c->chat != null && $t->setuju == 0)
                                                        <div class="alert alert-light" role="alert">
                                                            {{ $c->chat }}
                                                        </div>
                                                        <div class="alert alert-warning text-white text-center"
                                                            role="alert">
                                                            <strong>Perhatian!</strong> Menunggu persetujuan dari
                                                            Inspektur.
                                                        </div>
                                                    @elseif ($c->chat != null && $t->setuju == 1)
                                                        <div class="alert alert-light" role="alert">
                                                            {{ $c->chat }}
                                                        </div>
                                                        <div class="alert alert-success text-white text-center"
                                                            role="alert">
                                                            <strong>Success!</strong> Tiket selesai
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @else
                                                <div class="alert alert-info text-white text-center" role="alert">
                                                    <strong>Kosong!</strong> Belum ada jawaban dari Auditor.
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 mb-4">
                            <div class="card-header pb-0 px-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="mb-0">Tiket Transaksi</h6>
                                    </div>
                                    <div class="col-md-6 d-flex justify-content-end align-items-center">
                                        <i class="far fa-calendar-alt me-2"></i>
                                        <small>23 - 30 March 2020</small>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-4 p-3">
                                <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Informasi</h6>
                                <ul class="list-group">
                                    <li
                                        class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                        <div class="d-flex align-items-center">
                                            <button
                                                class="btn btn-icon-only btn-rounded btn-outline-info mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                                    class="fab fa-buromobelexperte	"></i></button>
                                            <div class="d-flex flex-column">
                                                <h6 class="mb-1 text-dark text-sm">Kategori</h6>
                                                <span class="text-xs">{{ $t->get_kategori->name }}
                                                    ({{ $t->get_kategori->deskripsi }})
                                                </span>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                                <h6 class="text-uppercase text-body text-xs font-weight-bolder my-3">Linimasa</h6>
                                <ul class="list-group">
                                    <li
                                        class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                        <div class="d-flex align-items-center">
                                            <button
                                                class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                                    class="fas fa-arrow-up"></i></button>
                                            <div class="d-flex flex-column">
                                                @foreach ($user as $u)
                                                    <h6 class="mb-1 text-dark text-sm">{{ $u->user->name }}</h6>
                                                @endforeach
                                                <span class="text-xs">{{ $t->pengajuan }}</span>
                                            </div>
                                        </div>
                                        <div
                                            class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                            Pengajuan
                                        </div>
                                    </li>
                                    @if ($t->telaah != null)
                                        <li
                                            class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                            <div class="d-flex align-items-center">
                                                <button
                                                    class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                                        class="fas fa-arrow-up"></i></button>
                                                <div class="d-flex flex-column">
                                                    @foreach ($telaahName as $tn)
                                                        <h6 class="mb-1 text-dark text-sm">{{ $tn->name }}</h6>
                                                    @endforeach
                                                    <span class="text-xs">{{ $t->telaah }}</span>
                                                </div>
                                            </div>
                                            <div
                                                class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                                Telaah
                                            </div>
                                        </li>
                                    @endif
                                    @if ($t->jawaban != null)
                                        <li
                                            class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                            <div class="d-flex align-items-center">
                                                <button
                                                    class="btn btn-icon-only btn-rounded btn-outline-warning mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                                        class="fas fa-exclamation"></i></button>
                                                <div class="d-flex flex-column">
                                                    <span class="text-xs">Pertanyaan sudah di Jawab, menunggu
                                                        persetujuan dari Inspektur</span>
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                    @if ($t->jawaban != null && $t->setuju == 1)
                                        <li
                                            class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                            <div class="d-flex align-items-center">
                                                <button
                                                    class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                                        class="fas fa-arrow-up"></i></button>
                                                <div class="d-flex flex-column">
                                                    <h6 class="mb-1 text-dark text-sm">Tim Deswas</h6>
                                                    <span class="text-xs">{{ $t->jawaban }}</span>
                                                </div>
                                            </div>
                                            <div
                                                class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                                Jawaban
                                            </div>
                                        </li>
                                    @endif
                                </ul>
                                <hr class="horizontal dark">
                                @if (Auth::user() && Auth::user()->role_id == 3)
                                    @if ($t->telaah == null)
                                        <form action="">
                                            <label for="exampleFormControlSelect1">Ubah Kategori</label>
                                            <select class="form-control mb-2" wire:model="ubahKategori">
                                                @foreach ($category as $ct)
                                                    <option value="{{ $ct->id }}"
                                                        {{ $ct->id == $t->kategori ? 'selected' : '' }}>
                                                        {{ $ct->name }}
                                                        ({{ $ct->deskripsi }})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </form>
                                        <button wire:click.prevent="telaah({{ $t->id }})"
                                            class="btn btn-primary btn-lg w-100">Telaah</button>
                                    @endif

                                    @if ($t->telaah != null && $t->resiko == null)
                                        <button wire:click.prevent="secondLayer({{ $t->id }})"
                                            class="btn btn-danger btn-lg w-100">Layer 2 > (Tinggi)</button>
                                        <button wire:click.prevent="firstLayer({{ $t->id }})"
                                            class="btn btn-info btn-lg w-100">Layer 1 > (Rendah)</button>
                                    @endif

                                    @if ($t->telaah != null && $t->setuju == 0)
                                        <div class="alert alert-secondary text-white text-center role="alert">
                                            Tiket dalam Proses
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
</div>
</main>
