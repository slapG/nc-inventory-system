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
                url: "/nc-inventory-system/employee/serviceForms/getServiceForms",
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
                        if (data === 'APPROVED') return '<span class="badge bg-success">APPROVED</span>';
                        if (data === 'PENDING') return '<span class="badge bg-warning text-dark">PENDING</span>';
                        if (data === 'REJECTED') return '<span class="badge bg-danger">Rejected</span>';
                        if (data === 'ACCOMPLISHED') return '<span class="badge bg-success">Accomplished</span>';
                        if (data === 'processing') return '<span class="badge bg-info">PROCESSING</span>';
                  
                    },

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
                render: function (data, type, row) {
                    return `
                        <a href="/nc-inventory-system/admin/repair-forms/edit/${row.id}" class="btn btn-primary btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm delete-repair-form" data-id="${row.id}">Delete</button>
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


