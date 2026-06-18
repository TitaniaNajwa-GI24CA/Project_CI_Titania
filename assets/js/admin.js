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