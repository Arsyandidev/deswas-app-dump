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
                                <p class="text-uppercase text-sm">Isi Tiket</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <p class="h3 text-center">{{ $t->judul }}</p>
                                            <p class="lead mx-5">{{ $t->deskripsi }}</p>
                                        </div>
                                    </div>
                                </div>
                                <hr class="horizontal dark">
                                <p class="text-uppercase text-sm">Jawaban</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            @if ($t->jawaban == null)
                                                <div class="alert alert-info text-white text-center" role="alert">
                                                    <strong>Kosong!</strong> Belum ada jawaban dari Auditor.
                                                </div>
                                            @endif
                                            @if ($t->jawaban != null && $t->setuju == 0)
                                                <div class="alert alert-warning text-white text-center" role="alert">
                                                    <strong>Perhatian!</strong> Pertanyaan sudah di tanggapi. <br>
                                                    Menunggu persetujuan dari Inspektur.
                                                </div>
                                            @endif
                                            @if ($t->jawaban != null && $t->setuju == 1)
                                                @foreach ($chat as $c)
                                                    <div class="alert alert-light" role="alert">
                                                        {{ $c->chat }}
                                                    </div>
                                                @endforeach
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
                                                <span class="text-xs">{{ $t->kategori->name }}
                                                    ({{ $t->kategori->deskripsi }})
                                                </span>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                                <hr class="horizontal dark">
                                <h6 class="text-uppercase text-body text-xs font-weight-bolder my-3">Linimasa</h6>
                                <ul class="list-group">
                                    <li
                                        class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                        <div class="d-flex align-items-center">
                                            <button
                                                class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                                    class="fas fa-arrow-up"></i></button>
                                            <div class="d-flex flex-column">
                                                <h6 class="mb-1 text-dark text-sm">{{ $user->user->name }}</h6>
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
                                                    <h6 class="mb-1 text-dark text-sm">Tim Deswas</h6>
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
                                                    <h6 class="mb-1 text-dark text-sm">Tim Deswas</h6>
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
                                @if ($t->setuju == 0)
                                    <div class="alert alert-secondary text-white text-center role="alert">
                                        Tiket dalam Proses
                                    </div>
                                @endif
                                @if ($t->setuju == 1)
                                    <div class="container ">
                                        <center>
                                            <button type="button" class="btn btn-primary btn-sm">Pertanyaan
                                                Baru</button>
                                            <button type="button" class="btn bg-gradient-info btn-sm">Pertanyaan
                                                Terkait</button>
                                            <button type="button"
                                                class="btn bg-gradient-success btn-sm w-95">Selesai</button>
                                        </center>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </main>
