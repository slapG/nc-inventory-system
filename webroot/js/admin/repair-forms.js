$(document).ready(function(){
    console.log('items.js loaded');
    $('#repairFormsTable').DataTable({
        processing: true,
        serverSide: false, 
        ajax: {
            url: "/nc-inventory-system/admin/repairForms/getRepairForms",
            type: "GET",
            dataSrc: "" 
        },
        columns: [
            { data: "id" },
            { data: "control_no" },
            { data: "item_id" }, 
            { data: "description" },
            { data: "department_id" },
            { data: "findings" },
            { data: "recommendation" },
            { data: "action_taken" },
            { data: "requested_by" },
            { data: "inspected_by" },
            {
                data: "is_active",
                render: function(data, type, row) {
                    return data === "1"
                        ? '<span class="badge badge-success">Active</span>'
                        : '<span class="badge badge-secondary">Inactive</span>';
                }
            },
            { data: "status" },
            { data: "created" },
            { data: "modified" },
            {
                data: null,
                orderable: false,
                searchable: false,
                render: function (data, type, row) {
                    return `
                        <a href="/nc-inventory-system/admin/repair-forms/edit/${row.id}" class="btn btn-primary btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm delete-repair-form" data-id="${row.id}">Delete</button>
                    `;
                }
            }
        ]
    });
});
