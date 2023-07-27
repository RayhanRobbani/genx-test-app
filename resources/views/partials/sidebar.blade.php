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

                <li class="{{ request()->routeIs('brands.index') ? 'active' : '' }}">
                    <a href="{{ route('brands.index') }}"><i class="fa fa-envelope"></i><span class="hide-menu">Brands</span></a>
                </li>

                <li class="{{ request()->routeIs('aboutUs.index') ? 'active' : '' }}">
                    <a href="{{ route('aboutUs.index') }}"><i class="fa fa-envelope"></i><span class="hide-menu">About Us</span></a>
                </li>

                <li class="{{ request()->routeIs('coupons.index') ? 'active' : '' }}">
                    <a href="{{ route('coupons.index') }}"><i class="fa fa-envelope"></i><span class="hide-menu">Coupons</span></a>
                </li>

                <li> <a class="has-arrow {{ request()->routeIs('services.index') ? 'active' : '' }}" href="#" aria-expanded="false"><i class="fa fa-envelope"></i><span
                            class="hide-menu">Main Page</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('services.index') }}">Services</a></li>
                    </ul>
                </li>

                <li> <a class="has-arrow {{request()->routeIs('products.index') || request()->routeIs('productUnits.index') || request()->routeIs('productAttributes.index') || request()->routeIs('productTags.index') ? 'active' : '' }}" href="#" aria-expanded="false"><i class="fa fa-envelope"></i><span
                            class="hide-menu">Products</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('products.index') }}">Product List</a></li>
                        <li><a href="{{ route('productUnits.index') }}">Units</a></li>
                        <li><a href="{{ route('productAttributes.index') }}">Attributes</a></li>
                        <li><a href="{{ route('productTags.index') }}">Tags</a></li>
                    </ul>
                </li>

                <li> <a class="has-arrow {{ request()->routeIs('shippingCharges.index') || request()->routeIs('shippingProviders.index') ? 'active' : '' }}" href="#" aria-expanded="false"><i class="fa fa-envelope"></i><span
                            class="hide-menu">Shipping</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('shippingCharges.index') }}">Shipping Charges</a></li>
                        <li><a href="{{ route('shippingProviders.index') }}">Shipping Providers</a></li>
                    </ul>
                </li>

                <li class="{{ request()->routeIs('settings') ? 'active' : '' }}">
                    <a href="{{ route('settings') }}"><i class="fa fa-envelope"></i><span class="hide-menu">Settings</span></a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</div>
<!-- End Left Sidebar  -->
