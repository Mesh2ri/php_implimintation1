@extends('layouts.admin')
@section('content')

    <div class="modal" tabindex="-1" id="deleteModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">تأكيد الحذف</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>هل بالفعل تريد حذف هذا السجل؟</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="confirmDelete()">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-5">
        <div class="row">
            <div class="col d-flex justify-content-center align-items-center">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-white">تحرير الفئة</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('categories.update') }}" method="post">
                            @csrf
                            <input type="hidden" value="{{ $categories->id }}" name="id">
                            <div class="row">
                                <div class="col">
                                    <label for="catname" class="form-lable">اسم الفئة</label>
                                    <input type="text" class="form-controll" name="name" value="{{ $categories->name }}">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="description" class="form-lable">وصف الفئة</label>
                                    <input type="text" class="form-control" name="description" value="{{ $categories->description }}">
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-success w-100">حفظ</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection