    <footer>
      <center>
        @2017 - <a href="#" data-toggle='modal' data-target='#info'><?php echo $data['account']['name']; ?></a><?php if ($user) echo ' - <a href="action_io.php?do=logout">Đăng xuất</a>'; ?>
      </center>

      <div class="modal fade" id="info">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <h4 class="modal-title"><?php echo $data['account']['name']; ?></h4>
            </div>
            <div class="modal-body">
              <!-- Mo ta boi nguoi dung -->
              <?php echo $data['account']['desc']; ?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button><?php if (!$user) echo "
              <a href='#' type='button' class='btn btn-primary' data-toggle='modal' data-target='#login'>Đăng nhập</a>"; ?>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

      <div class="modal fade" id="login">
        <div class="modal-dialog" role="document">
          <form class="form-horizontal" action="action_io.php?do=login" method="post">
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
                  <input type="text" class="form-control" name="uid" placeholder="ID/Username">
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

    </footer>
  </body>
</html>
