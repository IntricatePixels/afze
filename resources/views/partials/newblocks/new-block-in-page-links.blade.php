@if (get_row_layout() == 'in_page_menu_links')
{{-- Desktop In Page Links Nav --}}
<section class="d-none d-md-block block sticky-top new in-page-links mb-0 sticky-top"
  id="blockInPageLinks-@php echo get_row_index() @endphp">
  <div class="container-in-page-links m-auto">
      <div class="row">
          @if (have_rows('in_page_links_repeater'))
              @php $counter = 1 @endphp
              @while (have_rows('in_page_links_repeater'))
                  @php the_row() @endphp
                  <div class="col py-2 my-2 border-end border-secondary">
                      @if (get_sub_field('link_name'))
                          @php $link_url = get_sub_field('link_url') @endphp
                          <div class="ps-3 text-white text-center">
                              <a class="text-white" style="display:inline-block; width: 100%; font-size: 14px; font-weight: 300; opacity: 1; color: #fef8ee;"
                                  href="@php echo esc_url($link_url) @endphp">
                                  @php the_sub_field('link_name') @endphp
                              </a>
                          </div>
                      @endif
                  </div>
                  @php $counter++ @endphp
              @endwhile
  </div>
@endif
</div>
</section>

{{-- Mobile --}}
<section class="btn-group d-block d-md-none block sticky-top new in-page-links rounded-0 mt-lg-3 overflow-visible"
    id="blockInPageLinks-{{ get_row_index() }}">
    @if (have_rows('in_page_links_repeater'))
        @php $counter = 1 @endphp
        <button id="inPageLinksToggle"
            class="d-flex justify-content-between align-items-center bg-transparent border-0 text-start text-white dropdown-toggle  w-100 p-3 in-page-links"
            type="button" data-bs-toggle="dropdown" aria-expanded="false">
            @while (have_rows('in_page_links_repeater'))
                @php
                    the_row();
                    $link_url = get_sub_field('link_url');
                @endphp
                @if (get_sub_field('link_name'))
                    @if ($counter === 1)
                        {{ get_sub_field('link_name') }}
                    @endif
                @endif
                @php $counter++ @endphp
            @endwhile
        </button>
        <ul class="dropdown-menu links w-100 border border-bottom rounded-0" id="inPageLinksMobileContainer">
            @php $counter = 1 @endphp
            @while (have_rows('in_page_links_repeater'))
                @php
                    the_row();
                    $link_url = get_sub_field('link_url');
                @endphp
                @if (get_sub_field('link_name'))
                    <li>
                        <a class="dropdown-item dropdown-item-in fs-6 py-1"
                            href="{{ esc_url($link_url) }}">{{ get_sub_field('link_name') }}</a>
                    </li>
                @endif
                @php $counter++ @endphp
            @endwhile
    @endif
    </ul>
</section>

<script defer>
    document.addEventListener('DOMContentLoaded', function() {
        // Get all dropdown items and sections
        const dropdownItems = document.querySelectorAll('.dropdown-item-in');
        const sections = document.querySelectorAll('.in-page-section');

        // Store section names in an object
        const sectionNames = {};
        dropdownItems.forEach(item => {
            const sectionId = item.getAttribute('href').substring(1);
            const sectionName = item.textContent.trim().replace(/^\d+\s-\s/, '');
            sectionNames[sectionId] = sectionName;
        });

        // Update section attributes based on dropdown items
        sections.forEach(section => {
            const sectionId = section.getAttribute('id');
            const sectionName = sectionNames[sectionId];
            if (sectionName) {
                section.setAttribute('data-section-name', sectionName);
            }
        });

        // Get the toggle element
        const toggleElement = document.getElementById('inPageLinksToggle');
        // Update toggle text based on the active section
        function updateToggleText() {
            {{-- const scrollPosition = window.scrollY; --}}
            sections.forEach(section => {
                const rect = section.getBoundingClientRect();

                if ( (rect.top - 120) <= 0  && rect.bottom > 0) {
                    const sectionName = section.getAttribute('data-section-name');
                    if (sectionName) {
                        toggleElement.textContent = sectionName;
                        {{-- console.log('Updated toggle text:', sectionName); --}}
                    }
                }
            });
        }

        // Update toggle text initially and on scroll
        updateToggleText();
        window.addEventListener('scroll', updateToggleText);
    });
</script>

@endif
