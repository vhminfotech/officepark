@foreach($callList as $row => $val)
    <div class="col-sm-6 col-lg-6 col-xl-3">
            <div class="c-project-card u-mb-medium">
                <div class="c-project-card__content">
                    <div class="c-project-card__head">
                        <h4 class="c-project-card__title">{{ ucfirst($val['event']) }}</h4>
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