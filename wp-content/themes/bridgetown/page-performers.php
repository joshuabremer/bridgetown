<?php
/*
Template Name: Page - Performer Index
*/
?>

<?php get_header(); ?>

      <div class="container">

        <div id="content" class="clearfix row">

          <div id="main" class="col-md-12 clearfix" role="main">

            <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

              <header>

                <div class=""><h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1></div>

              </header> <!-- end article header -->

              <section class="entry-content clearfix" itemprop="articleBody">
                <?php
                query_posts( 'post_type=performer&posts_per_page=-1&orderby=menu_order&order=asc');
                ?>
                <div class="container performer-list">
                  <div class="row">

                    <?php while ( have_posts() ) : the_post(); ?>

                    <div class="col-sm-4 col-md-3 col-lg-2 performer-tile">
                    <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('150x150'); ?>
                    </a><br />
                    <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                    </a>
                      <div class="clearfix"></div>
                    </div>



                    <?php endwhile; ?>
                  </div>


                </div>

              </section> <!-- end article section -->

              <footer>

                <?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","bonestheme") . ':</span> ', ', ', '</p>'); ?>

              </footer> <!-- end article footer -->

            </article> <!-- end article -->

          </div> <!-- end #main -->

        </div> <!-- end #content -->

      </div> <!-- end .container -->

<?php get_footer(); ?>
