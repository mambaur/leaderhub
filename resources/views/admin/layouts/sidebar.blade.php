<!-- partial -->
<!-- partial:partials/_sidebar.html -->
{{-- https://mdisearch.com/ --}}
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item @if (@$menu == 'dashboard') active @endif">
            <a class="nav-link" href="/">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item nav-category">Main</li>
        <li class="nav-item @if (@$menu == 'products') active @endif">
            <a class="nav-link" data-bs-toggle="collapse" href="#products" aria-expanded="false"
                aria-controls="products">
                <i class="menu-icon mdi mdi-archive"></i>
                <span class="menu-title">Products</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse @if (@$menu == 'products') show @endif" id="products">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link @if (@$submenu == 'product-create') active @endif"
                            href="pages/ui-features/buttons.html">Add
                            Product</a></li>
                    <li class="nav-item"> <a class="nav-link @if (@$submenu == 'product-list') active @endif"
                            href="{{ route('product_list') }}">List Products</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item @if (@$menu == 'categories') active @endif">
            <a class="nav-link" data-bs-toggle="collapse" href="#product-categories" aria-expanded="false"
                aria-controls="product-categories">
                <i class="menu-icon mdi mdi-shape-outline"></i>
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse @if (@$menu == 'categories') show @endif" id="product-categories">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link @if (@$submenu == 'product-category-create') active @endif"
                            href="{{ route('product_category_create') }}">Add Category</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link @if (@$submenu == 'product-category-list') active @endif"
                            href="{{ route('product_category_list') }}">List
                            Categories</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">Account</li>
        <li class="nav-item @if (@$menu == 'user-managements') active @endif">
            <a class="nav-link" data-bs-toggle="collapse" href="#user-managements" aria-expanded="false"
                aria-controls="user-managements">
                <i class="menu-icon mdi mdi-account-multiple-outline"></i>
                <span class="menu-title">User Management</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse @if (@$menu == 'user-managements') show @endif" id="user-managements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link @if (@$submenu == 'user-management-create') active @endif"
                            href="{{ route('user_management_create') }}">Add
                            User</a></li>
                    <li class="nav-item"> <a class="nav-link @if (@$submenu == 'user-management-list') active @endif"
                            href="{{ route('user_management_list') }}">List Users</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item @if (@$menu == 'roles') active @endif">
            <a class="nav-link" data-bs-toggle="collapse" href="#roles" aria-expanded="false" aria-controls="roles">
                <i class="menu-icon mdi mdi-account-key-outline"></i>
                <span class="menu-title">Roles</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse @if (@$menu == 'roles') show @endif" id="roles">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link @if (@$submenu == 'role-create') active @endif"
                            href="pages/ui-features/buttons.html">Add
                            Role</a></li>
                    <li class="nav-item"> <a class="nav-link @if (@$submenu == 'role-list') active @endif"
                            href="/roles">List Roles</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item @if (@$menu == 'profile') active @endif"">
            <a class="nav-link" href="http://bootstrapdash.com/demo/star-admin2-free/docs/documentation.html">
                <i class="menu-icon mdi mdi-account-circle-outline"></i>
                <span class="menu-title">Profile</span>
            </a>
        </li>
        <li class="nav-item nav-category">UI Elements</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">UI Elements</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">Forms and Datas</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false"
                aria-controls="form-elements">
                <i class="menu-icon mdi mdi-card-text-outline"></i>
                <span class="menu-title">Form elements</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic
                            Elements</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false"
                aria-controls="charts">
                <i class="menu-icon mdi mdi-chart-line"></i>
                <span class="menu-title">Charts</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false"
                aria-controls="tables">
                <i class="menu-icon mdi mdi-table"></i>
                <span class="menu-title">Tables</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic
                            table</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false"
                aria-controls="icons">
                <i class="menu-icon mdi mdi-layers-outline"></i>
                <span class="menu-title">Icons</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">pages</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false"
                aria-controls="auth">
                <i class="menu-icon mdi mdi-account-circle-outline"></i>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">help</li>
        <li class="nav-item">
            <a class="nav-link" href="http://bootstrapdash.com/demo/star-admin2-free/docs/documentation.html">
                <i class="menu-icon mdi mdi-file-document"></i>
                <span class="menu-title">Documentation</span>
            </a>
        </li>
    </ul>
</nav>
