$(document).ready(function () {
  $("#TambahData").on("click", function () {
    window.location = APP_URL + "/form-workflow";
  });

  var TableWorkFlow = $('#table-workflow').DataTable({
    dom: '<"top"f>rt<"bottom"ip><"clear">',
    processing: true,
    serverSide: true,
    ordering: false,

    ajax: {
      url: APP_URL + "/data-workflow",
      method: "GET",

    },
    columns: [
      {
        data: "DT_RowIndex",
        name: "DT_RowIndex",
        className: "text-center align-middle",
      },
      {
        data: "modul",
        className: "text-center align-middle",
      },
      {
        data: "type",
        className: "text-center align-middle",
      },
      {
        data: "value",
        className: "text-center align-middle",

      },
      {
        data: null,
        className: "text-center align-middle",
        render: function (data, type, row) {
          return `
            <button class="btn btn-sm btn-primary edit-btn">Edit</button>
            <button class="btn btn-sm btn-danger delete-btn" >Delete</button>
          `;
        }
      }
    ],
  });
  $("#table-workflow_filter").hide();


  $('#table-workflow').on('click', '.edit-btn', function () {
    var data = TableWorkFlow.row($(this).parents('tr')).data();
    window.location = APP_URL + "/form-workflow/" + data.id;
  });

  $('#table-workflow').on('click', '.delete-btn', function () {
    var data = TableWorkFlow.row($(this).parents('tr')).data();
    Swal.fire({
      width: 400,
      title: "<h5>Hapus Data?</h5>",
      text: "Data yang dihapus tidak dapat dikembalikan!",
      showCancelButton: true,
      confirmButtonColor: "#005BA2",
      cancelButtonColor: "#FFFFFF",
      confirmButtonText: "Ya, Hapus",
      cancelButtonText: "Periksa Kembali",
      customClass: {
        cancelButton: "border text-dark "
      },
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "DELETE",
          url: APP_URL + "/data-workflow/delete",
          data: { id: data.id, _token: $('meta[name="csrf-token"]').attr('content') },
          success: function (response) {
            TableWorkFlow.ajax.reload();
            Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            );
          },
          error: function (data) {
            console.log('Error:', data);
          }
        });
      }
    });
  });
});

