<form method="post" name="f" action="#">
<?//=$risks->get_auditee_by_idEks($ses_id_eks); ?>
<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
					<h2 class="panel-title"><?=$page_title?></h2>
				</header>
				<div class="panel-body">
					<div class="form-inline text-right mt-sm">
                <?php if ($iconAdd == '1') : ?>
                    <?php if($ses_id_eks <> ''): ?>
					    <a class="btn btn-success" href="#" OnClick="return set_action('getadd');"><i class="fa fa-plus"> </i> Tambah</a>
                    <?php endif ?>
                <?php endif ?>
                <?php if ($view_report == '1') : ?>
					    <a class="btn btn-info" href="#" OnClick="return set_action('filter_report');"><i class="fa fa-info"> </i> Laporan</a>
                <?php endif ?>
                    <div class="form-inline text-right mt-sm">
                        <select name="key_search" class="form-control">
                            <?php
                            if(count($key_by)!=1)
                            ?>
                            <option value="">Semua Pilihan</option>
                            <?php
                            for($i=0;$i<count($key_by);$i++){
                            ?>
                                <option value="<?=$key_field[$i]?>" <? if(@$key_search==$key_field[$i]) echo "selected";?>><?=$key_by[$i]?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <input type="text" name="val_search" id="val_search" class="form-control" value=<?=@$val_search?>>
                        <button type="submit OnClick="return set_action('');" class="btn btn-primary">Cari</button>
                    </div>
                <input type="hidden" value="" name="data_action" id="data_action">
                <input type="hidden" value="" name="data_id" id="data_id">
            </div>
            <?
            include_once $grid;
            ?>
        </section>
    </div>
</div>
</form>
