<?php require 'Views/top.php'; ?>
<div class="body__overlay"></div>

<!-- Start Main Area -->
<div class="main__container">
    <div class="row">
        <!-- Blog Posts Section -->
        <div class="col-md-8">
            <div class="slider__container slider--one bg__cat--3">
                <!-- Start Single Slide -->
                <div class="single__slide animation__style01 slider__fixed--height">
                    <div class="container">
                        <?php
                        echo '<div class="card" style="width: 18rem; border: 1px solid black; padding: 20px;">';
                        echo '<div class="card-body">';
                        echo '<p class="card-text"><strong>' . htmlspecialchars($blog['description']) . '</strong></p>';
                        echo '<br>';
                        echo '</div>';
                        echo '</div>';
                        ?>
                    </div>
                </div>
                <!-- End Single Slide -->
            </div>
        </div>
        <!-- End Blog Posts Section -->
    </div>
</div>
<!-- End Main Area -->
<?php require 'Views/footer.php'; ?>