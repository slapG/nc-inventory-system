$(document).ready(function () {
    if (!$.fn.DataTable.isDataTable('#itemsApprovalTable')) {
        console.log('items.js loaded');
        let table = $('#itemsApprovalTable').DataTable({
            scrollX: true,
            pagelength: 20,
            lengthMenu: [20, 50, 100, 500],
            processing: false,
            serverSide: false,
            ajax: {
                url: "/nc-inventory-system/admin/items/getApprovalItems",
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
                    if (data === 'ACCOMPLISHED') return '<span class="badge bg-success">ACCOMPLIHSED</span>';
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
                        <a href="/nc-inventory-system/admin/items/view/${row.id}" class="btn btn-sm btn-success mr-1" title="View">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="/nc-inventory-system/admin/items/edit/${row.id}" class="btn btn-sm btn-primary mr-1" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button class="btn btn-sm btn-danger delete-item" data-id="${row.id}" title="Delete">
                            <i class="fas fa-trash"></i>
                        </button>
                        <button class="btn btn-sm btn-success approve-btn" data-id="${row.id}" title="Approve">
                            <i class="fas fa-check"></i>
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
    $(document).on('click', '#itemsApprovalTable .approve-btn', function () {
        const id = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: 'Are you sure you want to Approve this Item?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Approve',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrfToken"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/nc-inventory-system/admin/items/approve/' + id,
                    type: 'POST',
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire('Success', response.message, 'success').then(() => {
                                $('#usersTable').DataTable().ajax.reload();
                            });
                        } else {
                            Swal.fire('Error', response.message, 'error');
                        }
                    },
                    error: function(xhr) {
                        Swal.fire('Error', 'An unexpected error occurred.', 'error');
                    }
                });
            }
        });
    });
});

    
