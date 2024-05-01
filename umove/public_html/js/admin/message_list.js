"use strict";
var KTDatatablesBasicPaginations = function() {

	var initTable1 = function() {
		var table = $('#kt_table_1');

		// begin first table
		table.DataTable({
			sortable: true,
			//scrollX: true,
			pagination: true,
			order:[ 2, 'desc' ],
			
			// search: {
			// 	input: $('#generalSearch'),
			// },
			 layout: {
				scroll: true,
			},
			// columns definition
			columnDefs: [
				{
					targets: -1,
					title: 'Actions',
					orderable: false,
				}],
			
			
			
		})
	};

	return {

		//main function to initiate the module
		init: function() {
			initTable1();
		},

	};

}();

jQuery(document).ready(function() {
	KTDatatablesBasicPaginations.init();
});