var minu = document.getElementById("myToggle");
let list = document.getElementsByClassName('main-list');

if ( minu.checked === true ) {
    list.style['display']="block"
} else {
    list.style['display']="none"
}