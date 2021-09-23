
<div class="main-panel">
  <div class="content-wrapper">
    <!-- Page Title Header Starts-->
    <div class="row page-title-header">
      <div class="col-12">
        <div class="page-header">
          <h4 class="page-title">Settings</h4>
        </div>
      </div>
    </div>
    <!-- Page Title Header Ends-->
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <center>
              <div class="dropdown-header text-center">
                <div class="img-cont">
                  <img src="images/chat/thumb_image1.jpg" alt="Snow">
                  <button data-toggle="modal" data-target="#mod-icon" type="button" class="btn btn-success img-btn">Change</button>
                </div>
                <h3 class="mb-1 mt-3 font-weight-semibold">Radio Al Muwasholah <a type="button" data-toggle="modal" data-target="#mod-sitetitle"><i class="fa fa-pencil-square-o"></i></a></h3>
                <h4 class="font-weight-semibold text-muted mb-0">Radio On Air Al Muwasholah <a type="button" data-toggle="modal" data-target="#mod-label"><i class="fa fa-pencil-square-o"></i></a></h4>

              </div>
            </center>
          </div>
        </div>
      </div>
    </div>


    <div class="card">
      <div class="p-4 pr-5 border-bottom bg-light d-flex justify-content-between">
        <h4 class="card-title mb-0">Background</h4>
        <button type="button" class="btn btn-success btn-fw" data-toggle="modal" data-target="#mod-bg">
          <i class="fa fa-plus-square"></i> Add more</button>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-4 d-flex align-items-center">
            <div>
              <img style="max-width: 300px; max-height: 200px;" src="images/carousel/banner_1.jpg" alt="Profile image">
              <center>
                <input type="checkbox" style="margin-bottom: 25px;" />
              </center>
            </div>
          </div>

          <div class="col-md-4 d-flex align-items-center">
            <div>
              <img style="max-width: 300px; max-height: 200px;" src="images/carousel/login_2.jpg" alt="Profile image">
              <center>
                <input type="checkbox" style="margin-bottom: 25px;" />
              </center>
            </div>
          </div>

          <div class="col-md-4 d-flex align-items-center">
            <div>
              <img style="max-width: 300px; max-height: 200px;" src="images/carousel/banner_7.jpg" alt="Profile image">
              <center>
                <input type="checkbox" style="margin-bottom: 25px;" />
              </center>
            </div>
          </div>

          <div class="col-md-4 d-flex align-items-center">
            <div>
              <img style="max-width: 300px; max-height: 200px;" src="images/carousel/lock_bg.jpg" alt="Profile image">
              <center>
                <input type="checkbox" style="margin-bottom: 25px;" />
              </center>
            </div>
          </div>

          <div class="col-md-4 d-flex align-items-center">
            <div>
              <img style="max-width: 300px; max-height: 300px;" src="images/carousel/dashboard_slides.jpg" alt="Profile image">
              <center>
                <input type="checkbox" style="margin-bottom: 25px;" />
              </center>
            </div>
          </div>

          <div class="col-md-4 d-flex align-items-center">
            <div>
              <img style="max-width: 300px; max-height: 300px;" src="images/carousel/register_1.jpg" alt="Profile image">
              <center>
                <input type="checkbox" style="margin-bottom: 25px;" />
              </center>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="mod-icon" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Change Icon</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Image Upload</label>
            <div class="col-sm-9">
              <div class="input-group col-xs-12">
                <input type="file" class="form-control file-upload-info" placeholder="Upload Image">
                <span class="input-group-append">
                  <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                </span>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success">Save</button>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="mod-sitetitle" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Change Site Title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Site Title</label>
            <div class="col-sm-9">
              <input type="text" class="form-control">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success">Save</button>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="mod-label" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Change Site Lable</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Site Label</label>
            <div class="col-sm-9">
              <input type="text" class="form-control">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success">Save</button>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="mod-bg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Background</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Image Upload</label>
            <div class="col-sm-9">
              <div class="input-group col-xs-12">
                <input type="file" class="form-control file-upload-info" placeholder="Upload Image">
                <span class="input-group-append">
                  <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                </span>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success">Save</button>
        </div>
      </div>
    </div>
  </div>


  <style>
    .img-cont {
      position: relative;
    }

    /* Make the image responsive */
    .img-cont img {
      max-height: 100px;
      height: auto;
      border-radius: 5%;
    }

    /* Style the button and place it in the middle of the img-cont/image */
    .img-cont .img-btn {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      background-color: #19d895;
      color: white;
      font-size: 11px;
      padding: 7px 15px;
      border: none;
      cursor: pointer;
      border-radius: 5px;
      opacity: 0;
    }

    .img-cont .img-btn:hover {
      background-color: #19d895;
      opacity: 0.9;
    }
  </style>

