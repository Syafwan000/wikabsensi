window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');

    navbar.classList.toggle('sticky-top', window.scrollY > 0);
})