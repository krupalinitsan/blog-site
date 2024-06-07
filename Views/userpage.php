<?php
require_once 'Config/config.php';
require_once 'Controllers/CategoryController.php';

// if (!isset($_SESSION['IS_LOGIN'])) {
//     header('Location: login');
//     exit();
// }
$categoryController = new CategoryController($connection);
$categories = $categoryController->showCategories();
//  display data by filter and search
if (isset($_POST['submit'])) {
    $categoryId = $_POST['id'];
    $search = $_POST['search'];
    if (!empty($search)) {
        $blogs = $categoryController->filterBlogsBySearch($search);
    } else {
        $blogs = $categoryController->filterBlogsByCategory($categoryId);
    }
} else {
    $blogs = $categoryController->getLatestBlogs();
}
?>
<?php require 'Views/top.php'; ?>
<div class="body__overlay"></div>

<!-- Start Main Area -->
<div class="slider__container slider--one bg__cat--3 ">
    <form method="POST" class="form-inline mb-4">
        <div class="form-group mr-3">
            <select id="id" name="id" class="form-control">
                <?php
                if ($categories->num_rows > 0) {
                    while ($category = $categories->fetch_assoc()) {
                        echo '<option value="' . htmlspecialchars($category['id']) . '">' . htmlspecialchars($category['title']) . '</option>';
                    }
                } else {
                    echo '<option value="">No categories available</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group mr-3">
            <input type="text" name="search" class="form-control" placeholder="Search by title or tag"
                value="<?php echo isset($_POST['search']) ? htmlspecialchars($_POST['search']) : ''; ?>">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Filter</button>
    </form>
    <br>
    <!-- Main content -->
    <div class="single__slide animation__style01">
        <div class="container">
            <div class="row">
                <?php
                if ($blogs->num_rows > 0) {
                    while ($blog = $blogs->fetch_assoc()) {
                        echo '<div class="col lg-4">';
                        echo '<div class="card " style="width: 18rem; border: 1px solid black; padding: 20px; border-radius: 10px;">';
                        $id = $blog['author_id'];
                        $author = $categoryController->getAuthor($id);
                        $row = $author->fetch_assoc();
                        echo '<p class="card-text"><strong>' . htmlspecialchars($row['firstname']) . '</strong></p>';
                        echo '<img src="' . htmlspecialchars($blog['image']) . '" class="card-img-top" alt="...">';
                        echo '<br><br>';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title" style="color:#c43b68">' . htmlspecialchars($blog['title']) . '</h5>';
                        echo '<br>';
                        echo '<p class="card-text">' . htmlspecialchars($blog['short_desc']) . '</p>';
                        echo '<br>';
                        echo '</div>';
                        echo '<b>Posted On:</b>';
                        echo '<p class="card-text">' . htmlspecialchars($blog['date']) . '</p>';
                        echo '<div class="card-body">';
                        echo '<a href="blog_details?id=' . htmlspecialchars($blog['id']) . '" class="card-link" style="color:#df1054">Read more</a>';
                        echo '</div>';
                        echo '</div><br>';
                        $tags = explode(',', $blog['tags']);
                        if ($tags) {
                            echo '<ul class="list-group" style="width: 400px">';
                            foreach ($tags as $tag) {
                                echo '<li class="list-group-item">' . htmlspecialchars($tag) . '</li>';
                            }
                            echo '</ul>';
                            echo '</div>';
                        }
                    }
                } else {
                    echo "No record Found !";
                }
                ?>

            </div>
        </div>
    </div>
    <!-- End Main content -->
</div>
<!-- End Blog Posts Section -->
<!-- End Main Area -->
<?php require 'Views/footer.php'; ?>