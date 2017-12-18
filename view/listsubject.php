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
      <?php for ($i=0; $i < count($dbtkb); $i++) {
        echo '<tr>
          <td>'.
            $dbtkb[$i]['TEN_MON']
        .'</td>
          <td>'.
            $dbtkb[$i]['DESC']
          .'</td><td>
            <button type="button" class="edit_subject btn btn-success btn-sm" data-id="'.$i.'" data-monhoc="'.$dbtkb[$i]['TEN_MON'].'"><span class="glyphicon glyphicon-pencil"></span></button>
            <a href="#" type="button" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></span></a>
          </td>
        </tr>';
      }
      ?>
      </tbody>
    </table>
</div>

 <!-- data-monhoc="'.$dbtkb[$i]['TEN_MON'].'" data-phong="'.$dbtkb[$i]['PHONG'].'" data-thu="'.$dbtkb[$i]['THU'].'" data-tietbd="'.$dbtkb[$i]['TIET_BD'].'" data-sotiet="'.$dbtkb[$i]['SO_TIET'].'" data-nhom="'.$dbtkb[$i]['NHOM'].'" data-mota="'.$dbtkb[$i]['DESC'].'"  data-toggle="modal" data-target="#update_subject"  -->

<script>
$('.edit_subject').on('click', function() {
   // alert($(this).data('id'));
   load_ajax($(this).data('id'),$(this).data('monhoc'));
   // $.post('action.php', { tenmon: MON_HOC, function(data) {
   //     $('.modal-body').html(data);
   //     $('your modal selector').modal();
   // });
});

function load_ajax(mamonhoc,monhoc){
    $.ajax({
        url : "controller/action_edit_subject.php",
        type : "post",
        dateType:"text",
        data : {
            mamon : mamonhoc,
            tenmon : monhoc
        },
    success : function (result){
			// alert(tenmon);
      // var tenmon = tenmon;
      var kq = $.parseJSON(result);
      var monhoc = kq.TEN_MON;
      var phong = kq.PHONG;
      var thu = kq.THU;
      var tietbd = kq.TIET_BD;
      var sotiet = kq.SO_TIET;
      var nhom = kq.NHOM;
      var mota = kq.DESC;
      $('.modal-body').html('<span class="label label-default">Tên môn</span><input type="text" class="form-control" name="MON_HOC" value="'+monhoc+'" placeholder="Tên môn học">'
      +'<span class="label label-default">Phòng</span><input type="text" class="form-control" name="PHONG" value="'+phong+'" placeholder="Phòng">'
      +'<span class="label label-default">Thứ</span><input type="text" class="form-control" name="THU" value="'+thu+'" placeholder="Thứ">'
      +'<span class="label label-default">Tiết bắt đầu</span><input type="text" class="form-control" name="TIET_BD" value="'+tietbd+'" placeholder="Tiết bắt đầu">'
      +'<span class="label label-default">Số tiết</span><input type="text" class="form-control" name="SO_TIET" value="'+sotiet+'"  placeholder="Số tiết">'
      +'<span class="label label-default">Nhóm</span><input type="text" class="form-control" name="NHOM"value="'+nhom+'"  placeholder="Nhóm">'
      +'<span class="label label-default">Mô tả</span><input type="text" class="form-control" name="DESC" value="'+mota+'" placeholder="Mô tả">');
      $('#update_subject').modal();

    	// $('#kqTKB').html("<b>Học phần: </b>" + TEN_MON + "<br><b>Phòng: </b>" + PHONG + "<br><b>Nhóm: </b>" + NHOM + "<br><b>Ghi chú: </b>" + DESC);
    }
  });
}
</script>
