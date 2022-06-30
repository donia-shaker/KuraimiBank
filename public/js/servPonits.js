// /**
//  * @returns {HTMLElement}
//  */
// const el = (element) => document.querySelector(element);

// /**
//  * @returns {NodeListOf<HTMLElementTagNameMap[K]>}
//  */
// const els = (element) => document.querySelectorAll(element);


const isLocaleEn = location.href.search('/en/') != -1;



// another file

//start fetch all data to my table
var cityId = Number(location.hash.slice(1));

// console.log(ServPointId);

fetchServPointData();
function fetchServPointData() {
    axios.get(`fetchServPoint/${cityId}`).then((response) => {
        console.log(response);
        var i = 0;
        el("tbody").innerHTML = "";
        var servPointsRes = response.data;
        // console.log({ servPointsRes });
        servPointsRes.forEach((item) => {
            i++;
            var tableContentOne = ` <tr>
            <td> ${i} </td>
            <td> ${isLocaleEn ? item.name.en : item.name.ar}</td>
            <td> ${isLocaleEn ? item.address.en : item.address.ar}</td>
            <td> ${item.phone}</td>
            <td> ${item.second_phone}</td>
            <td> ${isLocaleEn ? item.working_hours.en : item.working_hours.ar}</td>`;
            if (item.is_active) {
                var tableContentTwo = `
                  <td>
                  <label class="switch">
                  <input type="checkbox" class="switch-input activeServPointLink" name="active" checked id="addServPointActive" value="${item.id}">
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
                  <input type="checkbox" class="switch-input activeServPointLink" name="active"  id="addServPointActive" value="${item.id}">
                  <span class="switch-toggle-slider">
                      <span class="switch-on"></span>
                      <span class="switch-off"></span>
                  </span>
                  </label>
                  </td>`;
            }
            var tableContentThree = `
              <td>
                  <a class="btn btn-icon btn-outline-success editServPoint" value="${item.id}"
                        href="javascript:void(0);"><i class=" bx bx-edit-alt me-2"></i>
                  </a> 
                  <a class="btn btn-icon btn-outline-dribbble mx-2 deletServPointLink" 
                      value= "${item.id}"  href="javascript:void(0);"><i class=" bx bx-trash me-2"></i>
                  </a>
              </td>
              </tr>`;
              console.log( el('#lat').value);

            el("tbody").innerHTML +=
                tableContentOne + tableContentTwo + tableContentThree;

            // Start Open Modal For Edit
            els(".editServPoint").forEach((element) => {
                // console.log(element);
                element.addEventListener("click", function (e) {
                    e.preventDefault();
                    var ServPointId = element.getAttribute("value");
                    // console.log(ServPointId);
                    $("#editServPointModal").modal("show");
                    // el("#editServPointModal").classList.add('show');
                    // el("#editServPointModal").style='display:block';

                    axios
                        .get(`editServPoint/${ServPointId}`)
                        .then((response) => {
                            // console.log(response);

                            // var servPointsRes = response.data.servPoints.map(item => {
                            //     return {
                            //         ...item,
                            //         name: JSON.parse(item.name),
                            //         working_hours: JSON.parse(item.working_hours),
                            //         address: JSON.parse(item.address)
                            //     }
                            // });
                            var servPointsRes = response.data.servPoints;

                            // servPointsRes.name = JSON.parse(servPointsRes.name);
                            // servPointsRes.working_hours = JSON.parse(
                            //     servPointsRes.working_hours
                            // );
                            // servPointsRes.address = JSON.parse(
                            //     servPointsRes.address
                            // );

                            // console.log(servPointsRes);
                            if (response.status == 400) {
                                el("#message").innerHTML = "<div class='alert alert-danger message_animation'>"+ response.data.message+"</div>";
                            } else {
                                el("#editServPointId").value = ServPointId;
                                el("#editServPointNameEn").value =
                                    servPointsRes.name.en;
                                el("#editServPointNameAr").value =
                                    servPointsRes.name.ar;
                                el("#editServPointaddressAr").value =
                                    servPointsRes.address.ar;
                                el("#editServPointaddressEn").value =
                                    servPointsRes.address.en;
                                el("#editServPointPhone").value =
                                    servPointsRes.phone;
                                el("#editServPointSecondPhone").value =
                                    servPointsRes.second_phone;
                                el("#editServPointWorkingHourAr").value =
                                    servPointsRes.working_hours.ar;
                                el("#editServPointWorkingHourEn").value =
                                    servPointsRes.working_hours.en;
                                el("#latTwo").value =
                                    servPointsRes.latitude;
                                 el("#lngTwo").value =
                                    servPointsRes.longitude;
                                initMapTwo();
                            }
                        });
                });
            });
            // End Open Modal For Edit

                // Start Open Modal For Active
                els(".activeServPointLink").forEach((element) => {
                    // console.log(element);
                    element.addEventListener("click", function (e) {
                        e.preventDefault();
                        var ServPointId = element.getAttribute("value");
                        // console.log(ServPointId);
                        el("#activeServPointId").value = ServPointId;
                        $("#activeServPointModal").modal("show");
                    });
                });
                // End Open Modal For Active

                // Start Open Modal For Delete
                els(".deletServPointLink").forEach((element) => {
                    // console.log(element);
                    element.addEventListener("click", function (e) {
                        e.preventDefault();
                        var ServPointId = element.getAttribute("value");
                        // console.log(ServPointId);
                        el("#deleteServPointId").value = ServPointId;
                        $("#deleteServPointModal").modal("show");
                    });
                });
                // End Open Modal For Delete
        });
    });
}
//End fetch all data to my table

