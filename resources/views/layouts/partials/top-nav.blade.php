<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            @if (Auth::check())
            <ul class="nav navbar-nav">
                <li class="active">
                    {{ link_to_route('home', trans('beranda'), [], ['class' => 'strong text-primary']) }}
                </li>
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                <li>
                    <button type="button" class="btn btn-default navbar-btn" onclick="window.open('{{ route('general-cash-bank.index') }}', '_self')">{{ trans('finance.general-cash-bank') }}</button>
                    <button type="button" class="btn btn-default navbar-btn" onclick="window.open('{{ route('inter-cash-bank.index') }}', '_self')">{{ trans('finance.inter-cash-bank') }}</button>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ trans('accounting.accounting') }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>{{ link_to_route('journal.index', trans('accounting.journal'), 'period_start=2018-11&period_end=2018-12') }}</li>
                        <li>{{ link_to_route('general-ledger.index', trans('accounting.general-ledger'), 'period_start=2018-11&period_end=2018-12') }}</li>
                        <li>{{ link_to_route('trial-balance.index', trans('accounting.trial-balance'), 'period_start=2018-11&period_end=2018-12') }}</li>
                        <li role="separator" class="divider"></li>
                        <li>{{ link_to_route('balancesheet-account.index', trans('accounting.balancesheet-account')) }}</li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>{{ link_to_route('users.index', trans('user.list')) }}</li>
                        <!--li>{{ link_to_route('backups.index', trans('backup.list')) }}</li-->
                        <li>{{ link_to_route('log-files.index', 'Log Files') }}</li>
                        <li>{{ link_to_route('change-password', trans('auth.change_password')) }}</li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Logout </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                                <button type="submit" style="display: none;" id="logout-button" >Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
            @endif
        </div>
    </div>
</nav>
