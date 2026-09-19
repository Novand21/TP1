<?php

class Movie {
    private $id, $title, $genre, $description, $director, $image;

    public function __construct($id, $title, $genre, $description, $director, $image = "") {
        $this->id = $id; 
        $this->title = $title; 
        $this->genre = $genre; 
        $this->description = $description; 
        $this->director = $director;
        $this->image = $image;
    }


    public function getId() { 
        return $this->id; 
    }
    public function getTitle() { 
        return $this->title; 
    }
    public function getGenre() { 
        return $this->genre; 
    }
    public function getDescription() { 
        return $this->description; 
    }
    public function getDirector() { 
        return $this->director; 
    }
    public function getImage() { 
        return $this->image; 
    }
    
    public function setTitle($title) { 
        $this->title = $title; 
    }
    public function setGenre($genre) { 
        $this->genre = $genre; 
    }
    public function setDescription($description) { 
        $this->description = $description; 
    }
    public function setDirector($director) { 
        $this->director = $director; 
    }
}

session_start();

if (!isset($_SESSION['movie_list'])) {
    $_SESSION['movie_list'] = [];
}



// Add Data
if (isset($_POST['add_movie'])) {
    $id = $_POST['id']; 
    $title = $_POST['title']; 
    $genre = $_POST['genre']; 
    $description = $_POST['description'];
    $director = $_POST['director'];
    
    $image = "";
    if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") {
        $target_dir = "img/";
        $image = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $image);
    }

    $_SESSION['movie_list'][] = new Movie($id, $title, $genre, $description, $director, $image);
    header("Location: index.php"); 
    exit;
}

// Delete Data
if (isset($_GET['delete'])) {
    foreach ($_SESSION['movie_list'] as $key => $m) {
        if ($m->getId() == $_GET['delete']) {
            unset($_SESSION['movie_list'][$key]);
        }
    }
    header("Location: index.php");
    exit;
}

// Update Data
if (isset($_POST['update_movie'])) {
    foreach ($_SESSION['movie_list'] as $m) {
        if ($m->getId() == $_POST['target_id']) {
            $m->setTitle($_POST['new_title']);
            $m->setGenre($_POST['new_genre']);
            $m->setDescription($_POST['new_description']);
            $m->setDirector($_POST['new_director']);
            break;
        }
    }
    header("Location: index.php");
    exit;
}

// Search Data
$search_result = null;
if (isset($_GET['search_btn'])) {
    foreach ($_SESSION['movie_list'] as $m) {
        if ($m->getId() == $_GET['search_id']) {
            $search_result = $m;
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Movies</title>
</head>
<body style="font-family: sans-serif; padding: 20px;">

    <h1>Movie Management System</h1>

    <fieldset style="margin-bottom: 20px;">
        <legend>Add Movie</legend>
        <form method="POST" action="index.php" enctype="multipart/form-data">
            ID: <input type="text" name="id" required> 
            Title: <input type="text" name="title" required> 
            Genre: <input type="text" name="genre" required> 
            Director: <input type="text" name="director" required> <br><br>
            Desc: <input type="text" name="description" required> 
            Poster: <input type="file" name="image" accept="image/*"> 
            <button type="submit" name="add_movie">Add</button>
        </form>
    </fieldset>

    <fieldset style="margin-bottom: 20px;">
        <legend>Update Movie</legend>
        <form method="POST" action="index.php">
            Target ID: <input type="text" name="target_id" required> 
            Title: <input type="text" name="new_title" required> 
            Genre: <input type="text" name="new_genre" required> <br><br>
            Director: <input type="text" name="new_director" required> 
            Desc: <input type="text" name="new_description" required> 
            <button type="submit" name="update_movie">Update</button>
        </form>
    </fieldset>

    <fieldset style="margin-bottom: 20px;">
        <legend>Search</legend>
        <form method="GET" action="index.php">
            Movie ID: <input type="text" name="search_id" required>
            <button type="submit" name="search_btn">Search</button>
            <a href="index.php">Reset</a>
        </form>
        
        <?php if (isset($_GET['search_btn'])): ?>
            <p>
            <?php if ($search_result): ?>
                <b>Found:</b> <?= $search_result->getTitle() ?> | <?= $search_result->getGenre() ?> | <?= $search_result->getDirector() ?> | <?= $search_result->getDescription() ?>
            <?php else: ?>
                <i>Movie ID not found.</i>
            <?php endif; ?>
            </p>
        <?php endif; ?>
    </fieldset>

    <h2>Movie List</h2>
    <table border="1" cellpadding="8" cellspacing="0" width="100%">
        <tr bgcolor="#f4f4f4">
            <th>Poster</th>
            <th>ID</th>
            <th>Title</th>
            <th>Genre</th>
            <th>Director</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        <?php if (empty($_SESSION['movie_list'])): ?>
            <tr><td colspan="7" align="center">No movies available.</td></tr>
        <?php else: ?>
            <?php foreach ($_SESSION['movie_list'] as $m): ?>
            <tr>
                <td align="center">
                    <?php if($m->getImage()): ?>
                        <img src="<?= $m->getImage() ?>" width="50" alt="Poster">
                    <?php else: ?>
                        None
                    <?php endif; ?>
                </td>
                <td><?= $m->getId() ?></td>
                <td><?= $m->getTitle() ?></td>
                <td><?= $m->getGenre() ?></td>
                <td><?= $m->getDirector() ?></td>
                <td><?= $m->getDescription() ?></td>
                <td>
                    <a href="index.php?delete=<?= $m->getId() ?>" onclick="return confirm('Delete?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>

</body>
</html>