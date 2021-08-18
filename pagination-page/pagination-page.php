<?php

// Variables
$table_name = "test_table";
$rows_per_page = 10;

// Pagination: Current Page
$page  = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $rows_per_page;

// DB Query
$db = new SQLite3('pagination-database.db');
$sql = "SELECT * FROM $table_name LIMIT $start, $rows_per_page";
$result = $db->query($sql);

// Pagination: Total pages
$count_rows = $db->query("SELECT COUNT(*) FROM $table_name")->fetchArray()[0];
$total_pages = ceil($count_rows / $rows_per_page);

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pagination example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <h1>Pagination example</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <?php for ($i = 0; $i < $result->numColumns(); $i++) : ?>
                                <th><?php echo $result->columnName($i); ?></th>
                                <?php endfor; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetchArray(SQLITE3_ASSOC)) : ?>
                            <tr>
                                <?php foreach ($row as $key => $value) : ?>
                                <td><?php echo $value; ?></td>
                                <?php endforeach; ?>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php if ($total_pages > 1) : ?>
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <?php if ($page > 1) : ?>
                        <li class="page-item">
                            <a href="pagination-page.php?page=<?php echo $page - 1; ?>"  class="page-link">Previous</a>
                        </li>
                        <?php else: ?>
                        <li class="page-item disabled">
                            <span class="page-link">Previous</span>
                        </li>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                        <?php if ($i == $page) : ?>
                        <li class="page-item active">
                            <span class="page-link"><?php echo $i; ?></span>
                        </li>
                        <?php else: ?>
                        <li class="page-item">
                            <a href="pagination-page.php?page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a>
                        </li>
                        <?php endif; ?>
                        <?php endfor; ?>

                        <?php if ($page < $total_pages) : ?>
                        <li class="page-item">
                            <a href="pagination-page.php?page=<?php echo $page + 1; ?>" class="page-link">Next</a>
                        </li>
                        <?php else: ?>
                        <li class="page-item disabled">
                            <span class="page-link">Next</span>
                        </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
        <?php endif; ?>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
