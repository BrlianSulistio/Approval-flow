<nav class="navbar navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-btn">
      <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
    </div>

    <div class="navbar-brand p-2" style="width: 200px;">
      <a href="{{ url('/') }}" class="text-dark">Approval APP</a>
    </div>

    <div class="navbar-right">
      <div id="navbar-menu">
        <ul class="nav navbar-nav text-dark px-2">
          <li class="nav-item">{{ auth()->user()->role }}</li>
        </ul>
      </div>
    </div>
  </div>
</nav>