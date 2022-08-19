// Dropdown
function dropDown(e) {
    let dropdownContent = e.nextElementSibling;
    if (e.classList.contains("active-dropdown")) {
        dropdownContent.style.maxHeight = 0;
        e.classList.remove("active-dropdown");
    } else {
        dropdownContent.style.maxHeight = dropdownContent.scrollHeight + "px";
        e.classList.add("active-dropdown");
    }
}
