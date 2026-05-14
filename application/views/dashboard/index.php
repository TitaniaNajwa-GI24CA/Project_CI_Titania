<h2 class="dashboard-title" id="preview">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    Dashboard
</h2>

<div class="row" id="preview">

    <!-- TOTAL BUKU -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card dashboard-card buku-card border-0 h-100">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <div class="text-label">
                        Total Buku
                    </div>

                    <div class="dashboard-value">
                        <?= $total_buku; ?>
                    </div>

                    <small>
                        Jumlah seluruh buku
                    </small>
                </div>
                <div class="icon-circle">
                    <i class="fas fa-book-open text-white"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- TOTAL KATEGORI -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card dashboard-card kategori-card border-0 h-100">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <div class="text-label">
                        Total Kategori
                    </div>
                    <div class="dashboard-value">
                        <?= $total_kategori; ?>
                    </div>
                    <small>
                        Jumlah kategori buku
                    </small>
                </div>
                <div class="icon-circle">
                    <i class="fas fa-tags text-white"></i>
                </div>
            </div>
        </div>
    </div>

     <!-- DASHBOARD -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card dashboard-card admin-card border-0 h-100">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <div class="text-label">
                        Dashboard
                    </div>
                    <div class="dashboard-text">
                        Sistem Perpustakaan
                    </div>
                    <small>
                        Selamat datang Admin
                    </small>
                </div>
                <div class="icon-circle">
                    <i class="fas fa-user-shield text-white"></i>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- GRAFIK -->
<div class="row">

    <div class="col-lg-9 mx-auto">

        <div class="card dashboard-card chart-card mb-4">

            <div class="card-header chart-header border-0">

                <h6 class="m-0 text-white">
                    Statistik Dashboard
                </h6>

            </div>

            <div class="card-body">

                <div style="height: 320px;">
                    <canvas id="chartDashboard"></canvas>
                </div>

            </div>

        </div>

    </div>

</div>



<!-- CHART JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('chartDashboard');

new Chart(ctx, {

    type: 'bar',

    data: {

        labels: ['Buku', 'Kategori'],

        datasets: [{

            label: 'Total Data',

            data: [
                <?= $total_buku; ?>,
                <?= $total_kategori; ?>
            ],

            backgroundColor: [
                '#3175b9cb',
            ],

            borderColor: [
                 '#3175b9cb',
            ],

            borderWidth: 2,

            borderRadius: 12,

            barThickness: 55

        }]

    },

    options: {

        responsive: true,
        maintainAspectRatio: false,

        plugins: {

            legend: {
                display: false
            }

        },

        scales: {

            y: {

                beginAtZero: true,

                grid: {
                    color: 'rgba(0,0,0,0.05)'
                },

                ticks: {
                    stepSize: 1
                }

            },

            x: {

                grid: {
                    display: false
                }

            }

        },

        animation: {

            duration: 1800,
            easing: 'easeOutQuart'

        }

    }

});

</script>



<!-- CSS -->
<style>

/* =========================
   BACKGROUND
========================= */

body{
    background: #f4f7fb;
}


/* =========================
   TITLE
========================= */

.dashboard-title{
    color: #1e3a5f;
    font-weight: 700;
    margin-bottom: 18px !important;
}


/* =========================
   CARD
========================= */

.dashboard-card{
    border-radius: 18px;
    overflow: hidden;
    transition: 0.3s;
    border: 1px solid rgba(255,255,255,0.2);
}


.dashboard-card:hover{

    transform: translateY(-5px);
    box-shadow:
        0 10px 25px rgba(20,40,90,0.08);

}


/* =========================
   GRADIENT CARD
========================= */

.buku-card{
    background: linear-gradient(
        180deg,
        #1e3a5f 0%,
        #5a89c4 100%
    );
}

.kategori-card{
    background: linear-gradient(
        180deg,
        #29486f 0%,
        #78a6de 100%
    );
}

.admin-card{
    background: linear-gradient(
        180deg,
        #35557d 0%,
        #8ab5ea 100%
    );
}


/* =========================
   TEXT
========================= */

.text-label{
    font-size: 13px;
    font-weight: 600;
    letter-spacing: 1px;

    text-transform: uppercase;

    color: rgba(255,255,255,0.8);

    margin-bottom: 8px;
}

.dashboard-value{
    font-size: 34px;
    font-weight: 700;
    color: white;
}

.dashboard-text{
    font-size: 22px;
    font-weight: 700;
    color: white;
}

small{
    color: rgba(255,255,255,0.8);
}


/* =========================
   ICON
========================= */

.icon-circle{

    width: 62px;
    height: 62px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(255,255,255,0.18);
    backdrop-filter: blur(5px);
    font-size: 22px;
    box-shadow:
        inset 0 1px 2px rgba(255,255,255,0.15);
}

#preview{
    padding: 30px !important;
    transform: translateY(-50px);
}
.container-fluid{
    padding-left: 28px !important;
    padding-right: 28px !important;
}


/* =========================
   CONTAINER GRAFIK
========================= */

.chart-card{

    background: linear-gradient(
        180deg,
        #1e3a5f 0%,
        #5a89c4 100%
    ) !important;
    border-radius: 22px;
    overflow: hidden;
    padding: 0;
    border: none;
    box-shadow:
        0 10px 25px rgba(20,40,90,0.10);
}


/* HEADER GRAFIK */

.chart-header{
    background: transparent !important;
    padding: 24px 28px 10px 28px !important;
}


/* TITLE */

.chart-header h6{
    font-size: 17px;
    font-weight: 700;
    letter-spacing: 0.5px;
}


/* BODY GRAFIK */

.chart-card .card-body{
    background: white;
    margin: 0 18px 18px 18px;
    border-radius: 18px;
    padding: 25px;
    box-shadow:
        inset 0 1px 2px rgba(0,0,0,0.03);
}

