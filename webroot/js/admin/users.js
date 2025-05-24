$(document).ready(function(){
    console.log('users.js loaded');
    $('#usersTable').DataTable({
        processing: true,
        serverSide: false, 
        ajax: {
            url: "/nc-inventory-system/admin/users/getUsers",
            type: "GET",
            dataSrc: "" 
        },
        columns: [
            { data: "id" },
            { data: "firstname" },
            { data: "middlename" }, 
            { data: "lastname" },
            { data: "email" },
            {
                data: "is_active",
                render: function(data, type, row) {
                    return data === "1" ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-secondary">Inactive</span>';
                }
            },
            { data: "department_name" },
            { data: "created" },
            { data: "modified" },
            {
                data: null,
                orderable: false,
                searchable: false,
                    render: function (data, type, row) {
                    return `
                        <a href="/nc-inventory-system/admin/users/edit/${row.id}" class="btn btn-primary btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm delete-user" data-id="${row.id}">Delete</button>
                    `;
                }
            }
        ]
    });
});
