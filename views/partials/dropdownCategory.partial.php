<?php 
// require "functions/getQuery.function.php";
function dropdown($dropdownTable){
    $query = "SELECT * FROM " . $dropdownTable;
    $result = getQuery($query);
    foreach ($result as $row) {
?>
<option value="<?= $row["id"]?>"><?= $row["name"];?></option>
<?php
}
return;
} 
?>


<?php 
function dropdownLink($dropdownTable){
    $query = "SELECT * FROM " . $dropdownTable;
    $result = getQuery($query);
    foreach ($result as $row) {
?>
<a class="dropdown-item" href="/dashboard/products?table=<?= $dropdownTable?>&id=<?= $row["id"];?>"><?= $row["name"];?></a>
<?php
    } 
    return;
    } 
?>

<?php 
function dropdownLinkShop($dropdownTable){
    $query = "SELECT * FROM " . $dropdownTable;
    $result = getQuery($query);
    foreach ($result as $row) {
?>
<a class="dropdown-item" href="/shop?table=<?= $dropdownTable?>&id=<?= $row["id"];?>"><?= $row["name"];?></a>
<?php
    } 
    return;
    } 
?>