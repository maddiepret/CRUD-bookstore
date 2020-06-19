<?php require_once("crud/php/component.php") ?>
<?php require_once("crud/php/operation.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- LINK BOOTSTRAP CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- LINK FONT AWSOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />
    <!-- CUSTOM STYLESHEET -->
    <link rel="stylesheet" href="styles.css">
    <title>Books</title>


</head>

<body>
    <div class="container text-center">
        <h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-swatchbook"></i> Bookstore</h1>
        <div class="d-flex justify-content-center">
            <form action="" method="post" class="w-50">
                <div class="pt-2">
                    <?php inputElement('<i class="fas fa-id-badge"></i>', 'Id', 'id', ''); ?>
                </div>
                <div class="pt-2">
                    <?php inputElement('<li class="fas fa-book"></li>', 'Book Name', 'book_name', ''); ?>
                </div>
                <div class="row pt-2">
                    <div class="col">
                        <?php inputElement('<li class="fas fa-people-carry"></li>', 'Publisher', 'book_publisher', ''); ?>
                    </div>
                    <div class="col">
                        <?php inputElement('<li class="fas fa-dollar-sign"></li>', 'Price', 'book_price', ''); ?>
                    </div>
                </div>
                <div class="d-flex">
                    <?php buttonElement("btn-create", "btn btn-success", "Create", "create", "data-toggle='tooltip' data-placement='bottom' title='Create'"); ?>
                    <?php buttonElement("btn-read", "btn btn-primary", "Sync", "read", "data-toggle='tooltip' data-placement='bottom' title='Read'"); ?>
                    <?php buttonElement("btn-update", "btn btn-light", "Update", "update", "data-toggle='tooltip' data-placement='bottom' title='Update'"); ?>
                    <?php buttonElement("btn-delete", "btn btn-danger", "Delete", "delete", "data-toggle='tooltip' data-placement='bottom' title='Delete'"); ?>
                </div>

            </form>
        </div>
        <!-- BOOTSTRAP TABLE -->
        <div class="d-flex table-data">
            <table class="table table-striped table-dark">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Book Name</th>
                        <th>Publisher</th>
                        <th>Book Price</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <?php
                    //create button refresh
                    if (isset($_POST['read'])) {
                        $result = getData();
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td data-id="<?php echo $row['id']; ?>"><?php echo $row['id']; ?></td>

                                    <td data-id="<?php echo $row['id']; ?>"><?php echo $row['book_name']; ?></td>

                                    <td data-id="<?php echo $row['id']; ?>"><?php echo $row['book_publisher']; ?></td>

                                    <td data-id="<?php echo $row['id']; ?>"><?php echo $row['book_price']; ?></td>
                                    <td>
                                        <li class="fas fa-edit btnedit" data-id="<?php echo $row['id'] ?>"></li>
                                    </td>
                                </tr>
                    <?php
                            }
                        }
                    }
                    ?>
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>










    <!-- BOOTSTRAP CDN -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- LOCAL SCRIPT -->
    <script src="crud/php/main.js"></script>
</body>

</html>