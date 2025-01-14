<div id="left-sidebar" class="sidebar">
  <div class="sidebar-scroll">
    <div class="tab-content p-l-0 p-r-0">
      <div class="tab-pane active" id="menu">
        <nav id="left-sidebar-nav" class="sidebar-nav">
          <ul id="main-menu" class="metismenu">
            <li class="{{ Request::is(['/']) ? 'active' : '' }}">
              <a href="{{ url('/') }}"><i class="icon-home"></i> <span>Home</span></a>
            </li>
            <li class="{{ Request::is(['approval']) ? 'active' : '' }}">
              <a href="{{ url('/approval') }}"><i class="icon-check"></i> <span>Approval</span></a>
            </li>
            <li class="{{ Request::is(['settings']) ? 'active' : '' }}">
              <a href="{{ url('/settings') }}"><i class="icon-settings"></i> <span>Settings Modul</span></a>
            </li>


          </ul>

          <div style="position: fixed; bottom: 0; width: 100%; max-width: 250px; border-top: 1px solid #eee; background: white;">
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <div class="d-flex align-items-center p-2">
                <div class="flex-grow-1 min-width-0">
                  <div class="fw-bold text-dark text-truncate" style="max-width: calc(100% - 10px);">
                    <strong>{{ auth()->user()->name }}</strong>
                  </div>
                  <div class="text-truncate" style="max-width: calc(100% - 5px);">
                    <small id="sidebarbadge" class="text-muted">{{ auth()->user()->nik }}</small>
                  </div>
                </div>

                <div class="flex-shrink-0 ms-2">
                  <button type="submit" class="btn btn-link text-dark p-0">
                    <i class="icon-logout"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
</div>