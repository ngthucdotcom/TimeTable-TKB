    <div class="container container-fluid">
      <?php //if (!$user) echo '?>
        <center>
            <h2>Schedule</h2>
            <hr />
        </center>
        <?php

        $tkb = array(
            array(),
            array(),
            array(),
            array(),
            array(),
            array(),
            array(),
            array(),
            array()
        );

        foreach ($monhoc as $mon) {
            $THU = $mon["THU"];
            $TIET_DAU = $mon["TIET_BD"];
            $TIET_CUOI = $mon["TIET_BD"] + $mon["SO_TIET"] - 1;
            for ($i = $TIET_DAU; $i <= $TIET_CUOI; $i++) {
                $tkb[$THU-2][$i-1] = $mon["TEN_MON"];
            }
        }?>

        <table id="tkb" class="table table-bordered">
          <thead>
            <tr>
              <th>Mon</th>
              <th>Tue</th>
              <th>Wed</th>
              <th>Thu</th>
              <th>Fri</th>
              <th>Sat</th>
            </tr>
          </thead>
          <tbody>
        <?php for ($tiet = 0; $tiet < 10; $tiet++) {
          echo "
          <tr>";
            for ($thu = 0; $thu < 6; $thu++) {
                echo "
                <td data-toggle='modal' data-target='#mhModal'>";
                echo isset($tkb[$thu][$tiet]) ? $tkb[$thu][$tiet] : "_____";
                echo "</td>";
            }
            echo "
            </tr>
            ";
        }?>
        </tbody>
      </table>
    </div>

	<!--mhModal-->
    <div class="modal fade" id="mhModal" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Detail</h4>
                </div>
                <div id="kqTKB" class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--mhModal end-->
