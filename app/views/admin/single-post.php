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
            width: auto !important;
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
                                        <li class="breadcrumb-item"><a href="<?= BASE_URL . "/admin/posts" ?>">Blogs</a></li>
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
                                                <div class="text-muted d-flex align-items-center justify-content-between flex-wrap">
                                                    <span>by <a class="text-dark mb-2"><?= $post['first_name'] . " " . $post['last_name'] ?></a>, <?= date("M d, Y", strtotime($post['date_posted'])) ?>.</span>
                                                    <a href="<?= BASE_URL . "/admin/post/". $post['post_id'] .  "/edit" ?>" class="btn btn-warning btn-sm waves-effect waves-light">Edit Post</a>
                                                </div>
                                                <div class="post-title">
                                                    <h5><?= $post['title'] ?></h5>
                                                </div>
                                                <div>
                                                    <?= $post['content'] ?>
                                                </div>
                                            </div>
                                        </div>

                                        <hr/>

                                        <div id="comments" class="mt-5 blog-post-comment">
                                            <h5 class="text-uppercase mb-4">Comments (<?= $data['comments_total'] ?>)</h5>

                                            <?php if (isset($_SESSION['new_comment_success_message'])): ?>
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    <i class="mdi mdi-check-all mr-2"></i> <?= $_SESSION['new_comment_success_message'] ?>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <?php unset($_SESSION['new_comment_success_message']); ?>
                                            <?php endif; ?>

                                            <?php if (isset($_SESSION['comment_action_success_message'])): ?>
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    <i class="mdi mdi-check-all mr-2"></i> <?= $_SESSION['comment_action_success_message'] ?>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <?php unset($_SESSION['comment_action_success_message']); ?>
                                            <?php endif; ?>

                                            <?php if (isset($_SESSION['comment_action_error_message'])): ?>
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <i class="mdi mdi-block-helper mr-2"></i> <?= $_SESSION['comment_action_error_message'] ?>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <?php unset($_SESSION['comment_action_error_message']); ?>
                                            <?php endif; ?>

                                            <?php if($data['comments_total'] > 0): ?>
                                                <ul class="media-list pl-0">
                                                    <?php
                                                        foreach($data['comments'] as $comment){
                                                            $replies = BlogCommentsRepliesModel::getAllCommentReplies($comment['comment_id']);

                                                            if($comment['approved'] !== 0){
                                                    ?>
                                                    <li class="media">
                                                        <a class="mr-2" href="#">
                                                            <img class="media-object rounded-circle" src="<?= BASE_URL ?>/admin-assets/images/avatar.jpg" alt="img">
                                                        </a>
                                                        <div class="media-body">
                                                            <h5 class="font-18 media-heading mt-0">
                                                                <?php if(!empty($comment['admin_id'])){
                                                                    // is admin
                                                                    $admin = AdminModel::findById($comment['admin_id']);
                                                                    if($admin['admin_id'] === $data['admin_details']['admin_id']){
                                                                        $commenter = "You";
                                                                        echo $commenter;
                                                                    }else{
                                                                        $commenter = $admin['first_name'] . " " . $admin['last_name'];
                                                                        echo $commenter;
                                                                    }
                                                                 }elseif(!empty($user_id)){ 
                                                                    // is registered user
                                                                 } else {
                                                                    $commenter = $comment['name'];
                                                                    echo $commenter;
                                                                 }
                                                                ?>
                                                            </h5>
                                                            <h6 class="text-muted">
                                                             <?= date('M d, Y, h:i a', strtotime($comment['date_posted'])) ?>
                                                            </h6>
                                                            <p>
                                                                <?= $comment['message'] ?>
                                                            </p>
                                                            <div class="my-1 d-flex flex-wrap">
                                                                <?php if(empty($comment['admin_id']) && ($comment['approved'] === null)): ?>
                                                                    <a href="#" data-comment-action="approve" data-action-type="comment" data-comment-id="<?= $comment['comment_id'] ?>" href="#" class="text-warning mr-2">Approve</a>
                                                                    <a href="#" data-comment-action="unapprove" data-action-type="comment" data-comment-id="<?= $comment['comment_id'] ?>" href="#" class="text-danger mr-2">Unapprove</a>
                                                                <?php endif; ?>
                                                                <a href="#" data-comment-type="comment" data-edit-id="<?= $comment['comment_id'] ?>" class="text-success mr-2">Edit</a>
                                                                <a href="#" data-toggle="comment-<?= $comment['comment_id'] ?>" class="text-success mr-2">Reply</a>
                                                                <a href="#" data-comment-action="delete" data-action-type="comment" data-comment-id="<?= $comment['comment_id'] ?>" data-has-replies="<?= count($replies) > 0 ?>" href="#" class="text-danger mr-2">Delete</a>
                                                            </div>
                                                            <div class="reply_form my-4" id="comment-<?= $comment['comment_id'] ?>" style="display: none;">
                                                                <button
                                                                style="float: right;"
                                                                type="button"
                                                                class="btn btn-danger mb-4"
                                                                data-dismiss="comment-<?= $comment['comment_id'] ?>"
                                                                aria-label="Close"
                                                                >
                                                                <span aria-hidden="true">×</span>
                                                                </button>
                                                                <h5 class="text-uppercase my-2">Reply to <?= $commenter ?></h5>
                                                                <form id="replyForm-<?= $comment['comment_id'] ?>" action="<?= BASE_URL . "/admin/comment/" . $comment['comment_id'] . "/reply/new"?>" method="post" onsubmit="return validateReplyForm(<?= $comment['comment_id'] ?>)">
                                                                    <div class="form-group">
                                                                        <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                                                                    </div>
                                                                    
                                                                    <input type="hidden" name="post_id" value="<?= $post['post_id']?>">
                                                                    <!-- /Form Msg -->
                    
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="">
                                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                                            </div>
                                                                        </div>
                                                                        <!-- /col -->
                                                                    </div>
                                                                    <!-- /row -->
                    
                                                                </form>
                                                            </div>
                                                            <?php if(count($replies) > 0): ?>
                                                                <?php 
                                                                    foreach($replies as $reply){ 
                                                                        if($reply['approved'] !== 0){
                                                                ?>
                                                                    <div class="media sub_media">
                                                                        <a class="mr-2" href="#">
                                                                            <img class="media-object rounded-circle" src="<?= BASE_URL ?>/admin-assets/images/avatar.jpg" alt="img">
                                                                        </a>
                                                                        <div class="media-body">
                                                                            <h5 class="font-18 media-heading mt-0">
                                                                            <?php 
                                                                                if(!empty($reply['admin_id'])){
                                                                                    // is admin
                                                                                    $admin = AdminModel::findById($reply['admin_id']);
                                                                                    if($admin['admin_id'] === $data['admin_details']['admin_id']){
                                                                                        $replier = "You";
                                                                                        echo $replier;
                                                                                    }else{
                                                                                        $replier = $admin['first_name'] . " " . $admin['last_name'];
                                                                                        echo $replier;
                                                                                    }
                                                                                }elseif(!empty($user_id)){ 
                                                                                    // is registered user
                                                                                } else {
                                                                                    $replier = $reply['name'];
                                                                                    echo $replier;
                                                                                }
                                                                            ?>
                                                                            </h5>
                                                                            <h6 class="text-muted">
                                                                            <?= date('M d, Y, h:i a', strtotime($reply['date_posted'])) ?>
                                                                            </h6>
                                                                            <p>
                                                                                <?= $reply['message'] ?>
                                                                            </p>
                                                                            <div class="my-1 d-flex flex-wrap">
                                                                                <?php if(empty($reply['admin_id']) && ($reply['approved'] === null)): ?>
                                                                                    <a href="#" data-comment-action="approve" data-action-type="reply" data-reply-id="<?= $reply['reply_id'] ?>" href="#" class="text-warning mr-2">Approve</a>
                                                                                    <a href="#" data-comment-action="unapprove" data-action-type="reply" data-reply-id="<?= $reply['reply_id'] ?>" href="#" class="text-danger mr-2">Unapprove</a>
                                                                                <?php endif; ?>
                                                                                <a href="#" data-comment-type="reply" data-edit-id="<?= $reply['reply_id'] ?>" class="text-success mr-2">Edit</a>
                                                                                <a href="#" data-comment-action="delete" data-action-type="reply" data-reply-id="<?= $reply['reply_id'] ?>" href="#" class="text-danger mr-2">Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php
                                                                        } 
                                                                    } 
                                                                ?>
                                                            <?php endif; ?>
                                                        </div>
                                                    </li>
                                                    <?php
                                                            }
                                                        }
                                                    ?>
                                                </ul>
                                            <?php else: ?>
                                                <p class="text-center text-muted font-15">No comment in this post. Be the first to comment below.</p>
                                            <?php endif; ?>

                                            <h5 class="text-uppercase mt-5 mb-4">Leave a comment</h5>

                                            <?php if (isset($_SESSION['new_comment_error_message'])): ?>
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <i class="mdi mdi-block-helper mr-2"></i> <?= $_SESSION['new_comment_error_message'] ?>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <?php unset($_SESSION['new_comment_error_message']); ?>
                                            <?php endif; ?>

                                            <form id="commentForm" action="<?= BASE_URL ?>/admin/post/<?= $post['post_id'] ?>/comment/new" method="post" onsubmit="return validateCommentForm()">
                                                <div class="form-group">
                                                    <textarea class="form-control" id="message" name="message" rows="5" placeholder="Message" required=""></textarea>
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
                                                    <li><a href="<?= BASE_URL . "/admin/posts/category/" . $category['name'] ?>"><?= $category['name'] ?></a></li>
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
            <?php include VIEW_PATH . "/admin/components/footer.php" ?>
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
                  <form action="#" method="post" onsubmit="return validateForm()">
                    <div class="form-group">
                        <textarea id="comment" name="comment" class="form-control" rows="5"></textarea>
                    </div>

                    <input type="hidden" name="postId" value="<?= $post['post_id'] ?>" />

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

        <div class="modal fade" id="commentActionModal" tabindex="-1" aria-labelledby="commentActionModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Approve Comment?</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <p>Please <b>Note:</b>This is a one time action and cannot be undone. Proceed?</p>
                  <form id="commentActionForm" action="#" method="post">

                    <input id="hiddenId" type="hidden"/>

                    <input type="hidden" name="postId" value="<?= $post['post_id'] ?>" />

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success waves-effect waves-light"> 
                            <span>Yes</span> 
                        </button>
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                            No
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

                if(commentType === "comment"){
                    $("#editCommentModal .modal-title").text("Edit Comment");

                    $("#editCommentModal form").attr("action", `<?= BASE_URL ?>/admin/post/${$(this).data("edit-id")}/comment/edit`)

                    $("#editCommentModal #comment").val($(this).parent().prev('p').text().trim());

                }else{
                    $("#editCommentModal .modal-title").text("Edit Reply");

                    $("#editCommentModal form").attr("action", `<?= BASE_URL ?>/admin/post/${$(this).data("edit-id")}/reply/edit`)

                    $("#editCommentModal #comment").val($(this).parent().prev('p').text().trim());
                }

                // Show the modal
                $('#editCommentModal').modal('show');
            });

            // <a href="#" data-comment-action="approve" data-comment-type="comment" data-comment-id="<?= $comment['comment_id'] ?>" href="#" class="text-warning mr-2">Approve</a>
            //<a href="#" data-comment-action="unapprove" data-comment-type="reply" data-reply-id="<?= $comment['comment_id'] ?>" href="#" class="text-danger mr-2">Unapprove</a>

            $('.media-list').on('click', '[data-comment-action]', function(e) {
                e.preventDefault();

                // Between approve and unapprove;
                const actionType = $(this).data("comment-action");

                if(actionType === "approve"){
                    // approve comment or reply
                    const actionType = $(this).data("action-type");

                    if(actionType === "comment"){
                        const commentId = $(this).data("comment-id");

                        $('#commentActionModal .modal-title').html("Approve comment?");
                        $("#commentActionForm").attr("action", `<?= BASE_URL ?>/admin/post/comment/approve/`);

                        $("#commentActionForm #hiddenId").attr("name","commentId");
                        $("#commentActionForm #hiddenId").attr("value", commentId);
                    }

                    if(actionType === "reply"){
                        const replyId = $(this).data("reply-id");

                        $('#commentActionModal .modal-title').html("Approve reply?");
                        $("#commentActionForm").attr("action", `<?= BASE_URL ?>/admin/post/reply/approve/`);

                        $("#commentActionForm #hiddenId").attr("name", "replyId");
                        $("#commentActionForm #hiddenId").attr("value", replyId);
                    }
                }

                if(actionType === "unapprove"){
                    //unapprove comment or reply
                    const actionType = $(this).data("action-type");

                    if(actionType === "comment"){
                        const commentId = $(this).data("comment-id");

                        $('#commentActionModal .modal-title').html("Unapprove comment?");
                        $("#commentActionForm").attr("action", `<?= BASE_URL ?>/admin/post/comment/unapprove/`);

                        $("#commentActionForm #hiddenId").attr("name", "commentId");
                        $("#commentActionForm #hiddenId").attr("value", commentId);

                    }

                    if(actionType === "reply"){
                        const replyId = $(this).data("reply-id");

                        $('#commentActionModal .modal-title').html("Unapprove reply?");
                        $("#commentActionForm").attr("action", `<?= BASE_URL ?>/admin/post/reply/unapprove/`);

                        $("#commentActionForm #hiddenId").attr("name", "replyId");
                        $("#commentActionForm #hiddenId").attr("value", replyId);

                    }
                }

                if(actionType === "delete"){
                    //unapprove comment or reply
                    const actionType = $(this).data("action-type");

                    if(actionType === "comment"){
                        const commentId = $(this).data("comment-id");

                        const modalTitle = $(this).data("has-replies") === 1? "Delete this comment and it's replies?" : 'Delete this comment?';
                        $('#commentActionModal .modal-title').html(modalTitle);
                        $("#commentActionForm").attr("action", `<?= BASE_URL ?>/admin/post/comment/delete/`);

                        $("#commentActionForm #hiddenId").attr("name", "commentId");
                        $("#commentActionForm #hiddenId").attr("value", commentId);

                    }

                    if(actionType === "reply"){
                        const replyId = $(this).data("reply-id");

                        $('#commentActionModal .modal-title').html("Delete this reply?");
                        $("#commentActionForm").attr("action", `<?= BASE_URL ?>/admin/post/reply/delete/`);

                        $("#commentActionForm #hiddenId").attr("name", "replyId");
                        $("#commentActionForm #hiddenId").attr("value", replyId);

                    }
                }

                // Show the modal
                $('#commentActionModal').modal('show');
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

        function validateCommentForm(){
            // Get form inputs
            var comment = document.querySelector('#commentForm textarea').value;

            if (comment === '') {
                alert('Please enter comment.');
                return false;
            }

            return true;
        }

        function validateReplyForm(comment_id){
            // Get form inputs
            var comment = document.querySelector(`#replyForm-${comment_id} textarea`).value;

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