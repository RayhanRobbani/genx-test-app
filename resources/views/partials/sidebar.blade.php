<!-- Left Sidebar  -->
<div class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>
                <li class="nav-label">Menu</li>

                <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}"><i class="fa fa-envelope"></i><span class="hide-menu">Dashboard</span></a>
                </li>

                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-envelope"></i><span
                            class="hide-menu">Main Page</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="email-compose.html">Compose</a></li>
                        <li><a href="email-read.html">Read</a></li>
                        <li><a href="email-inbox.html">Inbox</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</div>
<!-- End Left Sidebar  -->
