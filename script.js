document.addEventListener("DOMContentLoaded", function () {
    const settingBtn = document.getElementById("settingBtn");
    const dropdownMenu = document.getElementById("dropdownMenu");

    settingBtn.addEventListener("click", function (e) {
        e.preventDefault();
        dropdownMenu.classList.toggle("show");
    });

    document.addEventListener("click", function (e) {
        if (!settingBtn.contains(e.target) && !dropdownMenu.contains(e.target)) {
            dropdownMenu.classList.remove("show");
        }
    });
});