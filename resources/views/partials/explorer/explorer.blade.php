@if (get_row_layout() == 'explorer')
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Maphilight -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/maphilight/1.4.0/jquery.maphilight.min.js"></script>
<!-- ImageMapResizer -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/image-map-resizer/1.0.10/js/imageMapResizer.js"></script>
<style>
    .details-panel {
        position: relative; 
        width: 100%;
        max-width: 300px;
        z-index: 10;
        opacity: 0;
        transition: opacity 0.3s ease-in-out; /* Add transition for opacity */
    }
    .details-panel.show {
        opacity: 1;
    }
    .map-container {
        position: relative;
    }
    .map {
        width: 100%;
        height: auto;
    }
    .map.img-fluid {
        background-repeat: no-repeat;
        max-width: 1000px;
    }
    .fade-in-image {
        display: block;
        max-width: 100%;
        height: auto;
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
    }
    .show .fade-in-image {
        opacity: 1;
    }
    .modal-fullscreen {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        top: 0;
        left: 0;
    }
    .modal-close-btn {
        position: absolute;
        top: 20px;
        right: 20px;
        font-size: 2rem;
        color: #fff;
        background: transparent;
        border: none;
    }
    div.img-fluid {
        background-repeat: no-repeat;
        background-position: center;
    }
</style>

<section class="block bg-casa-light" id="explorer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                @if (get_sub_field('header'))
                    <h2 class="pt-5 pb-3 text-center font-black">
                        @php the_sub_field('header') @endphp
                    </h2>
                @endif
                @if (get_sub_field('sub_header'))
                    <p class="pb-3 text-center">
                        @php the_sub_field('sub_header') @endphp
                    </p>
                @endif
                <div class="map-container">
                    <!-- Image Map Generated by http://www.image-map.net/ -->
                    <img src="@asset('images/explorer/explorer_main.jpg')" usemap="#image-map" class="map">

                    <map name="image-map">
                        <area target="_self" alt="Left Side" title="Left Side" href="#leftModalWindow"
                            coords="2,778,30,829,89,889,157,945,194,970,266,983,332,983,399,899,447,865,493,856,541,832,601,808,642,782,684,767,800,725,830,719,824,639,784,512,765,463,736,453,663,461,520,550,442,604,347,650" 
                            shape="poly"
                            data-title="Left Side"
                            data-content="This is the left side."
                            data-image="path/to/your-details-image.jpg"
                            data-url="left.html"
                            data-fade-in-image="@asset('images/explorer/explorer_left_side.jpg')">
                        <area target="_self" alt="Center" title="Center" href="center" coords="787,448,820,550,828,607,838,677,840,717,884,749,989,776,1042,781,1078,798,1110,814,1177,817,1212,817,1382,611,1488,501,1511,436,1496,409,1463,406" shape="poly">
                        <area target="_self" alt="Right Side" title="Right Side" href="right" coords="1236,814,1275,830,1305,838,1399,854,1458,859,1542,864,1620,876,1697,825,1775,765,1779,744,1609,639,1463,566,1420,598,1379,641,1352,670,1313,720,1288,749,1267,781" shape="poly">
                    </map>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <div class="details-panel" id="detailsPanel">
                    <div class="card">
                        <!-- Close button for the card -->
                        <button type="button" class="btn-close btn-close-white btn-lg" aria-label="Close" style="position: absolute; top: 10px; right: 10px;"></button>
                        <img src="" alt="" class="card-img-top" id="detailsImage">
                        <div class="card-body">
                            <h5 class="card-title" id="detailsTitle"></h5>
                            <p class="card-text" id="detailsContent"></p>
                            <!-- Add URL attribute to View More button -->
                            <a href="#" class="btn btn-primary view-more" target="_blank">View More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Fullscreen Modal -->
<div class="modal fade" id="leftModalWindow" tabindex="-1" aria-labelledby="leftModalWindowLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <img src="@asset('images/explorer/explorer_left_side.jpg')" alt="Left Side" class="img-fluid w-100 h-100" usemap="#image-map" style="object-fit: contain;">
                <!-- Image Map Generated by http://www.image-map.net/ -->

                <map name="image-map">
                    <area target="_blank" alt="Vila A1" title="Vila A1" href="Vila A1" coords="471,971,523,989,560,1014,627,1022,706,971,674,936,625,904,545,882,514,903" shape="poly">
                    <area target="" alt="Vila A2" title="Vila A2" href="Vila A2" coords="" shape="poly">
                </map>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        // Initialize the Maphilight plugin
        $('img').maphilight({
            fillColor: '008800',
            strokeColor: '008800',
        });

        // // Initialize ImageMapResizer plugin
        $('map').imageMapResize();

        // // Handle click on each area
        // $('area').click(function(event) {
        //     event.preventDefault(); // Prevent default link behavior
            
        //     var title = $(this).data('title');
        //     var content = $(this).data('content');
        //     var imageSrc = $(this).data('image');
        //     var url = $(this).data('url');
        //     var fadeInImageSrc = $(this).data('fade-in-image');

        //     // Update main image
        //     $('#mainImage').attr('src', imageSrc);

        //     // Update details panel
        //     $('#detailsTitle').text(title);
        //     $('#detailsContent').text(content);
        //     $('#detailsImage').attr('src', imageSrc);
        //     $('.view-more').attr('href', url);

        //     // Remove any existing faded in image
        //     $('.fade-in-image').remove();

        //     // Fade in new image
        //     var $fadeInImage = $('<img>').attr('src', fadeInImageSrc).addClass('fade-in-image');
        //     $('.details-panel').append($fadeInImage);

        //     // Show details panel with fade-in effect
        //     $('.details-panel').addClass('show');
        // });

        // // Hide details panel when close button is clicked
        // $('.btn-close').click(function() {
        //     $('.details-panel').removeClass('show');
        //     $('.fade-in-image').remove(); // Remove the faded in image
        // });

        // Show the modal when the area with href="#leftModalWindow" is clicked
        $('area[href="#leftModalWindow"]').click(function(event) {
            event.preventDefault(); // Prevent default link behavior
            $('#leftModalWindow').modal('show');
        });
    });
</script>
@endif
