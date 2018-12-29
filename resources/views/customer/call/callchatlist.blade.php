@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')
<input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> 
<div class="container">
    <div class="row u-mb-large">
        <div class="col-12">
            <div c-table-responsive>
                <table class="c-table table-responsive" id="datatable">

                    <caption class="c-table__title">
                        Support Calls
                        <br/>
                    </caption>

                    <thead class="c-table__head c-table__head--slim">
                        <tr class="c-table__row">
                            <th class="c-table__cell c-table__cell--head no-sort">information</th>
                            <th class="c-table__cell c-table__cell--head no-sort">customer number</th>
                            <th class="c-table__cell c-table__cell--head no-sort">notes</th>
                            <th class="c-table__cell c-table__cell--head no-sort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($supportArr as $row => $val)
                        <tr class="c-table__row hide">
                            <td class="c-table__cell">{{ $responsibility[$val['information']] }}</td>
                            <td class="c-table__cell">{{ $val['customer_number'] }}</td>
                            <td class="c-table__cell">{{ $val['notes'] }}</td>
                            <td class="c-table__cell">
                              <a href="{{ route('customer-callchat',$val['id'])}}"  class=" c-tooltip c-tooltip--top"  aria-label="View Chat" data-id="{{ $val['id'] }}"><i class="fa fa-weixin" ></i> 
                             </a> 
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- // .col-12 -->
        </div>
    </div>

</div>
</div><!-- // .container -->
<style>
    a.c-board__btn.c-tooltip.c-tooltip--top {
        position: absolute;
        margin-left: 743px;
        margin-bottom: 41px;
    }
    thead {
        height: 22px !important;       /* Just for the demo          */
        overflow-y: auto !important;    /* Trigger vertical scroll    */
        overflow-x: hidden !important;  /* Hide the horizontal scroll */
    }
</style>

@endsection
