 <form action="" method="post" enctype="multipart/form-data">
    <?php if (!empty($errors)) { ?>
        <div class="alert alert-danger">
            <?php
            foreach ($errors as $error) { ?>
                <div>
                <?php
                echo $error;
            }
                ?>
                </div>

            <?php } ?>

        </div>

        <a href="index.php" class="btn btn-secondary">go back to products</a>
        
        <?php if ($product['image']) { ?>

            <img src="<?php echo $product['image']; ?>" width="100px" alt="no product image">

        <?php } ?>
        <div class="mb-3">


            <input type="file" id="image" aria-describedby="emailHelp" name="image" id="image">
        </div>
        <div class="mb-3">

            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name="title" value="<?php echo $product['title']; ?>">
        </div>




        <div class="mb-3">

            <label for="description" class="form-label">Description</label>
            <textarea type="text" class="form-control" id="description" aria-describedby="emailHelp" name="description"><?php echo $product['description']; ?></textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step=".01" class="form-control" id="price" aria-describedby="emailHelp" name="price" value="<?php echo $product['price']; ?>">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
</form>