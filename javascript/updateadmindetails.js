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
         source: [
            {value: 0, text: 'No'},
            {value: 1, text: 'Yes'},
        ],
        placement: 'right',
        showbuttons: false
    });

// Staff Member Active
    $('.useractive').editable({
        type: 'select',
         source: [
            {value: 0, text: 'No'},
            {value: 1, text: 'Yes'},
        ],
        placement: 'right',
        showbuttons: false
    });
     
});