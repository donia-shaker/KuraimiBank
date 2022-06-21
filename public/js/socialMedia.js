/**
 * @returns {HTMLElement}
 */
const el = (element) => document.querySelector(element);

/**
 * @returns {NodeListOf<HTMLElementTagNameMap[K]>}
 */
const els = (element) => document.querySelectorAll(element);

//start fetch all data to my table
fetchData();
function fetchData() {
    axios.get("/fetchSocialMedia").then((response) => {
        console.log(response);
        var i = 0;
        el("#socialMedia tbody").innerHTML = "";
        var socialMediaRes = response.data.socialMedia;
        socialMediaRes.forEach((item) => {
            i++;
            var tableContentOne = ` <tr>
             <td> ${i} </td>
             <td> <i></i> ${item.name.ar}</td>
             <td> <i></i> ${item.name.en}</td>
             <td>${item.link}</td>
             <td> <i class="${item.icon}"></i> </td>
             `
             ;
            if (item.is_active) {
                var tableContentTwo = `
                 <td>
                 <label class="switch">
                 <input type="checkbox" class="switch-input activeSocialMediaLink" name="active" checked id="addsocialMediaActive" value="${item.id}">
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
                 <input type="checkbox" class="switch-input activeSocialMediaLink" name="active"  id="addsocialMediaActive" value="${item.id}">
                 <span class="switch-toggle-slider">
                     <span class="switch-on"></span>
                     <span class="switch-off"></span>
                 </span>
                 </label>
                 </td>`;
            }
            var tableContentThree = `
             <td>
                 <a class="btn btn-icon btn-outline-success  editSocialMedia"
                     value= " ${item.id}" href="javascript:void(0);"><i class=" bx bx-edit-alt me-2"></i>
                 </a>
                 <a class="btn btn-icon btn-outline-dribbble mx-2 deletSocialMediaLink" 
                     value= "${item.id}"  href="javascript:void(0);"><i class=" bx bx-trash me-2"></i>
                 </a>
             </td>
             </tr>`;

            el("tbody").innerHTML +=
                tableContentOne + tableContentTwo + tableContentThree;

            // Start Open Modal For Edit
            els(".editSocialMedia").forEach((element) => {
                // console.log(element);
                element.addEventListener("click", function (e) {
                    e.preventDefault();
                    var socialMediaId = element.getAttribute("value");
                    console.log(socialMediaId);
                    $("#editSocialMediaModal").modal("show");
                    // el("#editSocialMediaModal").classList.add('show');
                    // el("#editSocialMediaModal").style='display:block';

                    axios.get(`editSocialMedia/${socialMediaId}`).then((response) => {
                        // console.log(response);
                        if (response.status == 400) {
                            el("#message").innerHTML = "";
                            el("#message").classList.add("alert");
                            el("#message").classList.add("alert-danger");
                        } else {
                            el("#editSocialMediaId").value = socialMediaId;
                            el("#editSocialMediaNameEn").value =
                                response.data.socialMedia.name.en;
                            el("#editSocialMediaNameAr").value =
                                response.data.socialMedia.name.ar;
                            el("#editSocialMediaLink").value =
                                response.data.socialMedia.link;
                            el("#editSocialMediaIcon").value =
                                response.data.socialMedia.icon;
                            el("#editSocialMediaActive").value =
                                response.data.socialMedia.active;
                        }
                    });
                });
            });
            // End Open Modal For Edit

            // Start Open Modal For Active
            els(".activeSocialMediaLink").forEach((element) => {
                // console.log(element);
                element.addEventListener("click", function (e) {
                    e.preventDefault();
                    var socialMediaId = element.getAttribute("value");
                    console.log(socialMediaId);
                    el("#activeSocialMediaId").value = socialMediaId;
                    $("#activeSocialMediaModal").modal("show");
                });
            });
            // End Open Modal For Active

            // Start Open Modal For Delete
            els(".deletSocialMediaLink").forEach((element) => {
                // console.log(element);
                element.addEventListener("click", function (e) {
                    e.preventDefault();
                    var socialMediaId = element.getAttribute("value");
                    console.log(socialMediaId);
                    el("#deleteSocialMediaId").value = socialMediaId;
                    $("#deleteSocialMediaModal").modal("show");
                });
            });
            // End Open Modal For Delete
        });
    });
}
//End fetch all data to my table

