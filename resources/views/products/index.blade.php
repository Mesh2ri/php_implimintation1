@extends('layouts.admin')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col d-flex justify-content-center align-items-center">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h3 class="text-white">اضافة منتج</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('Product.create') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <select name="categories_id" class="form-select mb-4">
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}" name="categories_id">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="name" class="form-lable">اسم المنتج</label>
                                    <input type="text" class="form-controll" name="name">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="description" class="form-lable">وصف المنتج</label>
                                    <input type="text" class="form-control" name="description">
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="stock" class="form-label">الكمية</label>
                                    <input type="number" class="form-control" name="stock">
                                    @error('stock')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="image" class="form-label">الصورة</label>
                                    <input type="file" class="form-control" name="image">
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="price" class="form-label">السعر</label>
                                    <input type="number" class="form-control" name="price">
                                    @error('price')
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
                                    <td class="text-center">رقم المنتج</td>
                                    <td class="text-center">اسم المنتج</td>
                                    <td class="text-center">وصف المنتج</td>
                                    <td class="text-center">سعر المنتج</td>
                                    <td class="text-center">كمية المنتج</td>
                                    <td class="text-center">فئة المنتج</td>
                                    <td class="text-center">صورة المنتج</td>
                                    <td class="text-center" colspan="2">اجراء</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $item)
                                    <tr>
                                        <td class="text-center">{{ $item->id }}</td>
                                        <td class="text-center">{{ $item->name }}</td>
                                        <td class="text-center">{{ $item->description }}</td>
                                        <td class="text-center">{{ $item->price }}</td>
                                        <td class="text-center">{{ $item->stock }}</td>
                                        <td class="text-center">{{ $item->categories_id }}</td>
                                        <td class="text-center">{{ $item->image }}</td>
                                        <td class="text-center"><a href="{{ route('Product.edit', ['id' => $item->id]) }}" name="id"><i class="bi bi-pencil-fill text-success"></i></a>
                                        </td>
                                        <!-- <td class="text-center"><button onclick="DeleteCat({{ $item->id }})"><i class="bi bi-trash3 text-danger"></i></button></td> -->
                                        <td class="text-center"><a href="{{ route('Product.delete', ['id' =>$item->id]) }}"><i class="bi bi-trash3 text-danger"></i></a></td>
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