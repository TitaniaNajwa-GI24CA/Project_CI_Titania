<div class="dashboard-content">
    <div class="card-grid">
        <div class="stat-card">
            <div class="stat-icon orange">
                <i class="fa-solid fa-file-invoice"></i>
            </div>
            <div>
                <p>Total Order Saya</p>
                <h3><?= $total_order; ?></h3>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon brown">
                <i class="fa-solid fa-money-bill-wave"></i>
            </div>
            <div>
                <p>Total Penjualan Saya</p>
                <h3>
                    Rp <?= number_format($total_penjualan,0,',','.'); ?>
                </h3>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon cream">
                <i class="fa-solid fa-users"></i>
            </div>
            <div>
                <p>Pelanggan Saya</p>
                <h3><?= $total_pelanggan; ?></h3>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon soft">
                <i class="fa-solid fa-box"></i>
            </div>
            <div>
                <p>Produk Terjual</p>
                <h3><?= $total_produk_terjual; ?></h3>
            </div>
        </div>

    </div>

    <div class="chart-grid">

        <div class="chart-card">

            <div class="chart-header">
                <div>
                    <h4>Grafik Penjualan Saya</h4>
                    <p>Ringkasan penjualan berdasarkan bulan</p>
                </div>

                <i class="fa-solid fa-chart-line"></i>
            </div>

            <canvas id="lineChart"></canvas>

        </div>

        <div class="chart-card">

            <div class="chart-header">
                <div>
                    <h4>Produk Terlaris Saya</h4>
                    <p>Top 5 produk yang paling banyak terjual</p>
                </div>

                <i class="fa-solid fa-trophy"></i>
            </div>

            <canvas id="barChart"></canvas>
        </div>
    </div>
</div>


<script>
    const bulan =
    <?= json_encode(
        array_column(
            $grafik_penjualan,
            'bulan'
        )
    ); ?>;

    const total =
    <?= json_encode(
        array_column(
            $grafik_penjualan,
            'total'
        )
    ); ?>;

    new Chart(
    document.getElementById('lineChart'),
    {
        type:'line',

        data:{
            labels:bulan,

            datasets:[{
                label:'Penjualan',

                data:total,

                borderColor:'#c2410c',

                backgroundColor:
                'rgba(251,146,60,.15)',

                fill:true,

                tension:.4,

                borderWidth:3,

                pointRadius:5,

                pointBackgroundColor:'#c2410c'
            }]
        },

        options:{
            responsive:true,
            maintainAspectRatio:false
        }
    });

    const produk =
    <?= json_encode(
        array_column(
            $produk_terlaris,
            'nama_produk'
        )
    ); ?>;

    const qty =
    <?= json_encode(
        array_column(
            $produk_terlaris,
            'total_terjual'
        )
    ); ?>;

    new Chart(
    document.getElementById('barChart'),
    {
        type:'bar',

        data:{
            labels:produk,

            datasets:[{
                label:'Qty Terjual',

                data:qty,

                backgroundColor:[
                    '#f97316',
                    '#fb923c',
                    '#fdba74',
                    '#c2410c',
                    '#7c2d12'
                ]
            }]
        },

        options:{
            responsive:true,
            maintainAspectRatio:false,

            plugins:{
                legend:{
                    display:false
                }
            }
        }
    });
</script>