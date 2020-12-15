<section id="intro">
    <div class="jumbotron masthead">
      <div class="container">
	  <div class=box style="box-shadow: 10px 10px 10px 10px; padding:20px">
		<h2 align="center" style="background:#17823b;color:white;padding:5px;font-family: 'Open Sans Condensed', sans-serif;">Account Balance</h2>
		<h3 align="center">Riwayat Pembayaran</h3>
		<table border="1" style="text-align: center;box-shadow: 0px 7px 10px 3px;background: #ffffff;width:100%" align="center">
          <tr style="padding:1px;background-color: #039dfc;color:white">
            <th width="5%">No Unik</th>
            <th width="20%">Judul Task</th>
            <th width="20%">Kurs</th>
            <th width="20%">FileName</th>
			<th width="5%">Jumlah Pembayaran</th>
			<th width="20%">Biaya</th>
          </tr>
          <?php $i=0; foreach ($balance as $item){
            $i++?>
          <tr>
            <td><?php echo $item['id_assignment'];?></td>
            <td><?php echo $item['judul'];?></td>
            <td><?php echo $item['kurs'];?></td>
            <td><a style="color:black" href="<?php echo base_url().'index.php/applicationctl/downloadbukti/'.$item['id_assignment'];?>" target="_blank"><?php echo $item['bukti_loc'];?></a></td>
			<td><?php echo $item['amount'];?></td>
			<td><?php echo $item['biaya']*$item['halaman'];?></td>
          </tr>
          <?php } ?>
        </table>
		<?php $k=0; foreach ($balance as $item){
            $k=$k+$item['amount'];
           }?>
		<?php $j=0; foreach ($balance1 as $item){
            $j=$j+$item['jumlah'];
           }?>
		   <!-- <?php echo $k;?>
		   <?php echo $j;?> -->
		<hr>
		<h3>Total Balance = <?php echo 'Rp',$i=$k-$j;?></h3>
        <hr style="color:black">
		<h3>Deduct Fund Form</h3>
		<form name="deduct"action=" <?php echo base_url().'index.php/reviewerctl/deductfund';?>" method="post">
		 <table>
            <tr>
                <td>Nomor Rekening:</td>
                <td><input type="text" id="norek" name="rek" width="100" value="<?php echo $info['no_rek']?>"></td>
			</tr>
			<tr>
                <td>Jumlah Penarikan Uang</td>
                <td><input type="number" id="jumlah" name="jumlah" width="100" max="<?php echo $i ?>" min="50000" placeholder="max=<?php echo $i?>"></td>
			</tr>
		 </table>
		 <p>
          <input type="submit">
        </p>
		</form>
		</div>
		<hr>
		<div style="box-shadow: 10px 10px 10px 10px; padding:20px">
		<h2  align="center" align="center" style="background:#17823b;color:white;padding:5px;font-family: 'Open Sans Condensed', sans-serif;">
			Current Data
		</h2>
		<table  border="1" style="text-align: center;box-shadow: 0px 7px 10px 3px;background: #ffffff;width:100%" align="center">
			<tr style="padding:1px;background-color: #039dfc;color:white">
				<td width=33%>Nomor Rekening</td>
				<td width=33%>Kompetensi</td>
				<td width=34%>Biaya Jasa</td>
			</tr>
			<tr>
				<td align="center"><?php echo $info['no_rek'];?></td>
				<td align="center"><?php echo $info['kompetensi'];?></td>
				<td align="center"><?php echo $info['biaya'];?></td>
			</tr>
		</table>
		<br>
		<div align="center">
		<div style="text-align: center;box-shadow: 0px 7px 10px 3px;background:#deebff;padding:10px;width:50%">
		<h3  align="center">
			Update Data
		</h3>
		<hr>
		<form action="<?php echo base_url().'index.php/reviewerctl/dataupdate';?>" method="post">
		 <table  align="center" style="text-align:left">
            <tr>
                <td>Nomor Rekening:</td>
                <td><input type="text" id="rek" name="rek" width="100" placeholder="Nomor Rekening*" required></td>
			</tr>
			<tr>
                <td>Kompetensi</td>
                <td><input type="text" id="kompetensi" name="kompetensi" width="100" placeholder="Engineering, Cyber Security, and etc" required></td>
			</tr>
			<tr>
                <td>Biaya Jasa</td>
                <td><input type="text" id="biaya" name="biaya" width="100" placeholder="Biaya review/halaman" required></td>
            </tr>
		 </table>
		 <p align="center">
          <input type="submit">
        </p>
		</form>
		</div>
		<div>
		</div>
      </div>
    </div>
  </div>
</section>