</div>
</div>

<script>
    document.getElementById('id_order').addEventListener('change', function(){

    let total =
        parseFloat(
            this.options[this.selectedIndex]
            .dataset.total
        );

    document.getElementById('total_bayar').value = total;

    document.getElementById('total_bayar_display').value =
        'Rp ' + total.toLocaleString('id-ID');

});
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const BASE_URL = "<?= base_url(); ?>";
</script>
<script src="<?= base_url('assets/js/admin.js'); ?>"></script>

</body>
</html>