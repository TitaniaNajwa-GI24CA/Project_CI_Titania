document.addEventListener("DOMContentLoaded", function(){

    const profileModal = document.getElementById("profileModal");
    const logoutModal = document.getElementById("logoutModal");

    const openProfileModal = document.getElementById("openProfileModal");
    const closeProfileModal = document.getElementById("closeProfileModal");

    const openLogoutModal = document.getElementById("openLogoutModal");
    const closeLogoutModal = document.getElementById("closeLogoutModal");

    if(openProfileModal && profileModal){
        openProfileModal.addEventListener("click", function(e){
            e.preventDefault();
            profileModal.classList.add("active");
        });
    }

    if(closeProfileModal && profileModal){
        closeProfileModal.addEventListener("click", function(){
            profileModal.classList.remove("active");
        });
    }

    if(openLogoutModal && logoutModal){
        openLogoutModal.addEventListener("click", function(e){
            e.preventDefault();
            logoutModal.classList.add("active");
        });
    }

    if(closeLogoutModal && logoutModal){
        closeLogoutModal.addEventListener("click", function(){
            logoutModal.classList.remove("active");
        });
    }

    window.addEventListener("click", function(e){
        if(e.target === profileModal){
            profileModal.classList.remove("active");
        }

        if(e.target === logoutModal){
            logoutModal.classList.remove("active");
        }
    });

    document.querySelectorAll(".has-submenu").forEach(function(menu){
        menu.addEventListener("click", function(){
            const submenu = this.nextElementSibling;

            if(submenu){
                submenu.classList.toggle("show");
            }
        });
    });

});

function openModal(id){
    document.getElementById(id).classList.add('show');
}

function closeModal(id){
    document.getElementById(id).classList.remove('show');
}

/* DELETE MODAL */
    const deleteModal = document.getElementById("deleteModal");
    const closeDeleteModal = document.getElementById("closeDeleteModal");
    const confirmDeleteBtn = document.getElementById("confirmDeleteBtn");

    document.querySelectorAll(".open-delete-modal").forEach(function(btn){
        btn.addEventListener("click", function(e){
            e.preventDefault();

            if(confirmDeleteBtn && deleteModal){
                confirmDeleteBtn.href = this.dataset.url;
                deleteModal.classList.add("active");
            }
        });
    });

    if(closeDeleteModal && deleteModal){
        closeDeleteModal.addEventListener("click", function(){
            deleteModal.classList.remove("active");
        });
    }

    if(deleteModal){
        deleteModal.addEventListener("click", function(e){
            if(e.target === deleteModal){
                deleteModal.classList.remove("active");
            }
        });
    }

/*PAGINATION*/
$(document).ready(function(){
    $('#project-datatable').DataTable({
    pageLength: 5,
    responsive: true,
    autoWidth: false,

    dom:
    "<'top'lf>" +
    "rt" +
    "<'bottom'ip>",

    language:{
        search:"",
        searchPlaceholder:"Cari Data...",
        lengthMenu:"Tampilkan _MENU_ data",
        info:"Menampilkan _START_ - _END_ dari _TOTAL_ data",
        paginate:{
            previous:"<",
            next:">"
        },
            zeroRecords:
                "Data tidak ditemukan",

            infoEmpty:
                "Tidak ada data",

            infoFiltered:
                "(difilter dari _MAX_ data)"
        }

    });

});

$(document).ready(function(){
        if($('.order-page').length){
            $('.dataTables_filter').append(`
                <select id="filterBulan" class="filter-select">
                    <option value="">Semua Bulan</option>
                    <option value="Jan">Januari</option>
                    <option value="Feb">Februari</option>
                    <option value="Mar">Maret</option>
                    <option value="Apr">April</option>
                    <option value="May">Mei</option>
                    <option value="Jun">Juni</option>
                    <option value="Jul">Juli</option>
                    <option value="Aug">Agustus</option>
                    <option value="Sep">September</option>
                    <option value="Oct">Oktober</option>
                    <option value="Nov">November</option>
                    <option value="Dec">Desember</option>
                </select>
            `);

            $('#filterBulan').on('change', function(){
                table.column(1).search($(this).val()).draw();
            });
        }
});

/* TAMBAH MODAL*/
    const openCustomModal = document.getElementById('openCustomModal');
    const closeCustomModal = document.getElementById('closeCustomModal');
    const customModal = document.getElementById('customModal');

    if(openCustomModal && closeCustomModal && customModal){
        openCustomModal.addEventListener('click', function(e){
            e.preventDefault();
            customModal.classList.add('active');
        });

        closeCustomModal.addEventListener('click', function(){
            customModal.classList.remove('active');
        });

        customModal.addEventListener('click', function(e){
            if(e.target === customModal){
                customModal.classList.remove('active');
            }
        });
    }

/* ==========================
   MODAL EDIT KATEGORI
========================== */

const editModal = document.getElementById("editCustomModal");
const closeEditModal = document.getElementById("closeEditCustomModal");

