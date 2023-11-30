<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">

            <a href="<?= base_url('/performance'); ?>" class="btn btn-secondary mb-3">Tampilkan Semua Data</a>

            <div class="table-responsive">
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
                        $currentPic = null; // current pic variable 

                        foreach ($kdcData as $p) :
                            if ($currentPic !== $p->pic) :
                                // display pic name on the top
                        ?>
                                <tr>
                                    <th class="table-primary" scope="row" colspan="12"><?= $p->pic; ?></th>
                                </tr>
                            <?php
                                $currentPic = $p->pic; // Update the current pic
                            endif;
                            ?>
                            <tr>
                                <th scope="row" style="font-weight: 500;"><?= $p->deskripsi_kpi; ?></th>
                                <td><?= $p->weight; ?></td>
                                <td><?= $p->uom; ?></td>
                                <td><?= $p->target; ?></td>
                                <td><?= $p->freq; ?></td>
                                <td><?= $p->criteria; ?></td>
                                <td><?= $p->ach; ?></td>
                                <td><?= $p->score; ?></td>
                                <td><?= $p->ws; ?></td>
                                <td><?= $p->deskripsi; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <!-- edit button -->
                        <tr>
                            <td colspan="12" class="text-end">
                                <a href="/performance/edit/<?= $p->kode_pic; ?>" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>