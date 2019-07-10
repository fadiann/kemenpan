<?

include_once "App/Classes/author_class.php";

$authors = new Author($ses_userId);



$fdata_id = $Helper->replacetext($_GET ['author']);

$rs = $authors->author_data_viewlist($fdata_id);

$arr = $rs->FetchRow();

?>

<meta name="viewport" content="width=device-width, initial-scale=1" />

<link href="Public/css/responsive-tabs.css" rel="stylesheet" type="text/css" />

<script src="Public/js/responsive-tabs.js" type="text/javascript"></script>

<section id="main" class="column">

	<article class="module width_3_quarter">

		<div id="demopage">

			<div class="container1">

				<ul class="rtabs">

					<li><a href="#view1">Rincian Data Author</a></li>

                </ul>

				<div class="panel-container">

					<div id="view1">

						<fieldset class="form-group">

							<label class="span3">Kode Author</label> <label class="col-sm-3 control-label">: <?=$arr['kode_author']?></label>

						</fieldset>

						<fieldset class="form-group">

							<label class="span3">Nama author</label> <label class="span5">: <?=$arr['nama_author']?></label>

						</fieldset>

					</div>

				</div>

			</div>

		</div>

	</article>

</section>