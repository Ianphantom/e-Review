<section id="intro">
    <div class="jumbotron masthead">
      <div class="container">
      <div style="text-align: center;box-shadow: 0px 7px 10px 3px;background:#d7d9de;padding:10px">
        <h3 align="center" style="background:#17823b;color:white;padding:5px;font-family: 'Open Sans Condensed', sans-serif;">All Task list</h3>
        <table border="1" style="text-align: center;background:#ffffff;width:100%" align="center">
          <tr style="padding:1px;background-color: #106b9c;color:white">
            <th width="5%">No</th>
            <th width="25%">Judul</th>
            <th width="25%">Kata Kunci</th>
            <th width="25%">FileName</th>
            <th width="10%">Select Reviewer</th>
            <th width="10%">Date Submitted</th>
            <!-- <th width="50px">Task Status</th> -->
          </tr>
          <?php $i=0; foreach ($tasks as $item){
            $i++ ?>
          <tr style="color:black">
            <td><?php echo $i;?></td>
            <td><?php echo $item['judul'];?></td>
            <td><?php echo $item['katakunci'];?></td>
            <td><a style="color:#0544ff" href="<?php echo base_url().'index.php/applicationctl/download/'.$item['id_task'];?>" target="_blank"><?php echo $item['filelocation'];?></a></td>
            <td><a  style="color:#0544ff" href="<?php echo base_url().'index.php/managemytask/selectreviewer/'.$item['id_task'];?>" target="_blank"><?php echo "Select Here";?></a></td>
            <td><?php echo date("d-m-y",strtotime($item['date_created']));?></td>
            <!-- <td><?php if ($item['sts_task']==1){
		                	echo "Not Reviewed";
		                  }else if($item['sts_task']==2){
			                echo "On Progress";	
		                  }else if($item['sts_task']==3){
			                echo "Reviewed";
		                  } 
		                  ?></td> -->
          </tr>
          <?php } ?>
        </table>
        </div>
        <!-- <br>
        <hr style="color:black">
        <br> -->
        <hr>
        <div style="text-align: center;box-shadow: 0px 7px 10px 3px;background:#d7d9de;padding:10px">
        <h3 align="center" style="background:#17823b;color:white;padding:5px;font-family: 'Open Sans Condensed', sans-serif;">Submitted Task To Be Reviewed</h3>
        <table border="1" style="text-align: center;background: #ffffff;width:100%" align="center">
          <tr style="padding:1px;background-color:#106b9c;color:white">
            <th width="5%">No</th>
            <th width="25%">Judul</th>
            <th width="25%">Kata Kunci</th>
            <th width="25%">Reviewer</th>
            <th width="10%">Task Status</th>
            <th width="10%">Opsi</th>
          </tr>
          <?php $i=0; foreach ($status as $item){
            $i++ ?>
          <tr style="color:black">
            <td><?php echo $i;?></td>
            <td><?php echo $item['judul'];?></td>
            <td><?php echo $item['katakunci'];?></td>
            <td><?php echo $item['nama'];?></td>
            <td><?php if ($item['status']==0){
		                	echo "Wait For Respond";
		                  }else if($item['status']==1){
			                echo "Wait For Payment";	
		                  }else if($item['status']==2){
			                echo "On Progess";
		                  }else if($item['status']==3){
                        echo "Rejected";
                      }else if($item['status']==4){
                        echo "Wait For Makelar Confirmation";
                      }else if($item['status']==5){
                        echo "Payment Confirm and Wait Makelar Completitation";
                      }else if($item['status']==6){
                        echo "Finished";
                      }
                      ?></td>
            <td><?php if($item['status']==1){?>
                        <a style="color:white;padding:1px;background-color:blue;box-shadow: 0px 1px 1px 1px" href="<?php echo base_url().'index.php/editorctl/commitpayment/'.$item['id_task'];?>" target="_blank">Pembayaran</a>
                     <?php } ?></td>
          </tr>
          <?php } ?>
        </table>
        </div>
      </div>
    </div>
  </div>
  <br>
  <br>
</section>