 /*    //enable / disable
    $('#enable').click(function() {
        $('#user .editable').editable('toggleDisabled');
    });
*/

$(document).ready(function() {
    //toggle `popup` / `inline` mode
    $.fn.editable.defaults.mode = 'inline';     
    
    //make username editable
    $('#enquiryname').editable({
    ajaxOptions : {
        type : 'post'
    }
});

    //Make Tour Guide Editable
    $('.tourguide').editable({
        type: 'select',
        title: 'Select Childs Gender',
        placement: 'right',
        showbuttons: false

    });
    
});