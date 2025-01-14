$(document).ready(function () {
  $("#TambahData").on("click", function () {
    window.location = APP_URL + "/approval";
  });

  var table = $('#table-needs-approval').DataTable({
    dom: '<"top"f>rt<"bottom"ip><"clear">',
    processing: true,
    serverSide: true,
    ordering: false,
    ajax: {
      url: APP_URL + "/approval/data",
      method: "GET",
    },
    columns: [
      {
        data: "DT_RowIndex",
        name: "DT_RowIndex",
        className: "text-center align-middle",
      },
      {
        data: "workflow_approval.modul",
        className: "text-center align-middle",
      },
      {
        data: "workflow_approval.type",
        className: "text-center align-middle",

      },
      {
        data: "transaction_amount",
        className: "text-center align-middle",

      },
      {
        data: "approval_names",
        className: "text-center align-middle",

      },
      {
        data: 'transaction.created_by',
        className: "text-center align-middle",

      }
    ],
  });
  $("#table-needs-approval_filter").hide();


  $('#table-needs-approval').on('click', '.edit-btn', function () {
    var data = TableWorkFlow.row($(this).parents('tr')).data();
    window.location = APP_URL + "/form-workflow/" + data.id;
  });

  $('#table-needs-approval').on('click', '.delete-btn', function () {
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

