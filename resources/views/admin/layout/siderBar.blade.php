<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <div>
            <p class="app-sidebar__user-name"><b></b></p>
            <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
        </div>
    </div>
    <hr>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item" href="{{route('admin.country')}}">
                <i class="app-menu__icon fa-solid fa-list"></i>
                <span class="app-menu__label">Manage Country</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item " href="{{route('admin.account')}}">
                <i class="app-menu__icon fa-solid fa-users"></i>
                <span class="app-menu__label">Manage Person</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="{{route('admin.user')}}">
                <i class="app-menu__icon fa-solid fa-shop"></i>
                <span class="app-menu__label">Manage User</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="{{route('admin.role')}}">
                <i class="app-menu__icon fa-solid fa-cart-arrow-down"></i>
                <span class="app-menu__label">Manage Role</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="{{route('admin.company')}}">
                <i class="app-menu__icon fa-solid fa-shop"></i>
                <span class="app-menu__label">Manage Company</span>
            </a>
        </li>
    </ul>
</aside>
<!-- end sidebar -->
