$(document).ready(function () {
    if (!$.fn.DataTable.isDataTable('#userItemsTable')) {
        console.log('items.js loaded');
        let table = $('#userItemsTable').DataTable({
            scrollX: true,
            pagelength: 20,
            lengthMenu: [20, 50, 100, 500],
            processing: false,
            serverSide: false,
            ajax: {
                url: "/nc-inventory-system/admin/items/getItems",
                type: "GET",
                dataSrc: ""
            },
            columns: [
            {
                data: "id",
                render: function (data, type, row, meta) {
                    return '<input type="checkbox" class="row-checkbox text-center" value="' + data + '">';
                },
                orderable: false,
                searchable: false
            },
            { data: "item_name" },
            { data: "description" },
            { data: "code" },
            { data: "quantity" },
            { data: "purchase_date" },
            { data: "acquire_date" },
            {
                data: "status",
                render: function(data) {
                    if (data === 'ACCOMPLISHED') return '<span class="badge bg-success">ACCOMPLIHSED</span>';
                    if (data === 'APPROVED') return '<span class="badge bg-success text-dark">APPROVED</span>';
                }
            },
            { data: "type" },
            { data: "user_id" }, 
            { data: "user_added" },     
            { data: "user_modified" },  
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
                    `;
                }
            }
        ]
        });
    }
    
    $(document).on('click', '#getCheckedIdsBtn', function() {
        var checkedIds = [];
        $('#userItemsTable .row-checkbox:checked').each(function() {
            checkedIds.push($(this).val());
        });

        if (checkedIds.length === 0) {
            Swal.fire('No items selected', 'Please select at least one item.', 'warning');
            return;
        }

        // viewedUserId is set in your view.php
        $.ajax({
            url: '/nc-inventory-system/admin/items/sendItems',
            type: 'POST',
            data: {
                item_ids: checkedIds,
                user_id: viewedUserId
            },
            headers: {
                'X-CSRF-Token': $('meta[name="csrfToken"]').attr('content')
            },
            success: function(response) {
                Swal.fire('Success', 'Items sent to user!', 'success').then(() => {
                    $('#userItemsTable').DataTable().ajax.reload();
                });
            },
            error: function() {
                Swal.fire('Error', 'Failed to send items.', 'error');
            }
        });
    });
});