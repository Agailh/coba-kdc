<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <!-- Show All Data Button -->
            <a href="<?= base_url('/performance'); ?>" class="btn btn-secondary">Tampilkan Semua Data</a>

            <div class="table-responsive mt-3">
                <form action="/performance/update/<?= $kdcData[0]->kode_pic ?>" method="post">
                    <?= csrf_field(); ?>
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-center table-info">
                                <th scope="col">KPI</th>
                                <th scope="col">Weight</th>
                                <th scope="col">UoM</th>
                                <th scope="col">Target</th>
                                <th scope="col">Freq.</th>
                                <th scope="col">Criteria</th>
                                <th scope="col">Ach</th>
                                <th scope="col">Score</th>
                                <th scope="col" colspan="11">WS (Weight*Score)</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php
                            $currentPic = null; // Variable to keep track of the current pic

                            foreach ($kdcData as $p) :
                                if ($currentPic !== $p->pic) :
                                    // Display pic only once at the top
                            ?>
                                    <tr>
                                        <th class="table-primary" scope="row" colspan="12"><?= $p->pic; ?></th>
                                    </tr>
                                <?php
                                    $currentPic = $p->pic; // Update the current pic
                                endif;
                                ?>
                                <!-- Input fields for each row of data -->
                                <tr>
                                    <th scope="row" style="font-weight: 500;"><?= $p->deskripsi_kpi; ?></th>
                                    <td><input type="text" class="form-control" name="weight[<?= $p->no_kpi; ?>]" value="<?= $p->weight; ?>"></td>
                                    <td><input type="text" class="form-control" name="uom[<?= $p->no_kpi; ?>]" value="<?= $p->uom; ?>"></td>
                                    <td><input type="text" class="form-control" name="target[<?= $p->no_kpi; ?>]" value="<?= $p->target; ?>"></td>
                                    <td><input type="text" class="form-control" name="freq[<?= $p->no_kpi; ?>]" value="<?= $p->freq; ?>"></td>
                                    <td><input type="text" class="form-control" name="criteria[<?= $p->no_kpi; ?>]" value="<?= $p->criteria; ?>"></td>
                                    <td><input type="text" class="form-control" name="ach[<?= $p->no_kpi; ?>]" value="<?= $p->ach; ?>"></td>
                                    <td><input type="text" class="form-control" name="score[<?= $p->no_kpi; ?>]" value="<?= $p->score; ?>"></td>
                                    <td><input type="text" class="form-control" name="ws[<?= $p->no_kpi; ?>]" value="<?= $p->ws; ?>"></td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <!-- Submit Button -->
                    <div class="text-end">
                        <button type="submit" class="btn btn-warning">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>