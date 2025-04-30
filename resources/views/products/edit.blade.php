@extends('layouts.admin')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col d-flex justify-content-center align-items-center">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h3 class="text-white">تحرير منتج</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('Product.update') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $products -> id }}">
                            <div class="row">
                                <div class="col">
                                    <select name="categories_id" class="form-select mb-4">
                                        <option value="{{ $ProdCateg -> id }}">{{ $ProdCateg -> name }}</option>
                                        @foreach ($categexcluded as $item)
                                            <option value="{{ $item->id }}" name="categories_id">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="name" class="form-lable">اسم المنتج</label>
                                    <input type="text" class="form-controll" name="name" value="{{ $products->name }}">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="description" class="form-lable">وصف المنتج</label>
                                    <input type="text" class="form-control" name="description" value="{{ $products->description }}">
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="stock" class="form-label">الكمية</label>
                                    <input type="number" class="form-control" name="stock" value="{{ $products->stock }}">
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
                                    <input type="number" class="form-control" name="price" value="{{ $products->price }}">
                                    @error('price')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <img src="{{ $products -> image }}" alt="product image" width="50" height="50">
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