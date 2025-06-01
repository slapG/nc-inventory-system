$(document).ready(function () {
    if (!$.fn.DataTable.isDataTable('#itemsTable')) {
        console.log('items.js loaded');
        let table = $('#itemsTable').DataTable({
            scrollX: true,
            pagelength: 20,
            lengthMenu: [20, 50, 100, 500],
            processing: false,
            serverSide: false,
            ajax: {
                url: "/nc-inventory-system/tech/items/getItems",
                type: "GET",
                dataSrc: ""
            },
            columns: [
            { data: "id" },
            { data: "item_name" },
            { data: "description" },
            { data: "code" },
            { data: "quantity" },
            { data: "purchase_date" },
            { data: "acquire_date" },
            {
                data: "status",
                render: function(data) {
                    if (data === 'PENDING') return '<span class="badge bg-warning">PENDING</span>';
                    if (data === 'APPROVED') return '<span class="badge bg-success text-dark">APPROVED</span>';
                }
            },
            { data: "type" },
            { data: "user_id" }, // Make sure your JSON returns this
            { data: "user_added" },     // Should be a string like "Firstname Middlename Lastname | id_number"
            { data: "user_modified" },  // Should be a string or number
            {
                data: "created",
                title: "Created",
                render: function (data) {
                    const date = new Date(data);
                    return date.toLocaleDateString("en-US") + " | " + date.toLocaleTimeString("en-US", {
                    hour: "2-digit",
                    minute: "2-digit"
                    });
                }
            },
            {
                data: "modified",
                title: "Modified",
                render: function (data) {
                    const date = new Date(data);
                    return date.toLocaleDateString("en-US") + " | " + date.toLocaleTimeString("en-US", {
                    hour: "2-digit",
                    minute: "2-digit"
                    });
                }
            },
            {
                data: null,
                orderable: false,
                searchable: false,
                className: "text-center",
                render: function (data, type, row) {
                    return `
                        <a href="/nc-inventory-system/tech/items/view/${row.id}" class="btn btn-sm btn-success mr-1" title="View">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="/nc-inventory-system/tech/items/edit/${row.id}" class="btn btn-sm btn-primary mr-1" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button class="btn btn-sm btn-danger delete-item" data-id="${row.id}" title="Delete">
                            <i class="fas fa-trash"></i>
                        </button>
                    `;
                }
            }
        ]
        });

        setInterval(function () {
            table.ajax.reload(null, false); 
        }, 5000);
    }
});
