@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-4">
            <div class="c-graph-card" data-mh="graph-cards">
                <div class="c-graph-card__content">
                    <h1 class="c-graph-card__title">Agent dashboard</h1>
                </div>
            </div>
        </div>

    </div>
</div><!-- // .container -->
<div class=" u-mb-medium">

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

