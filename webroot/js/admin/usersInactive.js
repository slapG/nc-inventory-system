$(document).ready(function () {
    if (!$.fn.DataTable.isDataTable('#inactiveUsersTable')) {
        console.log('items.js loaded');
        let table = $('#inactiveUsersTable').DataTable({
            scrollX: true,
            pagelength: 20,
            lengthMenu: [20, 50, 100, 500],
            processing: false,
            serverSide: false,
            ajax: {
                url: "/nc-inventory-system/admin/users/getInactiveUsers",
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
                        <button class="btn btn-success btn-sm activate-user" id="activate-user" data-id="${row.id}" title="Activate">
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
    $('#inactiveUsersTable').on('click', '.activate-user', function(e) {
        const userId = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: 'Are you sure you want to activate this account?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, activate',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrfToken"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/nc-inventory-system/admin/users/activate/' + userId,
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