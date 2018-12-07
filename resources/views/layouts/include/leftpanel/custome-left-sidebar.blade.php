@php
$currentRoute = Route::current()->getName();
@endphp
<div class="o-page__sidebar js-page-sidebar">
    <div class="c-sidebar">
        <a class="c-sidebar__brand" href="{{ route('customer-dashboard') }}">
            <img class="c-sidebar__brand-img" src="{{ asset('img/logo.png') }}" alt="Logo"> Dashboard
        </a>
        <h4 class="c-sidebar__title">Dashboard</h4>
        <ul class="c-sidebar__list">
            <li class="c-sidebar__item">
                <a class="c-sidebar__link {{ ($currentRoute == 'customer-dashboard'  ? 'is-active' : '') }}" href="{{ route('customer-dashboard') }}">
                    <i class="fa fa-home u-mr-xsmall"></i>Overview
                </a>
            </li>
            
            
            <li class="c-sidebar__item">
                <a class="c-sidebar__link {{ ($currentRoute == 'address-book-edit-customer' || $currentRoute == 'address-book-add-customer' || $currentRoute == 'address-book-list-customer'  ? 'is-active' : '') }}" href="{{ route('address-book-list-customer') }}">
                    <i class="fa fa-address-book u-mr-xsmall" style="padding-right:4px"></i>
                    {{trans('words.Addressbook') }}
                </a>
            </li>
            
            <li class="c-sidebar__item">
                <a class="c-sidebar__link {{ ($currentRoute == 'customer-add-invoice' || $currentRoute == 'customer-invoice-list' || $currentRoute == 'customer-invoice-list' ? 'is-active' : '') }}" href="{{ route('customer-invoice-list') }}">
                    <i class="fa fa-eur u-mr-xsmall" style="padding-right:11px"></i>
                    {{ trans('words.Invoice') }}  &nbsp;
                </a>
            </li>
            
            <li class="c-sidebar__item">
                <a class="c-sidebar__link {{ ($currentRoute == 'employee-editcustomer' || $currentRoute == 'employee-add-customer' || $currentRoute == 'employee-customer' ? 'is-active' : '') }}" href="{{ route('employee-customer') }}">
                    <i class="fa fa-building-o u-mr-xsmall" style="padding-right:6px"></i>
                    {{ trans('words.Employee') }}  &nbsp;
                </a>
            </li>
             <li class="c-sidebar__item">
                <a class="c-sidebar__link {{ ($currentRoute == 'customer-calls' || $currentRoute == '' ? 'is-active' : '') }}" href="{{ route('customer-calls') }}">
                    <i class="fa fa-phone u-mr-xsmall" style="padding-right:6px"></i>
                    {{ trans('words.Calls') }} &nbsp;
                </a>
            </li>
<!--            <li class="c-sidebar__item">
                <a class="c-sidebar__link" href="">
                    <i class="fa fa-user-o u-mr-xsmall"></i>Manage Customer
                </a>
            </li>-->
        </ul>
    </div>
</div>