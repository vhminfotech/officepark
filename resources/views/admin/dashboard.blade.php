@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-4">
            <div class="c-graph-card" data-mh="graph-cards">
                <div class="c-graph-card__content">
                    <h3 class="c-graph-card__title">Next Payout</h3>
                    <p class="c-graph-card__date">Activity from 4 Jan 2017 to 10 Jan 2017</p>
                    <h4 class="c-graph-card__number">$2,190</h4>
                    <p class="c-graph-card__status">Youâ€™ve made $230 Today</p>
                </div>

                <div class="c-graph-card__chart">
                    <canvas id="js-chart-payout" width="300" height="74"></canvas>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="c-graph-card" data-mh="graph-cards">
                <div class="c-graph-card__content">
                    <h3 class="c-graph-card__title">Total Earnings</h3>
                    <p class="c-graph-card__date">In 15 Months</p>
                    <h4 class="c-graph-card__number">$23,580</h4>
                    <p class="c-graph-card__status">Last Month youâ€™ve made $2,980</p>
                </div>

                <div class="c-graph-card__chart">
                    <canvas id="js-chart-earnings" width="300" height="74"></canvas>
                </div>
            </div>
        </div>
        
    </div>
</div><!-- // .container -->

@endsection
