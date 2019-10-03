<h2>Add New company</h2>


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
        <label for="companyName">Company Name:</label>
        <input type="text" id="companyName" name="companyName">
    </div>
    <div>
        <label for="companyEmail">Company Email:</label>
        <input type="text" id="companyEmail" name="companyEmail">
    </div>
    <div>
        <label for="companyCity">Company City:</label>
        <input type="text" id="companyCity" name="companyCity">
    </div>
    <div>
        <input type="submit" value="send">
    </div>
</form>