@extends('admin.layout.dashboard')
@section('content')
<!-- Basic Bootstrap Table -->
<div class="" role="alert" id="message">
</div>
<div class="card p-3" id="mainCategory">
    <h2 name="tableName m-5">الخدمات الرئيسية</h2>
    <button type="button" class="btn btn-primary m-4 w-25"
    data-bs-toggle="modal" data-bs-target="#addMainCategoryModal" id="addCategory"> اضافه خدمه </button>
    <x-table>
      <div class="table-responsive text-nowrap">
        <table class="table " >
          <x-slot name="tableHead">
            <tr>
              <th>#</th>
              <th>(ar)الخدمات الرئيسيه</th>
              <th>(en)الخدمات الرئيسيه</th>
              <th>الخدمات الفرعيه</th>
              <th>الحاله</th>
              <th>العمليات</th>
            </tr>
          </x-slot>
          <x-slot name="tableBody" id="tbody" >
            
          </x-slot>
        </table>
      </div>
    </x-table>
</div>
  <!--/ Basic Bootstrap Table -->
  
  <!-- Add Category Modal -->
<div class="modal fade" id="addMainCategoryModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
    <div class="modal-content p-3 p-md-5">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-4">
          <h4 class="modal-title" id="userCrudModal"></h4>
          <p>اضف خدمة جديدة للموقع</p>
        </div>
        <form id="addMainCategoryForm" class="row g-3" action="" method="POST" enctype="multipart/form-data">
          @csrf
            <div>
              <label for="defaultFormControlInput" class="form-label">  الاسم (عربي)</label>
              <input type="text" name="nameAr" class="form-control  name ar" id="addCategoryNameAr" placeholder="اضف اسم الخدمة" aria-describedby="defaultFormControlHelp" />
              <span class="help-block text-danger"></span>
            </div>
            <div>
              <label for="defaultFormControlInput" class="form-label">الاسم (انجليزي)</label>
              <input type="text" name="nameEn" class="form-control  name en" id="addCategoryNameEn" placeholder="اضف اسم الخدمة" aria-describedby="defaultFormControlHelp" />
              <span class="help-block text-danger"></span>
            </div>
          <div class="col-12 my-4">
            <label class="switch">
              <input type="checkbox" class="switch-input active" name="active" id="addCategoryActive" value="1">
              <span class="switch-toggle-slider">
                <span class="switch-on"></span>
                <span class="switch-off"></span>
              </span>
              <span class="switch-label"  >تفعيل </span>
            </label>
          </div>
          <div class="col-12 text-center">
            <button type="submit"  class="btn btn-primary me-sm-3 me-1 mt-3 addMainCategory">اضافة</button>
            <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--/ Add Category Modal -->

  <!-- Updat Category Modal -->
  <div class="modal fade" id="editMainCategoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h4 class="modal-title" id="userCrudModal"></h4>
            <p>تعديل الخدمة  </p>
          </div>
          <form id="updateMainCategory" class="row g-3" action="updateMainCategory" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="editCategoryId" >
              <div>
                <label for="defaultFormControlInput" class="form-label">  الاسم (عربي)</label>
                <input type="text" name="nameAr" class="form-control name ar" id="editCategoryNameAr"  placeholder="اضف اسم الخدمة" aria-describedby="defaultFormControlHelp" />
                <span class="help-block text-danger"></span>
              </div>
              <div>
                <label for="defaultFormControlInput" class="form-label">الاسم (انجليزي)</label>
                <input type="text" name="nameEn" class="form-control"  id="editCategoryNameEn" placeholder="اضف اسم الخدمة" aria-describedby="defaultFormControlHelp" />
                <span class="help-block text-danger"></span>
              </div>
            <div class="col-12 my-4">
              <label class="switch">
                <input type="checkbox" class="switch-input active" name="active" id="editCategoryActive" value="1">
                <span class="switch-toggle-slider">
                  <span class="switch-on"></span>
                  <span class="switch-off"></span>
                </span>
                <span class="switch-label"  >تفعيل </span>
              </label>
            </div>
            <div class="col-12 text-center">
              <button type="submit" class="btn btn-primary me-sm-3 me-1 mt-3 updateMainCategory">تعديل</button>
              <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--/ Updat Category Modal -->

<!-- Active Category Modal -->
  <div class="modal fade activeCategoryModal" id="activeCategoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h4 class="modal-title" id="userCrudModal">هل انت متاكد انك تريد تغيير حاله الخدمة</h4>
            <p>تغيير حالة الخدمة  </p>
          </div>
          <form id="activeCategory" class="row g-3" action="activeCategory" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="activecategoryId" class="activecategoryId" value="" >
            <div class="col-12 text-center">
              <button type="submit" id="submit" class="btn btn-primary me-sm-3 me-1 mt-3 activeCategory">تغيير الحالة</button>
              <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<!--/ Updat Category Modal -->

<!-- Delete Category Modal -->
<div class="modal fade deleteCategoryModal" id="deleteCategoryModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
    <div class="modal-content p-3 p-md-5">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-4">
          <h4 class="modal-title" id="userCrudModal">هل انت متاكد انك تريد حذف الخدمة</h4>
          <p>في حال الموافقه سوف يتم حذف الصنف بشكل نهائي ولن تستطيع التراجع  </p>
        </div>
        <form id="deleteCategoryId" class="row g-3" action="deleteCategory" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" id="deleteCategoryId" class="deleteCategoryId" value="" >
          <div class="col-12 text-center">
            <button type="submit" id="submit" class="btn btn-primary me-sm-3 me-1 mt-3 deleteCategory">حذف الصنف</button>
            <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--/ Delete Category Modal -->
@endsection
@extends('admin.layout.dashboard')
@section('javascript')
<script  src="{{URL::asset('js/mainCategory.js')}}"></script>
@endsection