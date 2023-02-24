<?php
$pdo = new PDO("mysql:host=localhost;dbname=pdo", 'root', 'root',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

function create_category($name, $parent_id) {
    global $pdo;
    $sql = "INSERT INTO categories (name, parent_id) VALUES (:name, :parent_id)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':name',$name);
    $stmt->bindValue(':parent_id',$parent_id);

    $stmt->execute();

}
function get_categories() {
    global $pdo;
    $query = "SELECT * FROM categories WHERE deleted_at IS NULL";
    $stmt = $pdo -> prepare($query);

    $stmt -> execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function delete_category($id) {

    global $pdo;
    $sql = "DELETE FROM categories WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id',(int)$id);

    $stmt->execute();
    return true;
}
function place_categories() {
    $categories = get_categories();
    if ($categories) {
        foreach ($categories as $category) {
            $name = $category['name'];
            $id = $category['id'];
            echo "<option value='$id'>$name</option>";
        }
    }
}
?>

