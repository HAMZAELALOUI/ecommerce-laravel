<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown active">
                <a href="{{ route('admin.dashboard') }}" class="nav-link "><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>

            </li>
            <li class="menu-header">Starter</li>
            <li
                class="dropdown {{ setActive(['admin.category.*', 'admin.sub-category.*', 'admin.child-category.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Manage Category</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.category.*']) }}"><a class="nav-link"
                            href="{{ route('admin.category.index') }}">Category</a></li>
                    <li class="{{ setActive(['admin.sub-category.*']) }}"><a class="nav-link"
                            href="{{ route('admin.sub-category.index') }}">Sub Category</a></li>
                    <li class="{{ setActive(['admin.child-category.*']) }}"><a class="nav-link"
                            href="{{ route('admin.child-category.index') }}">child Category</a></li>
                </ul>
            </li>
            <li
                class="dropdown {{ setActive(['admin.brand.*', 'admin.product.*', 'admin.seller-products.*', 'admin.seller-pending-products.*', 'admin.product-image-gallery.*', 'admin.product-variant.*', 'admin.product-variant-item.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Manage Products</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.brand.*']) }}"><a class="nav-link"
                            href="{{ route('admin.brand.index') }}">Brands</a></li>
                    <li
                        class="{{ setActive(['admin.product.*', 'admin.product-image-gallery.*', 'admin.product-variant.*', 'admin.product-variant-item.*']) }}">
                        <a class="nav-link" href="{{ route('admin.product.index') }}">Products</a>
                    </li>
                    <li class="{{ setActive(['admin.seller-products.*']) }}"><a class="nav-link"
                            href="{{ route('admin.seller-products.index') }}">Seller Products</a></li>
                    <li class="{{ setActive(['admin.seller-pending-products.*']) }}"><a class="nav-link"
                            href="{{ route('admin.seller-pending-products.index') }}">Seller Pending Products</a></li>
                </ul>
            </li>
            <li
                class="dropdown {{ setActive(['admin.vendor-profile.*', 'admin.flash-sale.*', 'admin.coupons.*', 'admin.shipping-rule.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Ecommerce</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.flash-sale.*']) }}"><a class="nav-link"
                            href="{{ route('admin.flash-sale.index') }}">Flash Sale</a></li>
                    <li class="{{ setActive(['admin.coupons.*']) }}"><a class="nav-link"
                            href="{{ route('admin.coupons.index') }}">Coupons</a></li>
                    <li class="{{ setActive(['admin.shipping-rule.*']) }}"><a class="nav-link"
                            href="{{ route('admin.shipping-rule.index') }}">Shipping Rules</a></li>
                    <li class="{{ setActive(['admin.vendor-profile.*']) }}"><a class="nav-link"
                            href="{{ route('admin.vendor-profile.index') }}">Vendor Profile</a></li>
                </ul>
            </li>
            <li class="dropdown {{ setActive(['admin.slider.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Manage Web Site</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.slider.*']) }}"><a class="nav-link"
                            href="{{ route('admin.slider.index') }}">Slider</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="{{ route('admin.settings.index') }}"><i class="fas fa-cog"></i>
                    <span>Settings</span></a></li>


            {{-- <li class="menu-header">Starter</li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
          <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
          <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
        </ul>
      </li> --}}
        </ul>

    </aside>
</div>
