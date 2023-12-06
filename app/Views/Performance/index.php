<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <!-- Search Bar -->
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Group unit" aria-label="Group unit" aria-describedby="button-addon2" name="keyword">
                    <button class="btn btn-success" type="submit" name="submit" id="button-addon2">Tampilkan</button>
                </div>
            </form>
            <!-- Show All Data Button -->
            <a href="<?= base_url('/performance'); ?>" class="btn btn-secondary my-3">Tampilkan Semua Data</a>

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
                            <th scope="col">WS (Weight*Score)</th>
                            <th scope="col" colspan="11">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php
                        $currentPic = null; // Variable to keep track of the current pic

                        foreach ($pic as $p) :
                            if ($currentPic !== $p->pic) :
                                // Display pic only once at the top
                        ?>
                                <tr>
                                    <th class="table-primary" scope="row" colspan="9"><?= $p->pic; ?></th>
                                    <td class="table-primary">
                                        <!-- detail Button -->
                                        <a href="/performance/<?= $p->kode_pic; ?>" class="btn btn-info ">Detail</a>
                                    </td>
                                </tr>
                            <?php
                                $currentPic = $p->pic; // Update the current pic
                            endif;
                            ?>
                            <tr class="text-center">
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection('page-content'); ?>