if (el(".activeServPoint")) {
    //start activate data
    el(".activeServPoint").addEventListener("click", function (e) {
        e.preventDefault();
        let ServPointId = el("#activeServPointId").value;
        //  console.log(ServPointId);

        axios.get(`activeServPoint/${ServPointId}`).then((response) => {
            el("#message").innerHTML = "<div class='alert bg_color message_animation'>"+ response.data.message+"</div>";
            $("#activeServPointModal").modal("hide");
            fetchServPointData();
        });
    });
}

// //End activate data

//start Delete data

if (el(".deleteServPoint")) {
    el(".deleteServPoint").addEventListener("click", function (e) {
        e.preventDefault();
        let ServPointId = el("#deleteServPointId").value;
        // console.log(ServPointId);

        axios.get(`deleteServPoint/${ServPointId}`).then((response) => {
            el("#message").innerHTML = "<div class='alert bg_color message_animation'>"+ response.data.message+"</div>";
            $("#deleteServPointModal").modal("hide");
            fetchServPointData();
        });
    });
}
//End Delete data

// start Update data
el(".updateServPoint").addEventListener("click", function (e) {
    e.preventDefault();
    ServPointId = el("#editServPointId").value;
    console.log(ServPointId);

    axios
        .post(`/updateServPoint/${ServPointId}`, {
            nameAr: el("#editServPointNameAr").value,
            nameEn: el("#editServPointNameEn").value,
            addressAr: el("#editServPointaddressAr").value,
            addressEn: el("#editServPointaddressEn").value,
            phone: el("#editServPointPhone").value,
            secondPhone: el("#editServPointSecondPhone").value,
            workingHoursAr: el("#editServPointWorkingHourAr").value,
            workingHoursEn: el("#editServPointWorkingHourEn").value,
            lat: el('#latTwo').value,
            lng:el('#lngTwo').value,
            cityId: cityId,
        })
        .then((response) => {
            console.log(response);
            if (response.data.status == 400) {
                var errors = response.data.errors;
                // console.log(errors);
                Object.keys(errors).forEach((key) => {
                    // console.log(key);

                    var input = "#editServPointForm input[name=" + key + "]";
                    el(input + "+span").innerText = errors[key];
                });
            } else if (response.data.status == 404) {
                el("#updateServPoint").innerHTML = "";
                el("#message").innerHTML = "<div class='alert alert-danger message_animation'>"+ response.data.message+"</div>";
                el("#message").innerText = response.data.message;
            } else {
                el("#message").innerHTML = "<div class='alert bg_color message_animation'>"+ response.data.message+"</div>";
                // el("#editServPointModal").classList.remove("show");
                // el("#editServPointModal").classList.add('hide');
                // el("#editServPointModal").style='display:none';
                $("#editServPointModal").modal("hide");
                fetchServPointData();
            }
        });
});
// End Update data

// start Add Data
el(".addServPoint").addEventListener("click", function (e) {
    e.preventDefault();
    axios
        .post(`/addServPoint`, {
            nameAr: el("#addServPointNameAr").value,
            nameEn: el("#addServPointNameEn").value,
            addressAr: el("#addServPointAddressAr").value,
            addressEn: el("#addServPointAddressEn").value,
            phone: el("#addServPointPhone").value,
            secondPhone: el("#addServPointSecondPhone").value,
            workingHoursAr: el("#addServPointWorkingHourAr").value,
            workingHoursEn: el("#addServPointWorkingHourEn").value,
            lat: el('#lat').value,
            lng:el('#lng').value,
            cityId: cityId,
            active: el("#addServPointActive").value,
        })
        .then((response) => {
            console.log(response);
            if (response.data.status == 400) {
                var errors = response.data.errors;
                // console.log(response.data.errors);
                Object.keys(errors).forEach((key) => {
                    // console.log(key);
                    var input = "#addServPointForm input[name=" + key + "]";
                    el(input + "+span").innerText = errors[key];
                });
            } else {
                el("#message").innerHTML = "<div class='alert bg_color message_animation'>"+ response.data.message+"</div>";
                $("#addServPointModal").modal("hide");
                el("#addServPointForm input").value = "";
                fetchServPointData();
            }
        });
});
// End Add Data
