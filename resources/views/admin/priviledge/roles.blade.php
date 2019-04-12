<?php
//use Illuminate\Support\Str;
?>
@extends('layouts.adminbase')

@section('content')



    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">角色名</th>
            <th scope="col">描述</th>
            <th scope="col">状态</th>
            <th scope="col">操作</th>

        </tr>
        </thead>
        <tbody>


        @foreach ($roles as $item)

            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->remark}}</td>

                <td>{{$item->status}}</td>

                <td>
                    <a href="/admin/priviledge.edit_role/{{$item->id}}" class="btn btn-info">赋权</a>
                    <a href="/admin/priviledge.edit_role/{{$item->id}}" class="btn btn-info">编辑</a>
                    <a href="/admin/priviledge.del/{{$item->id}}" class="btn btn-info">删除</a>
                </td>
            </tr>

        @endforeach



        </tbody>
    </table>

    {{ $roles->links()}}

@endsection