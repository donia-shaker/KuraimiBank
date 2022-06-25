@extends('admin.layout.dashboard')
@section('content')
    <!-- start page Content -->
    @if ($do == 'Manage')
        <!-- show message -->
        @if (session()->has('success'))
            <div class="alert alert-success" id="message">
                {{ session()->get('success') }}
            </div>
        @elseif (session()->has('error'))
            <div class="alert alert-danger" id="message">
                {{ session()->get('success') }}
            </div>
        @endif
        <!-- End show message -->

        <div class="card p-3">
            <h2 name="tableName m-5 "> مميزات الخدمة </h2>
            <a href="{{$serviceId}}?do=Add&servId={{$serviceId}}" class="btn w-25 p-2 contact">
                <button type="button" class="btn btn-primary m-4 px-5 d-flex justify-content-start text-center"
                    id="addservices">اضافه ميزة </button></a>
            <x-table>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <x-slot name="tableHead">
                            <tr>
                                <th>#</th>
                                <th> اسم الخدمه</th>
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
                                    <td><img src="{{ URL::asset('images/' . $serviceAdv->image) }}" width="80"></td>
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
                                            href="serviceAdv?do=Edit&serviceAdvId={{ $serviceAdv->id }}"><i
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
                                                        حاله الخدمة</h4>
                                                    <p>تغيير حالة الخدمة </p>
                                                </div>
                                                
                                                <form id="" class="row g-3"
                                                    action="{{ route('activeService', $serviceAdv->id) }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" id="activeservicesId" class="activeservicesId"
                                                        value="{{ $serviceAdv->id }}">
                                                    <div class="col-12 text-center">
                                                        <button type="mit" id="mit"
                                                            class="btn btn-primary me-sm-3 me-1 mt-3 activeservices">تغيير
                                                            الحالة</button>
                                                        <button type="reset"
                                                            class="btn btn-label-secondary btn-reset mt-3"
                                                            data-bs-dismiss="modal" aria-label="Close">Cancel</button>
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
                                                        الخدمة</h4>
                                                    <p>في حال الموافقه سوف يتم حذف الصنف بشكل نهائي ولن تستطيع التراجع </p>
                                                </div>
                                                <form action="{{ route('deleteService', $serviceAdv->id) }}"
                                                    class="row g-3" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" value="{{ $serviceAdv->id }}">
                                                    <div class="col-12 text-center">
                                                        <button type="mit" id="mit"
                                                            class="btn btn-primary me-sm-3 me-1 mt-3 deleteservices">حذف
                                                            الصنف</button>
                                                        <button type="reset"
                                                            class="btn btn-label-secondary btn-reset mt-3"
                                                            data-bs-dismiss="modal" aria-label="Close">Cancel</button>
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
                <div class="alert alert-success" id="message">
                    {{ session()->get('success') }}
                </div>
            @elseif (session()->has('error'))
                <div class="alert alert-danger" id="message">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="col-md-8 m-auto">
                <div class="card mb-4 p-4 ">
                    <h1 class="text-start fs-3 ">اضافة معلومه الخدمة</h1>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        
                        <form class="row g-3" action="{{ route('addServiceAdv') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="serviceId" value="{{$servId}}">
                            <div class="col-md-6">
                                <label for="defaultFormControlInput" class="form-label"> الاسم (عربي)</label>
                                <input type="text" name="nameAr" class="form-control  name ar"
                                    id="addservicesNameAr" placeholder="اضف  الخدمة" value="{{ old('nameAr') }}"
                                    aria-describedby="defaultFormControlHelp" />
                                @error('nameEn')
                                    <span class="help-block text-danger">* {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="defaultFormControlInput" class="form-label">الاسم (انجليزي)</label>
                                <input type="text" name="nameEn" class="form-control  " id="addservicesNameEn"
                                    value="{{ old('nameEn') }}" placeholder="اضف  الخدمة"
                                    aria-describedby="defaultFormControlHelp" />
                                @error('nameEn')
                                    <span class="help-block text-danger">* {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="defaultFormControlInput" class="form-label">صورة</label>
                                <input type="file" name="icon"
                                    oninput="previewImage.src=window.URL.createObjectURL(this.files[0])"
                                    class="form-control  " id="addservicesPhone" placeholder="اضف صورة الخدمة"
                                    aria-describedby="defaultFormControlHelp" value="{{ old('image') }}" />
                                @error('image')
                                    <span class="help-block text-danger">* {{ $message }} </span>
                                @enderror <div class="col-md-12 mb-2 my-2 m-auto">
                                    <img id="previewImage" style="max-height: 100px;">
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button type="mit" class="btn btn-primary me-sm-3 me-1 mt-3 addservices">
                                    اضافة الخدمة</button>
                                <button type="reset" class="btn btn-label-secondary btn-reset mt-3"
                                    data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!--/ Add services Modal -->
        @elseif($do == 'Edit')
            <!-- start Edit model -->
            <?php $serviceAdvId = isset($_GET['serviceAdvId']) && is_numeric($_GET['serviceAdvId']) ? intval($_GET['serviceId']) : 0; ?>
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @elseif (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="col-md-12 m-auto">
                <div class="card mb-4 p-4 ">
                    <h1 class="text-start fs-3 ">تعديل معلومات الخدمة</h1>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        @foreach ($services as $service)
                            @if ($serviceAdvId == $service->id)
                                <form class="row g-3" action="{{ route('editService', $service->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="serviceAdvId" value="{{ $serviceAdvId }}">
                                    <div class="col-md-6">
                                        <label for="defaultFormControlInput" class="form-label"> الاسم (عربي)</label>
                                        <input type="text" name="nameAr" class="form-control"
                                            value="{{ $service->getTranslation('name', 'ar') }}" id="addservicesNameAr"
                                            placeholder="اضف  الخدمة" aria-describedby="defaultFormControlHelp" />
                                        @error('nameAr')
                                            <span class="help-block text-danger">* {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="defaultFormControlInput" class="form-label">الاسم (انجليزي)</label>
                                        <input type="text" name="nameEn" class="form-control  "
                                            id="addservicesNameEn" value="{{ $service->getTranslation('name', 'en') }}"
                                            placeholder="اضف  الخدمة" aria-describedby="defaultFormControlHelp" />
                                        @error('nameEn')
                                            <span class="help-block text-danger">* {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="defaultFormControlInput" class="form-label">الوصف (انجليزي)</label>
                                        <input type="text" name="descriptionAr" class="form-control  " old
                                            placeholder="اضف وصف  الخدمة"
                                            value="{{ $service->getTranslation('description', 'ar') }}"
                                            aria-describedby="defaultFormControlHelp" />
                                        @error('descriptionAr')
                                            <span class="help-block text-danger">* {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="defaultFormControlInput" class="form-label">الوصف (انجليزي)</label>
                                        <input type="text" name="descriptionEn" class="form-control  "
                                            placeholder="اضف وصف  الخدمة"
                                            value="{{ $service->getTranslation('description', 'en') }}"
                                            aria-describedby="defaultFormControlHelp" />
                                        @error('descriptionEn')
                                            <span class="help-block text-danger">* {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="defaultFormControlInput" class="form-label">صورة</label>
                                        <input type="file" name="image"
                                            oninput="previewImage.src=window.URL.createObjectURL(this.files[0])"
                                            class="form-control  " id="addservicesPhone" placeholder="اضف صورة الخدمة"
                                            value="{{ $service->image }}" aria-describedby="defaultFormControlHelp" />
                                        @error('image')
                                            <span class="help-block text-danger">* {{ $message }} </span>
                                        @enderror <div class="col-md-12 mb-2 my-2 m-auto">
                                            <img id="previewImage" src="{{ URL::asset('images/' . $service->image) }}"
                                                style="max-height: 100px;">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="defaultFormControlInput" class="form-label"> صورة الخلفية</label>
                                        <input type="file" name="background_image"
                                            value="{{ $service->background_image }}"
                                            oninput="previewImageTwo.src=window.URL.createObjectURL(this.files[0])"
                                            class="form-control " placeholder="اضف  صورة خلفيه الخدمة"
                                            aria-describedby="defaultFormControlHelp" />
                                        @error('background_image')
                                            <span class="help-block text-danger">* {{ $message }} </span>
                                        @enderror <div class="col-md-12 mb-2 my-2 m-auto">
                                            <img id="previewImageTwo"
                                                src="{{ URL::asset('images/' . $service->background_image) }}"
                                                style="max-height: 100px;">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="defaultFormControlInput" class="form-label">( العربي) مميزات
                                            اخرى</label>
                                        <textarea name="other_adventageAr" id="" cols="30" rows="10">{{ $service->getTranslation('other_adventage', 'ar') }}</textarea>

                                        @error('nameEn')
                                            <span class="help-block text-danger">* {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="defaultFormControlInput" class="form-label">مميزات اخرى
                                            (انجليزي)
                                        </label>
                                        <textarea name="other_adventageEn" id="" cols="30" rows="10">{{ $service->getTranslation('other_adventage', 'en') }}</textarea>
                                        @error('other_adventageEn')
                                            <span class="help-block text-danger">* {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="defaultFormControlInput" class="form-label">( العربي) الشروط</label>
                                        <textarea name="service_conditionsAr" id="" cols="30" rows="10">{{ $service->getTranslation('service_conditions', 'ar') }}</textarea>
                                        @error('service_conditionsAr')
                                            <span class="help-block text-danger">* {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="defaultFormControlInput" class="form-label">الشروط(انجليزي)</label>
                                        <textarea name="service_conditionsEn" id="" cols="30" rows="10">{{ $service->getTranslation('service_conditions', 'en') }}</textarea>
                                        @error('service_conditionsEn')
                                            <span class="help-block text-danger">* {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="defaultFormControlInput" class="form-label ">الصنف</label>
                                        <select name="categoryId" class="px-5 py-2" id="">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name->ar }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="mit" class="btn btn-primary me-sm-3 me-1 mt-3 addservices">
                                            نعديل معلومات الخدمة</button>
                                        <button type="reset" class="btn btn-label-secondary btn-reset mt-3"
                                            data-bs-dismiss="modal" aria-label="Close">Cancel</button>
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
