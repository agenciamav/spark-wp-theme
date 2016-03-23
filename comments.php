<? // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) { ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="comments">
                        <div class="media">
                            <a href="" class="pull-left">
                                <img alt="" src="images/avater.jpg" class="media-object">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">
                                Jonathon Andrew</h4>
                                <p class="text-muted">
                                    12 July 2013, 10:20 PM
                                </p>
                                <p>
                                    Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                                </p>
                                <a href="">Reply</a>
                                <hr>
                                <!-- Nested media object -->
                                <div class="media">
                                    <a href="" class="pull-left">
                                        <img alt="" src="images/avater-1.jpg" class="media-object">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                        Tom Cruse </h4>
                                        <p class="text-muted">
                                            12 July 2013, 10:20 PM
                                        </p>
                                        <p>
                                            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                                        </p>
                                    </div>
                                </div>
                                <!--end media-->
                                <hr>
                                <div class="media">
                                    <a href="" class="pull-left">
                                        <img alt="" src="images/avater-1.jpg" class="media-object">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                        Nicolus Carolus </h4>
                                        <p class="text-muted">
                                            12 July 2013, 10:20 PM
                                        </p>
                                        <p>
                                            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                                        </p>
                                    </div>
                                </div>
                                <!--end media-->
                            </div>
                        </div>
                        <div class="media">
                            <a href="" class="pull-left">
                                <img alt="" src="images/avater-2.jpg" class="media-object">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">
                                Rob Martin</h4>
                                <p class="text-muted">
                                    12 July 2013, 10:20 PM
                                </p>
                                <p>
                                    Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                                </p>
                                <a href="">Reply</a>
                            </div>
                        </div>
                        <div class="media">
                            <a href="" class="pull-left">
                                <img alt="" src="images/avater-2.jpg" class="media-object">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">
                                Mastarello </h4>
                                <p class="text-muted">
                                    12 July 2013, 10:20 PM
                                </p>
                                <p>
                                    Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                                </p>
                                <a href="">Reply</a>
                            </div>
                        </div>
                    </div>
                    <div class="post-comment">
                        <h3>Leave a Reply</h3>
                        <form role="form" class="form-horizontal">
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <input type="text" class="col-lg-12 form-control" placeholder="Name">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" class="col-lg-12 form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <textarea class=" form-control" rows="8" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <p>
                            </p>
                            <p>
                                <button class="btn btn-send" type="submit">Comment</button>
                            </p>
                            
                            <p></p>
                        </form>
                    </div>
                    
                </div>
            </div>

            <?php }

        if ( is_singular( 'attachment' ) ) {
            // Parent post navigation.
            the_post_navigation( array(
                'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'twentysixteen' ),
            ) );
        } elseif ( is_singular( 'post' ) ) {
            // Previous/next post navigation.
            the_post_navigation( array(
                'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentysixteen' ) . '</span> ' .
                    '<span class="screen-reader-text">' . __( 'Next post:', 'twentysixteen' ) . '</span> ' .
                    '<span class="post-title">%title</span>',
                'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentysixteen' ) . '</span> ' .
                    '<span class="screen-reader-text">' . __( 'Previous post:', 'twentysixteen' ) . '</span> ' .
                    '<span class="post-title">%title</span>',
            ) );
        }; ?>                 