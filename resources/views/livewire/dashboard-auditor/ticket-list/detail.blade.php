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

        .tracking-list {
            border: 1px solid #e5e5e5
        }

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
                            <p class="mb-0 font-weight-bold text-sm">
                                Public Relations
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                        <div class="nav-wrapper position-relative end-0">
                            <ul class="nav nav-pills nav-fill p-1" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 active d-flex align-items-center justify-content-center "
                                        data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                                        <i class="ni ni-app"></i>
                                        <span class="ms-2">App</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center "
                                        data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                        <i class="ni ni-email-83"></i>
                                        <span class="ms-2">Messages</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center "
                                        data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                        <i class="ni ni-settings-gear-65"></i>
                                        <span class="ms-2">Settings</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid py-4">
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <p class="text-uppercase text-sm">Tiket Informasi</p>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <p class="h6">Kategori Tiket: lorem</p>
                                            <p class="h6">Tingkat Kesulitan: Rendah</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Tanggal dan
                                                Waktu</label>
                                            <p class="h6">{{ $ticket->created_at }}</p>
                                        </div>
                                    </div>
                                </div>

                                <hr class="horizontal dark">
                                <p class="text-uppercase text-sm">Detil Tiket</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <p class="h3 text-center">{{ $ticket->title }}</p>
                                            <p class="lead mx-3">{{ $ticket->desc }}</p>
                                        </div>
                                    </div>
                                </div>
                                <hr class="horizontal dark">
                                <p class="text-uppercase text-sm">Jawaban</p>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            @if (!empty($ticket->risk))
                                                @foreach ($chat as $c)
                                                    @if ($c->chat == null)
                                                        <form wire:submit.prevent="chat({{ $ticket->id }})">
                                                            <textarea class="form-control" wire:model="getChat"></textarea>
                                                            <button type="submit">Kirim</button>
                                                        </form>
                                                    @else
                                                        <div class="alert alert-light" role="alert">
                                                            {{ $c->chat }}
                                                        </div>
                                                        <div class="alert alert-warning text-white text-center"
                                                            role="alert">
                                                            <strong>Perhatian!</strong> Harus menunggu persetujuan dari
                                                            Inspektur.
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @else
                                                <div class="alert alert-info text-white" role="alert">
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
                        <div class="card">
                            <div class="card-body">
                                <div id="tracking">
                                    <p class="h3 text-center">Tiket Histori</p>
                                    <div class="tracking-list">
                                        @if ($ticket->submission)
                                            <div class="tracking-item">
                                                <div class="tracking-icon status-intransit">
                                                    <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true"
                                                        data-prefix="fas" data-icon="circle" role="img"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                        data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z">
                                                        </path>
                                                    </svg>
                                                    <!-- <i class="fas fa-circle"></i> -->
                                                </div>
                                                <div class="tracking-date">Aug 10, 2018<span>05:01 PM</span></div>
                                                <div class="tracking-content">
                                                    <p class="h6">Pengajuan</p>
                                                    <p>{{ $user->user->name }}</p>
                                                </div>
                                            </div>
                                        @endif

                                        @if ($ticket->research)
                                            <div class="tracking-item">
                                                <div class="tracking-icon status-intransit">
                                                    <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true"
                                                        data-prefix="fas" data-icon="circle" role="img"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                        data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z">
                                                        </path>
                                                    </svg>
                                                    <!-- <i class="fas fa-circle"></i> -->
                                                </div>
                                                <div class="tracking-date">Aug 10, 2018<span>05:01 PM</span></div>
                                                <div class="tracking-content">
                                                    <p class="h6">Telaah</p>
                                                    <p>{{ $research ?? '-' }}</p>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <div class="card-footer">
                                @if (Auth::user() && Auth::user()->role_id == 3)
                                    @if ($ticket->research == null)
                                        <button wire:click.prevent="telaah({{ $ticket->id }})"
                                            class="btn btn-primary btn-lg w-100">Telaah</button>
                                    @endif

                                    @if ($ticket->research == !null)
                                        <button wire:click.prevent="secondLayer({{ $ticket->id }})"
                                            class="btn btn-danger btn-lg w-100">Layer 2 > (Tinggi)</button>
                                        <button wire:click.prevent="firstLayer({{ $ticket->id }})"
                                            class="btn btn-info btn-lg w-100">Layer 1 > (Rendah)</button>
                                    @endif

                                    @if ($ticket->risk != null)
                                        <p class="h6 text-center">Tiket dalamProses</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
