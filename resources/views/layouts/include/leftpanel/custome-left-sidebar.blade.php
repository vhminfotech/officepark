@php
$currentRoute = Route::current()->getName();
$sessiondata=session('key');
$fontcolor=$sessiondata['color'];
@endphp
<style>
    .c-sidebar__link.is-active {
    background-color: <?php echo "#".$sessiondata['hovercolor'] ?>;
    }
    .fa:hover{color: <?php echo "#".$sessiondata['hovercolor'] ?>; display: inline-block !important;}
.fa i:hover{color: <?php echo "#".$sessiondata['hovercolor'] ?>; display: inline-block !important;}
.fa i before:hover{color: <?php echo "#".$sessiondata['hovercolor'] ?>; display: inline-block !important;}
</style>

<div class="o-page__sidebar js-page-sidebar" >
    <div class="c-sidebar" style="background-color: {{ "#".$sessiondata['sidebar_menu_color'] }};">
        <a class="c-sidebar__brand" href="{{ route('customer-dashboard') }}" style="color:{{ '#'.$fontcolor }}">
            <img class="c-sidebar__brand-img" src="{{ asset('uploads/panel_logo/'.$sessiondata['website_logo'])}}" alt="Logo" style="height:40px;width:40px;"> Dashboard
        </a>
        <h4 class="c-sidebar__title" style="color:{{ '#'.$fontcolor }}">Dashboard</h4>
        <ul class="c-sidebar__list">
            <li class="c-sidebar__item">
                <a style="color: {{ '#'.$fontcolor }} ;" class="c-sidebar__link {{ ($currentRoute == 'customer-dashboard'  ? 'is-active' : '') }}" href="{{ route('customer-dashboard') }}">
                    <i class="fa fa-home u-mr-xsmall"></i>Overview
                </a>
            </li>
            
            
            <li class="c-sidebar__item">
                <a style="color: {{ '#'.$fontcolor }}" class="c-sidebar__link {{ ($currentRoute == 'address-book-edit-customer' || $currentRoute == 'address-book-add-customer' || $currentRoute == 'address-book-list-customer'  ? 'is-active' : '') }}" href="{{ route('address-book-list-customer') }}">
                    <i class="fa fa-address-book u-mr-xsmall" style="padding-right:4px"></i>
                    {{trans('words.Addressbook') }}
                </a>
            </li>
            
            <li class="c-sidebar__item">
                <a style="color: {{ '#'.$fontcolor }}" class="c-sidebar__link {{ ($currentRoute == 'customer-add-invoice' || $currentRoute == 'customer-invoice-list' || $currentRoute == 'customer-invoice-list' ? 'is-active' : '') }}" href="{{ route('customer-invoice-list') }}">
                    <i class="fa fa-eur u-mr-xsmall" style="padding-right:11px"></i>
                    {{ trans('words.Invoice') }}  &nbsp;
                </a>
            </li>
            
            <li class="c-sidebar__item">
                <a style="color: {{ '#'.$fontcolor }}" class="c-sidebar__link {{ ($currentRoute == 'employee-editcustomer' || $currentRoute == 'employee-add-customer' || $currentRoute == 'employee-customer' ? 'is-active' : '') }}" href="{{ route('employee-customer') }}">
                    <i class="fa fa-building-o u-mr-xsmall" style="padding-right:6px"></i>
                    {{ trans('words.Employee') }}  &nbsp;
                </a>
            </li>
            
            <li class="c-sidebar__item">
                <a style="color: {{ '#'.$fontcolor }}" class="c-sidebar__link {{ ($currentRoute == 'customer-calls' || $currentRoute == '' ? 'is-active' : '') }}" href="{{ route('customer-calls') }}">
                    <i class="fa fa-phone u-mr-xsmall" style="padding-right:6px"></i>
                    {{ trans('words.Calls') }} &nbsp;
                </a>
            </li>
            
            <li class="c-sidebar__item">
                <a style="color: {{ '#'.$fontcolor }}" class="c-sidebar__link {{ ($currentRoute == 'customer-edit-plan' || $currentRoute == 'add-plan-customer' || $currentRoute == 'customer-plan'  ? 'is-active' : '') }}"  href="{{ route('customer-plan') }}">
                    <i class="fa fa-outdent u-mr-xsmall" style="padding-right:6px"></i>{{ trans('words.plan') }} &nbsp;
                </a>
            </li>
            
             <li class="c-sidebar__item">
                <a style="color: {{ '#'.$fontcolor }} ;" class="c-sidebar__link {{ ($currentRoute == 'customer-edit-outgoing-call' || $currentRoute == 'customer-new-outgoing-call' || $currentRoute == 'customer-outgoing-call'  ? 'is-active' : '') }}"  href="{{ route('customer-outgoing-call') }}">
                    <i class="fa fa-volume-control-phone u-mr-xsmall" style="padding-right:6px"></i>{{ trans('words.Outgoingcalls') }} &nbsp;
                    <span class="c-badge c-badge--danger  c-badge--xsmall u-ml-xsmall totalOrderCount">{{ Session::get('outgoingCallCount') }} </span>
                </a>
            </li>
            
            <li class="c-sidebar__item">
                <a style="color: {{ '#'.$fontcolor }} ;" class="c-sidebar__link {{ ($currentRoute == 'customer-edit-profile'  ? 'is-active' : '') }}"  href="{{ route('customer-edit-profile') }}">
                    <i class="fa fa-user-circle u-mr-xsmall" style="padding-right:6px"></i>{{ trans('words.profile') }} &nbsp;
                </a>
            </li>
            
            <li class="c-sidebar__item">
                <a style="color: {{ '#'.$fontcolor }} ;" class="c-sidebar__link {{ ($currentRoute == 'customer-support' || $currentRoute == 'customer-add-support'  ? 'is-active' : '') }}"  href="{{ route('customer-support') }}">
                    <i class="fa fa-life-ring u-mr-xsmall" style="padding-right:6px"></i>
                    {{ trans('words.support') }} &nbsp;
                    <span class="c-badge c-badge--danger  c-badge--xsmall u-ml-xsmall totalOrderCount">{{ Session::get('callsupport') }} </span>
                </a>
            </li> 
<!--             <li class="c-sidebar__item">
                <a style="color: {{ '#'.$fontcolor }} ;" class="c-sidebar__link {{ ($currentRoute == 'customer-callchatlist' || $currentRoute == 'customer-callchat'  ? 'is-active' : '') }}"  href="{{ route('customer-callchatlist') }}">
                    <i class="fa fa-comment u-mr-xsmall" style="padding-right:6px"></i>
                    Call {{ trans('words.support') }} &nbsp;
                    <span class="c-badge c-badge--danger  c-badge--xsmall u-ml-xsmall totalOrderCount"> {{ Session::get('call_support') }} </span>
                    
                </a>
            </li>-->

<!--            <li class="c-sidebar__item">
                <a class="c-sidebar__link" href="">
                    <i class="fa fa-user-o u-mr-xsmall"></i>Manage Customer
                </a>
            </li>-->
        </ul>
    </div>
</div>

    