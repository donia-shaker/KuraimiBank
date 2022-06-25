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
            <h2 name="tableName m-5 ">  الوظائف</h2>
            <a href="jobs?do=Add" class="btn w-25 p-2 contact">
                <button type="button" class="btn btn-primary m-4 px-5 d-flex justify-content-start text-center"
                    id="addjobs"> اضافه وظيفة جديدة </button></a>
            <x-table>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <x-slot name="tableHead">
                            <tr>
                                <th>#</th>
                                <th>الاسم </th>
                                <th> معلومات الوظيفه</th>
                                <th> الحاله</th>
                                <th>العمليات</th>
                            </tr>
                        </x-slot>
                        <x-slot name="tableBody" id="tbody">
                            <?php $i = 1; ?>
                            @foreach ($jobs as $jobs)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $jobs->title }}</td>
                                    <td><a href="jobs?do=Edit&jobsId={{ $jobs->id }}" style="color:#03c3ec99">تفاصيل الوظيفه</a></td>
                                    <td>
                                        @if ($jobs->is_active == 1)
                                            <label class="switch" data-bs-toggle="modal"
                                                data-bs-target="#activejobs{{ $jobs->id }}">
                                                <input type="checkbox" class="switch-input" name="active" checked>
                                                <span class="switch-toggle-slider">
                                                    <span class="switch-on"></span>
                                                    <span class="switch-off"></span>
                                                </span>
                                            </label>
                                        @else
                                            <label class="switch" data-bs-toggle="modal"
                                                data-bs-target="#activejobs{{ $jobs->id }}">
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
                                            href="jobs?do=Edit&jobsId={{ $jobs->id }}"><i
                                                class=" bx bx-edit-alt me-2"></i>
                                        </a>
                                        <a class="btn btn-icon btn-outline-dribbble mx-2 deletCategoryLink"
                                            data-bs-toggle="modal" data-bs-target="#deletejobs{{ $jobs->id }}"
                                            href="javascript:void(0);"><i class=" bx bx-trash me-2"></i>
                                        </a>
                                    </td>
                                </tr>

                                <!-- Active jobs Modal -->
                                <div class="modal fade " id="activejobs{{ $jobs->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                                        <div class="modal-content p-3 p-md-5">
                                            <div class="modal-body">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                                <div class="text-center mb-4">
                                                    <h4 class="modal-title" id="userCrudModal">هل انت متاكد انك تريد تغيير
                                                        حاله وظيفة</h4>
                                                    <p>تغيير حالة وظيفة </p>
                                                </div>
                                                <form id="" class="row g-3"
                                                    action="{{ route('activejobs', $jobs->id) }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" id="activejobsId" class="activejobsId"
                                                        value="{{ $jobs->id }}">
                                                    <div class="col-12 text-center">
                                                        <button type="mit" id="mit"
                                                            class="btn btn-primary me-sm-3 me-1 mt-3 activejobs">تغيير
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
                                <!--/ Active jobs Modal -->

                                <!-- Delete jobs Modal -->
                                <div class="modal fade " id="deletejobs{{ $jobs->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                                        <div class="modal-content p-3 p-md-5">
                                            <div class="modal-body">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                                <div class="text-center mb-4">
                                                    <h4 class="modal-title" id="userCrudModal">هل انت متاكد انك تريد حذف
                                                        وظيفة</h4>
                                                    <p>في حال الموافقه سوف يتم حذف الصنف بشكل نهائي ولن تستطيع التراجع </p>
                                                </div>
                                                <form action="{{ route('deletejobs', $jobs->id) }}"
                                                    class="row g-3" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" value="{{ $jobs->id }}">
                                                    <div class="col-12 text-center">
                                                        <button type="mit" id="mit"
                                                            class="btn btn-primary me-sm-3 me-1 mt-3 deletejobs">حذف
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
                                <!--/ Delete jobs Modal -->
                            @endforeach
                        </x-slot>
                    </table>
                </div>
            </x-table>
        @elseif($do == 'Add')
            <!-- Add jobs Modal -->
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
                    <h1 class="text-start fs-3 ">اضافة معلومه وظيفة</h1>
                    <div class="card-body demo-vertical-spacing demo-only-element">

                        <form class="row g-3" action="{{ route('addjobs') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <label for="defaultFormControlInput" class="form-label"> الاسم (عربي)</label>
                                <input type="text" name="titleAr" class="form-control  name ar"
                                    id="addjobsNameAr" placeholder="اضف  وظيفة" value="{{ old('nameAr') }}"
                                    aria-describedby="defaultFormControlHelp" />
                                @error('titleAr')
                                    <span class="help-block text-danger">* {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="defaultFormControlInput" class="form-label">الاسم (انجليزي)</label>
                                <input type="text" name="titleEn" class="form-control  " id="addjobsNameEn"
                                    value="{{ old('titleEn') }}" placeholder="اضف  وظيفة"
                                    aria-describedby="defaultFormControlHelp" />
                                @error('titleEn')
                                    <span class="help-block text-danger">* {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="defaultFormControlInput" class="form-label">( العربي) مميزات اخرى</label>
                                <textarea name="descriptionAr" id="" cols="30" rows="10"></textarea>
                                @error('descriptionAr')
                                    <span class="help-block text-danger">* {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="defaultFormControlInput" class="form-label">مميزات اخرى (انجليزي)</label>
                                <textarea name="descriptionEn" id="" cols="30" rows="10"></textarea>
                                @error('descriptionEn')
                                    <span class="help-block text-danger">* {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-12 text-center">
                                <button type="mit" class="btn btn-primary me-sm-3 me-1 mt-3 addjobs">
                                    اضافة وظيفة</button>
                                <button type="reset" class="btn btn-label-secondary btn-reset mt-3"
                                    data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!--/ Add jobs Modal -->
        @elseif($do == 'Edit')
            <!-- start Edit model -->
            <?php $jobsId = isset($_GET['jobsId']) && is_numeric($_GET['jobsId']) ? intval($_GET['jobsId']) : 0; ?>
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
                    <h1 class="text-start fs-3 ">تعديل معلومات وظيفة</h1>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        @foreach ($jobs as $jobs)
                            @if ($jobsId == $jobs->id)
                                <form class="row g-3" action="{{ route('editjobs', $jobs->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="jobsId" value="{{ $jobsId }}">
                                    <div class="col-md-6">
                                        <label for="defaultFormControlInput" class="form-label"> الاسم (عربي)</label>
                                        <input type="text" name="titleAr" class="form-control"
                                            value="{{ $jobs->getTranslation('title', 'ar') }}" id="addjobsNameAr"
                                            placeholder="اضف  وظيفة" aria-describedby="defaultFormControlHelp" />
                                        @error('titleAr')
                                            <span class="help-block text-danger">* {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="defaultFormControlInput" class="form-label">الاسم (انجليزي)</label>
                                        <input type="text" name="titleEn" class="form-control  "
                                            id="addjobsNameEn" value="{{ $jobs->getTranslation('title', 'en') }}"
                                            placeholder="اضف  وظيفة" aria-describedby="defaultFormControlHelp" />
                                        @error('titleEn')
                                            <span class="help-block text-danger">* {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="defaultFormControlInput" class="form-label">الوصف (انجليزي)</label>
                                        <textarea type="text" name="descriptionAr" class="form-control"> {{ $jobs->getTranslation('description', 'ar') }}
                                        </textarea>
                                        @error('descriptionAr')
                                            <span class="help-block text-danger">* {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="defaultFormControlInput" class="form-label">الوصف (انجليزي)</label>
                                        <textarea type="text" name="descriptionEn" class="form-control  ">{{ $jobs->getTranslation('description', 'en') }}
                                        </textarea>
                                        @error('descriptionEn')
                                            <span class="help-block text-danger">* {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="mit" class="btn btn-primary me-sm-3 me-1 mt-3 addjobs">
                                            نعديل معلومات وظيفة</button>
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
