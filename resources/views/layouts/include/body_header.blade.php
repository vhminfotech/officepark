 <header class="c-navbar u-mb-medium">
        <button class="c-sidebar-toggle u-mr-small">
            <span class="c-sidebar-toggle__bar"></span>
            <span class="c-sidebar-toggle__bar"></span>
            <span class="c-sidebar-toggle__bar"></span>
        </button>

        <h2 class="c-navbar__title u-mr-auto">&nbsp;</h2>

        <div class="col-3 c-field ">
             <select class="c-select" id="languageSelection">                
                <option value="en" {{ (isset($_COOKIE['language']) && $_COOKIE['language'] == 'en') ? "selected" : "" }} data-thumbnail="{{asset('img/flag/english.png')}}"> English </option>
                <option value="gr" {{ (isset($_COOKIE['language']) && $_COOKIE['language'] == 'gr') ? "selected" : "" }} > German </option>
                <option value="tr" {{ (isset($_COOKIE['language']) && $_COOKIE['language'] == 'tr') ? "selected" : "" }} > Turkish </option>
            </select>
        </div>
          <input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
        <div class="c-dropdown dropdown">
            <a  class="c-avatar c-avatar--xsmall has-dropdown dropdown-toggle" href="#" id="dropdwonMenuAvatar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
             @if( isset($data)  && !empty($data) && $data['user_image'] != '')
                <img class="c-avatar__img" src="{{ asset('uploads/employee/'.$data['user_image']) }}" alt="User's Profile Picture">
            @else
                <img class="c-avatar__img" src="{{ asset('img/avatar-72.jpg') }}" alt="User's Profile Picture">
            @endif
            </a>

            <div class="c-dropdown__menu dropdown-menu dropdown-menu-right" aria-labelledby="dropdwonMenuAvatar">
                <!--<a class="c-dropdown__item dropdown-item" href="#">Edit Profile</a>-->
                <a class="c-dropdown__item dropdown-item" href="{{ route('update-profile') }}">Edit info</a>
                <a class="c-dropdown__item dropdown-item" href="{{ route('logout') }}">{{ trans('words.Logout') }}</a>
<!--                <a class="c-dropdown__item dropdown-item" href="#">Manage Roles</a>-->
            </div>
            
            
        </div>
    </header>