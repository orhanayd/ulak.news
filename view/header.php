<div class="header-wrapper">

    <!--sidebar menu toggler start -->
    <div class="toggle-sidebar material-button">
        <i class="material-icons">&#xE5D2;</i>
    </div>
    <!--sidebar menu toggler end -->

    <!--logo start -->
    <div class="logo-box">
        <a href="./index.php"><img alt="Ulak News | Son dakika haberler" style="width: 145px;" src="./img/logo/logo_l.png" /></a>
    </div>
    <!--logo end -->

        <!-- header left menu start -->
            <?php include("./view/header-menu.php"); ?>
        <!-- header left menu end -->

    <div class="header-right with-seperator">

        <!-- header right menu start -->
        <ul class="header-navigation">
            <li>
                <a href="#" class="material-button search-toggle"><i class="material-icons">&#xE8B6;</i></a>
            </li>
            <!-- <li>
                <a href="#" class="material-button submenu-toggle"><i class="material-icons">&#xE7FD;</i> <span class="hide-on-tablet">Account</span></a>
                <div class="header-submenu">
                    <ul>
                        <li><a href="#" data-modal="loginModal">Login</a></li>
                        <li><a href="#" data-modal="registerModal">Register</a></li>
                    </ul>
                </div>
            </li>
            <li class="hide-on-mobile"><a href="#" class="material-button" data-modal="newsletterModal"><i class="material-icons">&#xE0E1;</i></a></li> -->
        </ul>
        <!-- header right menu end -->

    </div>

    <!--header search panel start -->
    <?php
    if(!isset($search_status)){
    ?>
        <div class="search-bar">
            <form action="arama.html" onsubmit="return validate('q', 3)" class="search-form">
                <div class="search-input-wrapper">
                    <input autocomplete="off" type="text" id="q" name="q" placeholder="Ulak hemen bulsun!" class="search-input">
                    <input type="submit" class="search-submit" value='Ara' />
                </div>
                <span class="search-close search-toggle">
                    <i class="material-icons">&#xE5CD;</i>
                </span>
            </form>
        </div>
    <?php
    }
    ?>
    <!--header search panel end -->

</div>
<script>
    function validate(input,length) {
        submit = true;
        var elemlength = document.getElementById(input).value.length;
        if(elemlength < length){
            submit=false;
            alert("Lütfen en az 3 harflik kelime girin");
        }
        
        return submit;
    }
</script>