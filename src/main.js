$(document).ready(function() {
    // Hide URL bar on load
	setTimeout(function(){
    	window.scrollTo(0, 0);
    }, 0);

    /* Toggle the item open and closed when you click the pencil icon*/
    $('.button--edit').click(function() {
        var itemid = '#form-' + $(this).attr('id');
        $(itemid).slideToggle("fast");
    });

    /*Toggle the Add New fields */
    $("#new-item-cancel").click(function() {
        $('#add-modal').hide();
        $('#add-button').show();
        $('#item-name').val("");
        $('#category-list').val("");
    });
    $('#add-button').click(function() {
        $('#add-modal').show();
        $( ".field--name" ).focus();
        $(this).hide();
    });

    /* Behavior for checking an item */
     $(".marked-input").click(function() {

            /* Figure out what type of item it is */
            if ($(this).hasClass('check--Items')) {
                var check_table = 'Items';
            }
            else if ($(this).hasClass('check--Favorites')) {
                var check_table = 'Favorites';
            }
            else if ($(this).hasClass('check--Categories')) {
                var check_table = 'Categories';
            }

            /* Style it */
            if($(this).is(':checked')) {
                var check_marked = 1;
                $(this).parent().addClass('struck').removeClass('unstruck');
            }
            else {
                var check_marked = 0;
                $(this).parent().removeClass('struck').addClass('unstruck');
            }        
            
            /* Mark the item as checked in the database */
            var check_id = $(this).attr('value');
            $.ajax({
                    type: "POST",
                    url: "ajax.php",
                    data: {id: check_id, marked: check_marked, table: check_table}
            });
        });
   
        $('.button--select-all').click(function() {
            $('.marked-input').addClass('struck');
        });
});
