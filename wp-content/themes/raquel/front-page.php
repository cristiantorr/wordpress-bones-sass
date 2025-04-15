<?php get_header();
/* 
 * Template Name: Plantilla inicio
 *
 * @package WordPress
 * @subpackage raquel
 *
 */ ?>


<?php
// ACF Campos para pagina de inicio (page)

$sectionBanner = get_field('section_banners');


if ($sectionBanner && $sectionBanner['enable_section']):
  $bannerImg = $sectionBanner["banner_img"]; ?>
  <section class="main-brand full clear-fix">
    <div class="wrapper-main center">
      <figure class="logo-raquel">
        <img src="<?php echo esc_url($bannerImg["url"]); ?>" alt="<?php echo esc_attr($bannerImg["title"]); ?>">
      </figure>
    </div>
  </section>
<?php endif; ?>
<section class="main-app full clear-fix">
  <?php
  // ACF Campos para pagina de inicio (page)
  
  $sectionParticipants = get_field('section_participants');

  if ($sectionParticipants && $sectionParticipants['enable_section'] && !empty($sectionParticipants["participants_sliders"])):
    $participantSliders = $sectionParticipants["participants_sliders"];
    $participanLink = !empty($sectionParticipants['participants_wa']) ? $sectionParticipants['participants_wa'] : false; ?>
    <section class="banner-home relative clear-fix" id="banner-home">
      <div class="swiper swiper-banner-home">
        <div class="swiper-wrapper">
          <?php foreach ($participantSliders as $participantSlider):
            $slider = $participantSlider["slider"];
            $sliderXs = $participantSlider["slider_xs"];
            if ($slider): ?>
              <div class="swiper-slide">
                <figure class="img-xl">
                  <img src="<?php echo esc_url($slider["url"]); ?>" alt="<?php echo esc_attr($slider["url"]); ?>">
                </figure>
              <?php endif; ?>
              <?php if ($sliderXs): ?>
                <figure class="img-xs">
                  <img src="<?php echo esc_url($sliderXs["url"]); ?>" alt="<?php echo esc_attr($sliderXs["url"]); ?>">
                </figure>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="swiper-button-next next-home"></div>
      <div class="swiper-button-prev prev-home"></div>
      <?php if ($participanLink): ?>
        <a href="<?php echo ($participanLink) ? esc_url($participanLink['url']) : 'javascript:;' ?>"
          target="<?php echo ($participanLink['target']) ? esc_html($participanLink['target']) : '_self'; ?>"
          class="btn-ws-top"><?php echo ($participanLink['title']) ? $participanLink["title"] : "CONTACT HERE"; ?></a>
      <?php endif; ?>
    </section>
  <?php endif; ?>


  <?php
  // ACF Campos para pagina de inicio (page)
  
  $sectionArtist = get_field('section_artist');


  if ($sectionArtist && $sectionArtist['enable_section']):
    $artistImg = $sectionArtist["artist_img"]; ?>
    <section id="sobre-el-artista" class="main-artista relative full clear-fix">
      <div class="wrapper-main center relative">
        <div class="grid-colums-two">
          <?php if ($artistImg): ?>
            <figure data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
              <img src="<?php echo esc_url($artistImg["url"]); ?>" alt="<?php echo esc_attr($artistImg["title"]); ?>">
            </figure>
          <?php endif; ?>
          <?php if (!empty($sectionArtist["artist_desc"])): ?>
            <article data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
              <?php echo wp_kses_post($sectionArtist["artist_desc"]); ?>
            </article>
          <?php endif; ?>
        </div>
      </div>
      <img src="<?php echo get_stylesheet_directory_uri() . '/library/' ?>images/pintura-1.png" alt="" class="pintura-1">
    </section>
  <?php endif; ?>
  <?php
  // ACF Campos para pagina de inicio (page)
  
  $sectionWater = get_field('section_water');


  if ($sectionWater && $sectionWater['enable_section']):
    $sectionWaterTitle = $sectionWater["water_title"];
    $sectionWaterImgDesc = $sectionWater["water_img_desc"];
    $sectionWaterTitleTwo = $sectionWater["water_title_two"]; ?>
    <section class="main-agua relative full clear-fix">
      <div class="wrapper-main center relative">
        <?php if ($sectionWaterTitle || !empty($sectionWater["water_desc"]) || $sectionWaterImgDesc): ?>
          <div class="grid-colums-two-agua full relative">
            <?php if ($sectionWaterTitle || !empty($sectionWater["water_desc"])): ?>
              <article data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
                <?php if ($sectionWaterTitle): ?>
                  <div class="title">
                    <img src="<?php echo esc_url($sectionWaterTitle["url"]); ?>"
                      alt="<?php echo esc_attr($sectionWaterTitle["title"]); ?>">
                  </div>
                <?php endif; ?>
                <?php if (!empty($sectionWater["water_desc"])): ?>
                  <div class="caption">
                    <?php echo wp_kses_post($sectionWater["water_desc"]); ?>
                  </div>
                <?php endif; ?>
              </article>
            <?php endif; ?>
            <?php if ($sectionWaterImgDesc): ?>
              <figure data-aos="fade-up" data-aos-delay="900" data-aos-duration="1000">
                <img src="<?php echo esc_url($sectionWaterImgDesc["url"]); ?>"
                  alt="<?php echo esc_attr($sectionWaterImgDesc["title"]); ?>">
              </figure>
            <?php endif; ?>
          </div>
        <?php endif; ?>
        <div class="clr"></div>
        <?php if ($sectionWaterTitleTwo || !empty($sectionWater["water_desc_two"])): ?>
          <div class="grid-colums-two-pez full relative">
            <?php if ($sectionWaterTitleTwo): ?>
              <div class="title-2" data-aos="fade-right" data-aos-delay="800" data-aos-duration="1000">
                <img src="<?php echo esc_url($sectionWaterTitleTwo["url"]); ?>"
                  alt="<?php echo esc_attr($sectionWaterTitleTwo["title"]); ?>">
              </div>
            <?php endif; ?>
            <?php if (!empty($sectionWater["water_desc_two"])): ?>

              <div class="figcaption" data-aos="fade-left" data-aos-delay="800" data-aos-duration="1000">
                <?php echo wp_kses_post($sectionWater["water_desc_two"]); ?>
              </div>
            <?php endif; ?>
            <img src="<?php echo get_stylesheet_directory_uri() . '/library/' ?>images/pez.png" alt=""
              class="pez-1 dx-none">
            <img src="<?php echo get_stylesheet_directory_uri() . '/library/' ?>images/pez-2.png" alt="" class="pez-2">
          </div>
        <?php endif; ?>
      </div>
      <div class="clr"></div>

      <img src="<?php echo get_stylesheet_directory_uri() . '/library/' ?>images/mancha-2.png" alt="" class="pintura-2">
    </section>
  <?php endif; ?>



  <section class="main-manuscrita relative full clear-fix">
    <?php
    // ACF Campos para pagina de inicio (page)
    
    $sectionHandwritten = get_field('section_handwritten');


    if ($sectionHandwritten && $sectionHandwritten['enable_section'] && !empty($sectionHandwritten["handwritten_sliders"])):
      $handwrittenSliders = $sectionHandwritten["handwritten_sliders"]; ?>
      <div class="wrapper-main-full center relative gallery-card">
        <section class="main-swiper-card clear-fix relative">
          <div class="relative">
            <div class="swiper swiper-cards">
              <div class="swiper-wrapper">
                <?php foreach ($handwrittenSliders as $handwrittenSlider):
                  $slider = $handwrittenSlider["slider"];
                  if ($slider): ?>
                    <div class="swiper-slide">
                      <figure>
                        <img src="<?php echo esc_url($slider["url"]); ?>" alt="<?php echo esc_attr($slider["url"]); ?>">
                      </figure>
                    </div>
                  <?php endif; endforeach; ?>
              </div>
            </div>
            <div class="swiper-button-next next-card next-top"></div>
            <div class="swiper-button-prev prev-card prev-top"></div>
          </div>
          <div class="swiper-pagination pagination-site pagination-card"></div>
        </section>
      </div>
    <?php endif; ?>
    <div class="clr"></div>
    <?php
    // ACF Campos para pagina de inicio (page)
    
    $sectionLetter = get_field('section_letters');


    if ($sectionLetter && $sectionLetter['enable_section']):
      $letterTitle = $sectionLetter["letter_title"]; ?>
      <div class="wrapper-main center relative">
        <?php if ($letterTitle): ?>
          <div class="title-3">
            <img src="<?php echo esc_url($letterTitle["url"]); ?>" alt="<?php echo esc_attr($letterTitle["url"]); ?>">
          </div>
        <?php endif; ?>
        <?php if (!empty($sectionLetter["letter_desc"])): ?>
          <article>
            <?php echo wp_kses_post($sectionLetter["letter_desc"]); ?>
          </article>
        <?php endif; ?>
        <?php if ($sectionLetter["icon_one"]): ?>
          <img src="<?php echo esc_url($sectionLetter["icon_one"]["url"]); ?>"
            alt="<?php echo esc_url($sectionLetter["icon_one"]["title"]); ?>" class="ornamento-1 dx-none" data-aos="zoom-in"
            data-aos-delay="600" data-aos-duration="1000">
        <?php endif; ?>
        <?php if ($sectionLetter["icon_two"]): ?>

          <img src="<?php echo esc_url($sectionLetter["icon_two"]["url"]); ?>"
            alt="<?php echo esc_url($sectionLetter["icon_two"]["title"]); ?>" class="ornamento-2 dx-none" data-aos="zoom-in"
            data-aos-delay="800" data-aos-duration="1000">
        <?php endif; ?>
        <?php if ($sectionLetter["icon_three"]): ?>

          <img src="<?php echo esc_url($sectionLetter["icon_three"]["url"]); ?>"
            alt="<?php echo esc_url($sectionLetter["icon_three"]["title"]); ?>" class="ornamento-3 dx-none"
            data-aos="zoom-in" data-aos-delay="1000" data-aos-duration="1000">
        <?php endif; ?>
        <?php if ($sectionLetter["icon_four"]): ?>

          <img src="<?php echo esc_url($sectionLetter["icon_four"]["url"]); ?>"
            alt="<?php echo esc_url($sectionLetter["icon_four"]["title"]); ?>" class="ornamento-4 dx-none"
            data-aos="zoom-in" data-aos-delay="1200" data-aos-duration="1000">
        <?php endif; ?>

        <img src="<?php echo get_stylesheet_directory_uri() . '/library/' ?>images/ic-8.png" alt=""
          class="ornamento-5 dx-none" data-aos="fade-down" data-aos-delay="1400" data-aos-duration="1000">
        <img src="<?php echo get_stylesheet_directory_uri() . '/library/' ?>images/mancha-1.png" alt=""
          class="ornamento-6 dx-none" data-aos="zoom-in" data-aos-delay="1600" data-aos-duration="1000">



      </div>
    <?php endif; ?>
    <div class="clr"></div>
    <?php
    // ACF Campos para pagina de inicio (page)
    
    $sectionGallery = get_field('section_gallery');


    if ($sectionGallery && $sectionGallery['enable_section'] && !empty($sectionGallery["gallery_sliders"])):
      $gallerySliders = $sectionGallery["gallery_sliders"]; ?>
      <div class="wrapper-main-full center relative gallery-card">
        <section class="main-swiper-gallery clear-fix relative">
          <div class="relative">
            <div class="swiper swiper-gallery">
              <div class="swiper-wrapper">
                <?php foreach ($gallerySliders as $gallerySlider):
                  $slider = $gallerySlider["slider"];
                  if ($slider): ?>
                    <div class="swiper-slide">
                      <figure>
                        <img src="<?php echo esc_url($slider["url"]); ?>" alt="<?php echo esc_attr($slider["url"]); ?>">
                      </figure>
                    </div>
                  <?php endif; endforeach; ?>
              </div>
            </div>
            <div class="swiper-button-next next-card next-gallery"></div>
            <div class="swiper-button-prev prev-card prev-gallery"></div>
          </div>
          <div class="swiper-pagination pagination-site pagination-gallery"></div>
        </section>
      </div>
    <?php endif; ?>
  </section>

  <?php
  // ACF Campos para pagina de inicio (page)
  
  $sectionQuestion = get_field('section_question');


  if ($sectionQuestion && $sectionQuestion['enable_section']):
    $questionImg = $sectionQuestion['question_img'];
    $questionLink = !empty($sectionQuestion['question_link']) ? $sectionQuestion['question_link'] : false; ?>
    <?php if ($questionImg || $questionLink): ?>
      <section class="main-have relative full clear-fix">
        <img src="<?php echo get_stylesheet_directory_uri() . '/library/' ?>images/lines.png" alt="" class="lines">
        <img src="<?php echo get_stylesheet_directory_uri() . '/library/' ?>images/mancha-2.png" alt="" class="pintura-3">

        <div class="wrapper-main-full center relative">
          <div class="title-4">
            <?php if ($questionImg): ?>
              <img src="<?php echo esc_url($questionImg["url"]); ?>" alt="<?php echo esc_attr($questionImg["title"]); ?>">
            <?php endif; ?>
            <?php if ($questionLink): ?>

              <a href="<?php echo ($questionLink) ? esc_url($questionLink['url']) : 'javascript:;' ?>" class="btn-here"
                target="<?php echo ($questionLink['target']) ? esc_html($questionLink['target']) : '_self'; ?>"><?php echo ($questionLink['title']) ? $questionLink["title"] : "ClICK HERE"; ?></a>
            <?php endif; ?>
          </div>
        </div>
      <?php endif; ?>
    </section>
  <?php endif; ?>
  <?php
  // ACF Campos para pagina de inicio (page)
  
  $sectionProposal = get_field('section_proposal');


  if ($sectionProposal && $sectionProposal['enable_section']):
    $proposalTitle = $sectionProposal['proposal_title'];
    $proposalImg = $sectionProposal['proposal_img'];
    $proposalThumb = $sectionProposal['proposal_thumb'];
    ?>
    <section id="propuesta-artistica" class="main-propuesta relative full clear-fix">
      <img src="<?php echo get_stylesheet_directory_uri() . '/library/' ?>images/ic-9.png" class="avion" alt="">
      <div class="wrapper-main-full center relative">
        <?php if ($proposalTitle): ?>
          <div class="title-5">
            <img src="<?php echo esc_url($proposalTitle["url"]); ?>" alt="<?php echo esc_url($proposalTitle["title"]); ?>">
          </div>
        <?php endif; ?>
        <?php if ($proposalImg || !empty($sectionProposal["proposal_desc"]) || $proposalThumb): ?>
          <div class="grid-colums-propuesta">
            <article>
              <?php if ($proposalImg): ?>
                <div class="title-6">
                  <img src="<?php echo esc_url($proposalImg["url"]); ?>" alt="<?php echo esc_attr($proposalImg["title"]); ?>">
                </div>
              <?php endif; ?>
              <?php if (!empty($sectionProposal["proposal_desc"])) {
                echo wp_kses_post($sectionProposal["proposal_desc"]);
              }
              ; ?>

            </article>
            <?php if ($proposalThumb): ?>

              <figure>
                <img src="<?php echo esc_url($proposalThumb["url"]); ?>" alt="<?php echo esc_attr($proposalThumb["url"]); ?>">
              </figure>
            <?php endif; ?>

          </div>
        <?php endif; ?>
      </div>
    </section>
  <?php endif; ?>
  <?php
  // ACF Campos para pagina de inicio (page)
  
  $sectionprocess = get_field('section_process');


  if ($sectionprocess && $sectionprocess['enable_section']):
    $processTitle = $sectionprocess['process_title'];
    $processPrev = $sectionprocess['process_prev'];

    ?>
    <section id="proceso" class="main-proceso relative full clear-fix">
      <div class="wrapper-main center relative">
        <div class="grid-proceso full">
          <?php if ($processTitle): ?>
            <figure>
              <img src="<?php echo esc_url($processTitle["url"]); ?>" alt="<?php echo esc_attr($processTitle["url"]); ?>">
            </figure>
          <?php endif; ?>
          <?php if ($processPrev): ?>
            <article class="card-video">
              <figure>
                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#ModalVideo">
                  <img src="<?php echo esc_url($processPrev["url"]); ?>"
                    alt="<?php echo esc_attr($processPrev["title"]); ?>">
                </a>
              </figure>
            </article>
          <?php endif; ?>
        </div>
      </div>
      <img src="<?php echo get_stylesheet_directory_uri() . '/library/' ?>images/line-footer.png" alt=""
        class="lines-footer">
    </section>
    <?php
    if ($sectionprocess['process_choice'] != "video_none"): ?>
      <section class="modal fade modal-generico" id="ModalVideo" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
          <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <?php if ($sectionprocess['process_choice'] == "video_yt"): ?>
              <iframe
                src="https://www.youtube.com/embed/<?php echo esc_html($sectionprocess["process_yt"]); ?>?si=_2-lV2BfBFNsN75B"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            <?php endif; ?>
            <?php if ($sectionprocess['process_choice'] == "video_only"): ?>
              <iframe src="<?php echo esc_url($sectionprocess["process_add"]); ?>" title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            <?php endif; ?>
          </div>
        </div>
      </section>
    <?php endif; ?>
  <?php endif; ?>
</section>


<?php get_footer(); ?>