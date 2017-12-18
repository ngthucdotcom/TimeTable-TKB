
      <!-- Thong tin nguoi dung -->
      <div class="modal fade" id="info">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <h4 class="modal-title"><?php echo $dbuser['name']; ?></h4>
            </div>
            <div class="modal-body">
              <!-- Mo ta boi nguoi dung -->
              <?php echo $dbuser['slogan']; ?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button><?php if (!$user) echo "
              <a href='#' type='button' class='btn btn-primary' data-toggle='modal' data-target='#login'>Đăng nhập</a>"; ?>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

      <!-- Mau dang nhap -->
      <div class="modal fade" id="login">
        <div class="modal-dialog" role="document">
          <form class="form-horizontal" action="<?php echo $_DOMAINS; ?>" method="post">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title">Login</h4>
              </div>
              <div class="modal-body">
                <span class="label label-default">ID</span>
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                  <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                  <input type="text" class="form-control" name="uid" placeholder="ID/Username/Email">
                </div>
                <span class="label label-default">Password</span>
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                  <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                  <input type="password" class="form-control" name="pwd" placeholder="Password">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="adminLogin">Login</button>
              </div>
            </div><!-- /.modal-content -->
          </form><!-- /.form login -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

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
                  <input type="hidden" name="id" value="<?php echo $dbuser['id']; ?>">
                  <input type="text" class="form-control" value="<?php echo $dbuser['id']; ?>" disabled>
                </div>
                <span class="label label-default">Username</span>
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                  <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                  <input type="text" class="form-control" name="user" value="<?php echo $dbuser['user']; ?>" placeholder="Tài khoản của bạn">
                </div>
                <span class="label label-default">Password</span>
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                  <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                  <input type="password" class="form-control" name="pwd" value="<?php echo $dbuser['pwd']; ?>" placeholder="Mật khẩu của bạn">
                </div>
                <span class="label label-default">Email</span>
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                  <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                  <input type="text" class="form-control" name="email" value="<?php echo $dbuser['email']; ?>" placeholder="Email của bạn">
                </div>
                <span class="label label-default">Name</span>
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                  <div class="input-group-addon"><span class="glyphicon glyphicon-info-sign"></span></div>
                  <input type="text" class="form-control" name="name" value="<?php echo $dbuser['name']; ?>"  placeholder="Tên của bạn">
                </div>
                <span class="label label-default">Google Analytics</span>
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                  <div class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span></div>
                  <input type="text" class="form-control" name="analytics" value="<?php // echo $dbuser['analytics']; ?>"  placeholder="Mã Google Analytics của bạn">
                </div>
                <span class="label label-default">Slogan</span>
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                  <div class="input-group-addon"><span class="glyphicon glyphicon-paperclip"></span></div>
                  <input type="text" class="form-control" name="slogan" value="<?php echo $dbuser['slogan']; ?>" placeholder="Mô tả của bạn">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="updateInfo">Save changes</button>
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
                  <input type="text" class="form-control" name="MON_HOC" placeholder="Tên môn học">
                <span class="label label-default">Phòng</span>
                  <input type="text" class="form-control" name="PHONG" placeholder="Phòng">
                <span class="label label-default">Thứ</span>
                  <input type="text" class="form-control" name="THU" placeholder="Thứ">
                <span class="label label-default">Tiết bắt đầu</span>
                  <input type="text" class="form-control" name="TIET_BD" placeholder="Tiết bắt đầu">
                <span class="label label-default">Số tiết</span>
                  <input type="text" class="form-control" name="SO_TIET" placeholder="Số tiết">
                <span class="label label-default">Nhóm</span>
                  <input type="text" class="form-control" name="NHOM" placeholder="Nhóm">
                <span class="label label-default">Mô tả</span>
                  <input type="text" class="form-control" name="DESC" placeholder="Mô tả">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="addSubject">Save changes</button>
              </div>
            </div><!-- /.modal-content -->
          </form><!-- /.form update -->
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
                  <input type="text" class="form-control" name="MON_HOC" id="toMonhoc" value="" placeholder="Tên môn học">
                <span class="label label-default">Phòng</span>
                  <input type="text" class="form-control" name="PHONG" id="toPhong" value="" placeholder="Phòng">
                <span class="label label-default">Thứ</span>
                  <input type="text" class="form-control" name="THU" id="toThu" value="" placeholder="Thứ">
                <span class="label label-default">Tiết bắt đầu</span>
                  <input type="text" class="form-control" name="TIET_BD" id="toTietbd" value="" placeholder="Tiết bắt đầu">
                <span class="label label-default">Số tiết</span>
                  <input type="text" class="form-control" name="SO_TIET" id="toSotiet" value=""  placeholder="Số tiết">
                <span class="label label-default">Nhóm</span>
                  <input type="text" class="form-control" name="NHOM" id="toNhom" value=""  placeholder="Nhóm">
                <span class="label label-default">Mô tả</span>
                  <input type="text" class="form-control" name="DESC" id="toMota" value="" placeholder="Mô tả">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="updateSubject">Save changes</button>
              </div>
            </div><!-- /.modal-content -->
          </form><!-- /.form update -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
