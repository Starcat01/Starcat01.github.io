<?php
require_once "Database.php";

class Product extends Database
{
    public $id;
    // Edit a product
    public function editProduct()
    {

    $query = "UPDATE " . $this->table_name . " 
                SET product_name=:product_name, price=:price, quantity=:quantity 
                WHERE id=:id";
    $stmt = $this->conn->prepare($query);

    // Bind parameters
    $stmt->bindParam(":product_name", $this->product_name);
    $stmt->bindParam(":price", $this->price);
    $stmt->bindParam(":quantity", $this->quantity);
    $stmt->bindParam(":id", $this->id);

    // Execute
    if ($stmt->execute()) {
        return true;
    }
    return false;
    }

    // Delete a product
    public function deleteProduct() {
    $query = "DELETE FROM " . $this->table_name . " WHERE id=:id";
    $stmt = $this->conn->prepare($query);

    // Bind parameter
    $stmt->bindParam(":id", $this->id);

    // Execute
    if ($stmt->execute()) {
        return true;
    }
    return false;
    }

    public function getProduct(){
        
    }
}
?>