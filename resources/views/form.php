<form action="" method='post'>
<?= csrf_field() ?>
    <input type="text" name="name" value='Name'>
    <textarea name="description" id="" cols="30" rows="30">About You</textarea>
    <input type="submit" value="submit">
    
</form>