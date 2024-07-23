  @if (get_row_layout() == 'image_with_list')

    @php 
      $header = get_sub_field('header');
      $gallery = get_sub_field('image_gallery');
      $swap_sides = get_sub_field('swap_sides');
      $icon_image = get_sub_field('icon_image');
    @endphp
    
    <section class="block-image-with-list px-lg-4 px-4 px-md-0 py-5 my-0 in-page-section" id="list-{{ get_row_index() }}" data-section-name="" style="background-color: #fef8ee;">
        <div class="container">
          @if ($header)
          <div class="row justify-content-lg-center text-md-center mb-5 mb-lg-0 pb-5">
            <div class="pb-lg-5">
                <h2 class="hero-eyebrow text-sm-start text-md-center mb-3">{{ the_sub_field('header_eyebrow') }}</h2>
                <h3 class="fs-1 font-black mb-3 pt-0 mt-0">{!! $header !!}</h3>
                <div>{!! the_sub_field('subhead') !!}</div>
            </div>
          @endif
          </div>
          <div class="row g-5">
              <div class="col-12 col-lg-6 d-flex align-items-center justify-content-center @if ( $swap_sides ) order-lg-2 @else order-lg-1 ps-lg-0 @endif">
                @if ($gallery)
                  <div id="galleryCarousel" class="carousel slide carousel-fade carousel-in-page" data-bs-ride="carousel" style="max-width: 800px;">
                    <div class="carousel-inner">
                      @foreach ($gallery as $index => $image)
                        <div class="carousel-item  @if ($index == 0) active @endif" data-bs-interval="4000">
                          <img src="{{ esc_url($image['url']) }}" alt="{{ esc_attr($image['alt']) }}" loading="lazy" class="d-block" />
                        </div>
                      @endforeach
                    </div>
                    
                  </div>
                @endif
              </div>
              <div class="col-12 col-lg-6 d-flex flex-column justify-content-center align-items-center text-center @if ( $swap_sides ) order-lg-1 @else order-lg-2 @endif">
                
                @if ($icon_image)
                  <img width="80" height="80" src="{{ esc_url($icon_image['url']) }}" alt="{{ esc_attr($icon_image['alt']) }}" loading="lazy" class="d-block mb-3" style="width: 80px; height: 80px;" />
                @endif
                
                @if (get_sub_field('panel_eyebrow'))
                  <h2 class="hero-eyebrow text-start">{{ the_sub_field('panel_eyebrow') }}</h2>
                @endif

                @if (get_sub_field('panel_header'))
                  <h3 class="fs-2 pb-4 font-black">{{ the_sub_field('panel_header') }}</h3>
                @endif

                @php $grid = get_sub_field('grid'); @endphp
                @if ($grid && count($grid) > 0)
                  @php $count = count($grid); @endphp 
                  @if (have_rows('grid'))
                      @while (have_rows('grid')) @php the_row(); @endphp
                          @php
                            $title = get_sub_field('title');
                            $descr = get_sub_field('descr');
                            $link = get_sub_field('link'); 
                          @endphp
                          <div class="pb-3 @if ($count > 1 ) ps-4 ps-lg-5 border-dotted @if ( get_row_index() === 1  ) border-blue @endif @endif">
                          @if ($title)
                            <h4 class="p-0 mb-4 fs-4 fw-bold @if ( get_row_index() != 1 ) pt-3 @endif">{!! $title !!}</h4>
                          @endif
                          <div class="px-lg-5 px-3 mb-3 max-width-600">{!! $descr !!}</div>
                          @if ($link)
                              @php
                                  $link_url = $link['url'];
                                  $link_title = $link['title'];
                                  $link_target = $link['target'] ? $link['target'] : '_self';
                              @endphp
                              <a class="btn btn-brown right-arrow pe-5 position-relative" href="{{ esc_url($link_url) }}"
                              target="{{ esc_attr($link_target) }}">{{ esc_html($link_title) }}</a>
                          @endif
                          </div>
                      @endwhile
                  @endif
                @endif

                @php $link = get_sub_field('button') @endphp
                @if ($link)
                    @php
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                    @endphp
                    <a class="btn btn-brown right-arrow mt-0 position-relative" href="{{ esc_url($link_url) }}"
                        target="{{ esc_attr($link_target) }}">{{ esc_html($link_title) }}</a>
                @endif

              </div>
          </div>
        </div>
    </section>
@endif

