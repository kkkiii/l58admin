<?php
use Illuminate\Support\Str;
?>
@extends('layouts.adminbase')

@section('content')



    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">姓名</th>
            <th scope="col">电话</th>
            <th scope="col">性别</th>

            <th scope="col">年龄</th>
            <th scope="col">出生日期</th>
            <th scope="col">身份证号</th>
            <th scope="col">户籍所在地</th>
            <th scope="col">状态</th>
            <th scope="col">添加时间</th>
            <th scope="col">操作</th>

        </tr>
        </thead>
        <tbody>


        @foreach ($consumers as $item)

            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->realname}}</td>
                <td>{{$item->mobile}}</td>

                <td>{{$item->sex}}</td>
                <td>{{$item->age}}</td>
                <td>{{$item->birthday}}</td>
                <td>{{$item->idcard}}</td>
                <td>{{$item->area}}</td>
                <td>{{$item->is_lock}}</td>
                <td>{{$item->add_time}}</td>
                <td>
                    @if ($item->is_lock==0)

                        <a href="/admin/consumer.lock/{{$item->id}}" class="btn btn-info">冻结</a>
                    @endif



                        <a href="/admin/consumer.del/{{$item->id}}" class="btn btn-info">删除</a>
                </td>
            </tr>

        @endforeach



        </tbody>
    </table>

    {{ $consumers->links()}}

@endsection