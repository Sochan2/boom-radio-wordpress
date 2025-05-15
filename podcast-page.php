<?php

/**
 * Template Name: Podcast Page
 */
get_template_part('parts/header');
?>

<div class="container py-5">
    <div class="podcast-container">
       
        <div class="text-container">
            <h1>Latest Episodes</h1>
            <h3 class="">Podcasts</h3>
            <p>Discover the freshest content from our team. Tune in to thoughtful discussions, interviews, and updates on the latest trends.</p>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/podcast-cover.jpg" alt="Podcast cover" class="img-fluid rounded shadow">
        </div>

        
        <div class="">
            <div class="">
                <?php
                $access_token = get_spotify_access_token();
                $show_id = '1q2IxKPA9EeoeRQkIqK5Vv'; 

                if ($access_token && $show_id) {
                    $response = wp_remote_get("https://api.spotify.com/v1/shows/{$show_id}/episodes?market=US&limit=6", [
                        'headers' => [
                            'Authorization' => 'Bearer ' . $access_token,
                        ],
                    ]);

                    if (!is_wp_error($response)) {
                        $episodes = json_decode(wp_remote_retrieve_body($response), true)['items'];

                        foreach ($episodes as $episode): ?>
                            <div class="col-12">
                                <div class="">
                                    <iframe style="border-radius:12px"
                                        src="https://open.spotify.com/embed/episode/<?php echo esc_attr($episode['id']); ?>"
                                        width="600" height="200" frameborder="0" allowfullscreen
                                        allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy">
                                    </iframe>
                                </div>
                            </div>
                <?php endforeach;
                    } else {
                        echo '<p>Error fetching episodes.</p>';
                    }
                } else {
                    echo '<p>Spotify access token failed.</p>';
                }
                ?>
            </div>
        </div>
    </div>
</div>

<!-- Live Radio Player -->
<div id="live-radio-player" class="live-radio">
  <iframe src="https://tunein.com/embed/player/s195836/" width="100%" height="100" scrolling="no" frameborder="no"></iframe>
</div>

<!-- Floating Toggle Button -->
<button id="radio-toggle" class="radio-toggle">
  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/radio-icon.svg" width="80" alt="radio-icon" class="img-fluid">
</button>

<!-- Script for radio player -->
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const player = document.getElementById("live-radio-player");
    const toggleBtn = document.getElementById("radio-toggle");
    const playButton = document.querySelector(".play-button");

    function togglePlayer() {
      if (player) {
        player.classList.toggle("visible");
      }
      if (toggleBtn) {
        toggleBtn.classList.toggle("radio-active");
      }
    }

    if (toggleBtn) {
      toggleBtn.addEventListener("click", togglePlayer);
    }

    if (playButton) {
      playButton.addEventListener("click", togglePlayer);
    }
  });
</script>

<?php get_template_part('parts/footer'); ?>