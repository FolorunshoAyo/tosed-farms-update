<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Blog Post - <?= $data['post']['title'] ?> | Tosed Integrated Farm Ventures</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="<?= BASE_URL ?>/admin-assets/images/tosed-logo/admin-favicon.png">

    <!-- App css -->
    <link href="<?= BASE_URL ?>/admin-assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="<?= BASE_URL ?>/admin-assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= BASE_URL ?>/admin-assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />

    <style>
        table{
            width: 100% !important;
            max-width: 100% !important;
        }
    </style>
</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">
        <!-- Topbar Start -->
        <?php include VIEW_PATH . "/admin/components/topbar.php" ?>
        <!-- end Topbar --> 
        
        <!-- ========== Left Sidebar Start ========== -->
        <?php include VIEW_PATH . "/admin/components/left-sidebar.php" ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tosed Integrated Farm Ventures</a></li>
                                        <li class="breadcrumb-item"><a href="<?= BASE_URL . "/admin/blogs" ?>">Blogs</a></li>
                                        <li class="breadcrumb-item active">Blog Post</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Blog Post</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div>
                                        <?php
                                            $post = $data['post'];
                                        ?>
                                        <!-- Image Post -->
                                        <div class="card blog-post bg-transparent">
                                            <div class="post-image">
                                                <img src="<?= BASE_URL . "/blog-images/" . $post['featured_image'] ?>" alt="" class="img-fluid mx-auto d-block rounded-top">
                                                <span class="badge badge-danger"><?= $post['category_name'] ?></span>
                                            </div>

                                            <div class="card-body">
                                                <div class="text-muted"><span>by <a class="text-dark"><?= $post['first_name'] . " " . $post['last_name'] ?></a>,</span> <span><?= date("M d, Y", strtotime($post['date_posted'])) ?>.</span></div>
                                                <div class="post-title">
                                                    <h5><?= $post['title'] ?></h5>
                                                </div>
                                                <div>
                                                    <?= $post['content'] ?>
                                                </div>
                                            </div>

                                        </div>

                                        <hr/>

                                        <div class="mt-5 blog-post-comment">
                                            <h5 class="text-uppercase mb-4">Comments <small>(4)</small></h5>

                                            <ul class="media-list pl-0">

                                                <li class="media">
                                                    <a class="mr-2" href="#">
                                                        <img class="media-object rounded-circle" src="assets/images/avatar.jpg" alt="img">
                                                    </a>
                                                    <div class="media-body">
                                                        <h5 class="font-18 media-heading mt-0">Johnathan deo</h5>
                                                        <h6 class="text-muted">Nov 23, 2016, 11:45 am</h6>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim.</p>
                                                        <div class="my-1 d-flex flex-wrap">
                                                            <a href="#" class="text-danger mr-2">Unapprove</a>
                                                            <a href="#" data-comment-type="comment" data-edit-id="1" class="text-success mr-2">Edit</a>
                                                            <a href="#" data-toggle="comment-1" class="text-success">Reply</a>
                                                        </div>
                                                        <div class="reply_form my-4" id="comment-1" style="display: none;">
                                                            <button
                                                            style="float: right;"
                                                            type="button"
                                                            class="btn btn-danger mb-4"
                                                            data-dismiss="comment-1"
                                                            aria-label="Close"
                                                            >
                                                            <span aria-hidden="true">×</span>
                                                            </button>
                                                            <h5 class="text-uppercase my-2">Reply to Johnathan deo</h5>
                                                            <form>
                                                                <div class="form-group">
                                                                    <textarea class="form-control" id="message2" name="message" rows="5" placeholder="Message" required=""></textarea>
                                                                </div>
                                                                <!-- /Form Msg -->
                
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="">
                                                                            <button type="submit" class="btn btn-primary" id="send">Submit</button>
                                                                        </div>
                                                                    </div>
                                                                    <!-- /col -->
                                                                </div>
                                                                <!-- /row -->
                
                                                            </form>
                                                        </div>            
                                                    </div>
                                                </li>

                                                <li class="media">
                                                    <a class="mr-2" href="#">
                                                        <img class="media-object rounded-circle" src="assets/images/avatar.jpg" alt="img">
                                                    </a>
                                                    <div class="media-body">
                                                        <h5 class="font-18 media-heading mt-0">John deo</h5>
                                                        <h6 class="text-muted">Nov 25, 2018, 11:45 am</h6>
                                                        <p>Nulla venenatis. In pede mi, aliquet sit amet, euismod in, auctor ut, ligula. Aliquam dapibus tincidunt metus. Praesent justo dolor, lobortis quis, lobortis dignissim, pulvinar ac, lorem. Vestibulum sed ante.</p>
                                                        <div class="my-1 d-flex flex-wrap">
                                                            <a href="#" class="text-warning mr-2">Approve</a>
                                                            <a href="#" data-comment-type="comment" data-edit-id="2" class="text-success mr-2">Edit</a>
                                                            <a href="#" data-toggle="comment-2" class="text-success">Reply</a>
                                                        </div>
                                                        <div class="reply_form my-4" id="comment-2" style="display: none;">
                                                            <button
                                                            style="float: right;"
                                                            type="button"
                                                            class="btn btn-danger mb-4"
                                                            data-dismiss="comment-2"
                                                            aria-label="Close"
                                                            >
                                                            <span aria-hidden="true">×</span>
                                                            </button>
                                                            <h5 class="text-uppercase my-2">Reply to John Deo</h5>
                                                            <form>
                                                                <div class="form-group">
                                                                    <textarea class="form-control" id="message2" name="message" rows="5" placeholder="Message" required=""></textarea>
                                                                </div>
                                                                <!-- /Form Msg -->
                
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="">
                                                                            <button type="submit" class="btn btn-primary" id="send">Submit</button>
                                                                        </div>
                                                                    </div>
                                                                    <!-- /col -->
                                                                </div>
                                                                <!-- /row -->
                
                                                            </form>
                                                        </div>
                                                        <div class="media sub_media">
                                                            <a class="mr-2" href="#">
                                                                <img class="media-object rounded-circle" src="assets/images/avatar.jpg" alt="img">
                                                            </a>
                                                            <div class="media-body">
                                                                <h5 class="font-18 media-heading mt-0">Johnathan deo</h5>
                                                                <h6 class="text-muted">Nov 25, 2018, 03:15 am</h6>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
                                                                <div class="my-1 d-flex flex-wrap">
                                                                    <a href="#" class="text-danger mr-2">Unapprove</a>
                                                                    <a href="#" data-comment-type="reply" data-edit-id="3" class="text-success mr-2">Edit</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="media">
                                                    <a class="mr-2" href="#">
                                                        <img class="media-object rounded-circle" src="assets/images/avatar.jpg" alt="">
                                                    </a>
                                                    <div class="media-body">
                                                        <h5 class="font-18 media-heading mt-0">John deo</h5>
                                                        <h6 class="text-muted">Nov 27, 2018, 11:45 am</h6>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim.</p>
                                                        <div class="my-1 d-flex flex-wrap">
                                                            <a href="#" class="text-danger mr-2">Unapprove</a>
                                                            <a href="#" data-comment-type="comment" data-edit-id="3" class="text-success mr-2">Edit</a>
                                                            <a href="#" data-toggle="comment-3" class="text-success">Reply</a>
                                                        </div>
                                                        <div class="reply_form my-4" id="comment-3" style="display: none;">
                                                            <button
                                                            style="float: right;"
                                                            type="button"
                                                            class="btn btn-danger mb-4"
                                                            data-dismiss="comment-3"
                                                            aria-label="Close"
                                                            >
                                                            <span aria-hidden="true">×</span>
                                                            </button>
                                                            <h5 class="text-uppercase my-2">Reply to John Deo</h5>
                                                            <form>
                                                                <div class="form-group">
                                                                    <textarea class="form-control" id="message2" name="message" rows="5" placeholder="Message" required=""></textarea>
                                                                </div>
                                                                <!-- /Form Msg -->
                
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="">
                                                                            <button type="submit" class="btn btn-primary" id="send">Submit</button>
                                                                        </div>
                                                                    </div>
                                                                    <!-- /col -->
                                                                </div>
                                                                <!-- /row -->
                
                                                            </form>
                                                        </div>
                                                    </div>
                                                </li>

                                            </ul>

                                            <h5 class="text-uppercase mt-5 mb-4">Leave a comment</h5>

                                            <form>
                                                <div class="form-group">
                                                    <textarea class="form-control" id="message2" name="message" rows="5" placeholder="Message" required=""></textarea>
                                                </div>
                                                <!-- /Form Msg -->

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="">
                                                            <button type="submit" class="btn btn-primary" id="send">Submit</button>
                                                        </div>
                                                    </div>
                                                    <!-- /col -->
                                                </div>
                                                <!-- /row -->

                                            </form>

                                        </div>
                                        <!-- end m-t-50 -->

                                    </div>
                                    <!-- end p-20 -->
                                </div>
                                <!-- end col -->

                                <div class="col-lg-4">
                                    <div class="p-4">

                                        <div class="">
                                            <h5 class="text-uppercase mb-4">Search</h5>
                                            <div class="form-group search-box">
                                                <input type="text" id="search-input" class="form-control" placeholder="Search here...">
                                                <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>

                                        <div class="mt-5">
                                            <h5 class="text-uppercase mb-4">Categories</h5>

                                            <ul class="blog-categories-list list-unstyled">
                                                <?php
                                                foreach($data['categories'] as $category):
                                                ?>
                                                    <li><a href="<?= BASE_URL . "/admin/blogs/category/" . $category['name'] ?>"><?= $category['name'] ?></a></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>

                                        <div class="mt-5">
                                            <h5 class="text-uppercase mb-4">Latest Post</h5>

                                            <?php
                                                foreach($data['latest_posts'] as $latest_post):
                                            ?>

                                            <div class="media latest-post-item mt-3 mt-lg-0">
                                                <div class="media-left mr-2">
                                                    <a href="<?= BASE_URL . "/admin/post/single/" . convertToSlug($latest_post['title']) ?>"> <img class="rounded" alt="" src="<?= BASE_URL . "/blog-images/" . $latest_post['featured_image'] ?>" style="width: 100px; height: 66px;"> </a>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="media-heading mt-0 mb-1"><a href="<?= BASE_URL . "/admin/post/single/" . convertToSlug($latest_post['title']) ?>" class="text-muted font-15" ><?= $latest_post['title'] ?></a> </h5>
                                                    <p class="font-12 text-muted">
                                                        <?= date("M d, Y", strtotime($latest_post['date_posted'])) ?> | <?= $latest_post['first_name'] . " " . $latest_post['last_name'] ?>
                                                    </p>
                                                </div>
                                            </div>

                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                            </div>
                        </div>

                    </div>
                    <!-- end container-fluid -->
                </div>

            </div>
            <!-- end content -->

            

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            2018 - 2020 &copy; Zircos theme by <a href="#">Coderthemes</a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

        <div class="modal fade" id="editCommentModal" tabindex="-1" aria-labelledby="editBrandModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Edit Comment</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="editBrandForm" onsubmit="return validateForm()">
                    <div class="form-group">
                        <textarea id="comment" name="comment" class="form-control" rows="5"></textarea>
                    </div>

                    <input id="hiddenId" type="hidden" name="commentId" value="1" />

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary waves-effect waves-light"> 
                            <span>Save Changes</span> 
                        </button>
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
    <!-- END wrapper -->

    <!-- Vendor js -->
    <script src="<?= BASE_URL ?>/admin-assets/js/vendor.min.js"></script>
    <script>
        // Toggle functionality 
		$('[data-toggle]').click(function(e) {
			e.preventDefault();
			// Get the target ID from the 'data-toggle' attribute
			var targetID = $(this).data('toggle');
			
			// Toggle the visibility of the target element
			$('#' + targetID).toggle();
		});

        $('[data-dismiss]').click(function() {
			// Get the target ID from the 'data-dismiss' attribute
			var targetID = $(this).data('dismiss');
			
			// Hide the target element
			$('#' + targetID).hide();
		});

        $(document).ready(function() {
            $('.media-list').on('click', '[data-comment-type]', function(e) {
                e.preventDefault();

                const commentType = $(this).data("comment-type");

                console.log("clicked");

                if(commentType === "comment"){
                    $("#editCommentModal .modal-title").text("Edit Comment");

                    $("#hiddenId").attr("name", "commentId");
                    $("#hiddenId").attr("value", $(this).data("edit-id"));

                    $("#comment").val($(this).parent().prev('p').text());

                }else{
                    $("#editCommentModal .modal-title").text("Edit Reply");

                    $("#hiddenId").attr("name", "replyId");
                    $("#hiddenId").attr("value", $(this).data("edit-id"));

                    $("#comment").val($(this).parent().prev('p').text());
                }

                // Show the modal
                $('#editCommentModal').modal('show');
            });
        
        });

        function validateForm() {
            // Get form inputs
            var comment = document.getElementById('comment').value;

            if (comment === '') {
                alert('Please enter comment.');
                return false;
            }

            return true;
        }   
    </script>
    <!-- App js -->
    <script src="<?= BASE_URL ?>/admin-assets/js/app.min.js"></script>

</body>
</html>