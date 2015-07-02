/**
 *
 * DataTables - Data from Ajax, Edit in Place
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2012, Script Tutorials
 * http://www.script-tutorials.com/
 */

$(function() {

  var oMemTable = $('#pd_profiles').dataTable({
      'bProcessing': true, 'bServerSide': true, 'sAjaxSource': 'service.php?action=getMembersAjx',
    }).makeEditable({
    sUpdateURL: 'service.php?action=updateMemberAjx',
    'aoColumns': [
        {
            tooltip: 'kata',
            name : 'kata',
            oValidationOptions : { rules:{ value: {minlength: 1 }  },
            messages: { value: {minlength: 'Min length - 3'} } }
        },
        {
            tooltip: 'pos',
            name : 'pos',
            type: 'select',
            data: "{'passive':'passive','active':'active'}",
            submit: 'Ok',
        },
    ],
    sDeleteURL: 'service.php?action=deleteMember',
    sDeleteRowButtonId: 'btnDeleteMemRow',
  });

});
