$(document).ready(function(){
    console.log('items.js loaded');
    $('#serviceFormsTable').DataTable({
        processing: true,
        serverSide: false, 
        ajax: {
            url: "/nc-inventory-system/admin/serviceForms/getServiceForms",
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
                render: function(data, type, row) {
                    return data === "1"
                        ? '<span class="badge badge-success">Active</span>'
                        : '<span class="badge badge-secondary">Inactive</span>';
                }
            },
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
