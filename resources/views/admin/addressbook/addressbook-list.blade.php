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
                       Addressbook List
                        <a class="c-table__title-action c-tooltip c-tooltip--top" href="{{ route('address-book-add') }}" aria-label="Add User">
                            <i class="fa fa-plus"></i>
                        </a>
                    </caption>
                    <thead class="c-table__head c-table__head--slim">
                        <tr class="c-table__row">
                            <th class="c-table__cell c-table__cell--head" style="margin-left: 5px;">ID</th>
                            <th class="c-table__cell c-table__cell--head">First Name&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">Surname&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">Company&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">Position&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head no-sort">Action</th>
                        </tr>
                    </thead>
                    <tbody>                    
                        <tr class="c-table__row">
                            <td class="c-table__cell">1</td>
                            <td class="c-table__cell">First name</td>
                            <td class="c-table__cell">Surname</td>
                            <td class="c-table__cell">Company</td>
                            <td class="c-table__cell">Position</td>
                            <td class="c-table__cell">
                                <a href="javascript:;">
                                    <span class="c-tooltip c-tooltip--top"  aria-label="Edit">
                                        <i class="fa fa-edit"></i>
                                    </span>
                                </a>
                                 <a href="javascript:;" class="delete">
                                     <span class="c-tooltip c-tooltip--top" data-toggle="modal" data-target="#deleteModel" aria-label="Delete">
                                        <i class="fa fa-trash-o" ></i>
                                     </span>
                                </a>
                            </td>
                        </tr>
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