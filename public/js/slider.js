let slideIndex = 1;
showSlides(slideIndex);
function currentSlide(n) {
    showSlides((slideIndex = n));
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) {
        slideIndex = 1;
    }
    if (n < 1) {
        slideIndex = slides.length;
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.left = "-690px";
        slides[i].style.padding = "20px ";
        // slides[i].style.top = "-425px";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    // slides[slideIndex - 1].style.top = "0px";
    slides[slideIndex - 1].style.left = "0px";
    slides[slideIndex -1].style.padding = "20px 20px 120px 10px";
    dots[slideIndex - 1].className += " active";
}
