@extends('layouts.master')
@section('title') Dashboard @endsection
@section('css')
<link href="{{ URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('build/libs/swiper/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css" />
<!-- Box Icons CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css" rel="stylesheet">

@endsection
@section('content')

<div class="row">
    <div class="col">
        <div class="h-100">
            <!-- Welcome Card -->
            <div class="welcome-card mb-4 animate-fadeInUp" style="--delay: 0">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <h2 class="welcome-title text-white">Selamat Pagi, {{ Auth::user()->role }} {{ Auth::user()->name }}</h2>
                        <p class="welcome-subtitle mb-0">Berikut adalah rangkuman informasi hari ini, {{ now()->format('d F Y') }}</p>
                    </div>
                    <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                        <button type="button" class="btn btn-light refresh-btn">
                            <i class="bx bx-refresh me-1"></i> Refresh Data
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Stats Summary Cards -->
            <div class="row stats-row g-3">
                <!-- Surat Diajukan -->
                <div class="col-xl-3 col-md-6 stat-item animate-fadeInUp" style="--delay: 1">
                    <div class="card card-dashboard h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h5 class="card-title">Surat Diajukan</h5>
                                <div class="dashboard-icon bg-info-subtle">
                                    <i class="bx bxs-inbox text-info"></i>
                                </div>
                            </div>
                            <h2 class="counter-value text-dark" data-target="{{ $totalDiajukan }}">0</h2>
                            <div class="d-flex align-items-center mt-3">
                                <span class="trend-indicator bg-info-subtle text-info">
                                    <i class="bx bx-trending-up"></i>
                                    <span>+12%</span>
                                </span>
                                <span class="text-muted fs-12 ms-2">Surat Yg Diajukan</span>
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('pengajuan-surat.status', ['status' => 'diajukan']) }}" class="btn btn-soft-info view-details d-flex align-items-center justify-content-center">
                                    <span>Lihat Detail</span>
                                    <i class="bx bx-right-arrow-alt ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Surat Diproses -->
                <div class="col-xl-3 col-md-6 stat-item animate-fadeInUp" style="--delay: 2">
                    <div class="card card-dashboard h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h5 class="card-title">Surat Diproses</h5>
                                <div class="dashboard-icon bg-warning-subtle">
                                    <i class="bx bx-loader-circle text-warning"></i>
                                </div>
                            </div>
                            <h2 class="counter-value text-dark" data-target="{{ $totalDiproses }}">0</h2>
                            <div class="d-flex align-items-center mt-3">
                                <span class="trend-indicator bg-warning-subtle text-warning">
                                    <i class="bx bx-time"></i>
                                    <span>Menunggu</span>
                                </span>
                                <span class="text-muted fs-12 ms-2">Menunggu Persetujuan</span>
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('pengajuan-surat.status', ['status' => 'diproses']) }}" class="btn btn-soft-warning view-details d-flex align-items-center justify-content-center">
                                    <span>Lihat Detail</span>
                                    <i class="bx bx-right-arrow-alt ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Surat Selesai -->
                <div class="col-xl-3 col-md-6 stat-item animate-fadeInUp" style="--delay: 3">
                    <div class="card card-dashboard h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h5 class="card-title">Surat Selesai</h5>
                                <div class="dashboard-icon bg-success-subtle">
                                    <i class="bx bx-check-double text-success"></i>
                                </div>
                            </div>
                            <h2 class="counter-value text-dark" data-target="{{ $totalSelesai }}">0</h2>
                            <div class="d-flex align-items-center mt-3">
                                <span class="trend-indicator bg-success-subtle text-success">
                                    <i class="bx bx-trending-up"></i>
                                    <span>+24%</span>
                                </span>
                                <span class="text-muted fs-12 ms-2">Surat Yg Selesai</span>
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('pengajuan-surat.status', ['status' => 'selesai']) }}" class="btn btn-soft-success view-details d-flex align-items-center justify-content-center">
                                    <span>Lihat Detail</span>
                                    <i class="bx bx-right-arrow-alt ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Surat Ditolak -->
                <div class="col-xl-3 col-md-6 stat-item animate-fadeInUp" style="--delay: 4">
                    <div class="card card-dashboard h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h5 class="card-title">Surat Ditolak</h5>
                                <div class="dashboard-icon bg-danger-subtle">
                                    <i class="bx bx-x-circle text-danger"></i>
                                </div>
                            </div>
                            <h2 class="counter-value text-dark" data-target="{{ $totalDitolak }}">0</h2>
                            <div class="d-flex align-items-center mt-3">
                                <span class="trend-indicator bg-danger-subtle text-danger">
                                    <i class="bx bx-trending-down"></i>
                                    <span>-5%</span>
                                </span>
                                <span class="text-muted fs-12 ms-2">Surat Yg Ditolak</span>
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('pengajuan-surat.status', ['status' => 'ditolak']) }}" class="btn btn-soft-danger view-details d-flex align-items-center justify-content-center">
                                    <span>Lihat Detail</span>
                                    <i class="bx bx-right-arrow-alt ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Info Cards -->
            <div class="row mt-4 g-3">

                <!-- Statistik Bulanan -->
                <div class="col-xl-4 col-md-12 stat-item animate-fadeInUp" style="--delay: 7">
                    <div class="card card-dashboard h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h5 class="card-title">Statistik Bulanan</h5>
                                <div class="dashboard-icon bg-purple-subtle" style="background-color: rgba(107, 70, 193, 0.1);">
                                    <i class="bx bxs-bar-chart-alt-2" style="color: #6b46c1;"></i>
                                </div>
                            </div>
                            
                            <!-- Monthly statistics chart -->
                            <div style="height: 190px;">
                                <div id="monthlyStatsChart" class="apex-charts" dir="ltr"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Jumlah Penduduk -->
                <div class="col-xl-4 col-md-6 stat-item animate-fadeInUp" style="--delay: 5">
                    <div class="card card-dashboard h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h5 class="card-title">Jumlah Penduduk</h5>
                                <div class="dashboard-icon bg-primary-subtle">
                                    <i class="bx bxs-group text-primary"></i>
                                </div>
                            </div>
                            <h2 class="counter-value text-dark" data-target="{{ $jumlahPenduduk }}">0</h2>
                            <div class="d-flex align-items-center mt-3">
                                <span class="trend-indicator bg-primary-subtle text-primary">
                                    <i class="bx bx-trending-up"></i>
                                    <span>+8%</span>
                                </span>
                                <span class="text-muted fs-12 ms-2">pertumbuhan penduduk</span>
                            </div>
                            
                            <!-- Population chart placeholder -->
                            <div class="mt-4" style="height: 80px;">
                                <div id="populationChart" class="apex-charts" dir="ltr"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Total Layanan Card with Progress -->
                <div class="col-xl-4 col-md-6 stat-item animate-fadeInUp" style="--delay: 6">
                    <div class="card card-dashboard h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h5 class="card-title">Total Layanan</h5>
                                <div class="dashboard-icon bg-secondary-subtle">
                                    <i class="bx bxs-file text-secondary"></i>
                                </div>
                            </div>
                            <h2 class="counter-value text-dark" data-target="15">0</h2>
                            <div class="d-flex align-items-center mt-3">
                                <span class="trend-indicator bg-secondary-subtle text-secondary">
                                    <i class="bx bx-sync"></i>
                                    <span>Aktif</span>
                                </span>
                                <span class="text-muted fs-12 ms-2">layanan tersedia</span>
                            </div>
                            
                            <!-- Service usage visualization -->
                            <div class="mt-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="fs-12 text-muted">Penggunaan Layanan</span>
                                    <span class="fs-12 fw-medium">75%</span>
                                </div>
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </div>
            
        </div>
    </div>
