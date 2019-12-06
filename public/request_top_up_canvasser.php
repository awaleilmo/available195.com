<?php 
session_start();
include ("assets/cantol.php");

$api_key = $_SESSION['api_key'];

$rpiv = $_SESSION["privileges"];
$dept = $_SESSION["dept"];
$kantor = $_SESSION["office"];
$id_cabang = $_SESSION["id_cabang"];

$out1 = 0;
if ($dept == "opr" || $dept == "tg" || $dept == "IT")
{
	$out1 = 1;
}
//echo "ade: (".$rpiv.") | (".$dept.")";

if ($out1 == 0)
{
	header("Location: login.php");
	exit();
}


if($_GET['st'] == 'trm')
{
	$phone = $_GET['di'];
	$postdata4 = http_build_query(
			array(
					'ph' => $phone
			)
	);

	$opts4 = array('http' =>
			array(
				'method'  => 'PUT',
				'header'  => 'Content-type: application/x-www-form-urlencoded',
				'content' => $postdata4
			)
	);

	$context4  = stream_context_create($opts4);
	$result4 = file_get_contents($krn.'mkios/approve/'.$phone.'/?key='.$api_key,false,$context4);
	
	echo "<script>window.location='index.php?no=40'</script>";
	
}

if($_GET['st'] == 'tlk')
{
	$phone = $_GET['di'];
	$postdata4 = http_build_query(
			array(
					'ph' => $phone
			)
	);

	$opts4 = array('http' =>
			array(
				'method'  => 'PUT',
				'header'  => 'Content-type: application/x-www-form-urlencoded',
				'content' => $postdata4
			)
	);

	$context4  = stream_context_create($opts4);
	$result4 = file_get_contents($krn.'mkios/reject/'.$phone.'/?key='.$api_key,false,$context4);
	
	echo "<script>window.location='index.php?no=15'</script>";
	
}

$not = 0;
//$username = $_SESSION["username"];
?>
<SCRIPT TYPE="text/javascript">
  function popup(mylink, windowname) { 
    if (! window.focus)return true;
    var href;
    if (typeof(mylink) == 'string') href=mylink;
    else href=mylink.href; 
    window.open(href, windowname, 'width=1200,height=800,scrollbars=yes'); 
    return false; 
  }
</SCRIPT>
<div class="content">
<div class="main-content">
<!-- WIDGET WIZARD -->
    <div class="widget">
    					<div class="widget-header">
							<h3>Kelola Order Top Up Canvasser</h3>
						</div>
						<div class="widget widget-table">
									<table id="datatable-column-filter8a" class="table table-sorting table-striped table-hover datatable">
                                        <thead>
                                            <tr>
                                                <th>ID User</th>
                                                <th>Tanggal Request</th>
                                                <th>Nama User</th>
                                                <th>Nama Cabang</th>
                                                <th>Kode Cabang</th>
												<th>Jumlah Transaksi</th>
												<th>Biaya Admin</th>
												<th>Status</th>
											 </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $str = file_get_contents($krn."/req/topup/canvasser/?key=$api_key");
								
										//echo $krn."trx/mkios/req/?key=$api_key&tdc=$id_cabang";
										$row = json_decode($str, true);
										$jum = $row['data'];
										$hit12 = count($jum);
										
										//echo "jum: ".$hit12."<br />";
										for ($x = 0; $x < $hit12; $x++) 
										{
											$id_trx 			= $row['data'][$x]['id_trx'];
											$ref_no 		= $row['data'][$x]['ref_no'];
											$tgl 			= $row['data'][$x]['tgl_request'];
											$nama_user 		= $row['data'][$x]['nama_user'];
											$nama_cabang 	= $row['data'][$x]['nama_cabang'];
											$kode_cabang 	= $row['data'][$x]['kode_cabang'];
											$jumlah 		= $row['data'][$x]['jumlah_transfer'];
											$biaya 			= $row['data'][$x]['biaya_admin'];
											$status 		= $row['data'][$x]['status'];
											$id_user 		= $row['data'][$x]['username'];

											/*$str3 = file_get_contents($krn."mkios/coll/?key=$api_key&noref=$reff");
											$row3 = json_decode($str3, true);
											$trx_type = $row3['data'][0]['trans_type'];
											*/
												
										?>
                                        	<tr>
                                            	<td>
													<?php if($assign == NULL){  ?>
											<A href="add_trx_top_up_canvasser.php?id=<?php echo $id_trx; ?>" onClick="return popup(this, 'notes')"><?php echo $id_user; ?></A><?php }else{ ?>
												<A href="add_trx_top_up_canvasser.php?id=<?php echo $id_trx; ?>" onClick="return popup(this, 'notes')"><?php echo $id_user; ?></A>
											<?php	//echo $cust_id;
											} ?>
												</td>
												<?php 
												//echo "<td>".$id_cust."</td>";
												echo "<td>".$tgl."</td>";
												echo "<td>".$nama_user."</td>";
												echo "<td>".$nama_cabang."</td>";
												echo "<td>".$kode_cabang."</td>";
												echo "<td>".number_format($jumlah,0,'.',',')."</td>";
												echo "<td>".number_format($biaya,0,'.',',')."</td>";
												if($status==1){
													echo "<td><span class='badge' style='background-color:blue'> On Proses </span></td>";
												}elseif ($status==3) {
													echo "<td><span class='badge green-bg'> Reject </span></td>";
												}elseif ($status==4) {
													echo "<td><span class='badge green-bg'> Expired </span></td>";
												}elseif ($status==5) {
													echo "<td><span class='badge red-bg'> Cancel </span></td>";
												}elseif ($status==6) {
													echo "<td><span class='badge red-bg'> Success  </span></td>";
												}elseif ($status==2) {
													echo "<td><span class='badge green-bg'> Approve </span></td>";
												}
												?>
                                            </tr>
                                            <?php 
											}
											 ?>
                                        </tbody>
                                	</table>
                                   </div>  
                </div>
            <!-- /main -->
            </div>
       </div>     