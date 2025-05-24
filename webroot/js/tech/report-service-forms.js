$(document).ready(function () {
    if (!$.fn.DataTable.isDataTable('#reportServiceFormsTable')) {
        console.log('items.js loaded');
        let table = $('#reportServiceFormsTable').DataTable({
            processing: false,
            serverSide: false,
            ajax: {
                url: "/nc-inventory-system/tech/serviceForms/getReportServiceForms",
                type: "GET",
                dataSrc: ""
            },
            columns: [
                { data: "id" },
                { data: "user_id" },
                { data: "user_pos" },
                { data: "user_dept" },
                { data: "photo" },
                { data: "description" },
                { data: "user_endorsed" },
                { data: "user_enpos" },
                { data: "status_id" },
                {
                    data: "is_active",
                    render: function (data) {
                        return data === "1"
                            ? '<span class="badge badge-success">Active</span>'
                            : '<span class="badge badge-secondary">Inactive</span>';
                    }
                },
                { data: "user_actioned"},
                { data: "created" },
                { data: "modified" },
                {
                    data: null,
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row) {
                        return `<a href="/nc-inventory-system/tech/repair-forms/add/${row.id}" class="btn btn-primary btn-sm">Create Report</a>`;
                    }
                }
            ]
        });

        setInterval(function () {
            table.ajax.reload(null, false); 
        }, 5000);
    }
});