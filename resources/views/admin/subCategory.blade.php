@extends('admin.layout.dashboard')
@section('content')
    <!-- Basic Bootstrap Table -->
    <div class="" role="alert" id="message">
    </div>
    <div class="card p-3">
        <h2 name="tableName m-5">الاقسام الفرعية</h2>
        <button type="button" class="btn color m-4 w-25" data-bs-toggle="modal" data-bs-target="#addSubCategoryModal"
            id="addSubCategory"> اضافة قسم </button>
        <x-table>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <x-slot name="tableHead">
                        <tr>
                            <th>#</th>
                            <th>اسم القسم</th>
                            <th>الحاله</th>
                            <th>العمليات</th>
                        </tr>
                    </x-slot>
                    <x-slot name="tableBody" id="tbody">
                    </x-slot>
                </table>
            </div>
        </x-table>
    </div>
    <!--/ Basic Bootstrap Table -->

    <!-- Add SubCategory Modal -->
    <div class="modal fade" id="addSubCategoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h4 class="modal-title" id="userCrudModal"></h4>
                        <p>اضف قسم جديدة للموقع</p>
                    </div>
                    <form id="addSubCategoryForm" class="row g-3" action="" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="defaultFormControlInput" class="form-label"> الاسم (عربي)</label>
                            <input type="text" name="nameAr" class="form-control  name ar" id="addCategoryNameAr"
                                placeholder="اضف اسم القسم AR" aria-describedby="defaultFormControlHelp" />
                            <span class="help-block text-danger"></span>
                        </div>
                        <div>
                            <label for="defaultFormControlInput" class="form-label">الاسم (انجليزي)</label>
                            <input type="text" name="nameEn" class="form-control  name en" id="addCategoryNameEn"
                                placeholder="اضف اسم القسم EN" aria-describedby="defaultFormControlHelp" />
                            <span class="help-block text-danger"></span>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn color me-sm-3 me-1 mt-3 addSUbCategory">  اضافة القسم</button>
                            <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal"
                                aria-label="Close">الغاء</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/ Add SubCategory Modal -->

    <!-- Updat SubCategory Modal -->
    <div class="modal fade" id="editSubCategoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h4 class="modal-title" id="userCrudModal"></h4>
                        <p>تعديل القسم </p>
                    </div>
                    <form id="updateSubCategory" class="row g-3"  method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="editCategoryId">
                        <div>
                            <label for="defaultFormControlInput" class="form-label"> الاسم (عربي)</label>
                            <input type="text" name="nameAr" class="form-control name ar" id="editCategoryNameAr"
                                placeholder="اضف اسم القسم" aria-describedby="defaultFormControlHelp" />
                            <span class="help-block text-danger"></span>
                        </div>
                        <div>
                            <label for="defaultFormControlInput" class="form-label">الاسم (انجليزي)</label>
                            <input type="text" name="nameEn" class="form-control" id="editCategoryNameEn"
                                placeholder="اضف اسم القسم" aria-describedby="defaultFormControlHelp" />
                            <span class="help-block text-danger"></span>
                        </div>>
                        <div class="col-12 text-center">
                            <button type="submit"
                                class="btn color me-sm-3 me-1 mt-3 updateSubCategory">تعديل</button>
                            <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal"
                                aria-label="Close">الغاء</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/ Updat SubCategory Modal -->

    <!-- Active SubCategory Modal -->
    <div class="modal fade activeSubCategoryModal" id="activeSubCategoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h4 class="modal-title" id="userCrudModal">هل انت متاكد انك تريد تغيير حاله القسم</h4>
                        <p>تغيير حالة القسم </p>
                    </div>
                    <form id="activeSubCategory" class="row g-3" action="activeSubCategory" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="activeSubCategoryId" class="activeSubCategoryId" value="">
                        <div class="col-12 text-center">
                            <button type="submit" id="submit"
                                class="btn color me-sm-3 me-1 mt-3 activeSubCategory">تغيير الحالة</button>
                            <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal"
                                aria-label="Close">الغاء</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/ Updat SubCategory Modal -->

    <!-- Delete SubCategory Modal -->
    <div class="modal fade deleteCategoryModal" id="deleteCategoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h4 class="modal-title" id="userCrudModal">هل انت متاكد انك تريد حذف القسم</h4>
                        <p>في حال الموافقه سوف يتم حذف القسم بشكل نهائي ولن تستطيع التراجع </p>
                    </div>
                    <form id="deleteSubCategoryId" class="row g-3"  method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="deleteCategoryId" class="deleteCategoryId" value="">
                        <div class="col-12 text-center">
                            <button type="submit" id="submit"
                                class="btn color me-sm-3 me-1 mt-3 deleteCategory">حذف القسم</button>
                            <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal"
                                aria-label="Close">الغاء</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/ Delete SubCategory Modal -->
@endsection
@section('javascript')
<script  src="{{URL::asset('js/subCategory.js')}}"></script>
@endsection