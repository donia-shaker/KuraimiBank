@extends('admin.layout.dashboard')
@section('content')
    <!-- Basic Bootstrap Table -->
    <div class="" role="alert" id="message">
    </div>
    <div class="card p-3">
        <h2 name="tableName m-5"> المدن</h2>
        <button type="button" class="btn btn-primary m-4 w-25" data-bs-toggle="modal" data-bs-target="#addCityModal"
            id="addCity"> اضافه مدينة للموقع </button>
        <x-table>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <x-slot name="tableHead">
                        <tr>
                            <th>#</th>
                            <th>اسم المدينه</th>
                            <th>الحاله</th>
                            <th>نفاط مدينة</th>
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

    <!-- Add City Modal -->
    <div class="modal fade" id="addCityModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h4 class="modal-title" id="userCrudModal"></h4>
                        <p>اضف مدينة جديدة للموقع</p>
                    </div>
                    <form id="addCityForm" class="row g-3" action="" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="defaultFormControlInput" class="form-label"> الاسم (عربي)</label>
                            <input type="text" name="nameAr" class="form-control  name ar" id="addCityNameAr"
                                placeholder="اضف اسم مدينة" aria-describedby="defaultFormControlHelp" />
                            <span class="help-block text-danger"></span>
                        </div>
                        <div>
                            <label for="defaultFormControlInput" class="form-label">الاسم (انجليزي)</label>
                            <input type="text" name="nameEn" class="form-control  name en" id="addCityNameEn"
                                placeholder="اضف اسم مدينة" aria-describedby="defaultFormControlHelp" />
                            <span class="help-block text-danger"></span>
                        </div>
                        <div class="col-12 text-center">
                            <button type="mit" class="btn btn-primary me-sm-3 me-1 mt-3 addCity">اضافة</button>
                            <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal"
                                aria-label="Close">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/ Add City Modal -->

    <!-- Updat City Modal -->
    <div class="modal fade" id="editCityModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h4 class="modal-title" id="userCrudModal"></h4>
                        <p>تعديل مدينة </p>
                    </div>
                    <form id="updateCity" class="row g-3"  method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="editCityId">
                        <div>
                            <label for="defaultFormControlInput" class="form-label"> الاسم (عربي)</label>
                            <input type="text" name="nameAr" class="form-control name ar" id="editCityNameAr"
                                placeholder="اضف اسم مدينة" aria-describedby="defaultFormControlHelp" />
                            <span class="help-block text-danger"></span>
                        </div>
                        <div>
                            <label for="defaultFormControlInput" class="form-label">الاسم (انجليزي)</label>
                            <input type="text" name="nameEn" class="form-control" id="editCityNameEn"
                                placeholder="اضف اسم مدينة" aria-describedby="defaultFormControlHelp" />
                            <span class="help-block text-danger"></span>
                        </div>
                        <div class="col-12 text-center">
                            <button type="mit"
                                class="btn btn-primary me-sm-3 me-1 mt-3 updateCity">تعديل</button>
                            <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal"
                                aria-label="Close">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/ Updat City Modal -->

    <!-- Active City Modal -->
    <div class="modal fade activeCityModal" id="activeCityModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h4 class="modal-title" id="userCrudModal">هل انت متاكد انك تريد تغيير حاله مدينة</h4>
                        <p>تغيير حالة مدينة </p>
                    </div>
                    <form id="activeCity" class="row g-3" action="activeCity" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="activeCityId" class="activeCityId" value="">
                        <div class="col-12 text-center">
                            <button type="mit" id="mit"
                                class="btn btn-primary me-sm-3 me-1 mt-3 activeCity">تغيير الحالة</button>
                            <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal"
                                aria-label="Close">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/ Updat City Modal -->

    <!-- Delete City Modal -->
    <div class="modal fade deleteCityModal" id="deleteCityModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h4 class="modal-title" id="userCrudModal">هل انت متاكد انك تريد حذف مدينة</h4>
                        <p>في حال الموافقه سوف يتم حذف المدينة بشكل نهائي ولن تستطيع التراجع </p>
                    </div>
                    <form id="deleteCityId" class="row g-3"  method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="deleteCityId" class="deleteCityId" value="">
                        <div class="col-12 text-center">
                            <button type="mit" id="mit"
                                class="btn btn-primary me-sm-3 me-1 mt-3 deleteCity">حذف المدينة</button>
                            <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal"
                                aria-label="Close">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/ Delete City Modal -->
@endsection
@section('javascript')
<script  src="{{URL::asset('js/cities.js')}}"></script>
@endsection
