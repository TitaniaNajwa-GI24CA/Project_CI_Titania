</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const BASE_URL = "<?= base_url(); ?>";
</script>
<script>
    function hitungTotal()
    {
        let total = 0;

        document
        .querySelectorAll('.subtotal')
        .forEach(function(item){

            total +=
                parseInt(item.value) || 0;

        });

        document
        .getElementById('grand_total')
        .value =
            'Rp ' +
            total.toLocaleString('id-ID');
    }

    document.addEventListener('change', function(e){

        if(e.target.classList.contains('produk-select'))
        {
            let harga =
                e.target.options[
                    e.target.selectedIndex
                ].dataset.harga;

            let parent =
                e.target.closest('.produk-modal-grid');

            parent.querySelector('.harga').value =
                harga;

            let qty =
                parent.querySelector('.qty').value || 0;

            parent.querySelector('.subtotal').value =
                harga * qty;

            hitungTotal();
        }

    });

    document.addEventListener('input', function(e){

        if(e.target.classList.contains('qty'))
        {
            let parent =
                e.target.closest('.produk-modal-grid');

            let harga =
                parent.querySelector('.harga').value || 0;

            parent.querySelector('.subtotal').value =
                harga * e.target.value;

            hitungTotal();
        }

    });
</script>
<script>
    const produkData = <?= json_encode($produk) ?>;
</script>
<script src="<?= base_url('assets/js/admin.js'); ?>"></script>

</body>
</html>