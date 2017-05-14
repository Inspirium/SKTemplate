<header>
    <ul id="slide-out" class="sidebar side-nav fixed custom-scrollbar">
        <!-- Logo -->
        <li class="brand">
            <img src="{{ asset('images/sk_logo.svg') }}" href="{{ url('/') }}">
        </li>
        <!--/. Logo -->
        <!-- Side navigation links -->
        <li class="nav nav-pills flex-column sidebar-menu">
            <ul class="collapsible collapsible-accordion">
                @if (Auth::user()->hasRole('hr_admin'))
                    <li><a class="collapsible-header nav-link" href="#">@lang('Administration')</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="{{ url('/user') }}" class="waves-effect">@lang('Users')</a></li>
                                <li><a href="{{ url('/user/edit') }}" class="waves-effect">@lang('Add new user')</a></li>
                                <li><a href="{{ url('user/role') }}" class="waves-effect">@lang('Roles')</a></li>
                                <li><a href="{{ url('user/role/edit') }}" class="waves-effect">@lang('Add New Role')</a></li>
                            </ul>
                        </div>
                    </li>
                @endif
                @if (Auth::user()->hasRole('hr_admin'))
                    <li><a class="collapsible-header nav-link" href="#">@lang('Human Resources')</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="{{ url('hr/employee') }}" class="waves-effect">@lang('Employees')</a></li>
                                <li><a href="{{ url('hr/candidates') }}" class="waves-effect">@lang('Candidates')</a></li>
                                <li><a href="{{ url('hr/department') }}" class="waves-effect">@lang('Departments')</a></li>
                            </ul>
                        </div>
                    </li>
                @endif
                @if (Auth::user()->hasRole('proposition_admin'))
                    <li><a class="collapsible-header nav-link" href="#">@lang('Proposition')</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="{{ url('proposition/proposition') }}" class ="waves-effect">@lang('proposition')</a></li>
                                <li><a href="{{ url('proposition/basic_data') }}" class ="waves-effect">@lang('Basic data')</a></li>
                                <li><a href="{{ url('proposition/categorization') }}" class ="waves-effect">Categorization</a></li>
                                <li><a href="{{ url('proposition/market_potential') }}" class ="waves-effect">@lang('Tržišni potencijal')</a></li>
                                <li><a href="{{ url('proposition/technical_data') }}" class ="waves-effect">@lang('Tehnički podaci')</a></li>
                                <li><a href="{{ url('proposition/print') }}" class ="waves-effect">@lang('Tisak')</a></li>
                                <li><a href="{{ url('proposition/authors_expense') }}" class ="waves-effect">@lang('Authors Expense')</a></li>
                                <li><a href="{{ url('proposition/production_expense') }}" class ="waves-effect">@lang('Production Expense')</a></li>
                                <li><a href="{{ url('proposition/marketing_expense') }}" class ="waves-effect">@lang('Marketing Expense')</a></li>
                                <li><a href="{{ url('proposition/distribution_expense') }}" class ="waves-effect">@lang('Distribution Expense')</a></li>
                                <li><a href="{{ url('proposition/layout_expense') }}" class ="waves-effect">@lang('Layout Expense')</a></li>
                                <li><a href="{{ url('proposition/deadline') }}" class ="waves-effect">@lang('Deadline')</a></li>
                                <li><a href="{{ url('proposition/calculation') }}" class ="waves-effect">@lang('Calculation')</a></li>
                                <li><a href="{{ url('proposition/precalculation') }}" class ="waves-effect">@lang('Precalculation')</a></li>
                                <li><a href="{{ url('proposition/work_order') }}" class ="waves-effect">@lang('Work Order')</a></li>
                                <li><a href="{{ url('proposition/list') }}" class ="waves-effect">list</a></li>
                                <li><a href="{{ url('proposition/expense') }}" class ="waves-effect">Expense</a></li>
                                <li><a href="{{ url('proposition/compare') }}" class ="waves-effect">Compare</a></li>
                                <li><a href="{{ url('proposition/task') }}" class ="waves-effect">Task</a></li>
                                <li><a href="{{ url('proposition/task_details') }}" class ="waves-effect">Task details</a></li>
                                <li><a href="{{ url('proposition/task_new') }}" class ="waves-effect">Task new</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a class="collapsible-header nav-link" href="#">@lang('Expenses')</a>
                    </li>
                    <li><a class="collapsible-header nav-link" href="#">@lang('Text Preparation')</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="{{ url('proposition/documents') }}" class ="waves-effect">@lang('Translation')</a></li>
                                <li><a href="{{ url('proposition/basic_data') }}" class ="waves-effect">@lang('Technical Preparation')</a></li>
                                <li><a href="{{ url('proposition/market_potential') }}" class ="waves-effect">@lang('Redaktura')</a></li>
                                <li><a href="{{ url('proposition/technical_data') }}" class ="waves-effect">@lang('Additional Materials')</a></li>
                                <li><a href="{{ url('proposition/print') }}" class ="waves-effect">@lang('Review')</a></li>
                                <li><a href="{{ url('proposition/authors_expense') }}" class ="waves-effect">@lang('Text Correction')</a></li>
                                <li><a href="{{ url('proposition/production_expense') }}" class ="waves-effect">@lang('Technical Correction')</a></li>
                                <li><a href="{{ url('proposition/marketing_expense') }}" class ="waves-effect">@lang('Overview')</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a class="collapsible-header nav-link" href="#">@lang('Design')</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="{{ url('proposition/proposition') }}" class ="waves-effect">@lang('Cover')</a></li>
                                <li><a href="{{ url('proposition/basic_data') }}" class ="waves-effect">@lang('Layout Templates')</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a class="collapsible-header nav-link" href="#">@lang('Layout')</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="{{ url('proposition/proposition') }}" class ="waves-effect">@lang('Layout Templates')</a></li>
                                <li><a href="{{ url('proposition/basic_data') }}" class ="waves-effect">@lang('Cover')</a></li>
                                <li><a href="{{ url('proposition/basic_data') }}" class ="waves-effect">@lang('Layout')</a></li>
                                <li><a href="{{ url('proposition/basic_data') }}" class ="waves-effect">@lang('First Revision')</a></li>
                                <li><a href="{{ url('proposition/basic_data') }}" class ="waves-effect">@lang('Correction')</a></li>
                                <li><a href="{{ url('proposition/basic_data') }}" class ="waves-effect">@lang('Correction Apply')</a></li>
                                <li><a href="{{ url('proposition/basic_data') }}" class ="waves-effect">@lang('Revisions')</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a class="collapsible-header nav-link" href="#">@lang('Price/Circulation')</a>
                    </li>
                    <li><a class="collapsible-header nav-link" href="#">@lang('Prepress')</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="{{ url('proposition/proposition') }}" class ="waves-effect">@lang('Test Print')</a></li>
                                <li><a href="{{ url('proposition/basic_data') }}" class ="waves-effect">@lang('Corrections')</a></li>
                                <li><a href="{{ url('proposition/basic_data') }}" class ="waves-effect">@lang('Print House')</a></li>
                                <li><a href="{{ url('proposition/basic_data') }}" class ="waves-effect">@lang('Warehouse')</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a class="collapsible-header nav-link" href="#">@lang('Additional Materials')</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="{{ url('proposition/proposition') }}" class ="waves-effect">@lang('Multimedia')</a></li>
                                <li><a href="{{ url('proposition/basic_data') }}" class ="waves-effect">@lang('Marketing')</a></li>
                            </ul>
                        </div>
                    </li>
                @endif
            </ul>
        </li>
        <!--/. Side navigation links -->
    </ul>

    <nav class="col navbar main-nav d-flex flex-row-reverse navbar-toggleable-md scrolling-navbar double-nav">
        <a class="nav-link dropdown-toggle user-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}
            <img src="https://www.gravatar.com/avatar/{{ md5( Auth::user()->email ) }}?s=50&d=wavatar" class="header-profile">
        </a>
        <div class="dropdown-menu dropdown-ins dropdown-menu-right dropdown-custom-login" aria-labelledby="userDropdown">
            <a class="dropdown-item waves-effect waves-light" href="{{ url('logout') }}">@lang('Log Out')</a>
            <a class="dropdown-item waves-effect waves-light" href="#">@Lang ('My account')</a>
        </div>
        <a href="#" class="nav-item nav-link-icon dropdown-toggle d-flex" data-toggle="dropdown">
            <i class="fa fa-bell"></i>
            <span class="tag tag-danger">4</span>
        </a>
        <div class="dropdown-menu dropdown-ins dropdown-menu-right dropdown-custom-login" aria-labelledby="userDropdown">
            <inspirium-notifications></inspirium-notifications>
        </div>
        <a href="#" class="nav-item nav-link-icon d-flex">
            <i class="fa fa-search"></i>
        </a>
        <!-- Breadcrumb -->
        <ol class="breadcrumb d-flex align-items-center">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Library</a></li>
            <li class="breadcrumb-item active">Data</li>
        </ol>
        <!--/. Breadcrumb -->
        <div class="float-right hamburger-icon">
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
        </div>
    </nav>
</header>
