<?php get_header(); ?>

    <div class="container">

      <div id="content" class="row clearfix">

            <div id="main" class="col-md-8 clearfix" role="main">
              <p style="text-align:center;">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/bridgetown-logo.png" />
              </p>
              <?php
                $front_page = get_page_by_title( 'Front Page' );
              ?>
              <article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">

                  <section class="entry-content clearfix">
                    <?php echo wpautop($front_page->post_content); ?>
                  </section>
              </article>

            
            <?php
              $sponsor_page = get_page_by_title( 'Front Page Sponsors');
              //var_dump($sponsor_page->post_content);
            ?>
            <div id="sidebar">
              <div id="sponsor-sidebar">

                <h1>SPONSORED BY:</h1>
                <div>
                  <?php echo wpautop($sponsor_page->post_content); ?>
                </div>


              </div>

            </div>
            </div> <?php // end #main ?>


      </div> <?php // end #content ?>

    </div> <!-- end ./container -->

<?php get_footer(); ?>
