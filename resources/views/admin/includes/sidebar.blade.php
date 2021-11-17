<div class="left-side-bar">
    <div class="brand-logo">
        <a href="{{ route('frontend.index') }} ">
            <img src="/admin/vendors/images/deskapp-logo.svg" alt="" class="dark-logo">
            <img src="/admin/vendors/images/deskapp-logo-white.svg" alt="" class="light-logo">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="{{ route('backend.dashboard.index') }}"
                        class="dropdown-toggle no-arrow @if (request()->is('backend/dashboard')) active @endif">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Trang chủ</span>
                    </a>
                </li>
                <li class="dropdown @if (request()->routeIs('backend.posts.*')) show @endif">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-edit2"></span><span class="mtext">Quản lý bài viết</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('backend.posts.index') }}" class="@if (request()->routeIs('backend.posts.index')) active @endif">Danh sách
                                bài viết</a></li>
                        <li><a href="{{ route('backend.posts.create') }}" class="@if (request()->routeIs('backend.posts.create')) active @endif">Viết
                                bài</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-list3"></span><span class="mtext">Quản lý chung</span>
                    </a>
                    <ul class="submenu">
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                                <span class="micon fa fa-plug"></span><span class="mtext">Danh mục</span>
                            </a>
                            <ul class="submenu child">
                                <li><a href="{{ route('backend.categories.index') }}">Danh sách các danh mục</a></li>
                                <li><a href="{{ route('backend.categories.create') }}">Thêm danh mục</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="submenu">
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                                <span class="micon fa fa-plug"></span><span class="mtext">Thẻ</span>
                            </a>
                            <ul class="submenu child">
                                <li><a href="{{ route('backend.tags.index') }}">Danh sách các thẻ</a></li>
                                <li><a href="{{ route('backend.tags.create') }}">Thêm thẻ mới</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li>
                    <div class="dropdown-divider"></div>
                </li>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-library"></span><span class="mtext">Quản lý bán hàng</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('backend.products.index') }}">Danh sách sản phẩm</a></li>
                        <li><a href="{{ route('backend.products.create') }}">Thêm sản phẩm</a></li>
                    </ul>
                </li>

                <li>
                    <div class="dropdown-divider"></div>
                </li>
                <li>
                    <div class="sidebar-small-cap">Hệ thống</div>
                </li>
                <li>
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-edit-2"></span><span class="mtext">Người dùng</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('backend.users.index') }}">Danh sách người dùng</a></li>
                        <li><a href="{{ route('backend.users.create') }}">Thêm người dùng</a></li>
                        <li><a href="{{ route('backend.users.delete') }}">Người dùng đã xóa</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-edit-2"></span><span class="mtext">Phân quyền</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('backend.roles.index') }}">Vai trò người dùng</a></li>
                        <li><a href="{{ route('backend.roles.create') }}">Thêm mới</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('backend.permissions.index') }}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-paper-plane1"></span>
                        <span class="mtext">Các quyền <img src="/admin/vendors/images/coming-soon.png" alt=""
                                width="25"></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
