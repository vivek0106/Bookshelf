
<div class="navWrapper">
    <div class="nav">
       
        <a class="navLogo">
            <i class="fa fa-bars fa-sm d-block d-sm-none" id="ham"></i>
            <span>Bookshelf.in</span>
        </a>  
        <div class="logNoti">
            <div class="login">
                <span class="fa fa-user"></span>
            </div>
           
        </div>       
        <div class="searchBar">
            <div class="search">
                <form action="../search/search.php" method="get" class="m-0">
                    <input type="text" placeholder="Search" id="search" name="searchText">
                    <button type="submit" class="p-0 m-0" style="background-color:unset;outline:none;border:0px"> <span class="fa fa-search"></span></button>
                </form>
            </div>
        </div>
        <div class="navItemWrapper">
            <div class="navItem" id="navHome">
                <a href="http://localhost/BookShelf/home/">Home</a>    
            </div>
            <div class="navItem">
                <span class="dropdown-toggle" data-toggle="dropdown">Genres</span>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="../search/search.php?genre=1">Fiction</a> <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../search/search.php?genre=2">Novel</a> <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../search/search.php?genre=3">Mythology</a> <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../search/search.php?genre=4">Biography</a> <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../search/search.php?genre=5">Chrime/Thriller/Mystery</a> <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../search/search.php?genre=6">Series</a>
                    <a class="dropdown-item" href="../search/search.php?genre=7">Self-Help</a> <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../search/search.php?genre=8">Children's Literature</a><div class="dropdown-divider"></div>
                   
                </div>
            </div>            
            <div class="navItem" id="navHome">
                <a href="#contactUsForm">Contact Us</a>
            </div>
            <div class="navItem" id="navGenre">
                <span class="fa fa-user fa-sm" data-toggle="dropdown"></span>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="http://localhost/BookShelf/myAccount/">My Profile</a>
                    <a class="dropdown-item" href="http://localhost/BookShelf/orders/">My Orders</a>
                    <a class="dropdown-item" href="http://localhost/BookShelf/wishlist/">Wishlist</a>
                    <a class="dropdown-item">
                    <?php
                        if(isset($_SESSION['bookshelfUserSessionID']) || isset($_COOKIE['bookshelfUserSessionID'])){
                            echo "<div class='logoutBtn'>Logout</div>";
                        }
                        else{
                            echo "<div class='navLoginBtn'>Login</div>";
                        }
                    ?>
                    </a>


                </div>
            </div>
            <a class="navItem pl-1" href="http://localhost/BookShelf/cart/" id="navCart">
                <span class="fa fa-shopping-cart"></span><span class="badge badge-light cartBadge">
                   0    
                </span>
             </a>
           
        </div>
    </div>
</div>
<div class="sideBarOutside">
</div>
    <div class="sideBar">
        <div class="sideBarHeader">
            <i class="fa fa-home"></i> 
            <h5> Home</h5> 
            <span id="navClose">&times;</span>
        </div>
        <div class="sideBarItems">
            <li>Genres</li>
            <li>Wishlist</li>
            <li>My Account</li>
            <li>Cart</li>
            <?php
                if(isset($_SESSION['bookshelfUserSessionID']) || $_COOKIE['bookshelfUserSessionID']){
                    echo "<li class='logoutBtn'>Logout</li>";
                }
                else{
                    echo "<li class='navLoginBtn'>Login</li>";
                }
            ?>
            <li>Notifications</li>
        </div>
    </div>
