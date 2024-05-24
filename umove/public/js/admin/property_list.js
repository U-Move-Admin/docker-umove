"use strict";
var KTDatatablesBasicPaginations = function() {

	var initTable1 = function() {
		var table = $('#kt_table_1');

		// begin first table
		table.DataTable({
			//responsive: true,
			sortable: true,
			scrollX: true,
			order:[ 0, 'desc' ],
			pagination: true,
			columnDefs: [
				{
					targets: 0,
					data: "created_at",
        			render: function(data, type, full, meta) {
						if (typeof data == "undefined")
							return;
				  
						if (type === 'type' || type === 'sort') {
						return data;
						}
						
						// Otherwise format it up
						let datetime = data.split(',')[0];
						let img = data.split(',')[1];
						if(type == "display"){
							var date = new Date(datetime);
							var options = {year: "numeric", month: "long", day: "numeric"};
	
							return '<div>'+date.toLocaleDateString('en-GB', options)+'</div><div>'+
							'<img width="70" src="'+img+'" /></div>';
						}
		
						return data;
				
						
						
					},
				},
				{
					targets: -1,
					title: 'Actions',
					orderable: false,
				},
				{
					targets: 9,
					render: function(data, type, full, meta) {
                       var status = {
							0: {'title': 'Passive', 'state': 'danger'},
							1: {'title': 'Active', 'state': 'primary'},
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="kt-badge kt-badge--inline kt-badge--pill kt-badge--' + status[data].state + ' ">' + status[data].title + '</span>';
					},
				},
			],
		});
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