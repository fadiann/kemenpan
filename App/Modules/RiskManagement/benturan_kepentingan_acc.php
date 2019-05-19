<script src="Public/js/jquery.validate.min.js" type="text/javascript"></script>
<section id="main" class="column">
    <article class="module width_3_quarter">
        <header>
            <h3 class="tabs_involved"><?= $page_title ?></h3>
        </header>
        <form method="post" name="f" action="#" class="form-horizontal" id="validation-form">
            <?
            switch ($_action) {
                case "getadd":
                    ?>
                <fieldset class="hr">
                    <label class="span2">Tahun</label> <?= $Helper->tahunCombo('tahun', 'tahun') ?>
                </fieldset>
                <fieldset class="hr">
                    <label class="span2">Uraian</label> <textarea name="uraian" id="uraian" class="span5" rows="10"></textarea>
                </fieldset>
                <fieldset class="hr">
                    <label class="span2">Pelaku Yang Terkait</label> <input type="text" class="span2" name="pelaku" id="pelaku">
                </fieldset>
                <fieldset class="hr">
                    <label class="span2">Rencana Aksi</label> <textarea name="rencana" id="rencana" class="span5" rows="10"></textarea>
                </fieldset>
                <?
                break;
            case "getedit":
                ?>
                <fieldset class="hr">
                    <label class="span2">Tahun</label> <?= $Helper->tahunCombo('tahun', 'tahun', $row['tahun']) ?>
                </fieldset>
                <fieldset class="hr">
                    <label class="span2">Uraian</label> <textarea name="uraian" id="uraian" class="span5" rows="10"><?=$row['uraian']?></textarea>
                </fieldset>
                <fieldset class="hr">
                    <label class="span2">Pelaku Yang Terkait</label> <input type="text" class="span2" name="pelaku" id="pelaku" value="<?=$row['pelaku']?>">
                </fieldset>
                <fieldset class="hr">
                    <label class="span2">Rencana Aksi</label> <textarea name="rencana" id="rencana" class="span5" rows="10"><?=$row['rencana_aksi']?></textarea>
                </fieldset>
                <input type="hidden" value="<?=$row['benturan_kepentingan_id']?>" name="data_id">
                <?
                break;
        }
        ?>
            <fieldset>
                <center>
                    <input type="button" class="blue_btn" value="Kembali" onclick="location='<?= $def_page_request ?>'"> &nbsp;&nbsp;&nbsp; <input type="submit" class="blue_btn" value="Simpan">
                </center>
                <input type="hidden" name="data_action" id="data_action" value="<?= $_nextaction ?>">
            </fieldset>
        </form>
    </article>
</section>
<script>
    $(function() {
        $("#validation-form").validate({
            rules: {
                tahun: "required",
                uraian: "required",
                pelaku: "required",
                rencana: "required"
            },
            messages: {
                tahun: "Silahkan Pilih Tahun",
                uraian: "Uraian Tidak Boleh Kosong",
                pelaku: "Pelaku Tidak Boleh Kosong",
                rencana: "Rencana Tidak Boleh Kosong"
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>