$(document).ready(function() {
    $('#summernote').summernote();
});

tinymce.init({
    selector: "#mytextarea"
});  

$(document).ready(function(){
    $('#selectAllBoxes').click(function(event){
        if (this.checked){
            $('.checkBoxes').each(function(){
                this.checked = true;
            })
        } else {
            $('.checkBoxes').each(function(){
                this.checked = false;
            })
        }
    })
});