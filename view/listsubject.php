<div class="container">
  <table class="table table-hover">
    <thead>
        <tr>
            <th>Tên môn</th>
            <th>Mô tả</th>
            <th>Cập nhật</th>
        </tr>
    </thead>
    <tbody>
      <?php for ($i=0; $i < count($monhoc); $i++) {
        echo '<tr>
          <td>'.
            $monhoc[$i]['TEN_MON']
        .'</td>
          <td>'.
            $monhoc[$i]['DESC']
          .'</td><td>
            <button type="button" class="btn btn-success btn-sm" data-monhoc="'.$monhoc[$i]['TEN_MON'].'" data-phong="'.$monhoc[$i]['PHONG'].'" data-thu="'.$monhoc[$i]['THU'].'" data-tietbd="'.$monhoc[$i]['TIET_BD'].'" data-sotiet="'.$monhoc[$i]['SO_TIET'].'" data-nhom="'.$monhoc[$i]['NHOM'].'" data-mota="'.$monhoc[$i]['DESC'].'"  data-toggle="modal" data-target="#update_subject" ><span class="glyphicon glyphicon-pencil"></span></button>
            <a href="#" type="button" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></span></a>
          </td>
        </tr>';
      }
      ?>
      </tbody>
    </table>

    <script language="JavaScript">
    //editDevice
    $('#update_subject').on('show.bs.modal', function(e) {
      var monhoc = $(e.relatedTarget).data('monhoc');
      $("#toMonhoc").val(monhoc);
      var phong = $(e.relatedTarget).data('phong');
      $("#toPhong").val(phong);
      var thu = $(e.relatedTarget).data('thu');
      $("#toThu").val(thu);
      var tietbd = $(e.relatedTarget).data('tietbd');
      $("#toTietbd").val(tietbd);
      var sotiet = $(e.relatedTarget).data('sotiet');
      $("#toSotiet").val(sotiet);
      var nhom = $(e.relatedTarget).data('nhom');
      $("#toNhom").val(nhom);
      var mota = $(e.relatedTarget).data('mota');
      $("#toMota").val(mota);
    });</script>

</div>
