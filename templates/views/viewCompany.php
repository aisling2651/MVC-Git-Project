<h2>View Companies</h2>


<table>
    <tr>

        <th><strong>Comapny ID</strong></th>
        <th><strong>Company Name</strong></th>
        <th><strong>Company Email</strong></th>
        <th><strong>Company City</strong></th>

    </tr>



    <ul>
        <?php
        foreach ($locals['viewAllCompany'] as $company) {
            ?>
            <tr>
                <td><?= $company['companyID'] ?></td>
                <td><?= $company['companyName'] ?></td>
                <td><?= $company['companyEmail'] ?></td>
                <td><?= $company['companyCity'] ?></td>

                <td>
                    <a class='btn' href='deleteCompany?companyID=<?= $company['companyID'] ?>'> Delete Company </a> 
                </td>
                <td>
                    <a class='btn' href='editCompany?companyID=<?= $company['companyID'] ?>'> Edit Company </a> 
                </td>
            </tr>


        </ul>

    <?php }
    ?>

</table>
