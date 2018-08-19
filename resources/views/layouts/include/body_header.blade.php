 <header class="c-navbar u-mb-medium">
        <button class="c-sidebar-toggle u-mr-small">
            <span class="c-sidebar-toggle__bar"></span>
            <span class="c-sidebar-toggle__bar"></span>
            <span class="c-sidebar-toggle__bar"></span>
        </button><!-- // .c-sidebar-toggle -->

        <h2 class="c-navbar__title u-mr-auto">&nbsp;</h2>

<!--        <div class="form-group">
           
            <select class="form-control language">
                <option value="">- - {{ trans('words.Select') }} - -</option>
                <option value="en" {{ (isset($_COOKIE['language']) && $_COOKIE['language'] == 'en') ? "selected" : "" }} > English </option>
                <option value="gr" {{ (isset($_COOKIE['language']) && $_COOKIE['language'] == 'gr') ? "selected" : "" }} > German </option>
                <option value="tr" {{ (isset($_COOKIE['language']) && $_COOKIE['language'] == 'tr') ? "selected" : "" }} > Turkish </option>
            </select>
        </div>-->
        
        <div class="c-dropdown dropdown">
            <a  class="c-avatar c-avatar--xsmall has-dropdown dropdown-toggle" href="#" id="dropdwonMenuAvatar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="c-avatar__img" src="{{ asset('img/avatar-72.jpg') }}" alt="User's Profile Picture">
            </a>

            <div class="c-dropdown__menu dropdown-menu dropdown-menu-right" aria-labelledby="dropdwonMenuAvatar">
                <!--<a class="c-dropdown__item dropdown-item" href="#">Edit Profile</a>-->
                <a class="c-dropdown__item dropdown-item" href="{{ route('logout') }}">{{ trans('words.Logout') }}</a>
                <a class="c-dropdown__item dropdown-item" href="{{ route('update-profile') }}">Edit info</a>
<!--                <a class="c-dropdown__item dropdown-item" href="#">Manage Roles</a>-->
            </div>
        </div>
    </header>