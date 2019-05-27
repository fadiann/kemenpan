<table class="table_grid" cellspacing="0" cellpadding="0">
    <tr>
        <?php
        $jmlHeader = count($gridHeader);
        echo ("<th width='3%'>No.</th>");
        for ($j = 0; $j < $jmlHeader; $j++) {
            echo ("<th width='" . $gridWidth[$j] . "%'>" . $gridHeader[$j] . "</th>");
        }
        if ($widthAksi != "0") {
            echo ("<th width='" . $widthAksi . "%'>Aksi</th>");
        }
        ?>
    </tr>
    <?php
    if ($recordcount != 0) {
        $i = 0;
        while ($arr = $rs->FetchRow()) :
            //var_dump($arr);
            $i++;
    ?>
            <tr>
                <td><?= $i + $offset ?>.</td>

                <?php for ($j = 0; $j < count($gridDetail); $j++) : ?>

                    <?php if ($gridHeader[$j] == "Tahun") : ?>

                        <td align="center"><?= $arr[$gridDetail[$j]] ?></td>

                    <?php else : ?>

                        <td><?= $arr[$gridDetail[$j]] ?></td>

                    <?php endif ?>

                <?php endfor; ?>
                <td>
                    <?php if ($iconDetail) : ?>
                        <input type="image" src="Public/images/icn_alert_info.png" title="Rincian Data" Onclick="return set_action('<?= $action ?>', '<?= $arr[0] ?>')">
                    <?php endif ?>
                    <?php if ($iconEdit) : ?>
                        <input type="image" src="Public/images/icn_edit.png" title="Ubah Data" Onclick="return set_action('getedit', '<?= $arr['benturan_kepentingan_id'] ?>')">
                    <?php endif ?>
                    <?php if ($iconDel) : ?>
                        <input type="image" src="Public/images/icn_trash.png" title="Hapus Data" Onclick="return set_action('getdelete', '<?= $arr['benturan_kepentingan_id'] ?>', '<?= $arr['uraian'] ?>')">
                    <?php endif ?>
                </td>
            </tr>
        <?php endwhile; ?>
<?php } else { ?>
        <td colspan="<?= $jmlHeader + 2 ?>">Tidak Ada Data</td>
<? } ?>
</table>
<table width="100%">
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td align="center" class="td_paging">
            <?
            $showPage = "";
            $jumPage = ceil($recordcount / $num_row);
            if ($noPage > 1)
                echo "<a href='" . $paging_request . "&page=" . ($noPage - 1) . "'> <<d </a>";
            for ($page = 1; $page <= $jumPage; $page++) {
                if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) {
                    if (($showPage == 1) && ($page != 2))
                        echo "<span class='titik_titik'>...</span>";
                    if (($showPage != ($jumPage - 1)) && ($page == $jumPage))
                        echo "<span class='titik_titik'>...</span>";
                    if ($page == $noPage)
                        echo "<span class='paging_aktif'>" . $page . "</span> ";
                    else
                        echo " <a href='" . $paging_request . "&page=" . $page . "'>" . $page . "</a> ";
                    $showPage = $page;
                }
            }
            if ($noPage < $jumPage)
                echo "<a href='" . $paging_request . "&page=" . ($noPage + 1) . "'> > </a>";
            ?>
        </td>
    </tr>
</table>