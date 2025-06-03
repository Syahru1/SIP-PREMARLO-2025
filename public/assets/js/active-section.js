document.addEventListener('DOMContentLoaded', function () {
    const sections = document.querySelectorAll("section[id]");
    const navLinks = document.querySelectorAll(".nav-link");

    function activateSection() {
        let scrollY = window.scrollY;
        sections.forEach(section => {
            const sectionTop = section.offsetTop - 70; // sesuaikan offset
            const sectionHeight = section.offsetHeight;

            if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
                navLinks.forEach(link => {
                    link.classList.remove("active");
                    if (link.getAttribute("href").includes(section.getAttribute("id"))) {
                        link.classList.add("active");
                    }
                });
            }
        });
    }

    window.addEventListener("scroll", activateSection);
});
