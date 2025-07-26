<x-layout title="Home Page" pageTitle="Home">
    <div class="container">
        <div class="col-sm-12">
            <div style="text-align: center;">
                <h2>Contact List</h2>
            </div>

            <table class="table table-bordered table-striped" style="margin-top: 10px;">
                <thead>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Message</th>
                    <th>Action</th>
                </thead>
                <tbody id="tbody">

                </tbody>
            </table>
        </div>
    </div>
    @include('delete_modal')
</x-layout>
<script>
$(document).ready(function() {
    loadContact();
});

function loadContact() {
    $.ajax({
        url: "/contact-data",
        type: "GET",
        success: function(response) {
            $('#tbody').html(response.html);
        },
        error: function() {
            alert("Error loading contact data");
        }
    });
}

$(document).on('click', '.delete', function() {
    var id = $(this).data('id');

    $.ajax({
        url: "/contact/getContact/" + id,
        type: "GET",
        success: function(response) {
            $('#username').html(response.data.name);
            $('#delete_id').val(response.data.id);
            $('#deleteModal').modal('show');

        }

    });
});

$('#confirmDelete').click(function() {
    var del_id = $('#delete_id').val();

    $.ajax({
        url: "/contact/delete/" + del_id,
        type: "DELETE",
        data: {
            _token: "{{ csrf_token() }}"
        },
        success: function() {
            alert("Deleted Successfully!");
            $('#deleteModal').modal('hide');
            loadContact();
        }
    });
});
</script>