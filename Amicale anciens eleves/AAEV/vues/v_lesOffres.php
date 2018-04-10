

<div id="produits">
<?php
	
foreach( $lesOffres as $uneOffre) 
{
	$id = $uneOffre['id'];
	$libelle = $uneOffre['libelle'];
	$typeProposition=$uneOffre['typeProposition'];
	?>
	<table>
	<tr>
			<td><?php echo $id ?></td>
			<td><?php echo $libelle ?></td>
			<td><?php echo " : ".$typeProposition; ?></td>
			
			
	</tr>
	<table>		
			
			
<?php			
}
?>
</div>
