<?php 	
	require_once('mpdf/mpdf.php');
	$mpdf= new mPDF('c', 'A4');
	$mpdf->writeHTML('<<table>
		<caption>table title and/or explanatory text</caption>
		<thead>
			<tr>
				<th>header</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>data</td>
			</tr>
		</tbody>
	</table>');
	$mpdf->Output('reporte.pdf', 'I');
 ?>