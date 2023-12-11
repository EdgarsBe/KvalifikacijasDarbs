import './bootstrap';
//Induvidual Row Data Popup with edit functions
$(document).ready(function() {
    function DataHandling() {
        var id = $(this).data('id');
        var Title = $(this).data('title');
        var Summary = $(this).data('summary');
        var Price = $(this).data('price');
        var ReleaseDate = $(this).data('releasedate');
        var Developer = $(this).data('developer');
        var Publisher = $(this).data('publisher');

        var IdContents = id;
        var TextContents = Summary;

        $('#id').val(id);
        $('#Title').val(Title);
        $('#Price').val(Price);
        $('#ReleaseDate').val(ReleaseDate);
        $('#Developer').val(Developer);
        $('#Publisher').val(Publisher);

        $('#showID').html(IdContents);
        $('#Summary').html(TextContents);

        $('#table').hide();
        $('#PopupContainer').fadeIn();
    }

    $('.close').click(function() {
        $('#PopupContainer').hide();
        $('#table').fadeIn();
    });

    $('.row-popup').on('click', DataHandling)

    //Adding Form popup

    $('#ShowPop').click(function(e) {
        e.preventDefault();
        $('#table').fadeOut();
        $('#PopForm').delay("slow").fadeIn();
    });

    $(document).mouseup(function(e) {
        var pop = $('#PopForm');
        if (pop.is(':visible') && !pop.is(e.target) && pop.has(e.target).length === 0 && !$('#ShowPop').is(e.target)) {
            pop.fadeOut();
            $('#table').delay("slow").fadeIn();
        }
    });

    //Delete Forms

    $('#SelectDelete').click(function(e) {
        $('.row-popup').off('click');
        e.preventDefault();
        $('.delCheck').css('display', 'block');
        $('#ProductSel').css('display', 'none');
        $('#ProductDel').css('display', 'block');
    });

    $('#CancelSelect').click(function(e) {
        $('.row-popup').on('click', DataHandling);
        $('input[type="checkbox"]').prop('checked', false);
        e.preventDefault();
        $('.delCheck').css('display', 'none');
        $('#ProductSel').css('display', 'block');
        $('#ProductDel').css('display', 'none');
    });
});