$(document).ready(function() {
    //toggle `popup` / `inline` mode
    $.fn.editable.defaults.mode = 'popup';     
    
    //make username editable
    $('#enquiryname').editable();
    
    //make phone number editable
    $('#contactphone').editable();
    
    //make status editable
    $('#enquirystatus').editable({
        type: 'select',
        title: 'Select status',
        placement: 'right',
        value: 1,
        source: [
            {value: 1, text: 'Open'},
            {value: 2, text: 'Closed'},
        ]
        /*
        //uncomment these lines to send data on server
        ,pk: 1
        ,url: '/post'
        */
    });
    
});