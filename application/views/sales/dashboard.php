<div class="dashboard-content">

    <div class="card-grid">

        <div class="stat-card">
            <div class="stat-icon orange">
                <i class="fa-solid fa-laptop"></i>
            </div>
            <div>
                <p>Total Produk</p>
                <h3><?= $total_produk; ?></h3>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon brown">
                <i class="fa-solid fa-users"></i>
            </div>
            <div>
                <p>Total Pelanggan</p>
                <h3><?= $total_pelanggan; ?></h3>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon cream">
                <i class="fa-solid fa-cart-shopping"></i>
            </div>
            <div>
                <p>Total Order</p>
                <h3><?= $total_order; ?></h3>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon soft">
                <i class="fa-solid fa-money-bill-wave"></i>
            </div>
            <div>
                <p>Total Pendapatan</p>
                <h3>Rp <?= number_format($total_pendapatan, 0, ',', '.'); ?></h3>
            </div>
        </div>

    </div>

    <div class="chart-grid">

        <div class="chart-card">
            <div class="chart-header">
                <div>
                    <h4>Grafik Pendapatan</h4>
                    <p>Ringkasan pendapatan berdasarkan bulan</p>
                </div>
                <i class="fa-solid fa-chart-line"></i>
            </div>

            <canvas id="lineChart"></canvas>
        </div>

        <div class="chart-card">
            <div class="chart-header">
                <div>
                    <h4>Kategori Produk Terjual</h4>
                    <p>Persentase produk berdasarkan kategori</p>
                </div>
                <i class="fa-solid fa-chart-pie"></i>
            </div>

            <canvas id="pieChart"></canvas>
        </div>

    </div>

</div>

<script>
const bulan = <?= json_encode(array_column($grafik_pendapatan, 'bulan')); ?>;
const pendapatan = <?= json_encode(array_column($grafik_pendapatan, 'total')); ?>;

new Chart(document.getElementById('lineChart'), {
    type: 'line',
    data: {
        labels: bulan,
        datasets: [{
            label: 'Pendapatan',
            data: pendapatan,
            borderColor: '#c2410c',
            backgroundColor: 'rgba(251, 146, 60, 0.18)',
            borderWidth: 3,
            tension: 0.4,
            fill: true,
            pointBackgroundColor: '#c2410c',
            pointBorderColor: '#fff',
            pointRadius: 5
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});

const kategori = <?= json_encode(array_column($kategori_terjual, 'nama_kategori')); ?>;
const totalKategori = <?= json_encode(array_column($kategori_terjual, 'total_terjual')); ?>;

new Chart(document.getElementById('pieChart'), {
    type: 'doughnut',
    data: {
        labels: kategori,
        datasets: [{
            data: totalKategori,
            backgroundColor: [
                '#fb923c',
                '#c2410c',
                '#fed7aa',
                '#f97316',
                '#7c2d12'
            ],
            borderColor: '#fffaf5',
            borderWidth: 3
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});
</script>