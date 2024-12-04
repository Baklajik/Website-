function toggleDropdown(element) { 
    element.classList.toggle("active"); 
    var dropdownContent = element.nextElementSibling; 
    if (dropdownContent.style.display === "block") { 
        dropdownContent.style.display = "none"; 
    } 
    else { 
        dropdownContent.style.display = "block"; 
    } 
} 