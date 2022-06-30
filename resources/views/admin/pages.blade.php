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
            <h2 name="tableName m-5 ">  صفحة السياسة والخصوصية</h2>
            <a href="pages?do=Add" class="btn  d-flex justify-content-start  p-2 contact">
                <button type="button" class="btn color m-4 px-5w-25  text-center"
                    id="addpages">   اضافة معلومات الصفحة   </button></a>
            <x-table>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <x-slot name="tableHead">
                            <tr>
                                <th>#</th>
                                <th>العنوان الرئيسي </th>
                                <th>العنوان الفرعي</th>
                                <th> تفاصيل الصفحة</th>
                                <th> الحاله</th>
                                <th>العمليات</th>
                            </tr>
                        </x-slot>
                        <x-slot name="tableBody" id="tbody">
                            <?php $i = 1; ?>
                            @foreach ($pages as $pages)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $pages->title }}</td>
                                    <td>{{ $pages->sub_title }}</td>
                                    <td>
                                    <a href="pages?do=Edit&pagesId={{ $pages->id }}" class="color_text">معلومات الصفحة</a></td>
                                    </td>
                                    <td>
                                        @if ($pages->is_active == 1)
                                            <label class="switch" data-bs-toggle="modal"
                                                data-bs-target="#activepages{{ $pages->id }}">
                                                <input type="checkbox" class="switch-input" name="active" checked>
                                                <span class="switch-toggle-slider">
                                                    <span class="switch-on"></span>
                                                    <span class="switch-off"></span>
                                                </span>
                                            </label>
                                        @else
                                            <label class="switch" data-bs-toggle="modal"
                                                data-bs-target="#activepages{{ $pages->id }}">
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
                                            href="pages?do=Edit&pagesId={{ $pages->id }}"><i
                                                class=" bx bx-edit-alt me-2"></i>
                                        </a>
                                        <a class="btn btn-icon btn-outline-dribbble mx-2 deletCategoryLink"
                                            data-bs-toggle="modal" data-bs-target="#deletepages{{ $pages->id }}"
                                            href="javascript:void(0);"><i class=" bx bx-trash me-2"></i>
                                        </a>
                                    </td>
                                </tr>

                                <!-- Active pages Modal -->
                                <div class="modal fade " id="activepages{{ $pages->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                                        <div class="modal-content p-3 p-md-5">
                                            <div class="modal-body">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                                <div class="text-center mb-4">
                                                    <h4 class="modal-title" id="userCrudModal">هل انت متاكد انك تريد تغيير
                                                        حاله الصفحات</h4>
                                                    <p>تغيير حالة الصفحات </p>
                                                </div>
                                                <form id="" class="row g-3"
                                                    action="{{ route('activepages', $pages->id) }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" id="activepagesId" class="activepagesId"
                                                        value="{{ $pages->id }}">
                                                    <div class="col-12 text-center">
                                                        <button type="mit" id="mit"
                                                            class="btn color me-sm-3 me-1 mt-3 activepages">تغيير
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
                                <!--/ Active pages Modal -->

                                <!-- Delete pages Modal -->
                                <div class="modal fade " id="deletepages{{ $pages->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                                        <div class="modal-content p-3 p-md-5">
                                            <div class="modal-body">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                                <div class="text-center mb-4">
                                                    <h4 class="modal-title" id="userCrudModal">هل انت متاكد انك تريد حذف
                                                        الصفحة</h4>
                                                    <p>في حال الموافقه سوف يتم حذف الصفحة بشكل نهائي ولن تستطيع التراجع </p>
                                                </div>
                                                <form action="{{ route('deletepages', $pages->id) }}"
                                                    class="row g-3" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" value="{{ $pages->id }}">
                                                    <div class="col-12 text-center">
                                                        <button type="mit" id="mit"
                                                            class="btn color me-sm-3 me-1 mt-3 deletepages">حذف
                                                            الصفحة</button>
                                                        <button type="reset"
                                                            class="btn btn-label-secondary btn-reset mt-3"
                                                            data-bs-dismiss="modal" aria-label="Close">الغاء</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Delete pages Modal -->
                            @endforeach
                        </x-slot>
                    </table>
                </div>
            </x-table>
        @elseif($do == 'Add')
            <!-- Add pages Modal -->
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
                    <h1 class="text-start fs-3 ">اضافة معلومه الصفحة</h1>
                    <div class="card-body demo-vertical-spacing demo-only-element">

                        <form class="row g-3" action="{{ route('addpages') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <label for="defaultFormControlInput" class="form-label"> العنوان الرئيسي (عربي)</label>
                                <input type="text" name="titleAr" class="form-control  name ar"
                                    id="addpagesNameAr" placeholder="اضف  الصفحات" value="{{ old('nameAr') }}"
                                    aria-describedby="defaultFormControlHelp" />
                                @error('titleAr')
                                    <span class="help-block text-danger">* {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="defaultFormControlInput" class="form-label">العنوان الرئيسي (انجليزي)</label>
                                <input type="text" name="titleEn" class="form-control  " id="addpagesNameEn"
                                    value="{{ old('titleEn') }}" placeholder="اضف  الصفحات"
                                    aria-describedby="defaultFormControlHelp" />
                                @error('titleEn')
                                    <span class="help-block text-danger">* {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="defaultFormControlInput" class="form-label"> العنوان الفرعي (عربي)</label>
                                <input type="text" name="subTitleAr" class="form-control  name ar"
                                    id="addpagesNameAr" placeholder="اضف  صفحة" value="{{ old('nameAr') }}"
                                    aria-describedby="defaultFormControlHelp" />
                                @error('subTitleAr')
                                    <span class="help-block text-danger">* {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="defaultFormControlInput" class="form-label">العنوان الفرعي (انجليزي)</label>
                                <input type="text" name="subTitleEn" class="form-control  " id="addpagesNameEn"
                                    value="{{ old('subTitleEn') }}" placeholder="اضف  صفحة"
                                    aria-describedby="defaultFormControlHelp" />
                                @error('subTitleEn')
                                    <span class="help-block text-danger">* {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="defaultFormControlInput" class="form-label">( العربي) تفاصيل اخرى</label>
                                <textarea name="descriptionAr" id="" cols="30" rows="10"></textarea>
                                @error('descriptionAr')
                                    <span class="help-block text-danger">* {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="defaultFormControlInput" class="form-label">تفاصيل اخرى (انجليزي)</label>
                                <textarea name="descriptionEn" id="" cols="30" rows="10"></textarea>
                                @error('descriptionEn')
                                    <span class="help-block text-danger">* {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-12 text-center">
                                <button type="mit" class="btn color me-sm-3 me-1 mt-3 addpages">
                                    اضافة الصفحات</button>
                                <button type="reset" class="btn btn-label-secondary btn-reset mt-3"
                                    data-bs-dismiss="modal" aria-label="Close">الغاء</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!--/ Add pages Modal -->
        @elseif($do == 'Edit')
            <!-- start Edit model -->
            <?php $pagesId = isset($_GET['pagesId']) && is_numeric($_GET['pagesId']) ? intval($_GET['pagesId']) : 0; ?>
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
                    <h1 class="text-start fs-3 ">تعديل معلومات الصفحات</h1>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        @foreach ($pages as $pages)
                            @if ($pagesId == $pages->id)
                                <form class="row g-3" action="{{ route('editpages', $pages->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="pagesId" value="{{ $pagesId }}">
                                    <div class="col-md-6">
                                        <label for="defaultFormControlInput" class="form-label"> العنوان الرئيسي (عربي)</label>
                                        <input type="text" name="titleAr" class="form-control"
                                            value="{{ $pages->getTranslation('title', 'ar') }}" id="addpagesNameAr"
                                            placeholder="اضف  الصفحات" aria-describedby="defaultFormControlHelp" />
                                        @error('titleAr')
                                            <span class="help-block text-danger">* {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="defaultFormControlInput" class="form-label">العنوان الرئيسي (انجليزي)</label>
                                        <input type="text" name="titleEn" class="form-control  "
                                            id="addpagesNameEn" value="{{ $pages->getTranslation('title', 'en') }}"
                                            placeholder="اضف  الصفحات" aria-describedby="defaultFormControlHelp" />
                                        @error('titleEn')
                                            <span class="help-block text-danger">* {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="defaultFormControlInput" class="form-label"> العنوان الفرعي (عربي)</label>
                                        <input type="text" name="subTitleAr" class="form-control"
                                            value="{{ $pages->getTranslation('sub_title', 'ar') }}" id="addpagesNameAr"
                                            placeholder="اضف  الصفحات" aria-describedby="defaultFormControlHelp" />
                                        @error('subTitleAr')
                                            <span class="help-block text-danger">* {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="defaultFormControlInput" class="form-label">العنوان الفرعي (انجليزي)</label>
                                        <input type="text" name="subTitleEn" class="form-control  "
                                            id="addpagesNameEn" value="{{ $pages->getTranslation('sub_title', 'en') }}"
                                            placeholder="اضف  الصفحات" aria-describedby="defaultFormControlHelp" />
                                        @error('subTitleEn')
                                            <span class="help-block text-danger">* {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="defaultFormControlInput" class="form-label">تفاصيل اخرى (عربي)</label>
                                        <textarea type="text" name="descriptionAr" class="form-control"> {{ $pages->getTranslation('description', 'ar') }}
                                        </textarea>
                                        @error('descriptionAr')
                                            <span class="help-block text-danger">* {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="defaultFormControlInput" class="form-label">تفاصيل اخرى (انجليزي)</label>
                                        <textarea type="text" name="descriptionEn" class="form-control  ">{{ $pages->getTranslation('description', 'en') }}
                                        </textarea>
                                        @error('descriptionEn')
                                            <span class="help-block text-danger">* {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="mit" class="btn color me-sm-3 me-1 mt-3 addpages">
                                            نعديل معلومات الصفحة</button>
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
        CKEDITOR.replace('descriptionAr');
        CKEDITOR.replace('descriptionEn');
    </script>
@endsection
