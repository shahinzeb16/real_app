<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Addproduct</title>
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/line-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  </head>
  <body>
    <div class="customcontainer">
      <div class="input-center">
      <form action="" method="post">
        <br><br>
        <input type="text" name="name" placeholder="Name"><br><br>
        <input type="number" name="price" placeholder="Price"><br><br>
        <textarea rows="3" name="description" placeholder="Description"></textarea><br><br>
        <button type="button" id="addcat" class="addcat primary"><i class="la la-plus"></i>Add Category</button><br><br>
        <div id="addcategory" style="display:none">
        <input type="text" name="addcategory" placeholder="New Category"><br>
        <button  class="success addcat" type="button">Add</button>
        <br><br>
        </div>
        <select name="category">
          <option selected>Category</option>
          <option value="Electronics">Electronics</option>
          <option value="Clothing">Clothing</option>
          <option value="Appliances">Appliances</option>
        </select><br><br>
        <button id="addsubcat" type="button" class="addcat primary"><i class="la la-plus"></i>Add SubCategory</button><br><br>
        <div id="addsubcategory" style="display:none">
        <select name="category">
          <option selected>Category</option>
          <option value="Electronics">Electronics</option>
          <option value="Clothing">Clothing</option>
          <option value="Appliances">Appliances</option>
        </select><br><br><input type="text" name="addsubcategory" placeholder="New SubCategory"><br><br>
        <button  class="success addcat" type="button">Add</button><br><br>
        </div>
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
  <script src="assets/scripts/custom.js"></script>
  
  </body>
</html>
