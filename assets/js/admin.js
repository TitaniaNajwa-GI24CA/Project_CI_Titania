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

function editKategori(id,nama){

    document.getElementById('edit_id_kategori').value = id;
    document.getElementById('edit_nama_kategori').value = nama;

    openModal('modalEditKategori');
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
        searchPlaceholder:"Cari kategori produk...",
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