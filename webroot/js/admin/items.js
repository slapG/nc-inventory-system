$(document).ready(function(){
    console.log('items.js loaded');
    $('#itemsTable').DataTable({
        processing: true,
        serverSide: false, 
        ajax: {
            url: "/nc-inventory-system/admin/items/getItems",
            type: "GET",
            dataSrc: "" 
        },
        columns: [
            { data: "id" },
            { data: "item_name" },
            { data: "code" }, 
            { data: "quantity" },
            { data: "purchase_date" },
            { data: "count" },
            {
                data: "is_active",
                render: function(data, type, row) {
                    return data === "1" ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-secondary">Inactive</span>';
                }
            },
            { data: "user_id" },
            { data: "created" },
            { data: "modified" },
            {
                data: null,
                orderable: false,
                searchable: false,
                    render: function (data, type, row) {
                    return `
                        <a href="/nc-inventory-system/admin/items/edit/${row.id}" class="btn btn-primary btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm delete-user" data-id="${row.id}">Delete</button>
                    `;
                }
            }
        ]
    });
});
