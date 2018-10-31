var  IncomingCall= function() {

    var handleList = function() {
        
        var dataArr = {};
        var columnWidth = {};
        var arrList = {
            'tableID': '#ManageIncomingCall',
            'ajaxURL': baseurl + "admin/IncomingcallsAjaxAction",
            'ajaxAction': 'getdatatableIncomingCall',
            'postData': dataArr,
            'hideColumnList': [],
            'noSearchApply': [0],
            'noSortingApply': [0],
            'defaultSortColumn': 0,
            'defaultSortOrder': 'desc',
            'setColumnWidth': columnWidth
        };
        getDataTable(arrList);
    }


    return {
        
        list_init: function() {
            handleList();
        }
    }
}();