<?php

/**
 * Template Name: Podcast Page
 */
get_template_part('parts/header');
?>

<main class="">
  <div class="text-container">
    <h1 class="podcast-title">Latest Episodes</h1>
    <p class="podcast-sub-title">Podcasts</p>
  </div>

  <div class="podcast-container">
    <div class="podcast-1-container">
      <h3 class="bold">Boom Re-Heated</h3>
      <p>The place to catch-up on every Breakfast and Drive Show from Monday to Friday. Whether it be the Chaos of April & Asha, or the Friendliness of Jev & Jordan.</p>


      <div class="">
        <?php
        $access_token = get_spotify_access_token();
        $show_id = '1q2IxKPA9EeoeRQkIqK5Vv';

        if ($access_token && $show_id) {
          $response = wp_remote_get("https://api.spotify.com/v1/shows/{$show_id}/episodes?market=US&limit=9", [
            'headers' => [
              'Authorization' => 'Bearer ' . $access_token,
            ],
          ]);

          if (!is_wp_error($response)) {
            $episodes = json_decode(wp_remote_retrieve_body($response), true)['items'];

            foreach ($episodes as $episode): ?>
              <div class="col-12">
                <div class="responsive-iframe">
                  <iframe style="border-radius:12px"
                    src="https://open.spotify.com/embed/episode/<?php echo esc_attr($episode['id']); ?>"
                    width="500" height="200" allowfullscreen
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

    <div class="podcast-2-container">
      <h3 class="bold">Boom Originals</h3>
      <p>Listen to all the best speciality podcasts, from Dusk till Dust with Angus, to the Wrestle Wrap Up with Rhylan, and Another Round with Jev and Jordan.</p>


      <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed bold" style="background-color: #fe6a34" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
              Dusk Till Dust:
            </button>
          </h2>
          <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Take a Tour through the (non-existant & completely fictional) Nowhere Manor with Angus; as he tells Morbid (and Obscure) tales, showcases an Australian Artist, talks about a variety of Cryptids and Monsters that used to be Cryptids, has a go at Tarot (without reading how to do Tarot), Tries to Sell something (but inevitably gets distracted with his opinions on a piece of Horror Media), and rambles out Jargon that's probably meant to be inspiring or wholesome (we haven't been able to tell just yet).</div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed bold" type="button" style="background-color: #fe6a34" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
              Wrestle Wrap Up:
            </button>
          </h2>
          <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Join Rhylan and Bryzer as they discuss all things WWE. Whether its upcoming matches, possible outcomes of rivalries, or just flat out rants about all things wrestling... there's no better place for it all on The Wrestle Wrap Up.</div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed bold" type="button" style="background-color: #fe6a34" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
              Another Round:
            </button>
          </h2>
          <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Visit the Local Pub to Have Another Round with Jev and Jordan, as they having a yarn about some useless pub topics, nostalgic sporting moments, and also check out their insta reels. Y’know, regular Pub Stuff.</div>
          </div>
        </div>
      </div>
      <div class="">
        <?php
        $access_token = get_spotify_access_token();
        $show_id = '6m40vCGngb9wTO6bj4cJvY';

        if ($access_token && $show_id) {
          $response = wp_remote_get("https://api.spotify.com/v1/shows/{$show_id}/episodes?market=US&limit=13", [
            'headers' => [
              'Authorization' => 'Bearer ' . $access_token,
            ],
          ]);

          if (!is_wp_error($response)) {
            $body = json_decode(wp_remote_retrieve_body($response), true);

            if (isset($body['items']) && is_array($body['items']) && count($body['items']) > 0) {
              $validEpisodes = array_filter($body['items'], function ($episode) {
                return isset($episode['id']) && !empty($episode['id']);
              });

              if (count($validEpisodes) === 0) {
                echo '<p>No valid episodes found.</p>';
              } else {
                foreach ($validEpisodes as $episode):
                  $episodeId = esc_attr($episode['id']);
                  $embedUrl = "https://open.spotify.com/embed/episode/$episodeId";
        ?>
                  <div class="col-12">
                    <div class="responsive-iframe">
                      <iframe style="border-radius:12px"
                        src="<?php echo esc_url($embedUrl); ?>"
                        width="500" height="200" allowfullscreen
                        allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy">
                      </iframe>
                    </div>
                  </div>
        <?php endforeach;
              }
            } else {
              echo '<p>No episodes found for this show.</p>';
            }
          } else {
            echo '<p>Error fetching episodes from Spotify API.</p>';
          }
        } else {
          echo '<p>Spotify access token or show ID is missing.</p>';
        }
        ?>

      </div>
    </div>



  </div>
</main>

<!-- Live Radio Player -->
<div id="live-radio-player" class="live-radio">
  <iframe src="https://tunein.com/embed/player/s195836/" width="100" height="100"></iframe>
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