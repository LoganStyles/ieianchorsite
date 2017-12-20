//function modalLoader(mode,type,id){    
//    console.log(mode);
//    var form_action = "#" + type + "_action";
//    var formid = "#" + type + "_form";
//    var header = "#" + type + "_header";
//    var modal="#"+type+"_modal";
//    var submit_but = formid + " input[type='submit']";
//
//    var itemid = "#" + type + "_ID";
////    console.log('form_action: ' + form_action);
////    console.log('formid: ' + formid);
////    console.log('modal: ' + modal);
////    console.log('submit_but: ' + submit_but);
//        
//    switch(mode){
//        case 'new':
//            console.log('inside new');
//            $(header).text('New Item');
//            $(formid).trigger('reset');
////            $(form_action).val("insert");
//            $(modal).modal({backdrop: false, keyboard: false});
//            break;
//    }
//}

function resetForm(formid){
    $(formid).trigger('reset');
    $(formid+" #details").text("");
    $(formid+" #title").text("");
    $(formid+" #id").val(0);
}


//function modalLoader(type, modal, mode, id) {
//        $('#error_div').html("").removeClass("alert alert-danger error");
//        var form_action = "#" + type + "_action";
//        var formid = "#" + type + "_form";
//        var submit_but = formid + " input[type='submit']";
//
//        var itemid = "#" + type + "_ID";
//        console.log('form_action: ' + form_action);
//
//        switch (mode) {
//            case 'new':
//                $(modal).addClass("in").css('display', 'block');
//                $(formid).trigger('reset');
//                $(form_action).val("insert");
//                $(modal).modal({backdrop: false, keyboard: false});
//                break;
//            case 'edit':
//                $(form_action).val("update");
//                $(itemid).val(id);
//                $(modal).addClass("in").css('display', 'block');
//                console.log('case edit');
//                if (type !== "housekeeping") {
//                    fetchRowData(type, id);
//                }
//                break;
//            case 'view':
//                $(form_action).val("view");
//                $(submit_but).attr('disabled', true);
//                $(modal).addClass("in").css('display', 'block');
//                var allforminputs = "#" + type + "_form :input";
//                $(allforminputs).attr('readonly', 'readonly');
//                $(itemid).val(id);
//                console.log('case view');
//                if (type !== "housekeeping") {
//                    fetchRowData(type, id);
//                }
//                break;
//            case 'delete':
//                console.log('case delete');
//                $('#delete_id').val(id);
//                $('#delete_type').val(type);
//                $(form_action).val("delete");
//                $("#delete_modal").modal({backdrop: false, keyboard: false});
//                break;
//            default:
//                break;
//        }
//    }
