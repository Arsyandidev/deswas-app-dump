<div>
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <aside
        class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
        id="sidenav-main">
        <x-sidebar></x-sidebar>
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
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Tingkat Kesulitan</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Status</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ticket as $t)
                                            <tr>
                                                <td>
                                                    <div class="mx-3">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $t->title }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge badge-sm bg-gradient-success">Rendah</span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th class="bg-gradient-primary text-white">Pengajuan
                                                                </th>
                                                                <th class="bg-gradient-warning text-white">Telaah</th>
                                                                <th class="bg-gradient-info text-white">Tanggapan</th>
                                                                <th class="bg-gradient-success text-white">Selesai</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>{{ $t->submission }}</td>
                                                                <td>{{ $t->research ?? 'Belum di telaah' }}</td>
                                                                <td>{{ $t->response ?? 'Belum di tanggapi' }}</td>
                                                                <td>{{ $t->finished ?? 'Tiket belum selesai' }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="/dashboard/ticket-list/detail/{{ $t->id }}"
                                                        wire:navigate
                                                        class="btn btn-sm text-secondary font-weight-bold text-md"
                                                        data-toggle="tooltip" data-original-title="Edit user">
                                                        Detail
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
