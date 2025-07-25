<x-layout title="Contact Page" pageTitle="Contact Form">
    <div class="container" style="margin-top: 10px;">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form id="addForm" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <label>Name:</label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
                </div>
            </div>
            <div style="height: 10px;"></div>

            <div class="row">
                <div class="col-md-3">
                    <label>Email:</label>
                </div>
                <div class="col-md-9">
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
                </div>
            </div>
            <div style="height: 10px;"></div>

            <div class="row">
                <div class="col-md-3">
                    <label>Image:</label>
                </div>
                <div class="col-md-9">
                    <input type="file" name="image" class="form-control" required>
                </div>
            </div>
            <div style="height: 10px;"></div>

            <div class="row">
                <div class="col-md-3">
                    <label>Message:</label>
                </div>
                <div class="col-md-9">
                    <textarea name="message" class="form-control" required>{{ old('message') }}</textarea>
                </div>
            </div>
            <div style="height: 10px;"></div>

            <button class="btn btn-primary" type="submit" name="submit" value="Submit">Submit</button>
            <button class="btn btn-secondary" type="reset" name="reset" value="Reset">Reset</button>
            <!-- <button class="btn btn-warning" type="button" name="home" id="home">Home</button> -->
        </form>
    </div>
</x-layout>

<script>
$(document).ready(function() {
    $('#addForm').on('submit', function(e) {
        e.preventDefault();

        let formData = new FormData(this);
        $.ajax({
            url: "/contact",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                alert(response.message);
                window.location.href = '/';
            },
            error: function(xhr) {
                alert("Something went wrong.");
            }
        });
    });

});


// $('#home').click(function(e) {
//     e.preventDefault();
//     window.location.href = '/'
// });
</script>