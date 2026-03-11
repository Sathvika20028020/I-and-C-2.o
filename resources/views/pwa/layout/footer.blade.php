<div id="footer-bar" class="footer-bar-5">

    <a href="{{ url('/pwa/profile') }}"
       class="d-flex flex-column align-items-center {{ request()->is('pwa/profile') ? 'active-nav' : '' }}">
        <i data-feather="user" data-feather-line="1" data-feather-size="21"
           data-feather-color="brown-dark" data-feather-bg="brown-fade-light"></i>
        <span>Profile</span>
    </a>

    <a href="{{ url('/pwa/dashboard') }}"
       class="d-flex flex-column align-items-center {{ request()->is('pwa/dashboard') ? 'active-nav' : '' }}">
        <i data-feather="file" data-feather-line="1" data-feather-size="21"
           data-feather-color="brown-dark" data-feather-bg="brown-fade-light"></i>
        <span>Home</span>
    </a>

    <a href="{{ url('/pwa/leaves') }}"
       class="d-flex flex-column align-items-center {{ request()->is('pwa/leaves') ? 'active-nav' : '' }}">
        <i data-feather="twitter" data-feather-line="1" data-feather-size="21"
           data-feather-color="dark-dark" data-feather-bg="red-fade-light"></i>
        <span>Leave</span>
    </a>

    @if(auth()->user()->employee?->role == 1)
    <a href="{{ url('pwa/leave-request') }}"
       class="d-flex flex-column align-items-center {{ request()->is('pwa/leave-request') ? 'active-nav' : '' }}"
       style="position:relative;">
        <i data-feather="twitter" data-feather-line="1" data-feather-size="21"
           data-feather-color="dark-dark" data-feather-bg="red-fade-light"></i>
        <span>Pending Leave Approvals</span>
        @if($leaveCount)
            <span class="badge bg-danger" style="position:absolute;top:0;left:50%;transform: translateX(-50%);">
                {{ $leaveCount }}
            </span>
        @endif
    </a>
    @endif

    @if(auth()->user()->employee?->asset_access == 1)
    <a href="{{ url('/pwa/category') }}"
       class="d-flex flex-column align-items-center {{ request()->is('pwa/category') ? 'active-nav' : '' }}">
        <i data-feather="settings" data-feather-line="1" data-feather-size="21"
           data-feather-color="dark-dark" data-feather-bg="gray-fade-light"></i>
        <span>Assets</span>
    </a>
    @endif

</div>