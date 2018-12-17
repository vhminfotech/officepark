 <header class="c-navbar u-mb-medium">
     
         @if(!empty(Auth()->guard('customer')->user()))
         <div class="col-6 c-field">
        <a href="{{ route('employee-add-customer') }}" class="c-badge c-badge--info u-mr-small ">+ Add Employee</a>
        <a href="{{ route('address-book-add-customer') }}" class="c-badge c-badge--info u-mr-small">+ Add Addressbook</a>
      
        <a href="{{ route('customer-new-outgoing-call') }}" class="c-badge c-badge--info u-mr-small">+ Add outgoingcalls</a>
        <a href="javascript:;" class="c-badge c-badge--info u-mr-small">+ Add Supports</a>
          <a href="{{ route('add-plan-customer') }}" class="c-badge c-badge--info u-mr-small">+ Add Plan</a>
        </div>
        @endif
          @if(!empty(Auth()->guard('admin')->user()))
          <div class="col-9 c-field">
        <a href="{{ route('employee-add') }}" class="c-badge c-badge--info u-mr-small ">+ Add Employee</a>
        <a href="{{ route('address-book-add') }}" class="c-badge c-badge--info u-mr-small">+ Add Addressbook</a>
        <a href="{{ route('new-outgoing-call') }}" class="c-badge c-badge--info u-mr-small">+ Add outgoingcalls</a>
        <a href="javascript:;" class="c-badge c-badge--info u-mr-small">+ Add Supports</a>
         <a href="javascript:;" class="c-badge c-badge--info u-mr-small">+ Add Plan</a>
        </div>
        @endif
         @php
                if (!empty(Auth()->guard('admin')->user())) {
                $data = Auth()->guard('admin')->user();
                }
                if (!empty(Auth()->guard('customer')->user())) {
                    $data = Auth()->guard('customer')->user();
                }
                if (!empty(Auth()->guard('agent')->user())) {
                    $data = Auth()->guard('agent')->user();
                }
                if (!empty(Auth::user())) {
                    $data = Auth::user();
                }
            @endphp
        <div class="col-2 c-field">
             <select class="c-select" id="languageSelection">                
                <option value="en" {{ (isset($_COOKIE['language']) && $_COOKIE['language'] == 'en') ? "selected" : "" }} data-thumbnail="{{asset('img/flag/english.png')}}"> English </option>
                <option value="gr" {{ (isset($_COOKIE['language']) && $_COOKIE['language'] == 'gr') ? "selected" : "" }} > German </option>
                <option value="tr" {{ (isset($_COOKIE['language']) && $_COOKIE['language'] == 'tr') ? "selected" : "" }} > Turkish </option>
            </select>
        </div>

        @if(!empty(Auth()->guard('customer')->user()))
        <div class="col-3 c-field ">
                    <h5><b>Welcome! Mr. {{ $data['name'] }}</b><h5>
                    <h6>{{ $data['name'] }}  |  +{{ $data['extension_number'] }} </h6>
        </div>
        @endif
          <input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
        <div class="c-dropdown dropdown">
            <a  class="c-avatar c-avatar--xsmall has-dropdown dropdown-toggle" href="#" id="dropdwonMenuAvatar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           
             @if( isset($data)  && !empty($data) && $data['user_image'] != '')
                <img class="c-avatar__img" src="{{ asset('uploads/employee/'.$data['user_image']) }}" alt="User's Profile Picture">
            @else
                <img class="c-avatar__img" src="{{ asset('img/avatar-72.jpg') }}" alt="User's Profile Picture">
            @endif
            </a>

            <div class="c-dropdown__menu dropdown-menu dropdown-menu-right" aria-labelledby="dropdwonMenuAvatar">
                @if($data['type'] == 'CUSTOMER')
                <a class="c-dropdown__item dropdown-item" href="{{ route('customer-change-password') }}">Change password</a>
                @else
                <a class="c-dropdown__item dropdown-item" href="{{ route('update-profile') }}">Edit info</a>
                @endif
                <a class="c-dropdown__item dropdown-item" href="{{ route('logout') }}">{{ trans('words.Logout') }}</a>
<!--                <a class="c-dropdown__item dropdown-item" href="#">Manage Roles</a>-->
            </div>
            
            
        </div>
    </header>