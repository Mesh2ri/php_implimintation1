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
                        <h3 class="text-white">اضافة</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('categories.create') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="catname" class="form-lable">اسم الفئة</label>
                                    <input type="text" class="form-controll" name="name">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="description" class="form-lable">وصف الفئة</label>
                                    <input type="text" class="form-control" name="description">
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
        <div class="row mt-5">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-white">الفئات</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td class="text-center">رقم الفئة</td>
                                    <td class="text-center">اسم الفئة</td>
                                    <td class="text-center">وصف الفئة</td>
                                    <td class="text-center" colspan="2">اجراء</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $item)
                                    <tr>
                                        <td class="text-center">{{ $item->id }}</td>
                                        <td class="text-center">{{ $item->name }}</td>
                                        <td class="text-center">{{ $item->description }}</td>
                                        <td class="text-center"><a href="{{ route('categories.edit', ['id' => $item->id]) }}" name="id"><i class="bi bi-pencil-fill text-success"></i></a>
                                        </td>
                                        <!-- <td class="text-center"><button onclick="DeleteCat({{ $item->id }})"><i class="bi bi-trash3 text-danger"></i></button></td> -->
                                        <td class="text-center"><a href="{{ route('categories.delete', ['id' =>$item->id]) }}"><i class="bi bi-trash3 text-danger"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection