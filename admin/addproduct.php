<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Addproduct</title>
    <link rel="stylesheet" href="assets/css/style.min.css">
  </head>
  <body>
    <div class="customcontainer">
      <div class="input-center">
      <form action="" method="post">
        <br><br>
        <input type="text" name="name" placeholder="Name"><br><br>
        <input type="number" name="price" placeholder="Price"><br><br>
        <textarea rows="3" name="description" placeholder="Description"></textarea><br><br>
        <select name="category">
          <option selected>Category</option>
          <option value="Electronics">Electronics</option>
          <option value="Clothing">Clothing</option>
          <option value="Appliances">Appliances</option>
        </select><br><br>
        <select name="subcategory">
          <option selected>SubCategory</option>
          <option value="Smartphone">Smartphone</option>
          <option value="Tv">Tv</option>
          <option value="Refrigerator">Refrigerator</option>
        </select><br><br>
        <input type="text" name="quantity" placeholder="Unit"><br><br>
        <input type="file" name="image"><br><br>
        <input type="text" name="size" placeholder="Size"><br><br>
        <input type="text" name="colour" placeholder="Colour"><br><br>
        <input type="text" name="discount" placeholder="Discount"><br><br>
        <select name="status">
          <option selected>Status</option>
          <option value="1">In Stock</option>
          <option value="2">Pending</option>
          <option value="3">Disabled</option>
        </select><br><br>
        <input type="text" name="location" placeholder="Location"><br><br>
        <div class="button-flex">
          <button class="success" type="submit" name="add">Add</button>
          <button class="danger" type="submit" name="Cancel">Cancel</button>
        </div>
      </form>
    </div>
    </div>
  <script src="assets/scripts/custome.js"></script>
  <script src="assets/scripts/jquery.min.js"></script>
  </body>
</html>
