<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  @include('partials._logo', [])
  <div class="navbar-menu-wrapper d-flex align-items-center">
    <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">

      <li class="nav-item">
        <a href="/reports" class="nav-link">
          <i class="menu-icon mdi mdi-chart-line"></i>
          Отчеты <span class="badge badge-primary ml-1">Новый</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/tables">
          <i class="menu-icon mdi mdi-table"></i>
          <span class="menu-title">Таблицы</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/docs">
          <i class="menu-icon mdi mdi-file"></i>
          <span class="menu-title">Документация</span>
        </a>
      </li>

    </ul>
  </div>
</nav>
