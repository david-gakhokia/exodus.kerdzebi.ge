        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="menu"></i></a></li>
            <li>
              {{-- <form class="form-inline mr-auto">
                <div class="search-element">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                  <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form> --}}
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
            <li>
              <a href="{{ url('/') }}"  target="_blank" class="nav-link nav-link-lg">
                <i data-feather="globe"></i>
                </a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}" class="nav-link nav-link-lg">
                    @csrf
                      <a href="{{ route('logout') }}" class="has-icon text-danger"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="fas fa-sign-out-alt"> </i> გასვლა
                      </a>
                  </form>
            </li>
{{--
            <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image"
                src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"
                  class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
              <div class="dropdown-menu dropdown-menu-right pullDown">
                <a href="#" class="dropdown-item has-icon">
                  <i class="far fa-user"></i> პროფილი
                </a>
                <div class="dropdown-divider"></div>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                    <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger"
                      onclick="event.preventDefault(); this.closest('form').submit();">
                      <i class="fas fa-sign-out-alt"></i>
                    გასვლა
                    </a>
                </form>
              </div>
            </li> --}}
        </ul>
