@php
$currentRoute = Route::current()->getName();
$roles = Session::get('userRole');
$logindata = Session::get('logindata');
$roles  = array_values($roles);
// print_r($roles);exit;
@endphp
<style>
    .c-sidebar__item a i {
        font-size:22px;
    }
</style>
  <input class="c-input orderCountToken" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
<div class="o-page__sidebar js-page-sidebar">
    <div class="c-sidebar">
        <a class="c-sidebar__brand" href="#">
            <img class="c-sidebar__brand-img" src="{{ asset('img/logo.png') }}" alt="Logo"> {{ trans('words.Dashboard') }}
        </a>
        <h4 class="c-sidebar__title">{{ trans('words.Dashboard') }}</h4>
        <ul class="c-sidebar__list">
            <li class="c-sidebar__item">
                <a class="c-sidebar__link {{ ($currentRoute == 'admin-dashboard' ? 'is-active' : '') }}" href="{{ route('admin-dashboard') }}">
                    <i class="fa fa-home u-mr-xsmall" style="padding-right:3px"></i>
                    {{trans('words.Overview')}}
                </a>
            </li>
            <!--            <li class="c-sidebar__item">
                            <a class="c-sidebar__link {{ ($currentRoute == 'user-list' || $currentRoute == 'add-user' || $currentRoute == 'edit-user' ? 'is-active' : '') }}" href="{{ route('user-list') }}">
                                <i class="fa fa-users u-mr-xsmall"></i>
                                {{ trans('words.Manage user') }}
                            </a>
                        </li>-->
            @if($logindata[0]['id'] == 1 ||  in_array('System User', $roles))
            <li class="c-sidebar__item">
                <a class="c-sidebar__link {{($currentRoute == 'system-user-list' || $currentRoute == 'system-add-user' || $currentRoute == 'system-edit-user' ? 'is-active' : '') }}" href="{{ route('system-user-list') }}">
                    <i class="fa fa-gears u-mr-xsmall"></i>
                    {{trans('words.System-users') }}
                </a>
            </li>
            @endif
            
            @if($logindata[0]['id'] == 1 ||  in_array('Service', $roles))
            <li class="c-sidebar__item">
                <a class="c-sidebar__link {{ ($currentRoute == 'service-add' || $currentRoute == 'service-edit' || $currentRoute == 'service' || $currentRoute == 'service' ? 'is-active' : '') }}" href="{{ route('service') }}">
                    <i class="fa fa-gears u-mr-xsmall"></i>
                    {{trans('words.Service') }} &nbsp;
                </a>
            </li>
             @endif
             
              @if($logindata[0]['id'] == 1 ||  in_array('Customer', $roles))
            <li class="c-sidebar__item">
                <a class="c-sidebar__link {{ ($currentRoute == 'customer-list' || $currentRoute == 'customer-add' || $currentRoute == 'customer-edit' ? 'is-active' : '') }}" href="{{ route('customer-list') }}">
                    <i class="fa fa-user u-mr-xsmall" style="padding-right:8px"></i>
                    {{trans('words.Customer') }}
                </a>
            </li>
             @endif
            @if($logindata[0]['id'] == 1 ||  in_array('Addressbook', $roles))
            <li class="c-sidebar__item">
                <a class="c-sidebar__link {{ ($currentRoute == 'address-book-list' || $currentRoute == 'address-book-add' || $currentRoute == 'address-book-edit' ? 'is-active' : '') }}" href="{{ route('address-book-list') }}">
                    <i class="fa fa-address-book u-mr-xsmall" style="padding-right:4px"></i>
                    {{trans('words.Addressbook') }}
                </a>
            </li>
            @endif
            @if($logindata[0]['id'] == 1 ||  in_array('Orders', $roles))
            <li class="c-sidebar__item">
                <a class="c-sidebar__link {{ ($currentRoute == 'order-list' || $currentRoute == 'view-order' ? 'is-active' : '') }}" href="{{ route('order-list') }}">
                    <i class="fa fa-shopping-cart u-mr-xsmall" style="padding-right:4px"></i>
                    {{ trans('words.Order') }}     &nbsp;
                    <span class="c-badge c-badge--danger  c-badge--xsmall u-ml-xsmall totalOrderCount">{{ Session::get('ordercount')}} </span>
                    <input type="hidden" id="totalOrderNotification" value="{{ Session::get('totalOrder') }}">
                </a>
            </li>
            @endif
            @if($logindata[0]['id'] == 1 ||  in_array('Contract', $roles))
            <li class="c-sidebar__item">
                <a class="c-sidebar__link {{ ($currentRoute == 'contract-list' ? 'is-active' : '') }}" href="{{ route('contract-list') }}">
                    <i class="fa fa-file-text-o u-mr-xsmall" style="padding-right:5px"></i>
                    {{ trans('words.Contract') }}  &nbsp;
                </a>
            </li>
            @endif
            @if($logindata[0]['id'] == 1 ||  in_array('Invoices', $roles))
            <li class="c-sidebar__item">
                <a class="c-sidebar__link {{ ($currentRoute == 'add-invoice' || $currentRoute == 'invoice-list' || $currentRoute == 'invoice-list' ? 'is-active' : '') }}" href="{{ route('invoice-list') }}">
                    <i class="fa fa-eur u-mr-xsmall" style="padding-right:11px"></i>
                    {{ trans('words.Invoice') }}  &nbsp;
                </a>
            </li>
            @endif
            @if($logindata[0]['id'] == 1 ||  in_array('Employees', $roles))
            <li class="c-sidebar__item">
                <a class="c-sidebar__link {{ ($currentRoute == 'employee' || $currentRoute == 'employee-add' || $currentRoute == 'employee-edit' ? 'is-active' : '') }}" href="{{ route('employee') }}">
                    <i class="fa fa-building-o u-mr-xsmall" style="padding-right:6px"></i>
                    {{ trans('words.Employee') }}  &nbsp;
                </a>
            </li>
            @endif
            
            @if($logindata[0]['id'] == 1 ||  in_array('System Mails', $roles))
            <li class="c-sidebar__item">
                <a class="c-sidebar__link {{ ($currentRoute == 'system-mail' || $currentRoute == 'system-mail' ? 'is-active' : '') }}" href="{{ route('system-mail') }}">
                    <i class="fa fa-envelope u-mr-xsmall" style="padding-right:2px"></i>
                    {{ trans('words.system-mail') }}   &nbsp;
                </a>
            </li>
            @endif
            
             @if($logindata[0]['id'] == 1 ||  in_array('Outgoingcalls', $roles))
            <li class="c-sidebar__item">
                <a class="c-sidebar__link {{ ($currentRoute == 'edit-outgoing-call' || $currentRoute == 'new-outgoing-call' || $currentRoute == 'outgoing-call' || $currentRoute == '' ? 'is-active' : '') }}" href="{{ route('outgoing-call') }}">
                    <i class="fa fa-volume-control-phone u-mr-xsmall" style="padding-right:6px"></i>
                    {{ trans('words.Outgoingcalls') }} &nbsp;
                     <span class="c-badge c-badge--danger  c-badge--xsmall u-ml-xsmall totalOrderCount">{{ Session::get('ordercount')}} </span>
                    <input type="hidden" id="totalOrderNotification" value="{{ Session::get('totalOrder') }}">
                </a>
            </li>
            @endif
            
            
            @if($logindata[0]['id'] == 1 ||  in_array('Calls', $roles))
            <li class="c-sidebar__item">
                <a class="c-sidebar__link {{ ($currentRoute == 'calls' || $currentRoute == '' ? 'is-active' : '') }}" href="{{ route('calls') }}">
                    <i class="fa fa-phone u-mr-xsmall" style="padding-right:6px"></i>
                    {{ trans('words.Calls') }} &nbsp;
                </a>
            </li>
            @endif
            
           
            
            <li class="c-sidebar__item">
                <i class="fa fa-flag-icon-us"></i>
            </li>
