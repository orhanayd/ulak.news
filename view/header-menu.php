<div class="header-menu">
        <ul class="header-navigation" data-show-menu-on-mobile>
            <?php
                foreach($agencies as $key=>$agency){
            ?>
                <li>
                    <a title="<?php echo $agency['title']; ?>" href="/<?php echo $agency['seo_link']; ?>" class="material-button submenu-toggle"><?php echo $agency['title']; ?></a>
                
                </li>
            <?php
                if($key===7){
                    break;
                }
                }
                unset($agency);
                unset($key);
            ?>
            <li>
                <a href="#" class="material-button submenu-toggle">Kategoriler <i class="material-icons">&#xE313;</i></a>
                <div class="header-submenu">
                    <ul>
                        <?php
                            foreach($all_cats as $key=>$cat){
                        ?>
                            <li><a title="<?php echo $cat['cat']; ?>" href="/<?php echo $cat['seo_link']; ?>"><?php echo $cat['cat']; ?> (<?php echo $cat['total']; ?>)</a></li>
                        <?php
                            if($key===6){
                                break;
                            }
                            }
                            unset($cat);
                        ?>
                        <li><a href="/kategori.html">Tüm kategoriler</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="/istatistik.html" class="material-button">Analiz <i class="material-icons insert_chart">&#xe24b;</i></a></li>
        </ul>
</div>

<div class="header-menu-mobile">
        <ul class="header-navigation">
            <li>
                <a href="#" class="material-button submenu-toggle">Ajanslar <i class="material-icons">&#xE313;</i></a>
                <div class="header-submenu">
                    <ul>
                    <?php
                        foreach($agencies as $agency){
                    ?>
                        <li>
                            <a title="<?php echo $agency['title']; ?>" href="/<?php echo $agency['seo_link']; ?>" class="material-button submenu-toggle"><?php echo $agency['title']; ?></a>
                        </li>
                    <?php
                        }
                        unset($agency)
                    ?>
                    </ul>
                </div>
            </li>
            <li>
                <a href="#" class="material-button submenu-toggle">Kategoriler <i class="material-icons">&#xE313;</i></a>
                <div class="header-submenu">
                    <ul>
                        <?php
                            foreach($all_cats as $key=>$cat){
                        ?>
                            <li><a title="<?php echo $cat['cat']; ?>" href="/<?php echo $cat['seo_link']; ?>"><?php echo $cat['cat']; ?> (<?php echo $cat['total']; ?>)</a></li>
                        <?php
                            if($key===6){
                                break;
                            }
                            }
                            unset($cat);
                        ?>
                        <li><a href="/kategori.html">Tüm kategoriler</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="/istatistik.html" class="material-button">Analiz <i class="material-icons insert_chart">&#xe24b;</i></a></li>
        </ul>
</div>
