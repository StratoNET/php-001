<script>
  var editor;

    function makePageEditable(item){
        if ($(".editablecontent").length != 0) {
            $(".admin-hidden").addClass('admin-display').removeClass('admin-hidden');
            $(item).attr("onclick","turnOffEditing(this)");
            $(item).html("Turn off editing");
            $(".editablecontent").attr("contenteditable","true");
            $(".editablecontent").addClass("outlined");
            $("#original").val($("#editablecontent").html());
            var editoroptions = {
                allowedContent: true,
                floatSpaceDockedOffsetX: 0
            }
            var elements = document.getElementsByClassName('editablecontent');
            for ( var i = 0; i < elements.length; ++i ) {
                CKEDITOR.inline( elements[i], editoroptions );
            }
            CKEDITOR.on('instanceLoaded', function(event) {
                    editor = event.editor;
            });
        } else {
            alert ('No editable content on this page !');
        }
    }

    function turnOffEditing(item) {
        for (name in CKEDITOR.instances) {
            CKEDITOR.instances[name].destroy()
        }
        $(".admin-display").addClass('admin-hidden').removeClass('admin-display');
        $(".menu-item").attr("onclick","makePageEditable(this)");
        $(".menu-item").html("Edit page content");
        $(".editablecontent").attr("contenteditable","false");
        $(".editablecontent").removeClass("outlined");
        if ($('#original').val() != ''){
            $(".editablecontent").html($("#original").val());
        }
    }

    function saveEditedPage() {
        // get data from ckeditor
        var pagedata = editor.getData();
        // save data
        $("#editedcontent").val(pagedata);
        var options = {success: showResponse};
        $("#editpage").unbind('submit').ajaxSubmit(options);
        return false;
    }

    function showResponse(responseText, statusText, xhr, $form)
    {
        if (responseText == 'Page Saved'){
            $("#original").val('');
            turnOffEditing();
            alert(responseText);
        } else {
            alert(responseText);
        }
    }
</script>
