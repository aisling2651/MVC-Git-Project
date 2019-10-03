<h2>Edit Company</h2>

<?php $company = $locals['company'];
?>

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

    <input type="hidden" name="action" value="editcompany">
    <div>
        <input type="hidden" name="companyID" value="<?php echo $company['companyID']; ?>">
    </div>
    <div>
        <label for="companyName">Company Name:</label>
        <input type="text" id="companyName" name="companyName" value="<?php echo $company['companyName']; ?>">
    </div>
    <div>
        <label for="companyEmail">Company Email:</label>
        <input type="text" id="companyEmail" name="companyEmail" value="<?php echo $company['companyEmail']; ?>">
    </div>
    <div>
        <label for="companyCity">Company City:</label>
        <input type="text" id="companyCity" name="companyCity" value="<?php echo $company['companyCity']; ?>">
    </div>
    <div>
        <input type="submit" value="Save Changes">
    </div>
</form>