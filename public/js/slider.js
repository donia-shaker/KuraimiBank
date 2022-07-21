// Application Slider
var slideIndex;

function currentSlide(n) {
    showSlides((slideIndex = n));
}

function showSlides(n) {
    let sliders = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    for (let i = 0; i < sliders.length; i++) {
        sliders[i].classList.remove("main-position");
        sliders[i].classList.add("seconed-position");
        dots[i].className = dots[i].className.replace(" active", "");
        // console.log(sliders[i].classList)
    }
    sliders[slideIndex - 1].classList.remove("seconed-position");
    sliders[slideIndex - 1].classList.add("main-position");
    dots[slideIndex - 1].className += " active";
}

// Services Slider
let box = document.querySelectorAll(".service .slider-wrapper .box");
let servicesDots = document.getElementsByClassName("ServicesDot");

let index = 0;

// for(let i=0 ; i < box.length;i++){
//     console.log(box[i]);
// };
function next() {
    box[index].classList.remove("active");
    servicesDots[index].classList.remove("active");
    index = (index + 1) % box.length;
    box[index].classList.add("active");
    servicesDots[index].classList.add("active");
}

function prev() {
    box[index].classList.remove("active");
    servicesDots[index].classList.remove("active");
    index = (index - 1 + box.length) % box.length;
    box[index].classList.add("active");
    servicesDots[index].classList.add("active");
}

function currentservicesSlide(n) {
    box[index].classList.remove("active");
    servicesDots[index].classList.remove("active");
    index = n - 1;
    box[index].classList.add("active");
    servicesDots[index].classList.add("active");
}

// news slider
var newsSlideWrapper = document.getElementById("news-boxes");
var newsBox = document.querySelectorAll(".news .slide-wrapper .box");
newsSlideWrapper.style.width = "calc(100% * " + (newsBox.length + 1) + ")";
let i = 0;

function newsNext(n) {
    if (i != newsBox.length - 1) {
        i += n;
    }
    console.log(i);
    // console.log({ item: newsSlideWrapper.style.transform });
    let maxWidth = 420 * (newsBox.length - 1) + "px";
    // console.log(maxWidth);
    if (newsSlideWrapper.style.transform != "translateX(" + maxWidth + ")")
        newsSlideWrapper.style.transform = "translateX(" + 420 * i + "px)";
    console.log("translateX(" + 420 * i + "px)");
    console.log({ item: newsSlideWrapper.style.transform });
}

function newsPrev(n) {
    if (i != 0) {
        i += n;
    }
    console.log(i);
    let maxWidth = -420 * (newsBox.length -1 ) + "px";
    if (
        newsSlideWrapper.style.transform != "translateX(0px)" &&
        newsSlideWrapper.style.transform != "" &&
        newsSlideWrapper.style.transform != "translateX(" + maxWidth + " )"
    ) {
        // if (i == 0)
            newsSlideWrapper.style.transform =
                "translateX(" + (420 * (i + 1) - 420) + "px)";
        // else
        //     newsSlideWrapper.style.transform =
        //         "translateX(" + (420 * i - 420) + "px)";
        console.log("translateX(" + (420 * (i + 1) - 420) + "px )");
    }
}
