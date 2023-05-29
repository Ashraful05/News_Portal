<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin_home') }}">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin_home') }}"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="{{ Request::is('admin/home')?'active':'' }}">
                <a class="nav-link" href="{{ route('admin_home') }}"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a>
            </li>

            <li class="nav-item dropdown {{ Request::is('admin/advertisement/top')||Request::is('admin/advertisement/home')||Request::is('admin/advertisement/sidebar-*') ?'active':'' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Advertisements</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/advertisement/top')?'active':'' }}"><a class="nav-link" href="{{ route('top_advertisement') }}"><i class="fas fa-angle-right"></i>Top Advertisement</a></li>
                    <li class="{{ Request::is('admin/advertisement/home')?'active':'' }}"><a class="nav-link" href="{{ route('home_advertisement') }}"><i class="fas fa-angle-right"></i>Home Advertisement</a></li>
                    <li class="{{ Request::is('admin/advertisement/sidebar-*')?'active':'' }}"><a class="nav-link" href="{{ route('sidebar_advertisement_view') }}"><i class="fas fa-angle-right"></i>Sidebar Advertisement</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ Request::is('admin/category/*')||Request::is('admin/subcategory')||Request::is('admin/subcategory/*')||Request::is('admin/newspost')|| Request::is('admin/newspost/*') ?'active':'' }} ">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>News</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/category/*')?'active':'' }}"><a class="nav-link" href="{{ route('admin_category_show') }}"><i class="fas fa-angle-right"></i>Categories</a></li>
                    <li class="{{ Request::is('admin/subcategory')||Request::is('admin/subcategory/*')?'active':'' }}"><a class="nav-link" href="{{ route('subcategory.index') }}"><i class="fas fa-angle-right"></i>SubCategories</a></li>
                    <li class="{{ Request::is('admin/newspost')||Request::is('admin/newspost/*')?'active':'' }}"><a class="nav-link" href="{{ route('newspost.index') }}"><i class="fas fa-angle-right"></i>Posts</a></li>
                </ul>
            </li>


{{--            <li class="nav-item dropdown active">--}}
{{--                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Dropdown Items</span></a>--}}
{{--                <ul class="dropdown-menu">--}}
{{--                    <li class="active"><a class="nav-link" href=""><i class="fas fa-angle-right"></i> Item 1</a></li>--}}
{{--                    <li class=""><a class="nav-link" href=""><i class="fas fa-angle-right"></i> Item 2</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}

{{--            <li class=""><a class="nav-link" href="setting.html"><i class="fas fa-hand-point-right"></i> <span>Setting</span></a></li>--}}

{{--            <li class=""><a class="nav-link" href="form.html"><i class="fas fa-hand-point-right"></i> <span>Form</span></a></li>--}}

{{--            <li class=""><a class="nav-link" href="table.html"><i class="fas fa-hand-point-right"></i> <span>Table</span></a></li>--}}

{{--            <li class=""><a class="nav-link" href="invoice.html"><i class="fas fa-hand-point-right"></i> <span>Invoice</span></a></li>--}}

        </ul>
    </aside>
</div>
