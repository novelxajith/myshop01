@include('admin/header');
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Create Product</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                        <li class="breadcrumb-item active">Create Product</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    
                        <div class="row">
                            <div class="col-lg-6">
                            <form id="main-form" >
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label" for="product-title-input">Main Category Name</label>
                                            
                                            <input type="text" name="name" class="form-control" id="main-name" value="" placeholder="Enter Main Category title" >
                                            <div class="invalid-feedback">Please Enter a category name.</div>
                                        </div>
                                        

                                        <div class="mb-4">
                                            <h5 class="fs-14 mb-1">Main Category Image</h5>
                                            <p class="text-muted">Add Category main Image.</p>
                                            <div class="text-center">
                                                <div class="position-relative d-inline-block">
                                                    <div class="position-absolute top-100 start-100 translate-middle">
                                                        <label for="product-image-input" class="mb-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Select Image">
                                                            <div class="avatar-xs">
                                                                <div class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                                    <i class="ri-image-fill"></i>
                                                                </div>
                                                            </div>
                                                        </label>
                                                        <input class="form-control d-none" name="image" onchange="displayImage(this)" value="" id="product-image-input" type="file" accept="image/png, image/gif, image/jpeg">
                                                    </div>
                                                    <div class="avatar-lg">
                                                        <div class="avatar-title bg-light rounded">
                                                            <img src="" id="product-img" class="avatar-md h-auto" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->
                                
                                
                                <div class="text-end mb-3">
                                    <button type="submit" class="btn btn-primary w-sm">Submit</button>
                                </div>
                                </form>
                            </div>
                            <!-- end col -->

                            <div class="col-lg-6">
                            <form  id="sub-form">
                                @csrf
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label" for="product-title-input">Sub Category Name</label>
                                            
                                            <input type="text" name="name2" class="form-control" id="sub-name"  placeholder="Enter Sub Category title" >
                                            
                                            <div class="invalid-feedback">Please Enter a category name.</div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="choices-publish-status-input" class="form-label">Select Main Category</label>

                                            <select class="form-select" id="" name="main_category" >
                                            @foreach ($main_categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        </div>

                                        <div class="mb-4">
                                            <h5 class="fs-14 mb-1">Category Image</h5>
                                            <p class="text-muted">Add Category Image.</p>
                                            <div class="text-center">
                                                <div class="position-relative d-inline-block">
                                                    <div class="position-absolute top-100 start-100 translate-middle">
                                                        <label for="image-input" class="mb-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Select Image">
                                                            <div class="avatar-xs">
                                                                <div class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                                    <i class="ri-image-fill"></i>
                                                                </div>
                                                            </div>
                                                        </label>
                                                        <input class="form-control d-none" name="image" onchange="displayImage2(this)" value="" id="image-input" type="file" accept="image/png, image/gif, image/jpeg">
                                                    </div>
                                                    <div class="avatar-lg">
                                                        <div class="avatar-title bg-light rounded">
                                                            <img src="" id="product-img2" class="avatar-md h-auto" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->

                                
                                <div class="text-end mb-3">
                                    <button type="submit" class="btn btn-primary w-sm">Submit</button>
                                </div>
                            </form>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                    

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
@include('admin/footer');

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    
    $(document).ready(function () {
    $('#main-form').submit(function (event) {
        event.preventDefault();

        const formData = new FormData(this);
        formData.append('_token','{{ csrf_token() }}');

        const nameValue = $('#main-name').val();
        const imageValue = $('#product-image-input').val();

        if (nameValue.trim() === '') {
            alert('Enter Category Name');
            return;
        }
        if (imageValue.trim() === '') {
            alert('Please Upload Image');
            return;
        }
        const routeName = '{{ route('main_category_post') }}'; // Corrected the variable name
        
        insert(formData, routeName);

    });

    $('#sub-form').submit(function (event) {
        event.preventDefault();

        const formData = new FormData(this);
        formData.append('_token','{{ csrf_token() }}');
        const nameValue = $('#sub-name').val();
        const imageValue = $('#image-input').val();

        if (nameValue.trim() === '') {
            alert('Enter Sub Category Name');
            return;
        }
        if (imageValue.trim() === '') {
            alert('Please Upload Image');
            return;
        }
        const routeName = '{{ route('sub_category_post') }}'; // Corrected the variable name
        
        insert(formData, routeName);

    });

    function insert(formData, routeName) {

        $.ajax({
            type: 'POST',
            url: routeName, 
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);
                alert(response['message']);
            },
            error: function (error) {
                console.error('Error:', error);
                alert(response['error']);
            }
        });

    }
});

</script>

<script>
    function displayImage(input) {
        var productImg = document.getElementById('product-img');
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                productImg.src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    function displayImage2(input) {
        var productImg = document.getElementById('product-img2');
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                productImg.src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

