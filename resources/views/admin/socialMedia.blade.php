@extends('admin.layout.dashboard')
@section('content')
    <!-- Basic Bootstrap Table -->
    <div class="" role="alert" id="message">
    </div>
    <div class="card p-3" id="socialMedia">
        <h2 name="tableName m-5">ادارة وسائل التواصل </h2>
        <button type="button" class="btn color m-4 w-25" data-bs-toggle="modal" data-bs-target="#addSocialMediaModal"
            id="addSocialMedia"> اضافه وسائل تواصل </button>
        <x-table>
            <div class="table-responsive text-nowrap">
                <table class="table ">
                    <x-slot name="tableHead">
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>الرابط او رقم الهاتف</th>
                            <th>الايقونة</th>
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

    <!-- Add SocialMedia Modal -->
    <div class="modal fade" id="addSocialMediaModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h4 class="modal-title" id="userCrudModal"></h4>
                        <p>اضف وسيلة تواصل جديدة للموقع</p>
                    </div>
                    <form id="addSocialMediaForm" class="row g-3" action="" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="defaultFormControlInput" class="form-label"> الاسم (عربي)</label>
                            <input type="text" name="nameAr" class="form-control  name ar" id="addSocialMediaNameAr"
                                placeholder="اضف اسم وسيلة التواصل AR" aria-describedby="defaultFormControlHelp" />
                            <span class="help-block text-danger"></span>
                        </div>
                        <div>
                            <label for="defaultFormControlInput" class="form-label">الاسم (انجليزي)</label>
                            <input type="text" name="nameEn" class="form-control  name en" id="addSocialMediaNameEn"
                                placeholder="اضف اسم وسيلة التواصل EN" aria-describedby="defaultFormControlHelp" />
                            <span class="help-block text-danger"></span>
                        </div>
                        <div>
                            <label for="defaultFormControlInput" class="form-label">ادخل الرابط</label>
                            <input type="text" name="link" class="form-control  name en" id="addSocialMediaLink"
                                placeholder="اضف اسم وسيلة التواصل" aria-describedby="defaultFormControlHelp" />
                            <span class="help-block text-danger"></span>
                        </div>
                        <div class="col-12 my-4">
                            <label for="defaultFormControlInput" class="form-label">اختر ايقونة</label>
                            <select name="icon" id="addSocialMediaIcon" class="fa p-2 bg-dark fs-5 text-white  border border-white w-100 h-10"
                                style="direction:ltr ; " id="">
                                <option value="fa fa-location-arrow" class="fa">&#xf124 (location)</option>
                                <option value="fa fa-globe" class="fa">&#xf0ac (site)</option>
                                <option value="fa fa-envelope" class="fa">&#xf0e0 (email)</option>
                                <option value="fa fa-mobile" class="fa">&#xf10b (mobile)</option>
                                <option value="fa fa-phone" class="fa">&#xf095 (phone)</option>
                                <option value="fa fa-instagram" class="fa">&#xf16d (instagram)</option>
                                <option value="fa fa-whatsapp" class="fa">&#xf232 (whatsapp)</option>
                                <option value="fa fa-twitter" class="fa">&#xf099 (twitter)</option>
                                <option value="fa fa-facebook" class="fa">&#xf082 (facebook)</option>

                            </select>
                        </div>
                        {{-- <div class="col-12 my-4">
                            <label class="switch">
                                <input type="checkbox" class="switch-input active" name="active" id="addSocialMediaActive"
                                    value="1">
                                <span class="switch-toggle-slider">
                                    <span class="switch-on"></span>
                                    <span class="switch-off"></span>
                                </span>
                                <span class="switch-label">تفعيل </span>
                            </label>
                        </div> --}}
                        <div class="col-12 text-center">
                            <button type="submit" class="btn color me-sm-3 me-1 mt-3 addSocialMedia">اضافة</button>
                            <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal"
                                aria-label="Close">الغاء</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/ Add SocialMedia Modal -->

    <!-- Updat SocialMedia Modal -->
    <div class="modal fade" id="editSocialMediaModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h4 class="modal-title" id="userCrudModal"></h4>
                        <p>تعديل وسيلة التواصل </p>
                    </div>
                    <form id="updateSocialMedia" class="row g-3" action="updateSocialMedia" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="editSocialMediaId">
                        <div>
                            <label for="defaultFormControlInput" class="form-label"> الاسم (عربي)</label>
                            <input type="text" name="nameAr" class="form-control name ar" id="editSocialMediaNameAr"
                                placeholder="اضف اسم وسيلة التواصل" aria-describedby="defaultFormControlHelp" />
                            <span class="help-block text-danger"></span>
                        </div>
                        <div>
                            <label for="defaultFormControlInput" class="form-label">الاسم (انجليزي)</label>
                            <input type="text" name="nameEn" class="form-control" id="editSocialMediaNameEn"
                                placeholder="اضف اسم وسيلة التواصل" aria-describedby="defaultFormControlHelp" />
                            <span class="help-block text-danger"></span>
                        </div>
                        <div>
                            <label for="defaultFormControlInput" class="form-label">ادخل الرابط</label>
                            <input type="text" name="link" class="form-control  name en" id="editSocialMediaLink"
                                placeholder="اضف اسم وسيلة التواصل" aria-describedby="defaultFormControlHelp" />
                            <span class="help-block text-danger"></span>
                        </div>
                        <div class="col-12 my-4">
                            <select name="icon" id="editSocialMediaIcon" class="fa p-2 bg-dark fs-5 text-white  border border-white w-100 h-10"
                                style="direction:ltr ; " id="">
                                <option value="fa fa-location-arrow" class="fa">&#xf124 (location)</option>
                                <option value="fa fa-globe" class="fa">&#xf0ac (site)</option>
                                <option value="fa fa-envelope" class="fa">&#xf0e0 (email)</option>
                                <option value="fa fa-mobile" class="fa">&#xf10b (mobile)</option>
                                <option value="fa fa-phone" class="fa">&#xf095 (phone)</option>
                                <option value="fa fa-instagram" class="fa">&#xf16d (instagram)</option>
                                <option value="fa fa-whatsapp" class="fa">&#xf232 (whatsapp)</option>
                                <option value="fa fa-twitter" class="fa">&#xf099 (twitter)</option>
                                <option value="fa fa-facebook" class="fa">&#xf082 (facebook)</option>
                            </select>
                        </div>
                        <div class="col-12 my-4">
                            <label class="switch">
                                <input type="checkbox" class="switch-input active" name="active"
                                    id="editSocialMediaActive" value="1">
                                <span class="switch-toggle-slider">
                                    <span class="switch-on"></span>
                                    <span class="switch-off"></span>
                                </span>
                                <span class="switch-label">تفعيل </span>
                            </label>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit"
                                class="btn color me-sm-3 me-1 mt-3 updateSocialMedia">تعديل</button>
                            <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal"
                                aria-label="Close">الغاء</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/ Updat SocialMedia Modal -->

    <!-- Active SocialMedia Modal -->
    <div class="modal fade activeSocialMediaModal" id="activeSocialMediaModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h4 class="modal-title" id="userCrudModal">هل انت متاكد انك تريد تغيير حاله وسيلة التواصل</h4>
                        <p>تغيير حالة وسيلة التواصل </p>
                    </div>
                    <form id="activeSocialMedia" class="row g-3" action="activeSocialMedia" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="activeSocialMediaId" class="activeSocialMediaId" value="">
                        <div class="col-12 text-center">
                            <button type="submit" id="submit"
                                class="btn color me-sm-3 me-1 mt-3 activeSocialMedia">تغيير الحالة</button>
                            <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal"
                                aria-label="Close">الغاء</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/ Updat SocialMedia Modal -->

    <!-- Delete SocialMedia Modal -->
    <div class="modal fade deleteSocialMediaModal" id="deleteSocialMediaModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h4 class="modal-title" id="userCrudModal">هل انت متاكد انك تريد حذف وسيلة التواصل</h4>
                        <p>في حال الموافقه سوف يتم حذف وسائل التواصل بشكل نهائي ولن تستطيع التراجع </p>
                    </div>
                    <form id="deleteSocialMediaId" class="row g-3" action="deleteSocialMedia" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="deleteSocialMediaId" class="deleteSocialMediaId" value="">
                        <div class="col-12 text-center">
                            <button type="submit" id="submit"
                                class="btn color me-sm-3 me-1 mt-3 deleteSocialMedia">حذف وسائل التواصل</button>
                            <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal"
                                aria-label="Close">الغاء</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/ Delete SocialMedia Modal -->
@endsection
@section('javascript')
    <script src="{{ URL::asset('js/socialMedia.js') }}"></script>
@endsection
