<header>
    <ul id="slide-out" class="sidebar side-nav fixed custom-scrollbar">
        <!-- Logo -->
        <li class="brand d-flex justify-content-center align-items-center">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/sk_logo.svg') }}">
            </a>
        </li>
        <!--/. Logo -->
        <!-- Side navigation links -->
        <li class="nav nav-pills flex-column sidebar-menu">
            <ul class="collapsible collapsible-accordion">
                @if ($special == 'proposition')
                    <li><a class="collapsible-header nav-link {{ ($level1=='proposition' && $level2 == 'edit')?'active':'' }}" href="#">@lang('Proposition')</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="{{ url('proposition/proposition') }}" class ="waves-effect">@lang('0. proposition')</a></li>
                                <li><a href="{{ url('proposition/basic_data') }}" class ="waves-effect">@lang('1. Basic data')</a></li>
                                <li><a href="{{ url('proposition/categorization') }}" class ="waves-effect">2. Categorization</a></li>
                                <li><a href="{{ url('proposition/market_potential') }}" class ="waves-effect">@lang('3. Market Pontential')</a></li>
                                <li><a href="{{ url('proposition/technical_data') }}" class ="waves-effect">@lang('4. Tehnical Data')</a></li>
                                <li><a href="{{ url('proposition/print') }}" class ="waves-effect">@lang('5. Print')</a></li>
                                <ul class="menu-subsection">
                                    <li><a href="#" class ="waves-effect menu-subsection-title">@lang('Expense')</a></li>
                                    <li><a href="{{ url('proposition/authors_expense') }}" class ="waves-effect">@lang('6. Authors Expense')</a></li>
                                    <li><a href="{{ url('proposition/production_expense') }}" class ="waves-effect">@lang('7. Production Expense')</a></li>
                                    <li><a href="{{ url('proposition/marketing_expense') }}" class ="waves-effect">@lang('8. Marketing Expense')</a></li>
                                    <li><a href="{{ url('proposition/distribution_expense') }}" class ="waves-effect">@lang('9. Distribution Expense')</a></li>
                                    <li><a href="{{ url('proposition/layout_expense') }}" class ="waves-effect">@lang('10. Layout Expense')</a></li>
                                </ul>
                                <li><a href="{{ url('proposition/deadline') }}" class ="waves-effect">@lang('11. Deadline')</a></li>
                                <li><a href="{{ url('proposition/precalculation') }}" class ="waves-effect">@lang('12. Precalculation')</a></li>
                                <li><a href="{{ url('proposition/calculation') }}" class ="waves-effect">@lang('13. Calculation')</a></li>
                                <li><a href="{{ url('proposition/work_order') }}" class ="waves-effect">@lang('14. Work Order')</a></li>
                                <li><a href="{{ url('proposition/list') }}" class ="waves-effect">list</a></li>
                                <li><a href="{{ url('proposition/expense') }}" class ="waves-effect">Expense</a></li>
                                <li><a href="{{ url('proposition/compare') }}" class ="waves-effect">Compare</a></li>
                                <li><a href="{{ url('proposition/task') }}" class ="waves-effect">Task</a></li>
                                <li><a href="{{ url('proposition/task_details') }}" class ="waves-effect">Task details</a></li>
                                <li><a href="{{ url('proposition/task_new') }}" class ="waves-effect">Task new</a></li>
                                <li><a href="{{ url('proposition/department-list') }}" class ="waves-effect">Department-list</a></li>
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
                @else
                @if (Auth::user()->hasRole('hr_admin'))
                    <li>
                        <a class="collapsible-header nav-link {{ ($level1=='user')?'active':'' }}" href="#">@lang('Administration')</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="{{ url('/user') }}" class="waves-effect {{ ($level1=='user' && !$level2)?'active':'' }}">@lang('Users')</a></li>
                                <li><a href="{{ url('/user/edit') }}" class="waves-effect {{ ($level2=='edit')?'active':'' }}">@lang('Add new user')</a></li>
                                <li><a href="{{ url('user/role') }}" class="waves-effect {{ ($level2=='role' && !$level3)?'active':'' }}">@lang('Roles')</a></li>
                                <li><a href="{{ url('user/role/edit') }}" class="waves-effect {{ ($level2=='role' && $level3=='edit')?'active':'' }}">@lang('Add New Role')</a></li>
                            </ul>
                        </div>
                    </li>
                @endif
                @if (Auth::user()->hasRole('hr_admin'))
                    <li><a class="collapsible-header nav-link {{ ($level1=='hr')?'active':'' }}" href="#">@lang('Human Resources')</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="{{ url('hr/employee') }}" class="waves-effect {{ ($level2=='employee')?'active':'' }}">@lang('Employees')</a></li>
                                <li><a href="{{ url('hr/candidates') }}" class="waves-effect {{ ($level2=='candidates')?'active':'' }}">@lang('Candidates')</a></li>
                                <li><a href="{{ url('hr/department') }}" class="waves-effect {{ ($level2=='department')?'active':'' }}">@lang('Departments')</a></li>
                            </ul>
                        </div>
                    </li>
                @endif
                @if (Auth::user()->hasRole('proposition_admin'))
                            <li><a class="collapsible-header nav-link {{ ($level1=='proposition')?'active':'' }}" href="#">@lang('Propositions')</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="{{ url('proposition/edit') }}" class="waves-effect dot-delete item-accent">@lang('Add New')</a></li>
                                        <li><a href="{{ url('proposition') }}" class="waves-effect {{ ($level1=='proposition')?'active':'' }}">@lang('Propositions')</a></li>
                                        <li><a href="{{ url('proposition/department-list') }}" class="waves-effect">@lang('Text Preparation')</a></li>
                                        <li><a href="{{ url('proposition/department-list') }}" class="waves-effect">@lang('Design')</a></li>
                                        <li><a href="{{ url('proposition/department-list') }}" class="waves-effect">@lang('Layout')</a></li>
                                        <li><a href="{{ url('proposition/department-list') }}" class="waves-effect">@lang('Price/Circulation')</a></li>
                                        <li><a href="{{ url('proposition/department-list') }}" class="waves-effect">@lang('Prepress')</a></li>
                                    </ul>
                                </div>
                            </li>
                @endif
                <!-- Book management -->
                    <li><a class="collapsible-header nav-link {{ ($level1=='book')?'active':'' }}" href="#">@lang('Books')</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="{{ url('book') }}" class="waves-effect {{ ($level1=='book')?'active':'' }}">@lang('Books')</a></li>
                                <li><a href="{{ url('book/category') }}" class="waves-effect {{ ($level1=='book' && $level2=='category')?'active':'' }}">@lang('Categories')</a></li>
                            </ul>
                        </div>
                    </li>

                @endif
            </ul>
        </li>
        <!--/. Side navigation links -->
    </ul>

    <nav class="col navbar d-flex flex-row-reverse navbar-toggleable-md scrolling-navbar double-nav">
        <div class="dropdown">
            <a class="nav-link dropdown-toggle user-nav" data-toggle="dropdown" href="#" role="button" >{{ Auth::user()->name }}
                <img src="https://www.gravatar.com/avatar/{{ md5( Auth::user()->email ) }}?s=50&d=wavatar" class="header-profile">
            </a>
            <div class="dropdown-menu dropdown-ins dropdown-menu-right dropdown-custom-login">
                <div class="user-box">
                    <a class="waves-effect activity-item waves-light" href="{{ url('logout') }}">@lang('Log Out')</a>
                    <a class="waves-effect waves-light" href="#">@Lang ('My account')</a>
                </div>
            </div>
        </div>
        <inspirium-notifications></inspirium-notifications>

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
