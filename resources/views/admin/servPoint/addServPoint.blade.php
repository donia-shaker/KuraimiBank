@extends('admin.layout.dashboard')
@section('content')
<div class="" role="alert" id="message">
</div>
<div class="col-md-12 m-auto">
    <div class="card mb-4 p-4 ">
        <h1 class="text-start fs-3 ">اضافة معلومه نقطة الخدمة</h1>
        <div class="card-body demo-vertical-spacing demo-only-element">

            <form id="addServPointForm" class="row g-3" action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <label for="defaultFormControlInput" class="form-label"> الاسم (عربي)</label>
                    <input type="text" name="nameAr" class="form-control  name ar" id="addServPointNameAr"
                        placeholder="اضف نقطة الخدمة" aria-describedby="defaultFormControlHelp" />
                        <span class="help-block text-danger"></span>
                </div>
                <div class="col-md-6">
                    <label for="defaultFormControlInput" class="form-label">الاسم (انجليزي)</label>
                    <input type="text" name="nameEn" class="form-control  " id="addServPointNameEn"
                        placeholder="اضف نقطة الخدمة" aria-describedby="defaultFormControlHelp" />
                        <span class="help-block text-danger"></span>
                </div>
                <div class="col-md-6">
                    <label for="defaultFormControlInput" class="form-label">العنوان (انجليزي)</label>
                    <input type="text" name="addressAr" class="form-control  " id="addServPointAddressAr"
                        placeholder="اضف عنوان نقطة الخدمة" aria-describedby="defaultFormControlHelp" />
                        <span class="help-block text-danger"></span>
                    
                </div>
                <div class="col-md-6">
                    <label for="defaultFormControlInput" class="form-label">العنوان (انجليزي)</label>
                    <input type="text" name="addressEn" class="form-control  " id="addServPointAddressEn"
                        placeholder="اضف عنوان نقطة الخدمة" aria-describedby="defaultFormControlHelp" />
                        <span class="help-block text-danger"></span>
                    
                </div>
                <div class="col-md-6">
                    <label for="defaultFormControlInput" class="form-label">الهاتف</label>
                    <input type="text" name="phone" class="form-control  " id="addServPointPhone"
                        placeholder="اضف نقطة الخدمة" aria-describedby="defaultFormControlHelp" />
                        <span class="help-block text-danger"></span>
                    
                </div>
                <div class="col-md-6">
                    <label for="defaultFormControlInput" class="form-label">هاتف اخر</label>
                    <input type="text" name="secondPhone" class="form-control " id="addServPointSecondPhone"
                        placeholder="اضف نقطة الخدمة" aria-describedby="defaultFormControlHelp" />
                        <span class="help-block text-danger"></span>
                    
                </div>
                <div class="col-md-6">
                    <label for="defaultFormControlInput" class="form-label">( العربي)ساعات العمل</label>
                    <input type="text" name="workingHoursAr" class="form-control  "
                        id="addServPointWorkingHourAr" placeholder="ساعات العمل"
                        aria-describedby="defaultFormControlHelp" />
                        <span class="help-block text-danger"></span>
                    
                </div>
                <div class="col-md-6">
                    <label for="defaultFormControlInput" class="form-label">ساعات العمل (انجليزي)</label>
                    <input type="text" name="workingHoursEn" class="form-control  "
                        id="addServPointWorkingHourEn" placeholder="ساعات العمل"
                        aria-describedby="defaultFormControlHelp" />
                        <span class="help-block text-danger"></span>
                    
                </div>
                <div class="col-12 my-4">
                    <label class="switch">
                        <input type="checkbox" class="switch-input active" name="active" id="addServPointActive"
                            value="1">
                        <span class="switch-toggle-slider">
                            <span class="switch-on"></span>
                            <span class="switch-off"></span>
                        </span>
                        <span class="switch-label">تفعيل </span>
                    </label>
                </div>
                <div class="col-12 text-center">
                    <button type="mit" class="btn btn-primary me-sm-3 me-1 mt-3 addServPoint"> اضافةالمعلومات</button>
                    <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal"
                        aria-label="Close">Cancel</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
@section('javascript')
<script  src="{{URL::asset('js/addServPoint.js')}}"></script>
@endsection