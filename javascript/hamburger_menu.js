function openNav() {
    var sidebar = document.getElementById("sidebar");
    sidebar.style.width = "400px";
    sidebar.classList.add("open");
}

function closeNav() {
    var sidebar = document.getElementById("sidebar");
    sidebar.style.width = "0";
    sidebar.classList.remove("open");
}

function staff() {
    var staff = document.getElementById("staff_bar_inside");
    if (staff.className == "open") {
        staff.style.height = "0";
        staff.classList.remove("open");
    } else {
        staff.style.height = "114px";
        staff.classList.add("open");
    }
    
}

function admin() {
    var admin = document.getElementById("admin_bar_inside");
    if (admin.className == "open") {
        admin.style.height = "0"
        admin.classList.remove("open")
    } else {
        admin.style.height = "513px";
        admin.classList.add("open");
    }
    
}
