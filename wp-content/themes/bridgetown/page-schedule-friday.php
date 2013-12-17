<?php
/*
Template Name: Page - Schedule Friday
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
                $venues = array('Hawthorne Theatre','White Owl');
                query_posts( 'post_type=event&posts_per_page=-1&orderby=menu_order&order=asc');
                $minimum_time = 819230912839081209380123;
                $maximum_time = 0;
                ?>
                    <?php while ( have_posts() ) : the_post();

                    $meta = get_post_meta(get_the_ID());
                    $event_price = $meta["_brew_event_price"][0];
                    $event_start = $meta["_brew_event_start"][0];
                    $event_end = $meta["_brew_event_end"][0];
                    $event_venue = $meta["_brew_event_venue"][0];
                    $duration = ($event_end - $event_start) / 60;
                    $events[] = array("event_venue" => $event_venue, "price" => $event_price, "event_start" => $event_start, "event_end" => $event_end, "duration" => $duration);
                    $minimum_time = min($event_start,$minimum_time);
                    $maximum_time = max($event_end,$maximum_time);
                    ?>
                    <?php endwhile; ?>


              <table class="schedule-grid">
                <thead>
                  <tr>
                    <td>Time</td>
                    <?php
                    foreach($venues as $venue) {
                      echo "<td>" . $venue . "</td>";
                    }
                    ?>
                  </tr>
                </thead>
                <tbody>
                <?php
                $rowspan_tracker = array();
                for ($i = $minimum_time; $i <= $maximum_time; $i = $i + (60*30)) {
                  echo "<tr>";
                  echo "<td>" .  date('h:i a',$i) . "</td>";

                  foreach($venues as $venue) {
                      $events_for_current_time = event_search($events, $i, $venue);


                          if (isset($events_for_current_time[0])) {
                            $rowspan_tracker[$venue] = $events_for_current_time[0]["duration"]/30;
                            echo "<td rowspan='" . $events_for_current_time[0]["duration"]/30 . "'>";
                            echo $events_for_current_time[0]["price"];
                            echo "</td>";
                          } else if ($rowspan_tracker[$venue] > 1) {
                            $rowspan_tracker[$venue] = $rowspan_tracker[$venue] - 1;
                          } else {
                            echo "<td></td>";
                          }
                        } // End of Row
                      ?>
                </tr>
                <?php
                }
                ?>
                </tbody>
              </table>

              </section> <!-- end article section -->

              <footer>

                <?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","bonestheme") . ':</span> ', ', ', '</p>'); ?>

              </footer> <!-- end article footer -->

            </article> <!-- end article -->

          </div> <!-- end #main -->

        </div> <!-- end #content -->

      </div> <!-- end .container -->

<?php get_footer(); ?>


<?php
function event_search($array, $time, $venue)
{
    $results = array();

    foreach ($array as $subarray) {
      if ($subarray['event_start'] == $time && $subarray['event_venue'] == $venue) {
          $results[] = $subarray;
      }
    }

    return $results;
}

?>
