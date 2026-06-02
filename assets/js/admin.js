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