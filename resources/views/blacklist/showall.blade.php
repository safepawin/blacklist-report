@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <h4 class="text-center">ประวัติการทำผิดของ บัญชีนี้ทั้งหมด</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">เลขบัญชี/เบอร์โทร</th>
                            <th scope="col">ชื่อ</th>
                            {{-- <th scope="col">จำนวนนคนที่โดนโกง</th> --}}
                            <th scope="col">จำนวนเงิน</th>
                            <th scope="col">เวลา</th>
                            <th scope="col">รายระเอียด</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blacklists as $i => $item)
                            <tr>
                                <th scope="row">{{ $i + 1 }}</th>
                                <td>{{ $item->identity_bank }}</td>
                                <td>{{ $item->name.' '.$item->lastname }}</td>
                                <td>{{ number_format($item->price, 2) }}</td>
                                {{-- <td>{{  }}</td> --}}
                                <td>{{ $item->created_at }}</td>
                                <td><a href="{{ route('blacklist.show', $item->id) }}">Check</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
