<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        @if (Auth::user()->role === 'admin')
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? '' : 'collapsed' }}" href="{{ route('dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
        @endif

        @if (Auth::user()->role === 'admin')
            <li class="nav-item">
                <a class="nav-link {{ Request::is('notices') ? '' : 'collapsed' }}" href="{{ route('notices.index') }}">
                    <i class="bi bi-layout-text-window-reverse"></i>
                    <span>Notice</span>
                </a>
            </li>
        @endif

        @if (Auth::user()->role === 'admin')
            <li class="nav-item">
                <a class="nav-link {{ Request::is('students') ? '' : 'collapsed' }}"
                    href="{{ route('students.index') }}">
                    <i class="bi bi-layout-text-window-reverse"></i>
                    <span>Student</span>
                </a>
            </li>
        @endif

        @if (Auth::user()->role === 'student')
            <li class="nav-item">
                <a class="nav-link {{ Request::is('student-dashboard') ? '' : 'collapsed' }}"
                    href="{{ route('student.dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
        @endif

        <li class="nav-heading">Academic Management</li>

        @if (Auth::user()->role === 'admin')
            <li class="nav-item">
                <a class="nav-link {{ Request::is('academic-roles') ? '' : 'collapsed' }}"
                    href="{{ route('academic-roles.index') }}">
                    <i class="bi bi-layout-text-window-reverse"></i>
                    <span>Academic Roles</span>
                </a>
            </li>
        @endif

        @if (Auth::user()->role === 'admin')
            <li class="nav-item">
                <a class="nav-link {{ Request::is('contacts') ? '' : 'collapsed' }}"
                    href="{{ route('contacts.index') }}">
                    <i class="bi bi-card-list"></i>
                    <span>Contacts</span>
                </a>
            </li>
        @endif

        <li class="nav-item">
            <a class="nav-link {{ Request::is('research-projects') ? '' : 'collapsed' }}"
                href="{{ route('research-projects.index') }}">
                <i class="bi bi-gem"></i>
                <span>Research Projects</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('meeting-logs') ? '' : 'collapsed' }}"
                href="{{ route('meeting-logs.index') }}">
                <i class="bi bi-menu-button-wide"></i>
                <span>Meeting Logs</span>
            </a>
        </li>

        @if (Auth::user()->role === 'admin')
            <li class="nav-item">
                <a class="nav-link {{ Request::is('documents') ? '' : 'collapsed' }}"
                    href="{{ route('documents.index') }}">
                    <i class="bi bi-layout-text-window-reverse"></i>
                    <span>Documents</span>
                </a>
            </li>
        @endif

        <li class="nav-heading">Calender Event Management</li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('calendar-events') ? '' : 'collapsed' }}"
                href="{{ route('calendar-events.index') }}">
                <i class="bi bi-table"></i>
                <span>Calendar Events</span>
            </a>
        </li>

        <li class="nav-heading">Task Management</li>

        @if (Auth::user()->role === 'admin')
            <li class="nav-item">
                <a class="nav-link {{ Request::is('task-categories') ? '' : 'collapsed' }}"
                    href="{{ route('task-categories.index') }}">
                    <i class="bi bi-gem"></i>
                    <span>Task Categories</span>
                </a>
            </li>
        @endif

        <li class="nav-item">
            <a class="nav-link {{ Request::is('tasks') ? '' : 'collapsed' }}" href="{{ route('tasks.index') }}">
                <i class="bi bi-menu-button-wide"></i>
                <span>Tasks</span>
            </a>
        </li>

        <li class="nav-heading">Financial Management</li>

        @if (Auth::user()->role === 'admin')
            <li class="nav-item">
                <a class="nav-link {{ Request::is('financial-categories') ? '' : 'collapsed' }}"
                    href="{{ route('financial-categories.index') }}">
                    <i class="bi bi-gem"></i>
                    <span>Financial Categories</span>
                </a>
            </li>
        @endif

        <li class="nav-item">
            <a class="nav-link {{ Request::is('financial-trackers') ? '' : 'collapsed' }}"
                href="{{ route('financial-trackers.index') }}">
                <i class="bi bi-menu-button-wide"></i>
                <span>Financial Trackers</span>
            </a>
        </li>

        <li class="nav-heading">Performances Management</li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('performances') ? '' : 'collapsed' }}"
                href="{{ route('performances.index') }}">
                <i class="bi bi-card-list"></i>
                <span>Performances</span>
            </a>
        </li>

        <li class="nav-heading">Notes Management</li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('custom-notes') ? '' : 'collapsed' }}"
                href="{{ route('custom-notes.index') }}">
                <i class="bi bi-layout-text-window-reverse"></i>
                <span>Custom Notes</span>
            </a>
        </li>

        @if (Auth::user()->role === 'admin')
            <li class="nav-heading">User Management</li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('users') ? '' : 'collapsed' }}" href="{{ route('users.index') }}">
                    <i class="bi bi-person"></i>
                    <span>Users</span>
                </a>
            </li>
        @endif

        @if (Auth::user()->role === 'admin')
            <li class="nav-heading">Profile</li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('profile') ? '' : 'collapsed' }}" href="{{ route('profile') }}">
                    <i class="bi bi-person"></i>
                    <span>Profile</span>
                </a>
            </li>
        @endif
    </ul>
</aside>
