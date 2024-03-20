<header>
    <!--NAVIGATION-->
    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-lg align-items-center">
                <a class="navbar-brand" href="index.html">
                    <div class="logo-brand">
                        <img src="<?= BASE_URL ?>/img/master/new-logo-white.png" alt="">
                    </div>
                </a>
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar top-bar"></span>
                    <span class="icon-bar middle-bar"></span>
                    <span class="icon-bar bottom-bar"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown has-megamenu">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Brands<span class="caret-drop"></span> </a>
                            <div class="dropdown-menu megamenu">
                                <div class="megamenu-container">
                                    <div class="row py-4 px-4">
                                        <div class="col-sm-6 col-lg-4 col-12 mb-2 px-0 px-md-2">
                                            <div class="col-megamenu">
                                                <h6 class="title">Poultry Feeds</h6>
                                                <ul class="dropdown-menu">
                                                    <?php
                                                        $poultry_feed_brands = $data['poultry_feed_brands'];

                                                        $counter = 0;
                                                        foreach ($poultry_feed_brands as $key => $brand) {
                                                            if($counter < 6){  
                                                    ?>
                                                        <li><a href="<?= BASE_URL . "/brand/" . convertToSlug($brand['name']) ?>"><img src="<?= BASE_URL . "/brand-images/" . $brand['image_url'] ?>"> <?= $brand['name'] ?> </a></li>
                                                        <li class="divider"></li>
                                                        <?php
                                                                $counter++;
                                                            }else{
                                                        ?>
                                                        <li><a href="<?= BASE_URL . "/brand/" . convertToSlug($brand['name']) ?>"><img src="<?= BASE_URL . "/brand-images/" . $brand['image_url'] ?>"> <?= $brand['name'] ?> </a></li>
                                                    <?php
                                                            break;
                                                            }
                                                        }
                                                    ?>
                                                </ul>
                                                <?php
                                                if(count($poultry_feed_brands) > 6){
                                                ?>
                                                    <div class="btn-more-box mt-2">
                                                        <a class="btn-hover-corner py-1 px-4" href="<?= BASE_URL ?>/brands/poultry-feeds">
                                                            View All
                                                        </a>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </div> <!-- col-megamenu.// -->
                                        </div>
                                        <!-- end col-3 -->
                                        <div class="col-sm-6 col-lg-4 col-12 mb-2 px-0 px-md-2">
                                            <div class="col-megamenu">
                                                <h6 class="title">Fish Feeds</h6>
                                                <ul class="dropdown-menu">
                                                    <?php
                                                        $fish_feed_brands = $data['fish_feed_brands'];

                                                        $counter = 0;
                                                        foreach ($fish_feed_brands as $key => $brand) {
                                                            if($counter < 6){  
                                                    ?>
                                                        <li><a href="<?= BASE_URL . "/brand/" . convertToSlug($brand['name']) ?>"><img src="<?= BASE_URL . "/brand-images/" . $brand['image_url'] ?>"> <?= $brand['name'] ?> </a></li>
                                                        <li class="divider"></li>
                                                        <?php
                                                                $counter++;
                                                            }else{
                                                        ?>
                                                        <li><a href="<?= BASE_URL . "/brand/" . convertToSlug($brand['name']) ?>"><img src="<?= BASE_URL . "/brand-images/" . $brand['image_url'] ?>"> <?= $brand['name'] ?> </a></li>
                                                    <?php
                                                            break;
                                                            }
                                                        }
                                                    ?>
                                                </ul>
                                                <?php
                                                if(count($fish_feed_brands) > 6){
                                                ?>
                                                    <div class="btn-more-box mt-2">
                                                        <a class="btn-hover-corner py-1 px-4" href="<?= BASE_URL ?>/brands/fish-feeds">
                                                            View All
                                                        </a>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </div> <!-- col-megamenu.// -->
                                        </div>
                                        <!-- end col-3 -->
                                        <div class="col-sm-6 col-lg-4 col-12 mb-2 px-0 px-md-2">
                                            <div class="col-megamenu">
                                                <h6 class="title">Vertinary Products</h6>
                                                <ul class="dropdown-menu">
                                                    <?php
                                                        $drug_brands = $data['drug_brands'];

                                                        $counter = 0;
                                                        foreach ($drug_brands as $key => $brand) {
                                                            if($counter < 6){  
                                                    ?>
                                                        <li><a href="<?= BASE_URL . "/brand/" . convertToSlug($brand['name']) ?>"><img src="<?= BASE_URL . "/brand-images/" . $brand['image_url'] ?>"> <?= $brand['name'] ?> </a></li>
                                                        <li class="divider"></li>
                                                        <?php
                                                                $counter++;
                                                            }else{
                                                        ?>
                                                        <li><a href="<?= BASE_URL . "/brand/" . convertToSlug($brand['name']) ?>"><img src="<?= BASE_URL . "/brand-images/" . $brand['image_url'] ?>"> <?= $brand['name'] ?> </a></li>
                                                    <?php
                                                            break;
                                                            }
                                                        }
                                                    ?>
                                                </ul>
                                            </div> <!-- col-megamenu.// -->
                                            <?php
                                                if(count($drug_brands) > 6){
                                                ?>
                                                    <div class="btn-more-box mt-2">
                                                        <a class="btn-hover-corner py-1 px-4" href="<?= BASE_URL ?>/brands/veterinary-products">
                                                            View All
                                                        </a>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                        </div>
                                        <!-- end col-3 -->
                                    </div>
                                    <a class="absolute-btn" href="<?= BASE_URL ?>/brands">
                                        Explore all brands
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown">Category<span class="caret-drop"></span></a>
                            <ul class="dropdown-menu">
                                <li class="divider-top"></li>
                                <li><a class="dropdown-item" href="<?= BASE_URL ?>/category/poultry-feeds">Poultry Feeds</a></li>
                                <li class="divider"></li>
                                <li><a class="dropdown-item" href="<?= BASE_URL ?>/category/fish-feeds">Fish Feeds</a></li>
                                <li class="divider"></li>
                                <li><a class="dropdown-item" href="<?= BASE_URL ?>/category/veterinary-products">Veterinary Products</a></li>
                                <li class="divider"></li>
                                <li><a class="dropdown-item" href="<?= BASE_URL ?>/category/feed-ingredients">Feed Ingredients</a></li>
                                <li class="divider"></li>
                                <li><a class="dropdown-item" href="<?= BASE_URL ?>/category/feed-additives">Feed Additives</a></li>
                                <li class="divider"></li>
                                <li><a class="dropdown-item" href="<?= BASE_URL ?>/category/miscellaneous">Miscellaneous</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= BASE_URL ?>/posts">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= BASE_URL ?>/about">About Us</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="<?= BASE_URL ?>/contact">
                                Contact Us
                            </a>
                        </li>
                        <li class="nav-item">
                            <span class="nav-link">
                                <div class="btn-more-box mt-0">
                                    <a class="btn-hover-corner py-2 px-2" href="<?= BASE_URL ?>/cart-to-invoice/cart">
                                        Cart To Invoice
                                    </a>
                                </div>
                            </span>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!--NAVIGATION END-->
</header>