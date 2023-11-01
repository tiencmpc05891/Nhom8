<?php


class CommentDAO {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function addComment($productId, $userId, $commentText) {
        $query = "INSERT INTO comment (product_id, user_id, comment_text) VALUES (:product_id, :user_id, :comment_text)";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':product_id', $productId);
        $statement->bindParam(':user_id', $userId);
        $statement->bindParam(':comment_text', $commentText);

        return $statement->execute();
    }

    public function getCommentsByProduct($productId) {
        $query = "SELECT * FROM comments WHERE product_id = :product_id";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':product_id', $productId);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
