<?php
	include 'config.php';
?>

<h3>Your Article!</h3>

<table border="0">
	<tr>
		<th>No</th>
		<th>Title</th>
        <th>Text</th>
	</tr>
	<?php 
	if(isset($_GET['id'])){
		$id = $_GET['id'];
        $data = mysqli_query($conn, "select * from article where id = " . $id) or die(mysqli_error($conn));
	} else{
		$data = mysqli_query($conn, "select * from article") or die(mysqli_error($conn));
	}
	$no = 1;
	while($d = mysqli_fetch_assoc($data)){
		$id = $d['id'];
	?>
	<tr>
		<td><?php echo $id; ?></td> 
		<td><a href="admin.php?id=<?php echo $id;?>"><?php echo $d['title']; ?></a></td>
        <td><?php echo $d['text']; ?></td>
	</tr>
	<?php } ?>
</table>
