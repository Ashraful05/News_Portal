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
                <a class="nav-link" href="{{ route('admin_home') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a>
            </li>
            <li class="{{ Request::is('admin/settings')?'active':'' }}">
                <a class="nav-link" href="{{ route('admin_settings') }}"><i class="fas fa-tools"></i> <span>Settings</span></a>
            </li>

            <li class="nav-item dropdown {{ Request::is('admin/author')||Request::is('admin/author/*')?'active':'' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-user-edit"></i><span>Author</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/author')?'active':'' }}">
                        <a class="nav-link" href="{{ route('author.index') }}">
                            <i class="fas fa-angle-right"></i>Author List</a></li>
                    <li class=""><a class="nav-link" href="{{ route('author_post_view') }}"><i class="fas fa-angle-right"></i>Author Posts</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown {{ Request::is('admin/advertisement/top')||Request::is('admin/advertisement/home')||Request::is('admin/advertisement/sidebar-*') ?'active':'' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-ad"></i><span>Advertisements</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/advertisement/top')?'active':'' }}"><a class="nav-link" href="{{ route('top_advertisement') }}"><i class="fas fa-angle-right"></i>Top Advertisement</a></li>
                    <li class="{{ Request::is('admin/advertisement/home')?'active':'' }}"><a class="nav-link" href="{{ route('home_advertisement') }}"><i class="fas fa-angle-right"></i>Home Advertisement</a></li>
                    <li class="{{ Request::is('admin/advertisement/sidebar-*')?'active':'' }}"><a class="nav-link" href="{{ route('sidebar_advertisement_view') }}"><i class="fas fa-angle-right"></i>Sidebar Advertisement</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ Request::is('admin/category/*')||Request::is('admin/subcategory')||Request::is('admin/subcategory/*')||Request::is('admin/newspost')|| Request::is('admin/newspost/*') ?'active':'' }} ">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-newspaper"></i><span>News</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/category/*')?'active':'' }}"><a class="nav-link" href="{{ route('admin_category_show') }}"><i class="fas fa-angle-right"></i>Categories</a></li>
                    <li class="{{ Request::is('admin/subcategory')||Request::is('admin/subcategory/*')?'active':'' }}"><a class="nav-link" href="{{ route('subcategory.index') }}"><i class="fas fa-angle-right"></i>SubCategories</a></li>
                    <li class="{{ Request::is('admin/newspost')||Request::is('admin/newspost/*')?'active':'' }}"><a class="nav-link" href="{{ route('newspost.index') }}"><i class="fas fa-angle-right"></i>Posts</a></li>
                </ul>
            </li>
            <li class="{{ Request::is('admin/photo')?'active':'' }}">
                <a class="nav-link" href="{{ route('photo.index') }}"><i class="fas fa-images"></i> <span>Photo Gallery</span></a>
            </li>
            <li class="{{ Request::is('admin/video')?'active':'' }}">
                <a class="nav-link" href="{{ route('video.index') }}"><i class="fas fa-video"></i> <span>Video Gallery</span></a>
            </li>
            <li class="nav-item dropdown {{ Request::is('admin/page/*') ?'active':'' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-pager"></i><span>Pages</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/page/about')?'active':'' }}"><a class="nav-link" href="{{ route('edit_about_page') }}"><i class="fas fa-angle-right"></i>Edit About</a></li>
                    <li class="{{ Request::is('admin/page/faq')?'active':'' }}"><a class="nav-link" href="{{ route('edit_faq_page') }}"><i class="fas fa-angle-right"></i>FAQ</a></li>
                    <li class="{{ Request::is('admin/page/contact')?'active':'' }}"><a class="nav-link" href="{{ route('edit_contact_page') }}"><i class="fas fa-angle-right"></i>Contact</a></li>
                    <li class="{{ Request::is('admin/page/login')?'active':'' }}"><a class="nav-link" href="{{ route('edit_login_page') }}"><i class="fas fa-angle-right"></i>Login</a></li>
                    <li class="{{ Request::is('admin/page/terms')?'active':'' }}"><a class="nav-link" href="{{ route('edit_terms_page') }}"><i class="fas fa-angle-right"></i>Terms & Conditions</a></li>
                    <li class="{{ Request::is('admin/page/privacy')?'active':'' }}"><a class="nav-link" href="{{ route('edit_privacy_page') }}"><i class="fas fa-angle-right"></i>Privacy Policy</a></li>
                    <li class="{{ Request::is('admin/page/disclaimer')?'active':'' }}"><a class="nav-link" href="{{ route('edit_disclaimer_page') }}"><i class="fas fa-angle-right"></i>Disclaimer</a></li>
                </ul>
            </li>
            <li class="{{ Request::is('admin/faq/*')?'active':'' }}">
                <a class="nav-link" href="{{ route('faq.index') }}"><i class="fas fa-question-circle"></i> <span>FAQ Section</span></a>
            </li>
            <li class="nav-item dropdown {{ Request::is('admin/subscriber/*')?'active':'' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>Subscriber</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/subscriber/all')?'active':'' }}"><a class="nav-link" href="{{ route('all_subscriber') }}"><i class="fas fa-angle-right"></i>All Subscriber</a></li>
                    <li class="{{ Request::is('admin/subscriber/mail')?'active':'' }}"><a class="nav-link" href="{{ route('mail_subscriber') }}"><i class="fas fa-angle-right"></i>Send Mail to Subscriber</a></li>
                </ul>
            </li>
            <li class="{{ Request::is('admin/liveChannel') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('liveChannel.index') }}"><i class="fas fa-hdd"></i> <span>Live Channel</span></a>
            </li>
            <li class="{{ Request::is('admin/onlinePoll') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('onlinePoll.index') }}"><i class="fas fa-poll"></i> <span>Online Poll</span></a>
            </li>
            <li class="{{ Request::is('admin/socialMedia') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('socialMedia.index') }}"><i class="fas fa-share-alt-square"></i> <span>Social Media</span></a>
            </li>
            <li class="{{ Request::is('admin/language/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('language.index') }}"><i class="fas fa-language"></i><span>All Language</span></a>
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