//start activate data
el(".activeSocialMedia").addEventListener("click", function (e) {
    e.preventDefault();
    let socialMediaId = el("#activeSocialMediaId").value;
    console.log(socialMediaId);

    axios.post(`activeSocialMedia/${socialMediaId}`).then((response) => {
        el("#message").innerHTML = "";
        el("#message").classList.add("alert");
        el("#message").classList.add("alert-success");
        el("#message").innerText = response.data.message;
        $("#activeSocialMediaModal").modal("hide");
        fetchData();
    });
});
//End activate data

//start Delete data
el(".deleteSocialMedia").addEventListener("click", function (e) {
    e.preventDefault();
    let socialMediaId = el("#deleteSocialMediaId").value;
    console.log(socialMediaId);

    axios.post(`deleteSocialMedia/${socialMediaId}`).then((response) => {
        el("#message").innerHTML = "";
        el("#message").classList.add("alert");
        el("#message").classList.add("alert-success");
        el("#message").innerText = response.data.message;
        $("#deleteSocialMediaModal").modal("hide");
        fetchData();
    });
});
//End Delete data

// start Update data
el(".updateSocialMedia").addEventListener("click", function (e) {
    e.preventDefault();
    socialMediaId = el("#editSocialMediaId").value;

    axios
        .put(`updateSocialMedia/${socialMediaId}`, {
            nameEn: el("#editSocialMediaNameEn").value,
            nameAr: el("#editSocialMediaNameAr").value,
            link: el("#editSocialMediaIcon").value,
            icon: el("#editSocialMediaLink").value,
            active: el("#editSocialMediaActive").value,
        })
        .then((response) => {
            console.log(response);
            if (response.data.status == 400) {
                var errors = response.data.errors;
                // console.log(errors);
                Object.keys(errors).forEach((key) => {
                    console.log(key);

                    var input = "#updateSocialMedia input[name=" + key + "]";
                    el(input + "+span").innerText = errors[key];
                });
            } else if (response.data.status == 404) {
                el("#updateSocialMedia").innerHTML = "";
                el("#message").classList.add("alert");
                el("#message").classList.add("alert-danger");
                el("#message").innerText = response.data.message;
            } else {
                el("#message").innerHTML = "";
                el("#message").classList.add("alert");
                el("#message").classList.add("alert-success");
                el("#message").innerText = response.data.message;
                el("#editSocialMediaModal").classList.remove("show");
                // el("#editSocialMediaModal").classList.add('hide');
                // el("#editsocialMediaModal").style='display:none';
                $("#editSocialMediaModal").modal("hide");
                fetchData();
            }
        });
});
// End Update data

// start Add Data
el(".addSocialMedia").addEventListener("click", function (e) {
    e.preventDefault();
    axios
        .post(`/addSocialMedia`, {
            nameEn: el("#addSocialMediaNameEn").value,
            nameAr: el("#addSocialMediaNameAr").value,
            link: el("#addSocialMediaLink").value,
            icon: el("#addSocialMediaIcon").value,
        })
        .then((response) => {
            console.log(response);
            if (response.data.status == 400) {
                var errors = response.data.errors;
                // console.log(response.data.errors);
                Object.keys(errors).forEach((key) => {
                    console.log(key);
                    var input = "#addSocialMediaForm input[name=" + key + "]";
                    el(input + "+span").innerText = errors[key];
                });
            } else {
                el("#message").innerHTML = "";
                el("#message").classList.add("alert");
                el("#message").classList.add("alert-success");
                el("#message").innerText = response.data.message;
                $("#addSocialMediaModal").modal("hide");
                el("#addSocialMediaForm input").value = "";
                fetchData();
            }
        });
});
// End Add Data
