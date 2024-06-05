<?php
require_once ('Controllers/CategoryController.php');
if (!isset($_SESSION['ID'])) {
    header('location :login');
}
?>
<?php require ('Views/top.php') ?>
<div class="body__overlay"></div>

<!-- Start Slider Area -->

<!-- Start Main Area -->
<div class="main__container">

    <div class="row">
        <!-- Blog Posts Section -->
        <div class="col-md-8">

            <div class="slider__container slider--one bg__cat--3">
                <form method="POST">
                    <select id="id" name="id" class="form-control" style="height: fit-content; width:auto" required>
                        <?php
                        $sql = "SELECT * FROM categories WHERE status = 1";
                        $categories = $connection->query($sql);
                        if ($categories->num_rows > 0) {
                            while ($category = $categories->fetch_assoc()) {
                                echo '<option value="' . htmlspecialchars($category['id']) . '">' . htmlspecialchars($category['title']) . '</option>';
                            }
                        } else {
                            echo '<option value="">No categories available</option>';
                        }
                        ?>
                    </select>
                    <button type="submit" name="submit" class=" card-text-left btn btn-primary">Filter</button>
                </form>

                <!-- Start Single Slide -->
                <div class="single__slide animation__style01 slider__fixed--height">
                    <div class="container">

                        <?php

                        require ('Controllers/CategoryController.php');
                        if (isset($_POST['submit'])) {
                            $id = $_POST['id'];

                            $result->getActiveCategories($id);
                            $sql = " SELECT b.id, b.author_id, b.title, b.short_desc, b.description, b.image, b.date, b.status 
                        FROM blogs b 
                        INNER JOIN blog_categories bc ON b.id = bc.blog_id 
                        WHERE bc.category_id = $id AND b.status = 1
                    ";
                            $categories = $connection->query($sql);
                            $category = $categories->fetch_assoc();
                            print_r($category);
                        }
                        ?>
                        <div class="card"
                            style="width: 18rem ; border: 1px solid black ; padding :20px ;border-radius:10px;">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title" style="color:#c43b68">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up
                                    the bulk of the card's content.</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">An item</li>
                                <li class="list-group-item">A second item</li>
                                <li class="list-group-item">A third item</li>
                            </ul>
                            <div class="card-body">
                                <a href="#" class="card-link">Card link</a>
                                <a href="#" class="card-link">Another link</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->

            </div>
        </div>
        <!-- End Blog Posts Section -->

        <!-- Tags Section -->
        <div class="col-md-4">
            <div class="tags__container">
                <h5 style="color:#c43b68">Tags</h5>
                <ul class="list-group">
                    <li class="list-group-item">Tag 1</li>
                    <li class="list-group-item">Tag 2</li>
                    <li class="list-group-item">Tag 3</li>
                    <!-- Add more tags as needed -->
                </ul>
            </div>
        </div>
        <!-- End Tags Section -->
    </div>
</div>
<!-- End Main Area -->
<!-- End Product Area -->
<input type="hidden" id="qty" value="1" />
<?php require ('Views/footer.php') ?>