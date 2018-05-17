$(document).ready(function(){         
    $(".modal").on('hidden.bs.modal', function () {
        $(this).removeData('bs.modal');
        // and empty the modal-content element
        $('.modal .modal-content').empty(); 

});
});