<div class="o-page__sidebar js-page-sidebar">
    <div class="c-sidebar">
        <a class="c-sidebar__brand" href="{{ route('user-dashboard') }}">
            <img class="c-sidebar__brand-img" src="{{ asset('img/logo.png') }}" alt="Logo"> Dashboard
        </a>
        <h4 class="c-sidebar__title">Dashboard</h4>
        <ul class="c-sidebar__list">
            <li class="c-sidebar__item">
                <a class="c-sidebar__link is-active" href="{{ route('user-dashboard') }}">
                    <i class="fa fa-home u-mr-xsmall"></i>Overview
                </a>
            </li>
            <li class="c-sidebar__item">
                <a class="c-sidebar__link" href="javascript:;">
                    <i class="fa fa-user-o u-mr-xsmall"></i>Manage User
                </a>
            </li>
        </ul>
    </div>
</div>