document.querySelectorAll(".open-edit-modal").forEach(btn => {

    btn.addEventListener("click", function(e){

        e.preventDefault();

        document.getElementById("edit_id").value = this.dataset.id;
        document.getElementById("edit_kode").value = this.dataset.kode;
        document.getElementById("edit_nama").value = this.dataset.nama;
        document.getElementById("edit_deskripsi").value = this.dataset.deskripsi;
        document.getElementById("edit_status").value = this.dataset.status;

        editModal.classList.add("active");
    });

});

if(closeEditModal){

    closeEditModal.addEventListener("click", function(){

        editModal.classList.remove("active");

    });

}

if(editModal){

    editModal.addEventListener("click", function(e){

        if(e.target === editModal){

            editModal.classList.remove("active");

        }

    });

}

/* ==========================
   MODAL EDIT PRODUK
========================== */

const editProdukModal = document.getElementById("editProdukModal");
const closeEditProdukModal = document.getElementById("closeEditProdukModal");

document.querySelectorAll(".open-edit-produk").forEach(btn => {

    btn.addEventListener("click", function(e){

        e.preventDefault();

        if(document.getElementById("edit_id_produk")){
            document.getElementById("edit_id_produk").value =
                this.dataset.id || '';
        }

        if(document.getElementById("edit_id_kategori")){
            document.getElementById("edit_id_kategori").value =
                this.dataset.id_kategori || '';
        }

        if(document.getElementById("edit_kode_produk")){
            document.getElementById("edit_kode_produk").value =
                this.dataset.kode || '';
        }

        if(document.getElementById("edit_nama_produk")){
            document.getElementById("edit_nama_produk").value =
                this.dataset.nama || '';
        }

        if(document.getElementById("edit_harga")){
            document.getElementById("edit_harga").value =
                this.dataset.harga || '';
        }

        if(document.getElementById("edit_stok")){
            document.getElementById("edit_stok").value =
                this.dataset.stok || '';
        }

        if(document.getElementById("edit_deskripsi")){
            document.getElementById("edit_deskripsi").value =
                this.dataset.deskripsi || '';
        }

        if(editProdukModal){
            editProdukModal.classList.add("show");
        }

    });

});

if(closeEditProdukModal){

    closeEditProdukModal.addEventListener("click", function(){

        if(editProdukModal){
            editProdukModal.classList.remove("show");
        }

    });

}

window.addEventListener("click", function(e){

    if(e.target === editProdukModal){
        editProdukModal.classList.remove("show");
    }

});

/* ==========================
   EDIT PELANGGAN
========================== */

const editPelangganModal =
document.getElementById("editPelangganModal");

const closeEditPelangganModal =
document.getElementById("closeEditPelangganModal");

document.querySelectorAll(".open-edit-pelanggan")
.forEach(btn => {

    btn.addEventListener("click", function(e){

        e.preventDefault();

        document.getElementById("edit_id_pelanggan").value =
            this.dataset.id;

        document.getElementById("edit_kode_pelanggan").value =
            this.dataset.kode;

        document.getElementById("edit_nama_pelanggan").value =
            this.dataset.nama;

        document.getElementById("edit_jenis_kelamin").value =
            this.dataset.jk;

        document.getElementById("edit_no_telp").value =
            this.dataset.telp;

        document.getElementById("edit_email").value =
            this.dataset.email;

         document.getElementById("edit_jenis_pelanggan").value =
            this.dataset.jp;

        document.getElementById("edit_alamat").value =
            this.dataset.alamat;

        editPelangganModal.classList.add("show");

    });

});

if(closeEditPelangganModal){

    closeEditPelangganModal.addEventListener("click", function(){

        editPelangganModal.classList.remove("show");

    });

}

const editOrderModal = document.getElementById("editOrderModal");
const closeEditOrderModal = document.getElementById("closeEditOrderModal");

document.querySelectorAll(".open-edit-order").forEach(btn => {

    btn.addEventListener("click", function(e){

        e.preventDefault();

        document.getElementById("edit_id_order").value =
            this.dataset.id;

        document.getElementById("edit_kode_order").value =
            this.dataset.kode;

        document.getElementById("edit_status_order").value =
            this.dataset.status;

        editOrderModal.classList.add("show");

    });

});

if(closeEditOrderModal){
    closeEditOrderModal.addEventListener("click", function(){
        editOrderModal.classList.remove("show");
    });
}

window.addEventListener("click", function(e){
    if(e.target === editOrderModal){
        editOrderModal.classList.remove("show");
    }
});

document.addEventListener('DOMContentLoaded', function(){

    const submenuButtons = document.querySelectorAll('.has-submenu');

    submenuButtons.forEach(button => {

        button.addEventListener('click', function(e){

            e.preventDefault();

            const parent = this.closest('.menu-group');
            const submenu = parent.querySelector('.submenu');

            document.querySelectorAll('.menu-group').forEach(item => {

                if(item !== parent){

                    item.querySelector('.has-submenu')
                        ?.classList.remove('active');

                    item.querySelector('.submenu')
                        ?.classList.remove('show');

                }

            });
            this.classList.toggle('active');
            submenu.classList.toggle('show');

        });

    });

});

