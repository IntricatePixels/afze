@if (get_row_layout() == 'two_panels_with_image')
    @php
        $swap_sides = get_sub_field('swap_sides');
        $header = get_sub_field('header');
        $sub_header = get_sub_field('sub_header');
        $subtext = get_sub_field('subtext');
        $buttons = [get_sub_field('button'), get_sub_field('button_2'), get_sub_field('button_3'), get_sub_field('button_4')];
        $image = get_sub_field('image');
        $background_color = the_sub_field('background_colour');
    @endphp
    <section class="block new full-width-cta-block mt-0 py-0 pb-md-0 in-page-section" id="full-width-cta-{{ get_row_index() }}" data-section-name="" style="background: #573635;">
        <div class="container-fluid">
            <div class="row">
                <div class="d-flex flex-column justify-content-center align-items-center text-center {{ $swap_sides ? 'col-lg-6 order-2 py-5' : 'col-lg-6 order-2 order-lg-1' }}">
                    <div class="pe-md-5">
                        @if ($header)
                            <h2 class="mb-3 pt-5 text-white" data-title="{{ the_sub_field('behind_header_text') }}">
                                {{ $header }}</h2>
                        @endif
                        @if ($sub_header)
                            <h3 class="pt-3 text-white">{{ $sub_header }}</h3>
                        @endif
                        @if ($subtext)
                            <div class="my-4 text-white">{!! $subtext !!}</div>
                        @endif
                        @foreach ($buttons as $button)
                            @php
                                if (!$button) {
                                    continue;
                                }
                                $link_url = $button['url'];
                                $link_title = $button['title'];
                                $link_target = $button['target'] ? $button['target'] : '_self';
                            @endphp
                            <a class="mt-3 btn btn-brown-gradient" href="{{ esc_url($link_url) }}"
                                target="{{ esc_attr($link_target) }}">{{ esc_html($link_title) }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="{{ $swap_sides ? 'col-lg-6 order-1 p-0 mb-3 mb-md-0' : 'col-lg-6 order-1 order-lg-2 p-0' }}">
    @if ($image)
        <?php
        $image_src = wp_get_attachment_image_src($image, 'full');
        $image_url = $image_src[0];
        ?>
        <img src="{{ $image_url }}" class="object-fit" loading="lazy">
    @endif
</div>

            </div>
        </div>
    </section>
@endif
