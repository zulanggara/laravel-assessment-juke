// let table;

// $(() => {
//     table = $('#candidate-table');

//     $('#candidate-table').on('click', '.btn-delete', function () {
//         let data = table.row($(this).closest('tr')).data();

//         console.table(data);
//     })
// })

function delete_candidate(id, full_name)
{
    Swal.fire({
        title: `Delete ${full_name}?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post(BASE_URL + 'delete', {
                id,
                _token: CSRF_TOKEN,
                _method: 'DELETE'
            }).done((res) => {
                if (res.status) {
                    Swal.fire({
                        title: `${full_name} Deleted`,
                        icon: 'success',
                        timer:3000
                    })
                    $('#candidate-table').DataTable().ajax.reload()
                }else{
                    Swal.fire({
                        title: `${full_name} not deleted`,
                        icon: 'warning',
                        timer:3000
                    })
                }
            }).fail((res) => {
                Swal.fire({
                    title: `System Error`,
                    icon: 'danger',
                    timer:3000
                })
            })
        }
    })
    // console.log(id + full_name);
}

