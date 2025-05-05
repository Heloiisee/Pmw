function initIntersectionObserver() {
    const ratio = 0.1;
    const options = {
        root: null,
        rootMargin: "0px",
        threshold: ratio,
    };

    function handleIntersect(entries, observer) {
        entries.forEach(function (entry) {
            if (entry.intersectionRatio > ratio) {
                entry.target.classList.remove('reveal');
                observer.unobserve(entry.target);
            }
        });
    }

    document.documentElement.classList.add('reveal-loaded');

    const observer = new IntersectionObserver(handleIntersect, options);
    document.querySelectorAll('.reveal').forEach(function (element) {
        observer.observe(element);
    });
}

initIntersectionObserver();