document.querySelectorAll('.open-edit-sales').forEach(btn => {
    btn.addEventListener('click', function(e){
        e.preventDefault();

        document.getElementById('edit_id_sales').value =
            this.dataset.id;

        document.getElementById('edit_kode_sales').value =
            this.dataset.kode;

        document.getElementById('edit_nama_sales').value =
            this.dataset.nama;

        document.getElementById('edit_no_telp').value =
            this.dataset.telp;

        document.getElementById('edit_email_sales').value =
            this.dataset.email;

        document.getElementById('edit_alamat_sales').value =
            this.dataset.alamat;

        document.getElementById('edit_status_sales').value =
            this.dataset.status;

        document.getElementById('editSalesModal')
            .classList.add('show');

    });

});

document.getElementById('closeEditSalesModal')
?.addEventListener('click', function(){

    document.getElementById('editSalesModal')
        .classList.remove('show');

});


document
.querySelectorAll('.open-edit-pembayaran')
.forEach(btn => {

    btn.addEventListener('click', function(e){

        e.preventDefault();

        document.getElementById(
            'edit_id_pembayaran'
        ).value = this.dataset.id;

        document.getElementById(
            'edit_tanggal'
        ).value = this.dataset.tanggal;

        document.getElementById(
            'edit_metode'
        ).value = this.dataset.metode;

        document.getElementById(
            'edit_status_bayar'
        ).value = this.dataset.status;

        document
        .getElementById('editPembayaranModal')
        .classList.add('show');
    });

});

document.getElementById('closeEditPembayaranModal')
?.addEventListener('click', function(){

    document.getElementById('editPembayaranModal')
        .classList.remove('show');

});

$(document).ready(function(){
    $('#laporan-datatable').DataTable({
    pageLength: 5,
    responsive: true,
    autoWidth: false,

    dom:
    "<'top'lf>" +
    "rt" +
    "<'bottom'ip>",

    language:{
        lengthMenu:"Tampilkan _MENU_ data",
        info:"Menampilkan _START_ - _END_ dari _TOTAL_ data",
        paginate:{
            previous:"<",
            next:">"
        },
            zeroRecords:
                "Data tidak ditemukan",

            infoEmpty:
                "Tidak ada data",

            infoFiltered:
                "(difilter dari _MAX_ data)"
        }

    });

});

document.getElementById('btnTambahProduk').addEventListener('click', function () {

    const container = document.getElementById('detail-order');
    const row = document.createElement('tr');

    let options = '<option value="">Pilih Produk</option>';

    produkData.forEach(p => {
        options += `
            <option value="${p.id_produk}"
                data-harga="${p.harga}"
                data-stok="${p.stok}">
                ${p.nama_produk}
            </option>
        `;
    });

    row.innerHTML = `
        <td>
            <select name="id_produk[]" class="produk-select">
                ${options}
            </select>
        </td>

        <td><input type="number" name="harga[]" class="harga" readonly></td>
        <td><input type="number" name="qty[]" class="qty" min="1"></td>
        <td><input type="number" name="subtotal[]" class="subtotal" readonly></td>
        <td>
            <button type="button" class="hapus-row">
                <i class="fa-solid fa-trash"></i>
            </button>
        </td>
    `;

    container.appendChild(row);
});

document.addEventListener('click', function(e){

    if(
        e.target.closest('.hapus-row')
    ){
        e.target
        .closest('tr')
        .remove();

        hitungGrandTotal();
    }

});

document.addEventListener('change', function(e){

    if(
        e.target.classList.contains(
            'produk-select'
        )
    ){

        const harga =
            e.target.options[
                e.target.selectedIndex
            ].dataset.harga;

        const row =
            e.target.closest('tr');

        row.querySelector('.harga')
           .value = harga;

        hitungSubtotal(row);
    }

});

document.addEventListener('input', function(e){

    if(
        e.target.classList.contains(
            'qty'
        )
    ){

        const row =
            e.target.closest('tr');

        hitungSubtotal(row);
    }

});

function hitungSubtotal(row)
{
    let harga =
        parseFloat(
            row.querySelector('.harga').value
        ) || 0;

    let qty =
        parseFloat(
            row.querySelector('.qty').value
        ) || 0;

    let subtotal =
        harga * qty;

    row.querySelector('.subtotal')
       .value = subtotal;

    hitungGrandTotal();
}

function hitungGrandTotal()
{
    let total = 0;

    document
    .querySelectorAll('.subtotal')
    .forEach(function(item){

        total +=
            parseFloat(item.value) || 0;

    });

    document
    .getElementById('grand_total')
    .value =
        total.toLocaleString('id-ID');
}

function closeModal(){
    document.getElementById('successModal').style.display = 'none';
}

document.addEventListener('click', function(e){
    if(e.target.closest('.hapus-row')){
        e.preventDefault();
        e.target.closest('tr').remove();
        hitungGrandTotal();
    }
});

