@php
$currentRoute = Route::current()->getName();
@endphp
<div class="o-page__sidebar js-page-sidebar">
    <div class="c-sidebar">
        <a class="c-sidebar__brand" href="#">
            <img class="c-sidebar__brand-img" src="{{ asset('img/logo.png') }}" alt="Logo"> {{ trans('words.Dashboard') }}
        </a>
        <h4 class="c-sidebar__title">{{ trans('words.Dashboard') }}</h4>
        <ul class="c-sidebar__list">
            <li class="c-sidebar__item">
                <a class="c-sidebar__link {{ ($currentRoute == 'admin-dashboard' ? 'is-active' : '') }}" href="{{ route('admin-dashboard') }}">
                    <i class="fa fa-home u-mr-xsmall"></i>
                    {{ trans('words.Overview') }}
                </a>
            </li>
<!--            <li class="c-sidebar__item">
                <a class="c-sidebar__link {{ ($currentRoute == 'user-list' || $currentRoute == 'add-user' || $currentRoute == 'edit-user' ? 'is-active' : '') }}" href="{{ route('user-list') }}">
                    <i class="fa fa-users u-mr-xsmall"></i>
                    {{ trans('words.Manage user') }}
                </a>
            </li>-->
            <li class="c-sidebar__item">
                <a class="c-sidebar__link {{ ($currentRoute == 'system-user-list' || $currentRoute == 'system-add-user' || $currentRoute == 'system-edit-user' ? 'is-active' : '') }}" href="{{ route('system-user-list') }}">
                    <i class="fa fa-user-o u-mr-xsmall"></i>
                    {{ trans('words.System-users') }}
                </a>
            </li>
            <li class="c-sidebar__item">
                <a class="c-sidebar__link {{ ($currentRoute == 'customer-list' || $currentRoute == 'customer-add' || $currentRoute == 'customer-edit' ? 'is-active' : '') }}" href="{{ route('customer-list') }}">
                    <i class="fa fa-user-circle-o u-mr-xsmall"></i>
                    {{ trans('words.Customer') }}
                </a>
            </li>
            <li class="c-sidebar__item">
                <a class="c-sidebar__link {{ ($currentRoute == 'address-book-list' || $currentRoute == 'address-book-add' || $currentRoute == 'address-book-edit' ? 'is-active' : '') }}" href="{{ route('address-book-list') }}">
                    <i class="fa fa-address-book u-mr-xsmall"></i>
                    {{ trans('words.Addressbook') }}
                </a>
            </li>
            <li class="c-sidebar__item">
                <a class="c-sidebar__link {{ ($currentRoute == 'order-list' || $currentRoute == 'view-order' ? 'is-active' : '') }}" href="{{ route('order-list') }}">
                    <i class="fa fa-shopping-cart u-mr-xsmall"></i>
                    {{ trans('words.Order') }}
                </a>
            </li>
            <li class="c-sidebar__item">
                <i class="fa fa-flag-icon-us"></i>
            </li>
        </ul>
        
        <ul class="c-sidebar__list">
            <li class="c-sidebar__item" style="padding-left: 35px;">
                <a href="javascript:;" aria-label="German" class="language c-tooltip c-tooltip--top" data-lang="gr">
                    <img class="" title="German" src="{{ asset('img/flag/german.png') }}" alt="German-Logo" width="50px">
                </a>
                <a href="javascript:;" aria-label="Turkish" class="language c-tooltip c-tooltip--top" data-lang="tr" style="padding-left: 10px;">
                    <img class="" title="Turkish"  src="{{ asset('img/flag/turkish.png') }}" alt="Turkish-Logo" width="50px">
                </a>
                <a href="javascript:;" aria-label="English" class="language c-tooltip c-tooltip--top" data-lang="en" style="padding-left: 10px;">
                    <img class="" title="English" src="{{ asset('img/flag/english.jpg') }}" alt="English-Logo" width="50px">
                </a>
            </li>
        </ul>
    </div>
</div>