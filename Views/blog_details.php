<?php require 'Views/top.php'; ?>
<div class="body__overlay"></div>

<!-- Start Main Area -->
<div class="single__slide animation__style01 slider__fixed--height">
    <!-- Main content -->
    <div class="single__slide animation__style01">
        <div class="container">
            <div class="center">
                <div class="card" style="width: 18rem; padding: 20px; margin:auto 600px;">
                    <div class="card-body">
                        <p class="card-text"><strong><?php echo htmlspecialchars($blog['description']); ?></strong></p>
                        <br>
                    </div>
                    <a href="userpage" class="filter-link">
                        <center> <button type="submit" name="submit" class="btn btn-primary">Go Back</button></center>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main content -->
</div>
<!-- End Blog Posts Section -->
<!-- End Main Area -->
<?php require 'Views/footer.php'; ?>