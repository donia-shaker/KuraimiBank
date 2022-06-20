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
    axios.get("/fetchCategory").then((response) => {
        var i = 0;
        el("#mainCategory tbody").innerHTML = "";
        var categoryRes = response.data.categories;
        categoryRes.forEach((item) => {
            i++;
            var tableContentOne = ` <tr>
            <td> ${i} </td>
            <td> <i></i> ${item.name.ar}</td>
            <td> <i></i> ${item.name.en}</td>
            <td>
                <a href="subCategory/${item.id}#${item.id}" style="color:#03c3ec99">
                انقر لعرض الخدمات الفرعيه</a>
            </td>`;
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

            el("tbody").innerHTML += tableContentOne + tableContentTwo + tableContentThree;

            // Start Open Modal For Edit
            els(".editCategory").forEach((element) => {
                // console.log(element);
                element.addEventListener("click", function (e) {
                    e.preventDefault();
                    var categoryId = element.getAttribute("value");
                    console.log(categoryId);
                    $("#editMainCategoryModal").modal("show");
                    // el("#editMainCategoryModal").classList.add('show');
                    // el("#editMainCategoryModal").style='display:block';

                    axios.get(`editCategory/${categoryId}`).then((response) => {
                        // console.log(response);
                        if (response.status == 400) {
                            el("#message").innerHTML = "";
                            el("#message").classList.add("alert");
                            el("#message").classList.add("alert-danger");
                        } else {
                            el("#editCategoryId").value = categoryId;
                            el("#editCategoryNameEn").value =
                                response.data.category.name.en;
                            el("#editCategoryNameAr").value =
                                response.data.category.name.ar;
                            el("#editCategoryActive").value =
                                response.data.category.active;
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
                    el("#activecategoryId").value = categoryId;
                    $("#activeCategoryModal").modal("show");
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

//start activate data
el(".activeCategory").addEventListener("click", function (e) {
    e.preventDefault();
    let categoryId = el("#activecategoryId").value;
    console.log(categoryId);

    axios.post(`activeCategory/${categoryId}`).then((response) => {
        el("#message").innerHTML = "";
        el("#message").classList.add("alert");
        el("#message").classList.add("alert-success");
        el("#message").innerText = response.data.message;
        $("#activeCategoryModal").modal("hide");
        fetchData();
    });
});
//End activate data

//start Delete data
el(".deleteCategory").addEventListener("click", function (e) {
    e.preventDefault();
    let categoryId = el("#deleteCategoryId").value;
    console.log(categoryId);

    axios.post(`deleteCategory/${categoryId}`).then((response) => {
        el("#message").innerHTML = "";
        el("#message").classList.add("alert");
        el("#message").classList.add("alert-success");
        el("#message").innerText = response.data.message;
        $("#deleteCategoryModal").modal("hide");
        fetchData();
    });
});
//End Delete data

// start Update data
el(".updateMainCategory").addEventListener("click", function (e) {
    e.preventDefault();
    categoryId = el("#editCategoryId").value;

    axios
        .put(`updateMainCategory/${categoryId}`, {
            nameEn: el("#editCategoryNameEn").value,
            nameAr: el("#editCategoryNameAr").value,
            active: el("#editCategoryActive").value,
        })
        .then((response) => {
            console.log(response);
            if (response.data.status == 400) {
                var errors = response.data.errors;
                // console.log(errors);
                Object.keys(errors).forEach((key) => {
                    console.log(key);

                    var input = "#updateMainCategory input[name=" + key + "]";
                    el(input + "+span").innerText = errors[key];
                });
            } else if (response.data.status == 404) {
                el("#updateMainCategory").innerHTML = "";
                el("#message").classList.add("alert");
                el("#message").classList.add("alert-danger");
                el("#message").innerText = response.data.message;
            } else {
                el("#message").innerHTML = "";
                el("#message").classList.add("alert");
                el("#message").classList.add("alert-success");
                el("#message").innerText = response.data.message;
                el("#editMainCategoryModal").classList.remove("show");
                // el("#editMainCategoryModal").classList.add('hide');
                // el("#editMainCategoryModal").style='display:none';
                $("#editMainCategoryModal").modal("hide");
                fetchData();
            }
        });
});
// End Update data

// start Add Data
el(".addMainCategory").addEventListener("click", function (e) {
    e.preventDefault();
    axios
        .post(`addCategory`, {
            nameEn: el("#addCategoryNameEn").value,
            nameAr: el("#addCategoryNameAr").value,
            active: el("#addCategoryActive").value,
        })
        .then((response) => {
            // console.log(response);
            if (response.data.status == 400) {
                var errors = response.data.errors;
                // console.log(response.data.errors);
                Object.keys(errors).forEach((key) => {
                    console.log(key);
                    var input = "#addMainCategoryForm input[name=" + key + "]";
                    el(input + "+span").innerText = errors[key];
                });
            } else {
                el("#message").innerHTML = "";
                el("#message").classList.add("alert");
                el("#message").classList.add("alert-success");
                el("#message").innerText = response.data.message;
                $("#addMainCategoryModal").modal("hide");
                el("#addMainCategoryForm input").value = "";
                fetchData();
            }
        });
});
// End Add Data
