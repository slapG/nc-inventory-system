$(document).ready(function () {
    if (!$.fn.DataTable.isDataTable('#usersTable')) {
        console.log('items.js loaded');
        let table = $('#usersTable').DataTable({
            scrollX: true,
            pagelength: 20,
            lengthMenu: [20, 50, 100, 500],
            processing: false,
            serverSide: false,
            ajax: {
                url: "/nc-inventory-system/admin/users/getUsers",
                type: "GET",
                dataSrc: ""
            },
            columns: [
            { data: "id" },
            {
                data: null,
                title: "Full Name",
                render: function(data, type, row) {
                    // Combine and handle possible null/undefined values
                    const fname = row.firstname || '';
                    const mname = row.middlename ? ` ${row.middlename}` : '';
                    const lname = row.lastname || '';
                    return `<strong>${fname}${mname} ${lname}</strong>`.trim();
                }
            },
            { data: "id_number" },
            {
                data: "is_active",
                render: function(data, type, row) {
                    return data === "1" ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-secondary">Inactive</span>';
                }
            },
            { data: "department_name" },
            { data: "position_name" },
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
                    render: function (data, type, row) {
                    return `
                        <a href="/nc-inventory-system/admin/users/edit/${row.id}" class="btn btn-primary btn-sm" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button class="btn btn-danger btn-sm delete-user" id="delete-user" data-id="${row.id}" title="Deactivate">
                            <i class="fas fa-user-slash"></i>
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

$(document).ready(function(){
    $('#usersTable').on('click', '.delete-user', function(e) {
        const userId = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: 'Are you sure you want to deactivate this account?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, deactivate',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrfToken"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/nc-inventory-system/admin/users/deactivate/' + userId,
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



$(document).ready(function() {
    $('#addUserForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: '/nc-inventory-system/admin/users/add',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    $('#addUserModal').modal('hide');
                    $('#addUserForm')[0].reset();
                    Swal.fire('Success', response.message, 'success').then(() => {
                    });
                } else {
                    Swal.fire('Error', response.message, 'error');
                    console.log(response.errors);
                }
            },
            error: function(xhr) {
                Swal.fire('Error', 'An unexpected error occurred.', 'error');
            }
        });
    });
});


