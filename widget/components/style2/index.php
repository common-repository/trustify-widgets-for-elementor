<?php
use Elementor\Icons_Manager;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

require_once TRFY_PLUGIN_PATH ."/utils/index.php";
require_once TRFY_PLUGIN_PATH . "/utils/custom-functions.php";

function trfy_listHtml($settings, $profile_data, $feedback_data){
  $selected_language = $settings['lang_options'];

  if ($selected_language === 'lang_auto') {
      $selected_language = determine_locale(); // Auto-detect language by WordPress
  } elseif ($selected_language === 'lang_browser') {
      $user_language = trfy_custom_determine_user_language();
      $selected_language = $user_language ? $user_language : determine_locale();
  }

  $locale_path = TRFY_PLUGIN_PATH . '/languages/' . $selected_language . '.mo';

  // Check if the specific language file exists
  if (file_exists($locale_path)) {
      load_textdomain('trustify-widgets-for-elementor', $locale_path);
  } else {
      // Convert the specific language code to primary language code
      $primary_language = strtok($selected_language, '_');
      $primary2_language = strtok($selected_language, '_');
      
      // Convert the primary2 language code to uppercase
      $primary2_language = strtoupper($primary_language);
    

      $fallback_locale_path = TRFY_PLUGIN_PATH . '/languages/' . $primary_language . '_' . $primary2_language . '.mo';

      if (file_exists($fallback_locale_path)) {
          load_textdomain('trustify-widgets-for-elementor', $fallback_locale_path);
      } else {
          // Fallback to the default language if both specific and primary variants are not found
          load_default_textdomain('trustify-widgets-for-elementor');
      }
  }

  
  ?>
    
    <div class="w-list_wrapper">
      <div class="rating-title">
        <div id="w-title">
        <?php
        $average = $profile_data['average'];
        if ($average !== null) {
        ?>
        <span class="title-large"><?php esc_html_e('Rated', 'trustify-widgets-for-elementor'); ?> <b>
        <?php
            if ($average > 4.5) {
              esc_html_e('Excellent', 'trustify-widgets-for-elementor');
          } elseif ($average > 4.0) {
              esc_html_e('Very Good', 'trustify-widgets-for-elementor');
          } elseif ($average > 3.5) {
              esc_html_e('Good', 'trustify-widgets-for-elementor');
          } elseif ($average > 2.5) {
              esc_html_e('Acceptable', 'trustify-widgets-for-elementor');
          } elseif ($average > 1.5) {
              esc_html_e('Sufficient', 'trustify-widgets-for-elementor');
          } else {
              esc_html_e('Inadequate', 'trustify-widgets-for-elementor');
          }
        ?>
    </b>
    <?php
        } else {
          esc_html_e('No Reviews', 'trustify-widgets-for-elementor');
        }
    ?>
    </b> <?php esc_html_e('on', 'trustify-widgets-for-elementor'); ?></span>
          <a href="<?php echo esc_url( 'https://in.trustify.ch/' . $settings['api_profile_username'] ); ?>" target="_blank">
          <?php if ($settings['trustify_logo_dark_mode'] === 'yes') : ?>
            <!-- Dark Mode Logo -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 661.64 105.78" width="512px" height="512px">
                <defs></defs>
                <title>Trustify</title>
                <g id="Ebene_2" data-name="Ebene 2">
                    <g id="Ebene_3" data-name="Ebene 3">
                        <polygon fill="#ffffff" points="62.05 63.49 62.05 104.38 37.57 104.38 37.57 91.95 62.05 63.49"/>
                        <polygon fill="#ffffff" points="62.06 1.67 62.06 25.31 37.55 54.02 37.55 24.14 8.95 24.14 8.95 1.67 62.06 1.67"/>
                        <polygon fill="#0179B5" points="109.13 1.78 73.37 43.53 63.05 55.57 63.05 55.48 62.07 56.63 47.47 73.72 37.55 85.34 37.55 85.36 36.73 86.31 0 43.34 21.13 43.34 36.73 61.72 36.97 61.44 37.55 60.75 41.58 56.04 47.51 49.16 62.07 32.23 63.23 30.87 63.23 30.74 73.37 18.89 88 1.78 109.13 1.78"/>
                        <path fill="#ffffff" d="M135.88,61.73q9.41-4.38,13.82-11.43t4.42-17.8q0-14.83-10.49-23T115,1.43L98.65,20.51h15.88c4.75,0,8.33,1.26,10.78,3.8s3.67,6,3.67,10.45-1.21,7.9-3.63,10.39-6,3.71-10.82,3.71h-16V20.6l-22,25.66v-.09l-1,1.16L73.37,50v54.41H98.58V68h13.65l18.46,36.4h27V103.3Z"/>
                        <path fill="#ffffff" d="M226.18,1.42V68.66q0,9.54-4,13.79t-11.85,4.24q-15.54,0-16-16.9V1.42H169V69.29q.21,17,11.21,26.73t30.11,9.76q12.65,0,21.9-4.39a31.87,31.87,0,0,0,14.23-12.76q5-8.37,5-19.83V1.42Z"/>
                        <path fill="#ffffff" d="M329.36,50.35A93.46,93.46,0,0,0,311.54,43q-10.86-3.43-15.16-6.65c-2.88-2.15-4.31-4.53-4.31-7.17A8.94,8.94,0,0,1,296,21.68q3.91-2.94,10.67-2.94t10.6,3.46q3.92,3.47,3.91,9.76h25.15a29,29,0,0,0-5-16.71A31.84,31.84,0,0,0,327.45,4a49.46,49.46,0,0,0-20.22-4,56.52,56.52,0,0,0-20.84,3.65q-9.27,3.65-14.33,10.17A24,24,0,0,0,267,28.92q0,17.19,20.33,27a133,133,0,0,0,16.1,6.28q9.84,3.25,13.75,6.29A10.16,10.16,0,0,1,321.09,77a8.71,8.71,0,0,1-3.63,7.46q-3.63,2.66-9.88,2.65-9.76,0-14.11-3.92c-2.9-2.61-4.35-6.69-4.35-12.2H263.83A31.66,31.66,0,0,0,269,89q5.2,7.83,15.52,12.31a56.92,56.92,0,0,0,23,4.49q18,0,28.39-7.71t10.34-21.21Q346.31,60,329.36,50.35Z"/>
                        <path fill="#ffffff" d="M353.92,1.42V20.58h30.83v83.78H410V20.58h31.39V1.42Z"/>
                        <path fill="#ffffff" d="M453.72,1.42V104.36h25.14V1.42Z"/>
                        <path fill="#ffffff" d="M566.37,20.58V1.42h-70V104.36h25.22v-41h40.66V44.26H521.62V20.58Z"/>
                        <path fill="#ffffff" d="M634.41,1.42,615.16,46.1,595.83,1.42H568.75l33.62,66v37h25.57v-37l33.7-66Z"/>
                        <polygon fill="#ffffff" points="205.44 16.79 205.55 16.79 205.44 16.93 205.44 16.79"/>
                    </g>
                </g>
            </svg>
            <?php else : ?>
                <!-- Regular Logo -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 661.64 105.78" width="512px" height="512px">
                    <defs></defs>
                    <title>Trustify</title>
                    <g id="Ebene_2" data-name="Ebene 2">
                        <g id="Ebene_3" data-name="Ebene 3">
                            <polygon fill="#1e1e1e" points="62.05 63.49 62.05 104.38 37.57 104.38 37.57 91.95 62.05 63.49"/>
                            <polygon fill="#1e1e1e" points="62.06 1.67 62.06 25.31 37.55 54.02 37.55 24.14 8.95 24.14 8.95 1.67 62.06 1.67"/>
                            <polygon fill="#0079b5" points="109.13 1.78 73.37 43.53 63.05 55.57 63.05 55.48 62.07 56.63 47.47 73.72 37.55 85.34 37.55 85.36 36.73 86.31 0 43.34 21.13 43.34 36.73 61.72 36.97 61.44 37.55 60.75 41.58 56.04 47.51 49.16 62.07 32.23 63.23 30.87 63.23 30.74 73.37 18.89 88 1.78 109.13 1.78"/>
                            <path fill="#1e1e1e" d="M135.88,61.73q9.41-4.38,13.82-11.43t4.42-17.8q0-14.83-10.49-23T115,1.43L98.65,20.51h15.88c4.75,0,8.33,1.26,10.78,3.8s3.67,6,3.67,10.45-1.21,7.9-3.63,10.39-6,3.71-10.82,3.71h-16V20.6l-22,25.66v-.09l-1,1.16L73.37,50v54.41H98.58V68h13.65l18.46,36.4h27V103.3Z"/>
                            <path fill="#1e1e1e" d="M226.18,1.42V68.66q0,9.54-4,13.79t-11.85,4.24q-15.54,0-16-16.9V1.42H169V69.29q.21,17,11.21,26.73t30.11,9.76q12.65,0,21.9-4.39a31.87,31.87,0,0,0,14.23-12.76q5-8.37,5-19.83V1.42Z"/>
                            <path fill="#1e1e1e" d="M329.36,50.35A93.46,93.46,0,0,0,311.54,43q-10.86-3.43-15.16-6.65c-2.88-2.15-4.31-4.53-4.31-7.17A8.94,8.94,0,0,1,296,21.68q3.91-2.94,10.67-2.94t10.6,3.46q3.92,3.47,3.91,9.76h25.15a29,29,0,0,0-5-16.71A31.84,31.84,0,0,0,327.45,4a49.46,49.46,0,0,0-20.22-4,56.52,56.52,0,0,0-20.84,3.65q-9.27,3.65-14.33,10.17A24,24,0,0,0,267,28.92q0,17.19,20.33,27a133,133,0,0,0,16.1,6.28q9.84,3.25,13.75,6.29A10.16,10.16,0,0,1,321.09,77a8.71,8.71,0,0,1-3.63,7.46q-3.63,2.66-9.88,2.65-9.76,0-14.11-3.92c-2.9-2.61-4.35-6.69-4.35-12.2H263.83A31.66,31.66,0,0,0,269,89q5.2,7.83,15.52,12.31a56.92,56.92,0,0,0,23,4.49q18,0,28.39-7.71t10.34-21.21Q346.31,60,329.36,50.35Z"/>
                            <path fill="#1e1e1e" d="M353.92,1.42V20.58h30.83v83.78H410V20.58h31.39V1.42Z"/>
                            <path fill="#1e1e1e" d="M453.72,1.42V104.36h25.14V1.42Z"/>
                            <path fill="#1e1e1e" d="M566.37,20.58V1.42h-70V104.36h25.22v-41h40.66V44.26H521.62V20.58Z"/>
                            <path fill="#1e1e1e" d="M634.41,1.42,615.16,46.1,595.83,1.42H568.75l33.62,66v37h25.57v-37l33.7-66Z"/>
                            <polygon fill="#1e1e1e" points="205.44 16.79 205.55 16.79 205.44 16.93 205.44 16.79"/>
                        </g>
                    </g>
                </svg>
            <?php endif; ?>
          </a>
        </div>

        <div id="w-description">
           <span class="title-description">
              <?php esc_html_e('Based on', 'trustify-widgets-for-elementor'); ?>
              <b>
                  <a href="https://in.trustify.ch/<?php echo esc_attr( $settings['api_profile_username'] ); ?>" target="_blank">
                      <?php echo esc_html( $profile_data['total'] ); ?> <?php esc_html_e('Reviews', 'trustify-widgets-for-elementor'); ?>
                  </a>
              </b>
              <?php esc_html_e('with an average rating of', 'trustify-widgets-for-elementor'); ?>
              <b>
                  <a href="https://in.trustify.ch/<?php echo esc_attr( $settings['api_profile_username'] ); ?>" target="_blank">
                      <?php echo esc_html( $profile_data['average'] ); ?> / 5
                  </a>
              </b>
          </span>
          <span class="trustify-r-star">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 19.481 19.481" enable-background="new 0 0 19.481 19.481" width="512px" height="512px"><g><g>
              <path d="m10.201,.758l2.478,5.865 6.344,.545c0.44,0.038 0.619,0.587 0.285,0.876l-4.812,4.169 1.442,6.202c0.1,0.431-0.367,0.77-0.745,0.541l-5.452-3.288-5.452,3.288c-0.379,0.228-0.845-0.111-0.745-0.541l1.442-6.202-4.813-4.17c-0.334-0.289-0.156-0.838 0.285-0.876l6.344-.545 2.478-5.864c0.172-0.408 0.749-0.408 0.921,0z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#172B4D"/>
              </g></g> 
            </svg>
          </span>
        </div>
      </div>


      <div class="list-full">
        <?php 
        foreach ($feedback_data["items"] as $key => $feedback) {
        ?>
        <div class="list-child">
          <div class="w-review-head">
          <div class="w-review_title">
            <?php
              $value = $feedback['value'];
              if ($value >= 5) {
                esc_html_e('Excellent', 'trustify-widgets-for-elementor');
            } elseif ($value >= 4) {
                esc_html_e('Very Good', 'trustify-widgets-for-elementor');
            } elseif ($value >= 3) {
                esc_html_e('Good', 'trustify-widgets-for-elementor');
            } elseif ($value >= 2) {
                esc_html_e('Acceptable', 'trustify-widgets-for-elementor');
            } elseif ($value >= 1) {
                esc_html_e('Inadequate', 'trustify-widgets-for-elementor');
            } else {
                esc_html_e('No Review', 'trustify-widgets-for-elementor');
            }
            ?>
        </div>
            <div class="w-review-author"><?php esc_html_e('by', 'trustify-widgets-for-elementor'); ?> 
              <?php echo esc_html( $feedback['username'] ? $feedback['username'] : 'Anonymous' ); ?>
            </div>
          </div>
          <div class="w-review-body">
            <p class="w-review-content"><?php echo esc_html($feedback['text']); ?></p>
          </div>
          <div class="w-review-footer">
          <div class="w-review-date">
            <?php esc_html_e('Posted', 'trustify-widgets-for-elementor'); ?>
            <?php
            // translators: %s is a placeholder for the time duration
             echo esc_html( sprintf(esc_html__('%s ago', 'trustify-widgets-for-elementor'), human_time_diff(strtotime($feedback['createdAt']), current_time('timestamp'))) ); 
            ?>
          </div>
            <div class="w-review-rating">
              <?php
              for ($i = 1; $i < 6; $i++) {
                $classes = '';
                if($feedback['value'] < $i){
                  $classes = 'empty-star';
                }
                echo '<i aria-hidden="true" class="' . esc_html( 'fas fa-star ' . $classes ) . '"></i>';
              }
              ?>
            </div>
          </div>
        </div>
        <?php
        }
        ?>
      </div>
    </div>
<?php
}