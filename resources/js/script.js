document.addEventListener("DOMContentLoaded", function() {
    let backToTop = document.getElementById("backToTop");

    window.addEventListener("scroll", function() {
        if (window.scrollY > 200) {
            backToTop.style.display = "flex"; // Affiche le bouton
        } else {
            backToTop.style.display = "none"; // Cache le bouton
        }
    });

    backToTop.addEventListener("click", function() {
        window.scrollTo({ top: 0, behavior: "smooth" }); // Remonte en douceur
    });
});
