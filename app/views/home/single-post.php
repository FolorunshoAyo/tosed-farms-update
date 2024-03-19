<!DOCTYPE html>
<html lang="en-US" class="no-js">
	
<head>
  <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
      
  <!-- ==============================================
  TITLE AND META TAGS
  =============================================== -->
  <title>Blog Post - <?= $data['post']['title'] ?> | Tosed Farms</title>
  <meta name="keywords" content="livestock feeds, livestock drugs, poultry farming, livestock industry, poultry industry, animal health, animal nutrition, agriculture, farming, livestock products, poultry products, livestock brands, poultry brands, livestock feed brands, livestock drug brands">
  <meta name="author" content="Aycodes">
  <meta name="description" content="Discover high-quality livestock feeds and drugs from leading brands. Partner with us for innovative solutions in poultry farming and livestock management. Trusted by farmers and veterinarians for superior products and expertise in the livestock industry. Explore our range of products and services today!">
  <meta name="theme-color" content="#EEC344">

  <!-- ==============================================
  FAVICON
  =============================================== -->  
  <link rel="shortcut icon" href="<?= BASE_URL ?>/img/master/favicon-white.png">
           
  <!-- ==============================================
  CSS
  =============================================== -->  
  <link rel="stylesheet" href="<?= BASE_URL ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/css/timeline.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/css/stylesheet.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/css/home-1-styles.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/css/responsive.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/fonts/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/fonts/css/all.min.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/css/slick.min.css"> 
  <link rel="stylesheet" href="<?= BASE_URL ?>/css/owl.carousel.min.css">
  <link rel="stylesheet" href='<?= BASE_URL ?>/css/animation.aos.min.css'>
  <link rel="stylesheet" href="<?= BASE_URL ?>/css/animate.min.css">
  <script src="<?= BASE_URL ?>/js/modernizr-custom.js"></script>
</head> 
    
