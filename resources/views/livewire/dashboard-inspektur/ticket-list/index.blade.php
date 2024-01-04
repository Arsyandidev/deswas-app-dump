<div>
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <aside
        class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
        id="sidenav-main">
        <x-sidebar-auditor></x-sidebar-auditor>
    </aside>
    <main class="main-content position-relative border-radius-lg ">
        <x-admin-nav></x-admin-nav>

        <div class="container-fluid py-1">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Daftar Pertanyaan</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Pertanyaan</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Status</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (Auth::user() && Auth::user()->layers == 1)
                                            @forelse ($ticketLayer1 as $t)
                                                <tr>
                                                    <td style="text-wrap: wrap">
                                                        <div class="mx-3">
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm">{{ $t->judul }}</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th class="bg-gradient-primary text-white">Pengajuan
                                                                    </th>
                                                                    <th class="bg-gradient-warning text-white">Telaah
                                                                    </th>
                                                                    <th class="bg-gradient-secondary text-white">
                                                                        Kategori
                                                                        Resiko
                                                                    </th>
                                                                    <th class="bg-gradient-info text-white">Tanggapan
                                                                    </th>
                                                                    <th class="bg-gradient-success text-white">Selesai
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>{{ $t->pengajuan }}</td>
                                                                    <td>{{ $t->telaah ?? 'Belum di telaah' }}</td>
                                                                    <td>
                                                                        <div class="d-flex justify-content-center">
                                                                            @if (!$t->resiko)
                                                                                <span
                                                                                    class="badge badge-sm bg-gradient-primary">Belum
                                                                                    Diketahui</span>
                                                                            @elseif ($t->resiko == 'Rendah')
                                                                                <span
                                                                                    class="badge badge-sm bg-gradient-success">{{ $t->resiko }}</span>
                                                                            @elseif ($t->resiko == 'Tinggi')
                                                                                <span
                                                                                    class="badge badge-sm bg-gradient-danger">{{ $t->resiko }}</span>
                                                                            @endif
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        {{ $t->jawaban ?? 'Belum di tanggapi' }}

                                                                    </td>
                                                                    <td>{{ $t->selesai ?? 'Tiket belum selesai' }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td class="align-middle">
                                                        <a href="{{ route('dashboard.inspektur.detail', $t->id) }}"
                                                            class="btn btn-sm text-secondary font-weight-bold text-md"
                                                            data-toggle="tooltip" data-original-title="Edit user">
                                                            Detail
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <div class="container">
                                                    <div class="alert alert-warning text-white text-center"
                                                        role="alert">
                                                        <strong>Kosong!</strong> Tiket pertanyaan belum dibuat.
                                                    </div>
                                                </div>
                                            @endforelse
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <hr class="horizontal dark">
                            {{ $ticketLayer1->links('components.pagination-links') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
