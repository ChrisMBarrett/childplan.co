    //enable / disable
    $('#enable').click(function() {
        $('#user .editable').editable('toggleDisabled');
    });

$(document).ready(function() {
    //toggle `popup` / `inline` mode
    $.fn.editable.defaults.mode = 'inline';     
    
    //make username editable
    $('#enquiryname').editable({
    ajaxOptions : {
        type : 'post'
    }
});

    //make phone number editable
    $('#enquiryphone').editable({
    ajaxOptions : {
        type : 'post'
    }
});

    //make email address editable
    $('#enquiryemail').editable({
    ajaxOptions : {
        type : 'post'
    }
});

    // Make Childs Name editable
    $('#childsname').editable({
    ajaxOptions : {
        type : 'post'
    }
});

    // Make Childs DOB editable
    $('#childsdob').editable({
    ajaxOptions : {
        type : 'post'
    }
});

    // Make Childs DOB editable
    $('#startdate').editable({
    ajaxOptions : {
        type : 'post'
    }
});

    // Make Enquiry Date editable
    $('#enquirydate').editable({
    ajaxOptions : {
        type : 'post'
    }
});

    //make status editable
    $('#enquirystatus').editable({
        type: 'select',
        title: 'Select Enquiry Status',
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