<!--            <li class="c-sidebar__item" style="position: absolute; bottom: 0px; margin-bottom: -223px; padding-left: 35px;">
                <div class="language-selection {{ (isset($_COOKIE['language']) && ($_COOKIE['language']) == 'gr' ? 'active' : '') }}" style="display: inline;">
                    <a href="javascript:;" class="language" data-lang="gr">
                        @if((isset($_COOKIE['language'])))
                        @if(($_COOKIE['language']) ==  'gr')
                        -<img class="" src="{{ asset('img/flag/german.png') }}" alt="German-Logo"  style='height : 22px;'>
                        @else
                        <img class="" src="{{ asset('img/flag/german-notactive.png') }}" alt="German-Logo"  style='height : 22px;'>
                        @endif
                        @endif
                    </a>
                </div>
                <div class="language-selection {{ (isset($_COOKIE['language']) && ($_COOKIE['language']) ==  'tr' ? 'active' : '') }}" style="display: inline;">
                    <a href="javascript:;" class="language" data-lang="tr" style="padding-left: 10px;">
                        @if((isset($_COOKIE['language'])))
                        @if(isset($_COOKIE['language']) && ($_COOKIE['language']) ==  'tr')
                        <img class="" src="{{ asset('img/flag/turkish.png') }}" alt="Turkish-Logo"  style='height : 22px;'>
                        @else
                        <img class="" src="{{ asset('img/flag/turkisch-notactive.png') }}" alt="Turkish-Logo"  style='height : 22px;'>
                        @endif
                        @endif
                    </a>
                </div>
                <div class="language-selection {{ (isset($_COOKIE['language']) && ($_COOKIE['language']) ==  'en' ? 'active' : (!isset($_COOKIE['language']))?'active':'')  }} " style="display: inline;">
                    <a href="javascript:;" class="language" data-lang="en" style="padding-left: 10px;">
                        @if((isset($_COOKIE['language'])))
                        @if(isset($_COOKIE['language']) && ($_COOKIE['language']) ==  'en')
                        <img class="" src="{{ asset('img/flag/english.png') }}" alt="English-Logo"  style='height : 22px;'>
                        @else 
                        <img class="" src="{{ asset('img/flag/english-notactive.png') }}" alt="English-Logo"  style='height : 22px;'>
                        @endif
                        @endif
                    </a>
                </div>-->
        </ul>


        <!--        <ul class="c-sidebar__list">
                    
                </ul>-->
    </div>
</div>