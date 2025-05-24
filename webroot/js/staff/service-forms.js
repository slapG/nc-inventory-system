$(document).ready(function () {
    if (!$.fn.DataTable.isDataTable('#serviceFormsTable')) {
        console.log('items.js loaded');
        let table = $('#serviceFormsTable').DataTable({
            processing: true,
            serverSide: false,
            ajax: {
                url: "/nc-inventory-system/staff/serviceForms/getServiceForms",
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
                { data: "created" },
                { data: "modified" },
                {
                    data: null,
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row) {
                        return `<button class="btn btn-primary btn-sm edit-service-form" data-id="${row.id}">View</button>`;
                    }
                }
            ]
        });

        // 🔁 Auto-refresh every 5 seconds
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
