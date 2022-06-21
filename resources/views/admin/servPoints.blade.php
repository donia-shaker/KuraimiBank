@extends('admin.layout.dashboard')
@section('content')
    <!-- Basic Bootstrap Table -->
    <div class="" role="alert" id="message">
    </div>
    <div class="card p-3">
        <h2 name="tableName m-5">الخدمات الرئيسية</h2>
        <button type="button" class="btn btn-primary m-4 w-25" data-bs-toggle="modal" data-bs-target="#addServPointModal"
            id="addServPoint"> اضافه نقاط خدمة  </button>
        <x-table>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <x-slot name="tableHead">
                        <tr>
                            <th>#</th>
                            <th>(ar)اسم التصنيف</th>
                            <th>(en)اسم التصنيف</th>
                            <th>(ar) العنوان</th>
                            <th>(en) العنوان</th>
                            <th>الهاتف</th>
                            <th>الهاتف الاخر</th>
                            <th> ساعات العمل</th>
                            <th> الحاله</th>
                            <th>نفاط الخدمة</th>
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

    <!-- Add ServPoint Modal -->
    <div class="modal fade" id="addServPointModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h4 class="modal-title" id="userCrudModal"></h4>
                        <p>اضف صنف جديدة للموقع</p>
                    </div>
                    <form id="addServPointForm" class="row g-3" action="{{route('addServPoint')}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="defaultFormControlInput" class="form-label"> الاسم (عربي)</label>
                            <input type="text" name="nameAr" class="form-control  name ar" id="addServPointNameAr"
                                placeholder="اضف نقطة الخدمة" aria-describedby="defaultFormControlHelp" />
                            <span class="help-block text-danger"></span>
                        </div>
                        <div>
                            <label for="defaultFormControlInput" class="form-label">الاسم (انجليزي)</label>
                            <input type="text" name="nameEn" class="form-control  " id="addServPointNameEn"
                                placeholder="اضف نقطة الخدمة" aria-describedby="defaultFormControlHelp" />
                            <span class="help-block text-danger"></span>
                        </div>
                        <div>
                            <label for="defaultFormControlInput" class="form-label">الاسم (انجليزي)</label>
                            <input type="text" name="addressAr" class="form-control  " id="addServPointAddressAr"
                                placeholder="اضف عنوان نقطة الخدمة" aria-describedby="defaultFormControlHelp" />
                            <span class="help-block text-danger"></span>
                        </div>
                        <div>
                            <label for="defaultFormControlInput" class="form-label">الاسم (انجليزي)</label>
                            <input type="text" name="addressEn" class="form-control  " id="addServPointAddressEn"
                                placeholder="اضف عنوان نقطة الخدمة" aria-describedby="defaultFormControlHelp" />
                            <span class="help-block text-danger"></span>
                        </div>
                        <div>
                            <label for="defaultFormControlInput" class="form-label">الهاتف</label>
                            <input type="text" name="phone" class="form-control  " id="addServPointPhone"
                                placeholder="اضف نقطة الخدمة" aria-describedby="defaultFormControlHelp" />
                            <span class="help-block text-danger"></span>
                        </div>
                        <div>
                            <label for="defaultFormControlInput" class="form-label">هاتف اخر</label>
                            <input type="text" name="secondPhone" class="form-control " id="addServPointSecondPhone"
                                placeholder="اضف نقطة الخدمة" aria-describedby="defaultFormControlHelp" />
                            <span class="help-block text-danger"></span>
                        </div>
                        <div>
                            <label for="defaultFormControlInput" class="form-label">( العربي)ساعات العمل</label>
                            <input type="text" name="workingHour" class="form-control  " id="addServPointWorkingHourAr"
                                placeholder="ساعات العمل" aria-describedby="defaultFormControlHelp" />
                            <span class="help-block text-danger"></span>
                        </div>
                        <div>
                            <label for="defaultFormControlInput" class="form-label">ساعات العمل (انجليزي)</label>
                            <input type="text" name="nameEn" class="form-control  " id="addServPointWorkingHourEn"
                                placeholder="ساعات العمل" aria-describedby="defaultFormControlHelp" />
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
                            <button type="mit" class="btn btn-primary me-sm-3 me-1 mt-3 addServPoint">اضافة</button>
                            <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal"
                                aria-label="Close">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/ Add ServPoint Modal -->

    <!-- Updat ServPoint Modal -->
    <div class="modal fade" id="editServPointModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h4 class="modal-title" id="userCrudModal"></h4>
                        <p>تعديل الخدمة </p>
                    </div>
                    <form id="updateServPoint" class="row g-3"  method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="editServPointId">
                        <div>
                            <label for="defaultFormControlInput" class="form-label"> الاسم (عربي)</label>
                            <input type="text" name="nameAr" class="form-control name ar" id="editServPointNameAr"
                                placeholder="اضف اسم الخدمة" aria-describedby="defaultFormControlHelp" />
                            <span class="help-block text-danger"></span>
                        </div>
                        <div>
                            <label for="defaultFormControlInput" class="form-label">الاسم (انجليزي)</label>
                            <input type="text" name="nameEn" class="form-control" id="editServPointNameEn"
                                placeholder="اضف اسم الخدمة" aria-describedby="defaultFormControlHelp" />
                            <span class="help-block text-danger"></span>
                        </div>
                        <div class="col-12 my-4">
                            <label class="switch">
                                <input type="checkbox" class="switch-input active" name="active"
                                    id="editServPointActive" value="1">
                                <span class="switch-toggle-slider">
                                    <span class="switch-on"></span>
                                    <span class="switch-off"></span>
                                </span>
                                <span class="switch-label">تفعيل </span>
                            </label>
                        </div>
                        <div class="col-12 text-center">
                            <button type="mit"
                                class="btn btn-primary me-sm-3 me-1 mt-3 updateServPoint">تعديل</button>
                            <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal"
                                aria-label="Close">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/ Updat ServPoint Modal -->

    <!-- Active ServPoint Modal -->
    <div class="modal fade activeServPointModal" id="activeServPointModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h4 class="modal-title" id="userCrudModal">هل انت متاكد انك تريد تغيير حاله الخدمة</h4>
                        <p>تغيير حالة الخدمة </p>
                    </div>
                    <form id="activeServPoint" class="row g-3" action="activeServPoint" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="activeServPointId" class="activeServPointId" value="">
                        <div class="col-12 text-center">
                            <button type="mit" id="mit"
                                class="btn btn-primary me-sm-3 me-1 mt-3 activeServPoint">تغيير الحالة</button>
                            <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal"
                                aria-label="Close">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/ Updat ServPoint Modal -->

    <!-- Delete ServPoint Modal -->
    <div class="modal fade deleteServPointModal" id="deleteServPointModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h4 class="modal-title" id="userCrudModal">هل انت متاكد انك تريد حذف الخدمة</h4>
                        <p>في حال الموافقه سوف يتم حذف الصنف بشكل نهائي ولن تستطيع التراجع </p>
                    </div>
                    <form id="deleteServPointId" class="row g-3"  method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="deleteServPointId" class="deleteServPointId" value="">
                        <div class="col-12 text-center">
                            <button type="mit" id="mit"
                                class="btn btn-primary me-sm-3 me-1 mt-3 deleteServPoint">حذف الصنف</button>
                            <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal"
                                aria-label="Close">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/ Delete ServPoint Modal -->
@endsection
@section('javascript')
<script  src="{{URL::asset('js/servPonits.js')}}"></script>
@endsection
