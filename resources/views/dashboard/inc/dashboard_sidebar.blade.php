<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">
        <div class="shadow-bottom"></div>

        <ul class="list-unstyled menu-categories ps" id="accordionExample">
            {{-- <li class="menu">
                <a href="#starter-kit" data-active="true" data-toggle="collapse" aria-expanded="true"
                    class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span>Dashboard</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="submenu list-unstyled collapse show" id="starter-kit" data-parent="#accordionExample"
                    style="">
                    <li>
                        <a href="starter_kit_blank_page.html"> Blank Page </a>
                    </li>
                    <li class="active">
                        <a href="starter_kit_breadcrumbs.html"> Breadcrumbs </a>
                    </li>
                    <li>
                        <a href="starter_kit_boxed.html"> Boxed </a>
                    </li>
                    <li>
                        <a href="starter_kit_alt_menu.html"> Alternate Menu </a>
                    </li>
                </ul>
            </li> --}}

            <li class="menu">
                <a href="{{ route('home') }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns=" http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="#submenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns=" http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay">
                        <path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1">
                        </path>
                        <polygon points="12 15 17 21 7 21 12 15"></polygon></svg>
                        <span>Access Control</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="submenu" data-parent="#accordionExample">
                    <li>
                        <a href="{{ route('roles.index') }}"> Roles </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);"> Permissions </a>
                    </li>
                </ul>
            </li>

            <li class="menu">
                <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns=" http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-file">
                        <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                        <polyline points="13 2 13 9 20 9"></polyline></svg>
                        <span> Settings</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="submenu2" data-parent="#accordionExample">
                    <li>
                        <a href="javascript:void(0);"> Submenu 1 </a>
                    </li>
                    <li>
                        <a href="#sm2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            Submenu 2 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg> </a>
                        <ul class="collapse list-unstyled sub-submenu" id="sm2" data-parent="#submenu2">
                            <li>
                                <a href="javascript:void(0);"> Sub-Submenu 1 </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"> Sub-Submenu 2 </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"> Sub-Submenu 3 </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>

    </nav>

</div>
