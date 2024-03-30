@extends('AdminLayout.app')
@section('css')

<!-- App favicon -->
<link rel="shortcut icon" href="{{config('app.assets2')}}images/favicon.ico">

<!-- Plugins css -->
<link href="{{config('app.assets2')}}libs/dropzone/dropzone.css" rel="stylesheet" type="text/css" />

<!-- Layout config Js -->
<script src="{{config('app.assets2')}}js/layout.js"></script>
<!-- Bootstrap Css -->
<link href="{{config('app.assets2')}}css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{config('app.assets2')}}css/icons.min.css" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{config('app.assets2')}}css/app.min.css" rel="stylesheet" type="text/css" />
<!-- custom Css-->
<link href="{{config('app.assets2')}}css/custom.min.css" rel="stylesheet" type="text/css" />
@stop
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        
@section('content')
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

                    <!-- <form id="createproduct-form" autocomplete="off" class="needs-validation" novalidate> -->
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label" for="product-title-input">Product Title</label>
                                            <input type="hidden" class="form-control" id="formAction" name="formAction" value="add">
                                            <input type="text" class="form-control d-none" id="product-id-input">
                                            <input type="text" name="name" class="form-control" id="product-title-input" value="" placeholder="Enter product title" >
                                            <div class="invalid-feedback">Please Enter a product title.</div>
                                        </div>
                                        <div>
                                            <label>Product Description</label>

                                            <div id="ckeditor-classicc">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Product Gallery</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <h5 class="fs-14 mb-1">Product Image</h5>
                                            <p class="text-muted">Add Product main Image.</p>
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
                                                        <input class="form-control d-none" name="main_image" value="" id="product-image-input" type="file" accept="image/png, image/gif, image/jpeg">
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
                                            <h5 class="fs-14 mb-1">Product Gallery</h5>
                                            <p class="text-muted">Add Product Gallery Images.</p>

                                            <div class="dropzone" >
                                                <div class="fallback">
                                                    <input name="file" id="Gallery-images" type="file" multiple="multiple">
                                                </div>
                                                <div class="dz-message needsclick">
                                                    <div class="mb-3">
                                                        <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                                    </div>

                                                    <h5>Drop files here or click to upload.</h5>
                                                </div>
                                            </div>

                                            <ul class="list-unstyled mb-0" id="dropzone-preview">
                                                <li class="mt-2" id="dropzone-preview-list">
                                                    <!-- This is used as the file preview template -->
                                                    <div class="border rounded">
                                                        <div class="d-flex p-2">
                                                            <div class="flex-shrink-0 me-3">
                                                                <div class="avatar-sm bg-light rounded">
                                                                    <img data-dz-thumbnail class="img-fluid rounded d-block" src="#" alt="Product-Image" />
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <div class="pt-1">
                                                                    <h5 class="fs-14 mb-1" data-dz-name>&nbsp;</h5>
                                                                    <p class="fs-13 text-muted mb-0" data-dz-size></p>
                                                                    <strong class="error text-danger" data-dz-errormessage></strong>
                                                                </div>
                                                            </div>
                                                            <div class="flex-shrink-0 ms-3">
                                                                <button data-dz-remove class="btn btn-sm btn-primary">Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <!-- end dropzon-preview -->
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->

                                <div class="card">
                                    <div class="card-header">
                                        <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#addproduct-general-info" role="tab">
                                                    General Info
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#addproduct-metadata" role="tab">
                                                    Meta Data
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- end card header -->
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="addproduct-general-info" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="manufacturer-name-input">Manufacturer Name</label>
                                                            <input type="text" class="form-control"  id="manufacturer-name-input" placeholder="Enter manufacturer name">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="manufacturer-brand-input">Manufacturer Brand</label>
                                                            <input type="text" class="form-control" id="manufacturer-brand-input" placeholder="Enter manufacturer brand">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end row -->

                                                <div class="row">
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="stocks-input">Stocks</label>
                                                            <input type="text" class="form-control" id="stocks-input" placeholder="Stocks" required>
                                                            <div class="invalid-feedback">Please Enter a product stocks.</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="product-price-input">Price</label>
                                                            <div class="input-group has-validation mb-3">
                                                                <span class="input-group-text" id="product-price-addon">$</span>
                                                                <input type="text" class="form-control" id="product-price-input" placeholder="Enter price" aria-label="Price" aria-describedby="product-price-addon" required>
                                                                <div class="invalid-feedback">Please Enter a product price.</div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="product-discount-input">Discount</label>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text" id="product-discount-addon">%</span>
                                                                <input type="text" class="form-control" id="product-discount-input" placeholder="Enter discount" aria-label="discount" aria-describedby="product-discount-addon">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="orders-input">Orders</label>
                                                            <input type="text" class="form-control" id="orders-input" placeholder="Orders" required>
                                                            <div class="invalid-feedback">Please Enter a product orders.</div>
                                                        </div>
                                                    </div>
                                                    <!-- end col -->
                                                </div>
                                                <!-- end row -->
                                            </div>
                                            <!-- end tab-pane -->

                                            <div class="tab-pane" id="addproduct-metadata" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="meta-title-input">Meta title</label>
                                                            <input type="text" class="form-control" placeholder="Enter meta title" id="meta-title-input">
                                                        </div>
                                                    </div>
                                                    <!-- end col -->

                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="meta-keywords-input">Meta Keywords</label>
                                                            <input type="text" class="form-control" placeholder="Enter meta keywords" id="meta-keywords-input">
                                                        </div>
                                                    </div>
                                                    <!-- end col -->
                                                </div>
                                                <!-- end row -->

                                                <div>
                                                    <label class="form-label" for="meta-description-input">Meta Description</label>
                                                    <textarea class="form-control" id="meta-description-input" placeholder="Enter meta description" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <!-- end tab pane -->
                                        </div>
                                        <!-- end tab content -->
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                                <div class="text-end mb-3">
                                    <button  id="submitBtn" class="btn btn-primary w-sm">Submit</button>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Publish</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="choices-publish-status-input" class="form-label">Status</label>

                                            <select class="form-select" id="choices-publish-status-input" data-choices data-choices-search-false>
                                                <option value="Published" selected>Published</option>
                                                <option value="Scheduled">Scheduled</option>
                                                <option value="Draft">Draft</option>
                                            </select>
                                        </div>

                                        <div>
                                            <label for="choices-publish-visibility-input" class="form-label">Visibility</label>
                                            <select class="form-select" id="choices-publish-visibility-input" data-choices data-choices-search-false>
                                                <option value="Public" selected>Public</option>
                                                <option value="Hidden">Hidden</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Publish Schedule</h5>
                                    </div>
                                    <!-- end card body -->
                                    <div class="card-body">
                                        <div>
                                            <label for="datepicker-publish-input" class="form-label">Publish Date & Time</label>
                                            <input type="text" id="datepicker-publish-input" class="form-control" placeholder="Enter publish date" data-provider="flatpickr" data-date-format="d.m.y" data-enable-time>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Product Categories</h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="text-muted mb-2"> <a href="#" class="float-end text-decoration-underline">Add
                                                New</a>Select product category</p>
                                        <select class="form-select" id="choices-category-input" name="choices-category-input" data-choices data-choices-search-false>
                                            <option value="Appliances">Appliances</option>
                                            <option value="Automotive Accessories">Automotive Accessories</option>
                                            <option value="Electronics">Electronics</option>
                                            <option value="Fashion">Fashion</option>
                                            <option value="Furniture">Furniture</option>
                                            <option value="Grocery">Grocery</option>
                                            <option value="Kids">Kids</option>
                                            <option value="Watches">Watches</option>
                                        </select>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Product Tags</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="hstack gap-3 align-items-start">
                                            <div class="flex-grow-1">
                                                <input class="form-control" id="myInput" data-choices data-choices-multiple-remove="true" placeholder="Enter tags" type="text" value="Cotton" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Product Short Description</h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="text-muted mb-2">Add short description for product</p>
                                        <textarea class="form-control" placeholder="Must enter minimum of a 100 characters" rows="3"></textarea>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->

                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                    <!-- </form> -->

                </div>
                <!-- container-fluid -->
            </div>
