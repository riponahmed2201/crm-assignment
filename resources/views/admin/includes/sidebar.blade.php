<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? '' : 'collapsed' }}" href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-heading">Academic Management</li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('academic-roles') ? '' : 'collapsed' }}"
                href="{{ route('academic-roles.index') }}">
                <i class="bi bi-person"></i>
                <span>Academic Roles</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('contacts') ? '' : 'collapsed' }}" href="{{ route('contacts.index') }}">
                <i class="bi bi-person"></i>
                <span>Contacts</span>
            </a>
        </li>

        <li class="nav-heading">User Management</li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('users') ? '' : 'collapsed' }}" href="{{ route('users.index') }}">
                <i class="bi bi-person"></i>
                <span>Users</span>
            </a>
        </li>

        <li class="nav-heading">Profile</li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('profile') ? '' : 'collapsed' }}" href="{{ route('profile') }}">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li>
    </ul>
</aside>
