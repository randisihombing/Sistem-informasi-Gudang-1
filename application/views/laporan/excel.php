<?php
header("Content-type:application/octet-stream/");
header("Content-Disposition:attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<!-- <table>
    <thead>
        <tr>
            <th>Kode Barang </th>
            <th>Jenis Barang </th>
            <th>Nama Barang </th>
            <th>Harga Barang </th>
            <th>Stock Barang </th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;
        foreach ($data as $brg) : ?>
            <tr>
                <td><?php echo $brg['kode_barang'] ?></td>
                <td><?php echo $brg->jenis_barang ?></td>
                <td><?php echo $brg->nama ?></td>
                <td>Rp. <?php echo number_format($brg->harga) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table> -->

<table style="width: 100%">
    <?php
    if (isset($_GET['stock_barang'])) {
        $stock_barang = $_GET['stock_barang'];
    ?>
        <thead>
            <tr>
                <th>Kode Barang</th>
                <th>Jenis Barang</th>
                <th>Nama Barang</th>
                <th>Harga Satuan Barang</th>
                <th>Stock Barang</th>
            </tr>
        </thead>

        <tbody>
            <?php
            if ($stock_barang == "semua") {
                $query = $this->db->query("SELECT * FROM barang")->result();
            } else {
                $query = $this->db->query("SELECT * FROM barang WHERE barang_id = '$stock_barang'")->result();
            }
            foreach ($query as $key => $data) {
            ?>
                <tr>
                    <td align="center"><?php echo $data->kode_barang ?></td>
                    <td align="center"><?php echo $data->jenis_barang ?></td>
                    <td align="center"><?php echo $data->nama ?></td>
                    <td align="center">Rp. <?php echo number_format($data->harga) ?></td>
                    <td align="center"><?php echo $data->stock ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    <?php
    }
    ?>
</table>