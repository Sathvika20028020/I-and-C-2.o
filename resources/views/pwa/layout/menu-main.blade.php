<div class="menu-header">
    <a href="#" class="close-menu border-right-0"><i class="fa font-12 color-red-dark fa-times"></i></a>
</div>

<div class="menu-items mb-4">
    <h5 class="text-uppercase  font-12 pl-3">Menu</h5>
    
    <a id="nav-pages" href="#" onclick="document.getElementById('logout').submit();">
        <i class="bi bi-power"></i>
        <span>Logout</span>
    </a>
    <a href="#" class="close-menu">
        <i data-feather="x" data-feather-line="3" data-feather-size="16" data-feather-color="red-dark" data-feather-bg="red-fade-dark"></i>
        <span>Close</span>
    </a>
</div>
<form id="logout" action="{{ route('pwa.logout') }}" method="post">@csrf</form>

