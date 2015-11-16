<div class="form">
    <label>Add image</label>
    <form enctype="multipart/form-data" action="/image/create" method="post">
        <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
        <input name="file_image" type="file" />
        <br>
        <label>Insert name:</label>
        <input type="text" name="title">
        <br>
        <label>Insert description:</label>
        <textarea rows="10" cols="45" name="description"></textarea>
        <br>
        <label>Insert tags: </label>
        <input type="text" id="input_tag" class="input_tags">
        <button type="button" id="add_tag">add</button>
        <br>
        <input type="hidden" name="tags" id="tags">
        <ul id="created_tags"></ul>
        <br>
        <input type="submit" name="add_image" value="Add">
    </form>
</div>
<!--
    Script for create new tag and for get list of createds tags
-->
<script>

$(document).ready(function(){
    
    var tag = $("#input_tag");
    // autocomplete function
    tag.autocomplete({
        source: '/tag/autocomplete',
        minLength: 1
    });
    
    function notEmpty(val) {
        if (val === '') {
            return false;
        } else {
            return true;
        }
    }
    
    function setHidden(tag) {
        var tags = $("#tags");
        var hiddenInput = tags.val();
        if (hiddenInput.length === 0) {
            tags.val(tag);
        } else {
            tags.val(hiddenInput+','+tag);
        }
        
    }
    
    var tags = [];
    
    $("#add_tag").click(function(){
        var val = tag.val();
        if (notEmpty(val)) {
            if (tags.indexOf(val) === -1) {
                tags.push(val);
                setHidden(val);
                $("#created_tags").append("<li>"+val+"</li>");
                //console.log(tags);
                tag.val('');
            }
        }
    });
        
        /*var button = "button[name='new_tag']";
        var tag = "input[name='title_tag']";
        var tags_list = "select[name='id_tag']";
        
        $.ajax({
                type: 'POST',
                url: "/tag/list",
                success: function(data) {
                    var list = jQuery.parseJSON(data);
                    list.forEach(function(item) {
                        $(tags_list).append('<option value="'+item.id+'">'+item.tag+'</option>');
                    });
                },
        });
        
        $(button).click(function(){
            $.ajax({
                type: 'POST',
                url: "/tag/create",
                data: $(tag).serialize(),
                success: function(newTag) {
                    newTag = jQuery.parseJSON(newTag);
                    if (newTag !== 0) {
                        newTag = newTag[0];
                        $(tags_list).append('<option value="'+newTag.id+'">'+newTag.tag+'</option>'); 
                    } else {
                        alert('Enter teg or this tag already exist!');
                    }
                },
            });
        });*/
});
    /**/
</script>