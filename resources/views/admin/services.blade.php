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
            <h2 name="tableName m-5  "> ادارة خدمات  الموقع</h2>
            <a href="services?do=Add" class="btn  d-flex justify-content-start p-2 contact">
                <button type="button" class="btn  color m-4 px-5  w-25  text-center"
                    id="addservices">اضافه خدمة </button></a>
            <x-table>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <x-slot name="tableHead">
                            <tr>
                                <th>#</th>
                                <th>اسم الخدمه</th>
                                <th>الصوره</th>
                                <th> صورة الخلفيه</th>
                                <th> اسم الصنف</th>
                                <th>  المميزات الرئيسيه  </th>
                                <th> عرض في الرئيسية</th>
                                <th> الحاله</th>
                                <th>العمليات</th>
                            </tr>
                        </x-slot>
                        <x-slot name="tableBody" id="tbody">
                            <?php $i = 1; ?>
                            @foreach ($services as $service)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $service->name }}</td>
                                    <td><img src="{{ URL::asset('images/' . $service->image) }}" width="80"></td>
                                    <td><img src="{{ URL::asset('images/' . $service->image) }}" width="80"></td>
                                    @foreach ($categories as $category )
                                    @if($service->category_id == $category->id  )
                                    <td>{{ $category->name->ar }}</td>
                                    @endif
                                    @endforeach
                                    <td><a href="{{route('serviceAdv',$service->id)}}" class="color_text"> عرض المميزات الرئيسيه</a> </td>
                                    <td><a href="">
                                            @if ($service->position == 1)
                                                <label class="switch" data-bs-toggle="modal"
                                                    data-bs-target="#positionService{{ $service->id }}">
                                                    <input type="checkbox" class="switch-input" name="active" checked>
                                                    <span class="switch-toggle-slider">
                                                        <span class="switch-on"></span>
                                                        <span class="switch-off"></span>
                                                    </span>
                                                </label>
                                            @else
                                                <label class="switch" data-bs-toggle="modal"
                                                    data-bs-target="#positionService{{ $service->id }}">
                                                    <input type="checkbox" class="switch-input">
                                                    <span class="switch-toggle-slider">
                                                        <span class="switch-on"></span>
                                                        <span class="switch-off"></span>
                                                    </span>
                                                </label>
                                            @endif
                                        </a></td>
                                    <td>
                                        @if ($service->is_active == 1)
                                            <label class="switch" data-bs-toggle="modal"
                                                data-bs-target="#activeService{{ $service->id }}">
                                                <input type="checkbox" class="switch-input" name="active" checked>
                                                <span class="switch-toggle-slider">
                                                    <span class="switch-on"></span>
                                                    <span class="switch-off"></span>
                                                </span>
                                            </label>
                                        @else
                                            <label class="switch" data-bs-toggle="modal"
                                                data-bs-target="#activeService{{ $service->id }}">
                                                <input type="checkbox" class="switch-input" name="active">
                                                <span class="switch-toggle-slider">
                                                    <span class="switch-on"></span>
                                                    <span class="switch-off"></span>
                                                </span>
                                            </label>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown"><i
                                                    class="bx bx-dots-vertical-rounded"></i></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="services?do=Edit&serviceId={{ $service->id }}"><i
                                                        class="bx bx-edit-alt me-1"></i> تعديل</a>
                                                <a class="dropdown-item"
                                                    href="services?do=Edit&serviceId={{ $service->id }}"><i
                                                        class="menu-icon tf-icons bx bx-file"></i>تفاصيل</a>
                                                <a class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#deleteService{{ $service->id }}"
                                                    href="javascript:void(0);"><i class="bx bx-trash me-1"></i> حذف</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Active services Modal -->
                                <div class="modal fade " id="activeService{{ $service->id }}" tabindex="-1"
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
                                                    action="{{ route('activeService', $service->id) }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" id="activeservicesId" class="activeservicesId"
                                                        value="{{ $service->id }}">
                                                    <div class="col-12 text-center">
                                                        <button type="mit" id="mit"
                                                            class="btn  color me-sm-3 me-1 mt-3 activeservices">تغيير
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

                                <!-- position services Modal -->
                                <div class="modal fade" id="positionService{{ $service->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                                        <div class="modal-content p-3 p-md-5">
                                            <div class="modal-body">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                                <div class="text-center mb-4">
                                                    <h4 class="modal-title" id="userCrudModal">هل تريد عرض الخدمة في
                                                        الصفحة الرئيسية
                                                        حاله الخدمة</h4>
                                                    <p>تغيير حالة الخدمة </p>
                                                </div>
                                                <form id="" class="row g-3"
                                                    action="{{ route('positionService', $service->id) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" id="activeservicesId" class="activeservicesId"
                                                        value="{{ $service->id }}">
                                                    <div class="col-12 text-center">
                                                        <button type="mit" id="mit"
                                                            class="btn  color me-sm-3 me-1 mt-3 activeservices">تغيير
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
                                <!-- position services Modal -->

                                <!-- Delete services Modal -->
                                <div class="modal fade " id="deleteService{{ $service->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                                        <div class="modal-content p-3 p-md-5">
                                            <div class="modal-body">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                                <div class="text-center mb-4">
                                                    <h4 class="modal-title" id="userCrudModal">هل انت متاكد انك تريد حذف
                                                        الخدمة</h4>
                                                    <p>في حال الموافقه سوف يتم حذف الخدمة بشكل نهائي ولن تستطيع التراجع </p>
                                                </div>
                                                <form action="{{ route('deleteService', $service->id) }}"
                                                    class="row g-3" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" value="{{ $service->id }}">
                                                    <div class="col-12 text-center">
                                                        <button type="mit" id="mit"
                                                            class="btn  color me-sm-3 me-1 mt-3 deleteservices">حذف
                                                            الخدمة</button>
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
            <div class="col-md-12 m-auto">
                <div class="card mb-4 p-4 ">
                    <h1 class="text-start fs-3 ">اضافة معلومه الخدمة</h1>
                    <div class="card-body demo-vertical-spacing demo-only-element">

                        <form class="row g-3" action="{{ route('addService') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <label for="defaultFormControlInput" class="form-label"> الاسم (عربي)</label>
                                <input type="text" name="nameAr" class="form-control  name ar"
                                    id="addservicesNameAr" placeholder="اضف  الخدمة AR" value="{{ old('nameAr') }}"
                                    aria-describedby="defaultFormControlHelp" />
                                @error('nameEn')
                                    <span class="help-block text-danger">* {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="defaultFormControlInput" class="form-label">الاسم (انجليزي)</label>
                                <input type="text" name="nameEn" class="form-control  " id="addservicesNameEn"
                                    value="{{ old('nameEn') }}" placeholder="اضف  الخدمة EN"
                                    aria-describedby="defaultFormControlHelp" />
                                @error('nameEn')
                                    <span class="help-block text-danger">* {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="defaultFormControlInput" class="form-label">الوصف (انجليزي)</label>
                                <input type="text" name="descriptionAr" class="form-control  "
                                    value="{{ old('descriptionAr') }}" placeholder="اضف وصف  الخدمة AR"
                                    aria-describedby="defaultFormControlHelp" />
                                @error('descriptionAr')
                                    <span class="help-block text-danger">* {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="defaultFormControlInput" class="form-label">الوصف (انجليزي)</label>
                                <input type="text" name="descriptionEn" class="form-control  "
                                    value="{{ old('descriptionEn') }}" placeholder="اضف وصف  الخدمة EN"
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
                                    aria-describedby="defaultFormControlHelp" value="{{ old('image') }}" />
                                @error('image')
                                    <span class="help-block text-danger">* {{ $message }} </span>
                                @enderror <div class="col-md-12 mb-2 my-2 m-auto">
                                    <img id="previewImage" style="max-height: 100px;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="defaultFormControlInput" class="form-label"> صورة الخلفية</label>
                                <input type="file" name="background_image"
                                    oninput="previewImageTwo.src=window.URL.createObjectURL(this.files[0])"
                                    class="form-control " placeholder="اضف  صورة خلفيه الخدمة"
                                    value="{{ old('background_image') }}" aria-describedby="defaultFormControlHelp" />
                                @error('background_image')
                                    <span class="help-block text-danger">* {{ $message }} </span>
                                @enderror
                                <div class="col-md-12 mb-2 my-2 m-auto">
                                    <img id="previewImageTwo" style="max-height: 100px;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="defaultFormControlInput" class="form-label">( العربي) مميزات اخرى</label>
                                <textarea name="other_adventageAr" id="" cols="30" rows="10"></textarea>
                                @error('other_adventageAr')
                                    <span class="help-block text-danger">* {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="defaultFormControlInput" class="form-label">مميزات اخرى (انجليزي)</label>
                                <textarea name="other_adventageEn" id="" cols="30" rows="10"></textarea>
                                @error('other_adventageEn')
                                    <span class="help-block text-danger">* {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="defaultFormControlInput" class="form-label">( العربي) الشروط</label>
                                <textarea name="service_conditionsAr" id="" cols="30" rows="10"></textarea>
                                @error('service_conditionsAr')
                                    <span class="help-block text-danger">* {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="defaultFormControlInput" class="form-label">الشروط(انجليزي)</label>
                                <textarea name="service_conditionsEn" id="" cols="30" rows="10"></textarea>
                                @error('service_conditionsEn')
                                    <span class="help-block text-danger">* {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="defaultFormControlInput" class="form-label">حدد القسم الذي تنتمي الية الخدمة</label>
                                <select name="categoryId" id="" class="px-5 py-1">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name->ar }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 text-center">
                                <button type="mit" class="btn  color me-sm-3 me-1 mt-3 addservices">
                                    اضافة الخدمة</button>
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
            <?php $serviceId = isset($_GET['serviceId']) && is_numeric($_GET['serviceId']) ? intval($_GET['serviceId']) : 0; ?>
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
                    <h1 class="text-start fs-3 ">تعديل معلومات الخدمة</h1>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        @foreach ($services as $service)
                            @if ($serviceId == $service->id)
                                <form class="row g-3" action="{{ route('editService', $service->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="serviceId" value="{{ $serviceId }}">
                                    <div class="col-md-6">
                                        <label for="defaultFormControlInput" class="form-label"> الاسم (عربي)</label>
                                        <input type="text" name="nameAr" class="form-control"
                                            value="{{ $service->getTranslation('name', 'ar') }}" id="addservicesNameAr"
                                            placeholder="اضف  الخدمة AR" aria-describedby="defaultFormControlHelp" />
                                        @error('nameAr')
                                            <span class="help-block text-danger">* {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="defaultFormControlInput" class="form-label">الاسم (انجليزي)</label>
                                        <input type="text" name="nameEn" class="form-control  "
                                            id="addservicesNameEn" value="{{ $service->getTranslation('name', 'en') }}"
                                            placeholder="اضف  الخدمة EN" aria-describedby="defaultFormControlHelp" />
                                        @error('nameEn')
                                            <span class="help-block text-danger">* {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="defaultFormControlInput" class="form-label">الوصف (انجليزي)</label>
                                        <input type="text" name="descriptionAr" class="form-control  " old
                                            placeholder="اضف وصف  الخدمة AR"
                                            value="{{ $service->getTranslation('description', 'ar') }}"
                                            aria-describedby="defaultFormControlHelp" />
                                        @error('descriptionAr')
                                            <span class="help-block text-danger">* {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="defaultFormControlInput" class="form-label">الوصف (انجليزي)</label>
                                        <input type="text" name="descriptionEn" class="form-control  "
                                            placeholder="اضف وصف  الخدمة EN"
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
                                            (انجليزي)</label>
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
                                        <label for="defaultFormControlInput" class="form-label ">حدد القسم الذي تنتمي الية الخدمة</label>
                                        <select name="categoryId" class="px-5 py-2" id="">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="mit" class="btn  color me-sm-3 me-1 mt-3 addservices">
                                            نعديل معلومات الخدمة</button>
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
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('service_conditionsAr');
        CKEDITOR.replace('service_conditionsEn');
        CKEDITOR.replace('other_adventageAr');
        CKEDITOR.replace('other_adventageEn');
    </script>
@endsection