<body>
  <!-- LOADER -->
  <div id="loader-wrapper">
    <div class="loader">
      <img src="<?= BASE_URL ?>/img/master/favicon.jpg" alt="loader image" width="80" height="80">
    </div>
  </div>
  <!-- LOADER -->
    <!--HEADER START-->
    <?php
    include VIEW_PATH . "/home/components/header.php";
    ?>
    <!--HEADER END-->
  
  <div class="sections blog-single-background">
      <div class="container">
        <div class="pages-title">
          <h1><span>Post</span></h1>
          <p><a href="<?= BASE_URL ?>/">Home</a> &nbsp; > &nbsp; <a href="<?= BASE_URL ?>/posts">Posts</a> &nbsp; > &nbsp; <?= $post['title'] ?></p>
        </div>
      </div>
  </div>
  
  <section>
    <div class="container">
        <div class="row">
          <!--BLOG DETAILS START-->
          <div class="col-lg-9">              
            <div class="post-single">
              <figure class="post-preview">
                  <img src="<?= BASE_URL . "/blog-images/" . $post['featured_image'] ?>" alt="">
                  <div class="post-overlay"></div>
              </figure>
              <div class="single-post-caption">
                <h2><?= $post['title'] ?></h2>
                <div class="single-post-details">
                    <div class="post-author">
                        <figure class="author-avatar"><img src="<?= BASE_URL ?>/admin-assets/images/avatar.jpg" alt=""></figure>
                        <div class="about-author">
                            <h4 class="author-name"><a href="#"><?= $post['first_name'] . " " . $post['last_name'] ?></a></h4>
                            <p class="posted-on"><?= date("M d, Y", strtotime($post['date_posted'])) ?></p>
                        </div>        
                    </div>
                </div>
                <hr class="posts"> 
                <?= $post['content'] ?>
              </div>
            </div>  
            <div class="comments">
              <h3>Comments (<?= $data['comments_total'] ?>)</h3>
              <?php if($data['comments_total'] > 0): ?>
              <hr class="comments">
              <?php
                foreach($data['comments'] as $comment){
                  $replies = BlogCommentsRepliesModel::getAllCommentReplies($comment['comment_id']);

                  if($comment['approved'] !== 0 && $comment['approved'] !== null){
              ?>
              <div class="comment-block">
                <div class="comment-box">
                  <figure class="user-avatar"><img src="<?= BASE_URL ?>/admin-assets/images/avatar.jpg" alt=""></figure>
                  <div class="comment-details">
                    <h4>
                    <?php 
                      if(!empty($comment['admin_id'])){
                        // is admin
                        $admin = AdminModel::findById($comment['admin_id']);
                        $commenter = $admin['first_name'] . " " . $admin['last_name'];
                        echo $commenter;
                      }elseif(!empty($user_id)){ 
                        // is registered user
                      } else {
                        $commenter = $comment['name'];
                        echo $commenter;
                      }
                    ?>
                    </h4>
                    <p class="comment-date"><?= date('M d, Y, h:i a', strtotime($comment['date_posted'])) ?></p>
                    <p class="comment"><?= $comment['message'] ?></p>
                    <div class="comment-interaction">
                        <div class="replay-box">
                          <a href="#" data-toggle="comment-<?= $comment['comment_id'] ?>"><i class="fas fa-reply"></i>reply</a>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="replies">
                  <div id="comment-<?= $comment['comment_id'] ?>" class="comment-form reply">
                    <button
                      style="float: right;"
                      type="button"
                      class="btn-close"
                      data-dismiss="comment-<?= $comment['comment_id'] ?>"
                      aria-label="Close"
                    >
                      <span aria-hidden="true">×</span>
                    </button>
                    <h3>Reply To <?= $commenter ?></h3>
                    <hr class="comments">
                    <form class="blog-reply">
                      <div class="messages"></div>
                      <div class="form-row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <input type="text" name="name" class="form-control customize" placeholder="Name" required="required" data-error="Full Name is required.">
                            <div class="help-block with-errors"></div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <input type="email" name="email" class="form-control customize" placeholder="Email address" required="required" data-error="Valid email is required.">
                            <div class="help-block with-errors"></div>
                          </div>
                        </div>
                        <input type="hidden" name="commentId" value="<?= $comment['comment_id'] ?>">
                        <div class="col-md-12">
                          <div class="form-group">
                            <textarea name="message" class="form-control customize" placeholder="Your message" rows="6" required="required" data-error="Please,leave us a reply message."></textarea>
                            <div class="help-block with-errors"></div>
                          </div>
                        </div>
                      </div>
                      <div class="btn-comments">
                        <button type="submit" class="btn btn-custom" role="button">Send Reply</button>
                      </div>
                    </form>
                  </div>
                  <?php if(count($replies) > 0): ?>
                    <?php 
                      foreach($replies as $reply){ 
                        if($reply['approved'] !== 0 && $reply['approved'] !== null){
                    ?>  
                    <div class="comment-box">
                      <figure class="user-avatar"><img src="<?= BASE_URL ?>/admin-assets/images/avatar.jpg" alt=""></figure>
                      <div class="comment-details">
                        <h4>
                          <?php 
                            if(!empty($reply['admin_id'])){
                              // is admin
                              $admin = AdminModel::findById($reply['admin_id']);
                              $replier = $admin['first_name'] . " " . $admin['last_name'];
                              echo $replier;
                            }elseif(!empty($user_id)){ 
                                // is registered user
                            } else {
                              $replier = $reply['name'];
                              echo $replier;
                            }
                          ?>
                        </h4>
                        <p class="comment-date"><?= date('M d, Y, h:i a', strtotime($reply['date_posted'])) ?></p>
                        <p class="comment"><?= $reply['message'] ?></p>
                      </div>
                    </div>
                    <?php
                        } 
                      } 
                    ?>
                  <?php endif; ?>
                </div>
              </div>
              <hr class="comments">
              <?php
                  }
                }
              ?>
              <?php else: ?>
                <p class="text-muted font-15">No comment in this post. Be the first to comment below.</p>
              <?php endif; ?>
            </div>

            <div class="comment-form">
              <h3>Leave a Comment</h3>
              <hr class="comments">
              <form id="blog-comment">
                <div class="messages"></div>
                <div class="form-row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" name="name" class="form-control customize" placeholder="Name" required="required" data-error="Name is required.">
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control customize" placeholder="Email address" required="required" data-error="Valid email is required.">
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <!-- <div class="col-md-12">
                    <input type="text" class="form-control customize" placeholder="Your website">
                  </div> -->
                  <input type="hidden" name="postId" value="<?= $post['post_id']?> ">
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea name="message" class="form-control customize" placeholder="Your message" rows="6" required="required" data-error="Please,leave us a message."></textarea>
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                </div>
                <div class="btn-comments">
                  <button type="submit" class="btn btn-custom" role="button">SEND COMMENT</button>
                </div>
              </form>
            </div>          
          </div>
          <!--BLOG DETAILS END-->
            
          <!--SIDEBAR START-->
          <div class="col-lg-3 aside-right">
            <aside>
              <h3>Categories</h3>  
              <div class="aside-list-group">
                <ul class="list-group list-group-flush">
                    <?php
                        foreach($data['categories'] as $category):
                    ?>
                    <li class="list-group-item"><a href="<?= BASE_URL . "/posts/category/" . $category['name'] ?>"><?= ucfirst($category['name']) ?></a>
                        <span class="badge badge-primary badge-pill"><?= BlogPostsModel::getBlogCategoriesCount($category['name']) ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
              </div>
              <h3>Related Posts</h3>  
              <div class="aside-related-posts">
                <?php
                    foreach($data['latest_posts'] as $latest_post):
                ?>
                <div class="media-list">
                    <figure class="media-thumb"><a href="<?= BASE_URL . "/post/" . convertToSlug($latest_post['title']) ?>"><img src="<?= BASE_URL . "/blog-images/" . $latest_post['featured_image'] ?>" alt=""></a></figure>
                    <div class="media-post">
                        <h4><a href="<?= BASE_URL . "/post/" . convertToSlug($latest_post['title']) ?>"><?= $latest_post['title'] ?></a></h4>
                        <p><?= date("M d, Y", strtotime($latest_post['date_posted'])) ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
              </div>
              <!-- <h3>Tags</h3> 
              <div class="aside-tags">
                <a class="btn btn-tags" href="#" role="button">farm</a>
                <a class="btn btn-tags" href="#" role="button">organic</a>
                <a class="btn btn-tags" href="#" role="button">agriculture</a>
                <a class="btn btn-tags" href="#" role="button">Wheat</a>
                <a class="btn btn-tags" href="#" role="button">fruits</a>
                <a class="btn btn-tags" href="#" role="button">natural</a>
              </div>     -->
            </aside>  
          </div>
          <!--SIDEBAR END-->
        </div>
    </div>
    
    <!--CONTACT US START-->
    <div class="container-fluid home-contact">
      <div class="row">
        <div class="col-lg-6" data-aos="fade-right">
          <div class="contact-info">
            <p>Get In Touch</p>
            <h2>Contact Us</h2>
            <div class="block-address">
              <i class="fas fa-map-pin address-icon"></i>
              <div class="inner-info">
                <h4>ADDRESS</h4> 
                <p>23/27 Ikorodu - Shagamu Rd, Ikorodu, 104101, Lagos</p>
              </div>
            </div>
            <div class="block-phone">
              <i class="fas fa-phone-square address-icon"></i>
              <div class="inner-info">
                  <h4>OFFICE PHONE</h4> 
                  <p>0809 282 6813</p>
              </div>
            </div>
            <div class="block-email">
              <i class="fas fa-mail-bulk address-icon"></i>
              <div class="inner-info">
                  <h4>EMAIL</h4> 
                  <p>info@tosedventures.com</p>
              </div>
            </div>
            <div class="social-networks">
              <div class="networks-list"><a href="#"><i class="fab fa-facebook-f"></i></a></div>  
              <div class="networks-list"><a href="#"><i class="fab fa-twitter"></i></a></div>  
              <div class="networks-list"><a href="#"><i class="fab fa-instagram"></i></a></div>  
              <div class="networks-list"><a href="#"><i class="fab fa-linkedin-in"></i></a></div>  
            </div>
          </div>  
        </div>
        <div class="col-lg-6 custom-map" data-aos="fade-left">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.9346673594787!2d3.5169540102120247!3d6.655020093311987!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103be9486c91da1b%3A0xff7856c7fc510918!2sTOSED%20INTEGRATED%20FARMS%20VENTURES!5e0!3m2!1sen!2sng!4v1708685309572!5m2!1sen!2sng" class="map-iframe"></iframe>
        </div>
      </div>
      <div class="form-box">
          <form id="contact-form" method="post" action="http://quickdevs.com/templates/agrom/contact.php">
              <div class="messages"></div>
              <div class="controls">
                  <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                              <input id="form_name" type="text" name="name" class="form-control customize" placeholder="Name" required="required" data-error="Firstname is required.">
                              <div class="help-block with-errors"></div>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <input id="form_email" type="email" name="email" class="form-control customize" placeholder="Email address" required="required" data-error="Valid email is required.">
                              <div class="help-block with-errors"></div>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <input id="form_phone" type="tel" name="phone" class="form-control customize" placeholder="Please enter your phone">
                              <div class="help-block with-errors"></div>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <textarea id="form_message" name="message" class="form-control customize" placeholder="Your message" rows="5" required="required" data-error="Please,leave us a message."></textarea>
                              <div class="help-block with-errors"></div>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12 contact-btn">
                          <p><input type="submit" class="btn btn-custom" value="Send message"></p>
                      </div>
                  </div>
              </div>
          </form> 
      </div>
    </div>
    <!--CONTACT US END-->
  </section>
  
  <!--FOOTER START-->
  <?php
    include VIEW_PATH . "/home/components/footer.php";
    ?>
    <!--FOOTER END-->

  <!--SCROLL TOP START-->
  <a href="#0" class="cd-top">Top</a>
  <!--SCROLL TOP START-->
  
  <!-- ==============================================
  JAVASCRIPTS
  =============================================== -->
  <script src="<?= BASE_URL ?>/js/plugins.js"></script>
  <script src="<?= BASE_URL ?>/js/bootstrap.min.js"></script>
  <script src="<?= BASE_URL ?>/js/agrom.js"></script>
  <script src="<?= BASE_URL ?>/js/main.js"></script>
  
  </body>
</html>