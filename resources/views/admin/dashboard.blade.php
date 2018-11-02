@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-4">
            <div class="c-graph-card" data-mh="graph-cards">
                <div class="c-graph-card__content">
                    <h3 class="c-graph-card__title">{{ trans('overview.next_payout')}}</h3>
                    <p class="c-graph-card__date">{{ trans('overview.activity_from')}} 4 Jan 2017 {{ trans('overview.to')}} 10 Jan 2017</p>
                    <h4 class="c-graph-card__number">$2,190</h4>
                    <p class="c-graph-card__status">{{ trans('overview.you_have_made')}} $230 {{ trans('overview.today')}}</p>
                </div>

                <div class="c-graph-card__chart">
                    <canvas id="js-chart-payout" width="300" height="74"></canvas>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="c-graph-card" data-mh="graph-cards">
                <div class="c-graph-card__content">
                    <h3 class="c-graph-card__title">{{ trans('overview.total_earning')}}</h3>
                    <p class="c-graph-card__date">{{ trans('overview.in')}} 15 {{ trans('overview.month')}}</p>
                    <h4 class="c-graph-card__number">$23,580</h4>
                    <p class="c-graph-card__status">{{ trans('overview.last_month_you_have')}} $2,980</p>
                </div>

                <div class="c-graph-card__chart">
                    <canvas id="js-chart-earnings" width="300" height="74"></canvas>
                </div>
            </div>
        </div>
        
    </div>
</div><!-- // .container -->

@endsection
