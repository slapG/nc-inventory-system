$(document).ready(function () {
    if (!$.fn.DataTable.isDataTable('#serviceFormsTable')) {
        console.log('items.js loaded');
        let table = $('#serviceFormsTable').DataTable({
            scrollX: true,
            pagelength: 20,
            lengthMenu: [20, 50, 100, 500],
            processing: false,
            serverSide: false,
            ajax: {
                url: "/nc-inventory-system/staff/serviceForms/getServiceForms",
                type: "GET",
                dataSrc: ""
            },
            columns: [
                { data: "id" },
                { 
                    data: "user_id",
                    render: function(data) {
                        return data ? `<strong>${String(data).toUpperCase()}</strong>` : '';
                    }
                },
                { data: "user_pos" },
                { data: "user_dept" },
                { 
                    data: "user_endorsed",
                    render: function(data) {
                        return data ? `<strong>${String(data).toUpperCase()}</strong>` : '';
                    }
                },
                { data: "user_enpos" },
                {
                    data: "status_id",
                    render: function(data) {
                        if (data === 'APPROVED') return '<span class="badge bg-success">Approved</span>';
                        if (data === 'PENDING') return '<span class="badge bg-warning text-dark">Pending</span>';
                        
                    }
                },
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
                        return `<button class="btn btn-outline-primary btn-sm p-1 edit-service-form" data-id="${row.id}">VIEW</button>`;
                    }
                }
            ]
        });

        setInterval(function () {
            table.ajax.reload(null, false); 
        }, 5000);
    }
});


$(document).on('click', '.edit-service-form', function () {
    var id = $(this).data('id');
    $('#serviceFormViewModal').remove();
    $.get(`/nc-inventory-system/staff/serviceForms/view/${id}`, function (data) {
        $('body').append(data);
        $('#serviceFormViewModal').modal('show');
    });
});


$(document).on('click', '#approveServiceFormBtn', function () {
    var id = $(this).data('id');
    var csrfToken = $('meta[name="csrfToken"]').attr('content');

    $.ajax({
        url: `/nc-inventory-system/staff/serviceForms/approve/${id}`,
        method: 'POST',
        headers: {
            'X-CSRF-Token': csrfToken 
        },
        dataType: 'json',
        success: function (data) {
            if (data.status === 'success') {
                alert('Approved!');
                $('#serviceFormViewModal').modal('hide');
                $('#serviceFormsTable').DataTable().ajax.reload();
            } else {
                alert(data.message || 'Approval failed.');
            }
        },
        error: function (xhr, status, error) {
            alert('Error: ' + (xhr.responseJSON?.message || error));
        }
    });
});
