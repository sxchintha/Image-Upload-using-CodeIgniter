<!DOCTYPE html>
<html lang="en">

<head>
    <title>Upload Form</title>
    <link rel="stylesheet" href="<?php echo base_url('css/common.css'); ?>">
</head>

<body>
    <p class="btnNavi"><?= anchor('viewimages', 'View Uploaded Images') ?></p><br>


    <?php foreach ($errors as $error) : ?>
        <li><?= esc($error) ?></li>
    <?php endforeach ?>

    <?= form_open_multipart('upload/upload') ?>

    <label>Titel : </label>
    <input type="text" name="title" placeholder="Enter title here..." /><br>

    <label>Image: </label>
    <input type="file" name="userfile" size="20" />

    <br /><br />

    <input type="submit" value="Upload" />

    </form>

</body>

</html>