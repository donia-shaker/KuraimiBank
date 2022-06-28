@extends('admin.layout.dashboard')
@section('content')
    <!-- start page Content -->
        <!-- show message -->
        @if (session()->has('success'))
            <div class="alert alert-success" id="message">
                {{ session()->get('success') }}
            </div>
        @elseif (session()->has('error'))
            <div class="alert alert-danger" id="message">
                {{ session()->get('error') }}
            </div>
        @endif
        <!-- End show message -->

        <div class="card p-3">
            <h2 name="tableName m-5  ">  اداره المستخدمين</h2>
            <x-table>
                <div class="table-responsive text-nowrap">
                    <table class="table ">
                        <x-slot name="tableHead">
                            <tr>
                                <th>#</th>
                                <th>الاسم </th>
                                <th> الايميل</th>
                                <th> الحاله</th>
                                <th>العمليات</th>
                            </tr>
                        </x-slot>
                        <x-slot name="tableBody" id="tbody">
                            <?php $i = 1; ?>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->is_active == 1)
                                            <label class="switch" data-bs-toggle="modal"
                                                data-bs-target="#activeuser{{ $user->id }}">
                                                <input type="checkbox" class="switch-input" name="active" checked>
                                                <span class="switch-toggle-slider">
                                                    <span class="switch-on"></span>
                                                    <span class="switch-off"></span>
                                                </span>
                                            </label>
                                        @else
                                            <label class="switch" data-bs-toggle="modal"
                                                data-bs-target="#activeuser{{ $user->id }}">
                                                <input type="checkbox" class="switch-input" name="active">
                                                <span class="switch-toggle-slider">
                                                    <span class="switch-on"></span>
                                                    <span class="switch-off"></span>
                                                </span>
                                            </label>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-icon btn-outline-dribbble mx-2 deletCategoryLink"
                                            data-bs-toggle="modal" data-bs-target="#deleteuser{{ $user->id }}"
                                            href="javascript:void(0);"><i class=" bx bx-trash me-2"></i>
                                        </a>
                                    </td>
                                </tr>

                                <!-- Active user Modal -->
                                <div class="modal fade " id="activeuser{{ $user->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                                        <div class="modal-content p-3 p-md-5">
                                            <div class="modal-body">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                                <div class="text-center mb-4">
                                                    <h4 class="modal-title" id="userCrudModal">هل انت متاكد انك تريد تغيير
                                                        حاله الحدث</h4>
                                                    <p>تغيير حالة الحدث </p>
                                                </div>
                                                <form id="" class="row g-3"
                                                    action="{{ route('activeUser', $user->id) }}" method="GET"
                                                    enctype="multipart/form-data">
                                                    <input type="hidden" id="activeuserId" class="activeuserId"
                                                        value="{{ $user->id }}">
                                                    <div class="col-12 text-center">
                                                        <button type="mit" id="mit"
                                                            class="btn btn-primary me-sm-3 me-1 mt-3 activeuser">تغيير
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
                                <!--/ Active user Modal -->

                                <!-- Delete user Modal -->
                                <div class="modal fade " id="deleteuser{{ $user->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                                        <div class="modal-content p-3 p-md-5">
                                            <div class="modal-body">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                                <div class="text-center mb-4">
                                                    <h4 class="modal-title" id="userCrudModal">هل انت متاكد انك تريد حذف
                                                        الحدث</h4>
                                                    <p>في حال الموافقه سوف يتم حذف الصنف بشكل نهائي ولن تستطيع التراجع </p>
                                                </div>
                                                <form action="{{ route('deleteUser', $user->id) }}"
                                                    class="row g-3" method="GET" enctype="multipart/form-data">
                                                    <input type="hidden" value="{{ $user->id }}">
                                                    <div class="col-12 text-center">
                                                        <button type="mit" id="mit"
                                                            class="btn btn-primary me-sm-3 me-1 mt-3 deleteuser">حذف
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
                                <!--/ Delete user Modal -->
                            @endforeach
                        </x-slot>
                    </table>
                </div>
            </x-table>
@endsection
