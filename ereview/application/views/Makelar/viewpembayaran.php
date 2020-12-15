<section id="intro">
    <div class="jumbotron masthead">
      <div class="container">
      <div class=box style="box-shadow: 10px 10px 10px 10px; padding:20px">
		<h3 align="center" style="background:#17823b;color:white;padding:5px;font-family: 'Open Sans Condensed', sans-serif;">Pembayaran</h3>
		<table border="1" style="text-align: center;background: #ffffff;width:100%" align="center">
          <tr style="padding:1px;background-color: #039dfc;color:white">
            <th width="5%">No Task</th>
            <th width="20%">Judul Task</th>
            <th width="20%">Kurs</th>
            <th width="20%">FileName</th>
			<th width="5%">Jumlah Pembayaran</th>
			<th width="20%">Biaya Review</th>
          </tr>
          <?php $i=0; foreach ($balance as $item){
            $i++ ?>
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
        <hr style="color:black">
        <div align="center">
	    	<div style="text-align: center;background:#deebff;padding:10px;width:50%">
        <h2>Payment Confirmation</h2>
		<form  action="<?php echo base_url().'index.php/makelarctl/confirmPayment';?>" method="post">
		 <table align="center">
            <!-- <tr>
                <td>Nomor Task</td>
                <td><input type="text" id="pilih" name="pilih" width="100" placeholder="Nomor Task*"></td>
            </tr> -->
            <tr>
				<td>
				<label>Nomor Task
						</td>
				<td>
				<select name="pilih">
               <?php $i=0; foreach ($balance as $item){
               $i++ ?>
               <option value="<?php echo $item['id_assignment'];?>"><?php echo $item['id_assignment']?></option>
               <?php } ?>
				</select>
				</label>
						</td>
			</tr>
            <tr>
				<td>
				<label>Tindakan
						</td>
				<td>
				<select name="tindakan">
  			   		<option value="1">Confirm</option>
					<option value="2">Reject</option>
				</select>
				</label>
						</td>
			</tr>
		 </table>
		 <p align="center">
          <input type="submit">
        </p>
		</form>
    </div>
    </div>
    </div>
      </div>
    </div>
  </div>
</section>