<?php
$me = Helper::getMe();
?>

<div class="horizontal-menu">
    <nav class="navbar top-navbar col-lg-12 col-12 p-0">
      <div class="container">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="/">
                <img src="/assets/images/logo.svg" alt="logo" />
            </a>
            <a class="navbar-brand brand-logo-mini" href="/">
                <img src="/assets/images/logo-mini.svg" alt="logo" />
            </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          <ul class="navbar-nav mr-lg-2">
            <li class="nav-item nav-search d-none d-lg-block">
              <div class="input-group">
                <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                  <span class="input-group-text" id="search">
                    <i class="mdi mdi-magnify"></i>
                  </span>
                </div>
                <input type="text" class="form-control" id="navbar-search-input" placeholder="جستجو" aria-label="search" aria-describedby="search" />
              </div>
            </li>
          </ul>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="/assets/images/bot.png" alt="image" />
                </div>
                <div class="nav-profile-text">
                  <p class="text-black font-weight-semibold m-0"> <?php echo e(auth()->user()->name); ?> </p>
                  <span class="font-13 online-color"><?php echo e(auth()->user()->email); ?> <i class="mdi mdi-chevron-down"></i></span>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="/profile">
                  <i class="mdi mdi-account mr-2 text-success"></i> حساب کاربری </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="mdi mdi-logout mr-2 text-primary"></i> خروج </a>
                  <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                    <?php echo csrf_field(); ?>
                </form>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </div>
    </nav>

    <nav class="bottom-navbar">
      <div class="container">
        <ul class="nav page-navigation">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('admin.dashboard')); ?>">
              <i class="mdi mdi-compass-outline menu-icon"></i>
              <span class="menu-title">داشبورد</span>
            </a>
          </li>
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("view-users")): ?>
          <li class="nav-item">
            <a href="<?php echo e(route('admin.users')); ?>" class="nav-link">
              <i class="mdi mdi-account-multiple menu-icon"></i>
              <span class="menu-title">کاربران</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="submenu">
              <ul class="submenu-item">
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo e(route('admin.users')); ?>">مشاهده همه</a>
                </li>
              </ul>
            </div>
          </li>
          <?php endif; ?>
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("view-question")): ?>
          <li class="nav-item">
            <a href="<?php echo e(route('questions.index')); ?>" class="nav-link">
              <i class="mdi mdi-help menu-icon"></i>
              <span class="menu-title">سوالات</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="submenu">
              <ul class="submenu-item">
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo e(route('questions.index')); ?>">مشاهده همه</a>
                </li>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("view-category")): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('categories.index')); ?>">دسته بندی ها</a>
                </li>
                <?php endif; ?>
              </ul>
            </div>
          </li>
          <?php endif; ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('admin.personels')); ?>">
              <i class="mdi mdi-contacts menu-icon"></i>
              <span class="menu-title">پرسنل</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('admin.roles')); ?>">
              <i class="mdi mdi-google-circles-extended menu-icon"></i>
              <span class="menu-title">نقش ها</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/icons/mdi.html">
              <i class="mdi mdi-contacts menu-icon"></i>
              <span class="menu-title">Item3</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/icons/mdi.html">
              <i class="mdi mdi-contacts menu-icon"></i>
              <span class="menu-title">Item4</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/icons/mdi.html">
              <i class="mdi mdi-contacts menu-icon"></i>
              <span class="menu-title">Item5</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/icons/mdi.html">
              <i class="mdi mdi-contacts menu-icon"></i>
              <span class="menu-title">Item6</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
<?php /**PATH /var/www/telegram-bot/resources/views/layouts/menu.blade.php ENDPATH**/ ?>