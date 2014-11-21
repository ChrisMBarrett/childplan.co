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
 
 // Days till Overdue
    $('.daystilloverdue').editable({
        type: 'select',
         source: [
            {value: 2, text: '2'},
            {value: 5, text: '5'},
            {value: 10, text: '10'},
            {value: 20, text: '20'},
        ],
        placement: 'right',
        showbuttons: false
    });   
    
     
});