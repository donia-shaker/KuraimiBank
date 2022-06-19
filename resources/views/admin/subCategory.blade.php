@extends('admin.layout.dashboard')
@section('content')
<!-- Basic Bootstrap Table -->
<div class="" role="alert" id="message">
</div>
<div class="card">
    <h1 name="tableName">Table Basic</h1>
    <button type="button" class="btn btn-primary m-4 w-25"
    data-bs-toggle="modal" data-bs-target="#categoryModal" id="addCategory"> اضافه خدمه </button>
    <x-table>
      <div class="table-responsive text-nowrap">
        <table class="table">
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
  <!-- Add New Credit Card Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
    <div class="modal-content p-3 p-md-5">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-4">
          <h4 class="modal-title" id="userCrudModal"></h4>
          <p>اضف خدمة جديدة للموقع</p>
        </div>
        <form id="addCategoryForm" class="row g-3" action="addCategory" method="POST" enctype="multipart/form-data">
          @csrf
            <div>
              <label for="defaultFormControlInput" class="form-label">  الاسم (عربي)</label>
              <input type="text" name="name[ar]" class="form-control" id="name.ar" placeholder="اضف اسم الخدمة" aria-describedby="defaultFormControlHelp" />
              <span class="help-block"><strong></strong></span>
            </div>
            <div>
              <label for="defaultFormControlInput" class="form-label">الاسم (انجليزي)</label>
              <input type="text" name="name[en]" class="form-control" id="name.en" placeholder="اضف اسم الخدمة" aria-describedby="defaultFormControlHelp" />
              <span class="help-block"><strong></strong></span>
            </div>
          <div class="col-12 my-4">
            <label class="switch">
              <input type="checkbox" class="switch-input" name="active" id="active" value="1">
              <span class="switch-toggle-slider">
                <span class="switch-on"></span>
                <span class="switch-off"></span>
              </span>
              <span class="switch-label"  >تفعيل </span>
            </label>
          </div>
          <div class="col-12 text-center">
            <button type="submit" id="submit" class="btn btn-primary me-sm-3 me-1 mt-3">اضافة</button>
            <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--/ Add New Credit Card Modal -->

  <!-- Updat New Credit Card Modal -->
  <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h4 class="modal-title" id="userCrudModal"></h4>
            <p>تعديل الخدمة  </p>
          </div>
          <form id="updateCategory" class="row g-3" action="updateCategory" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="editCategoryId" >
              <div>
                <label for="defaultFormControlInput" class="form-label">  الاسم (عربي)</label>
                <input type="text" name="nameAr" class="form-control" id="editNameAr" placeholder="اضف اسم الخدمة" aria-describedby="defaultFormControlHelp" />
                <span class="help-block"><strong></strong></span>
              </div>
              <div>
                <label for="defaultFormControlInput" class="form-label">الاسم (انجليزي)</label>
                <input type="text" name="nameEn" class="form-control" id="editNameEn" placeholder="اضف اسم الخدمة" aria-describedby="defaultFormControlHelp" />
                <span class="help-block"><strong></strong></span>
              </div>
            <div class="col-12 my-4">
              <label class="switch">
                <input type="checkbox" class="switch-input" name="active" id="editActive" value="1">
                <span class="switch-toggle-slider">
                  <span class="switch-on"></span>
                  <span class="switch-off"></span>
                </span>
                <span class="switch-label"  >تفعيل </span>
              </label>
            </div>
            <div class="col-12 text-center">
              <button type="submit" id="submit" class="btn btn-primary me-sm-3 me-1 mt-3 updateCategory">تعديل</button>
              <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--/ Updat New Credit Card Modal -->

   <!-- Active New Credit Card Modal -->
   <div class="modal fade" id="activeCategoryModal" tabindex="-1" aria-hidden="true">
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
            <input type="hidden" id="deletcategoryId" >
            <div class="col-12 text-center">
              <button type="submit" id="submit" class="btn btn-primary me-sm-3 me-1 mt-3 activeCategory">تغيير الحالة</button>
              <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--/ Updat New Credit Card Modal -->
@endsection