<?php
// Require default
require_once 'init.php';

//Khu vuc code

?>
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#admin-bar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Schedule</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class='collapse navbar-collapse' id='admin-bar'>
          <ul class='nav navbar-nav'>
            <li><a href='#' data-toggle='modal' data-target='#list_subject'>Danh sách môn học</a></li>
            <li><a href='#' data-toggle='modal' data-target='#add_subject'>Thêm môn học</a></li>
          </ul>

          <ul class='nav navbar-nav navbar-right'>
            <li><a href='#' data-toggle='modal' data-target='#update_info'>Cập nhật thông tin</a></li>
            <li><a href='action_io.php?do=logout'>Đăng xuất</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <!-- Cap nhat thong tin -->
    <div class="modal fade" id="update_info">
      <div class="modal-dialog" role="document">
        <form class="form-horizontal" action="#" method="post">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <h4 class="modal-title">Cập nhật thông tin</h4>
            </div>
            <div class="modal-body">
              <span class="label label-default">ID</span>
              <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                <input type="text" class="form-control" name="uid" value="<?php echo $data['account']['id']; ?>" disabled>
              </div>
              <span class="label label-default">Username</span>
              <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                <input type="text" class="form-control" name="uid" value="<?php echo $data['account']['user']; ?>" placeholder="Tài khoản của bạn">
              </div>
              <span class="label label-default">Password</span>
              <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                <input type="password" class="form-control" name="pwd" value="<?php echo $data['account']['pwd']; ?>" placeholder="Mật khẩu của bạn">
              </div>
              <span class="label label-default">Email</span>
              <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                <input type="email" class="form-control" name="email" value="<?php echo $data['account']['email']; ?>" placeholder="Email của bạn">
              </div>
              <span class="label label-default">Name</span>
              <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                <div class="input-group-addon"><span class="glyphicon glyphicon-info-sign"></span></div>
                <input type="text" class="form-control" name="name" value="<?php echo $data['account']['name']; ?>"  placeholder="Tên của bạn">
              </div>
              <span class="label label-default">Google Analytics</span>
              <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                <div class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span></div>
                <input type="text" class="form-control" name="name" value="<?php echo $data['account']['analytics']; ?>"  placeholder="Mã Google Analytics của bạn">
              </div>
              <span class="label label-default">Description</span>
              <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                <div class="input-group-addon"><span class="glyphicon glyphicon-paperclip"></span></div>
                <input type="text" class="form-control" name="desc" value="<?php echo $data['account']['desc']; ?>" placeholder="Mô tả của bạn">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" name="updateInfo">Save changes</button>
            </div>
          </div><!-- /.modal-content -->
        </form><!-- /.form update -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Danh sach mon hoc -->
    <div class="modal fade" id="list_subject">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title">Danh sách môn học</h4>
          </div>
          <div class="modal-body">
            <table class="table table-hover">
              <thead>
                  <tr>
                      <th>Tên môn</th>
                      <!-- <th>Phòng</th>
                      <th>Thứ</th>
                      <th>Tiết bắt đầu</th>
                      <th>Số tiết</th>
                      <th>Nhóm</th> -->
                      <th>Mô tả</th>
                      <th>Cập nhật</th>
                  </tr>
              </thead>
              <tbody>
                <?php for ($i=0; $i < count($monhoc); $i++) {
                  echo '<tr>
                    <td>';
                      echo $monhoc[$i]['TEN_MON']; echo "
                    </td>
                    <td>";echo $monhoc[$i]['DESC'];
                    echo "</td><td>
                      <a href='#' type='button' class='btn btn-success btn-sm' data-toggle='modal' data-target='#update_subject'><span class='glyphicon glyphicon-pencil'></span></a>
                      <a href='#' type='button' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-remove'></span></a>
                    </td>
                  </tr>";
                }
                ?>
                </tbody>
              </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Cap nhat mon hoc -->
    <div class="modal fade" id="update_subject">
      <div class="modal-dialog" role="document">
        <form class="form-horizontal" action="#" method="post">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <h4 class="modal-title">Cập nhật môn học</h4>
            </div>
            <div class="modal-body">
              <span class="label label-default">Tên môn</span>
                <input type="text" class="form-control" name="uid" value="<?php echo $monhoc[1]['TEN_MON']; ?>" placeholder="Tên môn học">
              <span class="label label-default">Phòng</span>
                <input type="text" class="form-control" name="uid" value="<?php echo $monhoc[1]['PHONG']; ?>" placeholder="Phòng">
              <span class="label label-default">Thứ</span>
                <input type="text" class="form-control" name="pwd" value="<?php echo $monhoc[1]['THU']; ?>" placeholder="Thứ">
              <span class="label label-default">Tiết bắt đầu</span>
                <input type="email" class="form-control" name="email" value="<?php echo $monhoc[1]['TIET_BD']; ?>" placeholder="Tiết bắt đầu">
              <span class="label label-default">Số tiết</span>
                <input type="text" class="form-control" name="name" value="<?php echo $monhoc[1]['SO_TIET']; ?>"  placeholder="Số tiết">
              <span class="label label-default">Nhóm</span>
                <input type="text" class="form-control" name="name" value="<?php echo $monhoc[1]['NHOM']; ?>"  placeholder="Nhóm">
              <span class="label label-default">Mô tả</span>
                <input type="text" class="form-control" name="desc" value="<?php echo $monhoc[1]['DESC']; ?>" placeholder="Mô tả">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" name="updateSubject">Save changes</button>
            </div>
          </div><!-- /.modal-content -->
        </form><!-- /.form update -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Them mon hoc -->
    <div class="modal fade" id="add_subject">
      <div class="modal-dialog" role="document">
        <form class="form-horizontal" action="#" method="post">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <h4 class="modal-title">Cập nhật môn học</h4>
            </div>
            <div class="modal-body">
              <span class="label label-default">Tên môn</span>
                <input type="text" class="form-control" name="uid" placeholder="Tên môn học">
              <span class="label label-default">Phòng</span>
                <input type="text" class="form-control" name="uid" placeholder="Phòng">
              <span class="label label-default">Thứ</span>
                <input type="text" class="form-control" name="pwd" placeholder="Thứ">
              <span class="label label-default">Tiết bắt đầu</span>
                <input type="email" class="form-control" name="email" placeholder="Tiết bắt đầu">
              <span class="label label-default">Số tiết</span>
                <input type="text" class="form-control" name="name" placeholder="Số tiết">
              <span class="label label-default">Nhóm</span>
                <input type="text" class="form-control" name="name" placeholder="Nhóm">
              <span class="label label-default">Mô tả</span>
                <input type="text" class="form-control" name="desc" placeholder="Mô tả">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" name="updateSubject">Save changes</button>
            </div>
          </div><!-- /.modal-content -->
        </form><!-- /.form update -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
