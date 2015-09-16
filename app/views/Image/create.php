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
        <input type="text" name="id_tag" class="input_tags">
        <br>
        <button type="button" name="new_tag">button</button>
        <br>
        <input type="submit" name="add_image" value="Add">
    </form>
</div>
<!--
    Script for create new tag and for get list of createds tags
-->
<script>

$(document).ready(function(){
    // autocomplete function
    $("input[name='id_tag']" ).autocomplete({
        source: '/tag/autocomplete',
        minLength: 1
    });
    
    
    
         var availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];
    
    function split(val){
      return val.split( /,\s*/ );
    }
    function extractLast(term){
      return split(term).pop();
    }
    /*
    $("#tags")
    // остановить смену фокуса, если выделен один из элементов автозаполнения
    .bind( "keydown", function(event){
      if ( event.keyCode === $.ui.keyCode.TAB &&
      $(this).data("autocomplete").menu.active ){
        event.preventDefault();
      }
    })
    .autocomplete({
      minLength: 0,
      source: function(request, response){
        // делегируем поиск элементов автозаполнения обратно плагину, предварительно убрав уже выбранные элементы
        response( $.ui.autocomplete.filter(
        availableTags, extractLast(request.term)) );
      },
      focus: function(){
        // отменяем вставку значения на получение фокуса
        return false;
      },
      select: function(event, ui){
        var terms = split(this.value);
        // удаляем вводимую часть текста и помещаем вместо нее выбранный элемент
        terms.pop();
        terms.push(ui.item.value);
        // собираем все элементы в строку, разделяя их запятыми и вставляем 
        // строку обратно в текстовое поле
        terms.push("");
        this.value = terms.join(", ");
        return false;
      }
    });
  */
 
        
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