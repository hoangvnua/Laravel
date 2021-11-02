<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="/backend/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">
                {{ auth()->user()->name ?? "" }}
            </a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ route('backend.dashboard.index') }}" class="nav-link @if (request()->is('backend/dashboard')) active @endif">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Quản lý chung
                    </p>
                </a>
            </li>
            <li class="nav-header">Quản lý chung</li>
            <li class="nav-item @if (request()->routeIs('backend.posts.*')) menu-open @endif">
                <a href="#2" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        Quản lý bài viết
                        <i class="fas fa-angle-left right"></i>

                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('backend.posts.index') }}" class="nav-link @if (request()->is('backend/posts')) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Danh sách bài viết</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href=" {{ route('backend.posts.create') }} " class="nav-link @if (request()->is('backend/posts/create')) active @endif ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Tạo mới bài viết</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item @if (request()->routeIs('backend.tags.*')) menu-open @endif">
                <a href="#2" class="nav-link">
                    <i class="nav-icon fas fa-tags"></i>
                    <p>
                        Quản lý thẻ
                        <i class="fas fa-angle-left right"></i>

                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('backend.tags.index') }}" class="nav-link @if (request()->is('backend/tags')) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Danh sách thẻ</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href=" {{ route('backend.tags.create') }} " class="nav-link @if (request()->is('backend/tags/create')) active @endif ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Tạo mới thẻ</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item @if (request()->routeIs('backend.storages.*')) menu-open @endif">
                <a href="#2" class="nav-link">
                    <i class="nav-icon far fa-images"></i>
                    <p>
                        Ảnh
                        <i class="fas fa-angle-left right"></i>

                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('backend.storages.index') }}" class="nav-link @if (request()->is('backend/storages')) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Danh sách ảnh</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item @if (request()->routeIs('backend.categories.*')) menu-open @endif">
                <a href="#2" class="nav-link">
                    <i class="nav-icon far fa-calendar-minus"></i>
                    <p>
                        Quản lý danh mục
                        <i class="fas fa-angle-left right"></i>

                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('backend.categories.index') }}" class="nav-link @if (request()->is('backend/categories')) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Danh sách danh mục</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href=" {{ route('backend.categories.create') }} "
                            class="nav-link @if (request()->is('backend/categories/create')) active @endif ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Tạo mới danh mục</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href=" {{ route('backend.categories.delete') }} "
                            class="nav-link @if (request()->is('backend/categories/delete')) active @endif ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Danh mục đã xóa</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-header">Hệ thống</li>
            <li class="nav-item @if (request()->routeIs('backend.users.*')) menu-open @endif">
                <a href="#2" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Quản lý người dùng
                        <i class="fas fa-angle-left right"></i>

                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('backend.users.index') }}" class="nav-link @if (request()->is('backend/users')) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Danh sách người dùng</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('backend.users.create') }}" class="nav-link @if (request()->is('backend/users/create')) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Tạo mới người dùng</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('backend.users.delete') }}" class="nav-link @if (request()->is('backend/users/delete')) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Người dùng đã xóa</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item @if (request()->routeIs('backend.roles.*')) menu-open @endif">
                <a href="#2" class="nav-link">
                    <i class="nav-icon fas fa-user-cog"></i>
                    <p>
                        Quản lý phân quyền
                        <i class="fas fa-angle-left right"></i>

                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('backend.roles.index') }}" class="nav-link @if (request()->is('backend/roles')) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Chức năng người dùng</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href=" {{ route('backend.roles.create') }} " class="nav-link @if (request()->is('backend/roles/create')) active @endif ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Thêm mới chức năng</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item @if (request()->routeIs('backend.permissions.*')) menu-open @endif">
                <a href="{{ route('backend.permissions.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-cog"></i>
                    <p>
                        Vai trò
                    </p>
                </a>
            </li>
            <li class="nav-item @if (request()->routeIs('log-viewer::dashboard*')) menu-open @endif">
                <a href="{{ route('log-viewer::dashboard') }}" class="nav-link">
                    <i class="nav-icon fas fa-exclamation-circle"></i>
                        Quản lý lỗi
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
