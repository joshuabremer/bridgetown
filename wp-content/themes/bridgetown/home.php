<?php get_header(); ?>

    <div class="container">

			<div id="content" class="row clearfix">

						<div id="main" class="col-md-8 clearfix" role="main">
							<?php 
							$front_page = get_page_by_title( 'Front Page' );
							//var_dump($sponsor_page->post_content);
							?>
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">

									<section class="entry-content clearfix">
										<?php echo $front_page->post_content; ?>
									</section>
							</article>

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">

								<header class="article-header">

									<h1 class="h1"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
									

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


                  <?php if (function_exists("emm_paginate")) { ?>
                      <?php emm_paginate(); ?>
									<?php } else { ?>
											<nav class="wp-prev-next">
													<ul class="clearfix">
														<li class="prev-link"><?php next_posts_link( __( '&laquo; Older Entries', 'bonestheme' )) ?></li>
														<li class="next-link"><?php previous_posts_link( __( 'Newer Entries &raquo;', 'bonestheme' )) ?></li>
													</ul>
											</nav>
									<?php } ?>

							<?php endif; ?>

						</div> <?php // end #main ?>
						<?php 
							$sponsor_page = get_page_by_title( 'Front Page Sponsors' );
							//var_dump($sponsor_page->post_content);
						?>
						<div id="sidebar" class="pull-right">
							<div id="sponsor-sidebar">

								<h2>SPONSORED BY:</h2>
								<div>
									<?php echo $sponsor_page->post_content; ?>
								</div>


							</div>

						</div>


			</div> <?php // end #content ?>

    </div> <!-- end ./container -->

<?php get_footer(); ?>
