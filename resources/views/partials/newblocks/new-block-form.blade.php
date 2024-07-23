@if (get_row_layout() == 'two_columns_block_form')
    @php
        $background_image = get_sub_field('background_image');
        $logo_image = get_sub_field('logo_image');
        $gravity_forms_shortcode_us = get_sub_field('gravity_forms_shortcode');
    @endphp
    <section class="block block-form py-0 in-page-section py-5 d-flex justify-content-center align-items-center" id="form" style="background-color: #565254;">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <!-- Left Column -->
                <div class="col-12 text-center"
                    style="background-image: url(<?php echo $background_image; ?>); background-size: cover; background-position: center center;">
                    <div>
                    @if ($logo_image)
                        @php
                            $logo_url = $logo_image['url'];
                            $logo_alt = $logo_image['alt'];
                        @endphp
                        <img class="form-logo-image pb-4" style="height: 80px;" src="{{ esc_url($logo_url) }}"
                            alt="{{ esc_attr($logo_alt) }}" />
                    @endif
                        <h2 class="text-white fs-2"><?php the_sub_field('h1_title'); ?></h2>
                        <p class="text-white"><?php the_sub_field('left_description'); ?></p>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-lg-6 col-12 text-center mt-4">     
                    <p class="my-3">@php the_sub_field('form_description') @endphp</p>
                    @php echo do_shortcode($gravity_forms_shortcode_us) @endphp
                </div>
            </div>
        </div>
    </section>
@endif
