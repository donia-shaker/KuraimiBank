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
            <h2 name="tableName m-5 ">  اداره الاخبار في الموقع</h2>
            <a href="news?do=Add" class="btn d-flex justify-content-start p-2 contact">
                <button type="button" class="btn color m-4 px-5  w-25 text-center"
                    id="addnews"> اضافه خبر جديد </button></a>
            <x-table>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <x-slot name="tableHead">
                            <tr>
                                <th>#</th>
                                <th>عنوان الخبر  </th>
                                <th>الصوره</th>
                                <th> صورة الخلفيه</th>
                                <th> الحاله</th>
                                <th>العمليات</th>
                            </tr>
                        </x-slot>
                        <x-slot name="tableBody" id="tbody">
                            <?php $i = 1; ?>
                            @foreach ($news as $news)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $news->title }}</td>
                                    <td><img src="{{ URL::asset('images/' . $news->image) }}" width="80"></td>
                                    <td><img src="{{ URL::asset('images/' . $news->image) }}" width="80"></td>
                                    <td>
                                        @if ($news->is_active == 1)
                                            <label class="switch" data-bs-toggle="modal"
                                                data-bs-target="#activeNews{{ $news->id }}">
                                                <input type="checkbox" class="switch-input" name="active" checked>
                                                <span class="switch-toggle-slider">
                                                    <span class="switch-on"></span>
                                                    <span class="switch-off"></span>
                                                </span>
                                            </label>
                                        @else
                                            <label class="switch" data-bs-toggle="modal"
                                                data-bs-target="#activeNews{{ $news->id }}">
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
                                            href="news?do=Edit&newsId={{ $news->id }}"><i
                                                class=" bx bx-edit-alt me-2"></i>
                                        </a>
                                        <a class="btn btn-icon btn-outline-dribbble mx-2 deletCategoryLink"
                                            data-bs-toggle="modal" data-bs-target="#deleteNews{{ $news->id }}"
                                            href="javascript:void(0);"><i class=" bx bx-trash me-2"></i>
                                        </a>
                                    </td>
                                </tr>

                                <!-- Active news Modal -->
                                <div class="modal fade " id="activeNews{{ $news->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                                        <div class="modal-content p-3 p-md-5">
                                            <div class="modal-body">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                                <div class="text-center mb-4">
                                                    <h4 class="modal-title" id="userCrudModal">هل انت متاكد انك تريد تغيير
                                                        حاله الخبر</h4>
                                                    <p>تغيير حالة الخبر </p>
                                                </div>
                                                <form id="" class="row g-3"
                                                    action="{{ route('activeNews', $news->id) }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" id="activeNewsId" class="activeNewsId"
                                                        value="{{ $news->id }}">
                                                    <div class="col-12 text-center">
                                                        <button type="mit" id="mit"
                                                            class="btn color me-sm-3 me-1 mt-3 activeNews">تغيير
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
                                <!--/ Active news Modal -->

                                <!-- Delete news Modal -->
                                <div class="modal fade " id="deleteNews{{ $news->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                                        <div class="modal-content p-3 p-md-5">
                                            <div class="modal-body">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                                <div class="text-center mb-4">
                                                    <h4 class="modal-title" id="userCrudModal">هل انت متاكد انك تريد حذف
                                                        الخبر</h4>
                                                    <p>في حال الموافقه سوف يتم حذف الخبر بشكل نهائي ولن تستطيع التراجع </p>
                                                </div>
                                                <form action="{{ route('deleteNews', $news->id) }}"
                                                    class="row g-3" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" value="{{ $news->id }}">
                                                    <div class="col-12 text-center">
                                                        <button type="mit" id="mit"
                                                            class="btn color me-sm-3 me-1 mt-3 deleteNews">حذف
                                                            الخبر</button>
                                                        <button type="reset"
                                                            class="btn btn-label-secondary btn-reset mt-3"
                                                            data-bs-dismiss="modal" aria-label="Close">الغاء</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Delete news Modal -->
                            @endforeach
                        </x-slot>
                    </table>
                </div>
            </x-table>
        @elseif($do == 'Add')
            <!-- Add news Modal -->
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
                    <h1 class="text-start fs-3 ">اضافة معلومه الخبر</h1>
                    <div class="card-body demo-vertical-spacing demo-only-element">

                        <form class="row g-3" action="{{ route('addNews') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <label for="defaultFormControlInput" class="form-label"> الاسم (عربي)</label>
                                <input type="text" name="titleAr" class="form-control  name ar"
                                    id="addnewsNameAr" placeholder="اضف  الخبر AR" value="{{ old('nameAr') }}"
                                    aria-describedby="defaultFormControlHelp" />
                                @error('titleAr')
                                    <span class="help-block text-danger">* {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="defaultFormControlInput" class="form-label">الاسم (انجليزي)</label>
                                <input type="text" name="titleEn" class="form-control  " id="addnewsNameEn"
                                    value="{{ old('titleEn') }}" placeholder="اضف  الخبر EN"
                                    aria-describedby="defaultFormControlHelp" />
                                @error('titleEn')
                                    <span class="help-block text-danger">* {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="defaultFormControlInput" class="form-label">صورة</label>
                                <input type="file" name="image"
                                    oninput="previewImage.src=window.URL.createObjectURL(this.files[0])"
                                    class="form-control  " id="addnewsPhone" placeholder="اضف صورة الخبر"
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
                                    class="form-control " placeholder="اضف  صورة خلفيه الخبر"
                                    value="{{ old('background_image') }}" aria-describedby="defaultFormControlHelp" />
                                @error('background_image')
                                    <span class="help-block text-danger">* {{ $message }} </span>
                                @enderror
                                <div class="col-md-12 mb-2 my-2 m-auto">
                                    <img id="previewImageTwo" style="max-height: 100px;">
                                </div>
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
                                <button type="mit" class="btn color me-sm-3 me-1 mt-3 addnews">
                                    اضافة الخبر</button>
                                <button type="reset" class="btn btn-label-secondary btn-reset mt-3"
                                    data-bs-dismiss="modal" aria-label="Close">الغاء</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!--/ Add news Modal -->
        @elseif($do == 'Edit')
            <!-- start Edit model -->
            <?php $newsId = isset($_GET['newsId']) && is_numeric($_GET['newsId']) ? intval($_GET['newsId']) : 0; ?>
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
                    <h1 class="text-start fs-3 ">تعديل معلومات الخبر</h1>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        @foreach ($news as $news)
                            @if ($newsId == $news->id)
                                <form class="row g-3" action="{{ route('editNews', $news->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="newsId" value="{{ $newsId }}">
                                    <div class="col-md-6">
                                        <label for="defaultFormControlInput" class="form-label"> الاسم (عربي)</label>
                                        <input type="text" name="titleAr" class="form-control"
                                            value="{{ $news->getTranslation('title', 'ar') }}" id="addnewsNameAr"
                                            placeholder="اضف  الخبر AR" aria-describedby="defaultFormControlHelp" />
                                        @error('titleAr')
                                            <span class="help-block text-danger">* {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="defaultFormControlInput" class="form-label">الاسم (انجليزي)</label>
                                        <input type="text" name="titleEn" class="form-control  "
                                            id="addnewsNameEn" value="{{ $news->getTranslation('title', 'en') }}"
                                            placeholder="اضف  الخبر EN" aria-describedby="defaultFormControlHelp" />
                                        @error('titleEn')
                                            <span class="help-block text-danger">* {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="defaultFormControlInput" class="form-label">صورة</label>
                                        <input type="file" name="image"
                                            oninput="previewImage.src=window.URL.createObjectURL(this.files[0])"
                                            class="form-control  " id="addnewsPhone" placeholder="اضف صورة الخبر"
                                            value="{{ $news->image }}" aria-describedby="defaultFormControlHelp" />
                                        @error('image')
                                            <span class="help-block text-danger">* {{ $message }} </span>
                                        @enderror <div class="col-md-12 mb-2 my-2 m-auto">
                                            <img id="previewImage" src="{{ URL::asset('images/' . $news->image) }}"
                                                style="max-height: 100px;">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="defaultFormControlInput" class="form-label"> صورة الخلفية</label>
                                        <input type="file" name="background_image"
                                            value="{{ $news->background_image }}"
                                            oninput="previewImageTwo.src=window.URL.createObjectURL(this.files[0])"
                                            class="form-control " placeholder="اضف  صورة خلفيه الخبر"
                                            aria-describedby="defaultFormControlHelp" />
                                        @error('background_image')
                                            <span class="help-block text-danger">* {{ $message }} </span>
                                        @enderror <div class="col-md-12 mb-2 my-2 m-auto">
                                            <img id="previewImageTwo"
                                                src="{{ URL::asset('images/' . $news->background_image) }}"
                                                style="max-height: 100px;">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="defaultFormControlInput" class="form-label">تفاصيل اخرى (عربي)</label>
                                        <textarea type="text" name="descriptionAr" class="form-control"> {{ $news->getTranslation('description', 'ar') }}
                                        </textarea>
                                        @error('descriptionAr')
                                            <span class="help-block text-danger">* {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="defaultFormControlInput" class="form-label">تفاصيل اخرى  (انجليزي)</label>
                                        <textarea type="text" name="descriptionEn" class="form-control  ">{{ $news->getTranslation('description', 'en') }}
                                        </textarea>
                                        @error('descriptionEn')
                                            <span class="help-block text-danger">* {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="mit" class="btn color me-sm-3 me-1 mt-3 addnews">
                                            نعديل معلومات الخبر</button>
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
