<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="path-to-your-css-file.css"> <!-- Add the path to your custom CSS file here -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <button type="button" class="btn btn-success mt-3 .update" data-toggle="modal" data-target="#addModal">
        Add
    </button>  
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Image</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($model as $product): ?>
            <tr>
                <td>
                    <img src="<?= base_url() ?>/<?= $product['image'] ?>" class="img-fluid" alt="<?= $product['ProductName'] ?>">
                </td>
                <td><?= $product['ProductName'] ?></td>
                <td><?= $product['ProductDescription'] ?></td>
                <td><?= $product['ProductCategory'] ?></td>
                <td><?= $product['ProductQuantity'] ?></td>
                <td><?= $product['ProductPrice'] ?></td>
                <td>
                    <a href="delete/<?= $product['ID'] ?>" class="btn btn-danger btn-sm">Delete</a>
                    <a href="#" class="btn btn-primary btn-sm edit-button" data-toggle="modal" 
       data-target="#updateModal<?=$product['ID']?>"
       data-id="<?= $product['ID'] ?>"
       data-image="<?= $product['image'] ?>"
       data-productname="<?= $product['ProductName'] ?>"
       data-productdescription="<?= $product['ProductDescription'] ?>"
       data-productcategory="<?= $product['ProductCategory'] ?>"
       data-productquantity="<?= $product['ProductQuantity'] ?>"
       data-productprice="<?= $product['ProductPrice'] ?>">Update</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=base_url('/admininventory/add')?>" method="post" enctype="multipart/form-data" id="addProductForm">
                <?= csrf_field() ?>
                <div class="mb-3">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                    </div>
                    <div class="mb-3">
                        <label for="ProductName">Product Name</label>
                        <input type="text" class="form-control" id="ProductName" name="ProductName" required>
                    </div>
                    <div class="mb-3">
                        <label for="ProductDescription">Description</label>
                        <input type="text" class="form-control" id="ProductDescription" name="ProductDescription" required>
                    </div>
                    <div class="mb-3">
                        <label for="ProductCategory">Category</label>
                        <input type="text" class="form-control" id="ProductCategory" name="ProductCategory" required>
                    </div>
                    <div class="mb-3">
                        <label for="ProductQuantity">Quantity</label>
                        <input type="number" class="form-control" id="ProductQuantity" name="ProductQuantity" required>
                    </div>
                    <div class="mb-3">
                        <label for="ProductPrice">Price</label>
                        <input type="number" class="form-control" id="ProductPrice" name="ProductPrice" required>
                    </div>
                    <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="addData">Add</button>
            </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateModal<?=$product['ID']?>" tabindex="-1" aria-labelledby="updateModalLabel<?=$product['ID']?>" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel<?=$product['ID']?>">Update Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=base_url('/admininventory/update/'.$product['ID'])?>" method="post" enctype="multipart/form-data" id="updateProductForm<?=$product['ID']?>">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="image<?=$product['ID']?>">Product Name</label>
                        <input type="file" class="form-control" id="image<?=$product['ID']?>" name="image" value="<?=$product['image']?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="ProductName<?=$product['ID']?>">Product Name</label>
                        <input type="text" class="form-control" id="ProductName<?=$product['ID']?>" name="ProductName" value="<?=$product['ProductName']?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="ProductDescription<?=$product['ID']?>">Description</label>
                        <input type="text" class="form-control" id="ProductDescription<?=$product['ID']?>" name="ProductDescription" value="<?=$product['ProductDescription']?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="ProductCategory<?=$product['ID']?>">Product Name</label>
                        <input type="text" class="form-control" id="ProductCategory<?=$product['ID']?>" name="ProductCategory" value="<?=$product['ProductCategory']?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="ProductQuantity<?=$product['ID']?>">Product Name</label>
                        <input type="number" class="form-control" id="ProductQuantity<?=$product['ID']?>" name="ProductQuantity" value="<?=$product['ProductQuantity']?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="ProductPrice<?=$product['ID']?>">Product Name</label>
                        <input type="number" class="form-control" id="ProductPrice<?=$product['ID']?>" name="ProductPrice" value="<?=$product['ProductPrice']?>" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.edit-button').on('click', function () {
            var ID = $(this).data('id');
            var Image = $(this).data('image');
            var ProductName = $(this).data('productname');
            var ProductDescription = $(this).data('productdescription');
            var ProductCategory = $(this).data('productcategory');
            var ProductQuantity = $(this).data('productquantity');
            var ProductPrice = $(this).data('productprice');

            $('#image' + ID).val(Image);
            $('#ProductName' + ID).val(ProductName);
            $('#ProductDescription' + ID).val(ProductDescription);
            $('#ProductCategory' + ID).val(ProductCategory);
            $('#ProductQuantity' + ID).val(ProductQuantity);
            $('#ProductPrice' + ID).val(ProductPrice);
        });
    });
</script>

</body>
</html>