@stop
            <!-- End Page-content -->

@section('javascript')


<!-- JAVASCRIPT -->
<script src="{{config('app.assets2')}}libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{config('app.assets2')}}libs/simplebar/simplebar.min.js"></script>
    <script src="{{config('app.assets2')}}libs/node-waves/waves.min.js"></script>
    <script src="{{config('app.assets2')}}libs/feather-icons/feather.min.js"></script>
    <script src="{{config('app.assets2')}}js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="{{config('app.assets2')}}js/plugins.js"></script>

    <!-- ckeditor -->
    <script src="{{config('app.assets2')}}libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>

    <!-- dropzone js -->
    <script src="{{config('app.assets2')}}libs/dropzone/dropzone-min.js"></script>

    <script src="{{config('app.assets2')}}js/pages/ecommerce-product-create.init.js"></script>

    <!-- App js -->
    <script src="{{config('app.assets2')}}js/app.js"></script>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>

$(function () {
    var uploadedImages = [];
    var dropzonePreviewNode = document.querySelector("#dropzone-preview-list"),
        previewTemplate = (dropzonePreviewNode.itemid = "", dropzonePreviewNode.parentNode.innerHTML),
        dropzone = (dropzonePreviewNode.parentNode.removeChild(dropzonePreviewNode), new Dropzone(".dropzone", {
            url: '{{ route("gallery_upload_post") }}',
            method: "post",
            previewTemplate: previewTemplate,
            previewsContainer: "#dropzone-preview",
            
            init: function () {
                var self = this;

                this.on("sending", function (file, xhr, formData) {
                    // Append the CSRF token to the FormData
                    formData.append('_token', '{{ csrf_token() }}');
                });

                this.on("success", function (file, response) {
                    // Handle the success response here
                    // console.log(response); // Log the response to the console
                    if (response.images) {
                        // Generate a unique identifier using file name and timestamp
                        var uniqueId = file.name + '_' + Date.now();
                        file.previewElement.setAttribute("data-unique-id", uniqueId);

                        // Push the image information along with the unique ID to the array
                        uploadedImages.push({
                            uniqueId: uniqueId,
                            dataURL: file.dataURL,
                            serverFileName: response.images
                        });
                        console.log("Uploaded Images:", response.images);
                    }
                });

                this.on("removedfile", function (file) {
                    // Get the unique ID associated with the removed file
                    var uniqueId = file.previewElement.getAttribute("data-unique-id");
                    
                    // Remove the image from the array based on the unique ID
                    uploadedImages = uploadedImages.filter(img => img.uniqueId !== uniqueId);
                    console.log("Updated Images:", uploadedImages.map(img => img.serverFileName));

                });
            }
        }));
});







    </script>

   
    <script>
                var editor;
        ClassicEditor.create(document.querySelector('#ckeditor-classicc')).then(ckEditorInstance => {
                editor = ckEditorInstance;

                // CKEditor is now initialized, register the click event
                $(document).ready(function () {
                    $("#submitBtn").click(function () {
                        // Get CKEditor content using the getData method
                        var editorContent = editor.getData();
                        var nameValue = $("#product-title-input").val();
                        var mainimageValue = $('#product-image-input')[0].files[0];
                       

                        var formData = new FormData();
                        formData.append('_token', '{{ csrf_token() }}');
                        formData.append('content', editorContent);
                        formData.append('name', nameValue);
                        formData.append('main_image', mainimageValue);
                        
                        $.ajax({
                            type: 'POST',
                            url: '{{ route("create_product_post") }}', // Replace 'your.route.name' with your actual route name
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function (response) {
                                console.log(response);
                                alert(response.message);
                            },
                            error: function (error) {
                                console.error('Error:', error);
                                //alert(error.responseJSON.error);
                            }
                        });
                    });
                });
            })
            .catch(error => {
                console.error(error);
            });
</script>




@stop