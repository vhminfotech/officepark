<div class="o-page__sidebar js-page-sidebar">
    <div class="c-sidebar">
        <a class="c-sidebar__brand" href="#">
            <img class="c-sidebar__brand-img" src="img/logo.png" alt="Logo"> Dashboard
        </a>
        <h4 class="c-sidebar__title">Dashboards</h4>
        <ul class="c-sidebar__list">
            <li class="c-sidebar__item">
                <a class="c-sidebar__link is-active" href="{{ route('admin-dashboard') }}">
                    <i class="fa fa-home u-mr-xsmall"></i>Overview
                </a>
            </li>
            <li class="c-sidebar__item">
                <a class="c-sidebar__link" href="{{ route('user-list') }}">
                    <i class="fa fa-user-o u-mr-xsmall"></i>Manage user
                </a>
            </li>
            <li class="c-sidebar__item">
                <a class="c-sidebar__link" href="{{ route('system-user-list') }}">
                    <i class="fa fa-user-o u-mr-xsmall"></i>System users
                </a>
            </li>
            <li class="c-sidebar__item">
                <a class="c-sidebar__link" href="{{ route('customer-list') }}">
                    <i class="fa fa-user-o u-mr-xsmall"></i>Customer
                </a>
            </li>
        </ul>
    </div>
</div>