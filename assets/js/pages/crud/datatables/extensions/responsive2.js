"use strict";
var KTDatatablesExtensionsResponsive = function() {

	var initTable1 = function() {
		var table = $('#kt_datatable2');

		// begin first table
		table.DataTable({
			retrieve: true,
			responsive: true,
			columnDefs: [
				{
					width: '20px',
					targets: 0
				},

			]
		});
	};

	return {
		//main function to initiate the module
		init: function() {
			initTable1();
		}
	};
}();

jQuery(document).ready(function() {
	KTDatatablesExtensionsResponsive.init();
});
