    @extends('layouts.app')
@section('content')
@include('layouts.include.body_header')

<input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> 

<div class="container">
    <div class="row u-mb-large">
        <div class="col-12">
            <div c-table-responsive>
                <table class="c-table" id="datatable">
                    <caption class="c-table__title">
                       {{ trans('op_system_user.op_user_list')}}
                        <a class="c-table__title-action c-tooltip c-tooltip--top" href="{{ route('system-add-user') }}" aria-label="{{ trans('op_system_user.add_user')}}">
                            <i class="fa fa-plus"></i>
                        </a>
                    </caption>
                    <thead class="c-table__head c-table__head--slim">
                        <tr class="c-table__row">
                            <th class="c-table__cell c-table__cell--head" style="margin-left: 5px;">{{ trans('op_system_user.id')}}</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('op_system_user.name')}}&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('op_system_user.extension')}}&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('op_system_user.inopla_username')}}&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('op_system_user.language')}}&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head no-sort">{{ trans('op_system_user.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $count = 1;
                        @endphp
                        @for($i = 0 ;$i < count($arrUser);$i++,$count++)
                        <tr class="c-table__row">
                            <td class="c-table__cell">{{ $count }}</td>
                            <td class="c-table__cell">{{ $arrUser[$i]->name }}</td>
                            <td class="c-table__cell">{{ $arrUser[$i]->email }}</td>
                            <td class="c-table__cell">{{ $arrUser[$i]->inopla_username }}</td>
                            <td class="c-table__cell">{{ $arrUser[$i]->var_language }}</td>
                            <td class="c-table__cell">
                                <a href=" {{ route('system-edit-user',[$arrUser[$i]->id])}} "><span class="c-tooltip c-tooltip--top"  aria-label="{{ trans('op_system_user.edit')}}">
                                    <i class="fa fa-edit" ></i></span>
                                </a>
                                 <a href="javascript:;" class="delete" data-token="{{ csrf_token() }}" data-id="{{ $arrUser[$i]->id }}"><span class="c-tooltip c-tooltip--top" data-toggle="modal" data-target="#deleteModel" aria-label="{{ trans('op_system_user.delete')}}">
                                    <i class="fa fa-trash-o" ></i></span>
                                </a>
<!--                                <a href=" {{ route('create-pdf',[$arrUser[$i]->id])}} "><span class="c-tooltip c-tooltip--top"  aria-label="PDF">
                                    <i class="fa fa-file-pdf-o" ></i></span>
                                </a>-->
                            </td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<style>
.c-table__title .c-tooltip{
    position: absolute;
}
</style>
@endsection
