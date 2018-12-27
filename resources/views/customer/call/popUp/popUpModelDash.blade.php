<style>

    .c-modal__body{
        padding-top:70px;
    }

    .fa-close{
        padding: 0px;
        margin: 0px;
    }
</style>
<div class=" u-mb-medium">

    <div class="c-modal c-modal--huge modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModal2">
        <div class="c-modal__dialog modal-dialog" role="document">
            <div class="c-modal__content modal-content">
                <a class="c-modal__close c-modal__close--absolute u-text-mute u-opacity-medium" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-close"></i>
                </a>
                <div class="c-modal__body" >
                    <div class="o-page">
                        @include('customer.call.popUp.popUp_page_dash')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>