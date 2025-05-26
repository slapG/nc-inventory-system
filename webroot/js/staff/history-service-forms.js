$(document).ready(function () {
    if (!$.fn.DataTable.isDataTable('#historyServiceFormsTable')) {
        console.log('items.js loaded');
        let table = $('#historyServiceFormsTable').DataTable({
            scrollX: true,
            pagelength: 20,
            lengthMenu: [20, 50, 100, 500],
            processing: false,
            serverSide: false,
            ajax: {
                url: "/nc-inventory-system/staff/service-forms/getHistoryServiceForms",
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
                        if (data === 'ACCOMPLISHED') return '<span class="badge bg-success">ACCOMPLIHSED</span>';
                        if (data === 'PENDING') return '<span class="badge bg-warning text-dark">Pending</span>';
                        return '<span class="badge bg-secondary">' + data + '</span>';
                    }
                },
                { 
                    data: "user_actioned",
                    render: function(data) {
                        return data ? `<strong>${String(data).toUpperCase()}</strong>` : '';
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
                        return `<button class="btn btn-outline-primary btn-sm p-1 print-service-form" data-id="${row.id}">VIEW</button>`;
                    }
                }
            ]
        });

        setInterval(function () {
            table.ajax.reload(null, false); 
        }, 5000);
    }
});


$(document).on('click', '.print-service-form', function () {
    var id = $(this).data('id');
    $('#printServiceFormViewModal').remove();
    $.get(`/nc-inventory-system/staff/serviceForms/print/${id}`, function (data) {
        $('body').append(data);
        $('#printServiceFormViewModal').modal('show');
    });
});
