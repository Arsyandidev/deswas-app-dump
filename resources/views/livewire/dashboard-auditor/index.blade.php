@push('css')
    <!-- Styles -->
    <style>
        #chartdiv {
            width: 100%;
            height: 500px;
        }
    </style>
@endpush
<div>
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <aside
        class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
        id="sidenav-main">
        <x-sidebar-auditor></x-sidebar-auditor>
    </aside>
    <main class="main-content position-relative border-radius-lg ">
        <x-admin-nav></x-admin-nav>
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Status Pengajuan</p>
                                        <h1 class="font-weight-bolder">
                                        </h1>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                        <i class="ni ni-bold-right text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Status Telaah</p>
                                        <h1 class="font-weight-bolder">
                                        </h1>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                        <i class="ni ni-send text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Status Tanggapan</p>
                                        <h1 class="font-weight-bolder">
                                        </h1>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                        <i class="ni ni-chat-round text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Status Selesai</p>
                                        <h1 class="font-weight-bolder">
                                        </h1>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                        <i class="ni ni-check-bold text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <div class="card mb-3">
                        <div class="card-body p-3">
                            <div id="chartdiv"></div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-4">
                </div>
            </div>
        </div>
    </main>
</div>


@push('js')
    <script>
        // Create chart instancev
        var chart = am4core.create("chartdiv", am4charts.PieChart);
        // var values = @json_encode($value[0]);\
        // var data = <?php echo json_encode($value[0]); ?>

        // Add data
        chart.data = [{
            "resiko": "Tinggi",
            "data": 50,
            "color": am4core.color("#ED1C24")
        }, {
            "resiko": "Rendah",
            "data": 60,
            "color": am4core.color("#235789")
        }];

        // Add and configure Series
        var pieSeries = chart.series.push(new am4charts.PieSeries());
        pieSeries.dataFields.value = "data";
        pieSeries.dataFields.category = "resiko";
        pieSeries.slices.template.propertyFields.fill = "color";

        chart.legend = new am4charts.Legend();
    </script>
@endpush
