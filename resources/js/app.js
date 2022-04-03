//require('./bootstrap');

var handleSidebar = function () {
    let sidebar = document.getElementById('sidebar');
    let sidebarClose = document.getElementById('sidebar-toggle-close');
    sidebar.classList.toggle('-translate-x-full');
    sidebar.classList.toggle('translate-x-0');
    sidebarClose.classList.toggle('hidden');
    console.log("sidebar!");
}

// Events
document.getElementById("sidebar-toggle").addEventListener("click", handleSidebar, false);
document.getElementById("sidebar-toggle-close").addEventListener("click", handleSidebar, false);

console.log("Hello World!");
