<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">

    <li class="nav-item nav-profile">
      <div class="nav-link">

        <div class="user-wrapper">
          <div class="profile-image">
            <img src="assets/images/faces-clipart/pic-4.png" alt="profile image">
          </div>
          <div class="text-wrapper">
            <p class="profile-name">{{ $name }}</p>
            <div>
              <small class="designation text-muted">{{ $position }}</small>
              <span class="status-indicator online"></span>
            </div>
          </div>
        </div>

        <a class="btn btn-success btn-block" href="">Новый датчик</a>
        <a class="btn btn-danger btn-block" href="">Новая зона</a>

      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="/home">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Панель управления</span>
      </a>
    </li>


    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="menu-icon mdi mdi-content-copy"></i>
        <span class="menu-title">Зоны</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">

          <li class="nav-item">
            <a class="nav-link" href="/zone/id">Зона 1</a>
          </li>

        </ul>
      </div>
    </li>


    <li class="nav-item">
      <a class="nav-link" href="/">
        <i class="menu-icon mdi mdi-settings"></i>
        <span class="menu-title">Настройка</span>
      </a>
    </li>

  </ul>
</nav>
