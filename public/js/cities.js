/**
 * @returns {HTMLElement}
 */
const el = (element) => document.querySelector(element);

/**
 * @returns {NodeListOf<HTMLElementTagNameMap[K]>}
 */
const els = (element) => document.querySelectorAll(element);

// another file

//start fetch all data to my table
var countryId = location.hash.slice(1);
// console.log(countryId);

fetchcitiesData();
function fetchcitiesData() {
    axios.get(`/fetchCities/${countryId}`).then((response) => {
        //  console.log (response);
        var i = 0;
        el("tbody").innerHTML = "";
        var cityRes = response.data.cities;
        cityRes.forEach((item) => {
            i++;
            var tableContentOne = ` <tr>
             <td> ${i} </td>
             <td> <i></i> ${item.name.ar}</td>
             <td> <i></i> ${item.name.en}</td>
             <td>
                 <a href="servPoint/${item.id}#${item.id}" style="color:#03c3ec99">
                انقر لعرض نقاط الخدمة</a>
             </td>`;
            if (item.is_active) {
                var tableContentTwo = `
                 <td>
                 <label class="switch">
                 <input type="checkbox" class="switch-input activecityLink" name="active" checked id="addcityActive" value="${item.id}">
                 <span class="switch-toggle-slider">
                     <span class="switch-on"></span>
                     <span class="switch-off"></span>
                 </span>
                 </label>
                 </td>`;
            } else {
                var tableContentTwo = `
                 <td>
                 <label class="switch">
                 <input type="checkbox" class="switch-input activecityLink" name="active"  id="addcityActive" value="${item.id}">
                 <span class="switch-toggle-slider">
                     <span class="switch-on"></span>
                     <span class="switch-off"></span>
                 </span>
                 </label>
                 </td>`;
            }
            var tableContentThree = `
             <td>
                 <a class="btn btn-icon btn-outline-success  editcity"
                     value= " ${item.id}" href="javascript:void(0);"><i class=" bx bx-edit-alt me-2"></i>
                 </a>
                 <a class="btn btn-icon btn-outline-dribbble mx-2 deletcityLink" 
                     value= "${item.id}"  href="javascript:void(0);"><i class=" bx bx-trash me-2"></i>
                 </a>
             </td>
             </tr>`;

            el("tbody").innerHTML +=
                tableContentOne + tableContentTwo + tableContentThree;

            // Start Open Modal For Edit
            els(".editcity").forEach((element) => {
                // console.log(element);
                element.addEventListener("click", function (e) {
                    e.preventDefault();
                    var cityId = element.getAttribute("value");
                    // console.log(cityId);
                    $("#editCityModal").modal("show");
                    // el("#editCityModal").classList.add('show');
                    // el("#editCityModal").style='display:block';

                    axios.get(`editCity/${cityId}`).then((response) => {
                        // console.log(response);
                        if (response.status == 400) {
                            el("#message").innerHTML = "";
                            el("#message").classList.add("alert");
                            el("#message").classList.add("alert-danger");
                        } else {
                            el("#editCityId").value = cityId;
                            el("#editCityNameEn").value =
                                response.data.city.name.en;
                            el("#editCityNameAr").value =
                                response.data.city.name.ar;
                            el("#editCityActive").value =
                                response.data.city.active;
                        }
                    });
                });
            });
            // End Open Modal For Edit

            // Start Open Modal For Active
            els(".activecityLink").forEach((element) => {
                // console.log(element);
                element.addEventListener("click", function (e) {
                    e.preventDefault();
                    var cityId = element.getAttribute("value");
                    // console.log(cityId);
                    el("#activeCityId").value = cityId;
                    $("#activeCityModal").modal("show");
                });
            });
            // End Open Modal For Active

            // Start Open Modal For Delete
            els(".deletcityLink").forEach((element) => {
                // console.log(element);
                element.addEventListener("click", function (e) {
                    e.preventDefault();
                    var cityId = element.getAttribute("value");
                    // console.log(cityId);
                    el("#deleteCityId").value = cityId;
                    $("#deleteCityModal").modal("show");
                });
            });
            // End Open Modal For Delete
        });
    });
}
//End fetch all data to my table

if (el(".activeCity")) {
    //start activate data
    el(".activeCity").addEventListener("click", function (e) {
        e.preventDefault();
        let cityId = el("#activeCityId").value;
        //  console.log(cityId);

        axios.get(`activeCity/${cityId}`).then((response) => {
            el("#message").innerHTML = "";
            el("#message").classList.add("alert");
            el("#message").classList.add("alert-success");
            el("#message").innerText = response.data.message;
            $("#activeCityModal").modal("hide");
            fetchcitiesData();
        });
    });
}

//End activate data

//start Delete data

if (el(".deleteCity")) {
    el(".deleteCity").addEventListener("click", function (e) {
        e.preventDefault();
        let cityId = el("#deleteCityId").value;
        // console.log(cityId);

        axios.get(`deleteCity/${cityId}`).then((response) => {
            el("#message").innerHTML = "";
            el("#message").classList.add("alert");
            el("#message").classList.add("alert-success");
            el("#message").innerText = response.data.message;
            $("#deleteCityModal").modal("hide");
            fetchcitiesData();
        });
    });
}
//End Delete data

// start Update data
el(".updateCity").addEventListener("click", function (e) {
    e.preventDefault();
    cityId = el("#editCityId").value;

    axios
        .put(`updateCity/${cityId}`, {
            nameEn: el("#editCityNameEn").value,
            nameAr: el("#editCityNameAr").value,
            countryId: countryId,
            active: el("#editCityActive").value,
        })
        .then((response) => {
            // console.log(response);
            if (response.data.status == 400) {
                var errors = response.data.errors;
                // console.log(errors);
                Object.keys(errors).forEach((key) => {
                    // console.log(key);

                    var input = "#updateCity input[name=" + key + "]";
                    el(input + "+span").innerText = errors[key];
                });
            } else if (response.data.status == 404) {
                el("#updateCity").innerHTML = "";
                el("#message").classList.add("alert");
                el("#message").classList.add("alert-danger");
                el("#message").innerText = response.data.message;
            } else {
                el("#message").innerHTML = "";
                el("#message").classList.add("alert");
                el("#message").classList.add("alert-success");
                el("#message").innerText = response.data.message;
                el("#editCityModal").classList.remove("show");
                // el("#editCityModal").classList.add('hide');
                // el("#editCityModal").style='display:none';
                $("#editCityModal").modal("hide");
                fetchcitiesData();
            }
        });
});
// End Update data

// start Add Data
el(".addCity").addEventListener("click", function (e) {
    e.preventDefault();
    axios
        .post(`addCity`, {
            nameEn: el("#addCityNameEn").value,
            nameAr: el("#addCityNameAr").value,
            countryId: countryId,
            active: el("#addCityActive").value,
        })
        .then((response) => {
            // console.log(response);
            if (response.data.status == 400) {
                var errors = response.data.errors;
                // console.log(response.data.errors);
                Object.keys(errors).forEach((key) => {
                    // console.log(key);
                    var input = "#addCityForm input[name=" + key + "]";
                    el(input + "+span").innerText = errors[key];
                });
            } else {
                el("#message").innerHTML = "";
                el("#message").classList.add("alert");
                el("#message").classList.add("alert-success");
                el("#message").innerText = response.data.message;
                $("#addCityModal").modal("hide");
                els("#addCityForm input").value = "";
                fetchcitiesData();
            }
        });
});
// End Add Data