</div>

@endsection
@section('script')
<script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{ URL::asset('build/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/jsvectormap/maps/world-merc.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/dashboard-ecommerce.init.js') }}"></script>
<script src="{{ URL::asset('build/js/app.js') }}"></script>

<!-- Enhanced Counter script -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
    // Mendapatkan data statistik bulanan dari PHP
    var monthlyStats = @json($monthlyStats);
    // Mengekstrak data untuk chart
    var months = monthlyStats.map(function(item) { return item.bulan; });
    var diajukanData = monthlyStats.map(function(item) { return item.diajukan; });
    var diprosesData = monthlyStats.map(function(item) { return item.diproses; });
    var selesaiData = monthlyStats.map(function(item) { return item.selesai; });
    var ditolakData = monthlyStats.map(function(item) { return item.ditolak; });
    // Counter animation function
    function animateCounter() {
        document.querySelectorAll('.counter-value').forEach(function(counter) {
            const target = parseInt(counter.getAttribute('data-target'));
            const duration = 1500; // Animation duration in milliseconds
            const startTime = Date.now();
            const startValue = 0;
            function updateCounter() {
                const currentTime = Date.now();
                const elapsed = currentTime - startTime;
                if (elapsed < duration) {
                    const value = Math.floor(easeOutQuad(elapsed, startValue, target, duration));
                    counter.textContent = value.toLocaleString();
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.textContent = target.toLocaleString();
                }
            }
            function easeOutQuad(t, b, c, d) {
                t /= d;
                return -c * t * (t - 2) + b;
            }
            updateCounter();
        });
    }
    
    // Initialize monthly statistics chart
    if (document.getElementById("monthlyStatsChart")) {
        var monthlyStatsOptions = {
            series: [{
                name: "Diajukan",
                data: diajukanData,
                color: "#4b94ff" // light blue
            }, {
                name: "Diproses",
                data: diprosesData,
                color: "#ffbb33" // warning color
            }, {
                name: "Selesai",
                data: selesaiData,
                color: "#0ab39c" // success color
            }, {
                name: "Ditolak",
                data: ditolakData,
                color: "#f06548" // danger color
            }],
            chart: {
                type: "bar",
                height: 190,
                stacked: false,
                toolbar: {
                    show: false
                },
                zoom: {
                    enabled: false
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    borderRadius: 3,
                }
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: months,
                labels: {
                    style: {
                        fontSize: '10px'
                    }
                }
            },
            yaxis: {
                labels: {
                    formatter: function(value) {
                        return value.toFixed(0);
                    },
                    style: {
                        fontSize: '10px'
                    }
                }
            },
            legend: {
                position: 'bottom',
                offsetY: 0,
                fontSize: '10px',
                itemMargin: {
                    horizontal: 8,
                    vertical: 0
                }
            },
            tooltip: {
                y: {
                    formatter: function(value) {
                        return value + " dokumen";
                    }
                }
            }
        };
        
        var monthlyStatsChart = new ApexCharts(
            document.getElementById("monthlyStatsChart"),
            monthlyStatsOptions
        );
        monthlyStatsChart.render();
    }
    
    // Initialize population chart if it exists
    if (document.getElementById("populationChart")) {
        // Generate data for 12 months with slight growth
        var populationData = [];
        var base = @json($jumlahPenduduk) * 0.9; // Start at 90% of current
        for (var i = 0; i < 12; i++) {
            populationData.push(Math.round(base + (base * i * 0.01))); // Grow by 1% per month
        }
        
        var populationOptions = {
            series: [{
                name: "Penduduk",
                data: populationData.slice(-6), // Last 6 months
                color: "#405189"
            }],
            chart: {
                type: "area",
                height: 80,
                sparkline: {
                    enabled: true
                },
                toolbar: {
                    show: false
                }
            },
            stroke: {
                curve: 'smooth',
                width: 2
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.6,
                    opacityTo: 0.1,
                }
            },
            tooltip: {
                fixed: {
                    enabled: false
                },
                x: {
                    show: false
                },
                y: {
                    title: {
                        formatter: function() {
                            return "Penduduk: ";
                        }
                    },
                    formatter: function(value) {
                        return value.toLocaleString();
                    }
                },
                marker: {
                    show: false
                }
            }
        };
        
        var populationChart = new ApexCharts(
            document.getElementById("populationChart"),
            populationOptions
        );
        populationChart.render();
    }
    
    // Initialize counter animation
    animateCounter();
    
    // Initialize refresh button functionality
    document.querySelector('.refresh-btn').addEventListener('click', function() {
        // Add spinner effect to button
        this.innerHTML = '<i class="bx bx-loader-alt bx-spin me-1"></i> Memuat...';
        
        // Simulate data refresh (reload the page after a short delay)
        setTimeout(() => {
            window.location.reload();
        }, 1000);
    });
});
</script>
@endsection