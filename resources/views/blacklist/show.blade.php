@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">เลขบัญชี/เบอร์โทร</th>
                            <th scope="col">ชื่อ</th>
                            <th scope="col">จำนวนเงิน</th>
                            <th scope="col">ของที่โกง</th>
                            <th scope="col">เวลา</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="">{{ $blacklist->identity_bank }}</a></td>
                            <td>{{ $blacklist->name . $blacklist->lastname }}</td>
                            <td>{{ number_format($blacklist->price, 2) }}</td>
                            <td>{{ $blacklist->product }}</td>
                            <td>{{ $blacklist->created_at }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-12 col-md-12">
                <h4>รายระเอียดการโกง</h4>
                <blockquote>
                    {{ $blacklist->detail }}
                </blockquote>
            </div>
            <hr>
            <div class="col-sm-12 col-md-12">
                <h4 class="text-center text-danger">รูปหลักฐานการโอนเงินหรือช่องแชทการโกง</h4>
            </div>
            @foreach ($blacklist->blacklist_images as $item)
                <div class="col-sm-12 col-md-4 pt-2">
                    <img class="w-100" src="{{ asset('images/' . $item->image) }}" alt="">
                </div>
            @endforeach
        </div>
    </div>
@endsection
