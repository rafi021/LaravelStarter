function deleteData(id){
    Swal.fire({
        title: 'Are you sure?',
        text: "Delete This Data?",
        icon: 'icon-success',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
            // console.log(id)
            document.getElementById('role-delete-form-'+id).submit();
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        }
      });
}
