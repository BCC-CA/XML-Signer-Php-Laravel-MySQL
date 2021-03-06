// Please see documentation at https://docs.microsoft.com/aspnet/core/client-side/bundling-and-minification
$(document).ready(function() {
	$.support.cors = true;
	$('.DatePicker').datepicker({
		format: "yyyy/mm/dd",
		autoclose: true,
		title: "Select Date",
		todayHighlight: true,
		//startView: 'decade',
		weekStart: 6
	});

	$(".sign_file").click(function() {
		var id = $(this).attr('file_id');
		/*var token = $.ajax({
			type: "GET",
			url: "/api/XmlFiles/token/" + id,
			async: false
		}).responseText;*/

		var baseUrl = window.location.protocol + "//" + window.location.host + "/";
		$.ajax({
			type: "POST",
			crossdomain: true,
			//contentType: "application/json; charset=utf-8",
			contentType: 'text/plain',
			accepts: 'application/json',
			url: "http://127.0.0.1:5050/",
			dataType: 'jsonp',
			async: false,
			data: {
				id: $(this).attr('file_id'),
				token: "token_not_implemented",
				downloadUrl: $(this).attr('url'),
				uploadUrl: $('meta[name=base-url]').attr("content") + "/api/XmlFiles/upload",
				reason: "Anything You Give",
				procedureSerial: 1
			},
			success: function(data) {
				alert(data);
				console.log(data);
				location.reload();
			},
			error: function(xhr, ajaxOptions, thrownError) {
				console.log(xhr);
				console.log(ajaxOptions);
				console.log(thrownError);
				location.reload();
			}
		});
	});
	$(".approve_application").click(function() {
		var id = $(this).attr('file_id');
		var application_status = $("#application-status").val();
		var reasaon = $("#reason").val();
		var baseUrl = window.location.protocol + "//" + window.location.host + "/";
		var token = $.ajax({
			type: "GET",
			url: "/api/XmlFiles/token/" + id,
			async: false
		}).responseText;
		$.ajax({
			type: "POST",
			crossdomain: true,
			//contentType: "application/json; charset=utf-8",
			contentType: 'text/plain',
			accepts: 'application/json',
			url: "http://127.0.0.1:5050/",
			dataType: 'jsonp',
			async: false,
			data: {
				id: id,
				token: token,
				downloadUrl: baseUrl + "api/XmlFiles/" + token + "/" + id,
				uploadUrl: baseUrl + "api/XmlFiles",
				reason: "Anything You Give",
				procedureSerial: 1
			},
			success: function(data) {
				updateApplicationStatus(id, application_status, reasaon, baseUrl);
			},
			error: function(xhr, ajaxOptions, thrownError) {
				console.log(xhr);
				console.log(ajaxOptions);
				console.log(thrownError);
				updateApplicationStatus(id, application_status, reasaon, baseUrl);
			}
		});
	});
	$('#leave-application').DataTable({
		/*buttons: [
			{
				text: 'Export to Excel',
				className: 'btn btn-sm btn-dark',
				action: function (e, dt, node, config) {
					var data = table.ajax.params();
					var x = JSON.stringify(data, null, 4);
					window.location.href = "/Home/GetExcel?" + $.param(data);
				},
				init: function (api, node, config) {
					$(node).removeClass('dt-button');
					alert("OK");
				}
			}
		],*/
		"processing": true,
		"serverSide": true,
		"ajax": {
			/*
						headers: {
							//'X-CSRF-TOKEN': $('meta[name=_token]').attr("content"),
							'Accept': 'application/json',
							'Content-Type': 'application/json'
						},
						//$('meta[name=datatable_ajax_url]').attr("content")
						*/
			dataType: "application/json; charset=utf-8",
			url: "api/Datatables/LeaveApplications",
			type: "POST",
			error: function() { // error handling
				$(".category-datatable-error").html("");
				$("#category-datatable").append('<tbody class="category-datatable-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#category-datatable_processing").css("display", "none");
			}
		},
		"columns": [{
			"data": "name"
		}, {
			"data": "position"
		}, {
			"data": "office"
		}, {
			"data": "extn"
		}, {
			"data": "start_date"
		}, {
			"data": "salary"
		}]
	});
});
function updateApplicationStatus(id, application_status, reasaon, baseUrl) {
	$.ajax({ //Update Status
		type: "POST",
		url: baseUrl + "api/XmlFiles/UpdateApplicationStatus",
		data: {
			xml_file_id: id,
			status: application_status,
			reason: reasaon
		},
		success: function(data) {
			if (data) {
				location.reload(true);
			} else {
				alert("Already Approved !!");
			}
		},
		error: function(xhr, ajaxOptions, thrownError) {
			console.log(xhr);
			console.log(ajaxOptions);
			console.log(thrownError);
			alert("Application Status not updated!");
		}
	});
}