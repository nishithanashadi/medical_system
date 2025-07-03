<!-- users/upload_prescription.php -->
<?php session_start(); ?>
<form action="../actions/upload_prescription_action.php" method="POST" enctype="multipart/form-data">
    <label>Note:</label>
    <textarea name="note" required></textarea><br>

    <label>Delivery Address:</label>
    <input type="text" name="delivery_address" required><br>

    <label>Delivery Time:</label>
    <select name="delivery_time" required>
        <option value="8am - 10am">8am - 10am</option>
        <option value="10am - 12pm">10am - 12pm</option>
        <option value="12pm - 2pm">12pm - 2pm</option>
        <option value="2pm - 4pm">2pm - 4pm</option>
    </select><br>

    <label>Upload up to 5 images:</label>
    <input type="file" name="images[]" multiple accept="image/*" required><br><br>

    <input type="submit" value="Upload Prescription">
</form>
