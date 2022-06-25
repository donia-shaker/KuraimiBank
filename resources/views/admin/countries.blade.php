@extends('admin.layout.dashboard')
@section('content')
<!-- Basic Bootstrap Table -->
<div class="" role="alert" id="message">
</div>
<div class="card p-3" id="Country">
    <h2 name="tableName m-5">الدول التي تتواجد فيها الخدمة</h2>
    <button type="button" class="btn btn-primary m-4 w-25"
    data-bs-toggle="modal" data-bs-target="#addCountryModal" id="addCountry"> اضافه دولة </button>
    <x-table>
      <div class="table-responsive text-nowrap">
        <table class="table " >
          <x-slot name="tableHead">
            <tr>
              <th>#</th>
              <th>اسم الدولة</th>
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
  
<!-- Add Country Modal -->
<div class="modal fade" id="addCountryModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
    <div class="modal-content p-3 p-md-5">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-4">
          <h4 class="modal-title"></h4>
          <p>اضف دولة للموقع</p>
        </div>
        <form id="addCountryForm" class="row g-3" action="" method="POST" enctype="multipart/form-data">
          @csrf
            <div>
              <label for="defaultFormControlInput" class="form-label">  الاسم (عربي)</label>
              <input type="text" name="nameAr" class="form-control  name ar" id="addCountryNameAr" placeholder="اضف اسم الخدمة" aria-describedby="defaultFormControlHelp" />
              <span class="help-block text-danger"></span>
            </div>
            <div>
              <label for="defaultFormControlInput" class="form-label">الاسم (انجليزي)</label>
              <input type="text" name="nameEn" class="form-control  name en" id="addCountryNameEn" placeholder="اضف اسم الخدمة" aria-describedby="defaultFormControlHelp" />
              <span class="help-block text-danger"></span>
            </div>
          <div class="col-12 text-center">
            <button type="submit"  class="btn btn-primary me-sm-3 me-1 mt-3 addCountry">اضافة</button>
            <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--/ Add Country Modal -->

  <!-- Updat Country Modal -->
  <div class="modal fade" id="editCountryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h4 class="modal-title" id="userCrudModal"></h4>
            <p>تعديل الخدمة  </p>
          </div>
          <form id="updateCountry" class="row g-3" action="updateCountry" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="editCountryId" >
              <div>
                <label for="defaultFormControlInput" class="form-label">  الاسم (عربي)</label>
                <input type="text" name="nameAr" class="form-control name ar" id="editCountryNameAr"  placeholder="اضف اسم الخدمة" aria-describedby="defaultFormControlHelp" />
                <span class="help-block text-danger"></span>
              </div>
              <div>
                <label for="defaultFormControlInput" class="form-label">الاسم (انجليزي)</label>
                <input type="text" name="nameEn" class="form-control"  id="editCountryNameEn" placeholder="اضف اسم الخدمة" aria-describedby="defaultFormControlHelp" />
                <span class="help-block text-danger"></span>
              </div>
            <div class="col-12 text-center">
              <button type="submit" class="btn btn-primary me-sm-3 me-1 mt-3 updateCountry">تعديل</button>
              <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--/ Updat Country Modal -->

<!-- Active Country Modal -->
  <div class="modal fade activeCountryModal" id="activeCountryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h4 class="modal-title" id="userCrudModal">هل انت متاكد انك تريد تغيير حاله الخدمة</h4>
            <p>تغيير حالة الخدمة  </p>
          </div>
          <form id="activeCountry" class="row g-3" action="activeCountry" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="activeCountryId" class="activeCountryId" value="" >
            <div class="col-12 text-center">
              <button type="submit" id="submit" class="btn btn-primary me-sm-3 me-1 mt-3 activeCountry">تغيير الحالة</button>
              <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<!--/ Updat Country Modal -->

<!-- Delete Country Modal -->
<div class="modal fade deleteCountryModal" id="deleteCountryModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
    <div class="modal-content p-3 p-md-5">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-4">
          <h4 class="modal-title" id="userCrudModal">هل انت متاكد انك تريد حذف الخدمة</h4>
          <p>في حال الموافقه سوف يتم حذف الصنف بشكل نهائي ولن تستطيع التراجع  </p>
        </div>
        <form id="deleteCountryId" class="row g-3" action="deleteCountry" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" id="deleteCountryId" class="deleteCountryId" value="" >
          <div class="col-12 text-center">
            <button type="submit" id="submit" class="btn btn-primary me-sm-3 me-1 mt-3 deleteCountry">حذف الصنف</button>
            <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--/ Delete Country Modal -->
@endsection
@section('javascript')
<script  src="{{URL::asset('js/countries.js')}}"></script>
@endsection