<div class="left-side-menu">

            <div class="slimscroll-menu">

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <ul class="metismenu" id="side-menu">

                        <li class="menu-title">Navigation</li>

                        <li class="<?= strpos($data['current_page'], "/tosed-farms/admin/") === 0? "mm-active" : "" ?>">
                            <a href="<?= BASE_URL ?>/admin/" class="waves-effect waves-light <?= $data['current_page'] === "/tosed-farms/admin/"? "active" : "" ?>">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span> Home </span>
                            </a>
                        </li>

                        <li class="<?= strpos($data['current_page'], "/tosed-farms/admin/brand") === 0?  "mm-active" : "" ?>">
                            <a href="javascript: void(0);" class="waves-effect waves-light <?= strpos($data['current_page'], "/tosed-farms/admin/brand") === 0? "active" : "" ?>">
                                <i class="mdi mdi-diamond-stone"></i>
                                <span> Brands </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li class="<?= $data['current_page'] === "/tosed-farms/admin/brands/"? "mm-active" : "" ?>">
                                    <a class="<?= $data['current_page'] === "/tosed-farms/admin/brands/"? "active" : "" ?>" href="<?= BASE_URL ?>/admin/brands/">View all</a>
                                </li>
                                <li class="<?= $data['current_page'] === "/tosed-farms/admin/brand/new"? "mm-active" : "" ?>">
                                    <a class="<?= $data['current_page'] === "/tosed-farms/admin/brand/new"? "active" : "" ?>" href="<?= BASE_URL ?>/admin/brand/new">Add New</a>
                                </li>
                            </ul>
                        </li>

                        <li class="<?= strpos($data['current_page'], "/tosed-farms/admin/products/") === 0? "mm-active" : "" ?>">
                            <a href="javascript: void(0);" class="waves-effect waves-light <?= strpos($data['current_page'], "/tosed-farms/admin/products/") === 0? "active" : "" ?>">
                                <i class="mdi mdi-shopping"></i>
                                <span> Products </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li class="menu-title mt-2">Branded</li>
                                <li class="<?= $data['current_page'] === "/tosed-farms/admin/products/branded/poultry-feeds"? "mm-active" : "" ?>">
                                    <a class="<?= $data['current_page'] === "/tosed-farms/admin/products/branded/poultry-feeds"? "active" : "" ?>" href="<?= BASE_URL ?>/admin/products/branded/poultry-feeds">Poultry Feeds</a>
                                </li>
                                <li class="<?= $data['current_page'] === "/tosed-farms/admin/products/branded/fish-feeds"? "mm-active" : "" ?>">
                                    <a class="<?= $data['current_page'] === "/tosed-farms/admin/products/branded/fish-feeds"? "active" : "" ?>" href="<?= BASE_URL ?>/admin/products/branded/fish-feeds">Fish Feeds</a>
                                </li>
                                <li class="<?= $data['current_page'] === "/tosed-farms/admin/products/branded/veterinary-products"? "mm-active" : "" ?>">
                                    <a class="<?= $data['current_page'] === "/tosed-farms/admin/products/branded/veterinary-products"? "active" : "" ?>" href="<?= BASE_URL ?>/admin/products/branded/veterinary-products">Veterinary Drugs</a>
                                </li>
                                <li class="menu-title mt-2">Unbranded</li>
                                <li><a href="feed-ingredients-collection.html">Feed Ingredients</a></li>
                                <li><a href="feed-additives-collection.html">Feed Additives</a></li>
                                <li><a href="miscellaneous-collection.html">Miscellaneous</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="waves-effect waves-light">
                                <i class="mdi mdi-comment-text-outline"></i>
                                <span>  Blog  </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="blogs-blog-list.html">Blog List</a></li>
                                <li><a href="blogs-blog-post.html">Blog Post</a></li>
                                <li><a href="blogs-blog-add.html">Add Blog</a></li>
                            </ul>
                        </li>
                    </ul>

                </div>
                <!-- End Sidebar -->

                <div class="clearfix"></div>

                <!-- <div class="help-box">
                    <h5 class="text-muted mt-0">For Help ?</h5>
                    <p class=""><span class="text-info">Email:</span>
                        <br/> support@support.com</p>
                    <p class="mb-0"><span class="text-info">Call:</span>
                        <br/> (+123) 123 456 789</p>
                </div> -->

            </div>
            <!-- Sidebar -left -->
    
        </div>