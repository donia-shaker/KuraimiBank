/**
 * @returns {HTMLElement}
 */
 const el = (element) => document.querySelector(element);

 /**
  * @returns {NodeListOf<HTMLElementTagNameMap[K]>}
  */
 const els = (element) => document.querySelectorAll(element);

let map;
let mapTwo;
            function initMap() {
                map = new google.maps.Map(document.getElementById("map"), {
                    center: { lat:15.401070730158757, lng:44.226374053883994 },
                    zoom: 8,
                    scrollwheel: true,
                });
                const uluru = { lat:15.401070730158757, lng:44.226374053883994 };
                let marker = new google.maps.Marker({
                    position: uluru,
                    map: map,
                    draggable: true
                });
                google.maps.event.addListener(marker,'position_changed',
                    function (){
                        let lat = marker.position.lat()
                        let lng = marker.position.lng()
                        el('#lat').value= lat;
                        el('#lng').value = lng;
                    })
                google.maps.event.addListener(map,'click',
                function (event){
                    pos = event.latLng
                    marker.setPosition(pos)
                })
            }

            function initMapTwo() {
                mapTwo = new google.maps.Map(document.getElementById("mapTwo"), {
                    center: { lat:Number(el('#latTwo').value), lng:Number(el('#lngTwo').value) },
                    zoom: 8,
                    scrollwheel: true,
                });
                const uluru = { lat:Number(el('#latTwo').value), lng:Number(el('#lngTwo').value) };
                let marker = new google.maps.Marker({
                    position: uluru,
                    map: mapTwo,
                    draggable: true
                });
                google.maps.event.addListener(marker,'position_changed',
                    function (){
                        let lat = marker.position.lat()
                        let lng = marker.position.lng()
                        el('#latTwo').value= lat;
                        el('#lngTwo').value = lng;
                    })
                google.maps.event.addListener(mapTwo,'click',
                function (event){
                    pos = event.latLng
                    marker.setPosition(pos)
                })
            }

            initMap();