<?php get_header(); ?>

    <div class="container">

      <div id="content" class="row clearfix">


<?php
////////////////////////////////////////////////////////////////////////////////
//////////////////// BLOG ////////////////////
////////////////////////////////////////////////////////////////////////////////
?>

 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

              <article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">

                <header class="article-header">

                  <h2 class="h2"><?php the_title(); ?></h2>
                  <p class="byline vcard"><?php
                    printf( __( '<time class="updated" datetime="%1$s" pubdate>%2$s</time>', 'bonestheme' ), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), bones_get_the_author_posts_link(), get_the_category_list(', '));
                  ?></p>

                </header> <?php // end article header ?>

                <section class="entry-content clearfix">
                  <?php the_content('dddd'); ?>
                </section> <?php // end article section ?>

                <footer class="article-footer">
                  <div class="row">
                  </div>
                </footer> <?php // end article footer ?>

                <?php // comments_template(); // uncomment if you want to use them ?>

              </article> <?php // end article ?>

              <?php endwhile; ?>





              <?php endif; ?>

<?php
////////////////////////////////////////////////////////////////////////////////
//////////////////// SPONSORS ////////////////////
////////////////////////////////////////////////////////////////////////////////
?>

            <?php
              $sponsor_page = get_page_by_title( 'Front Page Sponsors');
              //var_dump($sponsor_page->post_content);
            ?>
            </div> <?php // end #main ?>
            <div id="sidebar pull-right">
              <div id="sponsor-sidebar">
                <?php if($sponsor_page->post_content <> "") { ?>
                <h2>SPONSORED BY:</h2>
                <div>
                  <?php echo wpautop($sponsor_page->post_content); ?>

                </div>
                <?php } ?>
              </div>
            </div>



      </div> <?php // end #content ?>

    </div> <!-- end ./container -->

<?php get_footer(); ?>

