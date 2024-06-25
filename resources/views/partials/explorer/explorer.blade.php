@if (get_row_layout() == 'explorer')

<!-- Maphilight -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/maphilight/1.4.0/jquery.maphilight.min.js"></script>
<!-- ImageMapResizer -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/image-map-resizer/1.0.10/js/imageMapResizer.js"></script>


<style>
    .modal-body {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0;
    }

    .modal-body img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        max-width: 100%;
        max-height: 100vh;
    }
</style>

<section class="block bg-casa-light pt-5" id="explorer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                @if (get_sub_field('header'))
                    <h2 class="pt-5 pb-3 text-center font-black">
                        @php the_sub_field('header') @endphp
                    </h2>
                @endif
                @if (get_sub_field('sub_header'))
                    <p class="pb-5 text-center">
                        @php the_sub_field('sub_header') @endphp
                    </p>
                @endif
                <div class="map-container">
                    <!-- Image Map Generated by http://www.image-map.net/ -->
                    <img src="@asset('images/explorer/explorer_main.jpg')" usemap="#image-map" class="map" id="mainExplorerImage">

                    <map name="image-map">
                        <area href="#modalWindow" data-id="1420" target="" alt="Left Side" title="Left Side" coords="5,434,83,533,210,610,344,634,417,540,568,478,665,431,800,373,834,372,735,101,664,98,489,213,398,259" shape="poly">
                        <area href="#modalWindow" data-id="1418" target="" alt="Center" title="Center" coords="746,97,769,151,789,206,816,284,839,346,850,375,971,416,1071,440,1153,462,1206,462,1540,57,1495,50" shape="poly">
                        <area href="#modalWindow" data-id="1357" target="" alt="Right" title="Right" coords="1262,447,1282,465,1316,479,1346,481,1389,479,1416,479,1451,477,1487,482,1532,490,1572,496,1595,511,1619,516,1675,484,1780,401,1697,345,1599,302,1533,259,1473,220,1454,218,1395,264,1335,328,1292,382,1263,419" shape="poly">
                    </map>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Fullscreen Modal -->
<div class="modal fade" id="modalWindow" tabindex="-1" aria-labelledby="modalWindowLabel" aria-hidden="true" style="background-color: #212721;">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header" style="background: #212721">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="modalContent">
                    @if (shortcode_exists('drawattention'))
                        {!! do_shortcode('[drawattention ID=1419]') !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function($) {
        // Function to update the modal content
        function updateModalContent(id) {
            $('#modalContent').html('{!! do_shortcode("[drawattention ID=\'" + id + "\']") !!}');
        }

        // Show the modal when an area is clicked
        $('area[href="#modalWindow"]').click(function(event) {
            event.preventDefault(); // Prevent default link behavior
            var id = $(this).data('id');
            updateModalContent(id);
            $('#modalWindow').modal('show').on('shown.bs.modal', function () {
                // Initialize hotspots after the modal is shown
                setTimeout(function() {
                    hotspots.init();
                }, 100);
            });
        });

        // Initialize the Maphilight plugin
        $('#mainExplorerImage').maphilight({
            fillColor: '6f96d1',
            strokeColor: '000000',
        });

        // Initialize ImageMapResizer plugin
        $('map').imageMapResize();
    });
</script>

@endif
