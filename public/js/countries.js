/**
 * @returns {HTMLElement}
 */
const el = (element) => document.querySelector(element);

/**
 * @returns {NodeListOf<HTMLElementTagNameMap[K]>}
 */
const els = (element) => document.querySelectorAll(element);

const isLocaleEn = location.href.search('/en/') != -1;

//start fetch all data to my table
fetchData();
function fetchData() {
    axios.get("/fetchCountry").then((response) => {
        // console.log(response);
        var i = 0;
        el("#Country tbody").innerHTML = "";
        var CountryRes = response.data.countries;
        // console.log(CountryRes);
        CountryRes.forEach((item) => {
            i++;
            var tableContentOne = ` <tr>
             <td> ${i} </td>
             <td> <i></i> ${isLocaleEn ? item.name.en : item.name.ar}</td>
             <td>
                 <a href="cities/${item.id}#${item.id}" style="color:#03c3ec99">
                انقر لعرض المدن</a>
             </td>`;
            if (item.is_active) {
                var tableContentTwo = `
                 <td>
                 <label class="switch">
                 <input type="checkbox" class="switch-input activeCountryLink" name="active" checked id="Active" value="${item.id}">
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
                 <input type="checkbox" class="switch-input activeCountryLink" name="active"  id="addCountryActive" value="${item.id}">
                 <span class="switch-toggle-slider">
                     <span class="switch-on"></span>
                     <span class="switch-off"></span>
                 </span>
                 </label>
                 </td>`;
            }
            var tableContentThree = `
             <td>
                 <a class="btn btn-icon btn-outline-success  editCountry"
                     value= " ${item.id}" href="javascript:void(0);"><i class=" bx bx-edit-alt me-2"></i>
                 </a>
                 <a class="btn btn-icon btn-outline-dribbble mx-2 deletCountryLink" 
                     value= "${item.id}"  href="javascript:void(0);"><i class=" bx bx-trash me-2"></i>
                 </a>
             </td>
             </tr>`;

            el("tbody").innerHTML +=
                tableContentOne + tableContentTwo + tableContentThree;

            // Start Open Modal For Edit
            els(".editCountry").forEach((element) => {
                // console.log(element);
                element.addEventListener("click", function (e) {
                    e.preventDefault();
                    var CountryId = element.getAttribute("value");
                    console.log(CountryId);
                    $("#editCountryModal").modal("show");
                    // el("#editCountryModal").classList.add('show');
                    // el("#editCountryModal").style='display:block';

                    axios.get(`editCountry/${CountryId}`).then((response) => {
                        // console.log(response);
                        if (response.status == 400) {
                            el("#message").innerHTML = "";
                            el("#message").classList.add("alert");
                            el("#message").classList.add("alert-danger");
                        } else {
                            el("#editCountryId").value = CountryId;
                            el("#editCountryNameEn").value =
                                response.data.Country.name.en;
                            el("#editCountryNameAr").value =
                                response.data.Country.name.ar;
                            el("#editCountryActive").value =
                                response.data.Country.active;
                        }
                    });
                });
            });
            // End Open Modal For Edit

            // Start Open Modal For Active
            els(".activeCountryLink").forEach((element) => {
                // console.log(element);
                element.addEventListener("click", function (e) {
                    e.preventDefault();
                    var CountryId = element.getAttribute("value");
                    console.log(CountryId);
                    el("#activeCountryId").value = CountryId;
                    $("#activeCountryModal").modal("show");
                });
            });
            // End Open Modal For Active

            // Start Open Modal For Delete
            els(".deletCountryLink").forEach((element) => {
                // console.log(element);
                element.addEventListener("click", function (e) {
                    e.preventDefault();
                    var CountryId = element.getAttribute("value");
                    console.log(CountryId);
                    el("#deleteCountryId").value = CountryId;
                    $("#deleteCountryModal").modal("show");
                });
            });
            // End Open Modal For Delete
        });
    });
}
//End fetch all data to my table

//start activate data
el(".activeCountry").addEventListener("click", function (e) {
    e.preventDefault();
    let CountryId = el("#activeCountryId").value;
    console.log(CountryId);

    axios.post(`activeCountry/${CountryId}`).then((response) => {
        el("#message").innerHTML = "";
        el("#message").classList.add("alert");
        el("#message").classList.add("alert-success");
        el("#message").innerText = response.data.message;
        $("#activeCountryModal").modal("hide");
        fetchData();
    });
});
//End activate data

//start Delete data
el(".deleteCountry").addEventListener("click", function (e) {
    e.preventDefault();
    let CountryId = el("#deleteCountryId").value;
    // console.log(CountryId);

    axios.post(`deleteCountry/${CountryId}`).then((response) => {
        el("#message").innerHTML = "";
        el("#message").classList.add("alert");
        el("#message").classList.add("alert-success");
        el("#message").innerText = response.data.message;
        $("#deleteCountryModal").modal("hide");
        fetchData();
    });
});
// End Delete data

// start Update data
el(".updateCountry").addEventListener("click", function (e) {
    e.preventDefault();
    CountryId = el("#editCountryId").value;

    axios
        .put(`updateCountry/${CountryId}`, {
            nameEn: el("#editCountryNameEn").value,
            nameAr: el("#editCountryNameAr").value,
        })
        .then((response) => {
            console.log(response);
            if (response.data.status == 400) {
                var errors = response.data.errors;
                // console.log(errors);
                Object.keys(errors).forEach((key) => {
                    console.log(key);

                    var input = "#updateCountry input[name=" + key + "]";
                    el(input + "+span").innerText = errors[key];
                });
            } else if (response.data.status == 404) {
                el("#updateCountry").innerHTML = "";
                el("#message").classList.add("alert");
                el("#message").classList.add("alert-danger");
                el("#message").innerText = response.data.message;
            } else {
                el("#message").innerHTML = "";
                el("#message").classList.add("alert");
                el("#message").classList.add("alert-success");
                el("#message").innerText = response.data.message;
                el("#editCountryModal").classList.remove("show");
                // el("#editCountryModal").classList.add('hide');
                // el("#editCountryModal").style='display:none';
                $("#editCountryModal").modal("hide");
                fetchData();
            }
        });
});
// End Update data

// start Add Data
el(".addCountry").addEventListener("click", function (e) {
    e.preventDefault();
    axios
        .post(`addCountry`, {
            nameEn: el("#addCountryNameEn").value,
            nameAr: el("#addCountryNameAr").value,
        })
        .then((response) => {
            console.log(response);
            if (response.data.status == 400) {
                var errors = response.data.errors;
                // console.log(response.data.errors);
                Object.keys(errors).forEach((key) => {
                    console.log(key);
                    var input = "#addCountryForm input[name=" + key + "]";
                    el(input + "+span").innerText = errors[key];
                });
            } else {
                el("#message").innerHTML = "";
                el("#message").classList.add("alert");
                el("#message").classList.add("alert-success");
                el("#message").innerText = response.data.message;
                $("#addCountryModal").modal("hide");
                el("#addCountryForm input").value = "";
                fetchData();
            }
        });
});
// End Add Data
