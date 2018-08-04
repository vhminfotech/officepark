@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')

<div class="container">
    <div class="row u-mb-large">
        <div class="col-12">
            <div c-table-responsive>
                <table class="c-table" id="datatable">
                    <caption class="c-table__title">
                        User List  <a href="{{ route('add-user') }}" class="c-board__btn c-tooltip c-tooltip--top" aria-label="Add Customer/Client">
                            <i class="fa fa-plus"></i>
                        </a>
                    </caption>
                    <thead class="c-table__head c-table__head--slim">
                        <tr class="c-table__row">
                            <th class="c-table__cell c-table__cell--head" style="margin-left: 5px;">ID</th>
                            <th class="c-table__cell c-table__cell--head">Customer number&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">Company name&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">First Name&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">Last Name&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head ">E-mail&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head no-sort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i = 1 ;$i < 30;$i++)
                        <tr class="c-table__row">
                            <td class="c-table__cell">{{ $i }}</td>
                            <td class="c-table__cell">OP-023-38520</td>
                            <td class="c-table__cell">Com{{ $i }}</td>
                            <td class="c-table__cell">Test{{ $i }}</td>
                            <td class="c-table__cell">xyz{{ $i }}@gmail.com</td>
                            <td class="c-table__cell">abc{{ $i }}@gmail.com</td>
                            <td class="c-table__cell"><span class="c-tooltip c-tooltip--top"  aria-label="Delete"><i class="fa fa-trash-o" ></i></span></td>
                        </tr>
                        @endfor
                    </tbody>
                </table>

            </div><!-- // .col-12 -->
        </div>
    </div>

</div><!-- // .container -->
<style>
    a.c-board__btn.c-tooltip.c-tooltip--top {
        position: absolute;
        margin-left: 743px;
        margin-bottom: 41px;
    }
</style>

@endsection
