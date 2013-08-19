$(document).ready(function() {
    // Hide URL bar on load
	setTimeout(function(){
    	window.scrollTo(0, 0);
    }, 0);
    
    /*$(function() {
        $(document).scrollTop( $(".list--master").offset().top );  
    });*/
    $('.add-item').hide();
    $('.form--edit-item').hide();
    $('.button--edit').click(function() {
        var itemid = '#form-' + $(this).attr('id');
        $(itemid).toggle();
    });
    $('.button--add-new').click(function() {
        $('.add-item').toggle();
    });
     $(".marked-input").click(function() {
            if ($(this).hasClass('check--Items')) {
                var check_table = 'Items';
            }
            else if ($(this).hasClass('check--Favorites')) {
                var check_table = 'Favorites';
            }
            else if ($(this).hasClass('check--Categories')) {
                var check_table = 'Categories';
            }
            if($(this).is(':checked')) {
                var check_marked = 1;
                $(this).parent().addClass('struck').removeClass('unstruck');
            }
            else {
                var check_marked = 0;
                $(this).parent().removeClass('struck').addClass('unstruck');
            }        
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
