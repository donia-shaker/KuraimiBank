// Application Slider
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
        slides[i].style.right ="620px";
        slides[i].style.padding = "20px ";
        slides[i].style.left = "40px";
        slides[i].style['z-index'] = "1";
        slides[i].style.width = "100%";
        slides[i].style['margin-right'] = "20px";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    // slides[slideIndex - 1].style.top = "0px";
    slides[slideIndex - 1].style.right = "0";
    slides[slideIndex - 1].style.padding = "20px 20px 80px 10px";
    slides[slideIndex - 1].style['z-index'] = "2";
    slides[slideIndex - 1].style['margin-right'] = "";

    dots[slideIndex - 1].className += " active";
}

// Services Slider
let servicesSlideIndex = 1;
showservicesSlides(servicesSlideIndex);
function plusSlides(n) {
    showservicesSlides((servicesSlideIndex += n));
}

function currentservicesSlide(n) {
    showservicesSlides((servicesSlideIndex = n));
}

function showservicesSlides(n) {
    let i;
    let servicesSlides = document.getElementsByClassName("myservicesSlides");
    let servicesDots = document.getElementsByClassName("ServicesDot");
    if (n > servicesSlides.length) {
        servicesSlideIndex = 1;
    }
    if (n < 1) {
        servicesSlideIndex = servicesSlides.length;
    }
    for (i = 0; i < servicesSlides.length; i++) {
        servicesSlides[i].style.display = "none";
    }
    for (i = 0; i < servicesDots.length; i++) {
        servicesDots[i].className = servicesDots[i].className.replace(
            " active",
            ""
        );
    }
    servicesSlides[servicesSlideIndex - 1].style.display = "block";
    servicesDots[servicesSlideIndex - 1].className += " active";
}
