<?php
    include 'db.php';
    if (isset($_POST['upload'])) {
        $name = $_POST['name'];
        $image = $_FILES['image'];

        if (empty($name)) {
            echo 'Please enter your name';
        } else if ($image['name'] == '') {
            echo 'Please choose an image';
        } else {
            $image_extension = explode('.', $image['name']);
            $new_name = rand().'.'.$image_extension[1];
            $destination = "img/{$new_name}";
            if (move_uploaded_file($image['tmp_name'], $destination)) {
                $sql = 'INSERT INTO image(name, image) VALUES(?,?)';
                $stmt = $connect->prepare($sql);
                if ($stmt->execute([$name, $new_name])) {
                    echo 'Successful';
                }
            } else {
                echo 'Error Upload image';
            }
        }
    }
?>

