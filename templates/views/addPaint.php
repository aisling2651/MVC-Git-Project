<h2>Add New Paint</h2>

<?php $companies = $locals['viewAllCompany']?>



<form action=" " method="post">
<?php
$form_error_messages = $locals['form_error_messages'];
    if (count($form_error_messages) > 0) {
        foreach ($form_error_messages as $error_message) {
            ?>
            <p class='error'><?= $error_message ?></p>
            <?php
        }
    }
    ?>
    <div>
        <label for="companyID">Company Name:</label>
        <select name="companyID" id="companyID">
            <?php foreach($companies as $company) {?>                                                                                                           
                <option value="<?= $company['companyID']?>"><?= $company['companyName']?></option>
            <?php } ?>
        </select>
    </div>
    <div>
        <label for="paintName">Paint Name:</label>
        <input type="text" id="paintName" name="paintName">
    </div>
    <div>
        <label for="paintLitres">Paint Litres:</label>
        <input type="text" id="paintLitres" name="paintLitres">
    </div>
    <div>
        <label for="paintPrice">Paint Price:</label>
        <input type="text" id="paintPrice" name="paintPrice">
    </div>
    <div>
        <label for="dateOfRelease">Date Of Release:</label>
        <input type="date" id="dateOfRelease" name="dateOfRelease">
    </div>
    <div>
        <input type="submit" value="send">
    </div>
</form>