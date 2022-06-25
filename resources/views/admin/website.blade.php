@extends('admin.layout.dashboard')
@section('content')
@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@elseif (session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('success') }}
    </div>
@endif
@foreach ($webSiteInfo as $website)
    <div class="col-md-12 m-auto">
        <div class="card mb-4 p-4 ">
            <h1 class="text-start fs-3 ">تعديل معلومات الخدمة</h1>
            <div class="card-body demo-vertical-spacing demo-only-element">
                <form class="row g-3" action="{{ route('editwebsite') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="websiteId" value="{{ $website->id }}">
                    
                    <div class="col-md-12">
                        <label for="defaultFormControlInput" class="form-label">{!! $website->getTranslation('table_key', 'ar') !!}</label>
                        <textarea type="text" name="table_valueAr" class="form-control"> {{ $website->getTranslation('table_value','ar') }}
                        </textarea>
                        @error('table_valueAr')
                            <span class="help-block text-danger">* {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="defaultFormControlInput" class="form-label">{!! $website->getTranslation('table_key', 'en') !!}</label>
                        <textarea type="text" name="table_valueEn" class="form-control  ">{{ $website->getTranslation('table_key', 'en') }}
                    </textarea>
                        @error('table_valueEn')
                            <span class="help-block text-danger">* {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="col-12 text-center">
                        <button type="mit" class="btn btn-primary me-sm-3 me-1 mt-3 addwebsite">
                            نعديل معلومات الخدمة</button>
                        <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal"
                            aria-label="Close">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
@endsection
@section('javascript')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('table_valueAr');
        CKEDITOR.replace('table_valueEn');
    </script>
@endsection