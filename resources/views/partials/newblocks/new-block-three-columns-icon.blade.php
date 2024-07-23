@if (get_row_layout() == 'three_columns_icons')
    @php
      $columns = get_sub_field('columns');
     $sub_header = get_sub_field('subhead');
     @endphp
    <section class="block new in-page-section gradient block-threecolumns-icons pt-3 py-sm-5 px-4 {{ the_sub_field('bgcolor') }}" id="blockThreeColumnsIcon-{{ get_row_index() }}" data-section-name="">
        <div class="container">
            @if (get_sub_field('header_main'))
                <h2 class="mb-3 pt-5" data-title="{{ the_sub_field('behind_header_text') }}">
                    {{ the_sub_field('header_main') }}</h2>
            @endif
            @if ($sub_header)
                <h3 style="color: #565254;">{{ $sub_header }}</h3>
            @endif
            @if (get_sub_field('description'))
                <p class="block-subheader mt-3 mb-45">{{ the_sub_field('description') }}</p>
            @endif
            <div class="row row-eq-height gx-5 mt-5">
                @if (have_rows('textblock'))
                    @php $number_of_icon_rows = 1 @endphp
                    @while (have_rows('textblock'))
                        @php the_row() @endphp
                        @php
                            $image = get_sub_field('image');
                            $header = get_sub_field('header');
                            $subheader = get_sub_field('subheader');
                            $textblock = get_sub_field('textblock');
                            $link = get_sub_field('link');
                            $regular_link_or_button = get_sub_field('regular_link_or_button');
                            //$button_color = get_sub_field( 'color' );
                            $edge_card = '';
                            // Additional right padding for text blocks on 3 column layout
                            $column_padding = '';
                            if ($columns === 'col-md-4') {
                                $column_padding = 'pe-5';
                            }
                        @endphp
                        <div class="{{ $columns }} mb-5">
                            @if ($image)
                                {!! wp_get_attachment_image($image, [32, 32], false, ['class' => 'three-col-icon', 'loading' => 'lazy']) !!}
                            @endif
                            <div class="card-content-wrapper mb-3">
                                <h3 class="mt-3 mb-1">
                                    {{ $header }}
                                </h3>
                                <p class="text-secondary mt-1 mb-2">
                                    {{ $subheader }}
                                </p>
                                <div class="{{ $column_padding }}">
                                    {{ $textblock }}
                                </div>
                            </div>
                            @if ($link)
                                @php
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                @endphp
                                <p>
                                    @if ($regular_link_or_button)
                                        <a class="btn btn-brown-gradient {{ the_sub_field('button_color') }}"
                                            href="{{ esc_url($link_url) }}"
                                            target="{{ esc_attr($link_target) }}">{{ esc_html($link_title) }}</a>
                                    @else
                                        <a class="button btn btn-brown" href="{{ esc_url($link_url) }}"
                                            target=" {{ esc_attr($link_target) }}">{{ esc_html($link_title) }} </a>
                                    @endif
                                </p>
                            @endif
                        </div>
                        @php $number_of_icon_rows++ @endphp
                    @endwhile
                @endif
            </div>
        </div>
    </section>
@endif
