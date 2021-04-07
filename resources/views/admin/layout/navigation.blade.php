<div id="left-nav" class="nano">
    <div class="nano-content">
        <nav>
            <ul class="nav nav-left-lines" id="main-nav">
                <!--HOME-->
                <li class="{{ request()->is('admin/dashboard') ? 'active-item':'' }}"><a href="{{  route('admin.dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>
                <li class="{{ request()->is('admin/heading-title') ? 'active-item':'' }}"><a href="{{ route('admin.headingTitle') }}"><i class="fa fa-header" aria-hidden="true"></i><span>Heading Title</span></a></li>
                <li class="{{ request()->is('admin/banner') ? 'active-item':'' }}"><a href="{{ route('admin.banner') }}"><i class="fa fa-book" aria-hidden="true"></i><span>Banner</span></a></li>
                <li class="{{ request()->is('admin/category') ? 'active-item':'' }}"><a href="{{ route('admin.category.category') }}"><i class="fa fa-cubes" aria-hidden="true"></i><span>Category</span></a></li>
                <li class="{{ request()->is('admin/brand') ? 'active-item':'' }}"><a href="{{ route('admin.brand.brand') }}"><i class="fa fa-pie-chart" aria-hidden="true"></i><span>Brand</span></a></li>
                <li class="has-child-item close-item {{ request()->is('admin/product/add-product') ? 'active-item open-item':'' }} {{ request()->is('admin/product/manage-product') ? 'active-item open-item':'' }}">
                    <a><i class="fa fa-paper-plane" aria-hidden="true"></i><span>Product</span></a>
                    <ul class="nav child-nav level-1">
                        <li class="{{ request()->is('admin/product/add-product') ? 'active-item':'' }}"><a href="{{ route('admin.product.addProduct') }}">Add Product</a></li>
                        <li class="{{ request()->is('admin/product/manage-product') ? 'active-item':'' }}"><a href="{{ route('admin.product.manageProduct') }}">Manage Product</a></li>
                    </ul>
                </li>
                <li class="{{ request()->is('admin/coupon') ? 'active-item':'' }}"><a href="{{ route('admin.coupon') }}"><i class="fa fa-caret-square-o-up" aria-hidden="true"></i><span>Coupon</span></a></li>


                <li class="has-child-item close-item {{ request()->is('admin/order/order-item') ? 'active-item open-item':'' }} {{ request()->is('admin/order/order-manage') ? 'active-item open-item':'' }}">
                    <a><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Order
                            <?php
                            $order = \App\Models\Frontend\Order::get();
                            ?>
                            @if(count($order) < 0)
                                @else
                            <span style="padding: 3px 7px;border-radius: 50px;" class="bg-danger">{{ count($order) }}</span>
                                @endif
                        </span></a>
                    <ul class="nav child-nav level-1">
                        <li class="{{ request()->is('admin/order/order-item') ? 'active-item':'' }}"><a href="{{ route('admin.order.order') }}">Orders</a></li>
                        <li class="{{ request()->is('admin/order/order-manage') ? 'active-item':'' }}"><a href="{{ route('admin.order.orderMange') }}">Manage Order</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>