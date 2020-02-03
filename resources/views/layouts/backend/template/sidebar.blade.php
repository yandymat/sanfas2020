        <aside id="leftsidebar"class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="{{asset('assets/backend/images/user.png')}}" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name"data-toggle="dropdown"aria-haspopup="true"aria-expanded="false">{{Auth::user()->name }}</div>
                    <div class="email">{{Auth::user()->email }}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons"data-toggle="dropdown"aria-haspopup="true"aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Mon profile</a></li>
                            <li role="separator"class="divider"></li>
                            <li>
                                <a class="dropdown-item"href="{{route('logout')}}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="material-icons">input</i>Se deconnecter
                                </a>

                                <form id="logout-form"action="{{route('logout')}}" method="POST" style="display: none;">
                                        @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    @if(Request::is('admin*'))

                    <li class="{{Request::is('admin/dashboard') ?'active':''}}">
                        <a href="{{route('admin.dashboard')}}">
                            <i class="material-icons">dashboard</i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="{{Request::is('admin/post*') ?'active':''}}">
                        <a href="{{route('admin.post.index')}}">
                            <i class="material-icons">library_books</i>
                            <span>Gestion des Posts</span>
                        </a>
                    </li>

                    <li class="{{Request::is('admin/en-attente/post') ?'active':''}}">
                        <a href="{{route('admin.post.en-attente')}}">
                            <i class="material-icons">library_books</i>
                            <span>Posts en attente</span>
                        </a>
                    </li>

                    <li class="{{Request::is('admin/message-box') ?'active':''}}">
                        <a href="{{route('admin.msgbox.index')}}">
                            <i class="material-icons">mail</i>
                            <span>Messages leeds</span>
                        </a>
                    </li>

                    <li class="{{Request::is('admin/universite') ?'active':''}}">
                        <a href="{{route('admin.universite.index')}}">
                            <i class="material-icons">home_work</i>
                            <span>Université</span>
                        </a>
                    </li>

                    <li class="{{Request::is('admin/pays*') ?'active':''}}">
                        <a href="{{route('admin.pays.index')}}">
                            <i class="material-icons">language</i>
                            <span>Gestion des pays</span>
                        </a>
                    </li>

                    <li class="{{Request::is('admin/tag*') ?'active':''}}">
                        <a href="{{route('admin.tag.index')}}">
                            <i class="material-icons">label</i>
                            <span>Gestion des Tag</span>
                        </a>
                    </li>

                    <li class="{{Request::is('admin/slider*') ?'active':''}}">
                        <a href="{{route('admin.slider.index')}}">
                            <i class="material-icons">image</i>
                            <span>Gestion du slider</span>
                        </a>
                    </li>

                    <li class="header">Configuration</li>
                    <li>
                        <a class="dropdown-item"href="{{route('logout')}}"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="material-icons">input</i>
                            <span>Se deconnecter</span>
                        </a>

                         <form id="logout-form"action="{{route('logout')}}" method="POST" style="display: none;">
                                        @csrf
                        </form>
                    </li>

                    @endif
                    @if(Request::is('auteur*'))
                    <li class="{{Request::is('auteur/dashboard') ?'active':''}}">
                        <a href="{{route('auteur.dashboard')}}">
                            <i class="material-icons">dashboard</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="{{Request::is('auteur/post*') ?'active':''}}">
                        <a href="{{route('auteur.post.index')}}">
                            <i class="material-icons">library_books</i>
                            <span>Gestion des Posts</span>
                        </a>
                    </li>
                    <li class="header">Configuration</li>
                    <li>
                        <a class="dropdown-item"href="{{route('logout')}}"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="material-icons">input</i>
                            <span>Se deconnecter</span>
                        </a>

                         <form id="logout-form"action="{{route('logout')}}" method="POST" style="display: none;">
                                        @csrf
                        </form>
                    </li>
                    @endif
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; Sanfas2020 | Tous droits réservés <a href="https://www.dymatgrafik.com">Dymatgrafik</a>.
                </div>
            </div>
            <!-- #Footer -->
        </aside>
