<?php 
require_once 'database_product.php';
$idUser=$_GET['update'];
$result1 = $conn->query("SELECT * FROM products WHERE id =$idUser");
$datauser = mysqli_fetch_array($result1);

?>
<?php
if(isset($_POST['update'])) {
    $name=$_POST['productName'];
    $description=$_POST['description'];
    $price=$_POST['productPrice'];
    $section=$_POST['section'];
    $productid=$_POST['productid'];
    $image=$_FILES['productImage']['name'];
    $tempname=$_FILES['productImage']['tmp_name'];
    $folder="imege/".$image;
    if (move_uploaded_file($tempname, $folder)) {
        $sql = "UPDATE products SET product_name='$name', description='$description', price='$price', image='$folder', section='$section' WHERE id=$productid";
        if ($conn->query($sql) === TRUE) {
            header("Location: products.php");
        } else {
            echo "<script>alert('فشل في تحديث المنتج');</script>";
        }
    } else {
        echo "<script>alert('فشل في رفع الصورة');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <title>Document</title>
</head>
<body style="background-color:#e3f2fd">


<div class="container mt-5" style="display: flex; justify-content: center; margin-bottom: 20vh; ">
        <div class="card" style="width: 24rem; border-radius: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1); background-color: #004080;"> 
            <div class="card-body">
                <img src="imege/logo.png" class="card-img-top" alt="صورة المنتج">
                <form  method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                    </div>
                        <div class="mb-3">
                    <input type="text" name="productid" class="form-control" value="<?php echo $datauser['id']  ?>" id="productName" >
                    </div>
                    <div class="mb-3">
                        <input type="text" name="productName" class="form-control" id="productName" value="<?php echo $datauser['product_name'] ?>">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="description" class="form-control" id="description" value="<?php echo $datauser['description'] ?>">

                    </div>
                    <div class="mb-3">
                        <select name="section" class="form-select" id="section">
                            <option value="<?php echo $datauser['section'] ?>"><?php echo $datauser['section'] ?></option>
                            <option name="mobile">mobile</option>
                            <option name="laptop">laptop</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="productPrice" class="form-control" id="productPrice" value="<?php echo $datauser['price']?>">
                    </div>
                    <div class="mb-3">
                        <input type="file" name="productImage" class="form-control" id="productImage" style="display: none;">
                        <label for="productImage"  class="form-label" style="color:#7cfc00">صورة المنتج</label>
                    </div>
                    <div class="d-flex flex-row mb-2">
                        <div class="p-2">
                            <button type="submit" name="update" class="btn btn-primary w-100"  style="background-color:#7cfc00; color: black">تحديث المنتج <i class="fas fa-edit"></i> </button>
                        </div>
                        <div class="p-2">
                            <a href="products.php" class="btn btn-danger w-100">إلغاء</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous"></script>
</body>
</html>