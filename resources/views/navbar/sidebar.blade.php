 <!--========== HEADER ==========-->
 <header class="header">
            <div class="header__container">
                <img src="{{ asset('assets/main/img/logo_ministere.svg')}}" alt="" class="header__img">

                <a href="#" class="header__logo">Bedimcode</a>
    
                <div class="header__search">
                    <input type="search" placeholder="Search" class="header__input">
                    <i class='bx bx-search header__icon'></i>
                </div>
    
                <div class="header__toggle">
                    <i class='bx bx-menu' id="header-toggle"></i>
                </div>
            </div>
        </header>

        <!--========== NAV ==========-->
        <div class="nav" id="navbar">
            <nav class="nav__container">
                <div>
                    <a href="#" class="nav__link nav__logo">
                        <!-- <i class='bx bxs-disc nav__icon' ></i> -->
                        <i ><img src="{{ asset('assets/main/img/logo_ministere.svg')}}" alt="" ></i>
                        <span class="nav__logo-name"></span>
                    </a>
    
                    <div class="nav__list">
                        <div class="nav__items">
                            <h3 class="nav__subtitle">Menu</h3>
    
                            <a href="{{route('app_dashboard')}}" class="nav__link active">
                                <i class='bx bxs-dashboard nav__icon'></i>
                                <span class="nav__name">Dashboard</span>
                            </a>
                            
                            <div class="nav__dropdown">
                                <a href="#" class="nav__link">
                                    <i class='bx bxs-directions nav__icon'></i>
                                    <span class="nav__name">Directions</span>
                                    <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                </a>

                                <div class="nav__dropdown-collapse">
                                    <div class="nav__dropdown-content">
                                       
                                            <a >hvj
                                            </a>
                                        
                                        
                                        <div class="nav__dropdown-collapse">
                                    <div class="nav__dropdown-content">
                                       
                                            <a>jhvghg
                                            </a>
                                        
                                        
                                    </div>
                                </div>
                                    </div>
                                </div>
                            </div>

                            <a href="#" class="nav__link">
                                <i class='bx bx-message-rounded nav__icon' ></i>
                                <span class="nav__name">Messages</span>
                            </a>
                        </div>
    
                        <div class="nav__items">
                            <h3 class="nav__subtitle">Menu</h3>
    
                            <div class="nav__dropdown">
                                <a href="#" class="nav__link">
                                    <i class='bx bx-bell nav__icon' ></i>
                                    <span class="nav__name">Notifications</span>
                                    <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                </a>

                                <div class="nav__dropdown-collapse">
                                    <div class="nav__dropdown-content">
                                        <a href="#" class="nav__dropdown-item">Blocked</a>
                                        <a href="#" class="nav__dropdown-item">Silenced</a>
                                        <a href="#" class="nav__dropdown-item">Publish</a>
                                        <a href="#" class="nav__dropdown-item">Program</a>
                                    </div>
                                </div>

                            </div>

                            <a href="#" class="nav__link">
                                <i class='bx bx-compass nav__icon' ></i>
                                <span class="nav__name">Explore</span>
                            </a>
                            <a href="#" class="nav__link">
                                <i class='bx bx-bookmark nav__icon' ></i>
                                <span class="nav__name">Saved</span>
                            </a>
                        </div>
                    </div>
                </div>

                <a href="#" class="nav__link nav__logout">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Log Out</span>
                </a>
            </nav>
        </div>