<div class="form">
    <label>Add image</label>
    <form enctype="multipart/form-data" action="/image/create" method="post">
        <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
        <input name="file_image" type="file" />
        <label>Insert name:</label>
        <input type="text" name="name"><br>
        <label>Insert description:</label>
        <textarea rows="10" cols="45" name="description"></textarea>
        <input type="submit" name="add_image" value="Add">
    </form>
</div>
