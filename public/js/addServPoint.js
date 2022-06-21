/**
 * @returns {HTMLElement}
 */
 const el = (element) => document.querySelector(element);

 /**
  * @returns {NodeListOf<HTMLElementTagNameMap[K]>}
  */
 const els = (element) => document.querySelectorAll(element);

// Id = localStorage.getItem('cityId');
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
            cityId: localStorage.getItem('cityId'),
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
                el("#message").innerHTML = "";
                el("#message").classList.add("alert");
                el("#message").classList.add("alert-success");
                el("#message").innerText = response.data.message;
                $("#addCityModal").modal("hide");
                el("#addCityForm input").value = "";
                fetchServPointData();
            }
        });
});
// End Add Data