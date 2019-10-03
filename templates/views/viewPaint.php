<h2>View Paints</h2>

<table>
    <tr>

        <th><strong>Paint ID</strong></th>
        <th><strong>Company ID</strong></th>
        <th><strong>Company Name</strong></th>
        <th><strong>Paint Name</strong></th>
        <th><strong>Paint Size (litres)</strong></th>
        <th><strong>Paint Price</strong></th>
        <th><strong>Date Of Releae</strong></th>

    </tr>



    <ul>
        <?php
        foreach ($locals['viewAllPaint'] as $paint) {

            $date = new DateTime($paint['dateOfRelease']);
            ?>
            <tr>
                <td><?= $paint['paintID'] ?></td>
                <td><?= $paint['companyID'] ?></td>
                <td><?= $paint['companyName'] ?></td>
                <td><?= $paint['paintName'] ?></td>
                <td><?= $paint['paintLitres'] ?></td>
                <td><?= $paint['paintPrice'] ?></td>
                <td><?= $date->format('d-m-Y') ?></td>

                <td>
                    <a class='btn' href='deletePaint?paintID=<?= $paint['paintID'] ?>'> Delete Paint </a> 
                </td>
                <td>
                    <a class='btn' href='editPaint?paintID=<?= $paint['paintID'] ?>'> Edit Paint </a> 
                </td>

            </tr>
        </ul>

    <?php }
    ?>

</table>
