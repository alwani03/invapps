
<head>
<style>
table, th, td {
  border: 1px solid white;
  border-collapse: collapse;
}
th, td {
  background-color: #87a5d4;
}
</style>
</head>
<link rel="stylesheet" href="{{$config.base_url}}{{$config.style_css}}grid.css" type="text/css" />
<table class="report" align="center">
    <tr>
        <td align="center" colspan="2"><b>Laporan Data Masuk</b></td>
    </tr>

    <tr>
        <td align="center" colspan="2">Invapps</td>
    </tr>
    <tr>
        <td align="center" colspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            <table class="rptContent" cellspacing="12">
			<thead>
                <tr align="center" class="rptHeader">
                    <td align="center" width="150px">Doc No.</td>
                    <td align="center" width="150px">Nama Barang</td>
                    <td align="center" width="100px">Quantity</td>
                    <td align="center" width="100px">Nama Petugas</td>
                    <td align="center" width="100px">Nama Supplier</td>
                    <td align="center" width="200px">Tanggal Data Masuk</td>
                </tr>
            </thead>
			<tbody>
				<?php foreach ($all_penerimaan as $penerimaan): ?>
                <tr>
                    <td align="center"><?= $penerimaan->no_terima ?></td>
                    <td align="center"><?= $penerimaan->nama_barang ?></td>
                    <td align="center"><?= $penerimaan->jumlah ?></td>
                    <td align="center"><?= $penerimaan->nama_petugas ?></td>
                    <td align="center"><?= $penerimaan->nama_supplier ?></td>
                    <td align="center"><?= $penerimaan->tgl_terima ?> Pukul <?= $penerimaan->jam_terima ?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
            </table>
        </td>
    </tr>

        <tr>
        <td colspan="2" align="center">
            <table style="width:600px;border: 0px solid">
                <td align="center">
                    <div>
                    <input type="button"  id="btnPrint" onclick="window.print();" value="Print" />&nbsp;
                    <input type="button" id="btnClose"  onClick="window.close();" value="Close" />&nbsp;
                    </div>
                </td>
            </table>
        </td>
    </tr>
</table>
<style type="text/css">
@media print {
input#btnPrint {
display: none;
}
input#btnClose {
display: none;
}
}

</style>


