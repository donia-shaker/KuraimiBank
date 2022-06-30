/**
 * @returns {HTMLElement}
 */
const el = (element) => document.querySelector(element);

/**
 * @returns {NodeListOf<HTMLElementTagNameMap[K]>}
 */
const els = (element) => document.querySelectorAll(element);

// another file

const isLocaleEn = location.href.search('/en/') != -1;

//start fetch all data to my table
var mainCategoryId = location.hash.slice(1);
// console.log(mainCategoryId);

fetchSubCategoryData();
function fetchSubCategoryData() {
    axios.get(`/fetchSubCategory/${mainCategoryId}`).then((response) => {
        // console.log (response);
        var i = 0;
        el("tbody").innerHTML = "";
        var categoryRes = response.data.categories;
        categoryRes.forEach((item) => {
            i++;
            var tableContentOne = ` <tr>
             <td> ${i} </td>
             <td> <i></i> ${isLocaleEn ? item.name.en : item.name.ar}</td>
             `;
            if (item.is_active) {
                var tableContentTwo = `
                 <td>
                 <label class="switch">
                 <input type="checkbox" class="switch-input activeCategoryLink" name="active" checked id="addCategoryActive" value="${item.id}">
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
                 <input type="checkbox" class="switch-input activeCategoryLink" name="active"  id="addCategoryActive" value="${item.id}">
                 <span class="switch-toggle-slider">
                     <span class="switch-on"></span>
                     <span class="switch-off"></span>
                 </span>
                 </label>
                 </td>`;
            }
            var tableContentThree = `
             <td>
                 <a class="btn btn-icon btn-outline-success  editCategory"
                     value= " ${item.id}" href="javascript:void(0);"><i class=" bx bx-edit-alt me-2"></i>
                 </a>
                 <a class="btn btn-icon btn-outline-dribbble mx-2 deletCategoryLink" 
                     value= "${item.id}"  href="javascript:void(0);"><i class=" bx bx-trash me-2"></i>
                 </a>
             </td>
             </tr>`;

            el("tbody").innerHTML +=
                tableContentOne + tableContentTwo + tableContentThree;

            // Start Open Modal For Edit
            els(".editCategory").forEach((element) => {
                // console.log(element);
                element.addEventListener("click", function (e) {
                    e.preventDefault();
                    var categoryId = element.getAttribute("value");
                    console.log(categoryId);
                    $("#editSubCategoryModal").modal("show");
                    // el("#editMainCategoryModal").classList.add('show');
                    // el("#editMainCategoryModal").style='display:block';

                    axios
                        .get(`editSubCategory/${categoryId}`)
                        .then((response) => {
                            console.log(response);
                            if (response.status == 400) {
                                el("#message").innerHTML = "<div class='alert alert-danger message_animation'>"+ response.data.message+"</div>";
                            } else {
                                el("#editCategoryId").value = categoryId;
                                el("#editCategoryNameEn").value =
                                    response.data.category.name.en;
                                el("#editCategoryNameAr").value =
                                    response.data.category.name.ar;
                            }
                        });
                });
            });
            // End Open Modal For Edit

            // Start Open Modal For Active
            els(".activeCategoryLink").forEach((element) => {
                // console.log(element);
                element.addEventListener("click", function (e) {
                    e.preventDefault();
                    var categoryId = element.getAttribute("value");
                    console.log(categoryId);
                    el("#activeSubCategoryId").value = categoryId;
                    $("#activeSubCategoryModal").modal("show");
                });
            });
            // End Open Modal For Active

            // Start Open Modal For Delete
            els(".deletCategoryLink").forEach((element) => {
                // console.log(element);
                element.addEventListener("click", function (e) {
                    e.preventDefault();
                    var categoryId = element.getAttribute("value");
                    console.log(categoryId);
                    el("#deleteCategoryId").value = categoryId;
                    $("#deleteCategoryModal").modal("show");
                });
            });
            // End Open Modal For Delete
        });
    });
}
//End fetch all data to my table

if (el(".activeSubCategory")) {
    //start activate data
    el(".activeSubCategory").addEventListener("click", function (e) {
        e.preventDefault();
        let categoryId = el("#activeSubCategoryId").value;
        console.log(categoryId);

        axios.get(`activeSubCategory/${categoryId}`).then((response) => {
            el("#message").innerHTML = "<div class='alert bg_color message_animation'>"+ response.data.message+"</div>";
            $("#activeSubCategoryModal").modal("hide");
            fetchSubCategoryData();
        });
    });
}

//End activate data

//start Delete data

if (el(".deleteCategory")) {
    el(".deleteCategory").addEventListener("click", function (e) {
        e.preventDefault();
        let categoryId = el("#deleteCategoryId").value;
        console.log(categoryId);

        axios.get(`deleteSubCategory/${categoryId}`).then((response) => {
            el("#message").innerHTML = "<div class='alert bg_color message_animation'>"+ response.data.message+"</div>";
            $("#deleteCategoryModal").modal("hide");
            fetchSubCategoryData();
        });
    });
}
//End Delete data

// start Update data
el(".updateSubCategory").addEventListener("click", function (e) {
    e.preventDefault();
    categoryId = el("#editCategoryId").value;

    axios
        .put(`updateSubCategory/${categoryId}`, {
            nameEn: el("#editCategoryNameEn").value,
            nameAr: el("#editCategoryNameAr").value,
            parentId: mainCategoryId,
        })
        .then((response) => {
            console.log(response);
            if (response.data.status == 400) {
                var errors = response.data.errors;
                // console.log(errors);
                Object.keys(errors).forEach((key) => {
                    console.log(key);

                    var input = "#updateSubCategory input[name=" + key + "]";
                    el(input + "+span").innerText = errors[key];
                });
            } else if (response.data.status == 404) {
                el("#updateSubCategory").innerHTML = "";
                el("#message").innerHTML = "<div class='alert alert-danger message_animation'>"+ response.data.message+"</div>";
            } else {
                el("#message").innerHTML = "<div class='alert bg_color message_animation'>"+ response.data.message+"</div>";
                el("#editSubCategoryModal").classList.remove("show");
                // el("#editSubCategoryModal").classList.add('hide');
                // el("#editSubCategoryModal").style='display:none';
                $("#editSubCategoryModal").modal("hide");
                fetchSubCategoryData();
            }
        });
});
// End Update data

// start Add Data
el(".addSUbCategory").addEventListener("click", function (e) {
    e.preventDefault();
    axios
        .post(`addSubCategory`, {
            nameEn: el("#addCategoryNameEn").value,
            nameAr: el("#addCategoryNameAr").value,
            parentId: mainCategoryId,
        })
        .then((response) => {
            console.log(response);
            if (response.data.status == 400) {
                var errors = response.data.errors;
                // console.log(response.data.errors);
                Object.keys(errors).forEach((key) => {
                    console.log(key);
                    var input = "#addSubCategoryForm input[name=" + key + "]";
                    el(input + "+span").innerText = errors[key];
                });
            } else {
                el("#message").innerHTML = "<div class='alert bg_color message_animation'>"+ response.data.message+"</div>";
                $("#addSubCategoryModal").modal("hide");
                el("#addSubCategoryForm input").value = "";
                fetchSubCategoryData();
            }
        });
});
// // End Add Data
