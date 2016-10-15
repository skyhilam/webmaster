@extends('layouts.admin.info_form', ['breadcrumb' => 'messages/info', 'item' => $message->email])


@section('form')

@include('admin.table.tr', ['label' => trans('layout.date'), 'value' => $message->created_at])

@include('admin.table.tr', ['label' => trans('layout.email'), 'value' => $message->email])

@include('admin.table.tr', ['label' => trans('layout.content'), 'value' => $message->content])


@endsection






