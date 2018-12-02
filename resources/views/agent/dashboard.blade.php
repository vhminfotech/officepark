@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')

<div class="container-fluid">
  <!--   <div class="row">
        <div class="col-xl-4">
            <div class="c-graph-card" data-mh="graph-cards">
                <div class="c-graph-card__content">
                    <h1 class="c-graph-card__title">Agent dashboard</h1>
                </div>
            </div>
        </div>
    </div> -->
    <div class="row appendData">
        @foreach($callList as $row => $val)
    <div class="col-sm-6 col-lg-6 col-xl-3">
            <div class="c-project-card u-mb-medium">
                <div class="c-project-card__content">
                    <div class="c-project-card__head">
                        <h4 class="c-project-card__title">{{ ($row == 0 ? 'On the phone' : 'Ring - Pending') }}</h4>
                    </div>
                    <a href="javascript:;" class="showOrder" data-id="{{ $val['id'] }}">
                        <div class="c-project-card__head">
                                <p>{{ $val['company_name'] }}</p>
                                <p>+{{ $val['caller'] }} </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
@endforeach
    </div>

<div class="row ">
    <div class="col-sm-6 col-lg-6 col-xl-3">
            <div class="c-project-card u-mb-medium">
                <div class="c-project-card__content">
                    <div class="c-project-card__head">
                        <h4 class="c-project-card__title">Today</h4>
                    </div>
                        <div class="c-project-card__head">
                                <p>{{ $getWeekCount }}</p>
                        </div>
                </div>
            </div>
        </div>
          <div class="col-sm-6 col-lg-6 col-xl-3">
            <div class="c-project-card u-mb-medium">
                <div class="c-project-card__content">
                    <div class="c-project-card__head">
                        <h4 class="c-project-card__title">Week</h4>
                    </div>
                        <div class="c-project-card__head">
                                <p>{{ $getWeekCount }}</p>
                        </div>                    
                </div>
            </div>
        </div>
         <div class="col-sm-6 col-lg-6 col-xl-3">
            <div class="c-project-card u-mb-medium">
                <div class="c-project-card__content">
                    <div class="c-project-card__head">
                        <h4 class="c-project-card__title">Month</h4>
                    </div>
                        <div class="c-project-card__head">
                                <p>{{ $getMonthCount }}</p>
                        </div>
                </div>
            </div>
        </div>
         <div class="col-sm-6 col-lg-6 col-xl-3">
            <div class="c-project-card u-mb-medium">
                <div class="c-project-card__content">
                    <div class="c-project-card__head">
                        <h4 class="c-project-card__title">Year</h4>
                    </div>
                        <div class="c-project-card__head">
                                 <p>{{ $getyearsCountd }}</p>
                        </div>
                </div>
            </div>
        </div>
       
    </div>

     <div class="row u-mb-large">
        <div class="col-12">
            <div c-table-responsive>
                <div class=" table-responsive">
                    <table class="c-table" id="ManageIncomingCall" >
                        <thead class="c-table__head c-table__head--slim">
                            <tr class="c-table__row">
                                <!--<th><input class="checkAll" type="checkbox"></th>-->
                                <th class="c-table__cell_head">Id </th>
                                <th class="c-table__cell_head">Date/Time</th>
                                <th class="c-table__cell_head">Caller</th>
                                <th class="c-table__cell_head">Agent</th>
                                <th class="c-table__cell_head">Customer</th>
                                <th class="c-table__cell_head">Notes</th>
                                <th class="c-table__cell_head">Mail Notification</th>
                                <th class="c-table__cell_head">Send Mail</th>
                                <th class="c-table__cell_head">Call View</th>
                                 <!-- <th class="c-table__cell_head">Status</th> -->
                            </tr>
                        </thead>
                    </table>
                </div>
            </div><!-- // .col-12 -->
        </div>
        
    </div>
</div><!-- // .container -->
<div class=" u-mb-medium">

    <input type="hidden" name="callNewId" class="callNewId" id="callNewId" value="{{ $checkNewCall }}">
    <input type="hidden" name="inopla_username" class="inopla_username" id="inopla_username" value="{{ $inopla_username }}">
    <div class="c-modal c-modal--huge modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModal2">
        <div class="c-modal__dialog modal-dialog" role="document">
            <div class="c-modal__content modal-content">
                <a class="c-modal__close c-modal__close--absolute u-text-mute u-opacity-medium" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-close"></i>
                </a>
                <div class="c-modal__body" >
                    <div class="o-page">
                        @include('admin.call.popUp.popUp_page')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

