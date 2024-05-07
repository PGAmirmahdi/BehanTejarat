@extends('Admin.Panel')
@section($title,'title')
@can('edit-products')
    @section('ZPanel')
        <div class="row no-gutters">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <!-- panel body -->
                    <div class="panel-body d-flex flex-column justify-content-center align-items-center col-12">
                        <button type="button" onclick="PrintDiv();" value="Print" class="btn btn-info m-2 mt-5"><i class="material-icons">print</i></button>
                        <span id="printdivcontent">
                        <table class="table text-center mt-5" dir="rtl">
                            <thead>
                            <tr>
                                <th colspan="2" class="bg-info"> لینک های محصول {{$item->PName }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="text-center">
                                <th scope="col">تاریخ ثبت</th>
                                <td>{{$item -> date}}</td>
                            </tr>
                            <tr>
                                <th scope="col">نام محصول</th>
                                <td>{{$item -> PName}}</td>
                            </tr>
                            <tr>
                                <th scope="col">زیر مجموعه اول</th>
                                <td>{{$item -> ProName1}}</td>
                            </tr>
                             @for($i = 2; $i <= 20; $i++)
                                 @if(!$item->{"ProName$i"} == "")
                            <tr>
                                        <th scope="col">زیر مجموعه {{$i}}</th>
                                        <td>{{ $item->{"ProName$i"} }}</td>
                            </tr>
                                 @endif
                             @endfor
                            <tr>
                                <td colspan="2"><a href="{{url()->previous()}}" class="btn btn-danger btn-block mb-2">بازگشت</a></td>
                            </tr>
                            </tbody>
                        </table>
                            </span>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endcan
