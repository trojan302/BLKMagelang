<div class="row">
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<a href="<?= $url ?>admin/"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
<hr>

	<div class="row">

        <?php
        foreach ($datas as $data) {
        ?>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title"><?= $data['KejuruanNama'] ?> 
                    <?php if ($data['Status'] === 'Buka') { ?>

                      <span class="label label-success pull-right"><?= $data['Status']; ?></span>

                    <?php } else { ?>

                      <span class="label label-danger pull-right"><?= $data['Status']; ?></span>
                      
                    <?php } ?>
                    </h3>
                  </div>
                  <div class="panel-body">
                    <table class="table">
                      <tr>
                        <th>Kuota Maksimal</th>
                        <td>: 
                        <?php if ($data['Status'] === 'Buka') { ?>
                          <?= ($data['MaxKuota'] + $data['GelombangKuota']) ?>
                        <?php } else { ?>
                        0
                        <?php } ?>
                        </td>
                      </tr>
                      <tr>
                        <th>Perserta Mendaftar</th>
                        <td>: 
                        <?php if ($data['Status'] === 'Buka') { ?>
                          <?= mendaftar($data['KejuruanID']) ?>
                        <?php } else { ?>
                        0
                        <?php } ?>
                        </td>
                      </tr>
                      <tr>
                        <th>Perserta Belum Terdaftar</th>
                        <td>: 
                        <?php if ($data['Status'] === 'Buka') { ?>
                          <?= belumTerdaftar($data['KejuruanID'], 0) ?>
                        <?php } else { ?>
                        0
                        <?php } ?>
                          </td>
                      </tr>
                      <tr>
                        <th>Perserta Terdaftar</th>
                        <td>: 
                        <?php if ($data['Status'] === 'Buka') { ?>
                          <?= terdaftar($data['KejuruanID'], 1) ?>
                        <?php } else { ?>
                        0
                        <?php } ?>
                        </td>
                      </tr>
                      <tr>
                        <th>Options</th>
                        <td>:
                    	<a href="?edit=<?= $data['GelombangID'] ?>" class="btn btn-xs btn-success">Edit</a>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <div class="panel-footer">
                      <span> 
                        <?php 
                          $sisaKuota = ($data['MaxKuota'] - terdaftar($data['KejuruanID'], 1) );
                          if ($sisaKuota === 0) { 
                        ?>

                          Sisa Kuota Peserta : <span class="label label-danger disabled pull-right">null</span>&nbsp;

                        <?php }else if ($data['Status'] === 'Buka') { ?>

                          Sisa Kuota Peserta : <span class="label label-danger"> <?= $sisaKuota ?> </span>&nbsp;
                          <a class="btn btn-primary btn-xs pull-right" role="button" data-toggle="collapse" href="#syarat<?= $data['GelombangID'] ?>" aria-expanded="false" aria-controls="collapse">
                          Lihat Syarat
                          </a>
                        
                          <div class="collapse" id="syarat<?= $data['GelombangID'] ?>" style="margin-top: 10px;">
                            <div class="well">
                              <?= $data['GelombangSyarat'] ?>
                            </div>
                          </div>

                        <?php } else { ?>

                          Sisa Kuota Peserta : <span class="label label-danger"> null </span>&nbsp;
                          <a class="btn btn-primary btn-xs pull-right disabled" role="button" data-toggle="collapse" href="#syarat" aria-expanded="false" aria-controls="collapse">
                          Lihat Syarat
                          </a>

                        <?php } ?>
                      <div class="clearfix"></div>
                      </span>
                  </div>
                </div>
            </div>

        <?php } ?>
            
        </div>

</div>
</div>