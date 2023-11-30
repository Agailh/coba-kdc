<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <!-- Show All Data Button -->
            <a href="<?= base_url('/performance'); ?>" class="btn btn-secondary">Tampilkan Semua Data</a>

            <div class="table-responsive mt-3">
                <form action="/performance/update/<?= $kdcData[0]->kode_pic ?>" method="post" id="updateForm">
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
                            $currentPic = null; // current pic variable

                            foreach ($kdcData as $p) :
                                if ($currentPic !== $p->pic) :
                                    // Display pic name on top
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

                    <!-- Submit and Clear All Buttons -->
                    <div class="d-flex flex-row-reverse mt-3 ">
                        <button type="submit" class="btn btn-warning me-3">Submit</button>
                        <button type="button" class="btn btn-danger me-3" onclick="clearAllFields()">Clear All</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function clearAllFields() {
        // Get all input fields in the form
        var inputFields = document.querySelectorAll('#updateForm input[type="text"]');

        // Set the value of each input field to null
        inputFields.forEach(function(input) {
            input.value = null;
        });
    }
</script>

<?= $this->endSection('content'); ?>