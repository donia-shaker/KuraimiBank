@extends('admin.layout.dashboard')
@section('content')
    <!-- start page Content -->
    @if ($do == 'Manage')
        <!-- show message -->
        @if (session()->has('success'))
            <div class="alert bg_color message_animation" id="message">
                {{ session()->get('success') }}
            </div>
        @elseif (session()->has('error'))
            <div class="alert alert-danger message_animation" id="message">
                {{ session()->get('error') }}
            </div>
        @endif
        <!-- End show message -->

        <div class="card p-3">
            <h2 name="tableName m-5 "> مميزات الميزة </h2>
            <a href="{{$serviceId}}?do=Add&servId={{$serviceId}}" class="btn d-flex justify-content-start  p-2 contact">
                <button type="button" class="btn color m-4 px-5 w-25 text-center"
                    id="addservices">اضافه ميزة </button></a>
            <x-table>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <x-slot name="tableHead">
                            <tr>
                                <th>#</th>
                                <th> اسم الميزة</th>
                                <th>الصوره</th>
                                <th> الحاله</th>
                                <th>العمليات</th>
                            </tr>
                        </x-slot>
                        <x-slot name="tableBody" id="tbody">
                            <?php $i = 1; ?>
                            @foreach ($serviceAdventages as $serviceAdv)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $serviceAdv->name }}</td>
                                    <td><img src="{{ URL::asset('images/' . $serviceAdv->icon) }}" width="80"></td>
                                    <td>
                                        @if ($serviceAdv->is_active == 1)
                                            <label class="switch" data-bs-toggle="modal"
                                                data-bs-target="#activeServiceAdv{{ $serviceAdv->id }}">
                                                <input type="checkbox" class="switch-input" name="active" checked>
                                                <span class="switch-toggle-slider">
                                                    <span class="switch-on"></span>
                                                    <span class="switch-off"></span>
                                                </span>
                                            </label>
                                        @else
                                            <label class="switch" data-bs-toggle="modal"
                                                data-bs-target="#activeServiceAdv{{ $serviceAdv->id }}">
                                                <input type="checkbox" class="switch-input" name="active">
                                                <span class="switch-toggle-slider">
                                                    <span class="switch-on"></span>
                                                    <span class="switch-off"></span>
                                                </span>
                                            </label>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-icon btn-outline-success  editCategory"
                                            href="serviceAdv?do=Edit&servId={{$serviceId}}&serviceAdvId={{ $serviceAdv->id }}"><i
                                                class=" bx bx-edit-alt me-2"></i>
                                        </a>
                                        <a class="btn btn-icon btn-outline-dribbble mx-2 deletCategoryLink"
                                            data-bs-toggle="modal" data-bs-target="#deleteServiceAdv{{ $serviceAdv->id }}"
                                            href="javascript:void(0);"><i class=" bx bx-trash me-2"></i>
                                        </a>
                                    </td>
                                </tr>

                                <!-- Active services Modal -->
                                <div class="modal fade " id="activeServiceAdv{{ $serviceAdv->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                                        <div class="modal-content p-3 p-md-5">
                                            <div class="modal-body">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                                <div class="text-center mb-4">
                                                    <h4 class="modal-title" id="userCrudModal">هل انت متاكد انك تريد تغيير
                                                        حاله الميزة</h4>
                                                    <p>تغيير حالة الميزة </p>
                                                </div>
                                                
                                                <form id="" class="row g-3"
                                                    action="{{ route('activeServiceAdv', $serviceAdv->id) }}" method="GET"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" id="activeservicesId" class="activeservicesId"
                                                        value="{{ $serviceAdv->id }}">
                                                    <div class="col-12 text-center">
                                                        <button type="mit" id="mit"
                                                            class="btn color me-sm-3 me-1 mt-3 activeservices">تغيير
                                                            الحالة</button>
                                                        <button type="reset"
                                                            class="btn btn-label-secondary btn-reset mt-3"
                                                            data-bs-dismiss="modal" aria-label="Close">الغاء</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Active services Modal -->

                                <!-- Delete services Modal -->
                                <div class="modal fade " id="deleteServiceAdv{{ $serviceAdv->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                                        <div class="modal-content p-3 p-md-5">
                                            <div class="modal-body">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                                <div class="text-center mb-4">
                                                    <h4 class="modal-title" id="userCrudModal">هل انت متاكد انك تريد حذف
                                                        الميزة</h4>
                                                    <p>في حال الموافقه سوف يتم حذف الميزة بشكل نهائي ولن تستطيع التراجع </p>
                                                </div>
                                                <form action="{{ route('deleteServiceAdv', $serviceAdv->id) }}"
                                                    class="row g-3" method="GET" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" value="{{ $serviceAdv->id }}">
                                                    <div class="col-12 text-center">
                                                        <button type="mit" id="mit"
                                                            class="btn color me-sm-3 me-1 mt-3 deleteservices">حذف
                                                            الميزة</button>
                                                        <button type="reset"
                                                            class="btn btn-label-secondary btn-reset mt-3"
                                                            data-bs-dismiss="modal" aria-label="Close">الغاء</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Delete services Modal -->
                            @endforeach
                        </x-slot>
                    </table>
                </div>
            </x-table>

            <?php $servId = isset($_GET['servId']) && is_numeric($_GET['servId']) ? intval($_GET['servId']) : 0; ?>
        @elseif($do == 'Add')
            <!-- Add services Modal -->
            @if (session()->has('success'))
                <div class="alert bg_color message_animation" id="message">
                    {{ session()->get('success') }}
                </div>
            @elseif (session()->has('error'))
                <div class="alert alert-danger message_animation" id="message">
                    {{ session()->get('error') }}
                </div>
            @endif
            <div class="col-md-8 m-auto">
                <div class="card mb-4 p-4 ">
                    <h1 class="text-start fs-3 ">اضافة معلومه الميزة</h1>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        
                        <form class="row g-3" action="{{ route('addServiceAdv') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="serviceId" value="{{$servId}}">
                            <div class="col-md-6">
                                <label for="defaultFormControlInput" class="form-label"> الاسم (عربي)</label>
                                <input type="text" name="nameAr" class="form-control  name ar"
                                    id="addservicesNameAr" placeholder=" اضف  الميزة AR" value="{{ old('nameAr') }}"
                                    aria-describedby="defaultFormControlHelp" />
                                @error('nameEn')
                                    <span class="help-block text-danger">* {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="defaultFormControlInput" class="form-label">الاسم (انجليزي)</label>
                                <input type="text" name="nameEn" class="form-control  " id="addservicesNameEn"
                                    value="{{ old('nameEn') }}" placeholder="اضف  الميزة EN"
                                    aria-describedby="defaultFormControlHelp" />
                                @error('nameEn')
                                    <span class="help-block text-danger">* {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="defaultFormControlInput" class="form-label">صورة</label>
                                <input type="file" name="icon"
                                    oninput="previewImage.src=window.URL.createObjectURL(this.files[0])"
                                    class="form-control  " id="addservicesPhone" placeholder="اضف صورة الميزة"
                                    aria-describedby="defaultFormControlHelp" value="{{ old('image') }}" />
                                @error('image')
                                    <span class="help-block text-danger">* {{ $message }} </span>
                                @enderror <div class="col-md-12 mb-2 my-2 m-auto">
                                    <img id="previewImage" style="max-height: 100px;">
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button type="mit" class="btn color me-sm-3 me-1 mt-3 addservices">
                                    اضافة الميزة</button>
                                <button type="reset" class="btn btn-label-secondary btn-reset mt-3"
                                    data-bs-dismiss="modal" aria-label="Close">الغاء</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!--/ Add services Modal -->
        @elseif($do == 'Edit')
            <!-- start Edit model -->
            <?php $serviceAdvId = isset($_GET['serviceAdvId']) && is_numeric($_GET['serviceAdvId']) ? intval($_GET['serviceAdvId']) : 0; ?>
            @if (session()->has('success'))
                <div class="alert bg_color message_animation">
                    {{ session()->get('success') }}
                </div>
            @elseif (session()->has('error'))
                <div class="alert alert-danger message_animation">
                    {{ session()->get('error') }}
                </div>
            @endif
            <div class="col-md-12 m-auto">
                <div class="card mb-4 p-4 ">
                    <h1 class="text-start fs-3 ">تعديل معلومات الميزة</h1>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        @foreach ($allServAdv as $service)

                            @if ($serviceAdvId == $service->id)
                                <form class="row g-3" action="{{ route('updateServiceAdv', $service->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                            <input type="hidden" name="serviceId" value="{{$servId}}">
                            <div class="col-md-6">
                                <label for="defaultFormControlInput" class="form-label"> الاسم (عربي)</label>
                                <input type="text" name="nameAr" class="form-control  name ar"
                                    id="addservicesNameAr" placeholder="اضف  الميزة AR" value="{{ $service->getTranslation('name', 'ar') }}"
                                    aria-describedby="defaultFormControlHelp" />
                                @error('nameEn')
                                    <span class="help-block text-danger">* {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="defaultFormControlInput" class="form-label">الاسم (انجليزي)</label>
                                <input type="text" name="nameEn" class="form-control  " id="addservicesNameEn"
                                    value="{{ $service->getTranslation('name', 'en') }}" placeholder="اضف  الميزة EN"
                                    aria-describedby="defaultFormControlHelp" />
                                @error('nameEn')
                                    <span class="help-block text-danger">* {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="defaultFormControlInput" class="form-label">صورة</label>
                                <input type="file" name="icon"
                                    oninput="previewImage.src=window.URL.createObjectURL(this.files[0])"
                                    class="form-control  " id="addservicesPhone" placeholder="اضف صورة الميزة"
                                    aria-describedby="defaultFormControlHelp" value="{{ old('image') }}" />
                                @error('image')
                                    <span class="help-block text-danger">* {{ $message }} </span>
                                @enderror <div class="col-md-12 mb-2 my-2 m-auto">
                                    <img id="previewImage" style="max-height: 100px;">
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button type="mit" class="btn color me-sm-3 me-1 mt-3 addservices">
                                    اضافة الميزة</button>
                                <button type="reset" class="btn btn-label-secondary btn-reset mt-3"
                                    data-bs-dismiss="modal" aria-label="Close">الغاء</button>
                            </div>
                                </form>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
    @endif
@endsection
@section('javascript')
@endsection
