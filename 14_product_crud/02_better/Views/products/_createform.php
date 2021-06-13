<form action="create.php" method="post" enctype="multipart/form-data">
    <?php if (!empty($erros)) { ?>
        <div class="alert alert-danger">
            <?php
            foreach ($erros as $error) { ?>
                <div>
                <?php
                echo $error;
            }
                ?>
                </div>

            <?php } ?>
        </div>

                <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name="title" value="<?php $title?>">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" aria-describedby="emailHelp" name="image">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea type="text" class="form-control" id="description" aria-describedby="emailHelp" name="description" <?php echo $description ?>></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step=".01" class="form-control" id="price" aria-describedby="emailHelp" name="price" value="<?php $price ?>">
        </div>
       
        <button type="submit" class="btn btn-primary">Submit</button>
</form>