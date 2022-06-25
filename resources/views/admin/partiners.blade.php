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
            <h2 name="tableName m-5 ">  الشركات</h2>
            <a href="partiners?do=Add" class="btn w-25 p-2 contact">
                <button type="button" class="btn btn-primary m-4 px-5 d-flex justify-content-start text-center"
                    id="addpartiners"> اضافة  شركاء  </button></a>
            <x-table>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <x-slot name="tableHead">
                            <tr>
                                <th>#</th>
                                <th>العنوان </th>
                                <th>معلومات </th>
                                <th> الحاله</th>
                                <th>العمليات</th>
                            </tr>
                        </x-slot>
                        <x-slot name="tableBody" id="tbody">
                            <?php $i = 1; ?>
                            @foreach ($partiners as $partiners)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $partiners->title }}</td>
                                    <td>
                                        <a href="partiners?do=Edit&partinersId={{ $partiners->id }}" style="color:#03c3ec99">معلومات التقرير</a></td>
                                        <td>
                                        @if ($partiners->is_active == 1)
                                            <label class="switch" data-bs-toggle="modal"
                                                data-bs-target="#activepartiners{{ $partiners->id }}">
                                                <input type="checkbox" class="switch-input" name="active" checked>
                                                <span class="switch-toggle-slider">
                                                    <span class="switch-on"></span>
                                                    <span class="switch-off"></span>
                                                </span>
                                            </label>
                                        @else
                                            <label class="switch" data-bs-toggle="modal"
                                                data-bs-target="#activepartiners{{ $partiners->id }}">
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
                                            href="partiners?do=Edit&partinersId={{ $partiners->id }}"><i
                                                class=" bx bx-edit-alt me-2"></i>
                                        </a>
                                        <a class="btn btn-icon btn-outline-dribbble mx-2 deletCategoryLink"
                                            data-bs-toggle="modal" data-bs-target="#deletepartiners{{ $partiners->id }}"
                                            href="javascript:void(0);"><i class=" bx bx-trash me-2"></i>
                                        </a>
                                    </td>
                                </tr>

                                <!-- Active partiners Modal -->
                                <div class="modal fade " id="activepartiners{{ $partiners->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                                        <div class="modal-content p-3 p-md-5">
                                            <div class="modal-body">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                                <div class="text-center mb-4">
                                                    <h4 class="modal-title" id="userCrudModal">هل انت متاكد انك تريد تغيير
                                                        حاله شركة</h4>
                                                    <p>تغيير حالة شركة </p>
                                                </div>
                                                <form id="" class="row g-3"
                                                    action="{{ route('activepartiners', $partiners->id) }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" id="activepartinersId" class="activepartinersId"
                                                        value="{{ $partiners->id }}">
                                                    <div class="col-12 text-center">
                                                        <button type="mit" id="mit"
                                                            class="btn btn-primary me-sm-3 me-1 mt-3 activepartiners">تغيير
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
                                <!--/ Active partiners Modal -->

                                <!-- Delete partiners Modal -->
                                <div class="modal fade " id="deletepartiners{{ $partiners->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                                        <div class="modal-content p-3 p-md-5">
                                            <div class="modal-body">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                                <div class="text-center mb-4">
                                                    <h4 class="modal-title" id="userCrudModal">هل انت متاكد انك تريد حذف
                                                        شركة</h4>
                                                    <p>في حال الموافقه سوف يتم حذف الصنف بشكل نهائي ولن تستطيع التراجع </p>
                                                </div>
                                                <form action="{{ route('deletepartiners', $partiners->id) }}"
                                                    class="row g-3" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" value="{{ $partiners->id }}">
                                                    <div class="col-12 text-center">
                                                        <button type="mit" id="mit"
                                                            class="btn btn-primary me-sm-3 me-1 mt-3 deletepartiners">حذف
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
                                <!--/ Delete partiners Modal -->
                            @endforeach
                        </x-slot>
                    </table>
                </div>
            </x-table>
        @elseif($do == 'Add')
            <!-- Add partiners Modal -->
            @if (session()->has('success'))
                <div class="alert alert-success" id="message">
                    {{ session()->get('success') }}
                </div>
            @elseif (session()->has('error'))
                <div class="alert alert-danger" id="message">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="col-md-12 m-auto">
                <div class="card mb-4 p-4 ">
                    <h1 class="text-start fs-3 ">اضافه تقرير جديد</h1>
                    <div class="card-body demo-vertical-spacing demo-only-element">

                        <form class="row g-3" action="{{ route('addpartiners') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <label for="defaultFormControlInput" class="form-label"> الاسم (عربي)</label>
                                <input type="text" name="titleAr" class="form-control  name ar"
                                    id="addpartinersNameAr" placeholder="اضف  شركة" value="{{ old('titleAr') }}"
                                    aria-describedby="defaultFormControlHelp" />
                                @error('titleAr')
                                    <span class="help-block text-danger">* {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="defaultFormControlInput" class="form-label">الاسم (انجليزي)</label>
                                <input type="text" name="titleEn" class="form-control  " id="addpartinersNameEn"
                                    value="{{ old('titleEn') }}" placeholder="اضف  شركة"
                                    aria-describedby="defaultFormControlHelp" />
                                @error('titleEn')
                                    <span class="help-block text-danger">* {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="defaultFormControlInput" class="form-label">صورة</label>
                                <input type="file" name="image"
                                    oninput="previewImage.src=window.URL.createObjectURL(this.files[0])"
                                    class="form-control  " id="addpartinersPhone" placeholder="اضف صورة شركة"
                                    aria-describedby="defaultFormControlHelp" value="{{ old('image') }}" />
                                @error('image')
                                    <span class="help-block text-danger">* {{ $message }} </span>
                                @enderror <div class="col-md-12 mb-2 my-2 m-auto">
                                    <img id="previewImage" style="max-height: 100px;">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="defaultFormControlInput" class="form-label">( العربي) مميزات اخرى</label>
                                <textarea name="descriptionAr" id="" cols="30" rows="10"></textarea>
                                @error('descriptionAr')
                                    <span class="help-block text-danger">* {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="defaultFormControlInput" class="form-label">مميزات اخرى (انجليزي)</label>
                                <textarea name="descriptionEn" id="" cols="30" rows="10"></textarea>
                                @error('descriptionEn')
                                    <span class="help-block text-danger">* {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-12 text-center">
                                <button type="mit" class="btn btn-primary me-sm-3 me-1 mt-3 addpartiners">
                                    اضافة شركة</button>
                                <button type="reset" class="btn btn-label-secondary btn-reset mt-3"
                                    data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!--/ Add partiners Modal -->
        @elseif($do == 'Edit')
            <!-- start Edit model -->
            <?php $partinersId = isset($_GET['partinersId']) && is_numeric($_GET['partinersId']) ? intval($_GET['partinersId']) : 0; ?>
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
                    <h1 class="text-start fs-3 ">تعديل معلومات شركة</h1>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        @foreach ($partiners as $partiners)
                            @if ($partinersId == $partiners->id)
                                <form class="row g-3" action="{{ route('editpartiners', $partiners->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="partinersId" value="{{ $partinersId }}">
                                    <div class="col-md-6">
                                        <label for="defaultFormControlInput" class="form-label"> الاسم (عربي)</label>
                                        <input type="text" name="titleAr" class="form-control"
                                            value="{{ $partiners->getTranslation('title', 'ar') }}" id="addpartinersNameAr"
                                            placeholder="اضف  شركة" aria-describedby="defaultFormControlHelp" />
                                        @error('titleAr')
                                            <span class="help-block text-danger">* {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="defaultFormControlInput" class="form-label">الاسم (انجليزي)</label>
                                        <input type="text" name="titleEn" class="form-control  "
                                            id="addpartinersNameEn" value="{{ $partiners->getTranslation('title', 'en') }}"
                                            placeholder="اضف  شركة" aria-describedby="defaultFormControlHelp" />
                                        @error('titleEn')
                                            <span class="help-block text-danger">* {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="defaultFormControlInput" class="form-label">صورة</label>
                                        <input type="file" name="image"
                                            oninput="previewImage.src=window.URL.createObjectURL(this.files[0])"
                                            class="form-control  " id="addpartinersPhone" placeholder="اضف صورة شركة"
                                            value="{{ $partiners->image }}" aria-describedby="defaultFormControlHelp" />
                                        @error('image')
                                            <span class="help-block text-danger">* {{ $message }} </span>
                                        @enderror <div class="col-md-12 mb-2 my-2 m-auto">
                                            <img id="previewImage" src="{{ URL::asset('images/' . $partiners->image) }}"
                                                style="max-height: 100px;">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="defaultFormControlInput" class="form-label">الوصف (انجليزي)</label>
                                        <textarea type="text" name="descriptionAr" class="form-control"> {{ $partiners->getTranslation('description', 'ar') }}
                                        </textarea>
                                        @error('descriptionAr')
                                            <span class="help-block text-danger">* {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label for="defaultFormControlInput" class="form-label">الوصف (انجليزي)</label>
                                        <textarea type="text" name="descriptionEn" class="form-control  ">{{ $partiners->getTranslation('description', 'en') }}
                                        </textarea>
                                        @error('descriptionEn')
                                            <span class="help-block text-danger">* {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="mit" class="btn btn-primary me-sm-3 me-1 mt-3 addpartiners">
                                            نعديل معلومات شركة</button>
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
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('descriptionAr');
        CKEDITOR.replace('descriptionEn');
    </script>
@endsection
