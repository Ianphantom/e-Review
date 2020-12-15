<section id="intro">
    <div class="jumbotron masthead">
      <div class="container">
        <hr style="color:black">
        <br>
        <div style="text-align: center;box-shadow: 0px 7px 10px 3px;background:#d7d9de;padding:10px">
        <h3 align="center" style="background:#17823b;color:white;padding:5px;font-family: 'Open Sans Condensed', sans-serif;">Submitted Task Need To Be Paid</h3>
        <table border="1" style="text-align: center;background:#ffffff;width:100%" align="center">
          <tr style="padding:1px;background-color: #039dfc;color:white">
            <th width="5%">No</th>
            <th width="20%">Judul</th>
            <th width="25%">Reviewer</th>
            <th width="20%">No Rek</th>
            <!-- <th width="10%">Task Status</th> -->
            <th width="10%">Nomor Unik</th>
            <th width="10%">Biaya</th>
          </tr>
          <?php $i=0; foreach ($task as $item){
            $i++ ?>
          <tr style="color:black">
            <td><?php echo $i;?></td>
            <td><?php echo $item['judul'];?></td>
            <td><?php echo $item['nama'];?></td>
            <td><?php echo "05311940011008";?></td>
            <!-- <td><?php if ($item['status']==0){
		                	echo "Wait For Respond";
		                  }else if($item['status']==1){
			                echo "Wait For Payment";	
		                  }else if($item['status']==2){
			                echo "On Progess";
		                  }else if($item['status']==3){
                        echo "Rejected";
                      }else if($item['status']==4){
                        echo "Wait For Makelar Confirmation";
                      } 
                      ?></td> -->
            <td><?php echo $item['id_assignment'];?></td>
            <td><?php echo $item['biaya']*$item['halaman'];?></td>
          </tr>
          <?php } ?>
        </table>
        </div>
        <br>
        <hr>
        <br>
        <div style="text-align: center;box-shadow: 0px 7px 10px 3px;background:#d7d9de;padding:10px">
        <h3 align="center" style="background:#17823b;color:white;padding:5px;font-family: 'Open Sans Condensed', sans-serif;">Status Pembayaran</h3>
        <table border="1" style="text-align: center;background:#ffffff;width:100%" align="center">
          <tr style="padding:1px;background-color: #039dfc;color:white">
            <th width="5%">No</th>
            <th width="20%">Judul Task</th>
            <th width="20%">Kurs</th>
            <th width="20%">Nomor Unik</th>
			      <th width="5%">Jumlah Pembayaran</th>
		      	<th width="20%">Status Pembayaran</th>
          </tr style="color:black">
             <?php $i=0; foreach ($confirm as $item){
              $i++?>
            <tr style="color:black">
            <td><?php echo $i;?></td>
            <td><?php echo $item['judul'];?></td>
            <td><?php echo $item['kurs'];?></td>
            <td><?php echo $item['id_assignment'];?></td>
		      	<td><?php echo $item['amount'];?></td>
			      <td><?php if ($item['statusPembayaran']==0){
		                	echo "Menunggu Konfirmasi";
		                  }else if($item['statusPembayaran']==1){
                      echo "Pembayaran Diterima";	
		                  }else if($item['statusPembayaran']==2){
			                echo "Pembayaran Ditolak";
		                  }else echo "Belum Dibayar";
                      ?></td>
          </tr>
          <?php } ?>
        </table>
        </div>
        <hr>
        <p align="center" style="color:red">Jika Pembayaran Ditolak Pastikan Anda Membayar sesuai dengan harga</p>
      </div>
    </div>
  </div>
</section>