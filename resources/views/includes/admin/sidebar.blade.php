<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">ADMIN PANEL</li>
        <li class="nav-item">
            <a href="{{ route('admin.orders.index') }}" class="nav-link">
                <i class="nav-icon fas fa-solid fa-box"></i>
                <p>
                    Заказы
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.customers.index') }}" class="nav-link">
                <i class="nav-icon fas fa-duotone fa-users"></i>
                <p>
                    Заказчики
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.couriers.index') }}" class="nav-link">
                <i class="nav-icon fas fa-person"></i>
                <p>
                    Курьеры
                </p>
            </a>
        </li>
    </ul>
</nav>
