@extends('Admin.Panel')
@section($title, 'title')
@section($about, 'about')

@can('edit-products')
    @section('ZPanel')
        <div class="container-fluid p-0">
            <div class="panel panel-primary">
                <!-- Panel heading -->
                <div class="panel-heading clearfix mb-4 d-flex flex-column justify-content-center align-items-center">
                    <img src="{{asset('assets/images/Provider.png')}}" alt="ورودی های محصول" class="img2">
                    <h1 class="panel-title text-dark text-center mb-5 mt-2">{{ $title }}</h1>
                    <p>{{ $about }}</p>
                </div>
                <!-- Panel body -->
                <div class="panel-body d-flex flex-column justify-content-center align-items-center col-12">
                    <!-- Print button and search form -->
                    <span class="d-flex row justify-content-center align-items-center">
                        <button type="button" onclick="PrintDiv();" value="Print" class="btn btn-info m-2">
                            <i class="material-icons">print</i>
                        </button>
                        <a href="{{ route('Admin.searchVorud') }}" class="btn btn-info">جست و جو</a>
                    </span>
                    <!-- Add new entry button -->
                    <a href="{{ route('Admin.Vorud.create') }}" class="btn btn-block btn-info">
                        افزودن ورودی محصول
                        <i class="material-icons">add_circle_outline</i>
                    </a>
                    <!-- Table -->
                    <div id="printdivcontent" class="table-responsive">
                        <table class="table text-center table-responsive" dir="rtl">
                            <thead>
                            <tr>
                                <th scope="col">تاریخ ثبت</th>
                                <th scope="col">نام محصول</th>
                                <th scope="col">نام تامین کننده</th>
                                <th scope="col">تاریخ ورود</th>
                                <th scope="col">قیمت ورودی</th>
                                <th scope="col">مقدار ورودی</th>
                                <th scope="col">قیمت کل ورودی</th>
                                <th scope="col">جزئیات</th>
                                <th scope="col">ویرایش</th>
                                <th scope="col">حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr class="text-center">
                                    <td>{{ $item->TS }}</td>
                                    <td>{{ $item->PName }}</td>
                                    <td>{{ $item->TName }}</td>
                                    <td>{{ $item->date }}</td>
                                    <td>
                                        @if($item->enterPrice == "")
                                            <span class="text-danger">نیازمند ویرایش</span>
                                        @else
                                            {{ number_format($item->enterPrice, 0, ".", ",") }} ريال
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->Count == "")
                                            <span class="text-danger">نیازمند ویرایش</span>
                                        @else
                                            {{ number_format($item->Count, 0, ".", ",") }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->TotalPrice == "")
                                            <span class="text-danger">نیازمند ویرایش</span>
                                        @else
                                            {{ number_format($item->TotalPrice, 0, ".", ",") }} ريال
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('Admin.Vorud.show', $item->id) }}" class="btn btn-info">
                                            <i class="material-icons">remove_red_eye</i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('Admin.Vorud.edit', $item->id) }}" class="btn btn-warning">
                                            <i class="material-icons">edit</i>
                                        </a>
                                    </td>
                                    <td>
                                        {{ html()->form('DELETE', route('Admin.Vorud.destroy', $item->id))->open() }}
                                        <button class="btn btn-danger">
                                            <i class="material-icons">delete</i>
                                        </button>
                                        {{ html()->form()->close() }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination -->
                    <span dir="ltr">
                        <a href="{{ $items->previousPageUrl() }}" class="btn btn-light">
                            <i class="material-icons text-dark">arrow_back</i>
                        </a>
                        @for($i=1; $i<=$items->lastPage(); $i++)
                            <a href="{{ $items->url($i) }}" class="btn btn-light page-item">{{ $i }}</a>
                        @endfor
                        <a href="{{ $items->nextPageUrl() }}" class="btn btn-light">
                            <i class="material-icons text-dark">arrow_forward</i>
                        </a>
                    </span>
                </div>
            </div>
        </div>
    @endsection
@endcan
