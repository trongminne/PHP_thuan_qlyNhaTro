<meta charset="UTF-8">

<?php include "../include/connect.php" ?>

<?php
if (isset($_POST['xuat_nhatro'])) {
    $data_nhatro = mysqli_query(
        $conn,
        'SELECT id_nhatro , tenkhuvuc, name, tenchu, sdt, image FROM khuvuc INNER JOIN nhatro ON khuvuc.id_khuvuc = nhatro.id_khuvuc;'
    );



    $html = '<table border="1">
                <tr>
                   <th style="background: #FFFF00">STT</th>
                   <th style="background: #FFFF00">Khu vực</th>
                   <th style="background: #FFFF00">Tên chủ</th>
                   <th style="background: #FFFF00">Số điện thoại</th>
                 
                </tr>';
    $stt = 1;
    while ($data = mysqli_fetch_assoc($data_nhatro)) {

        $html .= '<tr>
                <td>' . $stt . '</td>
                <td>' . $data['tenkhuvuc'] . '</td>
                <td>' . $data['tenchu'] . '</td>
                <td>' . $data['sdt'] . '</td>
              
                </tr> ';
        $stt++;
    }
    $html .= '</table>';
    header('Content-Type:application/xls');
    header('Content-Disposition:attatchment;filename=nhatro.xls');
    echo $html;
}
?>

<!-- Xuất công nợ lại -->
<?php
if (isset($_POST['xuat_nap'])) {
    $data_nap = mysqli_query($conn, 'SELECT email, sotien, trangthai FROM taikhoan INNER JOIN lichsu_nap ON taikhoan.id = lichsu_nap.id_taikhoan');
    $html = '<table border="1">
                <tr>
                   <th style="background: #FFFF00">STT</th>
                   <th style="background: #FFFF00">Email</th>
                   <th style="background: #FFFF00">Số tiền</th>
                   <th style="background: #FFFF00">Trạng thái</th>
                  
  
                </tr>';
    $stt = 1;
    while ($data = mysqli_fetch_assoc($data_nap)) {

        if ($data['trangthai'] == 0) {
            $html .= '<tr style="with:200px">
                <td>' . $stt . '</td>
                <td>' . $data['email'] . '</td>
                <td>' . $data['sotien'] . '</td>
                <td> Thành công </td>
            </tr> ';
            $stt++;
        } else {
            $html .= '<tr style="with:200px">
            <td>' . $stt . '</td>
            <td>' . $data['email'] . '</td>
            <td>' . $data['sotien'] . '</td>
            <td> Thất bại </td>
            </tr> ';
            $stt++;
        }
    }




    $html .= '</table>';


    header('Content-Type: application/vnd.ms-excel; charset=utf-8');
    header('Content-Disposition: attachment; filename=nap.xls');

    echo $html;
}
