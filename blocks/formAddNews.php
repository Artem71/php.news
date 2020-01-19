<form action="addNews.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title-news">Title</label>
    <input type="text" name="title-news" id="title-news" placeholder="Enter title news" class="form-control">
  </div>
  
  <div class="form-group">
    <label for="text-news">Text</label>
    <input type="text" name="text-news" id="text-news" placeholder="Enter text news" class="form-control">
  </div>

  <div class="form-group">
    <label for="img-news">Photo</label>
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    <input type="file" class="form-control-file" id="img-news" name="img-news">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>