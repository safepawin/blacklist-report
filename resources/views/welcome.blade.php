@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <h4 class="text-center">กรอกเบอร์หรือเลขบัญชีที่ท่านต้องการค้นหา</h4>
                <form action="{{ route('blacklist.findIdentityBank') }}" method="post">
                    @method("POST")
                    @csrf
                    <div class="form-group">
                        <label for=""></label>
                        <input type="text" class="form-control" name="identity_bank" placeholder="0123456789">
                    </div>
                    <div class="form-group mx-auto text-center">
                        <input type="submit" value="ค้นหา" class="btn btn-success">
                    </div>
                </form>
            </div>
            <div class="col-sm-12 col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">เลขบัญชี/เบอร์โทร</th>
                            <th scope="col">ชื่อ</th>
                            {{-- <th scope="col">จำนวนนคนที่โดนโกง</th> --}}
                            <th scope="col">จำนวนเงิน</th>
                            <th scope="col">เวลา</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blacklist as $i => $item)
                            <tr>
                                <th scope="row">{{ $i+1 }}</th>
                                <td><a tooltip="ดูประวัติบัญชีนี้ทั้งหมด" href="{{ route('blacklist.showall',$item->identity_bank) }}">{{ $item->identity_bank }}</a></td>
                                <td>{{ $item->name.' '.$item->lastname }}</td>
                                <td>{{ number_format($item->price,2) }}</td>
                                {{-- <td>{{  }}</td> --}}
                                <td>{{ $item->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-12">
                <h1>{{ dd(Auth::user()) }} <-----</h1>
            </div>
        </div>
    </div>
@endsection
