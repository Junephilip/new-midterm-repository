
<li class="nav-item">
    <a href="{{ route('healthTrackers.index') }}"
       class="nav-link {{ Request::is('healthTrackers*') ? 'active' : '' }}">
        <p>Health Trackers</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('logs.index') }}"
       class="nav-link {{ Request::is('logs*') ? 'active' : '' }}">
        <p>Logs</p>
    </a>
</li>


